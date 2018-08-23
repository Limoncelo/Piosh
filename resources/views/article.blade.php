@extends('main')
@section('content')

<div class="container article">
  <div class="row">
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->desc }}</p>
  </div>
</div>

@auth
coucou
@endauth
@endsection
