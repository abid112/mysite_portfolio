<?php
/**
 * The Template for displaying all single posts.
 *
 * @package rootstrap
 */

get_header(); ?>
<div id="content" class="site-content container">
	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo rootstrap_get_option( 'site_layout', 'no entry' ); ?>">
		<div id="main" class="site-main" role="main">
		<?php do_action( 'rootstrap_post_before' ); ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php //rootstrap_post_nav(); ?>
			<div class="blog_social">
				<div class="social_share_btn ">
					<ul>
					    <li><span>Share:</span></li>
					    <li><a onclick="window.open('http://www.facebook.com/sharer.php?u=https://www.glgaccounting.com/income-tax-preparation/','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://www.facebook.com/sharer.php?u=https://www.glgaccounting.com/income-tax-preparation/"><i class="fa fa-facebook-square"></i></a></li>
					    <li><a onclick="window.open('http://twitter.com/share?url=https://www.glgaccounting.com/income-tax-preparation/&amp;text=Income Tax','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=https://www.glgaccounting.com/income-tax-preparation/&amp;text=Income Tax"><i class="fa fa-twitter"></i></a></li>
					    <li><a onclick="window.open('https://plus.google.com/share?url=https://www.glgaccounting.com/income-tax-preparation/','Google plus','width=585,height=666,left='+(screen.availWidth/2-292)+',top='+(screen.availHeight/2-333)+''); return false;" href="https://plus.google.com/share?url=https://www.glgaccounting.com/income-tax-preparation/"><i class="fa fa-google-plus"></i></a></li>
					    <li><a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','https://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><i class="fa fa-pinterest"></i></a></li>
					    <li><a onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=https://www.glgaccounting.com/income-tax-preparation/','Linkedin','width=863,height=500,left='+(screen.availWidth/2-431)+',top='+(screen.availHeight/2-250)+''); return false;" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://www.glgaccounting.com/income-tax-preparation/"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>
		<?php do_action( 'rootstrap_post_after' ); ?>
		</div><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>