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

  sameHeight($('.articles .card'));
  sameHeight($('.projects .card'));
  sameHeight($('.actus .actu.card'));
  fixedFooter();
  window.sr = ScrollReveal();

  var configRight = {
        duration: 1500,
        delay: 0,
        origin: 'left',
        distance: '1500px',
        opacity: 0.9,
        mobile: false,
        reset: false
  };

  var configLeft = {
        duration: 1500,
        delay: 0,
        origin: 'right',
        distance: '1500px',
        opacity: 0.9,
        mobile: false,
        reset: false
  };

    sr.reveal(' .cd-timeline-block-left', configLeft);

    sr.reveal('.cd-timeline-block-right', configRight);


    $('.actus .actus_slider').slick({
        arrows: true,
        dots: false,
        infinite: true,
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
