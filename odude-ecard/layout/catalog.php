<?php
global $post; 

//odudecard-list shortcode function here

$output='<div class="odude-shop">
<div id="catalog" class="row-fluid">';
global $wp_query;
$postsperpage = 15;
$perrow = 2;
$album='';
$orderby='';
$page='';
if(isset($params['perpage'])&&$params['perpage']>0) $postsperpage = $params['perpage'];
if(isset($params['perrow'])&&$params['perrow']>0) $perrow = $params['perrow'];
if(isset($params['album'])) $album = $params['album'];
if(isset($params['orderby'])) $orderby = $params['orderby'];
if(isset($params['page'])) $page = $params['page'];

if(isset($params['layout']))
	$layout = $params['layout'];
else
	$layout="list";

//query_posts('post_type=odudecard&posts_per_page='.$postsperpage.'&paged='.$wp_query->query_vars['paged'].'&ptype='.$ptype);
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;



if(isset($params['album']))
{
$args = array(
	'post_type' => 'odudecard',
	'paged' => $paged,
	'posts_per_page' => $postsperpage,
	'orderby' => $orderby,
	'order'   => 'DESC',
	'tax_query' => array(
		array(
			'taxonomy' => 'card_cate',
			'field'    => 'slug',
			'terms'    => explode(',',$album),
			//'terms'    => array( 'mobile', 'sports' ),
		),
		
	),
);
}
else
{
	$args = array(
	'post_type' => 'odudecard',
	'paged' => $paged,
	'posts_per_page' => $postsperpage,
);
}

$query = new WP_Query($args); 



if(file_exists(odudecard_BASE_DIR."/layout/grid/".$layout."/".$layout."_up.php"))
	$output.=include(odudecard_BASE_DIR."/layout/grid/".$layout."/".$layout."_up.php");
	else
	$output.=__('Layout Not Found','odude-ecard').": ".$layout;

while($query->have_posts()) : $query->the_post();
$permalink=get_permalink();
$thetitle=get_the_title();
//$image=odudecard_image_src('thumbnail',$post);
$image=odudecard_image_src_custom('medium',$post); 

if(file_exists(odudecard_BASE_DIR."/layout/grid/".$layout."/$layout.php"))
	$output.=include(odudecard_BASE_DIR."/layout/grid/".$layout."/$layout.php"); 



endwhile;

if(file_exists(odudecard_BASE_DIR."/layout/grid/".$layout."/".$layout."_down.php"))
	$output.=include(odudecard_BASE_DIR."/layout/grid/".$layout."/".$layout."_down.php");



$output.='</div>
</div>';
$output_page="";


if(function_exists('wp_pagenavi'))
{
	if($page!='')
	$output.=wp_pagenavi( array( 'query' => $query ) );
}


wp_reset_query();
return $output;
?>