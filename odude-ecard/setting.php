<?php
function odudecard_add_admin_menu(  ) 
{ 

	add_submenu_page( 'edit.php?post_type=odudecard', 'ODude Ecard Settings', 'Instellingen', 'manage_options', 'odude_ecard', 'odudecard_options_page' );
	
	add_submenu_page( 'edit.php?post_type=odudecard', 'ODude Ecard Statistics', 'Statistieken', 'manage_options', 'odude_ecard_stat', 'odudecard_stat_page' );
	
	add_submenu_page( 'edit.php?post_type=odudecard', 'ODude Ecard Help/Feedback', 'Help / Feedback', 'manage_options', 'odude_ecard_help', 'odudecard_help_page' );
	

}


function odudecard_settings_init(  ) 
{ 
	
	
	//Basic Setting
	register_setting( 'EcardSettingPage', 'odudecard_settings' );
	

	add_settings_section(
		'odudecard_EcardSettingPage_section', 
		__( 'Settings', 'odudecard' ), 
		'odudecard_settings_section_callback', 
		'EcardSettingPage'
	);
	add_settings_field( 
		'odudecard_select_pickup_field', 
		__( 'Free Settings', 'odudecard' ), 
		'odude_free_settings', 
		'EcardSettingPage', 
		'odudecard_EcardSettingPage_section' 
	);
	add_settings_field( 
		'odudecard_text_date_enable', 
		__( 'Pro Settings', 'odudecard' ), 
		'odude_pro_settings', 
		'EcardSettingPage', 
		'odudecard_EcardSettingPage_section' 
	);
	
	
	//End Basic Setting
	//Captcha Tab
	register_setting( 'EcardSetting_Captcha_Page', 'odudecard_settings' );
		add_settings_section(
		'odudecard_EcardSettingPage_captcha_section', 
		__( 'Captcha Settings', 'odudecard' ), 
		'odudecard_settings_section_captcha_callback', 
		'EcardSetting_Captcha_Page'
	);
	

		 add_settings_field( 
		'odudecard_text_captcha_enable', 
		__( 'Google Captcha Enable', 'odudecard' ), 
		'odudecard_text_captcha_enable_render', 
		'EcardSetting_Captcha_Page', 
		'odudecard_EcardSettingPage_captcha_section' 
	);
	
	 add_settings_field( 
		'odudecard_text_captcha_key', 
		__( 'Google Captcha API Key', 'odudecard' ), 
		'odudecard_text_captcha_key_render', 
		'EcardSetting_Captcha_Page', 
		'odudecard_EcardSettingPage_captcha_section' 
	); 
	 add_settings_field( 
		'odudecard_text_secret_key', 
		__( 'Google Captcha secret Key', 'odudecard' ), 
		'odudecard_text_secret_key_render', 
		'EcardSetting_Captcha_Page', 
		'odudecard_EcardSettingPage_captcha_section' 
	);
	
	//End Captcha Tab

	
	//3rd Party Shortcode
	register_setting( 'EcardSetting_shortcode_Page', 'odudecard_settings' );
		add_settings_section(
		'odudecard_EcardSettingPage_shortcode_section', 
		__( '3rd Party Shortcode', 'odudecard' ), 
		'odudecard_settings_section_shortcode_callback', 
		'EcardSetting_shortcode_Page'
	);
	
	 add_settings_field( 
		'odudecard_textarea_shortcode_1', 
		__( 'Shortcode for Position 1st', 'odudecard' ), 
		'odudecard_textarea_shortcode_1_render', 
		'EcardSetting_shortcode_Page', 
		'odudecard_EcardSettingPage_shortcode_section' 
	); 
	 add_settings_field( 
		'odudecard_textarea_shortcode_2', 
		__( 'Shortcode for Position 2nd', 'odudecard' ), 
		'odudecard_textarea_shortcode_2_render', 
		'EcardSetting_shortcode_Page', 
		'odudecard_EcardSettingPage_shortcode_section' 
	); 
	/* add_settings_field( 
		'odudecard_select_pick_layout', 
		__( 'Select Layout', 'odudecard' ), 
		'odudecard_select_pick_layout_render', 
		'EcardSettingPage', 
		'odudecard_EcardSettingPage_section' 
	); */
	
	
	


}

