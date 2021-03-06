( function ($) {
    console.log('loading child functions');
    var windowWidth = $(window).width();
    var breakpoint = 768;
  

    if(windowWidth > breakpoint) {
      $('.top-panel').css({ height: $(window).innerHeight() });
      $(window).resize(function(){
        if(windowWidth > breakpoint) {
          $('.top-panel').css({ height: $(window).innerHeight() });
        }
      });
    }
    


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


    //widget tabbing functionality
    $('.game-tabs li').click(function(evt){
      $('.game.active').removeClass('active');
      $('.game-tabs li.active').removeClass('active');
      var current = $(this).attr('class');
      $(this).addClass('active');
      $('.game.' + current).addClass('active');
    });


    $('.scroll-arrow').click(function () { 
        var scrollHeight;
      if(windowWidth > breakpoint) {
        scrollHeight = $(window).innerHeight()  - 80;
      }
      else {
        scrollHeight = 1274 + 80; 
      }

        $('html, body').animate({
            scrollTop: scrollHeight
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
        // autoplay: true,
        // autoplaySpeed: 2000,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>'
      });

      $('.featured-slider').on('afterChange', function(event,slick,i){
        $('.tabs .slick-slide').removeClass('slick-current');
        $('.tabs .slick-slide').eq(i).addClass('slick-current');             
      });


      $('.latest-posts').slick({
        slidesToScroll: 1,
        slidesToShow: 5,
        centerMode: true,
        prevArrow: '<a type="button" class="slick-prev"></a>',
        nextArrow: '<a type="button" class="slick-next"></a>',
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });

      $('featured-slider .slick-arrow').on('click focus mouseup touchend', function(){
        console.log('no more focus');
        $(this).css('background-image', 'img/arrow-left.png');
      })

    });
} )( jQuery )
