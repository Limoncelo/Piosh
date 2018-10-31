@extends('main_admin')
@section('content')

    <div class="container my-5">
        <a href="{{  url('admin/articles')  }}" class="my-3"><i class="fas fa-caret-left"></i>&nbsp; Retour à la liste des articles</a>
        <div class="row">
{{ Form::open(array('url' => 'admin/new_article', 'class' => 'w-100', 'files' => true)) }}
            <div class="form-group">
                <label for="title">Titre de l'article</label>
                <input type="text" class="form-control"  name="title" id="title">
            </div>
            <div class="form-group">
                <label for="desc">Description de l'article</label>
                <textarea type="textarea" name="desc" id="desc" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Catégorie</label>
                <select id="category_id" name="category_id" class="form-control">
                    <option selected disabled value="0">Choisir une catégorie</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="color">Couleur</label>
                <input type="text" class="form-control" name="color" id="color" placeholder="(ex : #ebebeb)">
            </div>
            <div class="form-group">

                {{Form::label('photo_1', 'Photo 1',['class' => 'control-label'])}}
                {{Form::file('photo_1', array("class"=>"form-control-file"))}}
            </div>
            <div class="form-group">

                {{Form::label('photo_2', 'Photo 2',['class' => 'control-label'])}}
                {{Form::file('photo_2', array("class"=>"form-control-file"))}}
            </div>
            <div class="form-group">
                <label for="pos_photo">Position de la photo 2</label>
                <input type="text" class="form-control" name="pos_photo" id="pos_photo" placeholder="(gauche ou droite)">
            </div>
            <div class="form-group">
                <label for="youtube">Lien Youtube</label>
                <input type="text" class="form-control" name="youtube" id="youtube" placeholder="(identifiant de la vidéo)">
            </div>
            <div class="form-group">
                <label for="link">Lien</label>
                <input type="text" class="form-control" name="link" id="link" placeholder="">
            </div>
            <br>
    <input type="submit" class=" btn btn-primary">
{{ Form::close() }}
<script>


        $(function() {
            var button = ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', 'paragraphStyle', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', '|', 'paragraphFormat', 'specialCharacters', 'insertHR', '|', 'clearFormatting', 'insertLink', 'insertImage', 'embedly', 'insertFile', 'insertTable', '|', 'undo', 'redo', 'spellChecker', '|', 'help'];
            $('textarea').froalaEditor({

                toolbarButtons: button,
                toolbarButtonsMD: button,
                toolbarButtonsXS: button,
                toolbarButtonsSM: button})
        });
</script>
        </div>
    </div>

@endsection('content')
