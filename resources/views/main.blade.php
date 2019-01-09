<html>
<head>
    <meta charset="utf-8">
    <title>PIOSH</title>
    {{ HTML::style('/css/main.css') }}
    {{ HTML::style('/css/timeline.css') }}
    {{ HTML::style('/js/slick/slick.css') }}
    {{ HTML::style('/js/slick/slick-theme.css') }}
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Amatic+SC"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Helvetica"/>
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- BOOTSTRAP -->
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    <!-- Include Code Mirror CSS. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
    <!-- Include Editor style. -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_style.min.css' rel='stylesheet' type='text/css' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
    <!-- SCROLL REVEAL -->
    <script src="https://unpkg.com/scrollreveal"></script>
</head>
<body>

    <div id="div_component" class="pt-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <!--<img src="{{ asset('img/logo.jpg') }}" class="img-responsive">-->PIOSH</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        @foreach($menu as $article)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('article/' .$article->id) }}">{{ $article->title }}</a>
                        </li>
                        @endforeach
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Nos projets
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach( $projects as $project)
                                    <a class="dropdown-item" href="{{ url('projet/' .$project->id) }}">{{ $project->title }}</a>
                                @endforeach
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('projets') }}">Tous nos projets</a>
                            </div>
                        </li>

                    </ul>

                @auth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <hr>
                                    <a class="dropdown-item" href="{{ url('admin/articles') }}">Tous les articles</a>
                                    <a class="dropdown-item" href="{{ url('admin/categories') }}">Toutes les catégories</a>
                                    <a class="dropdown-item" href="{{ url('admin/equipes') }}">L'équipe</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </nav>
            @yield('content')
    <footer>
        <div class="container">

            <ul>
                <li>
                    <a href="http://www.facebook.fr/PIOSH.Lyon" target="_blank"><i class="fab fa-facebook-f"></i>&nbsp;</a>
                </li>
                <li>
                    <a href="http://www.twitter.com/PIOSH_Lyon" target="_blank"><i class="fab fa-twitter"></i>&nbsp;</a>
                </li>
                <li>
                    <a href="htpp://www.linkedin.com/company/piosh-lyon" target="_blank"><i class="fab fa-linkedin"></i>&nbsp;</a>
                </li>
            </ul>
        </div>

    </footer>
</div>

    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>

    {{ HTML::script('/js/main.js') }}
    {{ HTML::script('/js/timeline.js') }}
    {{ HTML::script('/js/slick/slick.js') }}
<!-- Include JS file FROALA. -->
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/js/froala_editor.min.js'></script>


</body>
</html>
