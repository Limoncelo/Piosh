<html>
  <head>
    <meta charset="utf-8">
    <title>PIOSH</title>
    {{ HTML::style('/css/main.css') }}
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Amatic+SC" /><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Helvetica" />
    <!-- FONT AWESOME -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">    <!-- BOOTSTRAP -->
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
      @yield('content')
    <footer>
        <div class="container">

            <ul>
                <li>
                    <a href="#"><i class="fab fa-facebook-f"></i>&nbsp;</a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-twitter"></i>&nbsp;</a>
                </li>
            </ul>
        </div>

    </footer>
    {{ HTML::script('/js/main.js') }}
    <script
      src="https://code.jquery.com/jquery-3.3.1.js"
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
      crossorigin="anonymous"></script>

<script src="/node_modules/trumbowyg/dist/trumbowyg.min.js"></script>
<script>
$(function() {
  $('textarea').trumbowyg({
      prefix: 'custom-prefix'
  });
})
</script>
      </body>
</html>
<script>
    $('a[href*="#"]:not([href="#"])').not('a.modal-trigger, a.modal-close').click(function () {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 700);
                return false;
            }
        }
    });
</script>
