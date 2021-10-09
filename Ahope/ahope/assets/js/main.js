(function ($) {
 "use strict";


    $(window).on('load', function(){
        /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                  Pre-loader
        \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */
        $('.loader').addClass('completein', 700);
        setTimeout(function(){ 
          $('.preloader').addClass('complete');
          $('.preloader').remove();
        }, 10);
      });

    jQuery(document).ready(function($){ 
        /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                  Promo Video
        \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */
        $('.button-container button').on('click', function() {
            $('.box').addClass('centered');
            setTimeout(function(){
                $('.button-container button').addClass('hide');
                setTimeout(function() {
                  $('.box:first-of-type').addClass('scale');
                  $('body').addClass('no-scroll');
                    setTimeout(function(){
                        $('.overlay1').addClass('active');
                        bindBodyClick();
                    }, 700);
                }, 200);
            }, 500);
        });
        var video = document.getElementById("video1");
        function bindBodyClick() {
            $('.box.centered.scale').on('click', function() { 
                video.pause();
                $('.box.centered.scale').removeClass('scale');
                $('.overlay1').removeClass('active');
                setTimeout(function() {
                    $('.box').removeClass('centered');
                    $('body').removeClass('no-scroll');
                    setTimeout(function() {
                        $('.button-container button').removeClass('hide');
                    }, 300);
                }, 800);
            });
        }

        /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                  Counter
        \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */   
        $('.counter').counterUp({
            delay: 10,
            time: 1000,
        });
        
        /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                  Counter
        \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */   
        $('.grid').isotope({
          itemSelector: '.grid-item',
          percentPosition: true,
          masonry: {
            columnWidth: 1,
            gutter: 20,
          }
        });
        $('[data-background]').each(function() {
            $(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
        });
        jQuery(window).on('scroll', function() {
            if (jQuery(window).scrollTop() > 250) {
                jQuery('.default-ahope-header').addClass('sticky-on')
            } else {
                jQuery('.default-ahope-header').removeClass('sticky-on')
            }
        });
        $('.str-open_mobile_menu').on("click", function() {
            $('.str-mobile_menu_wrap').toggleClass("mobile_menu_on");
        });
        $('.str-open_mobile_menu').on('click', function () {
            $('body').toggleClass('mobile_menu_overlay_on');
        });
        if($('.str-mobile_menu li.dropdown ul').length){
            $('.str-mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
            $('.str-mobile_menu li.dropdown .dropdown-btn').on('click', function() {
                $(this).prev('ul').slideToggle(500);
            });
        }
        $(window).on("scroll", function(){
            var ScrollBarPosition = $(this).scrollTop();
            if(ScrollBarPosition > 200 ) {
                $(".scrolltop").fadeIn();
            } else {
                $(".scrolltop").fadeOut();
            }
        });
        $(".scrolltop").on("click", function(){
            $('body,html').animate({
                scrollTop: 0,
            });
        })
    });



    jQuery(document).ready(function($){
        /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                  Password show/hide
        \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */
        $('.pas_show').append('<i class="ptxt ti-eye"></i>');  
        $(document).on('click','.pas_show .ptxt', function(){  
          $(".pas_show .ptxt").toggleClass('show');
          $(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 
        });  

        /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                Red Star if input is requird
        \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */
        $("input[required]").siblings("label").addClass("required");
        $("select[required]").parent().siblings("label").addClass("required");
        $("select[required]").siblings("label").addClass("required");

        /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
              Accordion Card shadow on claik (faq)
        \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */
        $('.faq_area .accordion_wrapper_2 .card .btn.btn-link').on('click', function(){
            if ($(this).parent().parent().hasClass('shadow')) {
                $(this).parent().parent().siblings('.card').removeClass('shadow');
                $(this).parent().parent().removeClass('shadow');
                } 
            else {
                $(this).parent().parent().siblings('.card').removeClass('shadow');
                $(this).parent().parent().addClass('shadow');
            }
        });

        /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                  Video Popup [colorbox.js]
        \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */
         $(".youtube").colorbox({
              iframe:true,
              transition: "elastic",
              innerWidth:640,
              innerHeight:409,
              closeButton:false,
              maxWidth: '90%'
          });

        /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
              Hero area 3 animation js using jquery
        \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */
        setInterval(function(){
          // add class
          $('.hero_area_3 .swiper-slide-active .layer').addClass('animatedaa');

          // remove class
           $(" .hero_area_3 .swiper-slide-next.slide_1 .layer, .hero_area_3  .swiper-slide-prev  .layer").removeClass('animatedaa');
        });

        /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                  Search Bar
        \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */
        $('.search_icon').on('click', function(){
          $('.offcanvas_overlay, .search_bar, .search_bar_2').css({'opacity' : '1', 'display': 'inline-flex'});
        });

        $('.offcanvas_overlay').on('click', function(){
          $('.offcanvas_overlay, .search_bar, .search_bar_2').css({'opacity' : '0', 'display': 'none'});
        });

        /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                    Offcanves Menu
        \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */
        $('.offcanvas').on('click', function(){
          $('.offcanvas_overlay').css({'opacity' : '1', 'display': 'inline-flex'});
          $('.offcanvas_menu').css({'right' : '0'});
        });
        $('.offcanvas_overlay').on('click', function(){
          $('.offcanvas_menu').css({'right' : '-100%'});
        });

        /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                  Burger Icon
        \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */
        $(".burger_icon").on('click', function() {
          $(".mobile_menu").toggleClass(function () {
            return $(".mobile_menu").is('.open_menu, .close_menu') ? 'open_menu close_menu' : 'open_menu';
          });

          $(".stick").toggleClass(function () {
            return $(this).is('.open_menu, .close_menu') ? 'open_menu close_menu' : 'open_menu';
          });
        });
        /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                  Mega Menu
        \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */
        function checkWidth() {
          var windowsize = $(window).width();
            if( windowsize < 992){
          $(".hid").removeClass("collapse");
          $(".hid").addClass("collapse");
            }
            if(windowsize > 991){
              $(".hid").addClass("collapse");
              $(".hid").removeClass("collapse");
            } 
        }

        checkWidth();
        $(window).resize(checkWidth);
        // mega menu slider
        $('#mega_page_slider').carousel({
            interval: 2000,
        });
        /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                  Domain dropdown
        \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */
        if(document.getElementById("chose_domain") != null){
           document.getElementById('chose_domain').value = document.getElementById('firstItem_domain').innerText ;
        }
        $('.select_wrapper #chose_domain, .select_wrapper .arrow').on('click', function(){
          $('.select_wrapper .option_list').toggle(200, function(){
            $('.select_wrapper .option_list').toggleClass('dropon');
            $('.select_wrapper .arrow').toggleClass( 'reverce');
          });  
          event.stopPropagation();
        });
       
        var listItems2 = document.querySelectorAll(".select_wrapper ol li");
        listItems2.forEach(function(item) {
          item.onclick = function(e) {
            document.getElementById('chose_domain').value = this.innerText ;
            $('.select_wrapper .option_list').toggle(200, function(){
              $('.select_wrapper .arrow').removeClass( 'reverce');
              $('.select_wrapper .option_list').removeClass('dropon'); 
            });    
          }
        });
          // select dropdown out side click 
        $(":not(.select_wrapper #chose_domain, .select_wrapper .arrow, .select_wrapper .option_list )").on('click', function(){
          $('.select_wrapper .option_list').removeClass('dropon').hide(); 
          $('.select_wrapper .arrow').removeClass( 'reverce');
        });
       
      /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                Custom dropdown 2
      \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */
      $(".custom_select").each(function() {
        var classes = $(this).attr("class"),
            name    = $(this).attr("name");
        var template =  '<div class="' + classes + '">';
            template += '<div class="custom_select_trigger">' + $(this).attr("data-value") + '</div>';
            template += '<ul class="custom_options">';
            $(this).find("option").each(function() {
              template += '<li class="custom_option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</li>';
            });
        template += '</ul></div>';
        
        $(this).wrap('<div class="custom_select_wrapper"></div>');
        $(this).hide();
        $(this).after(template);
      });
      $(".custom_select_trigger").on("click", function() {
        $('html').on('click',function() {
          $(".custom_select").removeClass("opened");
        });
        $(this).parents(".custom_select").toggleClass("opened");
        event.stopPropagation();
      });
      $(".custom_option").on("click", function() {
        $(this).parents(".custom_select_wrapper").find('#inputservice').val($(this).data("value"));
        $(this).parents(".custom_options").find(".custom_option").removeClass("selection");
        $(this).addClass("selection");
        $(this).parents(".custom_select").removeClass("opened");
        $(this).parents(".custom_select").find(".custom_select_trigger").text($(this).text());
      });   

    });

    jQuery(document).ready(function($){
      /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                Radio pricing 4
      \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */
      function show2(){
        $('#second_toggle').on('click', function (){
            $('.packege_pricing_area_11 .tab_1').css('opacity', '0');
            $('.packege_pricing_area_11 .tab_2').css('opacity', '1');
        });
      }
      function show1(){
        $('#first_toggle').on('click', function (){
          $('.packege_pricing_area_11 .tab_1').css('opacity', '1');
          $('.packege_pricing_area_11 .tab_2').css('opacity', '0');
        });
      }

      show2();
      show1();  
      

    });




    jQuery(window).on('load', function(){
      

    });


})(jQuery);
 
