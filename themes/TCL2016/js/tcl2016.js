( function ($) {
    console.log('loading child functions');
  
    $('.top-panel').css({ height: $(window).innerHeight() });
    $(window).resize(function(){
      $('.top-panel').css({ height: $(window).innerHeight() });
    });


    // Video functionality
    var vid = document.getElementById("bgvid");
    function vidFade() {
      vid.classList.add("stopfade");
    }

    vid.addEventListener('ended', function()
    {
    // only functional if "loop" is removed 
    vid.pause();
    // to capture IE10
    vidFade();
    }); 

    $('.scroll-arrow').click(function () { 
        $('html, body').animate({
            scrollTop: $(window).innerHeight() - 80
        }, 600);
        return false;
    });


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
