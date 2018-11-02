@extends('main')
@section('content')

    <div class="container projects">
        <h1 class="text-center my-2">Tous nos projets</h1>
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card project valign-middle my-3 text-center" id="art{{ $project->id }}">
                        <img class="card-img-top" src="{{ $project->photo_1 }}" alt="{{ $project->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{!!  strlen($project->desc) > 100 ? substr($project->desc, 0, 100) . '...' : $project->desc !!}</p>
                            <a href="{{ url('project/' . $project->id) }}" class="btn btn-primary">En savoir +</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
