jQuery( document ).ready(
	function () {
		'use strict';

		jQuery( '.focus-customizer-widgets-footer' ).on( 'click', function ( e ) {
			e.preventDefault();
			wp.customize.section( 'sidebar-widgets-foot_sidebar' ).focus();
		} );

	}
);

jQuery(window).bind('load', function(){
//REPLACE DUMMY CONTENT BUTTON FUNCTIONALITY
wp.customize.previewer.bind( 'focus-frontsidebar', function(){
	wp.customize.section( 'sidebar-widgets-sidebar-homepagewidgets' ).focus();
	});

	wp.customize.previewer.bind( 'focus-homesidebar', function(){
		wp.customize.section( 'sidebar-widgets-sidebar-homepagesidebar' ).focus();
		});
});

(function() {
	wp.customize.bind( 'ready', function() {

		// Detect when the front page sections section is expanded (or closed) so we can adjust the preview accordingly.
		// Value of isExpanding will = true if you're entering the section, false if you're leaving it.

		wp.customize.panel( 'header_options', function( section ) {
			section.expanded.bind( function( isExpanding ) {

				wp.customize.previewer.send( 'section-highlight-header_options', { expanded: isExpanding });
			} );
		} );
		// Featured post sections
		wp.customize.section( 'newspaperss_homepage_featuredsettings', function( section ) {
			section.expanded.bind( function( isExpanding ) {

				wp.customize.previewer.send( 'section-highlight-homepage_featuredsettings', { expanded: isExpanding });
			} );
		} );
		// Home sections
		wp.customize.section( 'newspaperss_homepage_latestpostsettings', function( section ) {
			section.expanded.bind( function( isExpanding ) {

				wp.customize.previewer.send( 'section-highlight-homepage_latestpostsettings', { expanded: isExpanding });
			} );
		} );

		wp.customize.panel( 'newspaperssfooter_options', function( section ) {
			section.expanded.bind( function( isExpanding ) {

				wp.customize.previewer.send( 'section-highlight-footer_options', { expanded: isExpanding });
			} );
		} );

		// Navigating to a URL in the Customizer Preview when a Section is Expanded
		(function ( api ) {
				api.section( 'static_front_page', function( section ) {
						section.expanded.bind( function( isExpanded ) {
								var url;
								if ( isExpanded ) {
										url = api.settings.url.home;
										api.previewer.previewUrl.set( url );
								}
						} );
				} );
		} ( wp.customize ) );

		// Navigating to a URL in the Customizer Preview when a Section is Expanded
		(function ( api ) {
				api.panel( 'homepage_options', function( section ) {
						section.expanded.bind( function( isExpanded ) {
								var url;
								if ( isExpanded ) {
										url = api.settings.url.home;
										api.previewer.previewUrl.set( url );
								}
						} );
				} );
		} ( wp.customize ) );
	});
})( jQuery );
