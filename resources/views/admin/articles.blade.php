@extends('main_admin')
@section('content')
<div class="container">
  <a class="btn btn-primary my-3" href="{{ url('admin/new_article') }}">Créer un nouvel article</a>
  <table class="table">
    <thead>
    <tr>
      <th>#</th>
      <th>Titre</th>
      <th>Intro</th>
      <th>Description</th>
      <th>Catégorie</th>
    <th></th>
    </tr>
    </thead>
    <tbody>
  @foreach($articles as $article)
    <tr>

        <td>{{ $article->id }}</td>
        <td><a href="{{ url('admin/article/' . $article->id) }}">{{ $article->title }}</a></td>
        <td>{{ str_limit(strip_tags($article->intro), 100, '...') }}</td>
        <td>{{ str_limit(strip_tags($article->desc), 100, '...') }}</td>
        <td>{{ $article->catTitle }}</td>
        <td>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                Supprimer l'article
            </button>
        </td>

    </tr>


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

                    {{ Form::open(array('url' => 'admin/delete_article/' . $article->id, 'class' => 'w-100', 'class' => 'validate-form')) }}

                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="form-group">
                        <button type="submit"  class="btn btn-danger">Supprimer cet article</button>
                    </div>

                    {{ Form::close() }}
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
  @endforeach

    </tbody>
  </table>
</div>
@endsection('content')
