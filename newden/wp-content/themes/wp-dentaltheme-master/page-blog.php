<?php get_header(); ?>

<!-- <div class="breadcrumb_holder">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<p class="page-title"><?php //echo get_the_title(); ?></p>
				
				<?php
					//breadcrumbs(); 
					
				?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div> -->
			
<div class="blog_page_wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                <?php 
                    if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
                            <?php dynamic_sidebar( 'sidebar-1' ); ?>
                <?php }
                ?>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 pull-right">
                    <?php 
                        $args = array(
                            'post_type' => 'post',  
                            'order'  => 'ASC',
                            'posts_per_page'  => 3
                        );
                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) 
                        {
                            while ($query->have_posts()) : 
                                $query->the_post();
                    ?> 
                    
                        <div class="list_blog_post_wrap">
                            <div class="blog_post_wrap">
                                <div class="col-md-3 col-sm-3 col-xs-12 blog_img">
                                    <?php 
                                        if (has_post_thumbnail()) { ?>
                                            <img class="img-responsive" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?> ">
                                        <?php }

                                        else {
                                    ?>
                                        <img class="img-responsive" src="http://localhost/taxlaw/wp-content/uploads/2017/05/slider-background.jpg" alt="<?php the_title_attribute(); ?> ">



                                    <?php } ?>
                                </div>                            
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <p class="post_header"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

                                    <p class="blog_meta_data">Posted By

                                        <span class="author data_span"><?php the_author(); ?></span>
                                        <span class="vertical_devider">|</span>
                                        <span class="date data_span"><?php the_date(); ?></span>
                                        <span class="vertical_devider">|</span>
                                        <span class="category data_span">

                                            <?php $category = get_the_category(get_the_ID());
                                                if ($category) 
                                                {
                                                    echo '<a href="' . esc_url( get_category_link( $category[0]->term_id ) ) . '">' . esc_html( $category[0]->name ) . '</a>';
                                                } ?>                                
                                        </span>
                                        <span class="vertical_devider">|</span>
                                        <span class="comment_count data_span">
                                            <?php $comments_count = wp_count_comments(get_the_ID());
                                                echo $comments_count->total_comments;    
                                            ?>                              
                                        </span>
                                        Comment

                                    </p>

                                    <p class="post_excerpt justify">
                                        <?php
                                            the_excerpt();
                                        ?>
                                    </p>
                                    <p><a href="<?php the_permalink(); ?>">Details <span class="details_arrow">></span></a></p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    
                        <?php 
                                endwhile;
                            }
                        ?>
                </div>
            <div class="clear"></div>
        </div>

        
    </div>
</div>
<?php get_footer(); ?>


			