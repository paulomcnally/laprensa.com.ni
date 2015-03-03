<?php
/**
 * @package DevOps_and_Platforms
 * @version 1.0
 */
/*
Plugin Name: lp-date-widget
Plugin URI: http://wordpress.org/extend/plugins/devops_and_platforms/
Description: Create a date shortcode for use in the top sidebar element.  DevOps and Platforms is a modern web hosting platform that allows you to easily launch websites into the cloud.  Your pages will automatically be served from <cite>2</cite> datacenters.  For more information about doap.com or help with setting up your free site, drop a line to <a href="mailto:info@doap.com">info@doap.com</a>

Author: David Menache
Version: 1.1
Author URI: http://doap.com/
*/

function hello_dolly_get_lyric() {
        /** These are the lyrics to Hello Dolly */
        $lyrics = "Check out our partners at: <a href=http://www.doap.com>www.doap.com</a>
Check out our partners at: <a href=http://www.laprensa.com.ni>LaPrensa</a>
Check out our partners at: <a href=http://www.hoy.com.ni>Diario Hoy!</a>
Check out our partners at: <a href=http://www.thehvac.net>www.thehvac.net</a>
Check out our partners at: <a href=http://www.airandplumbing.com>airandplumbing.com</a>
Check out our partners at: <a href=http://www.convectek.com>convectek.com</a>
Check out our partners at: <a href=http://www.wherebananas.com>wherebananas.com</a>
Check out our partners at: <a href=http://www.cablespelao.com>cablespelao.com</a>
Check out our partners at: <a href=http://www.bodegamarina.com>www.bodegamarina.com</a>";

        // Here we split it into lines
        $lyrics = explode( "\n", $lyrics );

        // And then randomly choose a line
        return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_dolly() {

date_default_timezone_set("America/Managua");
ini_set('default_charset', 'utf-8');
header('Content-Type: text/html; charset=utf-8' );
$x = time();
$oldLocale = setlocale(LC_TIME, 'es_ES.UTF-8');
echo "<div charset=utf-8 "."id=header-date".">".ucwords(strftime("%A %d %B %Y", $x))."</div>";
setlocale(LC_TIME, $oldLocale);
add_filter('widget_text', 'do_shortcode');
}

// Now we set that function up to execute when the admin_notices action is called
//add_action( 'admin_notices', 'hello_dolly' );

// We need some CSS to position the paragraph
function dolly_css() {
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

add_shortcode('date-tag', 'hello_dolly'); 
// and to make sure Wordpress calls shortcode in sidebars

//add_action( 'admin_head', 'dolly_css' );

?>
