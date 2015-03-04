#!/usr/bin/php
<?php
echo ' SERVER_NAME ' . $_SERVER['SERVER_NAME'] . PHP_EOL;
echo ' ENVIRONMENT ' . ENVIRONMENT . PHP_EOL;
echo ' DB_HOST ' . DB_HOST . PHP_EOL;
echo ' DB_NAME ' . DB_NAME . PHP_EOL;
define('WP_USE_THEMES', true);
define('BUCKET', 'laprensa.com.ni');
$_SERVER[ 'HTTP_HOST' ] = 'noticias.laprensa.com.ni';
require_once( '/var/www/html/lpmu/wp-load.php' );
require_once('/var/www/html/lpmu/wp-config.php');
require_once('/var/www/html/lpmu/wp-includes/formatting.php');
require_once('/home/shawn/cleanfunctions.php');
require_once( '/var/www/html/lpmu/wp-admin/includes/image.php' );
switch_to_blog('2');
global $wpdb;
ini_set('memory_limit', '-1');
$pgsql_hostname = 'lp-rds.laprensa.com.ni';
$pgsql_username = 'shawn';
$pgsql_password ='fr1ck0ff';
$pgsql_db = 'laprensa';
$pgsql_port = '5432';
$author = '110';
$limit = '10';
date_default_timezone_set('America/Managua');
$b = time();
$month = date("m", $b);
$monthspelled = date("M", $b);
$day = date("D", $b);
$numday = date("d", $b);
$year = date("Y", $b);
$start_time = date("Y-m-d H:i:s");
$image_sizes = list_thumbnail_sizes();
print_r($image_sizes);
print_r( $_wp_additional_image_sizes );
echo "start time : $start_time" . PHP_EOL;
echo "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
echo get_template_directory() . PHP_EOL;
echo STYLESHEETPATH . PHP_EOL;
$thumb = get_post_thumbnail_id(200311);
if ($xyz = get_post_meta( $thumb, '_wp_attachment_backup_sizes', true))
{
$file_path = wp_get_attachment_url( $thumb ) . PHP_EOL;
$info = pathinfo( $file_path );
$dir = $info['dirname'];
$orig_file = $xyz['full-orig']['file'];
$attach_url = $dir . $orig_file;
}
else
{
	$attach_url = wp_get_attachment_url( $thumb );
}

echo wp_get_attachment_image( $thumb, 'full' ) . PHP_EOL;
//$xyz = wp_get_attachment_image_src( $thumb, 'full', false );
$xyz = get_post_meta( $thumb, '_wp_attachment_backup_sizes', true);
$orig_file = $xyz['full-orig']['file'];
function print_filters_for( $hook = '' ) {
    global $wp_filter;
    if( empty( $hook ) || !isset( $wp_filter[$hook] ) )
        return;

    print '<pre>';
    print_r( $wp_filter[$hook] );
    echo $wp_filter[$hook];
    print '</pre>';
}
print_filters_for( 'attachment_link' );
print_filters_for( 'wp_get_attachment_image_attributes' );
print_filters_for( 'attachment_thumbnail_args' );
var_dump($xyz);
echo wp_get_attachment_url(1159407) . PHP_EOL;
echo 'thumb = ' . $thumb . PHP_EOL;
echo $dir . $name . $ext . PHP_EOL;
echo $dir . $orig_file . PHP_EOL;
echo $attach_url;
//$widgets = get_option('sidebars_widgets');
//var_dump($widgets);
$image = su_image_resize( wp_get_attachment_url(1156984), 194, 150 );
var_dump($image);
?>
