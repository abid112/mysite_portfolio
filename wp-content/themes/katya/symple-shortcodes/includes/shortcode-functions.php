<?php
/**
*
*
*
 * Allow shortcodes in widgets
 * @since v1.0
 */
add_filter('widget_text', 'do_shortcode');

// Kyte Shortcode Start Here


if(! function_exists('ky_page_head_shortcode')){
	function ky_page_head_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'slogan'=>'',
			'icon'=>'fa-file-o',
			
					

			), $atts) );
		$html='';
		global $post;
		$html .= '<div class="expand add-expand">';
		$html .= '<h1>';
		$html .= get_the_title();
		$html .= '</h1>';
		$html .= '<div class="detail">';
		$html .= get_post_meta($post->ID,'rnr_slogant',true);
		$html .= '</div>';
		$html .= '<div class="icon icon-left fa ';
		$html .= get_post_meta($post->ID,'rnr_picon',true);
		$html .= '"></div>';
		$html .= '</div>';
		$html .= '<div class="main-content">';
		$html .= '<a href="#';

		$html .= get_the_title();
		$html .= '" class="close-icon expand"></a>';
		$html .= do_shortcode($content);
		$html .= '</div>';
			
		return $html;
	}
	add_shortcode('ky_page_head', 'ky_page_head_shortcode');
}

// Kyte Resume Shortcode

if(! function_exists('ky_resume_head_shortcode')){
	function ky_resume_head_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			
			), $atts) );
		$html='';
		$html .= '<h1 class="title">'.$title.'</h1>';
		$html .= '<div class="row">';
		$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;
	}
	add_shortcode('ky_resume_head', 'ky_resume_head_shortcode');
}

// resume Experience Shortcode

if(! function_exists('ky_experience_shortcode')){
	function ky_experience_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			
			), $atts) );
		$html='';
		$html .= '<div class="col-md-6">';
		$html .= '<h2 class="title">'.$title.'</h2>';
		$html .= '<div id="timeline">';
		global $post;
		query_posts(array(
        'post_type' => 'resume',
        'showposts' => -1
        ));
        while ( have_posts() ) : the_post();
        $html .= '<div class="timeline-item">';
        $html .= '<div class="briefcase fa fa-briefcase"></div>';
        $html .= '<div class="job">';
        $html .= '<h2 class="job-title">';
        $html .= get_the_title();
        $html .= '<span>';
        $html .= ' - ';
        $html .= get_post_meta($post->ID,'rnr_dg_name',true);
        $html .= '</span></h2>';
        $html .= '<h3 class="year">';
        $html .= get_post_meta($post->ID,'rnr_time_dur',true);
        $html .= '</h3>';
        $html .= '<div class="job-detail">';
        $html .= get_the_content();
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        endwhile; 
        wp_reset_query();
        $html .= '</div>';
        $html .= '</div>';

		return $html;
	}
	add_shortcode('ky_experience', 'ky_experience_shortcode');
}


// Kyte Skill & testimonial Shortcode

