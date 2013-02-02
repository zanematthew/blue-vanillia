jQuery( document ).ready(function( $ ){

    $(".chzn-select").chosen();

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
        $('.' + monthName[ i ] + ':first:visible').fadeIn().before('<div class="zigzag"><div class="padding">'+monthName[ i ]+'</div></div>');
    };


    $.ajaxSetup({
        url: ajaxurl,
        type: "POST"
    });


    $('.zm-type-list a').on('click', function(){

        var $this = $(this);
        var hashTag = $this.attr('href');

        if ( hashTag[0] !== '/' || hashTag.length < 2 )
            return false;

        hashTag = hashTag.substr(2).replace("-"," ");
        results = feeds.doSearch( 'events', hashTag );

        $('.zm-type-list a').removeClass('current');
        $this.addClass('current');

        displayResults( results );
        // $('#search_target').fadeOut( 150 );
        // $('#search_target').fadeIn( 100 );
    });

    $('#zm_ev_settings_form').on('submit', function( event ){
        event.preventDefault();
        var _this = $(this);

        $('#zm_ev_settings_form .row').css("opacity",".25");
        $('#zm_ev_settings_form input[type="submit"]').val('Updating...');

        $.ajax({
            data: _this.serialize() + '&action=zm_ev_save_user_settings',
            success: function( msg ){
                _user.settings = $.parseJSON( msg );
                $('#zm_ev_settings_form .row').css("opacity","1");
                $('#zm_ev_settings_form input[type="submit"]').val('Updated!');
            }
        });
    });

    // Part of json plugin
    // $(document).on('mouseenter', '.home .row-container .row', function(){
    //     if ( $('.tmp-result').length > 0 ){
    //         $('.tmp-result').remove();
    //     }
    //     if ( $('.home .row-container').children().hasClass('tmp-boo') )
    //         $('.home .row-container').children().removeClass('tmp-boo');

    //     $(this).addClass('tmp-boo');
    //     $(this).append('<div class="tmp-result">Results</div>');
    // });
});
