( function ($) {
    console.log('loading child functions');

    //console.log('scroll' scrollTop());

    $('.scroll-arrow').click(function () { 
        $('html, body').animate({
            scrollTop: 864
        }, 600);
        return false;
    });

    // $('.featured-slider').slick();
    //$('.featured-slider').slick();


    $(document).ready(function(){
      //will need to use this for the featured section
      //http://jsfiddle.net/bpbaz10L/


      $('.tabs').slick({
        slidesToShow: 3,
        asNavFor: '.featured-slider',
        centerMode: false,
        focusOnSelect: true
      });

      $('.featured-slider').slick({
        asNavFor: '.tabs',
        slidesToScroll: 1,
        //autoplay: true,
        //autoplaySpeed: 5000
        prevArrow: '<button type="button" class="slick-prev"><</button>',
        nextArrow: '<button type="button" class="slick-next">></button>'
      });

      $('.latest-posts').slick({
        slidesToScroll: 1,
        slidesToShow: 5,
        centerMode: true,
        prevArrow: '<button type="button" class="slick-prev"><</button>',
        nextArrow: '<button type="button" class="slick-next">></button>'
      });

    });
} )( jQuery )
