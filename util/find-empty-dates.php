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
$post_dates= $wpdb->get_col( "SELECT distinct SUBSTRING(post_date,1,10) FROM `wp_2_posts` where post_type = 'post' and post_status = 'publish' order by post_date asc;");
foreach ($post_dates as $post_date)
{
	$p_dates[] = $post_date;
//	echo $post_date. PHP_EOL;
}
$start_date = '2000-05-24';
$end_date = '2014-11-04';
$current_date = $start_date;
while ($current_date < $end_date)
{
	if (!in_array($current_date,$p_dates))
	{
		$missing_dates[]=$current_date;
	} 
	$current_date = date("Y-m-d", strtotime($current_date . "+ 1 day"));
//	$ii++;
	if ($ii == 100)
	{
		echo $current_date;
		var_dump($missing_dates);
		exit;
	}
}
foreach ($missing_dates as $missing_date)
{
	echo $missing_date . PHP_EOL;
}
echo "start time : $start_time" . PHP_EOL;
echo "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
?>
