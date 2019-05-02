@extends('main_admin')
@section('content')

    <div class="container my-5">
    <a href="{{  url('admin/articles')  }}" class="d-block mb-5"><i class="fas fa-caret-left"></i>&nbsp; Retour à la liste des articles</a>
    <div class="row">



    {{ Form::open(array('url' => 'admin/article/' . $article->id, 'class' => 'w-100', 'files' => true)) }}
    <div class="form-group">
        <label for="id">#</label>
        <input type="int" class="form-control" value="{{ $article->id }}" name="id" id="id" disabled>
    </div>
    <div class="form-group">
        <label for="ordering">Ordering</label>
        <input type="int" class="form-control" value="{{ $article->ordering }}" name="ordering" id="ordering" >
    </div>
    <div class="form-group">
        <label for="title">Titre de l'article</label>
        <input type="text" class="form-control" value="{{ $article->title }}" name="title" id="title" required>
    </div>
    <div class="form-group">
        <label for="intro">Intro de l'article</label>
        <input type="text" class="form-control" value="{{ $article->intro }}" name="intro" id="intro">
    </div>
    <div class="form-group">
        <label for="desc">Description de l'article</label>
        <textarea type="textarea" name="desc" id="desc" class="form-control">{{ $article->desc }}</textarea>
    </div>
    <div class="form-group">
        <label for="category_id">Catégorie</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <option  disabled value="0">Choisir une catégorie</option>
            @foreach($categories as $category)
                @if($category->id === $article->category_id)
                    <option selected value="{{ $category->id }}">{{ $category->title }}</option>
                @else
                    <option  value="{{ $category->id }}">{{ $category->title }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="color">Couleur</label>
        <input type="text" class="form-control" value="{{ $article->color }}" name="color" id="color" placeholder="(ex : #ebebeb)">
    </div>
    <div class="form-group">
        @if(!empty($article->photo_1))
            {{ HTML::image($article->photo_1, '', array('class' => 'img-fluid')) }}
<br>
        @endif
        {{Form::label('photo_1', 'Photo 1',['class' => 'control-label'])}}
        {{Form::file('photo_1', array("class"=>"form-control-file"))}}
    </div>
    <div class="form-group">
        @if(!empty($article->photo_2))
            {{ HTML::image($article->photo_2, '', array('class' => 'img-fluid')) }}
<br>
        @endif
        {{Form::label('photo_2', 'Photo 2',['class' => 'control-label'])}}
        {{Form::file('photo_2', array("class"=>"form-control-file"))}}
    </div>
    <div class="form-group">
        <label for="pos_photo">Position de la photo 2</label>
        <input type="text" class="form-control" value="{{ $article->pos_photo }}" name="pos_photo" id="pos_photo" placeholder="(gauche ou droite)">
    </div>
    <div class="form-group">
        <label for="youtube">Lien Youtube</label>
        <input type="text" class="form-control" value="{{ $article->youtube }}" name="youtube" id="youtube" placeholder="(identifiant de la vidéo)">
    </div>
    <div class="form-group">
        <label for="link">Lien</label>
        <input type="text" class="form-control" value="{{ $article->link }}" name="link" id="link" placeholder="">
    </div>
        <div class="form-group">
            <label for="link_redirect">Lien de redirection</label>
            <input type="text" class="form-control" value="{{ $article->link_redirect }}" name="link_redirect" id="link_redirect" placeholder="">
        </div>
            <br>
    <input type="submit" class=" btn btn-primary">
{{ Form::close() }}

        <br><br>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
            Supprimer l'article
        </button>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer l'article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">


                    {{ Form::open(array('url' => 'admin/delete_article/' . $article->id, 'class' => 'w-100 validate-form')) }}

                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger">Supprimer cet article</button>
                    </div>

                    {{ Form::close() }}
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
@endsection('content')
