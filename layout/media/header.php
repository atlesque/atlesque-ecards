<?php
function atlesque_ecard_image($size)
{
	global $post;
	//Size: ecard-large, ecard-thumb
	return atlesque_ecard_image_src_custom($size, $post);
}

function atlesque_ecard_description()
{
	global $post;
	return $post->post_content;
}

$image = atlesque_ecard_image_src_custom('ecard-large',$post);
$image_thumb = atlesque_ecard_image_src_custom('ecard-thumb',$post);
$image_medium = atlesque_ecard_image_src('medium',$post);
$options = get_option( 'atlesque_ecard_settings','' );

if(isset($options['atlesque_ecard_send_opt'])) {
	$sendto=$options['atlesque_ecard_send_opt'];
} else {
	$sendto="toboth";
}

$text=$post->post_content;

function atlesque_ecard_position1() {
	$options = get_option( 'atlesque_ecard_settings', '' );
	if(isset($options['atlesque_ecard_textarea_shortcode_1'])) {
		return do_shortcode( stripslashes($options['atlesque_ecard_textarea_shortcode_1']))."<br>" ;
	} else {
		return "";
	}
}	

function atlesque_ecard_position2()
{
	$options = get_option( 'atlesque_ecard_settings','' );
	if(isset($options['atlesque_ecard_textarea_shortcode_2']))
		return do_shortcode( stripslashes($options['atlesque_ecard_textarea_shortcode_2']))."<br>" ;
	else
		return "" ;
}	

?>