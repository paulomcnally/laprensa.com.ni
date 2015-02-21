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
$pgsql_hostname = 'lp-rds.laprensa.com.ni';
$pgsql_username = 'shawn';
$pgsql_password ='fr1ck0ff';
$pgsql_db = 'laprensa';
$pgsql_port = '5432';
$author = '109';
$limit = '300000';
//$limit = '400';
date_default_timezone_set('America/Managua');
/*** pgsql connector ***/
try {
    $db = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
$relacionados_imported2 = $wpdb->get_col( "SELECT distinct meta_value FROM $wpdb->postmeta where meta_key = 'idrelacionado' ORDER BY ABS(meta_value) DESC;" );
$relacionados_imported = implode( ",", $relacionados_imported2);
$idnoticias_imported2 = $wpdb->get_col( "SELECT post_id FROM $wpdb->postmeta WHERE post_id = meta_value AND meta_key = 'idnoticia' ORDER BY post_id DESC;" );
$idnoticias_imported = implode( ",", $idnoticias_imported2);
echo "\n Comenzando Importacion <br>\n\n" . PHP_EOL;
echo date("Y-m-d H:i:s"). PHP_EOL;
$start_time = date("Y-m-d H:i:s");
//echo PHP_EOL . PHP_EOL . "COMMENTS IMPORTED" . PHP_EOL . PHP_EOL . $relacionados_imported . PHP_EOL;
//echo PHP_EOL . PHP_EOL . "IDNOTICIAS IMPORTED" . PHP_EOL . PHP_EOL . $idnoticias_imported . PHP_EOL;

try
{
	$dbp = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
	if ($relacionados_imported)
		{ 
		$sql = "SELECT idrelacionado, idnoticia, tipo, enlace FROM relacionado WHERE idnoticia IN ($idnoticias_imported) AND idrelacionado NOT IN ($relacionados_imported) AND tipo NOT IN ('foto', 'video', 'otro') ORDER BY idnoticia DESC LIMIT $limit;";
		}
	else
		{
		$sql = "SELECT idrelacionado, idnoticia, tipo, enlace FROM relacionado WHERE idnoticia IN ($idnoticias_imported) AND tipo NOT IN ('foto', 'video', 'otro') ORDER BY idnoticia DESC LIMIT $limit;";
		//$sql = "SELECT idrelacionado, idnoticia, tipo, enlace FROM relacionado WHERE idnoticia IN ($idnoticias_imported) AND tipo IN ('info') ORDER BY idnoticia DESC LIMIT $limit;";
		//$sql = "SELECT idrelacionado, idnoticia, nombre, email, relacionado, ip, creacion FROM relacionado WHERE idnoticia IN ($idnoticias_imported) AND estado = 'A' ORDER BY idnoticia DESC LIMIT $limit;";
		}
//echo $sql;
    	foreach ($dbp->query($sql) as $row)
        {
		$idrelacionado = $row['idrelacionado'];
		$post_id = $row['idnoticia'];
		$enlace = $row['enlace'];
		$tipo = $row['tipo'];
		$related_post = substring_index($enlace, '/', -1);
		$has_infografia = substr_count($enlace, 'infografia');
		$related_post_id = (substr_count($related_post, '-')) ? substring_index($related_post, '-', 1) : $related_post;
		if ($has_infografia)
		{
			echo "Original Post = $post_id    and    Infografia = $related_post_id". PHP_EOL;
			$related_infografia_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts where post_type = 'infografia' and post_name = $related_post_id");
			if ($related_infografia_id)
			{
				$related_post_id = $related_infografia_id;
				echo "New Related POST ID = $related_post_id". PHP_EOL;
			}
			else
			{
				echo 'Could not find Infografia or something went wrong!!'. PHP_EOL;
			} 
		}
		else
		{
			echo "Original Post = $post_id    and    Related Post ID = $related_post_id    Tipo = $tipo      enlace = $enlace     related post = $related_post". PHP_EOL;
		}
		if (substr_count($related_post_id, '#') && substr_count($enlace, 'www.laprensa.com.ni'))
		{
			$related_post_id = substring_index($related_post_id, '#', 1);
		}
		if (is_numeric($related_post_id))
		{
			$posts_to_update[$post_id][] = $related_post_id;
			$updated_posts[] = $post_id;
			$relacionado_meta = add_post_meta( $post_id, 'idrelacionado', $idrelacionado, false );
		}
//		$new_comment_id = wp_insert_comment( $data );
//		add_comment_meta( $new_comment_id, 'idrelacionado', $idrelacionado, true );
	//	echo PHP_EOL . "http://noticias.laprensa.com.ni/?p=" . $idnoticia . PHP_EOL;
	//	echo PHP_EOL . "new_comment_id = $new_comment_id ... idrelacionado = $idcomentatio ... $relacionado" . PHP_EOL;

	}
$dbp = null;
}
catch(PDOException $e)
{
echo 'Shucks!';
}
//var_dump($posts_to_update);
echo PHP_EOL . PHP_EOL;
$updated_posts = array_unique($updated_posts);
foreach ($updated_posts as $new_post)
{
        echo 'http://noticias.laprensa.com.ni/?p=' . $new_post . PHP_EOL;
	$meta_value = implode(',', $posts_to_update[$new_post]);
	echo $meta_value . PHP_EOL;
	$bawmrp_meta = add_post_meta( $new_post, '_yyarpp', "$meta_value", true);
        $i++;
}

echo "\n Importacion Completa! \n\n";
echo PHP_EOL . $i . ' Posts Processed ' . PHP_EOL;
echo PHP_EOL . "start time : $start_time";
echo PHP_EOL . "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
//get_footer();
//echo '<meta http-equiv="refresh" content="60;http://hoy.doap.com/hoy-import.php" />';
//<meta http-equiv="refresh" content="30=http://hoy.doap.com/hoy-import.php">
?>
