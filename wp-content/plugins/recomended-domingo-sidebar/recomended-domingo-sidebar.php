<?php
/**
 * @package DevOps_and_Platforms
 * @version 1.0
 */
/*
Plugin Name: Recommended Domingo Sidebar
Plugin URI: http://wordpress.org/extend/plugins/devops_and_platforms/
Description: Adds a search box shortcode to be used in the sidebar area of domingo page. Usage is [recommended-domingo-sidebar].  Enjoy!  DevOps and Platforms is a modern web hosting platform that allows you to easily launch websites into the cloud.  Your pages will automatically be served from <cite>2</cite> datacenters.  For more information about doap.com or help with setting up your free site, drop a line to <a href="mailto:info@doap.com">info@doap.com</a>

Author: David Menache, Shawn Crowe
Version: 1.0
Author URI: http://doap.com/
*/

// This just echoes the chosen line, we'll position it later
function recommendeddomingosidebar() {

//echo "Hello world";
echo do_shortcode('[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://noticias.laprensa.com.ni/opinion"><div  class="title-left"><span style="color:#ff6600;">RECOMENDADOS</span></div><div class="twodots"></div></a>[/doap_heading]');

$custom_query = new WP_Query('cat=35632'); // use domingo cat only
while($custom_query->have_posts()) : $custom_query->the_post(); ?>

 <div style="height:30px;"><div style="position:relative;float:left;margin-right:10px"><img class="thumbnail" height="12" width="16" src="http://laprensa13.doap.us/wp-content/uploads/sites/2/2014/06/arrow-right.png" style="max-width:100%" alt=""></div>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br></div>

<?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query


//echo home_url( '/' );
add_filter('widget_text', 'do_shortcode');
}

// Now we set that function up to execute when the admin_notices action is called
//add_action( 'admin_notices', 'youtube_live' );

// We need some CSS to position the paragraph
function recommendeddomingosidebar_css() {
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

add_shortcode('recommended-domingo-sidebar', 'recommendeddomingosidebar'); 
// and to make sure Wordpress calls shortcode in sidebars

//add_action( 'widget_text', 'recommendeddomingosidebar_css' );

?>
