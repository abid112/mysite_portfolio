    <?php
    /**
     * The Header for our theme.
     *
     * Displays all of the <head> section and everything up till <div id="content">
     *
     * @package rootstrap
     */
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!-- Google Analytics -->
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-67582101-19', 'auto');
    ga('send', 'pageview');
    </script>
    <!-- End Google Analytics -->

    <!-- favicon -->

    <?php if ( rootstrap_get_option( 'custom_favicon' ) ) { ?>
    <link rel="icon" href="<?php echo rootstrap_get_option( 'custom_favicon' ); ?>" />
    <?php } ?>

    <!--[if IE]><?php if ( rootstrap_get_option( 'custom_favicon' ) ) { ?><link rel="shortcut icon" href="<?php echo rootstrap_get_option( 'custom_favicon' ); ?>" /><?php } ?><![endif]-->	

    <meta name="geo.region" content="US-IL" />
    <meta name="geo.placename" content="Northfield" />
    <meta name="geo.position" content="42.103317;-87.7734094" />
    <meta name="ICBM" content="42.103317, -87.7734094" />

    <link href="https://plus.google.com/109973505906107821115" rel="publisher">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@GLGAccounting_">
    <meta name="twitter:title" content="The Chicago CPA Account For Quick Business Growth | GLG Accounting">
    <meta name="twitter:description" content="GLG Accounting is a Chicago CPA firm that offers a wide variety of accounting and bookkeeping services. Seek a reliable Chicago accountant? Contact fast! ">
    <meta name="twitter:image" content="https://www.glgaccounting.com/wp-content/uploads/2017/05/glg-accounting-logo.png">
    <meta name="twitter:image:alt" content="GLG Accounting">

    <meta property="og:type" content="business.business">
    <meta property="og:title" content="The Chicago CPA Accountant For Quick Business Growth | GLG Accounting">
    <meta property="og:description" content="GLG Accounting is a Chicago CPA firm that offers a wide variety of accounting and bookkeeping services. Seek a reliable Chicago accountant? Contact fast! ">
    <meta property="og:image" content="https://www.glgaccounting.com/wp-content/uploads/2017/05/glg-accounting-logo.png">
    <meta property="business:contact_data:street_address" content="400 Central Ave, Suite 340B">
    <meta property="business:contact_data:locality" content="Northfield">
    <meta property="business:contact_data:region" content="IL">
    <meta property="business:contact_data:postal_code" content="60093">
    <meta property="business:contact_data:country_name" content="USA">
    <meta property="business:contact_data:email" content="contact@glgaccounting.com">
    <meta property="business:contact_data:phone_number" content="(312) 754-9377">
    <meta property="business:contact_data:website" content="https://www.glgaccounting.com/">
    <meta property="place:location:latitude" content="42.103317">
    <meta property="place:location:longitude" content="-87.7734094">

    <?php wp_head(); ?>
    </head>
    <div class="container">
    <div class="row">
    <div class="col-md-8">

    <div class="head-section">
        <h3 class="site-title" itemprop="headline"><a href="#"><?php bloginfo('title');?> </a></h3>
        <h1> <a href="#"><?php bloginfo('description');?> </a> </h1>
         
    </div>

        
    </div>
    <div class="col-md-4">
    <div class="site-header-contact">
    <span class="phone">
        <span class="call-us" style="text-align: center !important;font-size: 24px;">Call Dr. BADE</span>
        <br>
     
        <?php echo get_theme_mod('call') ?>
        </span>
        
        
        </div>
       <br>
        <div class="address">
        <span>429 Conkey Street Hammond, IN, 46324</span>
        </div>

    </div>
    </div>
    </div>


    <div class="for-back">
        <div class="container">
            <nav class="nav-primary" role="navigation">                    
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  
                    <ul class="nav navbar-nav">
                        <?php wp_nav_menu(array(
                    'theme_location'=>'mainmenubar',
                    'menu_class'=>'menu genesis-nav-menu menu-primary'

                    )) ?>                 
                    </ul>
                </div><!-- /.navbar-collapse -->               
            </nav>
        </div>
    </div>
        
      
        