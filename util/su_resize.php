#!/usr/bin/php
<?php
define('WP_USE_THEMES', true);
define('BUCKET', 'laprensa.com.ni');
define('UTILPATH', dirname(__FILE__) . '/');
define('WP_PATH', dirname(__FILE__) . '/../');
$_SERVER[ 'HTTP_HOST' ] = 'negocios.laprensa.com.ni';
require_once(WP_PATH . 'wp-config.php');
require_once(WP_PATH . 'wp-load.php' );
require_once(WP_PATH . 'wp-includes/formatting.php');
require_once(UTILPATH . 'cleanfunctions.php');
require_once(WP_PATH . 'wp-admin/includes/image.php' );
require_once('/var/www/html/lpmu/wp-content/plugins/shortcodes-ultimate/inc/core/tools.php' );
switch_to_blog('9');
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
//$noticias_imported= $wpdb->get_col( "SELECT meta_value FROM $wpdb->postmeta where meta_key = '_menu_item_object_id' LIMIT $limit;" );

su_image_resize( 'http://noticias.laprensa.com.ni/wp-content/uploads/sites/2/2014/06/1401926817_050614vidaAgenda1photo01.jpg', 300, 300);

echo "start time : $start_time" . PHP_EOL;
echo "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
?>
