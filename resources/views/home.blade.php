@extends('main', ['projects.projects' => $projects])

@section('content')
    <div class="banner position-relative" style="background-image: url('{{ URL::asset('img/piosh_banniere.png') }}')">


    </div>
    <div class="py-3 bg-red">
        <div class="container">
            <div class="intro text-center white">
                {!! $intro->desc !!}

            </div>
            <p><a href="#contact" class="white contact-anchor text-center black d-block my-5">Pour en savoir plus, contactez-nous !</a></p>
        </div>
    </div>
    <div class="">
        @include('actus')
        @include('timeline')
        @include('contact')
    </div>
@endsection
