@extends('main')
@section('content')

  <div class="container article my-4">
    @if(empty($article->color))
      <h1 class="my-5 text-center">{{ $article->title }}</h1>
    @else

      <h1 style="color:{{ $article->color }}" class="my-5 text-center">{{ $article->title }}</h1>
    @endif
    <div class="row">
    @if(!empty($article->photo_2))
      <div class="col-12 col-md-6 valign-middle">
        @if($article->pos_photo === 'droite')
          <div class="desc"> {!!  $article->desc !!}</div>

        @else

          <div class="w-100 text-center">
                {{ HTML::image($article->photo_2, '', array('class' => 'img-fluid mx-auto')) }}
          </div>

        @endif
      </div>
      <div class="col-12 col-md-6  valign-middle">
        @if($article->pos_photo === 'droite')
          <div class="w-100 text-center">
            {{ HTML::image($article->photo_2, '', array('class' => 'img-fluid mx-auto')) }}
          </div>
        @else
          <div class="desc"> {!!  $article->desc !!}</div>

        @endif

      </div>
      @else
      <div class="col-12">
        <div class="desc w-100">{!! $article->desc !!}</div>
      </div>
      @endif
      @if(!empty($article->link))
        <div class="col-12 text-center">
          <a class="btn btn-primary" href="{{ $article->link }}" target="_blank">En savoir plus</a>
        </div>
      @endif
      @if(!empty($article->youtube))
        <div class="col-12 text-center">
          <div class="containImageVideo">

            <div class="wrapper">
              <div class="youtube" data-embed="{{ $article->youtube }}">
                <div class="play-button"></div>
              </div>
            </div>
          </div>
        </div>

        {{ HTML::script('/js/youtube.js') }}
      @endif
    </div>
        @if(!empty($equipe))
        <div class="equipe">
            <h2 class="text-center">Les têtes de PIOSH</h2>
            <div class="row">
                @foreach($equipe as $item)
                    <div class="col-12 col-md-6 col-xl-3">
                        {{ HTML::image($item->photo, $item->nom, array('class' => 'img-fluid')) }}
                        <h2 {{ !empty($item->color) ? 'style=color:' . $item->color  : "" }}>{{ $item->nom }}</h2>
                        <div class="description">{!!  $item->description !!}</div>
                    </div>
                @endforeach
            </div>
            <p class="text-right">Illustrations réalisées par <a href="http://justineperonnet.ultra-book.com" class="orange" target="_blank">Justine Péronnet</a> <a href="https://www.instagram.com/justine.peronnet" target="_blank"><i class="black fab fa-instagram"></i></a></p>
        </div>
        @endif
    @auth
      <div class="my-5">
        <a href="{{ url('admin/article/' . $article->id) }}">Modifier l'article</a>
      </div>
    @endauth
  </div>

@endsection
