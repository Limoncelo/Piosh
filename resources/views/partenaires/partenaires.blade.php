@extends('main')
@section('content')

    <div class="container partenaires">
        <h1 class="text-center my-5">On nous fait confiance</h1>
        <div class="row">
            @foreach ($partenaires as $partenaire)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card partenaire valign-middle my-3 text-center" id="art{{ $partenaire->id }}">
                        @if(!empty($partenaire->photo_1))
                            <img class="card-img-top" src="{{ $partenaire->photo_1 }}" alt="{{ $partenaire->title }}">
                        @endif
                        <div class="card-body">
                            <h2 class="card-title">{{ $partenaire->title }}</h2>
                            <p>{{ $partenaire->intro }}</p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
