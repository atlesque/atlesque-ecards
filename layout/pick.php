<?php
$output="";

if(isset($_POST['preview'])) {
	$cardid=$_POST['cardid'];
	$post   = get_post( $cardid );
	//$image=atlesque_ecard_options_page
	atlesque_ecard_image_src('large',$post);
	$image=atlesque_ecard_options_page
	atlesque_ecard_image_src_custom('full',$post);
	$image_thumb=atlesque_ecard_options_page
	atlesque_ecard_image_src_custom('ecard-thumb',$post);
	$image_medium=atlesque_ecard_options_page
	atlesque_ecard_image_src('medium',$post);
	$all_atlesque_ecard_fields= get_post_custom($cardid);
	if(isset($all_atlesque_ecard_fields["ecard_layout"][0])) {
		$ecard_layout=$all_atlesque_ecard_fields["ecard_layout"][0];
	} else {
		$ecard_layout="basic";
	}
	require_once("class-pick.php");
	$ecardview =  new Pick;
	require_once("media/".$ecard_layout."/".$ecard_layout."_pick.php");
	$output.=$ecardview->display();
} else if(isset($_POST['facebook'])) {
	$cardid=$_POST['cardid'];
	$post = get_post( $cardid );
	atlesque_ecard_image_src('large',$post);
	$image=atlesque_ecard_options_page
	atlesque_ecard_image_src_custom('full',$post);
	$image_thumb=atlesque_ecard_options_page
	atlesque_ecard_image_src_custom('full',$post);
	$image_medium=atlesque_ecard_options_page
	atlesque_ecard_image_src('full',$post);
	$all_atlesque_ecard_fields= get_post_custom($cardid);
	if(isset($all_atlesque_ecard_fields["ecard_layout"][0])) {
		$ecard_layout=$all_atlesque_ecard_fields["ecard_layout"][0];
	} else {
		$ecard_layout="basic";
	}
	require_once("class-pick.php");
	$ecardview =  new Pick;
	require_once("media/".$ecard_layout."/".$ecard_layout."_pick.php");
} else {
	global $wpdb;

	if (isset($_GET['pick'])) {
		$pickid=sanitize_text_field($_GET['pick']);
	} else {
		$pickid=0;
	}

	$query="SELECT * FROM ".$wpdb->prefix."atlesque_ecard_view WHERE id = '".$pickid."'";
	$ecardview=$wpdb->get_row( $query );

	if (count($ecardview) == 0 ) {
		$output.=esc_html_e( 'Either card is deleted or wrong Pickup ID provided', 'atlesque-ecard' );
	} else {
		$post = get_post( $ecardview->card );
		atlesque_ecard_image_src('large',$post);
		$image=atlesque_ecard_options_page
		atlesque_ecard_image_src_custom('full',$post);
		$image_thumb=atlesque_ecard_options_page
		atlesque_ecard_image_src_custom('ecard-thumb',$post);
		$image_medium=atlesque_ecard_options_page
		atlesque_ecard_image_src('medium',$post); 			
		$all_atlesque_ecard_fields= get_post_custom($ecardview->card);

		if(isset($all_atlesque_ecard_fields["ecard_layout"][0])) {
			$ecard_layout=$all_atlesque_ecard_fields["ecard_layout"][0];
		}
		else {
			$ecard_layout="basic";
		}

		require_once("media/".$ecard_layout."/".$ecard_layout."_pick.php");
	}
}
return $output;
?>