function odudecard_text_captcha_enable_render(  ) 
{ 

	$options = get_option( 'odudecard_settings','' );
	if(!isset($options['odudecard_text_captcha_enable']))
	{
		$options['odudecard_text_captcha_enable']="0";
		//update_option('odudecard_settings',$options);
	}
	?>
	<input type="checkbox" name='odudecard_settings[odudecard_text_captcha_enable]' value='1' <?php if($options['odudecard_text_captcha_enable']=='1') echo 'checked="checked"'; ?> >
	
	<?php

}
 
function odudecard_text_captcha_key_render(  ) 
{ 

	$options = get_option( 'odudecard_settings' );
	if(!isset($options['odudecard_text_captcha_key']))
		$options['odudecard_text_captcha_key']="";
	?>
	<input type='text' name='odudecard_settings[odudecard_text_captcha_key]' value='<?php echo $options['odudecard_text_captcha_key']; ?>'>
	<?php

}
function odudecard_text_secret_key_render(  ) 
{ 

	$options = get_option( 'odudecard_settings','' );
	if(!isset($options['odudecard_text_secret_key']))
		$options['odudecard_text_secret_key']="";
	?>
	<input type='text' name='odudecard_settings[odudecard_text_secret_key]' value='<?php echo $options['odudecard_text_secret_key']; ?>'>
	<?php

}

 function odudecard_textarea_shortcode_1_render(  ) 
{ 

	$options = get_option( 'odudecard_settings' );
	if(isset($options['odudecard_textarea_shortcode_1']))
		$output=$options['odudecard_textarea_shortcode_1'];
		else
		$output="";
	?>
	<textarea cols='60' rows='3' name='odudecard_settings[odudecard_textarea_shortcode_1]'><?php echo $output; ?></textarea>
	<?php

} 
 function odudecard_textarea_shortcode_2_render(  ) 
{ 

	$options = get_option( 'odudecard_settings' );
	if(isset($options['odudecard_textarea_shortcode_2']))
		$output=$options['odudecard_textarea_shortcode_2'];
		else
		$output="";
	?>
	<textarea cols='60' rows='3' name='odudecard_settings[odudecard_textarea_shortcode_2]'><?php echo $output; ?></textarea>
	<?php

} 
function odudecard_settings_section_shortcode_callback(  ) 
{ 

	echo __( 'You can include any other plugin shortcode or message. Eg. social share, buttons, notices<br><br><b>Position 1st</b> = Just above the main ecard image<br><b>Position 2nd</b>=Just below the main ecard image.<br>', 'odudecard' );
	
	
}


