<?php
/**
 * @package DevOps_and_Platforms
 * @version 1.0
 */
/*
Plugin Name: Livestream Live Shortcode Plugin
Plugin URI: http://wordpress.org/extend/plugins/devops_and_platforms/
Description: Adds a livestream-live shortcode to be used in the main area of the home page. Usage is [livestream-live].  Enjoy!  DevOps and Platforms is a modern web hosting platform that allows you to easily launch websites into the cloud.  Your pages will automatically be served from <cite>2</cite> datacenters.  For more information about doap.com or help with setting up your free site, drop a line to <a href="mailto:info@doap.com">info@doap.com</a>

Author: David Menache, Shawn Crowe
Version: 1.0
Author URI: http://doap.com/
*/

// This just echoes the chosen line, we'll position it later
function livestream_live() {

//echo do_shortcode('<div id=youtubelive-homepage-widget>[doap_animate type="fadeIn"][doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://www.laprensa.com.ni/lptv"><div class="title-left" style="font-color:red">YOUTUBE EN VIVO</div><div class="line"><div class="line-container"></div></div></a>[/doap_heading][/doap_animate] <iframe style="min-height:350px;max-height:360px;" width="640" height="360" src="//www.youtube.com/embed/videoseries?list=PLLSDIHSJqOp3m2_cg5-EHQ-SZHoiWtbWA?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe> </div>');
echo "thats doap";
echo '<style> @media only screen and (min-width:300px) and (max-width: 640px) { .col-300, .col-380, .col-460, .col-540, .col-620 {width:100%;overflow:hidden; } } </style>';

echo do_shortcode('<div id=livestream-homepage-widget>[doap_animate type="fadeIn"][doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://noticias.laprensa.com.ni/lptv"><div class="title-left" style="color:red">EN VIVO</div><div class="line"><div class="line-container"></div></div></a>[/doap_heading][/doap_animate] <div style="width:100%;"><iframe src="http://new.livestream.com/accounts/6229170/events/2776899/player?height=360&width=530px&autoPlay=true&mute=false" width="100%" height="360" frameborder="0" scrolling="no"> </iframe></div></div>'); 
add_filter('widget_text', 'do_shortcode');
}

// Now we set that function up to execute when the admin_notices action is called
//add_action( 'admin_notices', 'youtube_live' );

// We need some CSS to position the paragraph
function livestreamlive_css() {
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

add_shortcode('livestream-live', 'livestream_live'); 
// and to make sure Wordpress calls shortcode in sidebars

//add_action( 'widget_text', 'livestreamlive_css' );

?>
