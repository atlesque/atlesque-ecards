<?php
/*
Plugin Name: Atlesque E-Card
Plugin URI: https://atlesque.com/
Description: Manage ecards and send them to others.
Version: 1.0
Author: Alexander Atlesque
Author URI: https://atlesque.com/
License: MIT
Text Domain: atlesque-ecard
*/

define('ROOT_URL', plugin_dir_url( __FILE__ ) );
define('PLUGIN_DIR',dirname(plugin_basename( __FILE__ )));
define('PLUGIN_BASE_DIR',WP_CONTENT_DIR.'/plugins/'.PLUGIN_DIR.'/');
define('PLUGIN_URL',content_url('/plugins/'.PLUGIN_DIR));
include(dirname(__FILE__)."/help.php");
include(dirname(__FILE__)."/stat.php");

function atlesque_ecards_languages() {
  load_plugin_textdomain( 'atlesque-ecard', false, dirname(plugin_basename( __FILE__ )).'/languages/' );
}

include(dirname(__FILE__)."/libs/functions.php");
include(dirname(__FILE__)."/libs/lib.php");
include(dirname(__FILE__)."/libs/hooks.php");
include(dirname(__FILE__)."/libs/install.php");
include(dirname(__FILE__)."/libs/custom_column.php");
include(dirname(__FILE__)."/setting.php");

register_activation_hook(__FILE__,'atlesque_ecard_install');
register_uninstall_hook(__FILE__,'atlesque_ecard_drop');

//Adding meta boxes
function atlesque_ecards_meta_boxes() {
  $meta_boxes = array(
    'post_img' => array(
      'id' => 'ecard-image-selector',
      'title' => __('Image', 'atlesque-ecard'),
      'callback' => 'atlesque_ecard_meta_box_image',
      'position' => 'advanced',
      'priority' => 'high'
    ),
    'odudecard-author' => array(
      'title' => __('Author', 'atlesque-ecard'),
      'callback' => 'atlesque_ecard_meta_box_author',
      'position' => 'advanced',
      'priority' => 'high'
    ),
    'odudecard-layout '=> array(
      'title' => __('Layout', 'atlesque-ecard'),
      'callback' => 'atlesque_ecard_meta_box_layout',
      'position' => 'side',
      'priority' => 'core'
    ),
    'odudecard-music' => array(
      'title' => __('Music', 'atlesque-ecard'),
      'callback' => 'atlesque_ecard_meta_box_music',
      'position' => 'side',
      'priority' => 'core'
    ),
    'odudecard-color '=> array(
      'title' => __('Background Color', 'atlesque-ecard'),
      'callback' => 'atlesque_ecard_meta_box_color',
      'position' => 'side',
      'priority' => 'core'
    )
  );

  $meta_boxes = apply_filters("atlesque_ecard_meta_box", $meta_boxes);
  foreach($meta_boxes as $id=>$meta_box) {
    extract($meta_box);
    add_meta_box($id, $title, $callback,'atlesque-ecard', $position, $priority);
  }
}

function atlesque_ecard_meta_box_color($post) {
  wp_nonce_field(plugin_basename(__FILE__), 'atlesque_ecard_color_nonce');
  global $post;
  $custom  = get_post_custom($post->ID);
  if(isset($custom["color"][0])) {
    $color    = $custom["color"][0];
  } else {
    $color="";
  }
  echo '<input type="text" value="'.$color.'" class="my-color-field" data-default-color="#ffffff" name="color" />';
  echo "<script>jQuery(document).ready(function($){
    $('.my-color-field').wpColorPicker();
  });</script>";
}

//Image upload in post type
function atlesque_ecard_meta_box_image($post) {
  include(dirname(__FILE__).'/libs/post_img.php');
}

// Author
function atlesque_ecard_meta_box_author($post) {
  wp_nonce_field(plugin_basename(__FILE__), 'atlesque_ecard_author_nonce');
  global $post;
  $custom  = get_post_custom($post->ID);
  if(isset($custom["ecard_author"][0])) {
    $author    = $custom["ecard_author"][0];
  } else {
    $author="";
  }
  echo '<input type="text" value="'.$author.'" name="ecard_author" />';
}

//Music select
function atlesque_ecard_meta_box_music($post) {
  wp_nonce_field(plugin_basename(__FILE__), 'atlesque_ecard_music_nonce');
  global $post;
  $custom  = get_post_custom($post->ID);
  if(isset($custom["music_link"][0])) {
    $link    = $custom["music_link"][0];
  } else {
    $link="";
  }
  $count   = 0;
  echo '<div class="link_header">';
  $query_pdf_args = array(
    'post_type' => 'attachment',
    'post_mime_type' =>'audio/wav,audio/mpeg,audio/ogg',
    'post_status' => 'inherit',
    'posts_per_page' => -1,
  );
  $query_pdf = new WP_Query( $query_pdf_args );
  $pdf = array();
  echo '<select name="music_link">';
  echo '<option class="pdf_select">None</option>';

  foreach ( $query_pdf->posts as $file) {
    if($link == $pdf[]= $file->guid) {
      echo '<option value="'.$pdf[]= $file->guid.'" selected="true">'.$pdf[]= $file->guid.'</option>';
    } else {
      echo '<option value="'.$pdf[]= $file->guid.'">'.$pdf[]= $file->guid.'</option>';
    }
    $count++;
  }
  echo '</select><br /></div>';
  echo '<p>List MP3,Wav,Ogg files from Media Manager.</p>';
  echo '<div class="pdf_count"><span>Files:</span> <b>'.$count.'</b></div>';
}

