@extends('main_admin')
@section('content')
<div class="container">
  <a class="btn btn-primary my-3" href="{{ url('admin/new_article') }}">Créer un nouvel article</a>
  <table class="table">
    <thead>
    <tr>
      <th>#</th>
      <th>Titre</th>
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
        <td>{{ str_limit(strip_tags($article->desc), 100, '...') }}</td>
        <td>{{ $article->catTitle }}</td>
        <td>

            {{ Form::open(array('url' => 'admin/delete_article/' . $article->id, 'class' => 'w-100')) }}

                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Supprimer cet article</button>
                </div>

            {{ Form::close() }}
        </td>

    </tr>
  @endforeach

    </tbody>
  </table>
</div>
@endsection('content')