/* function odudecard_select_pick_layout_render(  ) 
{ 

	$options = get_option( 'odudecard_settings' );
	?>
	<select name='odudecard_settings[odudecard_select_pick_layout]'>
		<option value='1' <?php selected( $options['odudecard_select_pick_layout'], 1 ); ?>>Option 1</option>
		<option value='2' <?php selected( $options['odudecard_select_pick_layout'], 2 ); ?>>Option 2</option>
	</select>

<?php

}
 */
 
 function odude_free_settings() 
 {
	 echo '<div class="pure-form pure-form-aligned">
 
  <fieldset>';
$options = get_option('odudecard_settings');

if(!isset($options['odudecard_select_pickup_field']))
		$options['odudecard_select_pickup_field']="";

	echo '<div class="pure-control-group"> <label for="name">Select Pickup Page</label> ';
    wp_dropdown_pages(
        array(
             'name' => 'odudecard_settings[odudecard_select_pickup_field]',
             'echo' => 1,
             'show_option_none' => __( '&mdash; Select &mdash;' ),
             'option_none_value' => '0',
             'selected' => $options['odudecard_select_pickup_field']
			 
        )
    );
	echo '</div>';
	if(!isset($options['odudecard_from']))
		$options['odudecard_from']=get_bloginfo( 'admin_email' );
	if(!isset($options['odudecard_fbid']))
		$options['odudecard_fbid']="";
	if(!isset($options['odudecard_metatag_enable']))
		$options['odudecard_metatag_enable']="0";
	if(!isset($options['odudecard_fb_like']))
		$options['odudecard_fb_like']="0";

	if(!isset($options['odudecard_send_opt']))
		$options['odudecard_send_opt']="toboth";
	
	?>
	
		<div class="pure-control-group">
	<label for="name">Email From </label>
	<input type='text' name='odudecard_settings[odudecard_from]' value='<?php echo $options['odudecard_from']; ?>'>
	</div>
	
	<div class="pure-control-group">
	<label for="name">Facebook App ID </label>
	<input type='text' name='odudecard_settings[odudecard_fbid]' value='<?php echo $options['odudecard_fbid']; ?>'> <a href="https://developers.facebook.com/docs/apps/register" target="_blank">Get Facebook App ID</a>
	</div>
	
	<div class="pure-control-group">
	 <label for="name">Enable Facebook Meta Tags: </label>
	<input type="checkbox" name='odudecard_settings[odudecard_metatag_enable]' value='1' <?php if($options['odudecard_metatag_enable']=='1') echo 'checked="checked"'; ?> >
	</div>
	
	<div class="pure-control-group">
	 <label for="name">Enable Facebook Like / Share: </label>
	
	
	<input type="checkbox" name="odudecard_settings[odudecard_fb_like]" value="1" <?php checked('1', $options['odudecard_fb_like']); ?> /><br />
	</div>
	
		<div class="pure-control-group">
	 <label for="name">Ecard Sending Options: </label>
	 Email :
	 <input type="radio" name="odudecard_settings[odudecard_send_opt]" value="toemail" <?php checked('toemail', $options['odudecard_send_opt']); ?> />
	 Facebook: 
   <input type="radio" name="odudecard_settings[odudecard_send_opt]" value="tofb" <?php checked('tofb', $options['odudecard_send_opt']); ?> />
   Both:
   <input type="radio" name="odudecard_settings[odudecard_send_opt]" value="toboth" <?php checked('toboth', $options['odudecard_send_opt']); ?> /><br /> 
 
	</div>

	
	 </fieldset>
	</div>
	
	<?php
	
	
}

 function odude_pro_settings() 
 {
$options = get_option('odudecard_settings');
	if(!isset($options['odudecard_text_date_enable']))
	{
		$options['odudecard_text_date_enable']="0";
		//update_option('odudecard_settings',$options);
	}
	$proactive=true;
	/*if ( is_plugin_active( 'odude-card-pro/odude-ecard-pro.php' ) ) 
	{
		echo "<b><a href='http://www.odude.com'>ODude ECard PRO</a> is Active</b>";
		$proactive=true;
	} 
	else
	{
		echo "<br>Install <b><a href='http://odude.com/product/odude-ecard-wordpress/'>ODude Ecard PRO</a></b> for complete features.<br>Only US$15 for all features.";
	}*/
	if($proactive)
	{
	
	?>
	<hr><b>Enable Send on Specific Date:</b> <input type="checkbox" name='odudecard_settings[odudecard_text_date_enable]' value='1' <?php if($options['odudecard_text_date_enable']=='1') echo 'checked="checked"'; ?> ><br>
	<?php
	if(!isset($options['odudecard_text_thumb_width']))
		$options['odudecard_text_thumb_width']="150";
	if(!isset($options['odudecard_text_thumb_height']))
		$options['odudecard_text_thumb_height']="150";
	if(!isset($options['odudecard_text_large_width']))
		$options['odudecard_text_large_width']="500";
	if(!isset($options['odudecard_text_large_height']))
		$options['odudecard_text_large_height']="350";
	?>
	<hr>
	
	<b>Image Thumbnail Width:</b> <input type='text' name='odudecard_settings[odudecard_text_thumb_width]' value='<?php echo $options['odudecard_text_thumb_width']; ?>' maxlength="4" size="5"> px<br>
	<b>Image Thumbnail Height:</b> <input type='text' name='odudecard_settings[odudecard_text_thumb_height]' value='<?php echo $options['odudecard_text_thumb_height']; ?>' maxlength="4" size="5"> px ( ZERO 0 for scaled height)<br> 
	<b>Large Preview Width:</b> <input type='text' name='odudecard_settings[odudecard_text_large_width]' value='<?php echo $options['odudecard_text_large_width']; ?>' maxlength="4" size="5"> px<br>
	<b>Large Preview Height:</b> <input type='text' name='odudecard_settings[odudecard_text_large_height]' value='<?php echo $options['odudecard_text_large_height']; ?>' maxlength="4" size="5"> px ( ZERO 0 for scaled height) <br>
	
	<?php
	}
	else
	{
		?><br><br>These features are not availabe in free version.
		<ul>
		<li>Google reCaptcha to prevent from email spam</li>
		<li>Enable/Disable Send ecard on specified date</li>
		<li>Adjust Image Thumbnail Width: <b>150px</b></li>	
		<li>Adjust Image Thumbnail Height: <b>150px</b></li>
		<li>Adjust Large Preview Width: <b>500px</b></li>	
		<li>Adjust Large Preview Height: <b>350px</b></li>			
		<li>Background Music: <b>OFF</b></li>
		</li>Background Color: <b>OFF</b></li>
		</ul>
		<input type="hidden" name='odudecard_settings[odudecard_text_date_enable]' value='0'>
		<input type="hidden" name='odudecard_settings[odudecard_text_thumb_width]' value='150'>
		<input type="hidden" name='odudecard_settings[odudecard_text_thumb_height]' value='150'>
		<input type="hidden" name='odudecard_settings[odudecard_text_large_width]' value='500'>
		<input type="hidden" name='odudecard_settings[odudecard_text_large_height]' value='350'>
		<?php
	}
	
}


