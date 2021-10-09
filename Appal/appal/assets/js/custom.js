(function ($) {
    "use strict";

    // Active Slick Nav
    $('#navigation').slicknav({
        label: '',
        duration: 1000,
        easingOpen: "easeOutBounce", //available with jQuery UI
        prependTo: '#mobile_menu',
        closeOnClick: true,
        easingClose: "swing",
        easingOpen: "swing",
        openedSymbol: "-",
        closedSymbol: "+"
    });

    $(document).ready(function () {

        $('.close-btn, .overlay').on('click', function () {
            $('#sidebar-menu').removeClass('active');
            $('.overlay').removeClass('active');
        });

        $('#sidebar-collapse').on('click', function () {
            $('#sidebar-menu').addClass('active');
            $('.overlay').addClass('active');
        });

    });


    // back to top - start
    // --------------------------------------------------
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('#backtotop:hidden').stop(true, true).fadeIn();
        } else {
            $('#backtotop').stop(true, true).fadeOut();
        }
    });
    $(function () {
        $("#scroll").on('click', function () {
            $("html,body").animate({
                scrollTop: $("#thetop").offset().top
            }, "slow");
            return false
        })
    });
    // back to top - end
    // --------------------------------------------------


    // preloader - start
    // --------------------------------------------------
    $(window).on('load', function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });
    // preloader - end
    // --------------------------------------------------


    // main search - start
    // --------------------------------------------------
    $('.search-btn').on('click', function () {
        $('.main-search-body').toggleClass('search-open');
    });
    // main search - end
    // --------------------------------------------------


    // sticky menu - start
    // --------------------------------------------------
    var headerId = $(".sticky-header");
    $(window).on('scroll', function () {
        var amountScrolled = $(window).scrollTop();
        if ($(this).scrollTop() > 50) {
            headerId.removeClass("not-stuck");
            headerId.addClass("stuck");
        } else {
            headerId.removeClass("stuck");
            headerId.addClass("not-stuck");
        }
    });
    // sticky menu - end
    // --------------------------------------------------


})(jQuery);