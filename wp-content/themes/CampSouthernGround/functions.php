<?php
 
 
function nggGetGallery( $galleryID, $template = '', $images = false ) {
   
    global $nggRewrite;
 
    $ngg_options = nggGallery::get_option('ngg_options');
   
    //Set sort order value, if not used (upgrade issue)
    $ngg_options['galSort'] = ($ngg_options['galSort']) ? $ngg_options['galSort'] : 'pid';
    $ngg_options['galSortDir'] = ($ngg_options['galSortDir'] == 'DESC') ? 'DESC' : 'ASC';
   
    // get gallery values
    //TODO: Use pagination limits here to reduce memory needs
    $picturelist = nggdb::get_gallery($galleryID, $ngg_options['galSort'], $ngg_options['galSortDir']);
    return $picturelist;
}
 
/**
 * Hide editor on specific pages.
 *
 */
add_action( 'admin_init', 'hide_editor' );
 
function hide_editor() {
  // Get the Post ID.
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;

 
  // Hide the editor on a page with a specific page template
  // Get the name of the Page Template file.
  $template_file = get_post_meta($post_id, '_wp_page_template', true);
 
  if($template_file == 'news_page.php' || $template_file == 'index.php' || $template_file == 'supporters_page.php' || $template_file == 'ways_to_give_page.php' || $template_file == 'supporters_page.php' ){ // the filename of the page template
    remove_post_type_support('page', 'editor');
  }
}

function post_remove () { 
   remove_menu_page('edit.php');
}

add_action('admin_menu', 'post_remove'); 


function filter_ptags_on_images($content)
{
    // do a regular expression replace...
    // find all p tags that have just
    // <p>maybe some white space<img all stuff up to /> then maybe whitespace </p>
    // replace it with just the image tag...
    return preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
}

// we want it to be run after the autop stuff... 10 is default.
add_filter('the_content', 'filter_ptags_on_images');

add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'csg_news',
    array(
      'labels' => array(
        'name' => __( 'News' ),
        'singular_name' => __( 'News' ),
        'add_new_item' => __( 'Add New News' )
      ),
    'public' => true,
    'has_archive' => true,
    'menu_position' => 5
    )
  );
}

add_action( 'init', 'create_post_type_2' );
function create_post_type_2() {
  register_post_type( 'csg_events',
    array(
      'labels' => array(
        'name' => __( 'Events' ),
        'singular_name' => __( 'Event' ),
        'add_new_item' => __( 'Add New Event' )
      ),
    'public' => true,
    'has_archive' => true,
    'menu_position' => 5
    )
  );
}

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

function highlight_shortcode( $atts, $content = null ) {
	return '<div class="highlight">' . $content . '</div>';
}
add_shortcode( 'highlight', 'highlight_shortcode' );

// REMOVE EMOJI ICONS
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
?>