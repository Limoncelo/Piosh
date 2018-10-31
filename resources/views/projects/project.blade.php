@extends('main')
@section('content')

    <div class="container project">
        @if(empty($project->color))
            <h1>{{ $project->title }}</h1>
        @else

            <h1 style="color:{{ $project->color }}">{{ $project->title }}</h1>
        @endif
        <div class="row">
            <div class="col-12 col-md-6">
                @if($project->pos_photo === 'droite')
                    <div class="px-5"> {!!  $project->desc !!}</div>

                @else
                    <div class="w-100 text-center">
                        {{ HTML::image($project->photo_1, '', array('class' => 'img-fluid mx-auto')) }}
                    </div>

                @endif
            </div>
            <div class="col-12 col-md-6">
                @if($project->pos_photo === 'droite')
                    <div class="w-100 text-center">
                        {{ HTML::image($project->photo_1, '', array('class' => 'img-fluid mx-auto')) }}
                    </div>
                @else
                    <div class="px-2"> {!!  $project->desc !!}</div>
                @endif

            </div>
        </div>
        @auth
            <div class="my-5">
                <a href="{{ url('admin/article/' . $project->id) }}">Modifier le project</a>
            </div>
        @endauth
    </div>

@endsection
