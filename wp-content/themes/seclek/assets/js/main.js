jQuery(function ($) {

    'use strict';


    // Hide Mobile Menu On Click
    // Toggle Menu for Mobile
    // Preloader
    // OnePageNav
    // Sticky Nav
    // Search
    // MagnificPopup
    // CounterUp
    // Parallax Scrolling
    // Upcoming Info Window Height


    // -------------------------------------------------------------
    //  Hide Mobile Menu On Click
    // -------------------------------------------------------------

    menuHide();
    function menuHide(){
        var windowWidth = $(window).width();
        if(windowWidth < 991 ){
            $('.navbar-collapse a').on ( 'click', function (e) {
                $('.navbar-collapse').collapse('toggle');
            });
        }  
    }
 
    // -------------------------------------------------------------
    //  Toggle Menu for Mobile
    // -------------------------------------------------------------

    mobileDropdown ();
    function mobileDropdown () {
      if($('.tr-menu').length) {
        $('.tr-menu .tr-dropdown').append(function () {
          return '<i class="fa fa-caret-down icon" aria-hidden="true"></i>';
        });
        $('.tr-menu .tr-dropdown .icon').on('click', function () {
          $(this).parent('li').children('ul').slideToggle();
        });
      }
    } 

    // -------------------------------------------------------------
    //  Preloader
    // -------------------------------------------------------------

    $(window).on('load', function(){
        $('#preloader').fadeOut('slow',function(){$(this).remove();});
    });
    
    // -------------------------------------------------------------
    //  OnePageNav
    // -------------------------------------------------------------
        
    $('.navbar').onePageNav({
        filter: ':not(.external)',
    });


    // -------------------------------------------------------------
    //  Sticky Nav
    // -------------------------------------------------------------

    $(window).scroll(function() {
        var nav = $('.tr-menu');
        var $this = $(this);

        if($this.scrollTop() > 50) {
            nav.addClass('fixed-top animated fadeInDown');
        }
        else {
            nav.removeClass('fixed-top animated fadeInDown');
        }
    });


    // -------------------------------------------------------------
    // Search
    // -------------------------------------------------------------

    $('.search-icon').on("click", function(event){
        $('.open-search').css('height', '100vh');
        return false;
    });
    $('.close-search').on("click",function(event){
        $('.open-search').css('height', '0');
        return false;
    });

    // -------------------------------------------------------------
    //  MagnificPopup
    // -------------------------------------------------------------
        
    $('.video-link').magnificPopup({type:'iframe'});


    // -------------------------------------------------------------
    // CounterUp
    // -------------------------------------------------------------

    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    // -------------------------------------------------------------
    //  Parallax Scrolling
    // -------------------------------------------------------------
    $('.tr-parallax').jarallax({
        keepImg: true,
        type: 'scroll-opacity',
        
    });


    // -------------------------------------------------------------
    //  Upcoming Info Window Height
    // ------------------------------------------------------------- 
    var height = $(window).height();
    $(".upcoming-info").innerHeight(height);

    // -------------------------------------------------------------
    //  Comment Reply Visiblity
    // ------------------------------------------------------------- 
    $('.comment-reply-link').on('click', function(){
        $('.tr-comments').hide();
    });

    $('a#cancel-comment-reply-link').on('click', function(){
        $('.tr-comments').show();
    });  

// script end
});



