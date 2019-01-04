<?php
//upload form at admin
wp_enqueue_media();
		wp_enqueue_script( 'meta-box-media', plugins_url('media.js', __FILE__ ), array('jquery') );
		wp_nonce_field( 'nonce_action', 'nonce_name' );
		$field_names = array( 'pic_name');
		foreach ( $field_names as $name ) {
			$value = $rawvalue = get_post_meta( get_the_id(), $name, true );
			$name = esc_attr( $name );
			$value = esc_attr( $name );
			echo "<input type='hidden' id='$name-value'  class='small-text'       name='meta-box-media[$name]'     value='$value' />";
			echo "<input type='button' id='$name'        class='button meta-box-upload-button'        value='Upload' />";
			echo "<input type='button' id='$name-remove' class='button meta-box-upload-button-remove' value='Remove' />";
			$image = ! $rawvalue ? '' : wp_get_attachment_image( $rawvalue, 'full', false, array('style' => 'max-width:100%;height:auto;') );
			echo "<div class='ecard-editor__image-preview'>$image</div>";
		}
?>