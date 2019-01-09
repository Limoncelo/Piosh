@extends('main', ['projects.projects' => $projects])

@section('content')
    <div class="banner position-relative" style="background-image: url('{{ URL::asset('img/piosh_banniere.png') }}')">


    </div>
    <div class="py-3">
        <div class="container">
            <p><a href="#contact" class="contact-anchor text-center black d-block my-5">Pour en savoir plus, contactez-nous !</a></p>
            <div class="intro text-center">
                <p class="font-italic">Qu’est-ce qu’une pioche ? Un outil, ancien mais toujours nécessaire, avec lequel on transforme un terrain inadapté en nouvel espace, plus fertile.
                </p>
                <p>PIOSH est l’équivalent pour les projets d’amélioration vers une société plus égalitaire, qui réunissent autour de la table des acteurs différents et parfois en conflit. C’est l’outil qui permet de rassembler toutes les personnes concernées par un projet, y compris et surtout celles qui sont les plus éloignées de la décision, et de débloquer des situations problématiques.
                </p>
                <p>Du diagnostic du terrain à l’évaluation du changement, des formations pour mieux manier les outils et concepts à la redéfinition de pratiques professionnelles, PIOSH allie recherche et action.
                </p>
            </div>
        </div>
    </div>
    <div class="">
        @include('actus')
        @include('timeline')
        @include('contact')
    </div>
@endsection
