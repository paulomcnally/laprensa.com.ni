<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Header Template
 *
 *
 * @file           header.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.3
 * @filesource     wp-content/themes/responsive/header.php
 * @link           http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
 * @since          available since Release 1.0
 */
?>
	<!doctype html>
	<!--[if !IE]>
	<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 7 ]>
	<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 8 ]>
	<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
	<!--[if IE 9 ]>
	<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
	<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title><?php wp_title( '&#124;', true, 'right' ); ?></title>

		<link rel="profile" href="http://gmpg.org/xfn/11"/>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
		<?php wp_head(); 
?>
<style>
@import url("http://noticias.laprensa.com.ni/wp-content/themes/noticias/lptv.css");
</style>
<script type='text/javascript'>
var googletag = googletag || {};
googletag.cmd = googletag.cmd || [];
(function() {
var gads = document.createElement('script');
gads.async = true;
gads.type = 'text/javascript';
var useSSL = 'https:' == document.location.protocol;
gads.src = (useSSL ? 'https:' : 'http:') + 
'//www.googletagservices.com/tag/js/gpt.js';
var node = document.getElementsByTagName('script')[0];
node.parentNode.insertBefore(gads, node);
})();
</script>

<script type='text/javascript'>
var googletag = googletag || {};
googletag.cmd = googletag.cmd || [];
(function() {
var gads = document.createElement('script');
gads.async = true;
gads.type = 'text/javascript';
var useSSL = 'https:' == document.location.protocol;
gads.src = (useSSL ? 'https:' : 'http:') + 
'//www.googletagservices.com/tag/js/gpt.js';
var node = document.getElementsByTagName('script')[0];
node.parentNode.insertBefore(gads, node);
})();
</script>

<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/11648707/LA_PRENSA_Portada_728x90_Superior', [728, 90], 'div-gpt-ad-1399587327178-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-1-300x120', [300, 120], 'div-gpt-ad-1401731199610-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-2-300x120', [300, 120], 'div-gpt-ad-1402093870333-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-3-300x120', [300, 120], 'div-gpt-ad-1401731199610-2').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-4-300x120', [300, 120], 'div-gpt-ad-1401731199610-3').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-5-300x120', [300, 120], 'div-gpt-ad-1401731199610-4').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-superior-270x90', [270, 90], 'div-gpt-ad-1401914647182-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/LP_Portada_banner2(160x600)', [160, 600], 'div-gpt-ad-1401915918564-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-1-468x60', [468, 60], 'div-gpt-ad-1401922950703-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-2-468x60', [468, 60], 'div-gpt-ad-1401922950703-1').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-1-120x240', [120, 240], 'div-gpt-ad-1401923467776-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-Robapagina-inferior-300x250', [300, 250], 'div-gpt-ad-1402091032981-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-horizontal-2-728x90', [728, 90], 'div-gpt-ad-1402091652055-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-horizontal-2-728x90', [728, 90], 'div-gpt-ad-1402091929548-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-Robapagina-superior-300x250', [300, 250], 'div-gpt-ad-1402513023857-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-1-468x60', [468, 60], 'div-gpt-ad-1402513912207-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-Vertical-Medio-120x600', [120, 600], 'div-gpt-ad-1402514617244-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=575533352514814&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=171629476284827&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type='text/javascript'>
jQuery(document).ready(function() {
    jQuery('.archivo_fecha').datepicker({
        dateFormat : 'mm-dd-yy'
    });
});

</script>

<script type="text/javascript">//<![CDATA[ 
$(window).load(function(){
$(function() {

    $('#txtDate').datepicker({
        buttonImage: 'http://noticias.laprensa.com.ni/wp-content/uploads/sites/2/2014/06/calendar.png',
        buttonImageOnly: true,
        showOn: 'button',
        onClose: function(dateText, inst) {
            $('#year').val(dateText.split('/')[2]);
            $('#month').val(dateText.split('/')[0]);
            $('#day').val(dateText.split('/')[1]);
        }
    });
});
});//]]>  

