<?php
/*
  Template Name: Home Page
 */
?>

<?php get_header(); ?>

<?php if (have_posts()) the_post(); ?>

<?php
    $slides = null; // get_field('slides');

    if (is_array($slides)) {
        $elms = array();
        foreach ($slides as $v) {
            $elms[] = array(
                'src' => is_string($v['image']) ? $v['image'] : (
                    strpos($v['image']['description'], '(H)') !== false
                    ? $v['image']['url']
                    : $v['image']['sizes']['fed-slider-size']
                ),
                'link' => $v['link'],
                'title' => $v['title'],
                'text' => $v['description']
            );
        }
    }
?>

<div id="content">

    <div id="inner-content" class="wrap clearfix">

        <div id="main" class="twelve first clearfix" role="main">

            <?php if (get_the_ID()) : ?>

                <?php if (false) : ?>

                    <h1 class="page-title"><?php the_title(); ?></h1>

                    <p class="meta"><?php _e("Posted", "stitheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "stitheme"); ?> <?php the_author_posts_link(); ?>.</p>

                <?php endif; ?>

                <?php the_content(); ?>


            <?php else : ?>

                <p><?php _e("This is the error message in the page-home.php template.", "stitheme"); ?></p>

            <?php endif; ?>

        </div>

        <?php //get_sidebar(); // sidebar 1 ?>

    </div>

</div>

<?php if (count(@$elms) > 0) : ?>

    <script type="text/javascript">

            slides = <?php echo json_encode($elms) ?>;

            icon_play = '<?php echo home_url('assets/icons/092-Play-Icon.png') ?>';
            icon_pause = '<?php echo home_url('assets/icons/093-Paus-Icon.png') ?>';

            <?php if (true) : ?>
            jQuery(document).ready(function($) {
                setTimeout(function() {
                    if (typeof(isMobile) !== 'undefined' && !isMobile)
                        $('html,body').animate({scrollTop: 200}, 500);
                }, 200);
            });
            <?php endif; ?>

    </script>

<?php endif; ?>

<?php get_footer(); ?>