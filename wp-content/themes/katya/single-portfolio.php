<?php get_header();?>
<!-- begin #portfolio-case -->
		<div id="portfolio-case" class="full-portfolio">
			<div class="main-content">
				<a href="<?php echo esc_url(home_url());?>" class="close-icon expand"></a>
				<div class="row">
					<div class="col-md-10">
						<h1 class="title"><?php the_title();?></h1>
						<?php if ( has_post_thumbnail() ) { ?>
						<?php $url= wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'homepage-thumb') );?>
						<img class="portfolio-img" src="<?php echo esc_url($url); ?>" alt="Blog Image">
						<?php } ?>
						<h2 class="title gray"><?php _e('Client','kyte');?></h2>
						<div class="detail"><?php echo esc_attr(get_post_meta($post->ID,'rnr_project_client_name',true));?></div>
						<h2 class="title gray"><?php _e('Reviews','kyte')?></h2>
						<div class="review">
							<?php echo esc_attr(get_post_meta($post->ID,'rnr_project_review_content',true));?>
							<?php $point = esc_attr(get_post_meta($post->ID,'rnr_project_rating_point',true));?>
							<?php if($point == '1'){ ?>
								<div class="rating">
								<span class="fa fa-star"></span>
							</div>
							<?php } elseif($point == '2'){?>
							<div class="rating">
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<?php } elseif($point == '3'){?>
							<div class="rating">
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<?php } elseif($point == '4'){?>
							<div class="rating">
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<?php } else{?>

							<div class="rating">
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<?php } ?>
						</div>
						<?php if(have_posts()): the_post(); ?>
						<h2 class="title gray"><?php _e('Description','kyte');?></h2>
						<div class="detail">
							<?php the_content();?>
						</div><?php endif;?>
						<div class="btn-container">
							<a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_project_link',true));?>" class="btn"><?php _e('Lauch Project','kyte')?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end #portfolio-case -->
<?php get_footer();?>