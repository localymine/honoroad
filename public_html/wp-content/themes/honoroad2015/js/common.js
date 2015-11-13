new WOW().init();

jQuery.fn.extend({
    scrollTo: function (speed, easing) {
        return this.each(function () {
            var targetOffset = $(this).offset().top;
            $('html,body').animate({scrollTop: targetOffset}, speed, easing);
        });
    }
});

$(function () {
    $('#menu-toggle').sidr();
    //
    $(document).on('click', function (e) {
        var container = $('#sidr');
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $.sidr('close', 'sidr');
        }
    });
    //
    $(window).bind('resize', function () {
        if ($('body').hasClass('sidr-open') && $(window).width() >= 768) {
            $.sidr('close');
        }
    });
});

$(function () {
    $('.accordion-toggle').on('click', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            $('.accordion-toggle').removeClass('selected');
            $(this).addClass('selected');
            $(".collapse.in").collapse('hide');
        }
    });
});

$(function () {
//    var menu = $('.navbar-oil');
//    var origOffsetY = menu.offset().top;
//    function scroll() {
//        if ($(window).scrollTop() >= origOffsetY) {
//            $('.navbar-oil').addClass('sticky');
//            $('.content').addClass('menu-padding');
//        } else {
//            $('.navbar-oil').removeClass('sticky');
//            $('.content').removeClass('menu-padding');
//        }
//    }
//    document.onscroll = scroll;

    $('.navbar-oil').affix({
        offset: {
            top: $('header').height()
        }
    });
});

function mouse_enter_map() {
    $('.map iframe').css("pointer-events", "auto");
}
$(function () {
    $(".map").on('mouseenter', function () {
        setTimeout(mouse_enter_map, 500);
    });
    $(".map").on('mouseleave', function () {
        $('.map iframe').css("pointer-events", "none");
    });
});

$(function () {
    //
    $('.carousel-inner .item').each(function () {
        console.log($(this))
        $(this).height($(window).height());
        $(this).parallax({
            speed: 0.15
        });
    });
    //
});

$(function ($) {
    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
            //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
            offset_opacity = 1200,
            $back_to_top = $('#back-top');
    //
    $(window).scroll(function () {
        ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if ($(this).scrollTop() > offset_opacity) {
            $back_to_top.addClass('cd-fade-out');
        }
    });
    //
    $back_to_top.on('click', function () {
        $('#header').scrollTo();
    });
});

//$(function () {
//    $("#myCarousel").swiperight(function () {
//        $("#myCarousel").carousel('prev');
//    });
//    $("#myCarousel").swipeleft(function () {
//        $("#myCarousel").carousel('next');
//    });
//});