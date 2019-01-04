<?php 
class Pick
{
  public $RN;
  public function __construct() 
  {
	  $this->cardid=sanitize_text_field($_POST['cardid']);
	  
    $this->SN=sanitize_text_field($_POST['SN']);
	$this->SE=sanitize_email($_POST['SE']);
	
		if(isset($_POST['RN']))
	$this->RN=sanitize_text_field($_POST['RN']);
	else
		$this->RN="";
	
	if(isset($_POST['RE']))
	$this->RE=sanitize_email($_POST['RE']);
	else
	$this->RE="";	
	
	$this->sub=sanitize_text_field($_POST['sub']);
	//$this->body=sanitize_text_field($_POST['body']);
	//$this->body=wpautop($_POST['body']);
	
	if(isset($_POST['datepicker']))
		$this->datepicker=sanitize_text_field($_POST['datepicker']);
	else
		$this->datepicker='';
	
$allowed_html = odudecard_allowed_html();
	
	$this->body=nl2br(wp_kses($_POST['body'], $allowed_html));
	
  }
  public function facebook_display()
  {
	  
	global $wpdb;  
    $output="";
	$options = get_option( 'odudecard_settings','' );
	$fbid=$options['odudecard_fbid'];
	$pickpage=$options['odudecard_select_pickup_field'];
	
	$SN=$this -> SN;
	$SE=$this -> SE;
	$sub=$this -> sub;
	$body=$this -> body;
	$cardid=$this->cardid;
	
	$xid=time();
	$query =  "insert into ".$wpdb->prefix."odudecard_view values('$xid','$SN','$SE','--','Facebook','','$sub','$body','N','Y','$cardid','',0,'')";
	$wpdb->query($query);
	
	
	
	
	$linku=esc_url(get_permalink($pickpage)."?pick=".$xid);
	ob_start ();
	//if(odudecard_verify_comment_captcha()=="OK")
	//{
		
	?>

	<hr>
	<style>
			.fb-send.fb_iframe_widget span 
			{
			overflow: visible!important;
			width: 450px!important;
			}
		

			</style>
			
							

				<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=<?php echo $fbid; ?>";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			
			
			/* Select (and copy) Form Element Script v1.1
* Author: Dynamic Drive at http://www.dynamicdrive.com/
* Visit http://www.dynamicdrive.com/ for full source code
*/

var fieldtoclipboard = {
	tooltipobj: null,
	hidetooltiptimer: null,

	createtooltip:function(){
		var tooltip = document.createElement('div')
		tooltip.style.cssText = 
			'position:absolute; background:black; color:white; padding:4px;z-index:10000;'
			+ 'border-radius:3px; font-size:12px;box-shadow:3px 3px 3px rgba(0,0,0,.4);'
			+ 'opacity:0;transition:opacity 0.3s'
		tooltip.innerHTML = 'Copied!'
		this.tooltipobj = tooltip
		document.body.appendChild(tooltip)
	},

	showtooltip:function(e){
		var evt = e || event
		clearTimeout(this.hidetooltiptimer)
		this.tooltipobj.style.left = evt.pageX - 10 + 'px'
		this.tooltipobj.style.top = evt.pageY + 15 + 'px'
		this.tooltipobj.style.opacity = 1
		this.hidetooltiptimer = setTimeout(function(){
			fieldtoclipboard.tooltipobj.style.opacity = 0
		}, 700) // time in milliseconds before tooltip disappears
	},

	selectelement:function(el){
    var range = document.createRange() // create new range object
    range.selectNodeContents(el)
    var selection = window.getSelection() // get Selection object from currently user selected text
    selection.removeAllRanges() // unselect any user selected text (if any)
    selection.addRange(range) // add range to Selection object to select it
	},
	
	copyfield:function(e, fieldref, callback){
		var field = (typeof fieldref == 'string')? document.getElementById(fieldref) : fieldref
		callbackref = callback || function(){}
		if (/(textarea)|(input)/i.test(field) && field.setSelectionRange){
			field.focus()
			field.setSelectionRange(0, field.value.length) // for iOS sake
		}
		else if (field && document.createRange){
			this.selectelement(field)
		}
		else if (field == null){ // copy currently selected text on document
			field = {value:null}
		}
		var copysuccess // var to check whether execCommand successfully executed
		try{
			copysuccess = document.execCommand("copy")
		}catch(e){
			copysuccess = false
		}
		if (copysuccess){ // execute desired code whenever text has been successfully copied
			if (e){
				this.showtooltip(e)
			}
			callbackref(field.value || window.getSelection().toString())
		}
		return false
	},


	init:function(){
		this.createtooltip()
	}
}

fieldtoclipboard.init()

			
			
			
			
			
			</script>
			
			
			
			<div class="pure-g">
			<div class="pure-u-1-2">
			<div class="fb-send" data-href="<?php echo $linku; ?>" data-size="large" size="large"></div>
			</div>
			
			<div class="pure-u-1-2">
			
			<div class="fb-share-button" data-href="<?php echo $linku; ?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
			</div>
			
	<div class="pure-u-1-1">
			
			<br><fieldset>
<legend><?php esc_html_e( 'Send or Share this URL.', 'odude-ecard' ); ?></legend>

<div id="select3" onclick="return fieldtoclipboard.copyfield(event, this)"><p><?php echo $linku; ?></p></div>

</fieldset>

<br>
			<ul>
			<li><?php esc_html_e( 'This page is personalized for you only.', 'odude-ecard' ); ?></li>
			
			<li><?php esc_html_e( 'If you select more than one Recipients, it will be sent as group message.', 'odude-ecard' ); ?></li>
			<li><?php esc_html_e( 'Message you typed here will only be visible in Facebook\'s Messenger.', 'odude-ecard' ); ?></li>
			</ul>
			</div>
			</div>
			
		
	
	
	
	 <a href='javascript:history.back()'>
	 <i class="fa fa-arrow-circle-left"></i> 	
	 <?php esc_html_e( 'Modify', 'odude-ecard' ); ?></a>
	 
	
	 <br><br>
		

	<?php
	
	//}
	//else
	//{
	//	echo "<b>".odudecard_verify_comment_captcha()."</b><br>";
	//}
	$output=ob_get_clean (); 
	return $output;
  }
  public function display()
  {
    $output="";
	$options = get_option( 'odudecard_settings','' );
	ob_start ();
	//if(odudecard_verify_comment_captcha()=="OK")
	//{
		$captcha="";
		if(isset($options['odudecard_text_captcha_enable']) && $options['odudecard_text_captcha_enable']=='1')
	$captcha='<div class="g-recaptcha" data-sitekey="'.$options['odudecard_text_captcha_key'].'"></div>';
	?>
	<form class="pure-form pure-form-stacked" method="post" action="<?php echo $_SERVER['HTTP_REFERER']; ?>">
	<input type="hidden" id="SN" name="SN" value="<?php echo $this -> SN; ?>">
	<input type="hidden" id="RN" name="RN" value="<?php echo $this -> RN; ?>">
	<input type="hidden" id="SE" name="SE" value="<?php echo $this -> SE; ?>">
	<input type="hidden" id="RE" name="RE" value="<?php echo $this -> RE; ?>">
	<input type="hidden" id="sub" name="sub" value="<?php echo $this -> sub; ?>">
	<input type="hidden" id="body" name="body" value='<?php echo $this -> body; ?>'>
	<input type="hidden" id="datepicker" name="datepicker" value="<?php echo $this -> datepicker; ?>">
	<?php echo $captcha; ?>
	<hr>
	
	<div class="pure-g">
			<div class="pure-u-1-1 pure-u-md-1-2" style="text-align:center;">
	<button type="submit" class="pure-button pure-button-primary">
	<i class="fa fa-envelope"></i> 	
	<?php esc_html_e( 'Email This Ecard', 'odude-ecard' ); ?></button>
	</div>
	
	<div class="pure-u-1-1 pure-u-md-1-2" style="text-align:center;">	
	
	 <a href='javascript:history.back()' class='pure-button'>
	 <i class="fa fa-arrow-circle-left"></i> 	
	 <?php esc_html_e( 'Modify', 'odude-ecard' ); ?></a></div></div><br><br>
		
	</form>
	<?php
	
	//}
	//else
	//{
	//	echo "<b>".odudecard_verify_comment_captcha()."</b><br>";
	//}
	$output=ob_get_clean (); 
	return $output;
  }
}

?>