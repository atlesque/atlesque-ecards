<?php
function odudecard_help_page()
{
	$options = get_option( 'odudecard_settings','' );	
	$title="";
	if(isset($_POST['subject']))
	$title=sanitize_text_field($_POST['subject']);
	?>
	<div class="wrap">
	<h2>Contact Us</h2>
	<?php
	$user_info = get_userdata(1);
      $username = $user_info->user_login;
      $name = $user_info->user_nicename;
	  $email = $user_info->user_email;
	  $url=get_site_url();
	
	if($title=='')
	{
		echo "<h3>System Check</h3><ul>";
	
	if(isset($options['odudecard_select_pickup_field']))
	{
		echo "<li>Pickup URL Set: OK</li>";
	}
	else
	{
		echo "<li>It is compulsary to set Pickup Page from Basic Settings. Pickup page should have shortcode [odudecard-pick] as content.</li>";
	}
	
	
	flush_rewrite_rules();
	echo "<li>Permalink Structure: Updated</li>";
	echo "</ul>";
	
	echo "<h3>Tips</h3><ul>";
	echo '<li><b>To Display All Ecard:</b> Create a page and add it to menu. The Content should be  [odudecard-list perrow="3" perpage="30" orderby="date" page="off" layout="list"] </li>';
	echo '<li><b>To create pikcup page: </b>Create a page and set content as [odudecard-pick]</li>';
	echo "<li>Click <a href='https://wordpress.org/plugins/odude-ecard/installation/' targe='_blank'>this link</a> for more basic installation questions. </li>";
	echo "</ul>";
	
	

	
	?>
	<hr>
	<b>You can directly contact us with the form below.<br></b>
	<form class="pure-form" method="post" action="">
	<table class="form-table"><tbody><tr><th scope="row">Subject</th>
	<td>	<input name="subject" id="subject" type="text" value="" class="regular-text code" required>
	</td></tr><tr><th scope="row">Message</th><td>	
	
	<div class="pure-controls">
					<div class="usp_text-editor">
			<?php $settings = array(
				    'wpautop'          => true,  // enable rich text editor
				    'media_buttons'    => true,  // enable add media button
				    'textarea_name'    => 'message', // name
				    'textarea_rows'    => '10',  // number of textarea rows
				    'tabindex'         => '',    // tabindex
				    'editor_css'       => '',    // extra CSS
				    'editor_class'     => 'usp-rich-textarea', // class
				    'teeny'            => false, // output minimal editor config
				    'dfw'              => false, // replace fullscreen with DFW
				    'tinymce'          => true,  // enable TinyMCE
				    'quicktags'        => true,  // enable quicktags
				    'drag_drop_upload' => true, // enable drag-drop
				);
				wp_editor('', 'odudecardcontent', apply_filters('odudecard_editor_settings', $settings)); ?>
				
				</div>
			</div>
	
	
	<input type="submit" name="submit" id="submit" class="button button-primary" value="Send Message to ODude.com">
	</td></tr></tbody></table>
	</form>
   
<br>
<b>These are the information passed along with the message</b>

	<?php
	
      echo "<ul><li>Name: $name </li><li>Username: $username</li><li>Email: $email</li><li>URL: $url</li></ul>";
	
	}
	else
	{
		$sub=sanitize_text_field($_POST['subject']);
		$msg=$_POST['message']."<hr>"."<ul><li>Name: $name </li><li>Username: $username</li><li>Email: $email</li><li>URL: $url</li></ul>";
		$msg=wp_kses_post($msg);

			//Sending Mail
			add_filter( 'wp_mail_content_type', 'odudecard_html_content_type' );
			$headers[] = 'From: '.$name.' <'.$email.'>';
			wp_mail( 'navneet@odude.com', $sub, $msg, $headers );
			// Reset content-type to avoid conflicts 
			remove_filter( 'wp_mail_content_type', 'odudecard_html_content_type' );
		
	echo "Message Sent. We will contact you as soon as possible if required.";
	//echo $msg;
	}
	?>
	</div>
	<?php
}

?>