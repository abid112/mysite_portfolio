<?php
class IncludeCssJs {

	public static function kyte_add_css_js(){

		$src_css =  get_template_directory_uri()."/";

		$css_file = kyte_return_theme_option('color_option');
		if($css_file==null){
			$css_file = 'red';
		}
		$protocol = is_ssl() ? 'https' : 'http';
		$css =array(
				'Droid'=>$protocol.'://fonts.googleapis.com/css?family=Droid+Serif:400,700',
				'Montserrat'=>$protocol.'://fonts.googleapis.com/css?family=Montserrat:400,700',
				'stylecss'=>'style.css',
				'bootstrap'=>'includes/css/bootstrap.css',
				'twitter'=>'includes/css/twitter.css',
				'preloader'=>'includes/css/preloader.css',
				'style'=>'includes/css/style.css',
				'animate'=>'includes/css/animate.css',
				'font-awesome'=>'includes/css/font-awesome.css',
				'gmap'=>'includes/css/gmap.css',
				'owl.carousel'=>'includes/css/carousel/owl.carousel.css',
				'owl.theme'=>'includes/css/carousel/owl.theme.css',
				$css_file=>'includes/css/colors/'.$css_file.'.css'
		);
			
		foreach ($css as $key=>$value){
			if($key=='Droid' || $key=='Montserrat'){
				wp_register_style($key, $value);
			}else{
			wp_register_style($key, $src_css.$value);
			}
			wp_enqueue_style($key);
		}
			
		
			
	}

	
}