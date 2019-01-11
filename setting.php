<?php
function atlesque_ecards_add_admin_menu () {
	add_submenu_page( 'edit.php?post_type=atlesque_ecard', 'E-Card Settings', 'Instellingen', 'manage_options', 'atlesque_ecard', 'atlesque_ecard_options_page' );
	add_submenu_page( 'edit.php?post_type=atlesque_ecard', 'E-Card Statistics', 'Statistieken', 'manage_options', 'atlesque_ecard_stat', 'atlesque_ecard_stat_page' );
	add_submenu_page( 'edit.php?post_type=atlesque_ecard', 'E-Card Help/Feedback', 'Help / Feedback', 'manage_options', 'atlesque_ecard_help', 'atlesque_ecard_help_page' );
}

function atlesque_ecards_settings_init () {
	//Basic Setting
	register_setting( 'EcardSettingPage', 'atlesque_ecard_settings' );
	
	add_settings_section(
		'atlesque_ecard_EcardSettingPage_section',
		__( 'Settings', 'atlesque_ecard' ),
		'atlesque_ecard_settings_section_callback',
		'EcardSettingPage'
	);

	add_settings_field(
		'atlesque_ecard_select_pickup_field',
		__( 'Free Settings', 'atlesque_ecard' ),
		'atlesque_ecard_free_settings',
		'EcardSettingPage',
		'atlesque_ecard_EcardSettingPage_section'
	);

	add_settings_field(
		'atlesque_ecard_text_date_enable',
		__( 'Pro Settings', 'atlesque_ecard' ),
		'atlesque_ecard_pro_settings',
		'EcardSettingPage',
		'atlesque_ecard_EcardSettingPage_section'
	);
	
	//End Basic Setting

	//Captcha Tab
	register_setting( 'EcardSetting_Captcha_Page', 'atlesque_ecard_settings' );
	add_settings_section(
		'atlesque_ecard_EcardSettingPage_captcha_section',
		__( 'Captcha Settings', 'atlesque_ecard' ),
		'atlesque_ecard_settings_section_captcha_callback',
		'EcardSetting_Captcha_Page'
	);
	
	add_settings_field(
		'atlesque_ecard_text_captcha_enable',
		__( 'Google Captcha Enable', 'atlesque_ecard' ),
		'atlesque_ecard_text_captcha_enable_render',
		'EcardSetting_Captcha_Page',
		'atlesque_ecard_EcardSettingPage_captcha_section'
	);
	
	add_settings_field(
		'atlesque_ecard_text_captcha_key',
		__( 'Google Captcha API Key', 'atlesque_ecard' ),
		'atlesque_ecard_text_captcha_key_render',
		'EcardSetting_Captcha_Page',
		'atlesque_ecard_EcardSettingPage_captcha_section'
	);

	add_settings_field(
		'atlesque_ecard_text_secret_key',
		__( 'Google Captcha secret Key', 'atlesque_ecard' ),
		'atlesque_ecard_text_secret_key_render',
		'EcardSetting_Captcha_Page',
		'atlesque_ecard_EcardSettingPage_captcha_section'
	);
	
	//End Captcha Tab

	//3rd Party Shortcode
	register_setting( 'EcardSetting_shortcode_Page', 'atlesque_ecard_settings' );

	add_settings_section(
		'atlesque_ecard_EcardSettingPage_shortcode_section',
		__( '3rd Party Shortcode', 'atlesque_ecard' ),
		'atlesque_ecard_settings_section_shortcode_callback',
		'EcardSetting_shortcode_Page'
	);
	
	add_settings_field(
		'atlesque_ecard_textarea_shortcode_1',
		__( 'Shortcode for Position 1st', 'atlesque_ecard' ),
		'atlesque_ecard_textarea_shortcode_1_render',
		'EcardSetting_shortcode_Page',
		'atlesque_ecard_EcardSettingPage_shortcode_section'
	);

	add_settings_field(
		'atlesque_ecard_textarea_shortcode_2',
		__( 'Shortcode for Position 2nd', 'atlesque_ecard' ),
		'atlesque_ecard_textarea_shortcode_2_render',
		'EcardSetting_shortcode_Page',
		'atlesque_ecard_EcardSettingPage_shortcode_section'
	);
}

function atlesque_ecard_text_captcha_enable_render () {
	$options = get_option( 'atlesque_ecard_settings','' );
	if(!isset($options['atlesque_ecard_text_captcha_enable'])) {
		$options['atlesque_ecard_text_captcha_enable']="0";
	}
	?>
	<input type="checkbox" name='atlesque_ecard_settings[atlesque_ecard_text_captcha_enable]' value='1' <?php if($options['atlesque_ecard_text_captcha_enable']=='1') echo 'checked="checked"'; ?> >
	<?php
}

