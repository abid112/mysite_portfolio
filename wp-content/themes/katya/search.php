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
				<h1 class="title"><?php _e('Search','kyte')?></h1>
				<header class="page-header">
					<h3 class="title"><?php printf( __( 'Search Results for: %s', 'vcard' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
										</header>
              <!-- begin #blog-item -->
                <?php
				
				 if (have_posts()) : 
				 while (have_posts()) : the_post(); ?>
              <div class="col-md-12 im">
                <div class="blog-item">
                 
                  <div class="detail row">
                    <div class="date">
                      <span><?php echo esc_attr(get_the_date('d')); ?></span>
                      <span><?php echo esc_attr(get_the_date('M')); ?></span>
                    </div>
                    <div class="like">
                      <span class="fa fa-heart"></span>
                      <span>13</span>
                    </div>
                    <div class="blog-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
					
                  </div>
				  <?php the_excerpt(); ?>
                </div>
              </div>
              <?php endwhile;
			  else:
              ?>
				 <div class="col-md-12 im">
                <div class="blog-item">
                 
                  <h3 class="title"><?php _e( 'Nothing Found', 'vcard' ); ?></h3>
				  <p><?php _e( 'Sorry, Nothing matched your search criteria. Please try again with some different keywords.', 'vcard' ); ?></p>
                </div>
              </div>
			  <?php endif; ?>
			  <div class="blog_pagination">
				<?php if (function_exists("pagination")) {
						pagination($wp_query->max_num_pages);
					} ?>
				</div>
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