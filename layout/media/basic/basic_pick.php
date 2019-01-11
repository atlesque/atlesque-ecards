<?php
$from = esc_html__( 'From', 'atlesque-ecard' );
$output = "";
$abc = "";
ob_start ();
?>

<?php echo $from; ?>: <?php echo $ecardview->SN; ?> - (<?php echo $ecardview->SE; ?>)<hr>
<div class="ecard-container">
	<div class="pure-g">
		<div class="pure-u-1-1" style="text-align:center;"><img src="<?php echo $image; ?>"></div>
	</div>
	<div id="ecard-message"><?php echo $ecardview->body; ?></div>
</div>	

<?php
do_action('atlesque_ecard_music',$post);

if(isset($_GET['pick'])) {
	?>
	<hr><a href='<?php echo get_permalink( $post,false); ?>' class='pure-button pure-button-primary'><?php echo esc_html__( 'Send this Ecard to others', 'atlesque-ecard' ); ?></a>
	<?php
}

$output = ob_get_clean();
?>
