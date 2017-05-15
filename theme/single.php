<?php get_header(); ?>

<div id="content">

    <?php if (have_posts()) : the_post(); ?>

        <div class="page-title clearfix">
            <div class="wrap">
                <h1 class="twelvecol clearfix" itemprop="headline"><?php the_title(); ?></h1>
            </div>
        </div>    

        <div id="inner-content" class="wrap clearfix">

            <div id="main" class="twelvecol first clearfix" role="main">


                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                    <header class="article-header">
                        <p class="meta">
                            <?php _e("Pubblicato il", "stitheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><strong><?php the_time(pll__('j F Y')); ?></strong></time> 
                            <?php _e("da", "stitheme"); ?> <?php the_author_posts_link(); ?>
                            <?php if (false) : ?>
                                <span class="amp">&</span>
                                <?php _e("filed under", "stitheme"); ?> <?php the_category(', '); ?>.
                            <?php endif; ?>
                            <br />
                            <?php the_tags(__('Tag: '), ' / ') ?>
                        </p>
                    </header>

                    <section class="post-content clearfix" itemprop="articleBody">
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <br>
                            
                            <?php
                                $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                                $large_image_url = $large_image_url[0];
                            ?>
                            <?php if (isset($large_image_url)) : ?>
                                <a href="<?php echo $large_image_url ?>">
                            <?php endif; ?>
                                    
                                <?php the_post_thumbnail('sixcol'); ?>
                                    
                            <?php if (isset($large_image_url)) : ?>
                                </a>
                            <?php endif; ?>
                                    
                        <?php endif ?>
                        
                        <?php the_content(); ?>
                        
                    </section> <!-- end article section -->


                    <?php if (false) : ?>
                    <footer class="article-footer">

                    </footer> <!-- end article footer -->
                    <?php endif; ?>

                    <?php comments_template(); // comments should go inside the article element ?>

                </article>

            </div>
        </div>

    <?php else : ?>

        <div id="inner-content" class="wrap clearfix">

            <div id="main" class="twelvecol first clearfix" role="main">

                <article id="post-not-found" class="hentry clearfix">
                    <header class="article-header">
                        <h1><?php _e("Oops, Post Not Found!", "stitheme"); ?></h1>
                    </header>
                    <section class="post-content">
                        <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "stitheme"); ?></p>
                    </section>
                    <footer class="article-footer">
                        <p><?php _e("This is the error message in the single.php template.", "stitheme"); ?></p>
                    </footer>
                </article>

            </div>
        </div>

    <?php endif; ?>

</div>

<?php //get_sidebar(); // sidebar 1 ?>

</div>

</div>

<?php get_footer(); ?>