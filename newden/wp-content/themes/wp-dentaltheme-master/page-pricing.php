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
                        <div class="price_top">
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <p class="price_head">PRICING</p>
                                <p class="price_sub_head">Corporate Bookkeeping Prices</p>
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-12 text-right">
                                <a href="" class="get_price"  data-toggle="modal" data-target="#consultmodal">Get Tax Preparation Pricing</a>
                            </div>
                            <div class="clear"></div>									
                        </div>
                        <div class="price_table">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <ul class="pricing-table BASIC">
                                    <li class="price_table_head">
                                        <p>BASIC</p>
                                    </li>
                                    <li class="title">
                                        <p><span>$150</span> USD/MONTH</p>
                                    </li>
                                    <li class="pricing-row">
                                        <ul>
                                            <li><strong>Setup Fee: </strong> $0</li>
                                            <li><strong>No of Accounts: </strong> &lt;2</li>
                                            <li><strong>Monthly Expenses:</strong>  &lt;$5K/month </li>
                                            <li><strong>Includes:</strong>

                                            <p> <i class="fa fa-hand-o-right" aria-hidden="true"></i> Full Xero Set up </p>
                                            <p> <i class="fa fa-hand-o-right" aria-hidden="true"></i> Monthly Reconciliation</p>
                                            <p> <i class="fa fa-hand-o-right" aria-hidden="true"></i> Financial Statement Reporting</p>
                                        </ul>
                                    </li>
                                    <li class="pricing-button">
                                        <a href="" class="price_table_btn">SIGN UP</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <ul class="pricing-table PROFESSIONAL">
                                    <li class="price_table_head">
                                        <p>PROFESSIONAL</p>
                                    </li>
                                   <li class="title">
                                       <p><span>$300 </span> USD/MONTH</p>
                                   </li>
                                   <li class="pricing-row">
                                       <ul>
                                           <li><strong>Setup Fee: </strong>  $200.00</li>
                                           <li><strong>No of Accounts: </strong> &lt;5</li>
                                           <li><strong>Monthly Expenses:</strong>  &lt;$10K/month </li>
                                           <li><strong>Includes:</strong>

                                               <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> +Basic Level</p>
                                               <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> Filing 1099’s</p>
                                               <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> General Tax Planning</p>
                                           </li>
                                       </ul>
                                   </li>
                                   <li class="pricing-button">
                                       <a href="" class="price_table_btn">SIGN UP</a>
                                   </li>
                               </ul>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <ul class="pricing-table CORPORATE">
                                    <li class="price_table_head">
                                        <p>CORPORATE</p>
                                    </li>
                                    <li class="title">
                                        <p><span>$600</span> USD/MONTH</p>
                                    </li>
                                    <li class="pricing-row">
                                        <ul>
                                            <li><strong>Setup Fee: </strong> $500.00</li>
                                            <li><strong>No of Accounts: </strong> &gt;5</li>
                                            <li><strong>Monthly Expenses:</strong>  &gt;$10K/month </li>
                                            <li><strong>Includes:</strong>
                                                <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> +Professional </p>
                                                <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> Due Diligence</p>
                                                <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> Tax Implications</p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pricing-button">
                                        <a href="" class="price_table_btn">SIGN UP</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <ul class="pricing-table ENTERPRISES">
                                    <li class="price_table_head">
                                        <p>ENTERPRISES</p>
                                    </li>
                                    <li class="title">
                                        <p><span>CONTACT</span> US</p>
                                    </li>
                                    <li class="pricing-row">
                                        <ul>
                                                <li style="padding-bottom: 20px !important;">
                                                        <p style=""> For large corporations or entities looking for a higher level of service.</p>
                                                </li>
                                            <li><strong>Monthly Expenses: </strong> &lt;$45k/month</li>

                                            <li><strong>Includes:</strong>

                                                <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> +Corporate</p>
                                                <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> Cashflow Management</p>
                                                <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> Growth Control Points</p>
                                            </li>
                                        </ul>		
                                    </li>
                                    <li class="pricing-button">
                                        <a href="" class="price_table_btn">CONTACT US</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>

                <div class="price_inclusion">
                        <?php 
                                if ( have_posts() ) {
                                     while ( have_posts() ) {
                                        the_post(); 
                                        the_content();
                                    } // end while
                                } // end if
                            ?>
                </div>
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





<div id="consultmodal" class="modal fade" role="dialog">
	<div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">	      	
	      	<div class="modal-body">
	        	<?php echo do_shortcode( '[contact-form-7 id="60" title="Free Consultation"]' ); ?>
	      	</div>
		    
	    </div>

	</div>
</div>
<?php get_footer(); ?>