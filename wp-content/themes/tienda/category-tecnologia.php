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
    
/* tecnologia slots */
googletag.defineSlot('/11648707/Tecnologia-bottom-728x90px', [728, 90], 'div-gpt-ad-1403214977765-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Tecnologia-Top-728x90px', [728, 90], 'div-gpt-ad-1403214977765-6').addService(googletag.pubads());
googletag.defineSlot('/11648707/Tecnologia-Top-270x90', [270, 90], 'div-gpt-ad-1403214977765-4').addService(googletag.pubads());
googletag.defineSlot('/11648707/Tecnologia-Left-160x600px', [160, 600], 'div-gpt-ad-1403214977765-1').addService(googletag.pubads()); 
googletag.defineSlot('/11648707/Tecnologia-Right-160x600px', [160, 600], 'div-gpt-ad-1403214977765-2').addService(googletag.pubads());
googletag.defineSlot('/11648707/Tecnologia-Top-300x250px', [300, 250], 'div-gpt-ad-1403214977765-5').addService(googletag.pubads());
googletag.defineSlot('/11648707/Tecnologia-Sidebar-300x250px', [300, 250], 'div-gpt-ad-1403214977765-3').addService(googletag.pubads());

googletag.pubads().enableSingleRequest();
googletag.enableServices(); 
});      
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
echo do_shortcode('[doap_slider source="category: '.$themaincat.'" limit="' . $slider_posts . '" width="640" height="360" link="post" mousewheel="no" pages="no" class="deportes-slider" meta="notbreves"]');
echo do_shortcode('[doap_cat_carousel source="category: '.$themaincat.'" limit="' . $cat_carousel_posts . '" link="post" width="900" height="300" autoplay="0" class="carousel-shawn" meta="notbreves" offset="4"]'); 
$even = 0; 
global $wp_query;
$args = array_merge( $wp_query->query_vars, array( 'cat' => $themaincat, 'offset' => $offset, 'post__not_in' => $feat_post ) );
add_filter('posts_clauses', 'filterEdiciones');
add_filter('posts_clauses', 'filterNoBreves');
$the_query = new WP_Query( $args );
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
			//include('/var/www/html/lpmu/wp-content/themes/noticias' . '/ad-300x250-category-page-center.php');
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
				include('/var/www/html/lpmu/wp-content/themes/noticias' . '/ad-300x250-category-page-center.php');
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
