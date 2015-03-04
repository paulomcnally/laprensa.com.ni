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
$idnoticias_imported = $wpdb->get_col( "SELECT meta_value FROM $wpdb->postmeta where meta_key = 'idnoticia' and meta_value NOT IN (6360,6370,6385,6417,6760) and meta_value != post_id ORDER BY ABS(meta_value) DESC LIMIT $limit;" );
$idnoticias_imported_var = implode( ",", $idnoticias_imported);
//echo PHP_EOL . 'idnoticias_imported_var = ' . $idnoticias_imported_var; 
//$sql = "SELECT post_id as ID, meta_value as idnoticia FROM $wpdb->postmeta WHERE meta_key = 'idnoticia' and meta_value != post_id and meta_value > 170000 and meta_value IN ($idnoticias_imported_var) ORDER BY ABS(meta_value) DESC LIMIT $limit;";
$sql = "SELECT post_id as ID, meta_value as idnoticia FROM $wpdb->postmeta WHERE meta_key = 'idnoticia' and meta_value != post_id and meta_value IN ($idnoticias_imported_var) ORDER BY ABS(meta_value) DESC LIMIT $limit;";
$noticias_imported= $wpdb->get_results( $sql, ARRAY_A );

foreach ($noticias_imported as $row)
{
	$post_id = $row['ID'];
        $idnoticia = $row['idnoticia'];

//	echo PHP_EOL . 'post_id = ' . $post_id . PHP_EOL;
//	echo PHP_EOL . 'idnoticia = ' . $idnoticia . PHP_EOL;
	$post_published = $wpdb->get_var("SELECT post_status FROM $wpdb->posts WHERE ID = $post_id;");
	$post_type = $wpdb->get_var("SELECT post_type FROM $wpdb->posts WHERE ID = $post_id;");
	$post_exists = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE ID = $idnoticia;");
//	echo PHP_EOL . 'post_published = ' . $post_published .PHP_EOL;
//	echo PHP_EOL . 'post_type = ' . $post_type . PHP_EOL;
	if ($post_published == 'publish' && $post_type == 'post' && !$post_exists)
	{
		$post_change = $wpdb->query(
		"
		UPDATE $wpdb->posts 
		SET ID = $idnoticia
		WHERE ID = $post_id 
		"
		);
		
		if ($post_change)
		{
//			echo PHP_EOL . 'post_change ' . $post_change . PHP_EOL;
			$new_posts[] = '<div style="clear:both;"><a href="http://noticias.laprensa.com.ni/index.php?p=' . $idnoticia . '">Post # ' . $idnoticia . '</a></div>' . PHP_EOL;
		}
		else
		{
//			echo PHP_EOL . 'post_change failed - ' . $post_change . PHP_EOL;
		}
		$postmeta_change = $wpdb->query(
		"
		UPDATE $wpdb->postmeta 
		SET post_id = $idnoticia
		WHERE post_id = $post_id 
		"
		);
		

		if ($postmeta_change)
		{
//			echo PHP_EOL . 'postmeta_change ' . $postmeta_change . PHP_EOL;
		}
		else
		{
//			echo PHP_EOL . 'postmeta_change  failed - ' . $postmeta_change . PHP_EOL;
		}
		$attach_change = $wpdb->query(
		"
		UPDATE $wpdb->posts 
		SET post_parent = $idnoticia
		WHERE post_parent = $post_id 
		"
		);
		
		if ($attach_change)
		{
//			echo PHP_EOL . 'attach_change ' . $attach_change . PHP_EOL;
		}
		else
		{
//			echo PHP_EOL . 'attach_change  failed - ' . $attach_change . PHP_EOL;
		}
		$terms_change = $wpdb->query(
		"
		UPDATE $wpdb->term_relationships
		SET object_id = $idnoticia
		WHERE object_id = $post_id
		"
		);
		
		if ($terms_change)
		{
//			echo PHP_EOL . 'terms_change ' . $terms_change . PHP_EOL;
		}
		else
		{
//			echo PHP_EOL . 'terms_change failed -  ' . $terms_change . PHP_EOL;
		}
	}		
	else
	{
//		echo 'something went wrong!' . PHP_EOL;
	}
}
foreach ($new_posts as $new_post)
{
	echo $new_post;
	$xx++;
}
echo '<br>' . PHP_EOL . $xx . ' POSTS UPDATED' . PHP_EOL;
echo '<br>' . PHP_EOL . "start time : $start_time";
echo '<br>' . PHP_EOL . "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
?>
