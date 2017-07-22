<?php

// Enqueue Style
	require_once (dirname(__FILE__) . '/includes/style.php');

// Enqueue JS
	require_once (dirname(__FILE__) . '/includes/js.php');	

// Sidebar's functionality
	require_once (dirname(__FILE__) . '/includes/functions.php');	

// options
    require_once (dirname(__FILE__) . '/includes/options.php');

// Shortcode's functionality
	require_once (dirname(__FILE__) . '/symple-shortcodes/symple-shortcodes.php');

// Pagination

    include('pagination.php');
// plugins

    include_once 'includes/class-tgm-plugin-activation.php';
    include_once 'includes/ThemePlugins.php';
add_action( 'tgmpa_register', 'ThemePlugins::mi_register_required_plugins' );

if ( ! isset( $content_width ) ) $content_width = 900;

// register nav menu
	function ky_register_menus() {
		register_nav_menus( array( 'main-menu' => 'Primary menu'                              
                              )
							);
	}
	add_action('init', 'ky_register_menus');
// Add class to <li> 

function ky_add_menu_parent_class($items)
{

    $parents=array();
    foreach($items as $item){

        if($item->menu_item_parent && $item->menu_item_parent>0){
            $parents[]=$item->menu_item_parent;
        }
    }
    foreach($items as $item){
        if(in_array($item->ID,$parents)){
            $item->classes[]='dropdown';
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects','ky_add_menu_parent_class');
	
// walker nav sub-menu add class to <ul> 
	
class ky_themeslug_walker_nav_menu extends Walker_Nav_Menu {
  
// add classes to ul sub-menus
function start_lvl( &$output, $depth=0, $args=array(), $current_object_id = 0) {
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
        'dropdown-menu',
        ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
        ( $display_depth >=2 ? 'sub-menu' : '' ),
        'menu-depth-' . $display_depth
        );
    $class_names = implode( ' ', $classes );
  
    // build html
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
}
  

}


add_action( 'after_setup_theme', 'ky_setup' );
function ky_setup() {
// Theme Support  
	add_editor_style();
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );
  add_theme_support('post-thumbnails');
  add_editor_style();
}

/* Include Meta Box Framework */
define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/includes/metaboxes' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/includes/metaboxes' ) );

require_once RWMB_DIR . 'meta-box.php';
include(get_template_directory().'/includes/metaboxes.php');

// Word Limit 
	function string_limit_words($string, $word_limit)
	{
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
	}

// Add post thumbnail functionality
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 559, 220, true ); // Normal post thumbnails
 
// How comments are displayed

function ky_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
    } else {
      $tag = 'li';
      $add_below = 'div-comment';
    }
?>
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment">
    <?php endif; ?>
    <div class="user_img">
    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    </div>

    <div class="comment-content">
      
      <?php printf(__('<h2 class="reader-name">%s</h2>'), get_comment_author_link()) ?>
      <div class="detail">
        <?php comment_text() ?>
        </div>
    <div class="comment-interaction">
      <?php
        /* translators: 1: date, 2: time */
        printf( __('<span> %1$s   </span>','kyte'), get_comment_time()) ?><span class="reply">
        <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </span>
        </div>
    
    </div>
    
    
<?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.','reversal_theme') ?></em>
    <br />
<?php endif; ?>

    
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php
        }

// WP Title
function katya_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() ) {
        return $title;
    }

    // Add the site name.
    $title .= get_bloginfo( 'name', 'display' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title = "$title $sep $site_description";
    }

    // Add a page number if necessary.
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title = "$title $sep " . sprintf( __( 'Page %s', 'katya' ), max( $paged, $page ) );
    }

    return $title;
}
add_filter( 'wp_title', 'katya_wp_title', 10, 2 );



function kyte_return_theme_option($string,$str=null){
        global $kyte_theme;
        if($str!=null)
        return isset($kyte_theme[''.$string.''][''.$str.'']) ? $kyte_theme[''.$string.''][''.$str.''] : null;
        else
        return isset($kyte_theme[''.$string.'']) ? $kyte_theme[''.$string.''] : null;
    }

/********** Enque script **********/
        add_action('wp_enqueue_scripts', 'IncludeCssJs::kyte_add_css_js');
     