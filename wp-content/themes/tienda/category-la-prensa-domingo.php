<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Archive Template
 *
 *
 * @file           archive.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/responsive/archive.php
 * @link           http://codex.wordpress.org/Theme_Development#Archive_.28archive.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<script type='text/javascript'>
googletag.cmd.push(function() {


/* la-prensa-domingo slots */
googletag.defineSlot('/11648707/La-Prensa-Domingo-Top-270x90', [270, 90], 'div-gpt-ad-1403218103157-4').addService(googletag.pubads());
googletag.defineSlot('/11648707/La-Prensa-Domingo-Top-728x90px', [728, 90], 'div-gpt-ad-1403218103157-6').addService(googletag.pubads());
googletag.defineSlot('/11648707/La-Prensa-Domingo-Left-160x600px', [160, 600], 'div-gpt-ad-1403218103157-1').addService(googletag.pubads());
googletag.defineSlot('/11648707/La-Prensa-Domingo-Right-160x600px', [160, 600], 'div-gpt-ad-1403218103157-2').addService(googletag.pubads());
googletag.defineSlot('/11648707/La-Prensa-Domingo-bottom-728x90px', [728, 90], 'div-gpt-ad-1403218103157-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/La-Prensa-Domingo-Sidebar-300x250px', [300, 250], 'div-gpt-ad-1403218103157-3').addService(googletag.pubads());
googletag.defineSlot('/11648707/La-Prensa-Domingo-Top-300x250px', [300, 250], 'div-gpt-ad-1403218103157-5').addService(googletag.pubads());

googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script>

<?php global  $wpdb; $user_id = get_current_user_id(); $qry = "SELECT identifier, websiteurl, email FROM `wp_2_wslusersprofiles` WHERE user_id = '$user_id' && provider = 'Google' && identifier IS NOT NULL && websiteurl = 'http://doap.com'"; $avalidgoogleid = $wpdb->get_results( $qry ); foreach ( $avalidgoogleid as $avalidgoogleid ) { $gid = $avalidgoogleid ->identifier; $uemail  = $avalidgoogleid ->email; $websiteurl = $avalidgoogleid ->websiteurl; }
 ?>

<?php if ($gid > 10000000 )  {
include(STYLESHEETPATH . '/page-wing-ads-loggedin.php');
include(STYLESHEETPATH . '/backpages-top-loggedin.php');

} else {
include(STYLESHEETPATH . '/page-wing-ads-la-prensa-domingo.php');
include(STYLESHEETPATH . '/banner-ad-widget-la-prensa-domingo-728x90.php');
include(STYLESHEETPATH . '/banner-ad-widget-la-prensa-domingo-270x90.php'); }


responsive_wrapper(); // before wrapper container hook 
echo '<div id="wrapper" class="clearfix">';
responsive_wrapper_top(); // before wrapper content hook 
responsive_in_wrapper(); // wrapper hook 

echo '<div id="content-archive" style="margin-top:4px;" class="' . implode( ' ', responsive_get_content_classes() ) . '">';
$themaincat = 35632;
$single_cat_title = "La Prensa Domingo";
$max_posts = 3;

if ( $paged < 2 )
{

$args = array(
	'cat' => $themaincat,
	'posts_per_page' => 1,
	'meta_key' => '_thumbnail_id',
	'meta_query' => array(
		array(
		 'key' => 'destacado',
		 'value' => true,
		 'type' => 'BOOLEAN'
		     )
        ),
//	'tag_id' => 24124
//	'post__in'  => get_option( 'sticky_posts' ),
	'ignore_sticky_posts' => 1
);
$story_count = 0;
$the_query = new WP_Query( $args );
if( $the_query->have_posts() ) 
{
while ( $the_query->have_posts() )
{
	$the_query->the_post();
	$posted_time = get_the_time('h:i A');

	if ( has_post_thumbnail() )
	{
		$image_info = wp_get_attachment_metadata( get_post_thumbnail_id($post->ID) );
		$img_width = $image_info['width'];
		$img_height = $image_info['height'];
		$feat_post[] = $post->ID;

		$pix_orient = 'horizontal';
		$pix_class = 'catpic-hori dom-dest-img';
		$pix_size = 'Video-Poster-640x360';
		$pix_width = '100%;';
		$pix_img_width = ($img_width < 640) ? round($img_width * 1.065625) . 'px;' : '682px;';
		
		$pix_img_height = '384px;';
	//	$story_pre = '<div style="clear:both;">';
//		$story_post = '</div><div class="su-column su-column-size-1-3" style="width:250px;margin: 0px 0px 0px 0px;position:relative;float:left;"><div class="su-column-inner su-clearfix"></div>';
		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		$feat_image_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $pix_size );
		$post_url = get_permalink($post->ID);
		$feat_image = $feat_image_array[0];
	
		$dest_title = get_doap_limit_chars(the_title_attribute('echo=0'),20,1);
		$dom_dest_story_title = '<div class="dom-dest-story-title"><a href="' . $post_url . '">' . $dest_title . '</a></div>' . PHP_EOL;
		$dom_dest_story_pre .= $story_pre;
		$dom_dest_story_pre .= '<div class="' . $pix_class . '" style="position:relative;float:left;border: 1px solid #ccc;max-width:' . $pix_width . '">' . PHP_EOL;
		$dom_dest_story_pre .= '<a href="' . $post_url . '"><img src="' . $feat_image . '">' . PHP_EOL;
		$dom_dest_story_pre .= '<div class="dom-img"><img src="http://noticias.laprensa.com.ni/images/logodomingo.png"></div>'; 
		$dom_dest_story_title_block .= '<div class="dom-dest-title-block"><div class="dom-dest-titles-inner">';
//		echo $write_comments;
		$dom_dest_story_post .= '</div></a></div></div>';
		$dom_dest_story_post .= '<div style="clear:both;"></div>';
	}
}
}
else
{
	$max_posts = 9;
}

$args = array( 'cat' => $themaincat, 'posts_per_page' => 10, 'offset' => 3, 'meta_query' => array( 'relation' => 'OR', array( 'key' => 'breves', 'compare' => 'NOT EXISTS' ), array( 'key' => 'breves', 'value' => 0, 'type' => 'NUMERIC' ) ), 'post__not_in' => $feat_post, 'update_post_term_cache' => false );
$the_query = new WP_Query($args); 
if( $the_query->have_posts() ) 
{
while ( $the_query->have_posts() )
{
	$the_query->the_post();
	$title = get_doap_limit_chars(the_title_attribute('echo=0'),28,1);
        $post_url = get_permalink($post->ID);
	$dom_dest_stories .= '<div class="dom-dest-titles"><a href="' . $post_url . '">' . $title . '</a></div>' . PHP_EOL;
}
}

}

//echo do_shortcode('[doap_slider source="category: '.$themaincat.'" limit="4" autoplay="0" arrows="no" width="640" height="360" link="post" mousewheel="no" pages="no" class="deportes-slider"]');
echo $dom_dest_story_pre . $dom_dest_story_title_block . $dom_dest_story_title . $dom_dest_stories . $dom_dest_story_post . PHP_EOL;
$even = 0; 
global $wp_query;
$args = array_merge( $wp_query->query_vars, array( 'cat' => $themaincat, 'offset' => $offset, 'post__not_in' => $feat_post ) );
add_filter('posts_clauses', 'filterEdiciones');
add_filter('posts_clauses', 'filterNoBreves');
$the_query = new WP_Query( $args );
$even = 0; 
	if( $the_query->have_posts() ) 
	{
//		get_template_part( 'deportes-loop-header' ); 

		while( $the_query->have_posts() && $even < $max_posts )
		{ 
			$the_query->the_post();
$even++;
$float='left';
if ($even == 1)
{
	$extract_chars = 300;
	include(STYLESHEETPATH . '/templates/dom-mini.php');
	echo '<div style="clear:both;"></div><hr><div style="clear:both;"></div>';
	$max_width = 'width:350px;';
}
else
{
if ($even == 2)
{
echo do_shortcode('<div id="dom-breves">[doap_cat_breves_carousel source="category: 991" limit="10" link="post" width="300" height="300" items="1" mousewheel="no" autoplay="0" speed="500" class="carousel-dave"]</div>');
echo '<div id="dom-left-wrapper">';
}

include(STYLESHEETPATH . '/templates/dom_left.php');
responsive_entry_after(); ?>
		<?php
		$i++;
}	
	}
                //echo '<div style="position:relative;float:left;">'; wpbeginner_numeric_posts_nav(); echo '</div>';
		//get_template_part( 'loop-nav' );
}
else 
{
	get_template_part( 'loop-no-posts' );
}
	?>

</div><!-- end of #dom-left-wrapper-->
</div><!-- end of #content-archive -->
<?php

get_sidebar('la-prensa-domingo'); ?>


<?php echo do_shortcode('[doap_divider text="Volver a la parte superior de la página"]'); ?>

<?php if ($gid > 10000000)  { include(STYLESHEETPATH . '/bottom-ads-loggedin.php'); } else { include(STYLESHEETPATH . '/banner-ad-widget-la-prensa-domingo-bottom-728x90.php'); echo ""; } ?>


<?php //echo do_shortcode('[xyz-ips snippet="promociones-video-widget"]'); ?>
<?php get_footer(); ?>
