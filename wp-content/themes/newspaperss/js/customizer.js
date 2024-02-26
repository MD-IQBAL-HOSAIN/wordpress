/**
 * Handles the customizer live preview settings.
 */
( function( $ ) {

		var api = wp.customize;

		// Site title and description.
		api( 'blogname', function( value ) {
			value.bind( function( to ) {
				$( '.site-title a' ).text( to );
			} );
		} );
		api( 'blogdescription', function( value ) {
			value.bind( function( to ) {
				$( '.site-description' ).text( to );
			} );
		} );


	// add class  body.
	api( 'footerwid_row_control', function( value ) {
		value.bind( function( to ) {
			$( '#footer' ).find( '.sidebar-footer' ).

			removeClass('large-12 large-6 large-4 large-3' ).
			addClass(to );
		} );
	} );


	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css({
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute'
				});
				// Add class for different logo styles if title and description are hidden.
				$( 'body' ).addClass( 'title-tagline-hidden' );
			} else {

				// Check if the text color has been removed and use default colors in theme stylesheet.
				if ( ! to.length ) {
					$( '#newspaperss-custom-header-styles' ).remove();
				}
				$( '.site-title, .site-description' ).css({
					clip: 'auto',
					position: 'relative'
				});
				$( '#site-title .site-title a, .site-description, .site-description a' ).css({
					color: to
				});
				// Add class for different logo styles if title and description are visible.
				$( 'body' ).removeClass( 'title-tagline-hidden' );
			}
		});
	}); 

	wp.customize.bind('preview-ready', function() {
		wp.customize.preview.bind('section-highlight-header_options', function(data) {
			// When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
			if (true === data.expanded) {
				Foundation.SmoothScroll.scrollToLoc('#header-top', {
					threshold: 50,
					duration: 400,
					offset: 100
				}, function() {
					console.log('scrolled');
				});
			}
		});
		wp.customize.preview.bind('section-highlight-homepage_featuredsettings', function(data) {
			// When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
			if (true === data.expanded) {
				Foundation.SmoothScroll.scrollToLoc('.featured-section', {
					threshold: 50,
					duration: 400,
					offset: 100
				}, function() {
					console.log('scrolled');
				});
			}
		});
		wp.customize.preview.bind('section-highlight-footer_options', function(data) {
			// When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
			if (true === data.expanded) {
				Foundation.SmoothScroll.scrollToLoc('#footer', {
					threshold: 50,
					duration: 400,
					offset: 100
				}, function() {
					console.log('scrolled');
				});
			}
		});
		wp.customize.preview.bind('section-highlight-homepage_latestpostsettings', function(data) {
			// When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
			if (true === data.expanded) {
				Foundation.SmoothScroll.scrollToLoc('#blog-content', {
					threshold: 50,
					duration: 400,
					offset: 100
				}, function() {
					console.log('scrolled');
				});
			}
		});
		});
} )( jQuery ); // jQuery( document ).ready

jQuery(window).ready(function() {
//Replace Button
jQuery('.add_widget_home').on( 'click', function ( e ) {
	e.preventDefault();
	wp.customize.preview.send( 'focus-frontsidebar');
});
//Replace Button
jQuery('.add_widget_homeside').on( 'click', function ( e ) {
	e.preventDefault();
	wp.customize.preview.send( 'focus-homesidebar');
});

});
