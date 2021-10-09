(function ($) {
"use strict";

    var LandzaiGlobal = function ($scope, $) {

        // Js Start
            $('[data-background]').each(function() {
                $(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
            });
        $(".preloader").fadeOut();
        if($('.wow').length){
            new WOW({
                offset: 100,
                mobile: true
            }).init()
        }
        jQuery(window).on('scroll', function() {
            if (jQuery(window).scrollTop() > 250) {
                jQuery('.landzai-sticky-header').addClass('sticky-on')
            } else {
                jQuery('.landzai-sticky-header').removeClass('sticky-on')
            }
        });
        $(".landzai-icon-lightbox a").magnificPopup({
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
        // Js End

    };

    var LandzaiNav = function ($scope, $) {

        $scope.find('#medi-main-builder-header').each(function () {
            var settings = $(this).data('landzai');

        // Js Start
            $('.open_mobile_menu').on("click", function() {
                $('.mobile_menu_wrap').toggleClass("mobile_menu_on");
            });
            $('.open_mobile_menu').on('click', function () {
                $('body').toggleClass('mobile_menu_overlay_on');
            });
            if($('.mobile_menu li.dropdown ul').length){
                $('.mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
                $('.mobile_menu li.dropdown .dropdown-btn').on('click', function() {
                    $(this).prev('ul').slideToggle(500);
                });
            }
        // Js End
        });

    };

    var LandzaiBrand = function ($scope, $) {

        $scope.find('.brands-area').each(function () {
            var settings = $(this).data('landzai');

        // Js Start
            $(".slide-brands").slick({
                infinite: true,
                speed: 500,
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                dots: false,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                        },
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 3,
                        },
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                        },
                    },
                ],
            });
        // Js End
        });

    };

    var LandzaiApp = function ($scope, $) {

        $scope.find('.app-screens-area').each(function () {
            var settings = $(this).data('landzai');

        // Js Start
        $(".app-screens-slide").slick({
            infinite: true,
            speed: 500,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            dots: true,
            arrows: false,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 3,
                },
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 2,
                },
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                },
              },
            ],
          });
        // Js End
        });

    };
    var LandzaiWork = function ($scope, $) {

        $scope.find('.work-area').each(function () {
            var settings = $(this).data('landzai');

        // Js Start
            var slider = $(".work-slide");
            var scrollCount = null;
            var scroll = null;
            slider.slick({
                dots: true,
                arrows: false,
                vertical: true,
                infinite: true,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
            });
            slider.on("wheel", function (e) {
                e.preventDefault();
                clearTimeout(scroll);
                scroll = setTimeout(function () {
                    scrollCount = 0;
                }, 200);
                if (scrollCount) return 0;
                scrollCount = 1;

                if (e.originalEvent.deltaY < 0) {
                    $(this).slick("slickNext");
                } else {
                    $(this).slick("slickPrev");
                }
            });

            // Js End
        });

    };


    $(window).on('elementor/frontend/init', function () {
        if (elementorFrontend.isEditMode()) {
            console.log('Elementor editor mod loaded');
            elementorFrontend.hooks.addAction('frontend/element_ready/global', LandzaiGlobal);
            elementorFrontend.hooks.addAction('frontend/element_ready/nav-builder.default', LandzaiNav);
            elementorFrontend.hooks.addAction('frontend/element_ready/landzai-brand.default', LandzaiBrand);
            elementorFrontend.hooks.addAction('frontend/element_ready/landzai-howwork.default', LandzaiWork);
            elementorFrontend.hooks.addAction('frontend/element_ready/landzai-app.default', LandzaiApp);
        }
        else {
            console.log('Elementor frontend mod loaded');
            elementorFrontend.hooks.addAction('frontend/element_ready/global', LandzaiGlobal);
            elementorFrontend.hooks.addAction('frontend/element_ready/landzai-brand.default', LandzaiBrand);
            elementorFrontend.hooks.addAction('frontend/element_ready/landzai-howwork.default', LandzaiWork);
            elementorFrontend.hooks.addAction('frontend/element_ready/landzai-app.default', LandzaiApp);
        }
    });
console.log('addon js loaded');
})(jQuery);