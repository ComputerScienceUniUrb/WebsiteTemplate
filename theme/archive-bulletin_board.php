<?php get_header(); ?>


<div id="content">

    <div class="page-title clearfix">
        <div class="wrap">
            <h1 class="twelvecol clearfix" itemprop="headline"><?php _e('Bacheca', 'stitheme'); ?><span> <a href="<?php bloginfo('rss2_url'); ?>?post_type[]=bulletin_board"><img src="<?php echo home_url('assets/icons/brands/rss-24.png') ?>" alt="rss" /></a></span></h1>
        </div>
    </div>

    <div id="inner-content" class="wrap clearfix">

        <div id="main" class="twelve first clearfix bb-list" role="main">

            <?php include_once '_bb-archive.php'; ?>

        </div>

        <?php //get_sidebar(); // sidebar 1 ?>

    </div>

</div>


<?php get_footer(); ?>