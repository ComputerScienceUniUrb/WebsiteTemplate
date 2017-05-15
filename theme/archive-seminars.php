<?php get_header(); ?>


<div id="content">

    <div class="page-title clearfix">
        <div class="wrap">
            <h1 class="twelvecol clearfix" itemprop="headline"><?php _e('Seminari', 'stitheme'); ?></h1>
        </div>
    </div>

    <div id="inner-content" class="wrap clearfix">

        <div id="main" class="twelve first clearfix seminars-list" role="main">

            <?php include '_seminars.php'; ?>
            
        </div>

        <?php //get_sidebar(); // sidebar 1 ?>

    </div>

</div>


<?php get_footer(); ?>