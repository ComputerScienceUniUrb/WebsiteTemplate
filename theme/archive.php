<?php get_header(); ?>

<div id="content">

    <?php if (is_category()) { ?>
        <?php $title = single_cat_title('', false); ?>

    <?php } elseif (is_tag()) { ?> 
        <?php $title = __("Post Taggati:", "stitheme") . ' ' . single_tag_title('', false); ?>

    <?php } elseif (is_author()) { ?>
        <?php //$title = __("Posts By:", "stitheme") . get_the_author(); ?>
        <?php the_post(); ?>
        <?php $title = __("Posts By Author:", "stitheme") . ' ' . get_the_author(); ?>
        <?php rewind_posts(); ?>

    <?php } elseif (is_day()) { ?>
        <?php $title = __("Daily Archives:", "stitheme") . ' ' . the_time('l, F j, Y'); ?>

    <?php } elseif (is_month()) { ?>
        <?php $title = __("Monthly Archives:", "stitheme") . ' ' . the_time('F Y'); ?>

    <?php } elseif (is_year()) { ?>
        <?php $title = __("Yearly Archives:", "stitheme") . ' ' . the_time('Y'); ?>
    <?php } ?>


    <div class="page-title clearfix">
        <div class="wrap">
            <h1 class="twelvecol clearfix" itemprop="headline"><?php echo $title; ?></h1>
        </div>
    </div>        

    <div id="inner-content" class="wrap clearfix">

        <?php if (is_active_sidebar('sidebar_blog')) : ?>

            <div class="sidebar fourcol clearfix last">
                <?php dynamic_sidebar('sidebar_blog'); ?>
            </div>

        <?php endif; ?>


        <div id="main" class="eightcol first clearfix" role="main">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

                        <header class="article-header">

                            <h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

                            <?php if (has_post_thumbnail()) : ?>
                            
                                <?php if (false) : ?>
                                <!--
                                <div class="clearfix with-thumbnail">

                                    <div class="fourcol first clearfix">
                                -->
                                <?php endif; ?>

                                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('fourcol'); ?></a>

                                <?php if (false) : ?>
                                <!--
                                    </div>

                                    <div class="fourcol last clearfix">
                                -->
                                <?php endif; ?>
                            
                            
                            <?php endif; ?>
                                    
                                    <p class="meta">
                                        <?php _e("Pubblicato il", "stitheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><strong><?php the_time('j F Y'); ?></strong></time> 
                                        <?php _e("da", "stitheme"); ?> <strong><?php the_author(); ?></strong> <?php //the_author_posts_link(); ?>
                                        <?php if (false) : ?>
                                            <span class="amp">&</span>
                                            <?php _e("filed under", "stitheme"); ?> <?php the_category(', '); ?>.
                                        <?php endif; ?>
                                        <br />
                                        <?php the_tags(__('Tag: '), ' / ') ?>
                                    </p>
                                    
                            <?php if (false && has_post_thumbnail()) : ?>
                            <!--
                                </div>
                                
                            </div>
                            -->
                            <?php endif; ?>
                            
                        </header> <!-- end article header -->

                        <section class="post-content clearfix">

                            <?php the_content(__("Continua a leggere...", "stitheme")); //the_excerpt(); ?>

                        </section> <!-- end article section -->

                        <?php if (false) : ?>
                        <footer class="article-footer">

                        </footer> <!-- end article footer -->
                        <?php endif; ?>

                    </article> <!-- end article -->

                <?php endwhile; ?>	

                <?php if (function_exists('bones_page_navi')) { // if experimental feature is active ?>

                    <?php bones_page_navi(); // use the page navi function ?>

                <?php } else { // if it is disabled, display regular wp prev & next links ?>
                    <nav class="wp-prev-next">
                        <ul class="clearfix">
                            <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "stitheme")) ?></li>
                            <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "stitheme")) ?></li>
                        </ul>
                    </nav>
                <?php } ?>

            <?php else : ?>

                <article id="post-not-found" class="hentry clearfix">
                    <header class="article-header">
                        <h1><?php _e("Oops, Post Not Found!", "stitheme"); ?></h1>
                    </header>
                    <section class="post-content">
                        <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "stitheme"); ?></p>
                    </section>
                    <footer class="article-footer">
                        <p><?php //_e("This is the error message in the archive.php template.", "stitheme"); ?></p>
                    </footer>
                </article>

            <?php endif; ?>

        </div> <!-- end #main -->


    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>