#!/usr/bin/php
<?php
define('WP_USE_THEMES', true);
define('BUCKET', 'laprensa.com.ni');
define('UTILPATH', dirname(__FILE__) . '/');
define('WP_PATH', dirname(__FILE__) . '/../');
define('ABSPATH', str_replace('util', '', dirname(__FILE__) ));
$_SERVER['DOCUMENT_ROOT'] = ABSPATH;
$_SERVER[ 'HTTP_HOST' ] = 'www.laprensa.com.ni';
require_once(WP_PATH . 'wp-config.php');
require_once(WP_PATH . 'wp-load.php' );
require_once(WP_PATH . 'wp-includes/formatting.php');
require_once(UTILPATH . 'cleanfunctions.php');
require_once(WP_PATH . 'wp-admin/includes/image.php' );
switch_to_blog('2');
global $wpdb;
ini_set('memory_limit', '-1');
require_once(WP_PATH . 'wp-content/plugins/shortcodes-ultimate/inc/core/tools.php');
$return = '';
$return2 = '';
global $wp_query;
$args = array( 'cat' => '3518,1673,17,31,22,3,21,25763,10,3519,27,991', 'posts_per_page' => 10, 'ignore_sticky_posts' => 1, 'date_query' => array(array('column' => 'post_date', 'after' => $last_month)) );
add_filter('posts_clauses', 'filterEdiciones');
add_filter('posts_clauses', 'filterNoBreves');
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) 
{
	$return = '<ul class="su-posts su-posts-list-loop">' . PHP_EOL;
        while ( $the_query->have_posts() ) 
	{
                $the_query->the_post();
                global $post;
		$return .= '<li id="su-post-' . $post->ID . '" class="su-post"><a href="' . get_the_permalink() . '">' . ucfirst(get_the_title()) . '</a></li>' . PHP_EOL; 


        }
	$return .= '</ul>' . PHP_EOL;
}
$marcadorfile = fopen('/srv/www/uploads/common/ml-uh-content.php', 'w');
fwrite($marcadorfile, $return . PHP_EOL);
fclose($marcadorfile);
$stuff = tptn_pop_posts( 'daily=1&is_widget=1' );
$marcadorfile = fopen('/srv/www/uploads/common/top-10-content.php', 'w');
fwrite($marcadorfile, $stuff . PHP_EOL);
fclose($marcadorfile);

?>
