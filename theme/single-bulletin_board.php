
<?php get_header(); ?>

<div id="content">

    <div class="page-title clearfix">
        <div class="wrap">
            <h1 class="twelvecol clearfix" itemprop="headline"><?php _e('Annuncio in bacheca', 'stitheme') ?></h1>
        </div>
    </div>

    <div id="inner-content" class="wrap clearfix">

        <div id="main" class="twelve first clearfix bb-view" role="main">

            
            <?php if (have_posts()) : the_post(); ?>
            
                <h2><?php the_title() ?></h2>
                
            <p class="meta">
                <?php _e("Pubblicato il", "stitheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><strong><?php the_time(pll__('j F Y')); ?></strong></time> 
                
                <?php _e("da", "stitheme"); ?> <strong><?php the_author(); ?></strong>.
                
                <?php $date = DateTime::createFromFormat('Ymd', get_field('expiry_date')); ?>
                <?php _e("Scadenza", "stitheme"); ?> <time datetime="<?php echo $date->format('Y-m-j'); ?>" pubdate><strong><?php echo date_i18n(pll__('j F Y'), $date->getTimestamp()); ?></strong></time>.
            </p>

                <?php the_content(); ?>

            <?php else : ?>

                <h1><?php _e("404", "stitheme"); ?></h1>

            <?php endif; ?>

        </div>

        <?php //get_sidebar(); // sidebar 1 ?>

    </div>

</div>

<?php get_footer(); ?>