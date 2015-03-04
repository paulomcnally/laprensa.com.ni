<?php
/**
 * @package DevOps_and_Platforms
 * @version 1.0
 */
/*
Plugin Name: Top Ten Popular Daily
Plugin URI: http://wordpress.org/extend/plugins/devops_and_platforms/
Description: Adds a top-ten-popular-daily shortcode to be used in various sidebars. Usage is [top-ten-popular-daily].  Enjoy!  DevOps and Platforms is a modern web hosting platform that allows you to easily launch websites into the cloud.  Your pages will automatically be served from <cite>2</cite> datacenters.  For more information about doap.com or help with setting up your free site, drop a line to <a href="mailto:info@doap.com">info@doap.com</a>

Author: David Menache, Shawn Crowe
Version: 1.0
Author URI: http://doap.com/
*/

// This just echoes the chosen line, we'll position it later
/*
[doap_posts template='templates/list-loop.php' posts_per_page='10' tax_term='3518,1673,17,31,22,3,21,25763,10,3519,27,991' tax_operator='0' offset='0' order='desc' post_parent=' ' ignore_sticky_posts='yes']
*/
function toptenpopulardaily() {

//$stuff = tptn_pop_posts( 'daily=1&is_widget=1' );
$ultima_hora = file_get_contents('/srv/www/uploads/common/ml-uh-content.php');
$mas_leida =  file_get_contents('/srv/www/uploads/common/top-10-content.php');
//echo $stuff;
echo "<p>";
echo do_shortcode("[doap_tabs style='modern-light']
[doap_tab title='Noticias más leídas'][doap_box title='Noticias más leídas' style='soft' box_color='#eee' title_color='#369' radius='0' class='ml-ul-sidebar']

$mas_leida 

[/doap_box]
[/doap_tab]

[doap_tab title='Últimas noticias']
[doap_box title='Últimas noticias' style='soft' box_color='#eee' title_color='#369' radius='0' class='ml-ul-sidebar']
$ultima_hora
[/doap_box]
[/doap_tab]
[/doap_tabs]
<style type='text/css'>
.ml-ul-sidebar .su-box-title {display:none}
</style>

");
add_filter('widget_text', 'do_shortcode');

//echo "Hello world";
//echo tptn_pop_posts( 'daily=0&is_widget=1' );

}

// Now we set that function up to execute when the admin_notices action is called
//add_action( 'admin_notices', 'youtube_live' );

// We need some CSS to position the paragraph
function toptenpopulardaily_css() {
        // This makes sure that the positioning is also good for right-to-left languages
        $x = is_rtl() ? 'left' : 'right';

        echo "
        <style type='text/css'>
        #dolly {
                float: $x;
        }
	.ml-ul-sidebar .su-box-title {display:none}
        </style>
        ";
}

add_shortcode('top-ten-popular-daily', 'toptenpopulardaily'); 
// and to make sure Wordpress calls shortcode in sidebars

//add_action( 'widget_text', 'toptenpopulardaily_css' );

?>
