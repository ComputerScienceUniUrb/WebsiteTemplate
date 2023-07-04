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

    <?php if (count(@$elms) > 0) : ?>
    
        <div class="fed-slider-container clearfix">
            <div class="wrap">
                <div class="eightcol first">
                    <div id="fed_slider"></div>
                </div>
                <div id="fed_slider_text" class="fourcol last">
                    <?php for ($i = 0; $i < count($elms); $i ++) : ?>
                    <div id="fed_slider_text_<?php echo $i ?>"<?php echo $i != 0 ? ' style="display: none;" class="hidden"' : '' ?>>
                            <h2><?php echo $elms[$i]['title'] ?></h2>
                            <p><?php echo $elms[$i]['text'] ?></p>
                        </div>
                    <?php endfor; ?>
                    
                    <div class="buttons">
                        <ul>
                            <li class="fed-prev"><img src="<?php echo home_url('assets/icons/109-Left-arrow-Icon.png') ?>"  alt="Previous"></li>
                            <li class="fed-play"><img src="<?php echo home_url('assets/icons/093-Paus-Icon.png') ?>" alt="Pause"></li>
                            <li class="fed-next"><img src="<?php echo home_url('assets/icons/112-Right-arrow-Icon.png') ?>" alt="Next"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

    <div class="fed-slider-container clearfix">
        <div class="wrap" style="font-size: 0">
            <div class="first">
                <video style="width: 100%; height: auto" controls autoplay muted width="960" height="540">
                    <source src="https://informatica.uniurb.it/wp-content/uploads/informatica_scienza_e_tecnologia_promo_web.mp4">
                </video>
            </div>
        </div>
    </div>

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