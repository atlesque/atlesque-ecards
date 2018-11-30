
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
  background-color: <?php odudecard_set_color($post,'#000000'); ?>;
  height:97%;
  background-image: url('<?php echo odudecard_PLUGIN_URL."/layout/media/falling/falling1.png"; ?>'), url('<?php echo odudecard_PLUGIN_URL."/layout/media/falling/falling2.png"; ?>'), url('<?php echo odudecard_PLUGIN_URL."/layout/media/falling/falling3.png"; ?>');
  -webkit-animation: snow 20s linear infinite;
  -moz-animation: snow 20s linear infinite;
  -ms-animation: snow 20s linear infinite;
  animation: snow 20s linear infinite;
}

#ecard-message {
  
  margin: 20px auto;
  text-align: center;
  color: white;
  font: 20px/1 'Spirax', cursive;
  text-shadow: 0 0 4px rgba(255, 255, 255, 0.5);
}

</style>
	
		
	<h2>
	<?php echo $ecardview->SN; ?> Has Sent You an E-Card
	</h2><?php echo $ecardview->SE; ?>	<hr>
		<div class="pure-g">
			<div class="pure-u-1-2" style="text-align:center;"><img src="<?php echo $image_medium; ?>"></div>

		</div>
		
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