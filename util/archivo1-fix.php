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
require_once(WP_PATH . 'wp-admin/includes/media.php');
switch_to_blog('2');
global $wpdb;
ini_set('memory_limit', '-1');
$pgsql_hostname = 'lp-rds.laprensa.com.ni';
$pgsql_username = 'shawn';
$pgsql_password ='fr1ck0ff';
$pgsql_db = 'laprensa';
$pgsql_port = '5432';
$author = '110';
$limit = '2500';
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
$noticias_imported = $wpdb->get_col( "SELECT distinct post_id FROM $wpdb->postmeta where meta_key = 'arch_v1_reprocessed' ORDER BY ABS(post_id) DESC;" );
$noticias_imported_var = implode( ",", $noticias_imported);
if (!$noticias_imported_var) $noticias_imported_var = 99;
 
$noticias_to_change= $wpdb->get_results( "SELECT ID,post_content FROM $wpdb->posts where post_status = 'publish' and post_type = 'post' and post_date > '2000-01-01' and post_date < '2006-03-06' and post_content like '%<p class=\"archivo_v1_body\">r=\"#000000\" %' and post_content like '%<!--texto-->%' and ID not in ($noticias_imported_var ) ORDER BY ABS(ID) ASC LIMIT $limit;" );


foreach ($noticias_to_change as $key => $row)
{
	$post_id = $row->ID;
 	$post_content = $row->post_content;
//	echo PHP_EOL . 'Original Text' . PHP_EOL;
//	echo PHP_EOL . $post_content . PHP_EOL;
	$to_remove = getTextBetween($post_content, '<p class="archivo_v1_body">', '<!--texto-->');
//	echo PHP_EOL . 'Text to Remove' . PHP_EOL;
//	echo PHP_EOL . $to_remove . PHP_EOL;

	$post_content = str_replace($to_remove , "", $post_content );

			$update_post = array(
					  'ID'             => $post_id, 
					  'post_content'   => $post_content, //The full text of the post.
			);  

	if (wp_update_post($update_post))
	{
		$i++;
		$reprocessed_archivo = add_post_meta( $attach_id, 'arch_v1_reprocessed', '1', true );
		$new_posts[] = 'http://noticias.laprensa.com.ni/index.php?p=' . $post_id . PHP_EOL;
	}
//	echo PHP_EOL . '_____________________________________________' . PHP_EOL;
}

foreach ($new_posts as $new_post)
{
	echo $new_post;
}
echo PHP_EOL . $i . ' Posts Updated' . PHP_EOL;
echo "start time : $start_time" . PHP_EOL;
echo "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
?>
