@extends('main')
@section('content')

    <div class="container article my-4">
        @if(empty($project->color))
            <h1 class="my-4 text-center">{{ $project->title }}</h1>
        @else

            <h1 style="color:{{ $project->color }}" class="my-4 text-center">{{ $project->title }}</h1>
        @endif
        <div class="row">
            @if(!empty($project->photo_2))
                <div class="col-12 col-md-6 valign-middle">
                    @if($project->pos_photo === 'droite')
                        <div class="desc"> {!!  $project->desc !!}</div>

                    @else
                        <div class="w-100 text-center">
                            {{ HTML::image($project->photo_2, '', array('class' => 'img-fluid mx-auto')) }}
                        </div>

                    @endif
                </div>
                <div class="col-12 col-md-6  valign-middle">
                    @if($project->pos_photo === 'droite')
                        <div class="w-100 text-center">
                            {{ HTML::image($project->photo_2, '', array('class' => 'img-fluid mx-auto')) }}
                        </div>
                    @else
                        <div class="desc"> {!!  $project->desc !!}</div>

                    @endif

                </div>
            @else
                <div class="col-12">
                    <div class="desc">{!! $project->desc !!}</div>
                </div>
            @endif
            @if(!empty($project->link))
                <div class="col-12 text-center">
                    <a class="btn btn-primary" href="{{ $project->link }}" target="_blank">En savoir plus</a>
                </div>
            @endif
            @if(!empty($project->youtube))
                <div class="col-12 text-center">
                    <div class="containImageVideo">

                        <div class="wrapper">
                            <div class="youtube" data-embed="{{ $project->youtube }}">
                                <div class="play-button"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{ HTML::script('/js/youtube.js') }}
            @endif
        </div>
        @auth
            <div class="my-5">
                <a href="{{ url('admin/article/' . $project->id) }}">Modifier l'article</a>
            </div>
        @endauth
    </div>

@endsection
