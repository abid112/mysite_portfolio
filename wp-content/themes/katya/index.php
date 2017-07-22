<?php
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
				<h1 class="title"><?php _e('My Latest Blog','kyte')?></h1>
              <!-- begin #blog-item -->
                <?php
				query_posts('post_type=post&post_status=publish&paged='. get_query_var('paged')); 
				 if (have_posts()) : 
				 while (have_posts()) : the_post(); ?>
              <div class="col-md-12 im">
                <div class="blog-item">
                  <a class="overlay" href="<?php the_permalink();?>">
                    <h1>Read More</h1>
                  </a>
				  
                  <?php if ( has_post_thumbnail() ) { 
				  $url= wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'homepage-thumb') )?>
                  <img src="<?php echo esc_url($url); ?>" alt="Blog thumbnail">
				  <?php } ?>
                  <div class="detail row">
                    <div class="date">
                      <span><?php echo esc_attr(get_the_date('d')); ?></span>
                      <span><?php echo esc_attr(get_the_date('M')); ?></span>
                    </div>
                    <div class="like">
                      <span class="fa fa-user"></span>
                      <span><?php the_author(); ?></span>
                    </div>
                    <div class="blog-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
                  </div>
                </div>
              </div>
              <?php endwhile;
			  endif;
               wp_reset_query();
              ?> 
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
								<div style="display:none;"><?php the_tags();  post_class(); next_posts_link(); previous_posts_link();wp_link_pages();comment_form(); wp_enqueue_script('comment-reply');?></div>
            </div>
          </div>
        </div>
      </div>
      <!-- end #blog -->

     
 <?php get_footer();?>