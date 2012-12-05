jQuery( document ).ready(function( $ ){
    /**
     * Slide toggle the items
     */
    $( '.auto-expando-handle').on( 'click', function( event ){
        event.preventDefault();
        $( this ).siblings('.auto-expando-target').slideToggle();
        $( this ).siblings( ".arrow" ).toggleClass("arrow-up");
    });
});