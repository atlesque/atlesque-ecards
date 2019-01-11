<?php
$captcha = "";
$options = get_option( 'atlesque_ecard_settings', '' );

if(isset($options['atlesque_ecard_text_captcha_enable']) && $options['atlesque_ecard_text_captcha_enable']=='1') {
	$captcha='<div class="g-recaptcha" data-sitekey="'.$options['atlesque_ecard_text_captcha_key'].'"></div>';
}

$futuredate="";

if(isset($options['atlesque_ecard_text_date_enable']) && $options['atlesque_ecard_text_date_enable']=='1') {
	$futuredate='<input type="text" class="datepicker" name="datepicker" value="" />';
}

do_action('atlesque_ecard_music',$post);

?>
<form class="pure-form pure-form-stacked" method="post">
	<div class="pure-g">
		<div class="pure-u-1-2">
			<?php esc_html_e( 'Your Name', 'atlesque-ecard' ); ?>
		</div>
		<div class="pure-u-1-2">
			<?php esc_html_e( 'Your Email', 'atlesque-ecard' ); ?>
		</div>
		<div class="pure-u-1-2">
			<input id="SN" name="SN" class="pure-u-1" type="text" required>
		</div>
		<div class="pure-u-1-2">
			<input id="SE" name="SE" class="pure-u-1" type="email" required>
		</div>
		<div class="pure-u-1-2">
			<?php esc_html_e( 'Receiver Name', 'atlesque-ecard' ); ?>
		</div>
		<div class="pure-u-1-2">
			<?php esc_html_e( 'Receiver E-Mail', 'atlesque-ecard' ); ?>
		</div>
		<div class="pure-u-1-2">
			<input id="RN" name="RN" class="pure-u-1" type="text" required>
		</div>
		<div class="pure-u-1-2">
			<input id="RE" name="RE" class="pure-u-1" type="email" required>
		</div>
		<div class="pure-u-1-1">
			<?php esc_html_e( 'Subject', 'atlesque-ecard' ); ?>: <input id="sub" name="sub" class="pure-u-1-1 pure-input" type="text" >
		</div>
		<div class="pure-u-1-1">
			<span class='odude-form-label'><?php esc_html_e( 'Message', 'atlesque-ecard' ); ?>:</span>
			<?php
			$settings = array(
				    'wpautop'          => true,  // enable rich text editor
				    'media_buttons'    => false,  // enable add media button
				    'textarea_name'    => 'body', // name
				    'textarea_rows'    => '10',  // number of textarea rows
				    'tabindex'         => '',    // tabindex
				    'editor_css'       => '',    // extra CSS
				    'editor_class'     => '', // class
				    'teeny'            => false, // output minimal editor config
				    'dfw'              => false, // replace fullscreen with DFW
				    'tinymce'          => true,  // enable TinyMCE
				    'quicktags'        => false,  // enable quicktags
				    'drag_drop_upload' => false, // enable drag-drop
				  );
			wp_editor('', 'atlesque_ecard_msg', apply_filters('atlesque_ecard_editor_settings', $settings));
			?>
		</div>
		<div class="pure-u-1-1" >
			<?php if($futuredate!="")esc_html_e( 'Send card on specific date:', 'atlesque-ecard' ); ?><?php echo $futuredate; ?>
		</div>
		<div class="pure-u-1-1" style="text-align:center;">
			<?php echo $captcha; ?>
		</div>
		<div class="pure-u-1-1 pure-u-md-1-2">
			<button type="submit" class="pure-button pure-button-primary">
				<i class="fa fa-envelope"></i> 	
				<?php esc_html_e( 'Email This Ecard', 'atlesque-ecard' ); ?>
			</button>
		</div>
		<div class="pure-u-1-1 pure-u-md-1-2">
			<button type="submit" class="pure-button" name="preview" id="preview" formaction="<?php echo $linku; ?>">
				<i class="fa fa-eye"></i> <?php esc_html_e( 'Preview Ecard', 'atlesque-ecard' ); ?>
			</button>
			<input type="hidden" name="cardid" value="<?php echo $cardid; ?>">
		</div>
	</div>
</form>
