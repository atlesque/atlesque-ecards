<?php
class Pick
{
	public $RN;

	public function __construct() {
		$this->cardid=sanitize_text_field($_POST['cardid']);
		$this->SN=sanitize_text_field($_POST['SN']);
		$this->SE=sanitize_email($_POST['SE']);

		if(isset($_POST['RN'])) {
			$this->RN=sanitize_text_field($_POST['RN']);
		} else {
			$this->RN="";
		}

		if(isset($_POST['RE'])) {
			$this->RE=sanitize_email($_POST['RE']);
		} else {
			$this->RE="";	
		}

		$this->sub=sanitize_text_field($_POST['sub']);

		if(isset($_POST['datepicker'])) {
			$this->datepicker=sanitize_text_field($_POST['datepicker']);
		} else {
			$this->datepicker='';
		}

		$allowed_html = atlesque_ecard_allowed_html();
		$this->body=nl2br(wp_kses($_POST['body'], $allowed_html));
	}

	public function display() {
		$output = "";
		$options = get_option( 'atlesque_ecard_settings', '' );
		ob_start ();
		$captcha="";
		if(isset($options['atlesque_ecard_text_captcha_enable']) && $options['atlesque_ecard_text_captcha_enable']=='1') {
			$captcha='<div class="g-recaptcha" data-sitekey="'.$options['atlesque_ecard_text_captcha_key'].'"></div>';
		}
		?>
		<form class="pure-form pure-form-stacked" method="post" action="<?= $_SERVER['HTTP_REFERER']; ?>">
			<input type="hidden" id="SN" name="SN" value="<?= $this->SN; ?>">
			<input type="hidden" id="RN" name="RN" value="<?= $this->RN; ?>">
			<input type="hidden" id="SE" name="SE" value="<?= $this->SE; ?>">
			<input type="hidden" id="RE" name="RE" value="<?= $this->RE; ?>">
			<input type="hidden" id="sub" name="sub" value="<?= $this->sub; ?>">
			<input type="hidden" id="body" name="body" value='<?= $this->body; ?>'>
			<input type="hidden" id="datepicker" name="datepicker" value="<?= $this->datepicker; ?>">
			<?= $captcha; ?>
			<hr>
			<div class="pure-g">
				<div class="pure-u-1-1 pure-u-md-1-2" style="text-align:center;">
					<button type="submit" class="pure-button pure-button-primary">
						<i class="fa fa-envelope"></i> 	
						<?php esc_html_e( 'Email This Ecard', 'atlesque_ecard' ); ?></button>
					</div>
					<div class="pure-u-1-1 pure-u-md-1-2" style="text-align:center;">	
						<a href='javascript:history.back()' class='pure-button'>
							<i class="fa fa-arrow-circle-left"></i> 	
							<?php esc_html_e( 'Modify', 'atlesque_ecard' ); ?></a>
						</div>
					</div>
				</form>
				<?php
				$output=ob_get_clean ();
				return $output;
			}
		}
		?>