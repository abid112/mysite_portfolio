<?php
 get_header();?>
<!-- begin #blog-post -->
		<div id="blog-post" class="full-blog">
			<div class="main-content">
				<a href="<?php echo esc_url(home_url());?>" class="close-icon expand"></a>
				<div class="row">
					<div class="col-md-10">
						<h1 class="title"><?php the_title();?></h1>
						<div class="blog-details">
							<span class="fa fa-clock-o"></span>
							<span class="detail"><?php echo esc_attr(get_the_date('d M, Y'));?></span>
							<span class="fa fa-heart"></span>
							<span class="detail cmli"><?php if(function_exists('wp_ulike')) wp_ulike('get'); ?></span>
							<span class="fa fa-comments-o"></span>
							<span class="detail anc"><?php comments_popup_link(__('0 Comments', 'kyte'), __('1 Comment', 'kyte'), '% '.__('Comments', 'Kyte')); ?></span>
							<span class="fa fa-user"></span>
							<?php if(have_posts()): the_post(); ?>
							<span class="detail"><?php the_author(); ?></span><?php endif ?>
						</div>
						<?php if ( has_post_thumbnail() ) { ?>
						<?php $url= wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'homepage-thumb') );?>
						<img class="blog-img" src="<?php echo esc_url($url); ?>" alt="Blog Image">
						<?php } ?>
						<div class="blog-source">
							<?php global $post;?>
							<div><?php _e('Source : ','Kyte');?> <?php echo esc_attr(get_post_meta($post->ID,'rnr_postsource',true));?></div>
						</div>
						<div class="blog-content">
							
							<?php the_content();?>
							<?php wp_link_pages(); ?>
						<div class="interaction">
							<div class="comntli"><?php if(function_exists('wp_ulike')) wp_ulike('get'); ?></div>
							<div class="comment"><?php _e('Comment','kyte'); ?></div>
						</div>
						
							<?php comments_template(); ?>
						
						
					</div>
				</div>
			</div>
		</div>
		</div>
		<!-- end #blog-post -->
<?php get_footer();?>