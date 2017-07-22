<?php

if( !function_exists ('reversal_enqueue_scripts') ) :
	function reversal_enqueue_scripts() {
		//vendor
	
		$content_array = array( 'some_string1' => esc_attr(kyte_return_theme_option('profilecontent')), 'a_value' => '10' );
		$latitude = array( 'some_string2' => esc_attr(kyte_return_theme_option('lat')), 'a_value' => '30' );
		$longitude = array( 'some_string3' => esc_attr(kyte_return_theme_option('lng')), 'a_value' => '30' );
		$twittercd = array( 'some_string4' => esc_attr(kyte_return_theme_option('twittercode')), 'a_value' => '30' );

		wp_enqueue_script('fastclickjs', get_template_directory_uri() . '/includes/js/vendor/fastclick.js', array('jquery'), '1.0',true);
		wp_enqueue_script('validatejs', get_template_directory_uri() . '/includes/js/vendor/jquery.validate.min.js', array('jquery'), '1.0',true);
		wp_enqueue_script('typerjs', get_template_directory_uri() . '/includes/js/vendor/jquery.typer.js', array('jquery'), '1.0',true);
		wp_enqueue_script('masonryjs', get_template_directory_uri() . '/includes/js/vendor/masonry.pkgd.min.js', array('jquery'), '1.0',true);
		wp_enqueue_script('shufflejs', get_template_directory_uri() . '/includes/js/vendor/jquery.shuffle.min.js', array('jquery'), '1.0',true);
		wp_enqueue_script('morphextjs', get_template_directory_uri() . '/includes/js/vendor/morphext.min.js', array('jquery'), '1.0',true);
		wp_enqueue_script('twitterFetcherjs', get_template_directory_uri() . '/includes/js/vendor/twitterFetcher.min.js', array('jquery'), '1.0',true);
		wp_enqueue_script('switchajs', get_template_directory_uri() . '/includes/js/switch/styleswitch.js', array('jquery'), '1.0',true);
		//menu
		wp_enqueue_script('smoothScrollsjs', get_template_directory_uri() . '/includes/js/smoothScrolls.js', array('jquery'), '1.0',true);
		wp_enqueue_script('prefixfreejs', get_template_directory_uri() . '/includes/js/prefixfree.min.js', array('jquery'), '1.0',true);
		wp_enqueue_script('carouseljs', get_template_directory_uri() . '/includes/js/owl.carousel.min.js', array('jquery'), '1.0',true);
		wp_enqueue_script('mainjs', get_template_directory_uri() . '/includes/js/main.js', array('jquery'), '1.0',true);
		wp_localize_script( 'mainjs', 'object_name1', $content_array );
		wp_enqueue_script('twitterjs', get_template_directory_uri() . '/includes/js/twitter.js', array('jquery'), '1.0',true);
		wp_localize_script( 'twitterjs', 'object_name4', $twittercd );
		wp_enqueue_script('gmapjs', get_template_directory_uri() . '/includes/js/gmap.js', array('jquery'), '1.0',true);
		wp_localize_script( 'gmapjs', 'object_name2', $latitude );
		wp_localize_script( 'gmapjs', 'object_name3', $longitude );
		wp_enqueue_script('jdshfgs','http://maps.google.com/maps/api/js?sensor=true/false',array('jquery'), '1.0',true);
		//prettyPhoto
		
}
	add_action('wp_enqueue_scripts', 'reversal_enqueue_scripts');
endif;