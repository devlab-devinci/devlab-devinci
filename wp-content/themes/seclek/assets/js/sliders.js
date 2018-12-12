jQuery(function ($) {

	// -------------------------------------------------------------
    //  Slick Slider
    // -------------------------------------------------------------  

    $(".testimonial-slider").slick({
        infinite: true,
        dots: true,
        arrows: false,
        slidesToShow: 1,
        autoplay:true,
        autoplaySpeed:10000,
        slidesToScroll: 1
    }); 

    $(".brand-slider").slick({
        infinite: true,
        dots: false,
        slidesToShow: 4,
        autoplay:true,
        autoplaySpeed:10000,
        slidesToScroll: 4,
        nextArrow: '<i class="fa fa-angle-left"></i>',
        prevArrow: '<i class="fa fa-angle-right"></i>',
        responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 500,
          settings: {
            slidesToShow: 1,
          }
        }
        ]       
    });
    
});