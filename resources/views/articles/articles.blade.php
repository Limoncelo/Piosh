@extends('main')
@section('content')

<div class="container articles">
  <div class="row">
@foreach ($articles as $article)
    <div class="col-12 col-sm-6 col-lg-4">
      <div class="card" id="art{{ $article->id }}">
        <img class="card-img-top" src="https://fakeimg.pl/1200x1000/ebebeb/?text=no-image&font=lobster" alt="{{ $article->title }}">
        <div class="card-body">
          <h5 class="card-title">{{ $article->title }}</h5>
          <p class="card-text">{{ strlen($article->desc) > 100 ? substr($article->desc, 0, 100) . '...' : $article->desc }}</p>
          <a href="{{ url('article/' . $article->id) }}" class="btn btn-primary">En savoir +</a>
        </div>
      </div>
    </div>
@endforeach
  </div>
</div>
@endsection
