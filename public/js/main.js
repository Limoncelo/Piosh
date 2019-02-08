function sameHeight(group) {

    var tallest = 0;
    group.each(function () {
        var thisHeight = $(this).height();
        if (thisHeight > tallest) {
            tallest = thisHeight;
        }
    });
    group.height(tallest);
}


function fixedFooter() {
    var documentHeight =window.innerHeight;
    var heightcontent = $('#div_component').height();
    if(documentHeight > heightcontent) {
        $('footer').addClass('fixedBottom w-100');
    }
}

$(function() {



    $('.btn-danger').on('click', function() {
        alert('Êtes vous certain.e ? ');
    });

    if ($.cookie('cookie_bar') === undefined) {
        var cookieBar =
            '<div class="mod_cookie_bar"><div class="text-center text-xl-left cookie_bar justify-content-center flex-row align-items-center p-2" id="cookie_bar">\n' +
            'En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de cookies.\n' +
            '<a class="m-1 btn btn-primary btn-sm"  target="_blank" href="https://support.google.com/analytics/topic/2919631?hl=fr&ref_topic=1008008">En savoir plus</a>\n' +
            '<div class="m-1 cookie_btn btn btn-primary btn-sm" id="cookie_accept">Ok</div>';
        cookieBar +=
            '</div></div>';

        $('body').append(cookieBar);

        // Masquer la barre
        $('body').on('click', '#cookie_accept', function (e) {
            e.preventDefault();
            $('#cookie_bar').fadeOut();
            $.cookie('cookie_bar', "viewed", {expires: 30 * 12});
        });

    }

  sameHeight($('.articles .card'));
  sameHeight($('.projects .card'));
  sameHeight($('.actus .actu.card'));
  fixedFooter();
    
    $( window ).resize(function() {
      fixedFooter();
    });
  window.sr = ScrollReveal();

  var configRight = {
        duration: 1500,
        delay: 0,
        origin: 'left',
        distance: '1500px',
        opacity: 0.9,
        mobile: true,
        reset: false
  };

  var configLeft = {
        duration: 1500,
        delay: 0,
        origin: 'right',
        distance: '1500px',
        opacity: 0.9,
        mobile: true,
        reset: false
  };

    sr.reveal(' .cd-timeline-block-left', configLeft);

    sr.reveal('.cd-timeline-block-right', configRight);


    $('.actus .actus_slider').slick({
        arrows: true,
        dots: false,
        infinite: false,
        speed: 200,
        accessibility: true,
        autoplay: false,
        fade: false,
        cssEase: 'linear',
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

});


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
