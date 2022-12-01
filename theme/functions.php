<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images, 
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
    - head cleanup (remove rsd, uri links, junk css, ect)
	- enqeueing scripts & styles
	- theme support functions
    - custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/bones.php'); // if you remove this, bones will break
/*
2. library/custom-post-type.php
    - an example custom post type
    - example custom taxonomy (like categories)
    - example custom taxonomy (like tags)
*/
//require_once('library/custom-post-type.php'); // you can disable this if you like
/*
3. library/admin.php
    - removing some default WordPress dashboard widgets
    - an example custom dashboard widget
    - adding custom login css
    - changing text in footer of admin
*/
// require_once('library/admin.php'); // this comes turned off by default
/*
4. library/translation/translation.php
    - adding support for other languages
*/
require_once('library/translation/translation.php'); // this comes turned off by default

remove_action('wp_head', 'wp_generator');
 
/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'fed-slider-size', 615, 300, true );
add_image_size( 'twocol-q', 130, 130, true );
add_image_size( 'threecol-q', 210, 210, true );
add_image_size( 'threecol', 210 );
add_image_size( 'fourcol', 290 );
add_image_size( 'sixcol', 450 );
add_image_size( 'twelvecol-l', 930, 310, true );

/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
    
    register_sidebar(array(
    	'id' => 'sidebar_blog',
    	'name' => 'Sidebar Blog',
    	'description' => 'Colonna destra del blog',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
    	'id' => 'footer_bar',
    	'name' => 'Footer',
    	'description' => 'Seconda colonna del footer',
    	'before_widget' => '',
    	'after_widget' => '',
    	'before_title' => '<h3>',
    	'after_title' => '</h3>',
    ));
    /*
    register_sidebar(array(
    	'id' => 'top_bar',
    	'name' => 'Top bar',
    	'description' => 'Zona in alto a destra',
    	'before_widget' => '',
    	'after_widget' => '',
    	'before_title' => '',
    	'after_title' => '',
    ));
    */
    
    /* 
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call 
    your new sidebar just use the following code:
    
    Just change the name to whatever your new
    sidebar's id is, for example:
    
    register_sidebar(array(
    	'id' => 'sidebar2',
    	'name' => 'Sidebar 2',
    	'description' => 'The second (secondary) sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
    
    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php
    
    */
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/
		
// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
			    <?php /*
			        this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
			        echo get_avatar($comment,$size='32',$default='<path_to_url>' );
			    */ ?>
			    <!-- custom gravatar call -->
			    <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>&s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
			    <!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(pll__('j F Y')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'stitheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
       			<div class="alert info">
          			<p><?php _e('Your comment is awaiting moderation.', 'stitheme') ?></p>
          		</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('Search for:', 'stitheme') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search the Site...','stitheme').'" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </form>';
    return $form;
} // don't remove this bracket!


 require_once ('library/fed_utils.php');

// CUSTOM FIELDS
// require_once('library/acf.php');

// CUSTOM POST TYPES
require_once('library/bulletin_board.php');
require_once('library/seminars.php');

// SHORTCODES
require_once('library/shortcodes.php');

// ADMIN BAR
function move_admin_bar() {
    echo '
    <style type="text/css">
    body { 
    margin-top: -28px;
    padding-bottom: 28px;
    }
    body.admin-bar #wphead {
       padding-top: 0;
    }
    body.admin-bar #footer {
       padding-bottom: 28px;
    }
    #wpadminbar {
        top: auto !important;
        bottom: 0;
    }
    #wpadminbar .quicklinks .menupop ul {
        bottom: 0px;
    }
    #wpadminbar .ab-top-secondary .menupop .ab-sub-wrapper {
        bottom: 28px;
    }
    </style>';
}
if (current_user_can('edit_posts'))
    add_action( 'wp_head', 'move_admin_bar' );

