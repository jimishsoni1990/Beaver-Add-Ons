<?php 
	$global_settings = FLBuilderModel::get_global_settings();
	
	if( $settings->ic_setting_arrows == 'always'){
		$arrows 			= 'true';
		$arrows_medium 		= 'true';
		$arrows_responsive	= 'true';
	} else if( $settings->ic_setting_arrows == 'desktop'){ // large device only
		$arrows 			= 'true';
		$arrows_medium 		= 'false';
		$arrows_responsive	= 'false';
	} else if( $settings->ic_setting_arrows == 'desktop-medium'){ //Large & Medium Devices Only
		$arrows 			= 'true';
		$arrows_medium 		= 'true';
		$arrows_responsive	= 'false';
	} else if( $settings->ic_setting_arrows == 'medium'){ // Medium Devices Only
		$arrows 			= 'false';
		$arrows_medium 		= 'true';
		$arrows_responsive	= 'false';
	} else if( $settings->ic_setting_arrows == 'medium-mobile'){ // Medium & Small Devices Only
		$arrows 			= 'false';
		$arrows_medium 		= 'true';
		$arrows_responsive	= 'true';
	} else if( $settings->ic_setting_arrows == 'mobile'){ // Mobile Devices Only
		$arrows 			= 'false';
		$arrows_medium 		= 'false';
		$arrows_responsive	= 'true';
	} else { // none
		$arrows 			= 'false';
		$arrows_medium 		= 'false';
		$arrows_responsive	= 'false';
	}

	if( $settings->ic_setting_dots == 'always'){
		$dots 				= 'true';
		$dots_medium 		= 'true';
		$dots_responsive	= 'true';
	} else if( $settings->ic_setting_dots == 'desktop'){ // large device only
		$dots 				= 'true';
		$dots_medium 		= 'false';
		$dots_responsive	= 'false';
	} else if( $settings->ic_setting_dots == 'desktop-medium'){ //Large & Medium Devices Only
		$dots 				= 'true';
		$dots_medium 		= 'true';
		$dots_responsive	= 'false';
	} else if( $settings->ic_setting_dots == 'medium'){ // Medium Devices Only
		$dots 				= 'false';
		$dots_medium 		= 'true';
		$dots_responsive	= 'false';
	} else if( $settings->ic_setting_dots == 'medium-mobile'){ // Medium & Small Devices Only
		$dots 				= 'false';
		$dots_medium 		= 'true';
		$dots_responsive	= 'true';
	} else if( $settings->ic_setting_dots == 'mobile'){ // Mobile Devices Only
		$dots 				= 'false';
		$dots_medium 		= 'false';
		$dots_responsive	= 'true';
	} else { // none
		$dots 				= 'false';
		$dots_medium 		= 'false';
		$dots_responsive	= 'false';
	}
?>
(function($) {

	$(document).ready(function() {
		$('#ic-slider-<?php echo $id; ?>').slick({
			autoplay: <?php echo $settings->ic_setting_autoplay == 1 ? 'true' : 'false'; ?>,
			slidesToShow : <?php echo $settings->ic_setting_slides_to_show; ?>,
			slidesToScroll : <?php echo $settings->ic_setting_slides_to_scroll; ?>,
			arrows: <?php echo $arrows; ?>,
			dots:  <?php echo $dots; ?>,
			responsive: [
						    {
						      breakpoint: <?php echo $global_settings->medium_breakpoint; ?>,
						      settings: {
						        slidesToShow: <?php echo $settings->ic_setting_slides_to_show_medium != '' ? $settings->ic_setting_slides_to_show_medium : $settings->ic_setting_slides_to_show; ?>,
						        slidesToScroll: <?php echo $settings->ic_setting_slides_to_scroll_medium != '' ? $settings->ic_setting_slides_to_scroll_medium : $settings->ic_setting_slides_to_scroll; ?>,
						        arrows: <?php echo $arrows_medium; ?>,
								dots:  <?php echo $dots_medium; ?>
						      }
						    },
						    {
						      breakpoint: <?php echo $global_settings->responsive_breakpoint; ?>,
						      settings: {
						        slidesToShow: <?php echo $settings->ic_setting_slides_to_show_responsive != '' ? $settings->ic_setting_slides_to_show_responsive : $settings->ic_setting_slides_to_show; ?>,
						        slidesToScroll: <?php echo $settings->ic_setting_slides_to_scroll_responsive != '' ? $settings->ic_setting_slides_to_scroll_responsive : $settings->ic_setting_slides_to_scroll; ?>,
						        arrows: <?php echo $arrows_responsive; ?>,
								dots:  <?php echo $dots_responsive; ?>
						      }
						    }
						]
		});
	});
})(jQuery);