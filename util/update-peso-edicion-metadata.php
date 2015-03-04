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
$query = 'SELECT post_id FROM ' . $wpdb->postmeta . ' WHERE meta_key = "edicion" and post_id NOT IN (select post_id from ' . $wpdb->postmeta . ' WHERE meta_key IN ("_edicion")) ORDER BY ABS(post_id) DESC LIMIT ' . $limit . ';';
//$noticias_imported= $wpdb->get_col( "SELECT ID FROM $wpdb->posts where post_content LIKE '%laprensa.com.ni/files/imagen/%' ORDER BY ABS(ID) DESC LIMIT $limit;" );
$noticias_imported= $wpdb->get_results( $query, ARRAY_A );

foreach ($noticias_imported as $row)
{
	$post_id = $row['post_id'];
	$peso_key = '_peso';
	$peso_value = 'field_53928c088c264';
	$edicion_key = '_edicion';
	$edicion_value = 'field_5392f40e4c56b';
	$pm_edicion_result = add_post_meta( $post_id, $edicion_key, $edicion_value, true );
	$pm_peso_result = add_post_meta( $post_id, $peso_key, $peso_value, true );
	if ($pm_edicion_result )
	{
		echo 'Edicion Postmeta Entry added = ' . $pm_edicion_result . '      idnoticia = ' . $idnoticia . '       post_id = ' . $post_id . PHP_EOL;
	}
	else
	{
		echo 'FAILED!  Edicion Postmeta RESULT = ' . $pm_edicion_result . '       idnoticia = ' . $idnoticia . '       post_id = ' . $post_id . PHP_EOL;
	}
	if ($pm_peso_result)
	{
		echo 'Peso Postmeta Entry added = ' . $pm_peso_result .'       idnoticia = ' . $idnoticia . '       post_id = ' . $post_id .  PHP_EOL;
	}
	else
	{
		echo 'FAILED!  Peso Postmeta RESULT = ' . $pm_peso_result . '       idnoticia = ' . $idnoticia . '       post_id = ' . $post_id . PHP_EOL;
	}
	$i++;
//	//usleep(50000);
}

echo PHP_EOL . $i . ' Posts Processed ' . PHP_EOL;
echo "start time : $start_time" . PHP_EOL;
echo "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
?>
