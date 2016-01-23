( function ($) {
    console.log('loading child functions');

    //console.log('scroll' scrollTop());

    $('.scroll-arrow').click(function () { 
        $('html, body').animate({
            scrollTop: 864
        }, 600);
        return false;
    });

} )( jQuery )
