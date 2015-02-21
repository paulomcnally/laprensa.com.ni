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
$limit = '200';
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


try
{
	$dbp2 = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
       	$sql2 = "SELECT idimagen FROM imagen WHERE creacion > '2014-04-19' and imagen LIKE '% %';"; 
       	foreach ($dbp2->query($sql2) as $row2)
       	{
       		$idimagen[] = $row2['idimagen'];
       	}
       	$dbp2 = null;
}
catch(PDOException $e)
{
	echo PHP_EOL . 'oops!' . PHP_EOL;
}

$imgids = implode(", ", $idimagen);

$query = "SELECT post_id FROM $wpdb->postmeta WHERE meta_value IN ($imgids) and meta_key = 'idimagen' ORDER BY abs(post_id) DESC LIMIT $limit;";
//$noticias_imported= $wpdb->get_col( "SELECT ID FROM $wpdb->posts where post_content LIKE '%laprensa.com.ni/files/imagen/%' ORDER BY ABS(ID) DESC LIMIT $limit;" );
$noticias_imported= $wpdb->get_results( $query, ARRAY_A );
//$noticias_imported= $wpdb->get_col( "SELECT ID FROM $wpdb->posts where ID > 421307 and post_author = 109 and post_type = 'post' ORDER BY ABS(ID) DESC LIMIT $limit;" );

$noticias_imported_var = implode( ",", $noticias_imported);

echo "noticias_imported_var $noticias_imported_var";

foreach ($noticias_imported as $row)
{
	$attach_id = $row['post_id'];
	$parent_post = $wpdb->get_var( "SELECT post_parent FROM $wpdb->posts where ID = $attach_id and post_type = 'attachment' ORDER BY ABS(ID) DESC LIMIT 1;" );
	if ($parent_post)
	{ 
	echo PHP_EOL . 'attach id = ' . $attach_id . PHP_EOL;
	echo PHP_EOL . 'post_parent = ' . $parent_post . PHP_EOL;
	wp_delete_post($attach_id, 1);
	wp_delete_post($parent_post, 1);
	$i++;
	$j++;
	}
}

echo PHP_EOL . $j . ' Attachments Deleted' . PHP_EOL;
echo PHP_EOL . $i . ' Posts Deleted' . PHP_EOL;
echo "start time : $start_time" . PHP_EOL;
echo "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
?>
