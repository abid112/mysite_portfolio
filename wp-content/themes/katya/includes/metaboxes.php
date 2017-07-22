<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'rnr_';

global $meta_boxes;

$meta_boxes = array();

global $smof_data;


/* ----------------------------------------------------- */
// Page Sections Metaboxes
/* ----------------------------------------------------- */



/* Page Section Background Settings */

$grid_array = array('2 Columns','3 Columns','4 Columns');

$pagebg_type_array = array(
	'image' => 'Image',
	'gradient' => 'Gradient',
	'color' => 'Color'
);


/* ----------------------------------------------------- */
// Page Settings
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'pagesettings',
	'title' => 'Page Options',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	// List of meta fields
	'fields' => array(

		array(
			'name'		=> 'Page Slogan :',
			'id'		=> $prefix . 'slogant',
			'desc'		=> 'Write your Page Slogan here (Eg. View My Resume or Watch My Works)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
			'name'		=> 'Page Icon :',
			'id'		=> $prefix . 'picon',
			'desc'		=> 'Write your Page icon code (eg: fa-file-o OR fa-briefcase" OR fa-pencil OR fa-envelope-o)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
	)
);


/* ----------------------------------------------------- */
// Blog Post Metaboxes
/* ----------------------------------------------------- */

/*  Blog Link Post Settings */

$meta_boxes[] = array(
	'id' => 'rnr-blogmeta-link',
	'title' => 'Post Format Icon',
	'pages' => array( 'post'),
	'context' => 'normal',

	// List of meta fields
	'fields' => array(

		array(
			'name'		=> 'Source :',
			'id'		=> $prefix . 'postsource',
			'desc'		=> 'Enter Post Source Here',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		
	)
);
/*  Blog Quote Post Settings */


/* ----------------------------------------------------- */
/* Portfolio Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'portfolio_info',
	'title' => 'Project Details',
	'pages' => array( 'portfolio' ),
	'context' => 'normal',	

	'fields' => array(

		array(
			'name'		=> 'Shortly About Project :',
			'id'		=> $prefix . 'project_s',
			'desc'		=> 'Wrte Something About your Project Shortly',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
			'name'		=> 'Client/Company Name',
			'id'		=> $prefix . 'project_client_name',
			'desc'		=> 'Leave empty if you do not want to show this.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
			'name'		=> 'Review Content',
			'id'		=> $prefix . 'project_review_content',
			'desc'		=> 'Write Review Content Here.',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),

		array(
			'name'		=> 'Rating Point',
			'id'		=> $prefix . 'project_rating_point',
			'desc'		=> 'Write Review Point 1 to 5( No fraction Value).',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
			'name'		=> 'Project link',
			'id'		=> $prefix . 'project_link',
			'desc'		=> 'URL to the Project if available (Do not forget the http://)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		
		
	)
);

/* ----------------------------------------------------- */
/* Resume Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'resume_info',
	'title' => 'Experience Details',
	'pages' => array( 'resume' ),
	'context' => 'normal',	

	'fields' => array(
		array(
			'name'		=> 'Designation :',
			'id'		=> $prefix . 'dg_name',
			'desc'		=> 'Write Your Designation (Eg. Web Engineer, Author, Editor etc.).',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Time Duration :',
			'id'		=> $prefix . 'time_dur',
			'desc'		=> 'write Time Duration of this Org: (Eg: 2008 - 2010 OR 2013 - Present)',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
			
		
	)
);

/* ----------------------------------------------------- */
/* Testimonial Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'testimonial_info',
	'title' => 'Testimonial Details',
	'pages' => array( 'testimonial' ),
	'context' => 'normal',	

	'fields' => array(
		array(
			'name'		=> 'Org: Nmae :',
			'id'		=> $prefix . 'organi_name',
			'desc'		=> 'Write Your Organization Name (Eg. Google Inc., Microsoft Inc. etc.).',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
			
		
	)
);


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function rocknrolla_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}

// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'rocknrolla_register_meta_boxes' );