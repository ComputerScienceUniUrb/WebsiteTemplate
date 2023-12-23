<?php

$loop = new WP_Query(array(
    'post_type' => 'seminars',
    'posts_per_page' => -1,
    // @TODO: Order by...
));
    
?>

<?php if ($loop->have_posts()) : ?>

    <ul>

    <?php while ($loop->have_posts()) : $loop->the_post() ?>

        <?php
            $fields = get_fields();
            $date = date_i18n('j F Y', DateTime::createFromFormat('Ymd', $fields['date'][0]['data'])->getTimestamp());
            $n_dates = count($fields['date']);
            if ($n_dates > 1 && @$fields['date'][$n_dates - 1]['data']) {
                $date_end = date_i18n('j F Y', DateTime::createFromFormat('Ymd', $fields['date'][$n_dates - 1]['data'])->getTimestamp());
            }
        ?>

        <li>
             <a href="<?php echo the_permalink() ?>"><?php echo the_title() ?></a> (<?php echo $date . (@$date_end ? ' - ' . $date_end : '') ?>)
        </li>

        <?php unset($date_end) ?>
        
    <?php endwhile; ?>

    </ul>

<?php endif; ?>
