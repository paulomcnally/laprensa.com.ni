<?php
/**
 * @package DevOps_and_Platforms
 * @version 1.0
 */
/*
Plugin Name: Domingo Search Box
Plugin URI: http://wordpress.org/extend/plugins/devops_and_platforms/
Description: Adds a search box shortcode to be used in the sidebar area of domingo page. Usage is [domingo-search-box].  Enjoy!  DevOps and Platforms is a modern web hosting platform that allows you to easily launch websites into the cloud.  Your pages will automatically be served from <cite>2</cite> datacenters.  For more information about doap.com or help with setting up your free site, drop a line to <a href="mailto:info@doap.com">info@doap.com</a>

Author: David Menache, Shawn Crowe
Version: 1.0
Author URI: http://doap.com/
*/

// This just echoes the chosen line, we'll position it later
function domingosearchbox() {

//echo "Hello world";
//echo home_url( '/' );
add_filter('widget_text', 'do_shortcode');
}

// Now we set that function up to execute when the admin_notices action is called
//add_action( 'admin_notices', 'youtube_live' );

// We need some CSS to position the paragraph
function domingosearchbox_css() {
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

add_shortcode('domingo-search-box', 'domingosearchbox'); 
// and to make sure Wordpress calls shortcode in sidebars

//add_action( 'widget_text', 'domingosearchbox_css' );

?>
