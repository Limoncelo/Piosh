@extends('main')
@section('content')

    <div class="container projects">
        <div class="row">
            @foreach ($projectsList as $project)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card" id="art{{ $project->id }}">
                        <img class="card-img-top" src="https://fakeimg.pl/1200x1000/ebebeb/?text=no-image&font=lobster" alt="{{ $project->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ strlen($project->desc) > 100 ? substr($project->desc, 0, 100) . '...' : $project->desc }}</p>
                            <a href="{{ url('projet/' . $project->id) }}" class="btn btn-primary">En savoir +</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection