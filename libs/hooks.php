<?php
add_action('init', 'setup_post_types');
add_action('init', 'register_product_taxonomies');
add_filter("the_content", "atlesque_ecards_the_content");
add_shortcode("atlesque-ecard-list", "atlesque_ecards_list");
add_shortcode("atlesque-ecard-pick", "atlesque_ecards_pick");
add_action('wp_enqueue_scripts', 'atlesque_ecards_enqueue_scripts');
add_action('admin_enqueue_scripts', 'atlesque_ecards_admin_enqueue_scripts');
add_action('plugins_loaded', 'atlesque_ecards_languages');
add_action('init', 'atlesque_ecards_languages');
add_action('wp_enqueue_scripts', 'atlesque_ecards_date_picker');
add_action( 'init', 'atlesque_ecards_image_setup' );

if (is_admin()) {
  add_action('admin_init', 'atlesque_ecards_meta_boxes', 0);
  add_action('save_post', 'atlesque_ecards_save_meta_data', 10, 2);
  add_action( 'admin_menu', 'atlesque_ecards_add_admin_menu' );
  add_action( 'admin_init', 'atlesque_ecards_settings_init' );
}

?>