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
$monthnum = get_query_var('monthnum'); $day_of_month = get_query_var('day'); $_year = get_query_var('year'); $archive_month = $monthnum; $archive_day = $day_of_month; $archive_year  = $_year;
$adate = $day_of_month.'-'.$monthnum.'-'.$_year;
$today = date("Y-m-d");
if ( $adate == '0-0-0')
{
        $page_date = $today;
}
else
{
        $page_date = $adate;
}
$last_month = date("Y-m-d", strtotime($page_date . "- 1 month"));
$timestamp = strtotime($adate);
//echo ' page date ' . $page_date . 'monthnum = ' . $monthnum . 'adate ' . $adate;
?>
<style>
.su-post-meta { font-size:.8em;position:relative;float:left;height:295px;width:178px; }
.nos_carousel_title a {color: #de579a;}
</style>
<script type='text/javascript'>
/* nosotras slots */
googletag.defineSlot('/11648707/Nosotras-Left-160x600px', [160, 600], 'div-gpt-ad-1403217113344-1').addService(googletag.pubads());
googletag.defineSlot('/11648707/Nosotras-Right-160x600px', [160, 600], 'div-gpt-ad-1403217113344-2').addService(googletag.pubads());
googletag.defineSlot('/11648707/Nosotras-Top-728x90px', [728, 90], 'div-gpt-ad-1403217113344-6').addService(googletag.pubads());
googletag.defineSlot('/11648707/Nosotras-bottom-728x90px', [728, 90], 'div-gpt-ad-1403217113344-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Nosotras-Top-270x90', [270, 90], 'div-gpt-ad-1403217113344-4').addService(googletag.pubads());
googletag.defineSlot('/11648707/Nosotras-Sidebar-300x250px', [300, 250], 'div-gpt-ad-1403217113344-3').addService(googletag.pubads());
googletag.defineSlot('/11648707/Nosotras-Top-300x250px', [300, 250], 'div-gpt-ad-1403217113344-5').addService(googletag.pubads())

googletag.pubads().enableSyncRendering();
googletag.pubads().enableSingleRequest();
googletag.enableServices(); 
</script>


<?php
global  $wpdb; $user_id = get_current_user_id(); $qry = "SELECT identifier, websiteurl, email FROM `wp_2_wslusersprofiles` WHERE user_id = '$user_id' && provider = 'Google' && identifier IS NOT NULL && websiteurl = 'http://doap.com'"; $avalidgoogleid = $wpdb->get_results( $qry ); foreach ( $avalidgoogleid as $avalidgoogleid ) { $gid = $avalidgoogleid ->identifier; $uemail  = $avalidgoogleid ->email; $websiteurl = $avalidgoogleid ->websiteurl; }
if ($gid > 10000000 )  { 
        include(STYLESHEETPATH . '/page-wing-ads-loggedin.php');
        include(STYLESHEETPATH . '/backpages-top-loggedin.php');
} else {  
        include(STYLESHEETPATH . '/page-wing-ads-nosotras.php');
        include(STYLESHEETPATH . '/banner-ad-widget-nosotras-728x90.php');
        include(STYLESHEETPATH . '/banner-ad-widget-nosotras-270x90.php');
}            
?>
<?php responsive_wrapper(); // before wrapper container hook ?>
        <div id="wrapper" class="clearfix">
<?php responsive_wrapper_top(); // before wrapper content hook ?>
<?php responsive_in_wrapper(); // wrapper hook ?>
<?php
echo '<div id="content-archive" style="margin-top:4px;" class="' . implode( ' ', responsive_get_content_classes() ) . '">';
$category = get_the_category(); 
$themaincat = 25763;
$single_cat_title = "Nosotros";
global $wp_query;
add_filter('posts_clauses', 'filterEdiciones');
add_filter('posts_clauses', 'filterNoBreves');
echo '<div style="width:100%;min-width:642px;">';

//$monthnum = get_query_var('monthnum'); $day_of_month = get_query_var('day'); $_year = get_query_var('year'); $archive_month = $monthnum; $archive_day = $day_of_month; $archive_year  = $_year;
//$adate = $day_of_month.'-'.$monthnum.'-'.$_year;
//$timestamp = strtotime($adate);
//echo $timestamp;

date_default_timezone_set("America/Managua");
//echo date_default_timezone_get();
ini_set('default_charset', 'utf-8');
header('Content-Type: text/html; charset=utf-8' );
$x = time();
$oldLocale = setlocale(LC_TIME, 'es_ES.UTF-8');
//echo "<div charset=utf-8 "."id=header-date".">".ucwords(strftime("%A %d %B %Y", $timestamp))."</div>";
$archive_date = ucwords(strftime("%A %d %B %Y", $timestamp));
setlocale(LC_TIME, $oldLocale);



if ( $_GET['archive_page'] == 1) {
echo do_shortcode('[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://www.laprensa.com.ni/'.strtolower($single_cat_title).'/" title="Use los botones de abajo para navegar por las categorías para este día en la historia."><div class="title-left">'.mb_strtoupper($single_cat_title).': '.$archive_date.'</div><div class="line-container"><div class="line"></div></div></a>[/doap_heading]');
} else {
//echo do_shortcode('[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://www.laprensa.com.ni/'.strtolower($single_cat_title).'/"><div class="title-left">'.mb_strtoupper($single_cat_title).'</div><div class="line-container"><div class="line"></div></div></a>[/doap_heading]'); 
}

//include(STYLESHEETPATH . '/edicion-buttons.php');
include(STYLESHEETPATH . '/edicion-code.php');

//include(STYLESHEETPATH . '/edicion-code.php');

echo do_shortcode('<div style="width:431px;height:250px;position:relative;float:left;">[doap_nos_carousel source="category: 25763" limit="5" items="1" offset="4" link="post" width="431" height="250" responsive="yes" mousewheel="no" autoplay="0" meta="nosotras"]</div>');
//echo do_shortcode('[xyz-ips snippet="nosotras-home-menu"]');
//echo do_shortcode('
?>

<div style="min-width:229px;position:relative;float:right;height:246px;border:1px solid #606060;background-color:#dd579a;color:#fff;width:229px;font-family:StagSansBook;padding-right:8px;">
<img class="thumbnail" src="http://www.laprensa.com.ni/wp-content/uploads/sites/2/2014/07/logonosotras2.svg" style="max-width:229px;" alt="">
<div style="width:100%;padding:8px;font-family:StagBook;">
<?php
$args = array( 'category__in' => 63770, 'posts_per_page' => 1, 'date_query' => array(array('column' => 'post_date', 'after' => $last_month, 'before' => $page_date)) );
$the_query = new WP_Query( $args );
include(STYLESHEETPATH . '/templates/nosotras-edicion.php');
//echo do_shortcode('[doap_posts template="templates/nosotras-edicion.php" posts_per_page="1" tax_term="63770" tax_operator="0" author="122,123,1,124,102,108,113,114,116,117,121,126,103,127,111,118,125,112,110,107,115,120,106,104,105,119,109" order="desc" post_parent=" " ignore_sticky_posts="yes"]');
?>
</div>
</div>

<?php
echo "</div>";
echo '<div style="clear:both;"></div>';
$args = array( 'category__in' => 25763, 'posts_per_page' => 1, 'date_query' => array(array('column' => 'post_date', 'after' => $last_month, 'before' => $page_date)) );
add_filter('posts_clauses', 'filterEdiciones');
$the_query = new WP_Query( $args );
include(STYLESHEETPATH . '/templates/nos-box-loop-2.php');
//echo do_shortcode('[doap_posts template="templates/box-loop-aqn-2.php" posts_per_page="1" tax_term="25763" tax_operator="0" author="122,123,1,124,102,108,113,114,116,117,121,126,103,111,118,125,112,110,107,115,120,106,104,105,119,109" order="desc" post_parent=" " ignore_sticky_posts="yes"]');

?>

<div style="position:relative;float:right;margin-top:20px;">
<?php if ($gid > 10000000)  { include(STYLESHEETPATH . '/middle-300x250-loggedin.php'); } else { include(STYLESHEETPATH . '/ad-300x250-category-page-center-nosotras.php'); echo ""; } ?>
 </div>
<?php 
echo '<div style="clear:both;"></div><div class="su-row"><div class="su-column su-column-size-1-3">';
$args = array( 'category__in' => 25763, 'posts_per_page' => 2, 'post__not_in' => $feat_post, 'offset' => 1, 'date_query' => array(array('column' => 'post_date', 'after' => $last_month, 'before' => $page_date)) );
add_filter('posts_clauses', 'filterEdiciones');
$the_query = new WP_Query( $args );
include(STYLESHEETPATH . '/templates/nos-loop-220x245.php');
/*
 [doap_posts template="templates/loop-220x245.php" posts_per_page="2" tax_term="25763" tax_operator="0" author="122,123,1,124,102,108,113,114,116,117,121,126,103,111,118,125,112,110,107,115,120,106,104,105,119,109" offset="6" order="desc" orderby="comment_count" post_parent=" " ignore_sticky_posts="yes"]
*/
echo '</div><div class="su-column su-column-size-2-3" style="margin-right:5px;">';
$args = array( 'category__in' => 64131, 'posts_per_page' => 1, 'post__not_in' => $feat_post, 'date_query' => array(array('column' => 'post_date', 'after' => $last_month, 'before' => $page_date)) );
$the_query = new WP_Query( $args );
add_filter('posts_clauses', 'filterEdiciones');
include(STYLESHEETPATH . '/templates/nosotras-editorial-loop.php');
/*
[doap_spacer size="10"] [doap_posts template="templates/nosotras-editorial-loop.php" posts_per_page="1" tax_term="64131" tax_operator="0" author="122,123,1,124,102,108,113,114,116,117,121,126,103,111,118,125,112,110,107,115,120,106,104,105,119,109" order="desc" post_parent=" " ignore_sticky_posts="yes"]
*/
$args = array( 'category__in' => 64132, 'posts_per_page' => 1, 'post__not_in' => $feat_post, 'date_query' => array(array('column' => 'post_date', 'after' => $last_month, 'before' => $page_date)) );
add_filter('posts_clauses', 'filterEdiciones');
$the_query = new WP_Query( $args );
include(STYLESHEETPATH . '/templates/nosotras-editorial-loop2.php');
/*
 [doap_posts template="templates/nosotras-editorial-loop2.php" posts_per_page="1" tax_term="64132" tax_operator="0" author="122,123,1,124,102,108,113,114,116,117,121,126,103,111,118,125,112,110,107,115,120,106,104,105,119,109" order="desc" post_parent=" " ignore_sticky_posts="yes"] 
*/
$args = array( 'category__in' => 64133, 'posts_per_page' => 1, 'post__not_in' => $feat_post, 'date_query' => array(array('column' => 'post_date', 'after' => $last_month, 'before' => $page_date)) );
add_filter('posts_clauses', 'filterEdiciones');
$the_query = new WP_Query( $args );
include(STYLESHEETPATH . '/templates/nosotras-editorial-loop3.php');
/*
 [doap_posts template="templates/nosotras-editorial-loop3.php" posts_per_page="1" tax_term="64133" tax_operator="0" author="122,123,1,124,102,108,113,114,116,117,121,126,103,111,118,125,112,110,107,115,120,106,104,105,119,109" order="desc" post_parent=" " ignore_sticky_posts="yes"]
*/
echo '</div></div>';
$even = 0;
?>

</div><!-- end of #content-archive -->
<?php //my_pagination(); ?>
<?php get_sidebar(nosotras); ?>

<?php echo do_shortcode('[doap_divider text="Volver a la parte superior de la página"]'); ?>


<?php if ($gid > 10000000)  { include(STYLESHEETPATH . '/bottom-ads-loggedin.php'); } else { include(STYLESHEETPATH . '/banner-ad-widget-departamentales-bottom-728x90.php'); echo ""; } ?>


<?php //echo do_shortcode('[xyz-ips snippet="promociones-video-widget"]'); ?>
<?php get_footer(); ?>
