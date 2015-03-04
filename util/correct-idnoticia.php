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
//$query = 'SELECT post_id, meta_value as idnoticia FROM ' . $wpdb->postmeta . ' WHERE meta_key = "idnoticia" and post_id NOT IN (select post_id from ' . $wpdb->postmeta . ' WHERE meta_key IN ("edicion", "peso")) ORDER BY ABS(post_id) DESC LIMIT ' . $limit . ';';
$query = "select post_id from wp_2_postmeta where meta_key = 'edicion' and post_id IN (select meta_value from wp_2_postmeta where meta_key = 'idnoticia' and post_id > abs(300000)) and post_id IN (select ID from wp_2_posts where post_type = 'post' and post_status = 'publish') ORDER BY post_id DESC;";
//$noticias_imported= $wpdb->get_col( "SELECT ID FROM $wpdb->posts where post_content LIKE '%laprensa.com.ni/files/imagen/%' ORDER BY ABS(ID) DESC LIMIT $limit;" );
$noticias_imported= $wpdb->get_results( $query, ARRAY_A );
//$noticias_imported= $wpdb->get_col( "SELECT ID FROM $wpdb->posts where ID > 421307 and post_author = 109 and post_type = 'post' ORDER BY ABS(ID) DESC LIMIT $limit;" );

$noticias_imported_var = implode( ",", $noticias_imported);

echo "noticias_imported_var $noticias_imported_var";

foreach ($noticias_imported as $row)
{
	$post_id = $row['post_id'];
	$idnoticia = $row['post_id'];
	$pm_idnoticia_result = add_post_meta( $post_id, 'idnoticia', $articleedition, true );
	if ($pm_idnoticia_result )
	{
		echo 'idnoticia Postmeta Entry added = ' . $pm_idnoticia_result . '      idnoticia = ' . $idnoticia . '       post_id = ' . $post_id . PHP_EOL;
	}
	else
	{
		echo 'FAILED!  Edicion Postmeta RESULT = ' . $pm_edicion_result . '       idnoticia = ' . $idnoticia . '       post_id = ' . $post_id . PHP_EOL;
	}
	$i++;
//	//usleep(50000);
}

echo PHP_EOL . $i . ' Posts Processed ' . PHP_EOL;
echo "start time : $start_time" . PHP_EOL;
echo "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
?>
