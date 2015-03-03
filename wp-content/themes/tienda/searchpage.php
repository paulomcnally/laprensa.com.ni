<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/*
Template Name: Search Page
*/

get_header(); ?>
<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach

$search = new WP_Query($search_query);
?>

<div class="limpiar" style="clear:both;">&nbsp;</div>
<script type='text/javascript'>
(function() {
var useSSL = 'https:' == document.location.protocol;
var src = (useSSL ? 'https:' : 'http:') +
'//www.googletagservices.com/tag/js/gpt.js';
document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
})();
</script>

<script type='text/javascript'>
googletag.defineSlot('/11648707/LP_Portada_banner2(160x600)', [160, 600], 'div-gpt-ad-1398207914431-0').addService(googletag.pubads());
googletag.pubads().enableSyncRendering();
googletag.pubads().enableSingleRequest();
googletag.enableServices();
</script>

<div id="leftad" class="banner_flotanteizq" style="float:left;margin-left:-169px;background-color:#369;height:600px;width:160px;top:0px;position:absolute;">
<div id='div-gpt-ad-1398207914431-0' style='width:160px; height:600px;'>
<script type='text/javascript'>
googletag.display('div-gpt-ad-1398207914431-0');
</script>
</div></div>

<div id="rightad" class="banner_flotanteizq" style="float:left;margin-left:1006px;background-color:#369;height:600px;width:160px;top:0px;position:absolute;"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Responsive caricaturas header -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6970273280466483"
     data-ad-slot="3397531465"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


</div>

<div id="content" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">
<?php
global $wp_query;
$total_results = $wp_query->found_posts;
?>
<?php get_search_form(); ?>


</div><!-- end of #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
