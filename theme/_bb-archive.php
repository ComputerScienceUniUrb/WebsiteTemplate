<?php

$loop = new WP_Query(array(
    'post_type' => 'bulletin_board',
    'posts_per_page' => -1,
    'meta_query' => array(
        array(
            'key ' => 'expiry_date',
            'value' => date('Ymd'),
            'compare' => '>=',
            'type' => 'DATE'
        )
    )
));

?>

<?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>

        <div>

            <h2><?php the_title(); ?></h2>

            <p class="meta">
                <?php _e("Pubblicato il", "stitheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><strong><?php the_time('j F Y'); ?></strong></time>

                <?php _e("da", "stitheme"); ?> <strong><?php the_author(); ?></strong>.

                <?php $date = DateTime::createFromFormat('Ymd', get_field('expiry_date')); ?>
                <?php _e("Scadenza", "stitheme"); ?> <time datetime="<?php echo $date->format('Y-m-j'); ?>" pubdate><strong><?php echo date_i18n('j F Y', $date->getTimestamp()); ?></strong></time>.
            </p>

            <?php the_content(); ?>

            <?php //comments_template(); ?>

        </div>

    <?php endwhile; ?>

<?php else : ?>

    <h1><?php _e("Non ci sono annunci!", "stitheme"); ?></h1>
    </article>

<?php endif; ?>
