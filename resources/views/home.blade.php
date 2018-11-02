@extends('main', ['projects.projects' => $projects])

@section('content')
<div class="banner">
    <h1>PIOSH</h1>
    <b>Participer Inclure Oser par les Sciences Humaines</b>
    <br>
    <c>Cabinet de recherche-action</c>
    <p>
        <br><a href="#contact">Pour en savoir plus, contactez-nous !</a>
    </p>
</div>
<div class="container">
    <div class="intro text-center">Nous pensons que chacun.e est source et ressource dans la construction de son quotidien et peut ainsi en être acteur.trice. PIOSH est le support pour intégrer la participation à différentes échelles tout en accompagnant les professionnel.le.s (collectivités, associations, entreprises) à l’inclure dans leur pratique.</div>
        @include('actus')
        @include('timeline')
        @include('contact')
    </div>
</div>
@endsection
