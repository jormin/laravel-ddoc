$(document).ready(function () {
    var trigger = $('.hamburger'),
        overlay = $('.overlay'),
        isClosed = false;

    trigger.click(function () {
        hamburger_cross();
    });

    function hamburger_cross() {

        if (isClosed == true) {
            overlay.hide();
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
        } else {
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
        }
    }

    $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
    });


    $(window).scroll(function(){
        var scrolltop = window.scrollY;
        if(scrolltop >= 200){
            $(".scroll-top").show();
        }else{
            $(".scroll-top").hide();
        }
    })

    $(".scroll-icon-top").click(function(){
        $("html,body").animate({scrollTop: 0}, 500);
    })
});