// OLD CONTENT
function get_old_sti_content() {
    if (isset($_REQUEST['sti_old_url'])) {
        try {
            if (preg_match('/http:\/\/www\.sti\.uniurb\.it\/.+\.html/', $_REQUEST['sti_old_url'])) {
                if ($content = file_get_contents($_REQUEST['sti_old_url']))
                    echo $content;
                else
                    throw new Exception();
                die();
            }
            else if (preg_match('/[\w\d]+\.html/', $_REQUEST['sti_old_url'])) {
                $url = str_replace('../', '', $_REQUEST['sti_old_url']);
                if ($content = file_get_contents('http://www.sti.uniurb.it/info_appl_l31/' . $url))
                    echo $content;
                else
                    throw new Exception();
                die();
            }
            else {    
                throw new Exception();
            }
        }
        catch (Exception $e) {
             die(__('Contenuto non disponibile', 'stitheme'));
        }
    }
}
add_action('init', 'get_old_sti_content');

// EXCERPT LENGTH
function custom_excerpt_length( $length ) {
	return 25;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

// MAIL NOTIFICATIONS TO ADMIN

/*
add_action('admin_enqueue_scripts', 'sti_disable_autosave');

function sti_disable_autosave() {
    wp_dequeue_script('autosave');
}
*/

add_action('save_post', 'sti_send_email_notifications');

function sti_send_email_notifications($post_id) {
    
    if (@$_POST['post_type'] == 'bulletin_board') {
        
        if (!wp_is_post_revision($post_id)) {
            
            $post = get_post($post_id);    
            
            if (did_action('publish_bulletin_board')) {
                $is_new = ($post->post_date == $post->post_modified) ? true : false;
                $users = get_users(array('role' => 'administrator'));
                foreach ($users as $user) {
                    wp_mail($user->data->user_email,
                            ($is_new ? 'Nuovo ' : 'Aggiornamento dell\'') . 'annuncio "' . $post->post_title . '"',
                            $post->post_content);
                }
            }
            else if ($post->post_status == 'pending') {
                $users = get_users(array('role' => 'administrator'));
                foreach ($users as $user) {
                    wp_mail($user->data->user_email,
                            'Annuncio "' . $post->post_title . '" in attesa di revisione',
                            $post->post_content);
                }            
            }
        }
    }
    
}

// METABOX OTHER USERS

add_action('admin_menu', 'remove_author_meta_box');
function remove_author_meta_box() {
    remove_meta_box('authordiv', 'post', 'normal');
    remove_meta_box('authordiv', 'page', 'normal');
    remove_meta_box('authordiv', 'bulletin_board', 'normal');
    remove_meta_box('authordiv', 'seminars', 'normal');
    remove_meta_box('authordiv', 'attachment', 'normal');
    remove_meta_box('authordiv', 'link', 'normal');
}

add_action('admin_head', 'add_author_sti_meta_box');
function add_author_sti_meta_box() {
    if (@$_GET['action'] == 'edit' && isset($_GET['post'])) {
        $post_type = get_post($_GET['post']);
        $post_type = $post_type->post_type;
        if (post_type_supports($post_type, 'author')) {
            if (is_super_admin() || current_user_can( $post_type_object->cap->edit_others_posts))
                add_meta_box('authordiv_sti', __('Author'), 'post_author_sti_meta_box', null, 'normal', 'core');
        }
    }
}

function post_author_sti_meta_box($post) {
	global $user_ID;
?>
<label class="screen-reader-text" for="post_author_override"><?php _e('Author'); ?></label>
<?php
	wp_dropdown_users(array(
		'name' => 'post_author_override',
		'selected' => empty($post->ID) ? $user_ID : $post->post_author,
		'include_selected' => true
	));
}

// PLL STRINGS
if (function_exists('pll_register_string')) {
    pll_register_string('Link vari', 'Link vari');
    pll_register_string('Annunci recenti', 'Annunci recenti');
    pll_register_string('Accesso percorso on-line', 'Accesso percorso on-line');
}


function enqueue_admin_custom_scripts() {
    wp_register_script('sti-custom-admin-js', get_stylesheet_directory_uri() . '/library/js/sti_custom_admin.js', array( 'jquery' ), '', true);
    wp_enqueue_script('sti-custom-admin-js'); 
}
add_action('admin_enqueue_scripts', 'enqueue_admin_custom_scripts');


?>