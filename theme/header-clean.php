<!DOCTYPE html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

    <head>
        <meta charset="utf-8">

        <title>Informatica | Università degli Studi di Urbino</title>

        <!-- Google Chrome Frame for IE -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <!-- mobile meta (hooray!) -->
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon.ico"> 
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-16x16.png" sizes="16x16" />
        <meta name="application-name" content="Informatica Applicata"/>
        <meta name="msapplication-TileColor" content="#169D58" />
        <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/faviconsmstile-144x144.png" />

        <link href='//fonts.googleapis.com/css?family=Open+Sans:400italic,400,700,300' rel='stylesheet' type='text/css'>

        <?php infoappl_opengraph(); ?>

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

