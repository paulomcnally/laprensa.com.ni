<?php

$args = array( 'posts_per_page' => 4, 'meta_key'=> '_thumbnail_id', 'post_status' => 'publish', 'cat' => 31, 'ignore_sticky_posts' => 1, 'date_query' => array(array('column' => 'post_date', 'after' => '1 month ago')) );
add_filter('posts_clauses', 'filterEdiciones');
$economy_posts = new WP_Query( $args );
if ($economy_posts->have_posts())
{ 
	$economy_section .= do_shortcode('
[doap_animate type="fadeIn"][doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://www.laprensa.com.ni/economia"><div class="title-left">ECONOMÍA</div><div class="line-container"><div class="line"></div></div></a>[/doap_heading][/doap_animate]'); 

	$economy_section .= '<div id="dept-block" style="padding: 10px 0px; margin: 0; background-color: transparent;">';
	$dep_count=0;
	while( $economy_posts->have_posts())
	{	
		$dep_count++;
		$dep_float = 'left';
		// $dep_float = ($dep_count == 2) ? 'right' : 'left';
		$economy_posts->the_post();
		$title = the_title_attribute('echo=0');
		$post_url = get_permalink($post->ID);
		$feat_image_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'center-top-300x300' ); 
		$feat_image = $feat_image_array[0];
		$economy_section .= '<div id="dept-story-' . $dep_count . '" class="dest-story" style="width:240px; padding: 0px; margin: 10px 8px 10px 0px; float:left">';
		$economy_section .= '<a href="' . $post_url . '"><img src="' . $feat_image . '" stye="max-width:100%"></a>' . PHP_EOL;
		$economy_section .= '<div class="dept-titles" ><center><b><a href="' . $post_url . '">'. $title . '</a></b></center></div>' . PHP_EOL;
		$economy_section .= '</div>' . PHP_EOL;
		// $economy_section .= '<div class="mobile-clear"></div>' . PHP_EOL;
	}
	$economy_section .= '</div>' . PHP_EOL;
}
//wp_reset_query();
?>
