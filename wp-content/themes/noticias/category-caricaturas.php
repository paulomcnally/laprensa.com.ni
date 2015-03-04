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

get_header();
$page_date = get_the_date("Y-m-d");
$last_month = date("Y-m-d", strtotime($page_date . "- 1 month"));
?>


<script type='text/javascript'>
/* home slots */
googletag.defineSlot('/11648707/Portada-Bottom-300x250px', [300, 250], 'div-gpt-ad-1403198971774-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-Top-728x90', [728, 90], 'div-gpt-ad-1403199951031-2').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-Top-270x90', [270, 90], 'div-gpt-ad-1403223429448-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-Top-300x250px', [300, 250], 'div-gpt-ad-1403198971774-1').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-Bottom-728x90', [728, 90], 'div-gpt-ad-1403199951031-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-Left-160x600', [160, 600], 'div-gpt-ad-1403200779714-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-Right-160x600', [160, 600], 'div-gpt-ad-1403200779714-1').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-Middle-728x90', [728, 90], 'div-gpt-ad-1403199951031-1').addService(googletag.pubads());
googletag.defineSlot('/11648707/120x600-Top', [120, 600], 'div-gpt-ad-1403371468819-0').addService(googletag.pubads());
/* botones 1-5 sidebar slots */
googletag.defineSlot('/11648707/Portada-boton-1-300x120', [300, 120], 'div-gpt-ad-1403222233029-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-2-300x120', [300, 120], 'div-gpt-ad-1403222233029-1').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-3-300x120', [300, 120], 'div-gpt-ad-1403222233029-2').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-4-300x120', [300, 120], 'div-gpt-ad-1403222233029-3').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-5-300x120', [300, 120], 'div-gpt-ad-1403222233029-4').addService(googletag.pubads());
googletag.pubads().enableSyncRendering();
googletag.enableServices();
</script>

<?php
global  $wpdb; $user_id = get_current_user_id(); $qry = "SELECT identifier, websiteurl, email FROM `wp_2_wslusersprofiles` WHERE user_id = '$user_id' && provider = 'Google' && identifier IS NOT NULL && websiteurl = 'http://doap.com'"; $avalidgoogleid = $wpdb->get_results( $qry ); foreach ( $avalidgoogleid as $avalidgoogleid ) { $gid = $avalidgoogleid ->identifier; $uemail  = $avalidgoogleid ->email; $websiteurl = $avalidgoogleid ->websiteurl; }
?>

<?php
if ($gid > 10000000 )  {
        include(STYLESHEETPATH . '/page-wing-ads-loggedin.php');
        include(STYLESHEETPATH . '/backpages-top-loggedin.php');
} else {
        include(STYLESHEETPATH . '/page-wing-ads.php');
        include(STYLESHEETPATH . '/banner-ad-widget-728x90-caricaturas.php');
        include(STYLESHEETPATH . '/banner-ad-widget-270x90-caricaturas.php');
}

?>

<?php
responsive_wrapper(); // before wrapper container hook 
echo '<div id="wrapper" class="clearfix">';
responsive_wrapper_top(); // before wrapper content hook 
responsive_in_wrapper(); // wrapper hook 

echo '<div id="content-archive" style="margin-top:4px;" class="' . implode( ' ', responsive_get_content_classes() ) . '">';


$max_posts = 9;
//$category = get_the_category(); 
$themaincat = 1672; 
$single_cat_title = 'Caricaturas';
$single_cat_url = strtolower(str_replace(' ', '-', $single_cat_title)); 
$sub_cat_title = 'OTRAS CARICATURAS';
$slider_posts = 4;
$car_posts = 6;
$posts_offset = $slider_posts + $car_posts;
$args = array(
	'posts_per_page'   => $posts_offset,
	'offset'           => 0,
	'cat'         	   => $themaincat,
	'orderby'          => 'post_date',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'post',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'post_status'      => 'publish',
	'update_post_term_cache' => false,
	'date_query' => array(
		array(
		'column' => 'post_date',
		'after' => '1 month ago'
		)
	),
	'suppress_filters' => true );
$first_posts = get_posts( $args );
foreach ($first_posts as $post)
{
setup_postdata($post);
$feat_post[] = $post->ID;
}
//echo do_shortcode('[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://www.laprensa.com.ni/'.strtolower($single_cat_title).'/"><div class="title-left">'.mb_strtoupper($single_cat_title).'</div><div class="twodots"></div></a>[/doap_heading]'); 
echo do_shortcode('[doap_animate type="fadeIn"][doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://www.laprensa.com.ni/'.$single_cat_url.'"><div class="title-left">'.mb_strtoupper($single_cat_title).'</div><div class="line-container"><div class="line"></div></div></a>[/doap_heading][/doap_animate]');


if ( $paged < 2 )
{
echo do_shortcode('[doap_slider source="category: '.$themaincat.'" limit="' . $slider_posts . '" width="640" height="360" link="post" speed="500"  autoplay="8000" mousewheel="no" pages="no" class="deportes-slider"]');
echo do_shortcode('[doap_cat_carousel source="category: 1672" limit="' . $car_posts . '" link="post" width="720" height="160" mousewheel="no" autoplay="0" speed="500" offset="4" class="carousel-caricaturas"]');
}
$even = 0;

include(STYLESHEETPATH . '/templates/car-posts.php');
?>

</div><!-- end of #content-archive -->


<?php //my_pagination();
 ?>
<?php get_sidebar('caricaturas'); ?>

<div class="home-728x90" style="margin-left:135px;">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-6970273280466483";
/* nica-728x90banner */
google_ad_slot = "4717436669";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>

<?php echo do_shortcode('[doap_divider text="Volver a la parte superior de la página"]'); ?>
<?php //echo do_shortcode('[xyz-ips snippet="promociones-video-widget"]'); ?>
<?php get_footer(); ?>