</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48778088-1', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>

<!-- Start Alexa Certify Javascript -->
<script type="text/javascript" src="https://d31qbv1cthcecs.cloudfront.net/atrk.js"></script><script type="text/javascript">_atrk_opts = { atrk_acct: "aIBjg1aAQ700U2", domain:"laprensa.com.ni"}; atrk ();
</script>
<noscript>
<img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=aIBjg1aAQ700U2" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->

	</head>

<body <?php body_class(); ?>>
<?php include(STYLESHEETPATH . '/analyticstracking.php'); ?>

<div id="lptv-top-bar">
<?php
/* if( has_nav_menu( 'top-menu', 'responsive' ) ) { ?>
    <?php wp_nav_menu( array(
                           'container'      => 'div',
                           'container_id'   => 'top-menu-container',
                           'fallback_cb'    => false,
                           'menu_class'     => 'top-menu',
                           'theme_location' => 'top-menu'
                       )
    );
    ?>
<?php } ?>
<?php //get_sidebar( 'top-bar' );
<div id="top-bar-container">
</div>
*/
 ?>







<?php responsive_header(); // before header hook ?>
	<div id="header" style="margin-top:0px;">

		<?php responsive_header_top(); // before header content hook ?>

		<?php responsive_in_header(); // header hook ?>

		<?php /* //if( get_header_image() != '' ) : ?>

			<div id="logo">
				<a href="<?php echo home_url( '/' ); ?>"><img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
			</div><!-- end of #logo -->

		<?php //endif; // header image was removed ?>

		<?php if( !get_header_image() ) : ?>

			<div id="logo">
				<span class="site-name"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
				<span class="site-description"><?php bloginfo( 'description' ); ?></span>
			</div><!-- end of #logo -->

		<?php endif; */ // header image was removed (again) ?>
<div style="border:1px;position:relative;margin-left:auto;margin-right:auto;margin-left:15%">
<div id="lptv-logo" style="max-width:200px;z-index:1000;position:relative;float:left;">
                        <a href=/lptv><img class="thumbnail" src="http://laprensa13.doap.us/wp-content/uploads/sites/2/2014/06/lptv-header-logo.png" style="max-width:200px;" alt=""></a>
</div>
<div id="lptv-search" style="position:relative;float:left;">
		<?php
include(STYLESHEETPATH . '/searchformlptv.php');
echo '</div>';
echo '<div id="lptv-social" style="left:40px;position:relative;float:left;z-index:10;">';
 //get_sidebar( 'top' ); 
include(STYLESHEETPATH . '/icons.php');
?>
		<?php
echo '</div></div>';
/*
 wp_nav_menu( array(
							   'container'       => 'div',
							   'container_class' => 'main-nav',
							   'fallback_cb'     => 'responsive_fallback_menu',
							   'theme_location'  => 'header-menu'
						   )
		);
		?>

		<?php if( 9 == 88 && has_nav_menu( 'sub-header-menu', 'responsive' ) ) { ?>
			<?php wp_nav_menu( array(
								   'container'      => '',
								   'menu_class'     => 'sub-header-menu',
								   'theme_location' => 'sub-header-menu'
							   )
			);
			?>
		<?php }
*/

 ?>

		<?php responsive_header_bottom(); // after header content hook ?>

	</div><!-- end of #header -->
<?php responsive_header_end(); // after header container hook ?>
</div>
<div style="clear:both;"</div>
<?php responsive_wrapper(); // before wrapper container hook ?>
	<div id="wrapper" class="clearfix">
<?php responsive_wrapper_top(); // before wrapper content hook ?>
<?php responsive_in_wrapper(); // wrapper hook ?>
<?php responsive_container(); // before container hook ?>
<div id="container" class="hfeed">