if(! function_exists('kky_skill_testimonial_shortcode')){
	function kky_skill_testimonial_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			
			), $atts) );
		$ky_options = get_option('kyte_theme');
		$html='';
		$html .= '<div class="col-md-5">';
		
		$html .= '<div id="skills">';
		$html .= '<h2 class="title">';
		$html .= esc_attr(kyte_return_theme_option('skilltitle'));
		$html .= '</h2>';

		if (kyte_return_theme_option('sk1')=='yes'){
		$html .= '<div class="skill-item">';
		$html .= '<h3 class="skill-title">';
		$html .= esc_attr(kyte_return_theme_option('skilln1'));
		$html .= '</h3>';
		$html .= '<div class="skill-bar-bg" data-percent="';
		$html .= esc_attr(kyte_return_theme_option('skill1'));
		$html .= '">';
		$html .= '<div class="skill-bar"></div>';
		$html .= '</div>';
		$html .= '</div>';
		}
		if (kyte_return_theme_option('sk2')=='yes'){
		$html .= '<div class="skill-item">';
		$html .= '<h3 class="skill-title">';
		$html .= esc_attr(kyte_return_theme_option('skilln2'));
		$html .= '</h3>';
		$html .= '<div class="skill-bar-bg" data-percent="';
		$html .= esc_attr(kyte_return_theme_option('skill2'));
		$html .= '">';
		$html .= '<div class="skill-bar"></div>';
		$html .= '</div>';
		$html .= '</div>';
		}
		if (kyte_return_theme_option('sk3')=='yes'){
		$html .= '<div class="skill-item">';
		$html .= '<h3 class="skill-title">';
		$html .= esc_attr(kyte_return_theme_option('skilln3'));
		$html .= '</h3>';
		$html .= '<div class="skill-bar-bg" data-percent="';
		$html .= esc_attr(kyte_return_theme_option('skill3'));
		$html .= '">';
		$html .= '<div class="skill-bar"></div>';
		$html .= '</div>';
		$html .= '</div>';
		}
		if (kyte_return_theme_option('sk4')=='yes'){
		$html .= '<div class="skill-item">';
		$html .= '<h3 class="skill-title">';
		$html .= esc_attr(kyte_return_theme_option('skilln4'));
		$html .= '</h3>';
		$html .= '<div class="skill-bar-bg" data-percent="';
		$html .= esc_attr(kyte_return_theme_option('skill4'));
		$html .= '">';
		$html .= '<div class="skill-bar"></div>';
		$html .= '</div>';
		$html .= '</div>';
		}
		if (kyte_return_theme_option('sk5')=='yes'){
		$html .= '<div class="skill-item">';
		$html .= '<h3 class="skill-title">';
		$html .= esc_attr(kyte_return_theme_option('skilln5'));
		$html .= '</h3>';
		$html .= '<div class="skill-bar-bg" data-percent="';
		$html .= esc_attr(kyte_return_theme_option('skill5'));
		$html .= '">';
		$html .= '<div class="skill-bar"></div>';
		$html .= '</div>';
		$html .= '</div>';
		}
		if (kyte_return_theme_option('sk6')=='yes'){
		$html .= '<div class="skill-item">';
		$html .= '<h3 class="skill-title">';
		$html .= esc_attr(kyte_return_theme_option('skilln6'));
		$html .= '</h3>';
		$html .= '<div class="skill-bar-bg" data-percent="';
		$html .= esc_attr(kyte_return_theme_option('skill6'));
		$html .= '">';
		$html .= '<div class="skill-bar"></div>';
		$html .= '</div>';
		$html .= '</div>';
		}
		if (kyte_return_theme_option('sk7')=='yes'){
		$html .= '<div class="skill-item">';
		$html .= '<h3 class="skill-title">';
		$html .= esc_attr(kyte_return_theme_option('skilln7'));
		$html .= '</h3>';
		$html .= '<div class="skill-bar-bg" data-percent="';
		$html .= esc_attr(kyte_return_theme_option('skill7'));
		$html .= '">';
		$html .= '<div class="skill-bar"></div>';
		$html .= '</div>';
		$html .= '</div>';
		}
		if (kyte_return_theme_option('sk8')=='yes'){
		$html .= '<div class="skill-item">';
		$html .= '<h3 class="skill-title">';
		$html .= esc_attr(kyte_return_theme_option('skilln8'));
		$html .= '</h3>';
		$html .= '<div class="skill-bar-bg" data-percent="';
		$html .= esc_attr(kyte_return_theme_option('skill8'));
		$html .= '">';
		$html .= '<div class="skill-bar"></div>';
		$html .= '</div>';
		$html .= '</div>';
		}
		if (kyte_return_theme_option('sk9')=='yes'){
		$html .= '<div class="skill-item">';
		$html .= '<h3 class="skill-title">';
		$html .= esc_attr(kyte_return_theme_option('skilln9'));
		$html .= '</h3>';
		$html .= '<div class="skill-bar-bg" data-percent="';
		$html .= esc_attr(kyte_return_theme_option('skill9'));
		$html .= '">';
		$html .= '<div class="skill-bar"></div>';
		$html .= '</div>';
		$html .= '</div>';
		}
		if (kyte_return_theme_option('sk10')=='yes'){
		$html .= '<div class="skill-item">';
		$html .= '<h3 class="skill-title">';
		$html .= esc_attr(kyte_return_theme_option('skilln10'));
		$html .= '</h3>';
		$html .= '<div class="skill-bar-bg" data-percent="';
		$html .= esc_attr(kyte_return_theme_option('skill10'));
		$html .= '">';
		$html .= '<div class="skill-bar"></div>';
		$html .= '</div>';
		$html .= '</div>';
		}

		$html .= '</div>';
		
		$html .= '<div id="testimonials">';
		$html .= '<h2 class="title">'.$title.'</h2>';
		$html .= '<div id="carousel-container" class="owl-carousel owl-theme">';
		global $post;
		query_posts(array(
        'post_type' => 'testimonial',
        'showposts' => -1
        ));
        while ( have_posts() ) : the_post();
		$html .= '<div class="item testi-item">';
		$html .= '<div class="testi-profile">';
		$url= wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'homepage-thumb') );

		$html .= '<img src="';
		$html .= $url;
		$html .= '" alt="testimonial profile">';
		$html .= '<div class="detail">';
		$html .= '<h3>';
		$html .= get_the_title();
		$html .= '</h3>';
		$html .= '<h4>';
		$html .= get_post_meta($post->ID,'rnr_organi_name',true);
		$html .= '</h4>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<div class="words">';
		$html .= get_the_content();
		$html .= '</div>';
		$html .= '</div>';
		endwhile; 
        wp_reset_query();
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';


		return $html;
	}
	add_shortcode('ky_skill_testimonial', 'kky_skill_testimonial_shortcode');
}

