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
$limit = '12500';
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
$noticias_imported= $wpdb->get_col( "SELECT ID FROM $wpdb->posts where ID < 590020 and post_type = 'post' and post_status = 'publish' ORDER BY ABS(ID) ASC;" );
//$noticias_imported= $wpdb->get_col( "SELECT ID FROM $wpdb->posts where ID > 421307 and post_author = 109 and post_type = 'post' ORDER BY ABS(ID) DESC LIMIT $limit;" );
$args = array(
	'type'                     => 'post',
	'child_of'                 => 0,
	'parent'                   => '',
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'category',
	'pad_counts'               => false 

); 
$post_categories = get_categories($args);
foreach ($post_categories as $post_category)
{
	$cat_name[] = $post_category->name;
	$cat_slug[] = $post_category->slug;
}
var_dump($cat_name);
var_dump($cat_slug);

//usleep(50000);
//$metavals3= implode( ",", $articles_imported);
$noticias_imported_var = implode( ",", $noticias_imported);
$last_imported = $noticias_imported['0'];
if ( $noticias_imported_var == null)  $noticias_imported_var = 99999; 

//echo "noticias_imported_var $noticias_imported_var";
//echo "last_imported = $last_imported";
//echo var_dump($noticias_imported);

$post_cat = 25327;

foreach ($noticias_imported as $row)
{
	$post_id = $row;
	$categories = get_the_category($post_id);
	if($categories)
	{
		foreach($categories as $category)
		{
//			echo '--category:term_id 	' . $category->term_id . PHP_EOL;
//			echo '--category:name 	' . $category->name . PHP_EOL;
//			echo '--category:cat_name  	' . $category->cat_name . PHP_EOL;
//			echo '--category:cat_slug	' . $category->slug. PHP_EOL;
		}
	}
	else
	{
		echo PHP_EOL . 'POST ID :   ' . $post_id . '   HAS NO CATEGORY ASSIGNED OR LOOKUP FAILED' . PHP_EOL;
	echo PHP_EOL . '___________________________________________________________________' . PHP_EOL;
	}	
//	echo PHP_EOL . PHP_EOL . PHP_EOL;
	$posttags = get_the_tags($post_id);
	if($posttags )
	{
		foreach($posttags as $posttag)
		{
			if (in_array($posttag->name,$cat_name))
			{
				echo PHP_EOL . PHP_EOL . '---------------------DUPLICATE CATEGORY NAME!!!---------------------' . PHP_EOL . PHP_EOL;
	echo PHP_EOL . 'post id = ' . $post_id . PHP_EOL;
			echo '--posttag :term_id  	' . $posttag->term_id . PHP_EOL;
			echo '--posttag :name  	' . $posttag->name . PHP_EOL;
			echo '--posttag :slug		' . $posttag->slug . PHP_EOL;
			}
			if (in_array($posttag->slug,$cat_slug))
			{
				echo PHP_EOL . PHP_EOL . '---------------------DUPLICATE CATEGORY SLUG!!!---------------------' . PHP_EOL . PHP_EOL;
	echo PHP_EOL . 'post id = ' . $post_id . PHP_EOL;
			echo '--posttag :term_id  	' . $posttag->term_id . PHP_EOL;
			echo '--posttag :name  	' . $posttag->name . PHP_EOL;
			echo '--posttag :slug		' . $posttag->slug . PHP_EOL;
	echo PHP_EOL . '___________________________________________________________________' . PHP_EOL;
			}
		}
	}
	else
	{
//		echo PHP_EOL . 'POST ID :   ' . $post_id . '   HAS NO TAGS ASSIGNED OR LOOKUP FAILED' . PHP_EOL;
	}

	$i++;
}
echo PHP_EOL . $i . ' Posts Processed' . PHP_EOL;
echo "start time : $start_time" . PHP_EOL;
echo "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
?>
