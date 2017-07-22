<?php defined('ABSPATH') or die("No script kiddies please!");
get_header(); 
get_template_part('menu-section');?>
<header class="titlebar titlebar1">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="page-title pull-left"><?php _e('Category','voyo');?></h1>
          <ol class="breadcrumb pull-right">
            <li><a href="#">Home</a></li>
            <li><a href="#">Blog</a></li>
            <li class="active">Large</li>
          </ol>
        </div>
      </div>
    </div>
  </header>
<section class="section-4">
    <div class="container">
      <div class="row">
        <div class="col-sm-7 col-md-9 col-md-push-3 col-sm-push-5 space-left push-off">
          <div id="blog-posts" class="row">
            <?php query_posts('post_type=post&post_status=publish&paged='. get_query_var('paged')); 
               if (have_posts()) : 
               while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="col-sm-12" >
              <div class="row blog-item">
                <div class="col-sm-12 blog-image full-image">
                <?php if( has_post_format( 'image' ) !='') {?>
                <?php if ( has_post_thumbnail() ) { ?>
                <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
                  <img src="<?php echo esc_url($url);?>" alt="Blog_image">
                  <?php } } ?>
                  <?php if( has_post_format( 'video' ) !='') {?>
                <iframe class="rs-video" src="https://player.vimeo.com/video/7449107?portrait=0&amp;color=22aba6"  allowfullscreen></iframe>
                <?php }?>
                <?php if( has_post_format( 'audio' ) !='') {?>
                <iframe height="200" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/106143476&amp;color=22aba6&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true"></iframe>
                <?php }?>
                </div>
                <div class="col-sm-12 blog-caption">
                  <h3 class="post-title pt2"><?php the_title();?></h3>
                  <div class="sub-post-title mb20">
                    <span class="date"> <?php echo esc_attr(get_the_date('j M, Y'));?></span>
                    <span class="author"><i class="fa fa-user"></i> <a href="#"> <?php _e('by ','voyo'); the_author();?></a></span>
                  </div>
                  <p><?php echo substr(get_the_excerpt(), 0,350); ?></p>
                  <a href="<?php the_permalink();?>" class="read-more"><?php _e('Read more','voyo')?></a>
                </div>
              </div>
                      </div> 
                      </div><!-- END Blog Item -->
                      <?php endwhile;
              endif;
                     wp_reset_query(); ?>
          </div> <!-- END Blog Posts -->
          <div class="row">
            <div class="col-sm-12">
              
              
                <?php Navigation::mi_paging_nav(); ?>
              
            </div>
          </div>
        </div>
        <div class="col-sm-5 col-md-3 col-md-pull-9 col-sm-pull-7 pull-off">
          <aside class="sidebar">
            <?php
                 if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Blog Sidebar')): 
                      endif;
                        ?>
          </aside>
        </div>
      </div>
    </div>
  </section> <!-- END Blog Page-->

<?php get_footer();?>