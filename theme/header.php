<!doctype html>  

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

    <head>
        <meta charset="utf-8">

        <title><?php wp_title(''); ?></title>

        <!-- Google Chrome Frame for IE -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <!-- mobile meta (hooray!) -->
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700,300' rel='stylesheet' type='text/css'>
        
        <script type="text/javascript">
            var home_url = '<?php echo home_url() ?>';
        </script>

        <!--[if lt IE 8]>
        <style type='text/css'>
            .page-title { padding-bottom: 15px; }
            #inner-content { padding-top: 125px; }
            .page-template-page-home-php #inner-content { padding-top: 0 !important; }
        </style>
        <![endif]-->        
        <?php wp_head(); ?>

        <?php if ($_SERVER['HTTP_HOST'] == 'informatica.uniurb.it') : ?>
            <script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

              ga('create', 'UA-45219210-1', 'uniurb.it');
              ga('send', 'pageview');

            </script>        
        <?php endif; ?>
        
    </head>

    <body <?php body_class(); ?>>

        <div id="container">

            <header class="header" role="banner">

                <div id="top-bar" class="clearfix">
                    
                    <div class="wrap">
                        <div class="eightcol first">
                            <ul>
                                <?php if (STI_LANG_MANU) : ?>
                                    <?php pll_the_languages(); ?>
                                <?php else : ?>
                                    <li class="lang-item lang-item-2 lang-item-it current-lang"><a hreflang="it" href="/">Italiano</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div class="fourcol last">
                            
                            <ul class="icons">
                                <li><a href="https://www.facebook.com/InformaticaapplicataUniversitaDegliStudiDiUrbino?ref=hl" title="Facebook"><img src="<?php echo home_url('assets/icons/brands/facebook-24.png') ?>" alt="facebook" /></a></li>
                                <li><a href="https://twitter.com/InfoAppl" title="Twitter"><img src="<?php echo home_url('assets/icons/brands/twitter-24.png') ?>" alt="twitter" /></a></li>
                                <li><a href="skype:$cdl.informatica?call" title="Skype"><img src="<?php echo home_url('assets/icons/brands/skype-24.png') ?>" alt="skype" /></a></li>
                                <li><a href="#" title="Foursquare"><img src="<?php echo home_url('assets/icons/brands/foursquare-24.png') ?>" alt="foursquare" /></a></li>
                                <li><a href="http://mail.google.com/a/campus.uniurb.it" title="e-mail"><img src="<?php echo home_url('assets/icons/brands/email-24.png') ?>" alt="email" /></a></li>
                                <li><a href="<?php bloginfo('rss2_url'); ?>" title="RSS"><img src="<?php echo home_url('assets/icons/brands/rss-24.png') ?>" alt="rss" /></a></li>
                            </ul>

                        </div>
                    </div>
                    
                </div>

                <div id="inner-header" class="wrap clearfix">

                    <?php if (false) : ?>
                        <p id="logo" class="h1"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>
                    <?php endif; ?>


                        <div class="eightcol first">
                            <a href="<?php echo home_url(); ?>">
                                <img id="logo" src="<?php echo home_url('assets/logo_sti_new.png') ?>" alt="Logo">
                            </a>
                        </div>

                        <div class="fourcol last">

                        </div>

                </div> <!-- end #inner-header -->

                
                <div id="nav-container" class="clearfix">
                    
                    <nav role="navigation" class="wrap">

                        <?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?>

                        <?php //echo get_search_form(); ?>

                    </nav>
                    
                </div>

            </header> <!-- end header -->
