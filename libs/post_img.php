<?php
wp_enqueue_media();
wp_enqueue_script( 'meta-box-media', plugins_url('media.js', __FILE__ ), array('jquery') );
wp_nonce_field( 'nonce_action', 'nonce_name' );
$name = 'pic_name';
$rawvalue = get_post_meta( get_the_id(), $name, true );
$value = esc_attr( $name );
?>

<input type='hidden' id='<?= $name ?>-value' class='small-text' name='meta-box-media[<?= $name ?>]' value='<?= $value ?>' />

<div class="ecard-editor__file-buttons">
	<input type='button' id='<?= $name ?>' class='button meta-box-upload-button' value='<?= __('Upload', 'atlesque-ecards') ?>' />
	<input type='button' id='<?= $name ?>-remove' class='button meta-box-upload-button-remove' value='<?= __('Remove', 'atlesque-ecards') ?>' />
</div>

<div class='ecard-editor__image-preview'>
	<?= ! $rawvalue ? '' : wp_get_attachment_image( $rawvalue, 'full', false, array('style' => 'max-width:100%;height:auto;') ); ?>
</div>