function atlesque_ecards_enqueue_scripts () {
  global $atlesque_ecard_plugin,$current_screen;
  $options = get_option( 'atlesque_ecard_settings', '' );
  wp_enqueue_style('odude-pure', plugins_url() .'/'. PLUGIN_DIR.'/css/pure-min.css');
  wp_enqueue_style('odude-pure-grid', plugins_url().'/'. PLUGIN_DIR.'/css/grids-responsive-min.css');

  if(isset($options['atlesque_ecard_text_captcha_enable'])) {
    if($options['atlesque_ecard_text_captcha_enable']=='1') {
      wp_enqueue_script( 'atlesque_ecard_captcha', 'https://www.google.com/recaptcha/api.js' );
    }
  }
}

function atlesque_ecards_admin_enqueue_scripts() {
  global $atlesque_ecard_plugin,$current_screen;
  $screen = get_current_screen();
  if ( $screen->base == 'atlesque_ecard_page_odude_ecard' ||
    $screen->base=='atlesque_ecard_page_odude_ecard_stat' ||
    $screen->base=='atlesque_ecard_page_odude_ecard_help') {
    wp_enqueue_style('odude-pure', plugins_url() .'/'. PLUGIN_DIR.'/css/pure-min.css');
  wp_enqueue_style('font-awesome-css','https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
  wp_enqueue_style('odude-pure-grid', plugins_url().'/'. PLUGIN_DIR.'/css/grids-responsive-min.css');
}
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-form');
wp_enqueue_script('jquery-ui-core');
wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_script('jquery-ui-tabs');
wp_enqueue_script('jquery-ui-accordion');
wp_enqueue_style( 'wp-color-picker');
wp_enqueue_script( 'wp-color-picker');
$options = get_option( 'atlesque_ecard_settings', '' );
}

//Save data typed in post type
function atlesque_ecards_save_meta_data( $post_id, $post ) {
    if ( ! isset( $_POST['nonce_name'] ) ) { //make sure our custom value is being sent
      return;
    }
    if ( ! wp_verify_nonce( $_POST['nonce_name'], 'nonce_action' ) ) { //verify intent
      return;
    }
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) { //no auto saving
      return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) { //verify permissions
      return;
    }

    /* --- security verification --- */
    if(!wp_verify_nonce($_POST['atlesque_ecard_music_nonce'], plugin_basename(__FILE__))) {
      return;
    } // end if

    /* --- security verification --- */
    if(!wp_verify_nonce($_POST['atlesque_ecard_color_nonce'], plugin_basename(__FILE__))) {
      return;
    } // end if

    /* --- security verification --- */
    if(!wp_verify_nonce($_POST['atlesque_ecard_author_nonce'], plugin_basename(__FILE__))) {
      return;
    } // end if

    if($_POST['meta-box-media']!="pic_name") {
      $new_value = array_map( 'intval', $_POST['meta-box-media'] ); //sanitize
      foreach ( $new_value as $k => $v ) {
       if($v!='0')
          update_post_meta( $post_id, $k, $v ); //save
          //$_SESSION["favcolor"] .= "green_".$v."<hr>";
      }
    }
    update_post_meta($post->ID, "ecard_layout", $_POST["ecard_layout"]);
    update_post_meta($post->ID, "music_link", $_POST["music_link"]);
    update_post_meta($post->ID, "color", $_POST["color"]);
    update_post_meta($post->ID, "ecard_author", $_POST["ecard_author"]);
  }

  function atlesque_ecard_admin_footer_hook() {
    global $post;
    if (get_post_type($post) == 'atlesque-ecard') {
      ?>
      <script type="text/javascript">
      jQuery(document).ready(function($) { $('#normal-sortables').insertBefore('#postdivrich') ; }) ; </script>
    <?php }
  } 
  /** Hook into the Admin Footer */
  add_action('admin_footer','atlesque_ecard_admin_footer_hook');

  function atlesque_ecards_the_content($content) {
    global $post;
    $settings = get_option('_atlesque_ecard_settings');

    if($post->post_type!='atlesque-ecard') {
     return $content;
   }

   if( is_singular() && is_main_query() )
   {
     $all_atlesque_ecard_fields= get_post_custom($post->ID);

     if(isset($all_atlesque_ecard_fields["ecard_layout"][0])) {
       $ecard_layout=$all_atlesque_ecard_fields["ecard_layout"][0];
     } else {
       $ecard_layout="basic";
     }

     if(file_exists(PLUGIN_BASE_DIR."/layout/media/$ecard_layout/$ecard_layout.php")) {
      require_once("layout/media/$ecard_layout/$ecard_layout.php");
      return atlesque_ecard_product_content($post);
    } else {
     return "Layout Not found ".$ecard_layout;
   }
 }

}

