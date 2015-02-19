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
$limit = '6000';
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
       	$sql2 = "SELECT idimagen FROM imagen WHERE imagen LIKE '%288x318%';"; 
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

$query = "SELECT post_id, meta_value as imgid FROM $wpdb->postmeta WHERE meta_key = 'idimagen' and meta_value NOT IN ($imgids) and post_id IN (SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_wp_attached_file' and meta_value like '%288x318%') ORDER BY abs(post_id) DESC LIMIT $limit;";
//$noticias_imported= $wpdb->get_col( "SELECT ID FROM $wpdb->posts where post_content LIKE '%laprensa.com.ni/files/imagen/%' ORDER BY ABS(ID) DESC LIMIT $limit;" );
$noticias_imported= $wpdb->get_results( $query, ARRAY_A );
//$noticias_imported= $wpdb->get_col( "SELECT ID FROM $wpdb->posts where ID > 421307 and post_author = 109 and post_type = 'post' ORDER BY ABS(ID) DESC LIMIT $limit;" );

$noticias_imported_var = implode( ",", $noticias_imported);

echo "noticias_imported_var $noticias_imported_var";

foreach ($noticias_imported as $row)
{
	$attach_id = $row['post_id'];
	$imgid = $row['imgid'];
//	echo PHP_EOL . 'attach id = ' . $attach_id . PHP_EOL;
//	echo PHP_EOL . 'imgid = ' . $imgid . PHP_EOL;
	$parent_post = $wpdb->get_var( "SELECT post_parent FROM $wpdb->posts where ID = $attach_id and post_type = 'attachment' ORDER BY ABS(ID) DESC LIMIT 1;" );
	if ($parent_post)
	{ 
				echo PHP_EOL . 'post_parent = ' . $parent_post . PHP_EOL;
				echo PHP_EOL . 'attach id = ' . $attach_id . PHP_EOL;
		$lp_filename = '';
		try
        	{
        		$dbp3 = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
        		$sql3 = "SELECT imagen FROM imagen where idimagen = $imgid limit 1;";
        		foreach ($dbp3->query($sql3) as $row3)
        		{
        			$lp_filename = $row3['imagen'];
        		}
        		$dbp3 = null;
        	}
        	catch(PDOException $e)
        	{
        		echo PHP_EOL . 'articleimgid = ' . $imgid . PHP_EOL;
        	}
        	echo PHP_EOL . 'lp_filename = ' . $lp_filename . PHP_EOL;
		if ($lp_filename)
		{
			echo PHP_EOL . 'attach id = ' . $attach_id . 'is in the database' . PHP_EOL;
			$lp_filename = '/var/www/html/laprensa/files/imagen/' . $lp_filename;
			if (file_exists("$lp_filename")) 
			{
				echo PHP_EOL . 'lp_filename ' . $lp_filename . 'exists' . PHP_EOL;
				echo PHP_EOL . 'attach id = ' . $attach_id . PHP_EOL;
				$i++;
				$j++;
				$parent_post = $wpdb->get_var( "SELECT post_parent FROM $wpdb->posts where ID = $attach_id and post_type = 'attachment' ORDER BY ABS(ID) DESC LIMIT 1;" );
				echo PHP_EOL . 'post_parent = ' . $parent_post . PHP_EOL;
				wp_delete_post($attach_id, 1);
				wp_delete_post($parent_post, 1);
			}
			else
			{
				echo PHP_EOL . 'lp_filename ' . $lp_filename . 'DOES NOT exist' . PHP_EOL;
			}
		}

	}
	else
	{
		//echo PHP_EOL . 'attach id ' . $attach_id . ' has no parent post' . PHP_EOL;
	}
}

echo PHP_EOL . $j . ' Attachments Deleted' . PHP_EOL;
echo PHP_EOL . $i . ' Posts Deleted' . PHP_EOL;
echo "start time : $start_time" . PHP_EOL;
echo "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
?>
