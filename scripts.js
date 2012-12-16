jQuery( document ).ready(function( $ ){
    /**
     * Slide toggle the items
     */
    $( '.auto-expando-handle').on( 'click', function( event ){
        event.preventDefault();
        $( this ).siblings('.auto-expando-target').slideToggle();
        $( this ).siblings( ".arrow" ).toggleClass("arrow-up");
    });

    $(window).load(function(){
        $('#image-pane img').animate({
            "top": "-250px",
            "width": "+800px"
        }, 9000 );

        $('.home .image-pane img').animate({
            "top": "-20px",
            "width": "+1400px"
        }, 9000 );
    });

    $('#searchform input[type="text"]').on('focus', function(){
        $('.search-bar-container').animate({
            "width": "335px"
        }, "fast");
    });

    $('#searchform input[type="text"]').on('blur', function(){
        $('.search-bar-container').animate({
            "width": "187px"
        }, "fast");
    });

    // var monthName = new Array(
    //     "jan",
    //     "feb",
    //     "mar",
    //     "apr",
    //     "may",
    //     "jun",
    //     "jul",
    //     "aug",
    //     "sep",
    //     "oct",
    //     "nov",
    //     "dec"
    // );

    var monthName = new Array(
        "january",
        "february",
        "march",
        "april",
        "may",
        "june",
        "july",
        "august",
        "september",
        "october",
        "november",
        "december"
        );

    for (var i=0; i<monthName.length; i++ ) {
        $('.' + monthName[ i ] + ':first:visible').fadeIn().before('<div class="zigzag">'+monthName[ i ]+'</div>');
    };
});
