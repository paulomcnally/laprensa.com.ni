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
$limit = '250000';
//$limit = '25';
date_default_timezone_set('America/Managua');
$b = time();
$month = date("m", $b);
$monthspelled = date("M", $b);
$day = date("D", $b);
$numday = date("d", $b);
$year = date("Y", $b);
$start_time = date("Y-m-d H:i:s");
$articlepeso = 0;
$noticias_imported = array();
$noticias_imported_var = '';
$dest_key = 'destacado';
$dest_value = 0;
$breves_key = 'breves';
$breves_value = 0;
$query = 'SELECT distinct post_id FROM ' . $wpdb->postmeta . ' WHERE post_id IN (SELECT ID FROM ' . $wpdb->posts . ' WHERE post_type = "post" and post_status = "publish") and post_id NOT IN (select post_id from ' . $wpdb->postmeta . ' WHERE meta_key IN ("destacado")) ORDER BY ABS(post_id) DESC LIMIT ' . $limit . ';';
//$noticias_imported= $wpdb->get_col( "SELECT ID FROM $wpdb->posts where post_content LIKE '%laprensa.com.ni/files/imagen/%' ORDER BY ABS(ID) DESC LIMIT $limit;" );
$noticias_imported= $wpdb->get_results( $query, ARRAY_A );

foreach ($noticias_imported as $row)
{
	$post_id = $row['post_id'];
	if ($post_id)
	{
		$dest_result = add_post_meta( $post_id, $dest_key, $dest_value, true );
		if ($dest_result == TRUE)
		{
			echo 'Destacado Postmeta Entry added = ' . $dest_result . '      articleedition = ' . $articleedition . '       post_id = ' . $post_id . PHP_EOL;
		}
		else
		{
			echo 'FAILED!  Edicion Postmeta RESULT = ' . $dest_result . '       articleedition = ' . $articleedition . '       post_id = ' . $post_id . PHP_EOL;
		}
		$i++;
//	//usleep(50000);
	}
}
$query = 'SELECT distinct post_id FROM ' . $wpdb->postmeta . ' WHERE post_id IN (SELECT ID FROM ' . $wpdb->posts . ' WHERE post_type = "post" and post_status = "publish") and post_id NOT IN (select post_id from ' . $wpdb->postmeta . ' WHERE meta_key IN ("breves")) ORDER BY ABS(post_id) DESC LIMIT ' . $limit . ';';
//$noticias_imported= $wpdb->get_col( "SELECT ID FROM $wpdb->posts where post_content LIKE '%laprensa.com.ni/files/imagen/%' ORDER BY ABS(ID) DESC LIMIT $limit;" );
$noticias_imported= $wpdb->get_results( $query, ARRAY_A );

foreach ($noticias_imported as $row)
{
	$post_id = $row['post_id'];
	if ($post_id)
	{
		$breves_result = add_post_meta( $post_id, $breves_key, $breves_value, true );
		if ($breves_result == TRUE)
		{
			echo 'Peso Postmeta Entry added = ' . $breves_result .'       articleedition = ' . $articleedition . '       post_id = ' . $post_id .  PHP_EOL;
		}
		else
		{
			echo 'FAILED!  Peso Postmeta RESULT = ' . $breves_result . '       articleedition = ' . $articleedition . '       post_id = ' . $post_id . PHP_EOL;
		}
	}
}

echo PHP_EOL . $i . ' Posts Processed ' . PHP_EOL;
echo "start time : $start_time" . PHP_EOL;
echo "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
?>
