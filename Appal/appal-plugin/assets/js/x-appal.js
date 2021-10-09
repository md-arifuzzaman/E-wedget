(function ($) {
    "use strict";

    var AppalGlobal = function ($scope, $) {

        // Js Start
        $('[data-background]').each(function () {
            $(this).css('background-image', 'url(' + $(this).attr('data-background') + ')');
        });

        $(".ahope-icon-lightbox a, .popup-video").magnificPopup({
            type: 'iframe',
            iframe: {
                patterns: {
                    youtube: {
                        index: 'youtube.com/',
                        id: 'v=',
                        src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                    },
                    vimeo: {
                        index: 'vimeo.com/',
                        id: '/',
                        src: '//player.vimeo.com/video/%id%?autoplay=1'
                    },
                    gmaps: {
                        index: '//maps.google.',
                        src: '%id%&output=embed'
                    }
                },
                srcAction: 'iframe_src',
            }
        });
        // scroll animation - start
        // --------------------------------------------------
        AOS.init({});
        // scroll animation - end
        // --------------------------------------------------

        // mobileapp-main-carousel - end
        // --------------------------------------------------
        $('#mobileapp-main-carousel').owlCarousel({
            items: 1,
            margin: 0,
            nav: false,
            loop: true,
            dots: true,
            autoHeight: true,
            // autoplay:true,
            smartSpeed: 1000,
            // animateIn: 'fadeIn',
            autoplayTimeout: 6000
        });
        // mobileapp-main-carousel - end
        // --------------------------------------------------


        // appstore-main-carousel - end
        // --------------------------------------------------
        $('#appstore-main-carousel').owlCarousel({
            items: 1,
            margin: 0,
            nav: true,
            loop: true,
            dots: false,
            autoplay: true,
            smartSpeed: 1000,
            // animateIn: 'fadeIn',
            autoplayTimeout: 6000
        });
        // appstore-main-carousel - end
        // --------------------------------------------------


        // client-carousel - start
        // --------------------------------------------------
        $('#client-carousel').owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            autoplay: true,
            smartSpeed: 1000,
            autoplayTimeout: 3500,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: true
                },
                1000: {
                    items: 5,
                    nav: false
                },
                1920: {
                    items: 5,
                    nav: false
                }
            }
        });
        // client-carousel - end
        // --------------------------------------------------


        // service-carousel - start
        // --------------------------------------------------
        $('#service-carousel').owlCarousel({
            loop: true,
            margin: 30,
            merge: true,
            // center: true,
            autoplay: true,
            smartSpeed: 1000,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    dots: false
                },
                600: {
                    items: 3,
                    nav: true,
                    dots: false
                },
                1000: {
                    items: 4,
                    nav: false,
                    dots: true
                },
                1200: {
                    items: 5,
                    nav: false,
                    dots: false
                },
                1920: {
                    items: 5,
                    nav: false,
                    dots: false
                }
            }
        });
        // service-carousel - end
        // --------------------------------------------------


        // testimonial-carousel - start
        // --------------------------------------------------
        $('#testimonial-carousel').owlCarousel({
            items: 1,
            nav: true,
            loop: true,
            margin: 80,
            dots: false,
            merge: true,
            center: true,
            autoplay: true,
            smartSpeed: 1000,
            autoplayTimeout: 5000,
            autoplayHoverPause: true
        });
        // testimonial-carousel - end
        // --------------------------------------------------


        // blog-carousel - start
        // --------------------------------------------------
        $('#blog-carousel').owlCarousel({
            nav: true,
            loop: true,
            margin: 30,
            autoplay: true,
            smartSpeed: 1000,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    dots: false
                },
                600: {
                    items: 2,
                    dots: false
                },
                1000: {
                    items: 3,
                    nav: false
                },
                1920: {
                    items: 3,
                    nav: false
                }
            }
        });
        // blog-carousel - end
        // --------------------------------------------------
        // Counter - start
        // --------------------------------------------------
        $('.count-text').appear(function () {
            $('.count-text').countTo();
        }, {
            accY: -100
        });
        // Counter - end
        // --------------------------------------------------

        // multy count down - start
        // --------------------------------------------------
        $('.countdown-list').each(function () {
            $('[data-countdown]').each(function () {
                var $this = $(this), finalDate = $(this).data('countdown');
                $this.countdown(finalDate, function (event) {
                    var $this = $(this).html(event.strftime(''
                        + '<li class="timer-item days"><strong>%D</strong><small>days</small></li>'
                        + '<li class="timer-item hours"><strong>%H</strong><small>hours</small></li>'
                        + '<li class="timer-item mins"><strong>%M</strong><small>mins</small></li>'
                        + '<li class="timer-item seco"><strong>%S</strong><small>seco</small></li>'));
                });
            });

        });
        // multy count down - end
        // --------------------------------------------------
        // Js End

    };


    $(window).on('elementor/frontend/init', function () {
        if (elementorFrontend.isEditMode()) {
            console.log('Elementor editor mod loaded');
            elementorFrontend.hooks.addAction('frontend/element_ready/global', AppalGlobal);
        } else {
            console.log('Elementor frontend mod loaded');
            elementorFrontend.hooks.addAction('frontend/element_ready/global', AppalGlobal);
        }
    });
    console.log('addon js loaded');
})(jQuery);