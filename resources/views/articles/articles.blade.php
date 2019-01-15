@extends('main')
@section('content')

<div class="container articles">
  <h1 class="text-center my-5">Toutes nos actualités</h1>
  <div class="row">
@foreach ($articles as $article)
    <div class="col-12 col-sm-6 col-lg-4">
      <div class="card article valign-middle my-3 text-center" id="art{{ $article->id }}">
        @if(!empty($article->photo_1))
          <img class="card-img-top" src="{{ $article->photo_1 }}" alt="{{ $article->title }}">
        @endif
        <div class="card-body">
          <h2 class="card-title">{{ $article->title }}</h2>

          <a href="{{ url('article/' . $article->id . '-' . CUSTOM_SLUG($article->title)) }}" class="btn btn-primary">En savoir +</a>
        </div>
      </div>
    </div>
@endforeach
  </div>
</div>
@endsection
