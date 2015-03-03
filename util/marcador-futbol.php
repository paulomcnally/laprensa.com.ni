#!/usr/bin/php
<?php
define('WP_USE_THEMES', true);
define('BUCKET', 'laprensa.com.ni');
define('UTILPATH', dirname(__FILE__) . '/');
define('WP_PATH', dirname(__FILE__) . '/../');
define('ABSPATH', str_replace('util', '', dirname(__FILE__) ));
$_SERVER['DOCUMENT_ROOT'] = ABSPATH;
$_SERVER[ 'HTTP_HOST' ] = 'noticias.laprensa.com.ni';
require_once(WP_PATH . 'wp-config.php');
require_once(WP_PATH . 'wp-load.php' );
require_once(WP_PATH . 'wp-includes/formatting.php');
require_once(UTILPATH . 'cleanfunctions.php');
require_once(WP_PATH . 'wp-admin/includes/image.php' );
switch_to_blog('2');
global $wpdb;
ini_set('memory_limit', '-1');
$marcador_key = 'futbol_total_home_slider';
//echo 'server doc root = ' .$_SERVER['DOCUMENT_ROOT'] . PHP_EOL;
//var_dump($_SERVER);
$posts_per_page = 4;
include(UTILPATH . 'marcador2.php');
?>
