<?php
function atlesque_ecards_date_picker() {
	global $post;
	
	if(get_post_type( get_the_ID() )=='atlesque-ecard')
	{
		wp_enqueue_script('jquery-ui-datepicker');
	//jQuery UI theme css file
		wp_enqueue_style('e2b-admin-ui-css','http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/base/jquery-ui.css',false,"1.9.0",false);
	}
}

function atlesque_verify_comment_captcha() {
	$options = get_option( 'atlesque_ecard_settings','' );
	
	if(!isset($options['atlesque_text_captcha_enable']) || $options['atlesque_text_captcha_enable']=="0")
		return "OK";	

	if (isset($_POST['g-recaptcha-response']))
	{
		$options = get_option( 'atlesque_ecard_settings','' );
		$recaptcha_secret = $options['atlesque_text_secret_key'];
		$response = wp_remote_get("https://www.google.com/recaptcha/api/siteverify?secret=". $recaptcha_secret ."&response=". $_POST['g-recaptcha-response']);
		
		if(is_array($response) && array_key_exists('body', $response))
		{
			$response = json_decode($response["body"], true);
			if (true == $response["success"])
			{
				return "OK";
			}
			else
			{
				return __("Please Complete the Security Spam Check.", "atlesque-ecard" );
			}
		}
		else
		{
			return __("Google Server Error", "atlesque-ecard");
		}
	}
	else
	{
		return __("Bots are not allowed to send ecards. If you are not a bot then please enable JavaScript in browser.", "atlesque-ecard");
	}
}


function atlesque_ecard_image_src($size,$post) {
	$abc=get_post_meta( $post->ID, 'pic_name', true );
	$image_attributes = wp_get_attachment_image_src( $abc,$size );
	if ( $image_attributes )
	{
		return $image_attributes[0];
	}
	else
	{
		return "xx";
	}
}

function atlesque_ecard_image_src_custom($size='ecard-thumb',$post) {
	$abc=get_post_meta( $post->ID, 'pic_name', true );
	$image_attributes = wp_get_attachment_image_src( $abc,$size );

	if ( $image_attributes )
	{
		return $image_attributes[0];
	}
	else
	{
		return  plugins_url( '../images/noimg.png', __FILE__ );
	}
}

function atlesque_ecards_pickupid($pickid=0) {
	global $wpdb;
	$query="SELECT * FROM ".$wpdb->prefix."atlesque_ecard_view WHERE id = '".$pickid."'";
	$ecardview=$wpdb->get_row( $query );

	if(count($ecardview)== 0 )
	{
		return "0";
	}
	else
	{
		return $ecardview;
	}
}

function atlesque_ecard_html_content_type() {
	return 'text/html';
}

?>