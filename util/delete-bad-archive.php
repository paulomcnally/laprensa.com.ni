#!/usr/bin/php
<?php
define('WP_USE_THEMES', true);
define('BUCKET', 'laprensa.com.ni');
define('UTILPATH', dirname(__FILE__) . '/');
define('WP_PATH', dirname(__FILE__) . '/../');
$_SERVER[ 'HTTP_HOST' ] = 'noticias.laprensa.com.ni';
require_once(WP_PATH . 'wp-config.php');
require_once(WP_PATH . 'wp-load.php' );
require_once(WP_PATH . 'wp-includes/formatting.php');
require_once(UTILPATH . 'cleanfunctions.php');
require_once(WP_PATH . 'wp-admin/includes/image.php' );
switch_to_blog('2');
global $wpdb;
ini_set('memory_limit', '-1');
$pgsql_hostname = 'lp-rds.laprensa.com.ni';
$pgsql_username = 'shawn';
$pgsql_password ='fr1ck0ff';
$pgsql_db = 'laprensa';
$pgsql_port = '5432';
$author = '110';
$limit = '500';
date_default_timezone_set('America/Managua');
$b = time();
$month = date("m", $b);
$monthspelled = date("M", $b);
$day = date("D", $b);
$numday = date("d", $b);
$year = date("Y", $b);
$start_time = date("Y-m-d H:i:s");

$noticias_imported = array();
$noticias_imported_var = '';
/*** pgsql connector ***/

//$noticias_imported= $wpdb->get_col( "SELECT ID FROM $wpdb->posts where post_content LIKE '%laprensa.com.ni/files/imagen/%' ORDER BY ABS(ID) DESC LIMIT $limit;" );
$noticias_imported= $wpdb->get_col( "SELECT ID FROM wp_2_posts where ID > 1457624 and post_type = 'post' and post_status = 'publish' and post_date > '2006-03-01' and post_date < '2006-11-27' and post_modified > '2014-12-12' and ID in (SELECT post_id from wp_2_postmeta where meta_key = 'lparchivo') order by ID desc" );
//$noticias_imported= $wpdb->get_col( "SELECT ID FROM $wpdb->posts where ID > 421307 and post_author = 109 and post_type = 'post' ORDER BY ABS(ID) DESC LIMIT $limit;" );

//usleep(50000);
//$metavals3= implode( ",", $articles_imported);
$noticias_imported_var = implode( ",", $noticias_imported);
$last_imported = $noticias_imported['0'];
if ( $noticias_imported_var == null)  $noticias_imported_var = 99999; 

echo "noticias_imported_var $noticias_imported_var";
echo "last_imported = $last_imported";
//echo var_dump($noticias_imported);

$post_cat = 25327;

foreach ($noticias_imported as $row)
{
	$post_id = $row;
//	$post_term_results = wp_set_post_terms( $post_id, $post_cat, 'category' );
	//echo PHP_EOL . 'delete result = ' . $delete_result;
	$i++;
	$images_imported= $wpdb->get_col( "SELECT ID FROM $wpdb->posts where post_parent = $post_id and post_type = 'attachment' ORDER BY ABS(ID) DESC LIMIT $limit;" );
	$j=0;
	foreach ($images_imported as $img)
	{
		$attach_id = $img;
//		$post_term_results = wp_set_post_terms( $post_id, $post_cat, 'category' );
		wp_delete_post($attach_id, 1);
//		usleep(50000);
		echo PHP_EOL . 'attach id = ' . $attach_id;
		//echo PHP_EOL . 'delete result = ' . $delete_result;
		$j++;
	}
	echo PHP_EOL . $j . ' Attachments Deleted' . PHP_EOL;
	wp_delete_post($post_id, 1);
//	usleep(50000);
	echo PHP_EOL . 'post id = ' . $post_id;
}




echo PHP_EOL . $i . ' Posts Deleted' . PHP_EOL;
echo "start time : $start_time" . PHP_EOL;
echo "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
?>