function atlesque_ecard_text_captcha_key_render () {
	$options = get_option( 'atlesque_ecard_settings' );
	if(!isset($options['atlesque_ecard_text_captcha_key']))
		$options['atlesque_ecard_text_captcha_key']="";
	?>
	<input type='text' name='atlesque_ecard_settings[atlesque_ecard_text_captcha_key]' value='<?php echo $options['atlesque_ecard_text_captcha_key']; ?>'>
	<?php
}
function atlesque_ecard_text_secret_key_render () {
	$options = get_option( 'atlesque_ecard_settings','' );
	if(!isset($options['atlesque_ecard_text_secret_key']))
		$options['atlesque_ecard_text_secret_key']="";
	?>
	<input type='text' name='atlesque_ecard_settings[atlesque_ecard_text_secret_key]' value='<?php echo $options['atlesque_ecard_text_secret_key']; ?>'>
	<?php
}

function atlesque_ecard_textarea_shortcode_1_render () {
	$options = get_option( 'atlesque_ecard_settings' );
	if(isset($options['atlesque_ecard_textarea_shortcode_1']))
		$output=$options['atlesque_ecard_textarea_shortcode_1'];
	else
		$output="";
	?>
	<textarea cols='60' rows='3' name='atlesque_ecard_settings[atlesque_ecard_textarea_shortcode_1]'><?php echo $output; ?></textarea>
	<?php
}

function atlesque_ecard_textarea_shortcode_2_render () {
	$options = get_option( 'atlesque_ecard_settings' );
	if(isset($options['atlesque_ecard_textarea_shortcode_2']))
		$output=$options['atlesque_ecard_textarea_shortcode_2'];
	else
		$output="";
	?>
	<textarea cols='60' rows='3' name='atlesque_ecard_settings[atlesque_ecard_textarea_shortcode_2]'><?php echo $output; ?></textarea>
	<?php
}

function atlesque_ecard_settings_section_shortcode_callback () {
	echo __( 'You can include any other plugin shortcode or message. Eg. social share, buttons, notices<br><br><b>Position 1st</b> = Just above the main ecard image<br><b>Position 2nd</b>=Just below the main ecard image.<br>', 'atlesque_ecard' );
}

function atlesque_ecard_free_settings() {
	echo '<div class="pure-form pure-form-aligned">
	<fieldset>';

	$options = get_option('atlesque_ecard_settings');

	if(!isset($options['atlesque_ecard_select_pickup_field'])) {
		$options['atlesque_ecard_select_pickup_field']="";
	}

	echo '<div class="pure-control-group"> <label for="name">Select Pickup Page</label> ';

	wp_dropdown_pages(
		array(
			'name' => 'atlesque_ecard_settings[atlesque_ecard_select_pickup_field]',
			'echo' => 1,
			'show_option_none' => __( '&mdash; Select &mdash;' ),
			'option_none_value' => '0',
			'selected' => $options['atlesque_ecard_select_pickup_field']
		)
	);

	echo '</div>';

	if(!isset($options['atlesque_ecard_from'])) {
		$options['atlesque_ecard_from']=get_bloginfo( 'admin_email' );
	}
	if(!isset($options['atlesque_ecard_fbid'])) {
		$options['atlesque_ecard_fbid']="";
	}
	if(!isset($options['atlesque_ecard_metatag_enable'])) {
		$options['atlesque_ecard_metatag_enable']="0";
	}
	if(!isset($options['atlesque_ecard_fb_like'])) {
		$options['atlesque_ecard_fb_like']="0";
	}
	if(!isset($options['atlesque_ecard_send_opt'])) {
		$options['atlesque_ecard_send_opt']="toboth";
	}
	?>
	
	<div class="pure-control-group">
		<label for="name">Email From </label>
		<input type='text' name='atlesque_ecard_settings[atlesque_ecard_from]' value='<?php echo $options['atlesque_ecard_from']; ?>'>
	</div>
	
	<div class="pure-control-group">
		<label for="name">Facebook App ID </label>
		<input type='text' name='atlesque_ecard_settings[atlesque_ecard_fbid]' value='<?php echo $options['atlesque_ecard_fbid']; ?>'> <a href="https://developers.facebook.com/docs/apps/register" target="_blank">Get Facebook App ID</a>
	</div>
	
	<div class="pure-control-group">
		<label for="name">Enable Facebook Meta Tags: </label>
		<input type="checkbox" name='atlesque_ecard_settings[atlesque_ecard_metatag_enable]' value='1' <?php if($options['atlesque_ecard_metatag_enable']=='1') echo 'checked="checked"'; ?> >
	</div>
	
	<div class="pure-control-group">
		<label for="name">Enable Facebook Like / Share: </label>
		<input type="checkbox" name="atlesque_ecard_settings[atlesque_ecard_fb_like]" value="1" <?php checked('1', $options['atlesque_ecard_fb_like']); ?> /><br />
	</div>
	
	<div class="pure-control-group">
		<label for="name">Ecard Sending Options: </label>
		Email :
		<input type="radio" name="atlesque_ecard_settings[atlesque_ecard_send_opt]" value="toemail" <?php checked('toemail', $options['atlesque_ecard_send_opt']); ?> />
		Facebook:
		<input type="radio" name="atlesque_ecard_settings[atlesque_ecard_send_opt]" value="tofb" <?php checked('tofb', $options['atlesque_ecard_send_opt']); ?> />
		Both:
		<input type="radio" name="atlesque_ecard_settings[atlesque_ecard_send_opt]" value="toboth" <?php checked('toboth', $options['atlesque_ecard_send_opt']); ?> /><br />
	</div>
</fieldset>
</div>
<?php
}

