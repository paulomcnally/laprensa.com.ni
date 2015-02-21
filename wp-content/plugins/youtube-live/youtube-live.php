<?php
/**
 * @package DevOps_and_Platforms
 * @version 1.0
 */
/*
Plugin Name: Youtube Live Shortcode Widget
Plugin URI: http://wordpress.org/extend/plugins/devops_and_platforms/
Description: Adds a youtube-live shortcode to be used in the main area of the home page. Usage is [youtube-live].  Enjoy!  DevOps and Platforms is a modern web hosting platform that allows you to easily launch websites into the cloud.  Your pages will automatically be served from <cite>2</cite> datacenters.  For more information about doap.com or help with setting up your free site, drop a line to <a href="mailto:info@doap.com">info@doap.com</a>

Author: David Menache, Shawn Crowe
Version: 1.0
Author URI: http://doap.com/
*/

// This just echoes the chosen line, we'll position it later
function youtube_live() {

echo do_shortcode('<div id=youtubelive-homepage-widget>[doap_animate type="fadeIn"][doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://www.laprensa.com.ni/lptv"><div class="title-left" style="font-color:red">YOUTUBE EN VIVO</div><div class="line"><div class="line-container"></div></div></a>[/doap_heading][/doap_animate]
<iframe style="min-height:350px;max-height:360px;" width="640" height="360" src="//www.youtube.com/embed/videoseries?list=PLLSDIHSJqOp3m2_cg5-EHQ-SZHoiWtbWA?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
</div>');
add_filter('widget_text', 'do_shortcode');

}

// Now we set that function up to execute when the admin_notices action is called
//add_action( 'admin_notices', 'youtube_live' );

// We need some CSS to position the paragraph
function youtubelive_css() {
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

add_shortcode('youtube-live', 'youtube_live'); 
// and to make sure Wordpress calls shortcode in sidebars

//add_action( 'widget_text', 'youtubelive_css' );

?>
