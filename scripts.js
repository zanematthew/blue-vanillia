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
            "top": "-=250px",
            "width": "+800px"
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
});
