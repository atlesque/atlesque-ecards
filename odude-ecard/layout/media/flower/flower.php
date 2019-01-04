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
  background-color: <?php odudecard_set_color($post,'#f3f583'); ?>;
  height:97%;
  background-image: url('<?php echo odudecard_PLUGIN_URL."/layout/media/flower/flower1.png"; ?>');
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


a {
  color: white;
  font-style: italic;
}
	</style>
	
	
	
	
	<style>


.modal {
  display: block;
  padding: 0 1em;
  text-align: center;
  width: 100%;
}
@media (min-width: 43.75em) {

.modal {
  padding: 1em 2em;
  text-align: center;
}
}

.modal > label {
 
  border-radius: .2em;
  
  cursor: pointer;
  display: inline-block;
  -webkit-transition: all 0.55s;
  transition: all 0.55s;
}

.modal > label:hover {
  -webkit-transform: scale(0.97);
  -ms-transform: scale(0.97);
  transform: scale(0.97);
}

.modal input {
  position: absolute;
  right: 100px;
  top: 30px;
  z-index: -10;
}

.modal__overlay {
  background: black;
  bottom: 0;
  left: 0;
  position: fixed;
  right: 0;
  text-align: center;
  top: 0;
  z-index: -800;
}

.modal__box {
  padding: 1em .75em;
  position: relative;
  margin: 1em auto;
  max-width: 90%;
  width: 90%;
}

@media (min-width: 50em) {

.modal__box { padding: 1.75em; }
}

.modal__box label {
  background: #ff5816;
  border-radius: 50%;
  color: black;
  cursor: pointer;
  display: inline-block;
  height: 1.5em;
  line-height: 1.5em;
  position: absolute;
  right: .5em;
  top: 0.5em;
  width: 1.5em;
}

.modal__box h2 {
  color: #ff5816;
}

.modal__box p {
  color: #ff5816;
  text-align: left;
  
}

.modal__overlay {
  opacity: 0;
  overflow:auto;
  -webkit-transform: scale(0.5);
  -ms-transform: scale(0.5);
  transform: scale(0.5);
  -webkit-transition: all 0.75s cubic-bezier(0.19, 1, 0.22, 1);
  transition: all 0.75s cubic-bezier(0.19, 1, 0.22, 1);
}

input:checked ~ .modal__overlay {
  opacity: 1;
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
  -webkit-transition: all 0.75s cubic-bezier(0.19, 1, 0.22, 1);
  transition: all 0.75s cubic-bezier(0.19, 1, 0.22, 1);
  z-index: 800;
}

input:focus + label {
  -webkit-transform: scale(0.97);
  -ms-transform: scale(0.97);
  transform: scale(0.97);
}
</style>
	
	
	<div class="pure-g">
	<div class="pure-u-1-1" style="text-align:center;"><?php echo odudecard_position1(); ?>
	<br>
	
	</div>
	
	<div class="pure-u-1-1" style="text-align:center;">
		<div class="ecard-container">
		<img src="<?php echo odudecard_image('full'); ?>" class='ecard-image'>
		<br><div id="ecard-message">Your Message Appears Here<br><br><br></div>
		</div>
	</div>
	<div class="pure-u-1-1" style="text-align:center;"><?php echo odudecard_position2(); ?></div>
	
	<div class="pure-u-1-1"><?php echo $text; ?></div>
	</div>
	

 <div class="modal">
  <label for="modal" id="odude" ><img src="<?php echo odudecard_PLUGIN_URL."/images/zoom.png"; ?>"></label><br>
  <input id="modal" type="checkbox" name="modal" tabindex="1">
  <div class="modal__overlay">
  <div class="ecard-container">
    <div class="modal__box">
	 
      <label for="modal">&#10006;</label>
      <h2>Your Subject Here</h2>
      <p>
	  <div id="ecard-message"><img src="<?php echo $image; ?>"><br><br>You Message Appears Here<br><br></div>
	
	  
	  
	  </p>
	  
    </div>
	</div>
  </div>
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