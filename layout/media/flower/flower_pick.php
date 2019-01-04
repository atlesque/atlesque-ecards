<?php
$from = esc_html__( 'From', 'odude-ecard' );
$output="";
$abc="";


ob_start ();



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
  background-image: url('<?php echo PLUGIN_URL."/layout/media/flower/flower1.png"; ?>');
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
	
		
		<?php echo $from; ?>: <?php echo $ecardview->SN; ?> - (<?php echo $ecardview->SE; ?>)<hr>
		<div class="ecard-container">
<div class="pure-g">
	<div class="pure-u-1-1" style="text-align:center;">
	<h2 style="color: #ff5816;"><?php echo $ecardview->sub; ?></h2>
	<br><img src="<?php echo $image; ?>"></div>
	
	</div>

		<br><div id="ecard-message"><?php echo $ecardview->body; ?><br><br></div>
	</div>	
	

	<br>
	<?php
		do_action('odudecard_music',$post);
		?>
		<?php
		if(isset($_GET['pick']))
		{
			?>
		<hr><a href='<?php echo get_permalink( $post,false); ?>' class='pure-button pure-button-primary'><?php echo esc_html__( 'Send this Ecard to others', 'odude-ecard' ); ?></a>
<?php
		}

$output=ob_get_clean (); 
?>