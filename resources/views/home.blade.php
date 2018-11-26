@extends('main', ['projects.projects' => $projects])

@section('content')
    <div class="banner position-relative" style="background-image: url('{{ URL::asset('img/piosh_banniere.png') }}')">


    </div>
    <div class="py-3">
        <div class="container">
            <p><a href="#contact" class="text-center black d-block my-5">Pour en savoir plus, contactez-nous !</a></p>
            <div class="intro text-center">
                <p>Nous pensons que chacun.e est source et ressource dans la construction de son quotidien et peut ainsi en être acteur.trice.
                    PIOSH est le support pour intégrer la participation à différentes échelles tout en accompagnant les professionnel.le.s (collectivités, associations, entreprises) à l’inclure dans leur pratique.</p>
            </div>
        </div>
    </div>
    <div class="">
        @include('actus')
        @include('timeline')
        @include('contact')
    </div>
@endsection
