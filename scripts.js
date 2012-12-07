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
});