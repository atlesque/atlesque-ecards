<?php
$output="";

//Checks it's for preview of ecard or not.
if(isset($_POST['preview']))
	{
		
		$cardid=$_POST['cardid'];
		$post   = get_post( $cardid );
		//$image=odudecard_image_src('large',$post);
		$image=odudecard_image_src_custom('full',$post);
		$image_thumb=odudecard_image_src_custom('ecard-thumb',$post); 
		$image_medium=odudecard_image_src('medium',$post); 
		$all_odudecard_fields= get_post_custom($cardid);
			if(isset($all_odudecard_fields["ecard_layout"][0]))
			$ecard_layout=$all_odudecard_fields["ecard_layout"][0];
			else
			$ecard_layout="basic";
		
		//echo $ecard_layout;
		require_once("class-pick.php");
		$ecardview =  new Pick;
		
		require_once("media/".$ecard_layout."/".$ecard_layout."_pick.php");
		
		
		
		$output.=$ecardview->display();

	}
	else if(isset($_POST['facebook']))
	{
		
		$cardid=$_POST['cardid'];
		$post   = get_post( $cardid );
		//$image=odudecard_image_src('large',$post);
		$image=odudecard_image_src_custom('full',$post);
		$image_thumb=odudecard_image_src_custom('full',$post); 
		$image_medium=odudecard_image_src('full',$post); 
		$all_odudecard_fields= get_post_custom($cardid);
			if(isset($all_odudecard_fields["ecard_layout"][0]))
			$ecard_layout=$all_odudecard_fields["ecard_layout"][0];
			else
			$ecard_layout="basic";
		
		//echo $ecard_layout;
		require_once("class-pick.php");
		$ecardview =  new Pick;
		
		require_once("media/".$ecard_layout."/".$ecard_layout."_pick.php");
		
		
		
		$output.=$ecardview->facebook_display();

	}
	else
	{
		


			global $wpdb;
			if(isset($_GET['pick']))
			$pickid=sanitize_text_field($_GET['pick']);
			else
			$pickid=0;
			
			$query="SELECT * FROM ".$wpdb->prefix."odudecard_view WHERE id = '".$pickid."'";
			$ecardview=$wpdb->get_row( $query );

			if(count($ecardview)== 0 )
			{
				$output.=esc_html_e( 'Either card is deleted or wrong Pickup ID provided', 'odude-ecard' );
			}
			else
			{
			$post   = get_post( $ecardview->card );
			
			//$image=odudecard_image_src('large',$post);
			$image=odudecard_image_src_custom('full',$post);
			$image_thumb=odudecard_image_src_custom('ecard-thumb',$post);
			$image_medium=odudecard_image_src('medium',$post); 			
			$all_odudecard_fields= get_post_custom($ecardview->card);
						
						if(isset($all_odudecard_fields["ecard_layout"][0]))
						$ecard_layout=$all_odudecard_fields["ecard_layout"][0];
						else
						$ecard_layout="basic";
						
			require_once("media/".$ecard_layout."/".$ecard_layout."_pick.php");
			
			
			}

	}
	return $output;
?>