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
		<?php wp_head(); ?>
<script type='text/javascript'>
(function() {
    var useSSL = 'https:' == document.location.protocol;
    var src = (useSSL ? 'https:' : 'http:') +
        '//www.googletagservices.com/tag/js/gpt.js';
    document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
    })();
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
jQuery(window).load(function($){
$(function() {
    $('#txtDate').datepicker({
        buttonImage: 'http://www.laprensa.com.ni/wp-content/uploads/sites/2/2014/06/calendar.png',
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

<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"aIBjg1aAQ700U2", domain:"laprensa.com.ni",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=aIBjg1aAQ700U2" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->  


</head>

<body <?php body_class(); ?>>

<?php //include(STYLESHEETPATH . '/analyticstracking.php'); ?>

<div id="top-bar" style="background-color:#efefef;z-index:10000;">
<div id="sticky-top" style="max-height:40px;">
<div id="top-bar-container" style="background-color:#efefef;">
<?php if( has_nav_menu( 'top-menu', 'responsive' ) ) { ?>
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


<div style="max-width:250px;position:relative;float:left;left:-60px;top:-26px;" id="topsearchbox">
<div id="buscador">
<script>
  (function() {
    var cx = '015983338143239839958:fvdmc-jw398';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>

<style>
input, textarea {
padding: 0em 0em 0em;
}
</style>
<form action="/buscar" id="cse-search-box">
        <div>
          <input type="text" id="buscadorinput" name="q" style="position:relative;top:-3px;">
<button style="border:0;background-color:#efefef;padding:0;position:relative;top:5px;"><input type=image class="lp-sprite-v8searchboxbluebutton" style="border:0;background-color:#efefef;"></button>
        </div>
        </form>
<script type="text/javascript" src="http://www.google.com/cse/brand?form%3Dcse-search-box%26lang%3Des"></script></div></div>



<?php get_sidebar( 'top-bar' ); ?>
<div class="mobile-clear"></div></div>
<div id="topbarmenuline"></div>
</div>
<div style="clear:both;"></div>
<?php responsive_header(); // before header hook ?>
	<div id="header">
		<?php responsive_header_top(); // before header content hook ?>
		<?php responsive_in_header(); // header hook ?>
		<?php if( get_header_image() != '' ) : ?>
<div id="logo-social">
			<div id="logo">
				<a href="<?php echo home_url( '/' ); ?>"><img src="http://www.laprensa.com.ni/wp-content/uploads/sites/2/2014/09/laprensalogo7.png" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
			</div><div class="mobile-clear"></div><!-- end of #logo -->
		<?php endif; // header image was removed ?>
		<?php if( !get_header_image() ) : ?>
<div id="logo-social">
			<div id="logo">
				<span class="site-name"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
				<span class="site-description"><?php bloginfo( 'description' ); ?></span>
			</div><!-- end of #logo -->
		<?php endif; // header image was removed (again) ?>
		<?php get_sidebar( 'top' ); ?>
</div><div class="mobile-clear"></div>
<div id="main-nav-wrapper">
		<?php wp_nav_menu( array(
							   'container'       => 'div',
							   'container_class' => 'main-nav',
							   'fallback_cb'     => 'responsive_fallback_menu',
							   'theme_location'  => 'header-menu'
						   )
		);
		?>
</div>
<div id="sub-header-menu-wrapper">
		<?php if( has_nav_menu( 'sub-header-menu', 'responsive' ) ) { ?>
			<?php wp_nav_menu( array(
								   'container'      => '',
								   'menu_class'     => 'sub-header-menu',
								   'theme_location' => 'sub-header-menu'
							   )
			);
			?>
		<?php } ?>
</div>
		<?php responsive_header_bottom(); // after header content hook ?>
	</div><!-- end of #header -->
<?php responsive_header_end(); // after header container hook ?>
<div style="clear:both;"></div>
</div>
<?php responsive_container(); // before container hook ?>
<div id="container" class="hfeed">
<?php /* responsive_wrapper(); // before wrapper container hook ?>
	<div id="wrapper" class="clearfix">
<?php responsive_wrapper_top(); // before wrapper content hook ?>
<?php responsive_in_wrapper(); // wrapper hook */ ?>
