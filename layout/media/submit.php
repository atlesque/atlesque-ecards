<?php
//Keep these variables also in class-pick.php
global $wpdb;

$SN=sanitize_text_field($_POST['SN']);
$SE=sanitize_email($_POST['SE']);
$RN=sanitize_text_field($_POST['RN']);
$RE=sanitize_email($_POST['RE']);
$sub=sanitize_text_field($_POST['sub']);

$allowed_html = atlesque_ecard_allowed_html();
$body=nl2br(wp_kses($_POST['body'], $allowed_html));

$cardid=$post->ID;
$options = get_option('atlesque_ecards_settings');

if(isset($_POST['datepicker'])) {
	$clock=sanitize_text_field($_POST['datepicker']);
} else {
	$clock="";
}

$errors = array();
if (empty($SE) || !is_email($SE) || empty($RE) || !is_email($RE)) {
	$errors['email'] = __('Please enter a valid email address', 'atlesque-ecard');
}
if (empty($SN) || empty($RN) ) {
	$errors['Name'] = __('Name cannot be empty', 'atlesque-ecard');
}
if (empty($sub)) {
	$errors['subject'] = __('Please enter your subject', 'atlesque-ecard');
}
if (empty($body) || strlen($body) < 2) {
	$errors['message'] = __('Please enter a longer message', 'atlesque-ecard');
}

if (!empty($errors)) {
	echo "<p>Er is een fout optreden bij het versturen van het formulier:</p><pre>";
	foreach ($errors as $string) {
		echo "$string<br />";
	}
	echo "</pre>";
	echo "<a href=\"javascript:history.go(-1)\" class=\"pure-button\">".__('Go Back', 'atlesque-ecard')."</a>";
	die;
}

if(atlesque_verify_comment_captcha()=="OK")
{
	$xid=time();

	if($clock=="")
		$query =  "insert into ".$wpdb->prefix."atlesque_ecard_view values('$xid','$SN','$SE','".$RN."','$RE','$clock','$sub','$body','N','Y','$cardid','',0,'')";
	else
		$query =  "insert into ".$wpdb->prefix."atlesque_ecard_view values('$xid','$SN','$SE','".$RN."','$RE','$clock','$sub','$body','N','N','$cardid','',0,'')";	

	$wpdb->query($query);
	echo "<h1>".__('Ecard Has been sent Sucessfully', 'atlesque-ecard')."</h1>";
	echo __( 'Receiver Name', 'atlesque-ecard' ).": $RN <br>".__( 'Receiver E-Mail', 'atlesque-ecard' ).": $RE <br>";		
	$linku=esc_url( get_permalink($options['atlesque_ecard_select_pickup_field'])."?pick=$xid" );
	$link="<a href='$linku'>$linku</a>";
	$msg="<html>Beste $RN,<br><br>$SN heeft jou een elektronisch kaartje verstuurd via <a href='https://stuurkracht.be/'>Stuurkracht.be</a>.<br><br>Klik op de onderstaande link om het kaartje te bekijken:<br><br>$link<br><br><br><hr>Het Stuurkracht Team<br><a href='https://stuurkracht.be/'>Stuurkracht.be</a></html>";

		//Sending Mail
	if(!isset($options['atlesque_ecard_from']))
		$options['atlesque_ecard_from']=get_bloginfo( 'admin_email' );
	add_filter( 'wp_mail_content_type', 'oset_html_content_type' );
	$headers[] = 'From: '.$SN.' <'.$options['atlesque_ecard_from'].'>';
	
	if($clock=="")
		wp_mail( $RE, $sub, $msg, $headers );

		// Reset content-type to avoid conflicts
	remove_filter( 'wp_mail_content_type', 'oset_html_content_type' );

	echo "<br><br><br><a href='' class='pure-button pure-button-primary'>".__( 'Send to Others', 'atlesque-ecard' )."</a>";
}
else
{
	echo "<b>".atlesque_verify_comment_captcha()."</b><br><br><a href=\"javascript:history.go(-1)\" class=\"pure-button\">".__('Go Back', 'atlesque-ecard')."</a>";
}
?>
