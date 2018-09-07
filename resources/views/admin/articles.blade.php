@extends('main')
@section('content')
<div class="container">
  <table class="table">
    <thead>
    <tr>
      <th>#</th>
      <th>Titre</th>
      <th>Description</th>
    </tr>
    </thead>
    <tbody>
  @foreach($articles as $article)
    <tr>

        <td>{{ $article->id }}</td>
        <td><a href="{{ url('admin/article/' . $article->id) }}">{{ $article->title }}</a></td>
        <td>{{ strip_tags($article->desc) }}</td>

    </tr>
  @endforeach
    </tbody>
  </table>
</div>
@endsection('content')