// Kyte Portfolio Shortcode


if(! function_exists('ky_Portfolio_shortcode')){
	function ky_Portfolio_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			
			), $atts) );
		$html='';
		$html .= '<h1 class="title">'.$title.'</h1>';
		global $post;
		if(!get_post_meta(get_the_ID(), 'portfolio_category', true)):
        $portfolio_category = get_terms('portfolio_category');
        if($portfolio_category):
        $html .= '<ul id="filter">';
    	$html .= '<li><a href="#" data-group="all">All</a></li>';
    	foreach($portfolio_category as $portfolio_cat):
    	$html .= '<li><a href="#" data-group="';
    	$html .= $portfolio_cat->slug;
    	$html .= '">';
    	$html .= $portfolio_cat->name;
    	$html .= '</a></li>';
    	endforeach;
    	$html .= '</ul>';
    	endif;
    	endif;
    	$html .= '<div id="portfolio-container">';
    	query_posts(array(
        'post_type' => 'portfolio',
        'showposts' => -1
    	));
    	while ( have_posts() ) : the_post();
    	$portfolio_category = wp_get_post_terms($post->ID,'portfolio_category');
    	$html .= '<div class="portfolio-item" data-groups=[';
    	$html .= '"all"';
    	foreach ($portfolio_category as $item);
    	$html .= ',"' . $item->slug . '"] >';
    	
    	$html .= '<a class="overlay" href="';
    	$html .= get_the_permalink();
    	$html .= '">';
    	$html .= '<h1>';
    	$html .= get_the_title();
    	$html .= '</h1>';
    	$html .= '<h4>';
    	$html .= get_post_meta($post->ID,'rnr_project_s',true);
    	$html .= '</h4>';
    	$html .= '</a>';
    	$url= wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'homepage-thumb') );
    	$html .= '<img src="';
    	$html .= $url;
    	$html .= '" alt="item 1">';
    	$html .= '</div>';
    	endwhile;
        wp_reset_query();
        $html .= '</div>';

		return $html;
	}
	add_shortcode('ky_Portfolio', 'ky_Portfolio_shortcode');
}


