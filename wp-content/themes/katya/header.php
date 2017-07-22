<!DOCTYPE HTML>
<html class="noIE" <?php language_attributes(); ?>>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
   <link rel="icon" type="image/png" href="<?php echo esc_url(kyte_return_theme_option('favipic','url'));?>"> 

<?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>

  <!-- begin .preloader -->
    <div class="preloader">
      <div class="spinner"></div>
    </div>
    
    <!-- end preloader -->

  <!-- begin #main-container -->
  <div id="main-container">
    <!-- begin #profile -->
    <!-- begin #profile -->
		<div id="profile" class="profile">
			<div id="top-profile" class="expand add-expand">
			
			
				<h1><?php echo esc_attr(kyte_return_theme_option('protitlem'));?></h1>

		
				<img class="small-image icon icon-left fa" src="<?php echo esc_url(kyte_return_theme_option('profilepic','url'));?>" alt="Mobile Profile Picture">
				
			</div>
			<div class="main-content-profile">
				<div class="close-icon-container">
					<a href="#top-profile" class="close-icon expand-profile"></a>
				</div>
				<div class="summary">
				
			
					<img class="big-image" src="<?php echo esc_url(kyte_return_theme_option('profilepic','url'));?>" alt="Profile Picture">
			
					
				
					<a href="<?php echo esc_url(home_url()); ?>">
						<img class="logo" src="<?php echo esc_url(kyte_return_theme_option('logopic','url'));?>" alt="Katya Logo">
					</a>
				
					
					
					<div class="occupation"><?php echo esc_attr(kyte_return_theme_option('Skilltop'));?></div>
					
				</div>
				
				
				<p class="hi">
					<span class="dropcap"><?php echo esc_attr(kyte_return_theme_option('procontent'));?></span><span class="detail"></span>
				</p>
				
				
				<?php if (kyte_return_theme_option('dbuttonopt')=='yes'){?>
				<div class="button">
					<a href="<?php echo kyte_return_theme_option('downloadbtnl');?>" class="download"><?php echo esc_attr(kyte_return_theme_option('downloadbtc'));?>
						<span class="fa fa-download"></span>
					</a>
				</div>
				<?php } ?>
				
				<div class="social-container">
					<ul class="social">
						<?php if (kyte_return_theme_option('fb')=='yes'){?>
						<li><a href="<?php echo kyte_return_theme_option('fblink')==null?'#': esc_url(kyte_return_theme_option('fblink'));?>" class="fa fa-facebook"></a></li>
						<?php } ?>
						<?php if (kyte_return_theme_option('tw')=='yes'){?>
						<li><a href="<?php echo kyte_return_theme_option('twlink')==null?'#': esc_url(kyte_return_theme_option('twlink'));?>" class="fa fa-twitter"></a></li>
						<?php } ?>
						<?php if (kyte_return_theme_option('dr')=='yes'){?>
						<li><a href="<?php echo kyte_return_theme_option('drlink')==null?'#': esc_url(kyte_return_theme_option('drlink'));?>" class="fa fa-dribbble"></a></li>
						<?php } ?>
						<?php if (kyte_return_theme_option('pl')=='yes'){?>
						<li><a href="<?php echo kyte_return_theme_option('pinterest')==null?'#': esc_url(kyte_return_theme_option('pinterest'));?>" class="fa fa-pinterest"></a></li>
						<?php } ?>
						<?php if (kyte_return_theme_option('lin')=='yes'){?>
						<li><a href="<?php echo kyte_return_theme_option('linkedin')==null?'#': esc_url(kyte_return_theme_option('linkedin'));?>" class="fa fa-linkedin"></a></li>
						<?php } ?>
						<?php if (kyte_return_theme_option('gl')=='yes'){?>
						<li><a href="<?php echo kyte_return_theme_option('glink')==null?'#': esc_url(kyte_return_theme_option('glink'));?>" class="fa fa-google-plus"></a></li>
						<?php } ?>
						<?php if (kyte_return_theme_option('yt')=='yes'){?>
						<li><a href="<?php echo kyte_return_theme_option('ytlink')==null?'#': esc_url(kyte_return_theme_option('ytlink'));?>" class="fa fa-youtube"></a></li>
						<?php } ?>
						<?php if (kyte_return_theme_option('dbx')=='yes'){?>
						<li><a href="<?php echo kyte_return_theme_option('dblink')==null?'#': esc_url(kyte_return_theme_option('dblink'));?>" class="fa fa-dropbox"></a></li>
						<?php } ?>
						<?php if (kyte_return_theme_option('bh')=='yes'){?>
						<li><a href="<?php echo kyte_return_theme_option('behance')==null?'#': esc_url(kyte_return_theme_option('behance'));?>" class="fa fa-behance"></a></li>
						<?php } ?>
						<?php if (kyte_return_theme_option('skl')=='yes'){?>
						<li><a href="<?php echo kyte_return_theme_option('sklink')==null?'#': esc_url(kyte_return_theme_option('sklink'));?>" class="fa fa-skype"></a></li>
						<?php } ?>
						<?php if (kyte_return_theme_option('flc')=='yes'){?>
						<li><a href="<?php echo kyte_return_theme_option('flclink')==null?'#': esc_url(kyte_return_theme_option('flclink'));?>" class="fa fa-flickr"></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<!-- end #profile -->

    