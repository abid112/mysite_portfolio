<?php
/*Template Name: Blog */
 get_header();?>
<div id="blog-post" class="full-blog">
        <!-- begin #blog -->
     
        <div class="navbar-collapse collapse">
          <?php

        $defaults = array(
                    'theme_location'  => 'main-menu',
                    'menu'            => 'nav',
                    'container'       => 'ul',
                    'container_class' => '',
                    'menu_class'      => 'nav navbar-nav',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => new ky_themeslug_walker_nav_menu
                        );
if(has_nav_menu('main-menu')) {
                        wp_nav_menu( $defaults );
}
          else {
            echo 'No menu assigned!';
          }
                        ?>
        </div>
        <div class="main-content">
         
          
          <div class="blog-row row">
            <div id="blog-list-container" class="col-md-12 postim">
				<div class="col-md-9 postim">
				<h1 class="title"><?php the_title();?></h1>
              <!-- begin #blog-item -->
               <?php while(have_posts() ) : the_post(); ?>
								<?php the_content();?>
								<?php endwhile; wp_reset_query(); ?> 
			 
			  </div>
              <!-- end #blog-item -->
			  <div class="col-md-3 widget">
									<article>
									<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Blog Sidebar') ) : else : ?>
                     <?php endif; ?>
                     				</article>
								</div>
            </div>
          </div>
        </div>
      </div>
      <!-- end #blog -->

     
 <?php get_footer();?>