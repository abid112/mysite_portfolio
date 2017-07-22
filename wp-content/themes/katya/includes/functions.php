<?php
global $ky_options;
if( ! function_exists( 'ky_portfolio_post_types' ) ) {
    function ky_portfolio_post_types() {

        register_post_type(
            'Portfolio',
            array(
                'labels' => array(
                    'name'          => __( 'Portfolio Post', 'Portfolio' ),
                    'singular_name' => __( 'portfolio', 'portfolio' ),
                    'add_new'       => __( 'Add New', 'portfolio' ),
                    'add_new_item'  => __( 'Add New Portfolio', 'portfolio' ),
                    'edit'          => __( 'Edit', 'portfolio' ),
                    'edit_item'     => __( 'Edit portfolio', 'portfolio' ),
                    'new_item'      => __( 'New portfolio', 'portfolio' ),
                    'view'          => __( 'View portfolio', 'portfolio' ),
                    'view_item'     => __( 'View portfolio', 'portfolio' ),
                    'search_items'  => __( 'Search portfolio', 'portfolio' ),
                    'not_found'     => __( 'No portfolio found', 'portfolio' ),
                    'not_found_in_trash' => __( 'No portfolio found in Trash', 'portfolio' ),
                    'parent'        => __( 'Parent portfolio', 'portfolio' ),
                ),
                
                'description'       => __( 'Create a portfolio.', 'portfolio' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
                'exclude_from_search'   => true,
                'menu_position'         => 6,
                'hierarchical'      => true,
                'query_var'         => true,
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => 'Portfolio Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
        
        

    }
}

add_action( 'init', 'ky_portfolio_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');


//Custom Post Resume

if( ! function_exists( 'ky_resume_post_types' ) ) {
    function ky_resume_post_types() {

        register_post_type(
            'resume',
            array(
                'labels' => array(
                    'name'          => __( 'Experience Post', 'resume' ),
                    'singular_name' => __( 'resume', 'resume' ),
                    'add_new'       => __( 'Add New', 'resume' ),
                    'add_new_item'  => __( 'Add New Resume', 'resume' ),
                    'edit'          => __( 'Edit', 'resume' ),
                    'edit_item'     => __( 'Edit Resume', 'resume' ),
                    'new_item'      => __( 'New Resume', 'resume' ),
                    'view'          => __( 'View resume', 'resume' ),
                    'view_item'     => __( 'View Resume', 'resume' ),
                    'search_items'  => __( 'Search Resume', 'resume' ),
                    'not_found'     => __( 'No Resume found', 'resume' ),
                    'not_found_in_trash' => __( 'No Resume found in Trash', 'resume' ),
                    'parent'        => __( 'Parent Resume', 'resume' ),
                ),
                
                'description'       => __( 'Create a Resume.', 'resume' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
                'exclude_from_search'   => true,
                'menu_position'         => 6,
                'hierarchical'      => true,
                'query_var'         => true,
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('resume_category', 'resume', array('hierarchical' => true, 'label' => 'resume Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
        
        

    }
}

add_action( 'init', 'ky_resume_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');



//Custom Post Testimonial

if( ! function_exists( 'ky_testimonial_post_types' ) ) {
    function ky_testimonial_post_types() {

        register_post_type(
            'testimonial',
            array(
                'labels' => array(
                    'name'          => __( 'Testimonial Post', 'testimonial' ),
                    'singular_name' => __( 'testimonial', 'testimonial' ),
                    'add_new'       => __( 'Add New', 'testimonial' ),
                    'add_new_item'  => __( 'Add New Testimonial', 'testimonial' ),
                    'edit'          => __( 'Edit', 'testimonial' ),
                    'edit_item'     => __( 'Edit Testimonial', 'testimonial' ),
                    'new_item'      => __( 'New Testimonial', 'testimonial' ),
                    'view'          => __( 'View Testimonial', 'testimonial' ),
                    'view_item'     => __( 'View Testimonial', 'testimonial' ),
                    'search_items'  => __( 'Search Testimonial', 'testimonial' ),
                    'not_found'     => __( 'No Testimonial found', 'testimonial' ),
                    'not_found_in_trash' => __( 'No Testimonial found in Trash', 'testimonial' ),
                    'parent'        => __( 'Parent Testimonial', 'testimonial' ),
                ),
                
                'description'       => __( 'Create a Testimonial.', 'testimonial' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
                'exclude_from_search'   => true,
                'menu_position'         => 6,
                'hierarchical'      => true,
                'query_var'         => true,
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail',
                    
                )
            )
        );
register_taxonomy('testimonial_category', 'testimonial', array('hierarchical' => true, 'label' => 'testimonial Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
        
        

    }
}

add_action( 'init', 'ky_testimonial_post_types' ); // register post type

register_taxonomy_for_object_type('category', 'custom-type');