function odudecard_settings_section_callback(  ) 
{ 

	//echo __( 'Update or modify required settings.', 'odudecard' );
	/**
 * Detect plugin. For use on Front End only.
 */
 //include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	
	
}


//Captcha Tab
function odudecard_settings_section_captcha_callback(  ) 
{ 

	echo __( 'This is captcha setting page', 'odudecard' );
	
	
}



function odudecard_options_page(  ) 
{ 

/**
 * Detect plugin. For use on Front End only.
 */
 //include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$proactive=true;
 
/*	if ( is_plugin_active( 'odude-card-pro/odude-ecard-pro.php' ) ) 
	{
		 $proactive=true;
	} */
	
	$propassive="This features is only availabe to ODude Ecard PRO Version.";




	?>
	
	<script>
jQuery(document).ready(function($){
       $("#tabs").tabs();
});
  </script>
  
<div class="wrap">
	



	<form action='options.php' method='post'>
		
		<h2>ODude Ecard</h2>
		<div id="tabs">
	<ul>
		  
        <li><a href="#tab-1"><?php echo __("Basic Settings","odudeshop");?></a></li>
        <li><a href="#tab-2"><?php echo __("Google reCaptcha V2","odudeshop");?></a></li>    
		<li><a href="#tab-3"><?php echo __("Any Plugin Shortcode","odudeshop");?></a></li> 
				
	</ul>
	 <div id="tab-1">
     <?php
	 settings_fields( 'EcardSettingPage' );
	do_settings_sections( 'EcardSettingPage' );
	 ?>
    </div>
    <div id="tab-2">
      <?php
	  if($proactive)
	  {
	  settings_fields( 'EcardSetting_Captcha_Page' );
		do_settings_sections( 'EcardSetting_Captcha_Page' );
	  }
	  else
	  {
		  echo $propassive;
			//$options['odudecard_text_captcha_enable']="0";
			//update_option('odudecard_settings',$options);
	  }
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