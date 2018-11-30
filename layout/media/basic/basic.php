<?php


function odudecard_product_content($post)
{
	//global $post; 
	$cardid=$post->ID;
	$ecard_author = get_post_meta($post->ID, "ecard_author")[0];
	$editor=true;	
	
	$captcha="";
	$options = get_option( 'odudecard_settings','' );	
	

	$linku=esc_url( get_permalink($options['odudecard_select_pickup_field']) );

	require_once(dirname(__FILE__)."/../header.php");
	$abc="";
	 $home = home_url('/');
	ob_start ();
	$SN="";
	
	if(isset($_POST['SN']))
	$SN=$_POST['SN'];

	if($SN=='')
{
	?>
	
	<div class="pure-g">
	<div class="pure-u-1-1" style="text-align:center;"><?php echo odudecard_position1(); ?></div>
	<div class="pure-u-1-1" style="text-align:center;">
		<img src="<?php echo odudecard_image('full'); ?>" class='ecard-image'>
	</div>
	<?php if(!empty($ecard_author)) { ?>
		<span class="ecard-copyright">
			<?php echo $ecard_author ?>
		</span>
	<?php } ?>
	<div class="pure-u-1-1" style="text-align:center;"><br><?php odudecard_facebook_like(); ?></div>
	<div class="pure-u-1-1" style="text-align:center;"><?php echo odudecard_position2(); ?></div>
	<div class="pure-u-1-1"><?php echo $text; ?></div>
	</div>
	<?php
	
	include(dirname(__FILE__)."/../compose.php");
		
}
else
{
	include(dirname(__FILE__)."/../submit.php");
}
	
	$abc=ob_get_clean (); 
	return $abc;
}