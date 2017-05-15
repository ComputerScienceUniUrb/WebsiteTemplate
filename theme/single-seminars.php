<?php get_header(); ?>

<div id="content">

    <?php if (have_posts()) : the_post(); ?>

        <?php
            $fields = get_fields();
            $date_end = '';
            $n_dates = count($fields['date']);
            if ($n_dates > 1 && @$fields['date'][$n_dates - 1]['data']) {
                $date_end = date_i18n(pll__('j F Y'), DateTime::createFromFormat('Ymd', $fields['date'][$n_dates - 1]['data'])->getTimestamp());
            }
            $date = date_i18n(pll__('j F Y'), DateTime::createFromFormat('Ymd', $fields['date'][0]['data'])->getTimestamp()) . (@$date_end ? ' - ' . $date_end : '');
        ?>
    
    
        <div class="page-title clearfix">
            <div class="wrap">
                <h1 class="twelvecol clearfix" itemprop="headline"><?php _e("Seminario del", "stitheme"); ?> <?php echo $date ?></h1>
            </div>
        </div>    

        <div id="inner-content" class="wrap clearfix">

            <div id="main" class="twelvecol first clearfix" role="main">
                
                <h2><?php the_title(); ?></h2>
                        
                <?php the_content(); ?>            
                
                <?php if ($fields['relatore']) : ?>
                    <h3><?php _e("Relatore", "stitheme"); ?></h3>
                    <p><?php echo $fields['relatore'] ?></p>
                <?php endif; ?>

                <?php if ($fields['docente']) : ?>
                    <h3><?php _e("Docente di riferimento", "stitheme"); ?></h3>
                    <p><?php echo $fields['docente'] ?></p>
                <?php endif; ?>
                    
                <?php if ($fields['vincoli']) : ?>
                    <h3><?php _e("Vincoli di partecipazione", "stitheme"); ?></h3>
                    <p><?php echo $fields['vincoli'] ?></p>
                <?php endif; ?>
                    
                <?php if (count($fields['date']) > 0) : ?>
                    <h3><?php _e("Date", "stitheme"); ?></h3>
                    
                    <table class="big">
                        <thead class="dark">
                            <tr>
                                <th><?php _e("Luogo", "stitheme"); ?></th>
                                <th><?php _e("Data", "stitheme"); ?></th>
                                <th><?php _e("Orario", "stitheme"); ?></th>
                                <th><?php _e("Crediti (CFU)", "stitheme"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($fields['date'] as $date) : ?>
                                <?php if (!($date['data'] && $date['orario'])) continue ?>
                                <tr>
                                    <td><?php echo $date['luogo'] ?></td>
                                    <td><?php echo date_i18n(pll__('j F Y'), DateTime::createFromFormat('Ymd', $date['data'])->getTimestamp()) ?></td>
                                    <td><?php echo $date['orario'] ?></td>
                                    <td><?php echo $date['crediti'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                <?php endif; ?>
                    
                    
            </div>
        </div>

    <?php else : ?>

        <div id="inner-content" class="wrap clearfix">

            <div id="main" class="twelvecol first clearfix" role="main">

                <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "stitheme"); ?></p>

            </div>
        </div>

    <?php endif; ?>

</div>

<?php //get_sidebar(); // sidebar 1 ?>

</div>

</div>

<?php get_footer(); ?>