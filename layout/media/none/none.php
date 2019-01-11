<?php
function atlesque_ecard_product_content($post)
{
	require_once(PLUGIN_BASE_DIR."/layout/media/header.php");
	$abc = "";
	$home = home_url('/');
	ob_start ();
	?>
	<div class="pure-g">
		<div class="pure-u-1-1" style="text-align:center;"><?php echo atlesque_ecard_position1(); ?></div>
		<div class="pure-u-1-1" style="text-align:center;"><img src="<?php echo atlesque_ecard_image('full'); ?>" class='ecard-image'></div>
		<div class="pure-u-1-1"><br><?php echo $text; ?></div>
		<div class="pure-u-1-1" style="text-align:center;"><?php echo atlesque_ecard_position2(); ?></div>
	</div>
	<?php
	$abc = ob_get_clean();
	return $abc;
}
