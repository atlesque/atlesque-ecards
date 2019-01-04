<?php

add_filter('manage_edit-odudecard_columns', 'add_new_odudecard_columns');
function add_new_odudecard_columns($odudecard_columns)
{
    $new_columns['cb'] = '<input type="checkbox" />';
    $new_columns['title'] = __('Title', 'odude-ecard');
    $new_columns['author'] = __('Author','odude-ecard');
    $new_columns['card_cate'] = __('Category','odude-ecard');
    $new_columns['card_layout'] = __('Ecard Layout','odude-ecard');
    $new_columns['Thumbnail'] = __('Thumbnail','odude-ecard');
	$new_columns['comments'] = __('<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>','odudecard');
    $new_columns['date'] = __('Date', 'odudecard');
 
    return $new_columns;
    
}



add_action('manage_odudecard_posts_custom_column', 'manage_odudecard_columns', 10, 2);
function manage_odudecard_columns($column_name, $id) 
{
    global $wpdb;
	
  $thumb = odudecard_image_src('thumbnail',get_post($id));
  $layout="basic";
  
   $all_odudecard_fields= get_post_custom($id);
   
   if(isset($all_odudecard_fields["ecard_layout"][0]))
     $layout = $all_odudecard_fields["ecard_layout"][0];
    
    switch ($column_name) 
	{
    case 'card_layout':
        update_post_meta($id,"_odudecard_product_card_layout",$layout);
        echo "$layout";
            break;
 
    case 'Thumbnail':
        update_post_meta($id,"_odudecard_product_Thumbnail",$thumb);
       echo "<img src='$thumb' width='75'>";
        break;
       
    case 'card_cate':
        global $post;
        $terms = get_the_terms( $id, 'card_cate' );
        /* If terms were found. */
        if ( !empty( $terms ) ) {

                $out = array();

                /* Loop through each term, linking to the 'edit posts' page for the specific term. */
                foreach ( $terms as $term ) {
                        $out[] = sprintf( '<a href="%s">%s</a>',
                                esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'card_cate' => $term->slug ), 'edit.php' ) ),
                                esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'card_cate', 'display' ) )
                        );
                }

                /* Join the terms, separating them with a comma. */
                echo join( ', ', $out );
        }

        /* If no terms were found, output a default message. */
        else {
                _e( '--' , 'odudecard');
        }

        break;
        
    
    default:
        break;
    } // end switch
}   