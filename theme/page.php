<?php
/*
  Template Name: Full Width Page
 */
?>

<?php get_header(); ?>

<div id="content">

    <div class="page-title clearfix">
        <div class="wrap">
            <h1 class="twelvecol clearfix" itemprop="headline"><?php the_title(); ?><span> <a href="<?php bloginfo('rss2_url'); ?>?post_type[]=bulletin_board"><img src="<?php echo home_url('assets/icons/brands/rss-24.png') ?>" alt="rss" /></a></span></h1>
        </div>
    </div>

    <div id="inner-content" class="wrap clearfix">

        <div id="main" class="twelve first clearfix" role="main">

            <?php if (have_posts()) : the_post(); ?>

                <?php the_content(); ?>

            <?php else : ?>

                <h1><?php _e("404", "stitheme"); ?></h1>

            <?php endif; ?>

        </div>

        <?php //get_sidebar(); // sidebar 1 ?>

    </div>

</div>

<?php get_footer(); ?>