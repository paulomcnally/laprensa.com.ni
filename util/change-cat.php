#!/usr/bin/php
<?php
define('WP_USE_THEMES', true);
define('BUCKET', 'laprensa.com.ni');
define('UTILPATH', dirname(__FILE__) . '/');
define('WP_PATH', dirname(__FILE__) . '/../');
$_SERVER[ 'HTTP_HOST' ] = 'noticias.laprensa.com.ni';
require_once(WP_PATH . 'wp-load.php');
require_once(WP_PATH . 'wp-config.php');
require_once(WP_PATH . 'wp-includes/formatting.php');
require_once(UTILPATH . 'cleanfunctions.php');
require_once(WP_PATH . 'wp-admin/includes/image.php');
require_once( '/var/www/html/lpmu/wp-admin/includes/media.php' );
switch_to_blog('2');
ini_set('default_charset', 'UTF-8');
mb_internal_encoding( 'UTF-8'); 
mb_regex_encoding( 'UTF-8');
global $wpdb;
$mysql_hostname = 'data.doap.com';
$mysql_username = 'root';
$mysql_password ='fr1ck0ff';
$mysql_db = 'noticias';
$author = '109';
$limit = '500';
date_default_timezone_set('America/Managua');
$b = time();
$month = date("m", $b);
$monthspelled = date("M", $b);
$day = date("D", $b);
$numday = date("d", $b);
$year = date("Y", $b);
$start_time = date("Y-m-d H:i:s");
$new_posts = array();
$sql = "SELECT wp_2_posts.ID FROM wp_2_posts INNER JOIN wp_2_term_relationships ON (wp_2_posts.ID = wp_2_term_relationships.object_id) WHERE  wp_2_term_relationships.term_taxonomy_id IN (30) AND wp_2_posts.post_type = 'post' AND ((wp_2_posts.post_status = 'publish')) GROUP BY wp_2_posts.ID ORDER BY   wp_2_posts.post_date DESC;";
$noticias_imported= $wpdb->get_results( $sql, ARRAY_A );

foreach ($noticias_imported as $row)
{
	$post_id = $row['ID'];
	$post_term_results = wp_set_post_terms( $post_id, 21, 'category' );
	$xx++;
}
echo '<br>' . PHP_EOL . $xx . ' POSTS UPDATED' . PHP_EOL;
echo '<br>' . PHP_EOL . "start time : $start_time";
echo '<br>' . PHP_EOL . "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
?>
