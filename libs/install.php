<?php
function setup_post_types() {
  $settings = maybe_unserialize(get_option("_atlesque_ecard_settings"));
  $product=" ";
  register_post_type("atlesque-ecard", array(
    "labels" => array(
      "name" => __("E-Card","atlesque-ecard"),
      "singular_name" => __("Ecard","atlesque-ecard"),
      "add_new" => __("Add ".$product." Ecard","atlesque-ecard"),
      "add_new_item" => __("Add New ".$product." Ecard","atlesque-ecard"),
      "edit_item" => __("Edit ".$product." Ecard","atlesque-ecard"),
      "new_item" => __("New ".$product." Ecard","atlesque-ecard"),
      "view_item" => __("View Ecard","atlesque-ecard"),
      "search_items" => __("Search Ecard","atlesque-ecard"),
      "not_found" =>  __("No Ecard found","atlesque-ecard"),
      "not_found_in_trash" => __("No ecard found in Trash","atlesque-ecard"),
      "parent_item_colon" => ""),
    "public" => true,
    "publicly_queryable" => true,
    "has_archive" => true,
    "show_ui" => true,
    "query_var" => true,
    "rewrite" => array("slug"=>"ecard","with_front"=>true),
    "capability_type" => "post",
    "hierarchical" => false,
    "supports" => array("title","editor","card_cate","comments"),
    "taxonomies" => array("card_cate"),
    "taxonomies" => array("card_tag")
  ));
}

function register_product_taxonomies() {
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    "name" => __( "Ecard Albums","atlesque-ecard" ),
    "singular_name" => __( "Ecard Album","atlesque-ecard"),
    "search_items" =>  __( "Search Albums","atlesque-ecard" ),
    "all_items" => __( "All Albums","atlesque-ecard" ),
    "parent_item" => __( "Parent Album","atlesque-ecard" ),
    "parent_item_colon" => __( "Parent Album:","atlesque-ecard" ),
    "edit_item" => __( "Edit Album","atlesque-ecard" ),
    "update_item" => __( "Update Album","atlesque-ecard" ),
    "add_new_item" => __( "Add New Album","atlesque-ecard" ),
    "new_item_name" => __( "New Album Name","atlesque-ecard" ),
    "menu_name" => __( "Ecard Albums","atlesque-ecard" ),
  );

  register_taxonomy("card_cate",array("atlesque-ecard"), array(
    "hierarchical" => true,
    "labels" => $labels,
    "show_ui" => true,
    "query_var" => true,
    "rewrite" => array( "slug" => "ecard_album" ),
  ));

  $labels = array(
    "name" => __( "Ecard Tags","atlesque-ecard" ),
    "singular_name" => __( "Ecard Tag","atlesque-ecard"),
    "search_items" =>  __( "Search Tags","atlesque-ecard" ),
    "all_items" => __( "All Tags","atlesque-ecard" ),
    "parent_item" => __( "Parent Tag","atlesque-ecard" ),
    "parent_item_colon" => __( "Parent Tag:","atlesque-ecard" ),
    "edit_item" => __( "Edit Tag","atlesque-ecard" ),
    "update_item" => __( "Update Tag","atlesque-ecard" ),
    "add_new_item" => __( "Add New Tag","atlesque-ecard" ),
    "new_item_name" => __( "New Tag Name","atlesque-ecard" ),
    "menu_name" => __( "Ecard Tags","atlesque-ecard" ),
  );

  register_taxonomy("card_tag",array("atlesque-ecard"), array(
    "hierarchical" => false,
    "labels" => $labels,
    "show_ui" => true,
    "query_var" => true,
    "rewrite" => array( "slug" => "ecard_tag" ),
  ));
}

function atlesque_ecard_install() {
	setup_post_types();
  register_product_taxonomies();
  flush_rewrite_rules();

  global $wpdb;	
  $tablename = $wpdb->prefix."atlesque_ecard_view";

  $qry = "CREATE TABLE IF NOT EXISTS `".$tablename."` (
  `id` int(15) NOT NULL,
  `SN` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `SE` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `RN` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `RE` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `clock` date NOT NULL DEFAULT '0000-00-00',
  `sub` varchar(50) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `notify` char(1) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `status` char(1) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `card` int(10) NOT NULL,
  `IP` text CHARACTER SET utf8 NOT NULL,
  `count` int(11) NOT NULL,
  `term` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8";

$wpdb->query($qry);

if(!$wpdb->get_var("select id from {$wpdb->prefix}posts where post_content like '%[atlesque-ecard-pick]%'")) {
  wp_insert_post(array(
    "post_title" => "Pick Your Card",
    "post_content" => "[atlesque-ecard-pick]",
    "post_type" => "page",
    "post_status" => "publish")
);
  wp_insert_post(array(
    "post_title" => "Ecards",
    "post_content" => "[atlesque-ecard-list perrow='3' perpage='30' orderby='date' page='off' layout='list']",
    "post_type" => "page",
    "post_status" => "publish")
);
}
}

function drop_table() {
	global $wpdb;	
	$tablename = $wpdb->prefix."atlesque_ecard_view";	
	$qry = "DROP TABLE ".$tablename;
	$wpdb->query($qry);
}

?>