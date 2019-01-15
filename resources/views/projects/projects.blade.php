@extends('main')
@section('content')

    <div class="container projects">
        <h1 class="text-center my-3">Tous nos projets</h1>
        <div class="row">
            @foreach ($all_projects as $project)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card project valign-middle my-3 text-center" id="art{{ $project->id }}">
                        @if(!empty($project->photo_1))
                            {{ HTML::image($project->photo_1, $project->title, array('class' => 'img-fluid card-img-top')) }}
                        @elseif(!empty($project->photo_2))
                            {{ HTML::image($project->photo_2, $project->title, array('class' => 'img-fluid card-img-top')) }}
                        @endif
                        <div class="card-body">
                            <h2 class="card-title">{{ $project->title }}</h2>
                            <a href="{{ url('projet/' . $project->id . '-' . CUSTOM_SLUG($project->title)) }}" class="btn btn-primary">En savoir +</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
