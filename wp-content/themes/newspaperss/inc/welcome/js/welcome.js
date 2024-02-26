jQuery(document).ready(function() {

  var counter = jQuery('#counter-count').data('counter');
  if ( counter != '0')  {  
    jQuery('li.newspaperss-w-red-tab a').append('<span class="newspaperss-actions-count">' + counter + '</span>');
  } else {
    jQuery('.newspaperss-tab').removeClass( 'newspaperss-w-red-tab' );
  }
	/* Tabs in welcome page */
	function newspaperss_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".newspaperss-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}

	var newspaperss_actions_anchor = location.hash;

	if( (typeof newspaperss_actions_anchor !== 'undefined') && (newspaperss_actions_anchor != '') ) {
		newspaperss_welcome_page_tabs('a[href="'+ newspaperss_actions_anchor +'"]');
	}

    jQuery(".newspaperss-nav-tabs a").click(function(event) {
        event.preventDefault();
		newspaperss_welcome_page_tabs(this);
    });

 /* Tab Content height matches admin menu height for scrolling purpouses */
		$tab = jQuery('.newspaperss-tab-content > div');
		$admin_menu_height = jQuery('#adminmenu').height();
    if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
  {
		$newheight = $admin_menu_height - 180;
		$tab.css('min-height',$newheight);
  }
});
