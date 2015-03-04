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
switch_to_blog('2');
global $wpdb;
ini_set('memory_limit', '-1');
$pgsql_hostname = 'lp-rds.laprensa.com.ni';
$pgsql_username = 'shawn';
$pgsql_password ='fr1ck0ff';
$pgsql_db = 'laprensa';
$pgsql_port = '5432';
$author = '110';
$limit = '1000';
date_default_timezone_set('America/Managua');
$b = time();
$month = date("m", $b);
$monthspelled = date("M", $b);
$day = date("D", $b);
$numday = date("d", $b);
$year = date("Y", $b);

$noticias_imported = array();
$noticias_imported_var = '';
/*** pgsql connector ***/

$noticias_imported= $wpdb->get_col( "SELECT post_id FROM $wpdb->postmeta where meta_key IN ('lptv_post') and post_id IN (SELECT post_parent FROM $wpdb->posts where post_type = 'attachment' and post_parent <> 0 and post_modified_gmt > '2014-09-17 12:00:00') and post_id NOT IN (SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_thumbnail_id') ORDER BY ABS(post_id) ASC LIMIT $limit;" );

//$metavals3= implode( ",", $articles_imported);
$noticias_imported_var = implode( ",", $noticias_imported);
$last_imported = $noticias_imported['0'];
if ( $noticias_imported_var == null)  $noticias_imported_var = 99999; 

echo "noticias_imported_var $noticias_imported_var";
echo "last_imported = $last_imported";
//echo var_dump($noticias_imported);

foreach ($noticias_imported as $row)
{
	$post_id = $row;

	if (!has_post_thumbnail($post_id))
	{
		echo PHP_EOL . 'post ID : ' . $post_id . ' has no attachment' . PHP_EOL;
                $attach_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts where post_type = 'attachment' and post_parent = $post_id ORDER BY ABS(ID) ASC limit 1;" );
		if ($attach_id)
		{
			echo PHP_EOL . 'attach_id  : ' . $attach_id . ' has a post_parent of ' . $post_id . PHP_EOL;
			$set_thumb = set_post_thumbnail( $post_id, $attach_id );
		}
		else
		{
			echo PHP_EOL . 'There is no attachment with post_parent of post ID : ' . $post_id . '!!!' . PHP_EOL;
		}
		if ($set_thumb)
		{
			echo PHP_EOL . 'Thumbnail set ' . PHP_EOL;
		}
		else
		{
			echo PHP_EOL . 'Could not set Thumbnail ' . PHP_EOL;
			$bad_posts[] = $post_id;
		}
	}
}
echo PHP_EOL . 'BAD POSTS:';
//print_r($bad_posts);
echo PHP_EOL;
?>
