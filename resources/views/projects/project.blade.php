@extends('main')
@section('content')

    <div class="container project">
        <div class="row">
            <h1>{{ $project->title }}</h1>
            <p>{{ $project->desc }}</p>
        </div>
        @auth
            <a href="{{ url('admin/project/' . $project->id) }}">Modifier l'project</a>
        @endauth
    </div>

@endsection
