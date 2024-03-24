( function( $ ) {
    wp.customize( 'my_theme_background_color', function( value ) {
        value.bind( function( to ) {
            $( 'body' ).css( 'background-color', to );
        } );
    } );

    wp.customize( 'my_theme_text_color', function( value ) {
        value.bind( function( to ) {
            $( 'body' ).css( 'color', to );
        } );
    } );
} )( jQuery );