function atlesque_ecard_pro_settings()
{
	$options = get_option('atlesque_ecard_settings');
	if(!isset($options['atlesque_ecard_text_date_enable']))
	{
		$options['atlesque_ecard_text_date_enable'] = "0";
	}
	?>
	<hr><b>Enable Send on Specific Date:</b> <input type="checkbox" name='atlesque_ecard_settings[atlesque_ecard_text_date_enable]' value='1' <?php if($options['atlesque_ecard_text_date_enable']=='1') echo 'checked="checked"'; ?> ><br>
	<?php
	if(!isset($options['atlesque_ecard_text_thumb_width']))
		$options['atlesque_ecard_text_thumb_width']="150";
	if(!isset($options['atlesque_ecard_text_thumb_height']))
		$options['atlesque_ecard_text_thumb_height']="150";
	if(!isset($options['atlesque_ecard_text_large_width']))
		$options['atlesque_ecard_text_large_width']="500";
	if(!isset($options['atlesque_ecard_text_large_height']))
		$options['atlesque_ecard_text_large_height']="350";
	?>
	<hr>
	<b>Image Thumbnail Width:</b> <input type='text' name='atlesque_ecard_settings[atlesque_ecard_text_thumb_width]' value='<?php echo $options['atlesque_ecard_text_thumb_width']; ?>' maxlength="4" size="5"> px<br>
	<b>Image Thumbnail Height:</b> <input type='text' name='atlesque_ecard_settings[atlesque_ecard_text_thumb_height]' value='<?php echo $options['atlesque_ecard_text_thumb_height']; ?>' maxlength="4" size="5"> px ( ZERO 0 for scaled height)<br>
	<b>Large Preview Width:</b> <input type='text' name='atlesque_ecard_settings[atlesque_ecard_text_large_width]' value='<?php echo $options['atlesque_ecard_text_large_width']; ?>' maxlength="4" size="5"> px<br>
	<b>Large Preview Height:</b> <input type='text' name='atlesque_ecard_settings[atlesque_ecard_text_large_height]' value='<?php echo $options['atlesque_ecard_text_large_height']; ?>' maxlength="4" size="5"> px ( ZERO 0 for scaled height) <br>
	<?php
}


function atlesque_ecard_settings_section_callback () {
	// empty
}


//Captcha Tab
function atlesque_ecard_settings_section_captcha_callback () {
	echo __( 'This is captcha setting page', 'atlesque_ecard' );
}

function atlesque_ecard_options_page () {
	?>
	<script>
		jQuery(document).ready(function($){
			$("#tabs").tabs();
		});
	</script>

	<div class="wrap">
		<form action='options.php' method='post'>
			<h2>Atlesque E-Card</h2>
			<div id="tabs">
				<ul>
					<li><a href="#tab-1"><?php echo __("Basic Settings","atlesque_ecard");?></a></li>
					<li><a href="#tab-2"><?php echo __("Google reCaptcha V2","atlesque_ecard");?></a></li>
					<li><a href="#tab-3"><?php echo __("Any Plugin Shortcode","atlesque_ecard");?></a></li>
				</ul>
				<div id="tab-1">
					<?php
					settings_fields( 'EcardSettingPage' );
					do_settings_sections( 'EcardSettingPage' );
					?>
				</div>
				<div id="tab-2">
					<?php
					settings_fields( 'EcardSetting_Captcha_Page' );
					do_settings_sections( 'EcardSetting_Captcha_Page' );
					?>
				</div>
				<div id="tab-3">
					<?php
					settings_fields( 'EcardSetting_shortcode_Page' );
					do_settings_sections( 'EcardSetting_shortcode_Page' );
					?>
				</div>
			</div>
			<?php
			submit_button();
			flush_rewrite_rules();
			?>
		</form>
	</div>
	<?php
}
?>