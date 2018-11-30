<?php
function odudecard_image($size)
{
	global $post;
	//Size: ecard-large, ecard-thumb
	return odudecard_image_src_custom($size,$post); 
}

function odudecard_description()
{
	global $post;
	return $post->post_content;
	
}
			
$image=odudecard_image_src_custom('ecard-large',$post); 
$image_thumb=odudecard_image_src_custom('ecard-thumb',$post); 
$image_medium=odudecard_image_src('medium',$post); 
//$image=odudecard_image_src('large',$post);
$options = get_option( 'odudecard_settings','' );

if(isset($options['odudecard_send_opt']))
	$sendto=$options['odudecard_send_opt'];
else
	$sendto="toboth";

$text=$post->post_content;


function odudecard_position1()
 {
	  $options = get_option( 'odudecard_settings','' );
	  if(isset($options['odudecard_textarea_shortcode_1']))
		  return do_shortcode( stripslashes($options['odudecard_textarea_shortcode_1']))."<br>" ;
	  else
		  return "" ;
 }	
function odudecard_position2()
 {
	  $options = get_option( 'odudecard_settings','' );
	  if(isset($options['odudecard_textarea_shortcode_2']))
		  return do_shortcode( stripslashes($options['odudecard_textarea_shortcode_2']))."<br>" ;
	  else
		  return "" ;
 }	

function odudecard_facebook_like()
{
	 $options = get_option( 'odudecard_settings','' );
	 if(isset($options['odudecard_fb_like']) && $options['odudecard_fb_like']=='1')
		{
			$fbid=$options['odudecard_fbid'];
			if($fbid!="")
			{
				global $post;
				?>
				<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=<?php echo $fbid; ?>";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
					
					<div class="fb-like" data-href="<?php echo get_permalink($post); ?>" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>
					
				<?php
			}
			else
			{
				echo "Facebook's App ID is missing.";
			}
			
		}
}
		




?>