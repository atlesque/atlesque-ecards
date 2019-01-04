<?php

function odudecard_date_picker()
{
	global $post;
	if(get_post_type( get_the_ID() )=='odudecard')
	{
	//jQuery UI date picker file
	wp_enqueue_script('jquery-ui-datepicker');
	//jQuery UI theme css file
	wp_enqueue_style('e2b-admin-ui-css','http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/base/jquery-ui.css',false,"1.9.0",false);
	}
}



//Adding facebook image meta tag for ecard page
function odudecard_metatag_facebook_head() 
{
	$options = get_option( 'odudecard_settings','' );
		if(isset($options['odudecard_select_pickup_field']))
	$pickpage=$options['odudecard_select_pickup_field'];
		else
			$pickpage="";
	global $post;
	if(get_post_type( get_the_ID() )=='odudecard')
	{
	
	$fbid="";
	
		if(isset($options['odudecard_metatag_enable']) && $options['odudecard_metatag_enable']=='1')
		{
			$fbid=$options['odudecard_fbid'];
		
			echo '<meta property="og:image" content="'.odudecard_image_src('large',$post).'" />';
			echo '<meta property="og:type" content="website" />';
			echo '<meta property="og:title"  content="'.get_the_title().'" />';
			echo '<meta property="og:url"  content="'.get_permalink($post).'" />';
			echo '<meta property="og:description"  content="'.wp_strip_all_tags($post->post_content).'" />';
			echo '<meta property="fb:app_id"  content="'.$fbid.'" />';
			
		}
		
	}
	if(get_the_ID()==$pickpage)
	{
		if(isset($options['odudecard_metatag_enable']) && $options['odudecard_metatag_enable']=='1')
		{
			$fbid=$options['odudecard_fbid'];
			if(isset($_GET['pick']))
			{
				$ecardview=odudecard_pickupid($_GET['pick']);
				$linku=esc_url(get_permalink($pickpage)."?pick=".$ecardview->id );
				$post   = get_post( $ecardview->card );
				echo '<meta property="og:title"  content="'.$ecardview->sub.'" />';
				echo '<meta property="og:type" content="website" />';
				echo '<meta property="fb:app_id"  content="'.$fbid.'" />';
				echo '<meta property="og:description"  content="You have received a beautiful greetings card from '.$ecardview->SN.'" />';
				echo '<meta property="og:url"  content="'.$linku.'" />';
				echo '<meta property="og:image" content="'.odudecard_image_src('large',$post).'" />';
			}
			echo '<meta property="og:type" content="website" />';
		}
		
	}

}

//Captcha code
function odudecard_verify_comment_captcha() 
{
	$options = get_option( 'odudecard_settings','' );
	
	if(!isset($options['odudecard_text_captcha_enable']) || $options['odudecard_text_captcha_enable']=="0")
	return "OK";	
		
	if (isset($_POST['g-recaptcha-response'])) 
	{
		$options = get_option( 'odudecard_settings','' );
		$recaptcha_secret = $options['odudecard_text_secret_key'];
		$response = wp_remote_get("https://www.google.com/recaptcha/api/siteverify?secret=". $recaptcha_secret ."&response=". $_POST['g-recaptcha-response']);
		
		if(is_array($response) && array_key_exists('body', $response))
		{
			$response = json_decode($response["body"], true);
			if (true == $response["success"]) 
			{
				//return true;
				return "OK";
			}
			else 
			{
				//return false;
				//return "oooo";
				return __("Please Complete the Security Spam Check.", "odude-card-pro" );
			}
		}
		else
		{
			return __("Google Server Error", "odude-card-pro");
		}
	} 
	else 
	{
		//return false;
		return __("Bots are not allowed to send ecards. If you are not a bot then please enable JavaScript in browser.", "odude-card-pro");
		//return "8888";
	}


}


function odudecard_image_src($size,$post)
{
	
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

function odudecard_image_src_custom($size='ecard-thumb',$post)
{
	
		$abc=get_post_meta( $post->ID, 'pic_name', true );
		$image_attributes = wp_get_attachment_image_src( $abc,$size );
		//$image_attributes = wp_get_attachment_image_src( $abc,array($sizeA, $sizeB) );
		
		if ( $image_attributes )
			{
			//var_dump($image_attributes);
			return $image_attributes[0];
			
			}
			else
			{
				//return "xx";
				return  plugins_url( '../images/noimg.png', __FILE__ );
			}
		
}
function odudecard_pickupid($pickid=0)
{
	global $wpdb;
	$query="SELECT * FROM ".$wpdb->prefix."odudecard_view WHERE id = '".$pickid."'";
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
function odudecard_html_content_type() 
{

	return 'text/html';
}

?>