<?php

$loop = new WP_Query(array(
    'post_type' => 'bulletin_board',
    'posts_per_page' => 3,
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

<?php if ($loop->have_posts()) : ?>
    
    <ul>
    
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>

        <li><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>

    <?php endwhile; ?>	
            
    </ul>

<?php else : ?>

        <p><?php _e('Non ci sono annunci', 'stitheme'); ?></p>

<?php endif; ?>
