( function( $ ) {
    wp.customize.controlConstructor['cropped-image'] = wp.customize.Control.extend( {
        ready: function() {
            var control = this;
            var $container = control.container.find( '.customize-cropped_image-control' );

            // Initialize the cropping functionality
            $container.find( '.upload-button' ).cropper( {
                imgWidth: control.params.width,
                imgHeight: control.params.height,
                aspectRatio: control.params.width / control.params.height
            } );
        }
    } );
} )( jQuery );