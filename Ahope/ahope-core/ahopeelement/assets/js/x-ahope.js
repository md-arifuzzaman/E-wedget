(function ($) {
    "use strict";

    var AhopeGlobal = function ($scope, $) {

        // Js Start
        $('[data-background]').each(function () {
            $(this).css('background-image', 'url(' + $(this).attr('data-background') + ')');
        });
        $(".preloader").fadeOut();
        if ($('.wow').length) {
            new WOW({
                offset: 100,
                mobile: true
            }).init()
        }
        jQuery(window).on('scroll', function () {
            if (jQuery(window).scrollTop() > 250) {
                jQuery('.ahope-sticky-header').addClass('sticky-on')
            } else {
                jQuery('.ahope-sticky-header').removeClass('sticky-on')
            }
        });
        $(".ahope-icon-lightbox a").magnificPopup({
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
        $('[data-toggle="tooltip"]').tooltip();
        // Js End

    };

    var CDNavMenu = function ($scope, $) {

        $scope.find('.ahope-nav-builder').each(function () {
            var settings = $(this).data('ahope');

            // Js Start
            $('.str-open_mobile_menu').on("click", function () {
                $('.str-mobile_menu_wrap').toggleClass("mobile_menu_on");
            });
            $('.str-open_mobile_menu').on('click', function () {
                $('body').toggleClass('mobile_menu_overlay_on');
            });
            if ($('.str-mobile_menu li.dropdown ul').length) {
                $('.str-mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
                $('.str-mobile_menu li.dropdown .dropdown-btn').on('click', function () {
                    $(this).prev('ul').slideToggle(500);
                });
            }
            // Js End
        });

    };
    var AhopeTesti = function ($scope, $) {

        $scope.find('.testimonial_area').each(function () {
            var settings = $(this).data('ahope');

            // Js Start
            var mySwiper = new Swiper('.testimonial_wrapper.swiper-container', {
                direction: 'horizontal',
                slidesPerView: settings['item'],
                loop: true,
                centeredSlides: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 0,
                        centeredSlides: false,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    1024: {
                        slidesPerView: settings['item'],
                        spaceBetween: 30,
                    }
                }

            });
        });
        $scope.find('.testimonial_2').each(function () {
            var settings = $(this).data('ahope');

            var mySwiper = new Swiper('.testimonial_area_4', {
                direction: 'horizontal',
                slidesPerView: settings['item'],
                effect: 'fade',
                speed: 900,
                fadeEffect: {
                    crossFade: true
                },
                spaceBetween: 30,
                loop: true,
                centeredSlides: false,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                }

            });
        });
        // Js End

    };
    var AhopeBlog = function ($scope, $) {

        $scope.find('.blog_area_2').each(function () {
            var settings = $(this).data('ahope');

            // Js Start
            var mySwiper = new Swiper('.blog_carousel.swiper-container', {
                direction: 'horizontal',
                slidesPerView: settings['item'],
                loop: true,
                centeredSlides: false,
                //  autoplay: {
                //   delay: 2000,
                //   disableOnInteraction: false,
                // },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        centeredSlides: false,
                    },
                    767: {
                        slidesPerView: 2,
                        centeredSlides: false,
                    },
                    1024: {
                        slidesPerView: settings['item'],
                        centeredSlides: false,
                    },
                }

            });
            // Js End
        });

    };

    var Features2 = function ($scope, $) {

        $scope.find('.service_carousel_area_2').each(function () {
            var settings = $(this).data('ahope');

            // Js Start
            var mySwiper = new Swiper('.service_carousel', {
                direction: 'horizontal',
                slidesPerView: settings['item'],
                loop: true,
                centeredSlides: false,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    992: {
                        slidesPerView: settings['item'],
                        centeredSlides: false,
                    },
                    768: {
                        slidesPerView: 1,
                        centeredSlides: false,
                    }
                }

            });
            // Js End
        });

    };

    var pricing = function ($scope, $) {

        var settings = $(this).data('ahope');
        // Js Start
        if (document.getElementById("chose_plan") != null) {
            document.getElementById('chose_plan').value = document.getElementById('firstItem_plan').innerText;
        }
        $('.select_month_wrapper #chose_plan, .select_month_wrapper .arrow, .select_month_wrapper .split').on('click', function () {
            $('.select_month_wrapper .option_list').toggle(200, function () {
                $('.select_month_wrapper .option_list').toggleClass('dropon');
                $('.select_month_wrapper .arrow').toggleClass('reverce');
            });
            event.stopPropagation();
        });

        var listItems1 = document.querySelectorAll(".select_month_wrapper ol li");
        listItems1.forEach(function (item) {
            item.onclick = function (e) {
                document.getElementById('chose_plan').value = this.innerText;
                $('.select_month_wrapper .option_list').toggle(200, function () {
                    $('.select_month_wrapper .arrow').removeClass('reverce');
                    $('.select_month_wrapper .option_list').removeClass('dropon');

                });
                if ((this).value == 1) {
                    $('.tab_wrapper .tab_1').css('opacity', '1');
                    $('.tab_wrapper .tab_2').css('opacity', '0');
                } else {
                    $('.tab_wrapper .tab_1').css('opacity', '0');
                    $('.tab_wrapper .tab_2').css('opacity', '1');
                }
            }
        });
        // select dropdown out side click
        $(":not(.select_month_wrapper #chose_plan, .select_month_wrapper .arrow, .select_month_wrapper .option_list, .select_month_wrapper .split )").on('click', function () {
            $('.select_month_wrapper .option_list').removeClass('dropon').hide();
            $('.select_month_wrapper .arrow').removeClass('reverce');
        });
        // Js End

    };


    $(window).on('elementor/frontend/init', function () {
        if (elementorFrontend.isEditMode()) {
            console.log('Elementor editor mod loaded');
            elementorFrontend.hooks.addAction('frontend/element_ready/global', AhopeGlobal);
            elementorFrontend.hooks.addAction('frontend/element_ready/nav-builder.default', CDNavMenu);
            elementorFrontend.hooks.addAction('frontend/element_ready/ahope-testimonial.default', AhopeTesti);
            elementorFrontend.hooks.addAction('frontend/element_ready/ahope-blog.default', AhopeBlog);
            elementorFrontend.hooks.addAction('frontend/element_ready/ahope-whybest.default', Features2);
            elementorFrontend.hooks.addAction('frontend/element_ready/pricing-table.default', pricing);
        } else {
            console.log('Elementor frontend mod loaded');
            elementorFrontend.hooks.addAction('frontend/element_ready/global', AhopeGlobal);
            elementorFrontend.hooks.addAction('frontend/element_ready/ahope-testimonial.default', AhopeTesti);
            elementorFrontend.hooks.addAction('frontend/element_ready/ahope-blog.default', AhopeBlog);
            elementorFrontend.hooks.addAction('frontend/element_ready/ahope-whybest.default', Features2);
            elementorFrontend.hooks.addAction('frontend/element_ready/pricing-table.default', pricing);
        }
    });
    console.log('addon js loaded');
})(jQuery);