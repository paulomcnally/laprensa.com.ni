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
$limit = '100';
date_default_timezone_set('America/Managua');
$b = time();
$month = date("m", $b);
$monthspelled = date("M", $b);
$day = date("D", $b);
$numday = date("d", $b);
$year = date("Y", $b);
$start_time = date("Y-m-d H:i:s");


try
{
	$dbp = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
	$sql = "select idnoticia from noticia where texto like '% image-%' order by idnoticia desc;";
$result = $dbp->query($sql);
$idnoticia_results = $result->fetchAll(PDO::FETCH_COLUMN, 0);
$idnoticias_with_images = implode( ",", $idnoticia_results);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}

//echo PHP_EOL . $idnoticias_with_images . PHP_EOL;
//exit;

		date_default_timezone_set('America/Managua');

$noticias_imported = array();
$noticias_imported_var = '';
$noticias_imported= $wpdb->get_col( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = 'idnoticia' and meta_value IN ($idnoticias_with_images) and post_id NOT IN (SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_thumbnail_id') and post_id IN (SELECT ID FROM $wpdb->posts WHERE post_date > '2014-04-15' and post_status = 'publish') ORDER BY ABS(post_id) DESC LIMIT $limit;" );

foreach ($noticias_imported as $row)
{
	$post_id = $row;
	$i++;
	wp_delete_post($post_id, 1);
	echo PHP_EOL . 'post id = ' . $post_id;
	echo PHP_EOL . 'http://noticias.laprensa.com.ni/index.php?p=' . $post_id . PHP_EOL;
}

echo PHP_EOL . $i . ' Posts Deleted' . PHP_EOL;
echo "start time : $start_time" . PHP_EOL;
echo "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
?>
