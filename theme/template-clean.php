<?php /* Template Name: Clean page */

get_header('clean');
?>

<style type="text/css">
#content {
    margin: 0 !important;
}
header.cover {
    width: 100%;
    margin: 0 0 2em 0;
}
header.cover img {
    width: 100%;
    height: auto;
}
#inner-content {
    margin-top: 0;
}
article h2 {
    margin-top: 2em;
    margin-bottom: 0;
}
article h3 {
    margin-top: 1.5em;
    margin-bottom: 0;
}
h1.h1 {
    margin-top: 0 !important;
    margin-bottom: 0 !important;
}
#main {
    padding: 2em;
    background: #FFF;
}
@media only screen and (min-width: 480px) {
    #main {
        border-radius: 2em;
        box-shadow: 3px 3px 16px rgba(5%, 5%, 5%, 0.3);
        margin-top: 2em;
        margin-bottom: 2em;
    }
}
</style>

<?php if(have_posts()) { ?>
    <?php the_post(); ?>

<div id="content">

    <?php if(has_post_thumbnail()) { ?>
        <header class="cover">
            <?php the_post_thumbnail(); ?>
        </header>
    <?php } ?>

    <div id="inner-content" class="wrap clearfix picker">

        <div id="main" class="twelve first clearfix" role="main">

            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

                <h1 class="h1"><?php the_title(); ?></h1>

                <section class="post-content clearfix">
                    <?php the_content(); ?>
                </section>

                <footer class="article-footer">
                    <p class="tags"><?php the_tags('<span class="tags-title">Tags:</span> ', ', ', ''); ?></p>
                </footer>

            </article>

        </div>

    </div>

</div>

<?php } ?>

<?php get_footer('redux');