// Kyte Blog ShortCode


if(! function_exists('ky_blog_shortcode')){
	function ky_blog_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'link'=>'',
			
			), $atts) );
		$html='';
		
		$html .= '<h1 class="title">'.$title.'</h1>';
		$html .= '<div class="blog-row row">';
		$html .= '<div id="blog-list-container" class="col-md-12">';
		global $post;
		query_posts(array(
        'post_type' => 'post',
        'showposts' => -1
        ));
        while ( have_posts() ) : the_post();
		$html .= '<div class="col-md-5">';
		$html .= '<div class="blog-item">';
		$html .= '<a class="overlay" href="';
		$html .= get_the_permalink();
		$html .= '">';
		$html .= '<h1>'.$link.'</h1>';
		$html .= '</a>';
		$url= wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'homepage-thumb'));
		$html .= '<img src="';
		$html .= $url;
		$html .= '" alt="Blog thumbnail">';
		$html .= '<div class="detail row">';
		$html .= '<div class="date">';
		$html .= '<span>';
		$html .= get_the_date('d');
		$html .= '</span>';
		$html .= '<span>';
		$html .= get_the_date('M');
		$html .= '</span>';
		$html .= '</div>';
		$html .= '<div class="like">';
		$html .= '<span class="fa fa-user"></span>';
		$html .= '<span>';
		$html .= get_the_author();
		$html .= '</span>';
		$html .= '</div>';
		$html .= '<div class="blog-title">';
		$html .= get_the_title();
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		endwhile;
        wp_reset_query();
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}
	add_shortcode('ky_blog', 'ky_blog_shortcode');
}


// Kyte Contact ShortCode

if(! function_exists('ky_contact_shortcode')){
	function ky_contact_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'maptitle'=>'',
			
			), $atts) );
		global $post;
		$ky_options = get_option('kyte_theme');
		$html='';
		$html .= '<h1 class="title">'.$title.'</h1>';
		$html .= '<div class="row">';
		$html .= '<div class="col-md-6">';
		$html .= '<h2 class="title">'.$maptitle.'</h2>';
		$html .= '<section id="cd-google-map">';
		$html .= '<div id="google-container"></div>';
		$html .= '<div id="cd-zoom-in"></div>';
		$html .= '<div id="cd-zoom-out"></div>';
		
		$html .= '<address>';
		$html .= esc_attr(kyte_return_theme_option('conaddr'));
		$html .= '</address>';
				
		$html .= '</section>';
		$html .= '<ul class="list">';
		
		$html .= '<li><div class="icon fa fa-map-marker"></div>';
		$html .= esc_attr(kyte_return_theme_option('conaddr'));
		$html .= '</li>';
				
		$html .= '<li><div class="icon fa fa-envelope-o"></div>';
		$html .= esc_attr(kyte_return_theme_option('contactmai'));
		$html .= '</li>';
				
		
		$html .= '<li><div class="icon fa fa-phone"></div>';
		$html .= esc_attr(kyte_return_theme_option('contactnum'));
		$html .= '</li>';
		
		$html .= '</ul>';
		if(!empty($ky_options['twittertitle'])):
		$html .= '<h2 class="title">';
		$html .= $ky_options['twittertitle'];
		$html .= '</h2>';
		endif;
		if(!empty($ky_options['twittercode'])):		
		$html .= '<div id="twitter">';
		$html .= '</div>';
		endif;
		$html .= '</div>';
		$html .= '<div class="col-md-5">';
		$html .= do_shortcode($content);
		$html .= '</div>';		
		$html .= '</div>';

		return $html;
	}
	add_shortcode('ky_contact', 'ky_contact_shortcode');
}
