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
    sameHeight($('.actu.card'));
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
