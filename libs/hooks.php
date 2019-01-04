<?php
add_action('wp_head', 'odudecard_metatag_facebook_head');	
add_action('init', 'odudecard_post_types');
add_action('init', 'register_ODudeCard_product_taxonomies');
add_filter("the_content", "odudecard_the_content");
add_shortcode("odudecard-list", "odudecard_list");
add_shortcode("odudecard-pick", "odudecard_pick");
add_action('wp_enqueue_scripts', 'odudecard_enqueue_scripts');
add_action('admin_enqueue_scripts', 'odudecard_admin_enqueue_scripts');
add_action('plugins_loaded', 'odudecard_languages');
add_action('init', 'odudecard_languages');
add_action('wp_enqueue_scripts', 'odudecard_date_picker'); 
add_action( 'init', 'odudecard_image_setup' );
//add_action('init', 'odudecard_remove_extra_image_sizes');



	if (is_admin()) 
{
	
	//wp_enqueue_script('post_img', PLUGIN_URL.'/js/post_img.js');
	add_action('admin_init', 'odudecard_meta_boxes', 0);
	add_action('save_post', 'odudecard_save_meta_data', 10, 2);
	add_action( 'admin_menu', 'odudecard_add_admin_menu' );

add_action( 'admin_init', 'odudecard_settings_init' );
}
?>