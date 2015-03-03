#!/usr/bin/php
<?php
define('WP_USE_THEMES', true);
define('BUCKET', 'laprensa.com.ni');
define('UTILPATH', dirname(__FILE__) . '/');
define('WP_PATH', dirname(__FILE__) . '/../');
define('ABSPATH', str_replace('util', '', dirname(__FILE__) ));
$_SERVER['DOCUMENT_ROOT'] = ABSPATH;
$_SERVER[ 'HTTP_HOST' ] = 'www.laprensa.com.ni';
require_once(WP_PATH . 'wp-config.php');
require_once(WP_PATH . 'wp-load.php' );
require_once(WP_PATH . 'wp-includes/formatting.php');
require_once(UTILPATH . 'cleanfunctions.php');
require_once(WP_PATH . 'wp-admin/includes/image.php' );
switch_to_blog('2');
global $wpdb;
ini_set('memory_limit', '-1');
$yesterday = date("Y-m-d", strtotime("- 1 day"));
//$marcador_key = 'activo_en_portada';
//$posts_per_page = 1;
//include(UTILPATH . 'marcador2.php');
echo '<div id="tagbox">';
echo '<div style="color:#34669b;z-index:99;height: 20px;float: left;padding-left:0px;padding-right:5px;left:0px;position:relative;top:0px;" id=destacados-sidebar><div style="padding-left:5px;padding-top:5px;font-size:.8em;width:110px;position:relative;float:left;color:#000;"><img style="-webkit-user-select: none;height:12px;width:12px;background-color:#f5f5f5;" src="http://laprensa13.doap.us/images/tag.png"> Temas del dia:</div>';
echo '<div style="color:#34669b;position:relative;float:right;padding-left:0px;padding-top:5px;padding-right:0px;" id="toptagcloud">';

$how_many_posts = 10;
$args = array(
'post_type' => 'post', 
'post_status' => 'publish',
'posts_per_page' => $how_many_posts,
'orderby' => 'date',
'order' => 'DESC',
'date_query' => array(
	array(
	'column' => 'post_date',
        'after' => $yesterday
	)
)
);
// get the last $how_many_posts, which we will loop over
// and gather the tags of
query_posts($args);
//
$temp_ids = array();
while (have_posts()) : the_post(); 
// get tags for each post
echo 'post ID ' . $post->ID . PHP_EOL;
$posttags = get_the_tags();
if ($posttags) {
foreach($posttags as $tag) {
    // store each tag id value
    $temp_ids[] = $tag->term_id;
echo 'tag ' . $tag->term_id . PHP_EOL;
}
}
endwhile;
// we're done with that loop, so we need to reset the query now
wp_reset_query();
$id_string = implode(',', array_unique($temp_ids));
// These are the params I use, you'll want to adjust the args
// to suit the look you want    
$args = array(
'smallest'  => 12, 
    'largest'   => 12,
    'unit'      => 'px', 
    'number'    => 6,  
    'format'    => 'flat',
    'separator' => " - \n",
    'orderby'   => 'count', 
    'order'     => 'DESC',
    'include'   => $id_string,  // only include stored ids
    'link'      => 'view', 
    'echo'      => true,

);

echo wp_tag_cloud( $args ) . '</div>';
//echo wp_tag_cloud('smallest=12&largest=12&orderby=count&order=DESC&format=flat&unit=px&number=7&link=view') . '</div>';

echo '</div>';
echo '</div>' . PHP_EOL;

?>
