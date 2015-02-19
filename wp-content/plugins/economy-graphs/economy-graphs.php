<?php
/**
 * @package DevOps_and_Platforms
 * @version 1.0
 */
/*
Plugin Name: Economy Graphs Shortcode 
Plugin URI: http://wordpress.org/extend/plugins/devops_and_platforms/
Description: Adds an economy-graph shortcode to be used in the main area of the economia page. Usage is [economy-graphs].  Enjoy!  DevOps and Platforms is a modern web hosting platform that allows you to easily launch websites into the cloud.  Your pages will automatically be served from <cite>2</cite> datacenters.  For more information about doap.com or help with setting up your free site, drop a line to <a href="mailto:info@doap.com">info@doap.com</a>

Author: David Menache, Shawn Crowe
Version: 1.0
Author URI: http://doap.com/
*/

// This just echoes the chosen line, we'll position it later
function economygraphs() {

//echo do_shortcode('<div id=youtubelive-homepage-widget>[doap_animate type="fadeIn"][doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://www.laprensa.com.ni/lptv"><div class="title-left" style="font-color:red">YOUTUBE EN VIVO</div><div class="line"><div class="line-container"></div></div></a>[/doap_heading][/doap_animate] <iframe style="min-height:350px;max-height:360px;" width="640" height="360" src="//www.youtube.com/embed/videoseries?list=PLLSDIHSJqOp3m2_cg5-EHQ-SZHoiWtbWA?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe> </div>');
//echo "Hello world";


echo do_shortcode('<div style="max-width:400px;position:relative;float:right;margin-right:10px;">[doap_box title="Comportamiento de productos" style="modern-light"][doap_tabs style="modern-light" vertical="no" class="product-library"]<h2>Comportamiento de Productos</h2>

[doap_tabs class="my-custom-tabs"]
 [doap_tab title="Cacao"] <img src="https://docs.google.com/a/laprensa.com.ni/spreadsheets/d/1pCMqoTNhIawmEj66dUw5TD89nyShq2bde71HZpd4czE/embed/oimg?id=1pCMqoTNhIawmEj66dUw5TD89nyShq2bde71HZpd4czE&oid=1376865016&zx=mopb40n3rq0f" /> [/doap_tab]
 [doap_tab title="Café"] <img src="https://docs.google.com/a/doap.com/spreadsheets/d/1pCMqoTNhIawmEj66dUw5TD89nyShq2bde71HZpd4czE/embed/oimg?id=1pCMqoTNhIawmEj66dUw5TD89nyShq2bde71HZpd4czE&oid=68452122&zx=hvl85o188fhr" /> [/doap_tab]
 [doap_tab title="Plata"]<img src="https://docs.google.com/a/doap.com/spreadsheets/d/1pCMqoTNhIawmEj66dUw5TD89nyShq2bde71HZpd4czE/embed/oimg?id=1pCMqoTNhIawmEj66dUw5TD89nyShq2bde71HZpd4czE&oid=68223349&zx=b6dsjd1vzg88" /> [/doap_tab]
 [doap_tab title="Oro"] <img src="https://docs.google.com/a/doap.com/spreadsheets/d/1pCMqoTNhIawmEj66dUw5TD89nyShq2bde71HZpd4czE/embed/oimg?id=1pCMqoTNhIawmEj66dUw5TD89nyShq2bde71HZpd4czE&oid=995122031&zx=57infx1xxqbi" /> [/doap_tab]
[/doap_tabs] 

<!--
 IMPORTANT
 You need to add this CSS code to the custom CSS editor at plugin settings page
-->
<style>
 .su-tabs.my-custom-tabs { background-color: #606060 }
 .su-tabs.my-custom-tabs .su-tabs-nav span { font-size: 1.3em }
 .su-tabs.my-custom-tabs .su-tabs-nav span.su-tabs-current { background-color: #909090 }
 .su-tabs.my-custom-tabs .su-tabs-pane {
 padding: 1em;
 font-size: 1.3em;
 background-color: #eee;
 }
</style>




[doap_tabs style="modern-light"]

 [doap_tab title="Azúcar"] <img src="https://docs.google.com/a/doap.com/spreadsheets/d/1pCMqoTNhIawmEj66dUw5TD89nyShq2bde71HZpd4czE/embed/oimg?id=1pCMqoTNhIawmEj66dUw5TD89nyShq2bde71HZpd4czE&oid=388809584&zx=1a9lkaql0wxh" /> [/doap_tab]
 [doap_tab title="Arroz"] <img src="https://docs.google.com/a/doap.com/spreadsheets/d/1pCMqoTNhIawmEj66dUw5TD89nyShq2bde71HZpd4czE/embed/oimg?id=1pCMqoTNhIawmEj66dUw5TD89nyShq2bde71HZpd4czE&oid=506493453&zx=dmxuzyhbh2la" /> [/doap_tab]
 [doap_tab title="Petróleo"] <img src="https://docs.google.com/a/doap.com/spreadsheets/d/1pCMqoTNhIawmEj66dUw5TD89nyShq2bde71HZpd4czE/embed/oimg?id=1pCMqoTNhIawmEj66dUw5TD89nyShq2bde71HZpd4czE&oid=441848344&zx=10sb305nax85" /> [/doap_tab]
 [doap_tab title="Algodón"] <img src="https://docs.google.com/a/doap.com/spreadsheets/d/1pCMqoTNhIawmEj66dUw5TD89nyShq2bde71HZpd4czE/embed/oimg?id=1pCMqoTNhIawmEj66dUw5TD89nyShq2bde71HZpd4czE&oid=169167546&zx=ar84djtpvaue" /> [/doap_tab]

[/doap_tabs][/doap_box]</div>
');

add_filter('widget_text', 'do_shortcode');



//echo do_shortcode('[doap_box title="Comportamiento de productos" style="modern-light"] [xyz-ips snippet="comportamiento-de-productos-1"] [xyz-ips snippet="comportamiento-de-productos-2"] [/doap_box]');

}

// Now we set that function up to execute when the admin_notices action is called
//add_action( 'admin_notices', 'youtube_live' );

// We need some CSS to position the paragraph
function economygraphs_css() {
        // This makes sure that the positioning is also good for right-to-left languages
        $x = is_rtl() ? 'left' : 'right';

        echo "
        <style type='text/css'>
        #dolly {
                float: $x;
        }
        </style>
        ";
}

add_shortcode('economy-graphs', 'economygraphs'); 
// and to make sure Wordpress calls shortcode in sidebars

//add_action( 'widget_text', 'economygraphs_css' );

?>
