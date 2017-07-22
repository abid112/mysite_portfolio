<?php
/*Template Name: 404 */
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
            <div id="blog-list-container" class="col-md-12 postim ero">
				<div class="col-md-9 postim">
				<h1 class="title"><?php _e('404','kyte')?></h1>
              <!-- begin #blog-item -->
               <img src="<?php echo esc_url(get_template_directory_uri());?>/includes/img/error3.png" alt="">
									<div class="clear"></div>
									<h3 class="title"><?php _e('Ooops This Page Could Not Be Found! ','vcard'); ?></h3>
									<p class="er"><?php _e('Can not find what you need? Take a moment and go to home clicking below!', 'vcard'); ?></p>
									 <span class="input-group-btn error2-btn er">
									 	<a class="download" href="<?php echo esc_url(home_url()); ?>"><?php _e('BACK TO HOME PAGE', 'vcard'); ?></a>
									 </span>
			 
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