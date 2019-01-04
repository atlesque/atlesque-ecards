<?php
function odudecard_product_content($post)
{
		$cardid=$post->ID;
		
	
	$captcha="";
	$options = get_option( 'odudecard_settings','' );
	
	if(isset($options['odudecard_text_captcha_enable']) && $options['odudecard_text_captcha_enable']=='1')
	$captcha='<div class="g-recaptcha" data-sitekey="'.$options['odudecard_text_captcha_key'].'"></div>';

	$futuredate="";
	if(isset($options['odudecard_text_date_enable']) && $options['odudecard_text_date_enable']=='1')
	$futuredate='<input type="text" class="datepicker" name="datepicker" value="" />';

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
	<style>
	
	/*Keyframes*/

@keyframes snow {
  0% {
    background-position: 0 0, 0 0, 0 0;
  }
  100% {
    background-position: 500px 1000px, 400px 400px, 300px 300px;
  }
}

@-moz-keyframes snow {
  0% {
    background-position: 0 0, 0 0, 0 0;
  }
  100% {
    background-position: 500px 1000px, 400px 400px, 300px 300px;
  }
}

@-webkit-keyframes snow {
  0% {
    background-position: 0 0, 0 0, 0 0;
  }
  50% {
    background-color: #b4cfe0;
  }
  100% {
    background-position: 500px 1000px, 400px 400px, 300px 300px;
    background-color: #6b92b9;
  }
}

@-ms-keyframes snow {
  0% {
    background-position: 0 0, 0 0, 0 0;
  }
  100% {
    background-position: 500px 1000px, 400px 400px, 300px 300px;
  }
}

.ecard-container {
  background-color: <?php odudecard_set_color($post,'#6b92b9'); ?>;
  background-image: url('<?php echo PLUGIN_URL."/layout/media/snow/snow1.png"; ?>'), url('<?php echo PLUGIN_URL."/layout/media/snow/snow2.png"; ?>'), url('<?php echo PLUGIN_URL."/layout/media/snow/snow3.png"; ?>');
  -webkit-animation: snow 20s linear infinite;
  -moz-animation: snow 20s linear infinite;
  -ms-animation: snow 20s linear infinite;
  animation: snow 20s linear infinite;
}

#ecard-message {
  
  margin: 20px auto;
  text-align: center;
  color: white;
  font: 30px/1 'Spirax', cursive;
  text-shadow: 0 0 4px rgba(255, 255, 255, 0.5);
}


a {
  color: white;
  font-style: italic;
}
	</style>
	
	
	<div class="pure-g">
	<div class="pure-u-1-1" style="text-align:center;"><?php echo odudecard_position1(); ?></div>
	
	<div class="pure-u-1-1" style="text-align:center;">
		<div class="ecard-container">
		<img src="<?php echo odudecard_image('full'); ?>" class='ecard-image'>
		
		<br><div id="ecard-message">Your Message Appears Here<br><br><br></div>
		</div>
	</div>
	<div class="pure-u-1-1" style="text-align:center;"><?php echo odudecard_position2(); ?></div>
	
	<div class="pure-u-1-1"><?php echo odudecard_description(); ?></div>
	</div>
		
	<?php
	$editor=false;
	include(dirname(__FILE__)."/../compose.php");
	
}
else
{
	include(dirname(__FILE__)."/../submit.php");
}
	
	$abc=ob_get_clean (); 
	return $abc;
}