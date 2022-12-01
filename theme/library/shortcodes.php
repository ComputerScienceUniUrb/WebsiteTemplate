<?php

/* 
 *  [row] [col n="1..12" (c="first")] Content... [/col] [col ...] ... [/col] ... [/row]
 *  [autop] Content... [/autop]
 */


function sti_col_shortcode($atts, $content) {
    
    extract(shortcode_atts(array(
        'n' => '4',
        'c' => ''
    ), $atts));

    switch ((int)$n) {
        case 1:  $class = 'onecol'; break;
        case 2:  $class = 'twocol'; break;
        case 3:  $class = 'threecol'; break;
        case 4:  $class = 'fourcol'; break;
        case 5:  $class = 'fivecol'; break;
        case 6:  $class = 'sixcol'; break;
        case 7:  $class = 'sevencol'; break;
        case 8:  $class = 'eightcol'; break;
        case 9:  $class = 'ninecol'; break;
        case 10: $class = 'tencol'; break;
        case 11: $class = 'elevencol'; break;
        case 12: $class = 'twelvecol'; break;
        default:
            $class = 'fourcol';
            break;
    }
    
    if ($c)
        $class .= ' ' . $c;
    
    $div = '<div class="' . $class . '">';
            
    return $div . do_shortcode(wpautop($content)) . '</div>';
}
add_shortcode('col', 'sti_col_shortcode');


function sti_row_shortcode($atts, $content) {
        
    $content = str_replace(array("<br />", "<br>", "<p></p>"), '', $content);
    
    return '<div class="feature-row clearfix">' . do_shortcode($content) . '</div>';
}
add_shortcode('row', 'sti_row_shortcode');


function sti_autop_shortcode($atts, $content) {
    
    return do_shortcode(wpautop($content));
}
add_shortcode('autop', 'sti_autop_shortcode');


function sti_bb_archive() {
    
    ob_start();

    include_once (TEMPLATEPATH . '/_bb-archive.php');

    $ret = ob_get_contents();
    ob_end_clean();        
    
    return '<div class="bb-list">' . $ret . '</div>';
}
add_shortcode('bb_archive', 'sti_bb_archive');


function sti_seminars_archive() {
    
    ob_start();

    include_once (TEMPLATEPATH . '/_seminars.php');

    $ret = ob_get_contents();
    ob_end_clean();        
    
    return '<div class="seminars-list">' . $ret . '</div>';
}
add_shortcode('seminars', 'sti_seminars_archive');


function sti_get_content($atts) {
    
    extract(shortcode_atts(array(
        'url' => '',
    ), $atts));
    
    try {
        if (!$url)
            throw new Exception('Errore: paramentro "url" assente');
        
        $response = file_get_contents($url);
                
        //$begin = strpos('body', $response);
        //$end = strpos('</body>', $response, $begin);
        
        $matches = array();
        $res = preg_match('/<body>/m', $response, $matches, PREG_OFFSET_CAPTURE);
        
        if ($res && @$matches[0][1])
            $begin = $matches[0][1];
        else
            throw new Exception('Contenuto non disponibile. Vedi: <a href="' . $url . '">' . $url . '</a>');
        
        $res = preg_match('/<\/body>/m', $response, $matches, PREG_OFFSET_CAPTURE, $begin);
        
        if ($res && @$matches[0][1])
            $end = $matches[0][1];
        else
            throw new Exception('Errore: contenuto esterno non corretto');
        
        $response = substr($response, $begin + 6, $end - $begin);
        
        $response = preg_replace('/<strong>.*<\/h1>/ms', '', $response);
        
        $response = iconv("ISO-8859-1", "UTF-8", $response);
    }
    catch (Exception $e) {
        $response = $e->getMessage();
    }
    remove_filter('the_content', 'wpautop');
    return $response;
}
add_shortcode('get_content', 'sti_get_content');


function sti_latests_posts($atts) {
    
    extract(shortcode_atts(array(
        'cat_id' => '',
        'num_posts' => 2
    ), $atts));
    
    $args = array(
        'orderby' => 'date',
        'order' => 'DESC',
        'showposts' => $num_posts,
    );
    
    if (@$category_id) {
        $args['category_id'] = $cat_id;
    }
    
    query_posts($args);
    
    $ret = '';
    if (have_posts()) {
        $ret .= '<ul class="latests-posts">';
        
        while (have_posts()) {
            the_post();
            
            $ret .= '<li>'
                      . '<h3><a href="' . get_permalink() . '">'
                          . get_the_title()
                      . '</a></h3>'
                      . get_the_excerpt()
                  . '</li>' . "\r\n";
        }
        
        $ret .= '</ul>';
    }
    
    wp_reset_query();
    
    return $ret;
}
add_shortcode('latests_posts', 'sti_latests_posts');


remove_filter('the_content', 'wpautop');
add_filter('the_content', 'wpautop' , 12);


function sti_comment_shortcode($atts, $content) {
    
    return '';
}
add_shortcode('comment', 'sti_comment_shortcode');

?>
