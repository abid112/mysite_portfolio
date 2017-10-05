<?php get_header(); ?>

<div class="breadcrumb_holder">
    <img class="breadcrumb_right-img" src="/wp-content/uploads/2017/05/rgtimg1.png" class="badge_img">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">				
				<?php
					breadcrumbs(); 					
				?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<div class="page_content">
	<div class="container">
		<div class="row">
			<div class="content_wrap">
				
				<div class="col-md-12 col-sm-12 col-xs-12 content_holder">
					
					<div class="page_content_holder">
  						<h2 class="about-title" style="text-align: center; margin-bottom: 40px; margin-top: 0px;">About <span style="color: #d57c1c;">GLG Accounting</span></h2>
						<div class="form_content about_form pull-right">
							<?php echo do_shortcode( '[contact-form-7 id="91" title="Page Form"]' ); ?>
							<a href="/wp-content/uploads/2017/05/abtbox11.png">
								<img class="aboutimg" src="/wp-content/uploads/2017/05/abtbox11.png" alt="abtbox1" />
							</a>
							<div class="about-img-bottom">
								<h4 style="text-transform: uppercase; line-height: 8px; padding: 0; left; font-size: 16px;">We 
									<span style="color: #d57c1c;">Strive to</span>
								</h4>
								<p style="color: #000; text-transform: uppercase;">PROVIDE EACH CLIENT WITH SOLUTIONS THAT EMBRACE modern accounting methods WHILE 
 								ENSURING COMPLIANCE WITH APPLICABLE TAX REGULATIONS.</p>
							</div>	
						</div>
						<?php 
					        if ( have_posts() ) {
					             while ( have_posts() ) {
					                the_post(); 
					                ?>
					                <?php 
					                the_content();
					            } // end while
					        } // end if
					    ?>
					<div class="clear"></div>
					</div>
					<div class="about_us_btn" style="width: 99%; padding: 0px 0px 0px 15px; margin: 10px auto;">
						<p class="button-text-new">Are you ready to see what the GLG Accounting experience is like for yourself?</p>
						
						<div class="bottom_about_btn_wrap">
							<?php get_template_part('about','schedule'); ?>
						</div>
						<div class="clear"></div>

					</div>					
				</div>
				<div class="clear"></div>
				<div class="no-margin social_share_btn">
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
			
		</div>
	</div>
</div>
<?php get_footer(); ?>