//List ecards
function atlesque_ecards_list($params)
{
  return include(PLUGIN_BASE_DIR.'layout/catalog.php');
}

  //pickup ecards
function atlesque_ecards_pick($params)
{
  $abc=include(PLUGIN_BASE_DIR.'layout/pick.php');
  return $abc;
}

  //Layout of ecard
function atlesque_ecard_meta_box_layout()
{
  global $post;
  $all_atlesque_ecard_fields= get_post_custom($post->ID);
  if(isset($all_atlesque_ecard_fields["ecard_layout"][0]))
   $ecard_layout=$all_atlesque_ecard_fields["ecard_layout"][0];
 else
   $ecard_layout="basic";

 $dir    = PLUGIN_BASE_DIR.'layout/media/';
 $filelist ="";
 $files = array_map("htmlspecialchars", scandir($dir));

 foreach ($files as $file)
 {
   if($ecard_layout==$file)
    $checked='checked=checked';
  else
    $checked="";

  if(!strpos($file, '.') && $file != "." && $file != "..")
   $filelist .= sprintf('<input type="radio" '.$checked.' name="ecard_layout" value="%s"/>%s layout<br>' . PHP_EOL, $file, $file );
}
echo $filelist;

}

/*  //Adding popup button

  // Hooks your functions into the correct filters
function atlesque_ecard_add_mce_button()
{
  // check user permissions
  if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) )
  {
    return;
  }
  // check if WYSIWYG is enabled
  if ( 'true' == get_user_option( 'rich_editing' ) )
  {
    add_filter( 'mce_external_plugins', 'atlesque_ecard_add_tinymce_plugin' );
    add_filter( 'mce_buttons', 'atlesque_ecard_register_mce_button' );
  }
}
add_action('admin_head', 'atlesque_ecard_add_mce_button');

// Declare script for new button
function atlesque_ecard_add_tinymce_plugin( $plugin_array )
{
  $plugin_array['atlesque_ecard_mce_button'] = plugin_dir_url(__FILE__) . 'js/button_pop.js';
  return $plugin_array;
}

// Register new button in the editor
function atlesque_ecard_register_mce_button( $buttons )
{
  array_push( $buttons, 'atlesque_ecard_mce_button' );
  return $buttons;
}*/

//change Pickup Page title
add_action('loop_start','atlesque_ecard_filter_title');
add_filter( 'wp_title', 'atlesque_ecard_modified_post_title', 10, 2);
add_filter('wpseo_title', 'atlesque_ecard_modified_post_title');
function atlesque_ecard_filter_title($query)
{
  global $wp_query;
  if($query === $wp_query){
    add_filter( 'the_title', 'atlesque_ecard_modified_post_title', 10, 2);

  }else{
    remove_filter('the_title','atlesque_ecard_modified_post_title', 10, 2);
  }
}
function atlesque_ecard_modified_post_title( $title )
{
  $options = get_option('atlesque_ecard_settings');
  if ( is_page( $options['atlesque_ecard_select_pickup_field'] )  )
  {
    return "";
  }
  else
  {
    return $title;
  }
}


function atlesque_ecards_image_setup()
{
  $options = get_option( 'atlesque_ecard_settings','' );

  if(isset($options['atlesque_ecard_text_large_width']))
    $large_width=$options['atlesque_ecard_text_large_width'];
  else
    $large_width='550';

  if(isset($options['atlesque_ecard_text_large_height']))
    $large_height=$options['atlesque_ecard_text_large_height'];
  else
    $large_height='0';

  remove_image_size( 'ecard-large' );
  add_image_size( 'ecard-large', $large_width, $large_height );

  if(isset($options['atlesque_ecard_text_thumb_width']))
    $thumb_width=$options['atlesque_ecard_text_thumb_width'];
  else
    $thumb_width='150';

  if(isset($options['atlesque_ecard_text_thumb_height']))
    $thumb_height=$options['atlesque_ecard_text_thumb_height'];
  else
    $thumb_height='150';


  remove_image_size( 'ecard-thumb' );
  add_image_size( 'ecard-thumb', $thumb_width, $thumb_height, false );


}

function atlesque_ecard_remove_extra_image_sizes()
{
  foreach ( get_intermediate_image_sizes() as $size )
  {
    if ( !in_array( $size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) )
    {
      remove_image_size( $size );
    }
  }
}

function add_admin_styles($hook) {
  if( $hook == 'post.php' ) {
    wp_register_style( 'atlesque-ecard-admin-ecard-editor', PLUGIN_URL . '/css/admin/editor.css', false );
    wp_enqueue_style( 'atlesque-ecard-admin-ecard-editor' );
  }
}
add_action( 'admin_enqueue_scripts', 'add_admin_styles' );
?>