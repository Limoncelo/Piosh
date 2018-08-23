@extends('main')
@section('content')

<div class="container article">
  <div class="row">
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->desc }}</p>
  </div>
  @auth
  <a href="{{ url('admin/article/' . $article->id) }}">Modifier l'article</a>
  @endauth
</div>

@endsection
