#!/usr/bin/php
<?php
define('WP_USE_THEMES', true);
define('BUCKET', 'laprensa.com.ni');
define('UTILPATH', dirname(__FILE__) . '/');
define('WP_PATH', dirname(__FILE__) . '/../');
$_SERVER[ 'HTTP_HOST' ] = 'www.laprensa.com.ni';
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
/*** pgsql connector ***/

//$noticias_imported= $wpdb->get_col( "SELECT ID FROM $wpdb->posts where post_content LIKE '%laprensa.com.ni/files/imagen/%' ORDER BY ABS(ID) DESC LIMIT $limit;" );
//$idnoticias_imported= $wpdb->get_col( "SELECT post_id FROM $wpdb->postmeta where meta_key = 'idnoticia' ORDER BY ABS(post_id) ASC LIMIT $limit;" );
//$noticias_imported= $wpdb->get_col( "SELECT ID FROM $wpdb->posts where ID > 421307 and post_author = 109 and post_type = 'post' ORDER BY ABS(ID) DESC LIMIT $limit;" );

//usleep(50000);
//$metavals3= implode( ",", $articles_imported);
//$idnoticias_imported_var = implode( ",", $idnoticias_imported);
//$last_imported = $noticias_imported['0'];

//echo "noticias_imported_var $noticias_imported_var";
//echo "last_imported = $last_imported";
//echo var_dump($noticias_imported);
//$noticias_imported= $wpdb->get_col( "select post_id from wp_2_postmeta where post_id > abs(300000) and meta_key = 'idnoticia' and meta_value IN (select meta_value from wp_2_postmeta where meta_key = 'idnoticia' and post_id > abs(300000) and post_id IN (select ID from wp_2_posts where post_type = 'post' and post_modified > '2014-08-15' and post_status = 'publish' and ID > 300000 )) ORDER BY abs(meta_value) desc, post_id DESC;" );
//$noticias_imported= $wpdb->get_col( "select post_id from wp_2_postmeta where meta_key = 'idnoticia' and meta_value != post_id and meta_value in (select meta_value from wp_2_postmeta where meta_key = 'idnoticia' and meta_value = post_id)" );
$duplicate_meta_keys = $wpdb->get_col( "SELECT meta_value FROM `wp_2_postmeta` where meta_key = 'lparchivo' GROUP BY meta_value HAVING count(meta_value) > 1 order by meta_value asc limit $limit;");
foreach ($duplicate_meta_keys as $row)
{
	$dup_key = $row;
	$ii=0;
echo PHP_EOL . "dup key = $dup_key" . PHP_EOL;

	$noticias_imported= $wpdb->get_col( 'SELECT post_id FROM `wp_2_postmeta` where meta_key = "lparchivo" and meta_value = "' . $dup_key . '" order by abs(post_id) ASC;');

	foreach ($noticias_imported as $row)
	{
		if ($ii > 0)
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
			echo PHP_EOL . 'post id ' . $post_id . ' Deleted';
		}
		$ii++;
	}
}



echo PHP_EOL . $i . ' Posts Deleted' . PHP_EOL;
echo "start time : $start_time" . PHP_EOL;
echo "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
?>
