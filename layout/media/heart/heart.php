<?php
function odudecard_product_content($post)
{
		$cardid=$post->ID;
		
	
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
  background-color: <?php odudecard_set_color($post,'#000000'); ?>;
  height:97%;
  background-image: url('<?php echo odudecard_PLUGIN_URL."/layout/media/heart/heart1.png"; ?>');
  -webkit-animation: snow 20s linear infinite;
  -moz-animation: snow 20s linear infinite;
  -ms-animation: snow 20s linear infinite;
  animation: snow 20s linear infinite;
}

#ecard-message {
  
  margin: 20px auto;
  text-align: center;
  color: red;
  font: 20px/1 'Spirax', cursive;
  text-shadow: 0 0 4px rgba(255, 255, 255, 0.5);
}

	</style>
	

	
	
	<div class="pure-g">
	<div class="pure-u-1-1" style="text-align:center;"><?php echo odudecard_position1(); ?>
	<br>
	
	</div>
	
	<div class="pure-u-1-1" style="text-align:center;">
		<div class="ecard-container">
		<img src="<?php echo odudecard_image('full'); ?>" class='ecard-image'>
		<br><div id="ecard-message">Hier komt jouw boodschap<br><br><br></div>
		</div>
	</div>
	<div class="pure-u-1-1" style="text-align:center;"><?php echo odudecard_position2(); ?></div>
	
	<div class="pure-u-1-1"><?php echo $text; ?></div>
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