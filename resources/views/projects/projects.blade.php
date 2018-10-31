@extends('main')
@section('content')

    <div class="container projects">
        <div class="row">
            @foreach ($projectsList as $project)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card" id="art{{ $project->id }}">
                        {{ HTML::image($project->photo_1, '', array('class' => 'img-fluid')) }}
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <div class="card-text">{!!  strlen($project->desc) > 100 ? substr($project->desc, 0, 100) . '...' : $project->desc !!}</div>
                            <a href="{{ url('projet/' . $project->id) }}" class="btn btn-primary">En savoir +</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection