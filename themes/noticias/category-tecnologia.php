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
/* tecnologia slots */
googletag.defineSlot('/11648707/Tecnologia-bottom-728x90px', [728, 90], 'div-gpt-ad-1403214977765-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Tecnologia-Top-728x90px', [728, 90], 'div-gpt-ad-1403214977765-6').addService(googletag.pubads());
googletag.defineSlot('/11648707/Tecnologia-Top-270x90', [270, 90], 'div-gpt-ad-1403214977765-4').addService(googletag.pubads());
googletag.defineSlot('/11648707/Tecnologia-Left-160x600px', [160, 600], 'div-gpt-ad-1403214977765-1').addService(googletag.pubads()); 
googletag.defineSlot('/11648707/Tecnologia-Right-160x600px', [160, 600], 'div-gpt-ad-1403214977765-2').addService(googletag.pubads());
googletag.defineSlot('/11648707/Tecnologia-Top-300x250px', [300, 250], 'div-gpt-ad-1403214977765-5').addService(googletag.pubads());
googletag.defineSlot('/11648707/Tecnologia-Sidebar-300x250px', [300, 250], 'div-gpt-ad-1403214977765-3').addService(googletag.pubads());

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
        include(STYLESHEETPATH . '/page-wing-ads-tecnologia.php');
        include(STYLESHEETPATH . '/banner-ad-widget-tecnologia-728x90.php');
        include(STYLESHEETPATH . '/banner-ad-widget-tecnologia-270x90.php');
}            

responsive_wrapper(); // before wrapper container hook 
echo '<div id="wrapper" class="clearfix">';
responsive_wrapper_top(); // before wrapper content hook 
responsive_in_wrapper(); // wrapper hook 
echo '<div id="content-archive" style="margin-top:4px;" class="' . implode( ' ', responsive_get_content_classes() ) . '">';
$category = get_the_category(); 
$themaincat = 991;
$single_cat_title = "Tecnologia";
$slider_posts = 4;
$cat_carousel_posts = 6;
$left_300_story = 1;
$offset = $slider_posts + $cat_carousel_posts;
$max_posts = 4;
$mini_post = 4;
//include(STYLESHEETPATH . '/edicion-code.php');
 $monthnum = get_query_var('monthnum'); $day_of_month = get_query_var('day'); $_year = get_query_var('year'); $archive_month = $monthnum; $archive_day = $day_of_month; $archive_year  = $_year;
$adate = $day_of_month.'-'.$monthnum.'-'.$_year;
$timestamp = strtotime($adate);
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
//echo do_shortcode('[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://www.laprensa.com.ni/nacionales/"><div class="title-left">NACIONALES</div><div class="line-container"><div class="line"></div></div></a>[/doap_heading]');
echo do_shortcode('[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://www.laprensa.com.ni/'.strtolower($single_cat_title).'/"><div class="title-left">'.mb_strtoupper($single_cat_title).'</div><div class="line-container"><div class="line"></div></div></a>[/doap_heading]'); 
}

//include(STYLESHEETPATH . '/edicion-buttons.php');
include(STYLESHEETPATH . '/edicion-code.php');

echo do_shortcode('[doap_slider source="category: '.$themaincat.'" limit="' . $slider_posts . '" width="640" height="360" link="post" mousewheel="no" pages="no" class="deportes-slider" meta="notbreves"]');
echo do_shortcode('[doap_cat_carousel source="category: '.$themaincat.'" limit="' . $cat_carousel_posts . '" link="post" width="900" height="300" autoplay="0" class="carousel-shawn" meta="notbreves" offset="4"]'); 
$even = 0; 
global $wp_query;
$args = array_merge( $wp_query->query_vars, array( 'cat' => $themaincat, 'offset' => $offset, 'post__not_in' => $feat_post, 'date_query' => array(array('column' => 'post_date', 'after' => $last_month, 'before' => $page_date))) );
unset($args['year']);
unset($args['monthnum']);
unset($args['day']);
add_filter('posts_clauses', 'filterEdiciones');
add_filter('posts_clauses', 'filterNoBreves');
$the_query = new WP_Query( $args );
//var_dump($the_query);
$even = 0; 
if( $the_query->have_posts() ) 
{
	//get_template_part( 'deportes-loop-header' ); 
	while( $the_query->have_posts() && $even < $max_posts )
	{ 
		$the_query->the_post();
		$even++;
		$float='left';
		if ($even == 1)
		{
			echo '<div style="clear:both;"></div>';
			echo '<div style="margin:0px auto 0px auto;width:300px;position:relative;float:left;">';
			if ($gid > 10000000)  { include(STYLESHEETPATH . '/middle-300x250-loggedin.php'); } else { include(STYLESHEETPATH . '/ad-300x250-category-page-center-tecnologia.php'); echo ""; }
			//include(STYLESHEETPATH . '/ad-300x250-category-page-center.php');
			echo '</div>';
			$max_width = 'width:350px;';
		}
		if ($even % 2 == 0) {
		//  $float='right';
		}
		else
		{
			$float='left';
			//:	echo '<div style="clear:both;"></div>';
			if ($even == 5)
			{
				echo '<div style="width:50%;position:relative;float:left;">';
				include(STYLESHEETPATH . '/ad-300x250-category-page-center.php');
				echo '</div>';
				$even++;
			//		$float='right';
			}
		} 
		if ($even == $left_300_story || $even == $mini_post)
		{
			if ($even == $left_300_story)
			{
				include(STYLESHEETPATH . '/templates/left_300.php');
				echo '<div style="height:20px;clear:both;"></div>';
			}
			else
			{
				echo '<div style="height:10px;clear:both;"></div>';
				$exp_words = 200;
				$extract_chars = 200;
				include(STYLESHEETPATH . '/templates/cat-mini.php');
			}	
		}
		else
		{
			$show_img = 1;	
			$max_width = ($even > 1 && $even < 4) ? 'width:330px;' : 'width:100%;';
			$float = ($even == 3) ? 'float:right;' : 'float:left;';
			$float_class = ($even == 3) ? 'class="su-post float_right"' : 'class="su-post float_left"';
			include(STYLESHEETPATH . '/templates/normal.php');
			responsive_entry_after(); 
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
</div><!-- end of #content-archive -->
<?php 
get_sidebar('tecnologia'); 
echo do_shortcode('[doap_divider text="Volver a la parte superior de la página"]'); 
if ($gid > 10000000)  { include(STYLESHEETPATH . '/bottom-ads-loggedin.php'); } else { include(STYLESHEETPATH . '/banner-ad-widget-tecnologia-bottom-728x90.php'); echo ""; } 
//echo do_shortcode('[xyz-ips snippet="promociones-video-widget"]'); 
get_footer();
?>
