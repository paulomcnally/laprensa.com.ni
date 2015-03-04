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
$limit = '5';
//$limit = '400';
date_default_timezone_set('America/Managua');
$b = time();
$month = date("m", $b);
$monthspelled = date("M", $b);
$day = date("D", $b);
$numday = date("d", $b);
$year = date("Y", $b);
$lastBuildDate = $day . ', ' . $numday . ' ' . $monthspelled . ' ' . $year . ' 00:00:00 +0600';
$lastBuildDate = 'Wed, 02 Oct 2002 15:00:00 +0200';
if (isset($_GET['seccion']) && ($_GET['seccion'] || '')) { $seccion = $_GET['seccion']; }
if (isset($_GET['edicion'])) { $idedicion = $_GET['edicion']; } else { $idedicion = date("Y-m-d"); }
$pic_search_string = '"</p></div></div>'; 
$categories_to_import = "21";
$section=array("5" => "3", "53" => "3", "7" => "17", "29" => "17", "1" => "21", "27" => "21", "3" => "22", "11" => "22", "35" => "22", "10" => "10", "31" => "10", "34" => "25", "9" => "26", "52" => "26", "2" => "27", "30" => "27", "21" => "991", "6" => "30", "8" => "31", "32" => "31");
$ubicacion=array("H" => "3516", "A" => "2271", "C" => "3515", "E" => "23");

/*** pgsql connector ***/
try {
    $db = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
$articles_imported2 = $wpdb->get_col( "SELECT distinct meta_value FROM $wpdb->postmeta where meta_key = 'idnoticia' and post_id = meta_value ORDER BY ABS(meta_value) DESC;" );
//usleep(50000);

$metavals4= implode( ",", $articles_imported2);
//$last_imported = $articles_imported2['0'];
$last_imported = '186499';
echo "\n Comenzando Importacion <br>\n\n" . PHP_EOL;
echo date("Y-m-d H:i:s");
$start_time = date("Y-m-d H:i:s");
//echo "\n <br>articulos importado ya = $metavals4 <br>\n\n\n\n" . PHP_EOL;
echo "\n <br>ultimo articulo importado = $last_imported <br>\n\n\n\n" . PHP_EOL;
//echo $metavals4;

try
{
	$dbp = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
	if ($metavals4)
		{ 
		//$sql = "select  noticia.idnoticia, noticia.creacion, seccion.seccion, seccion.idseccion, noticia.noticia, noticia.resumen, noticia.texto, noticia.ultimahora, noticia.claves, noticia.intro, noticia.antetitulo, noticia.ubicacion from noticia, seccion WHERE seccion.idseccion = noticia.idseccion and noticia.idnoticia > $last_imported and noticia.idnoticia NOT IN ($metavals4) and seccion.idseccion IN ($categories_to_import) ORDER BY noticia.idnoticia asc limit $limit"; 
		$sql = "SELECT noticia.idnoticia, noticia.creacion, seccion.seccion, seccion.idseccion, noticia.noticia, noticia.resumen, noticia.texto, noticia.ultimahora, noticia.claves, noticia.intro, noticia.antetitulo, noticia.ubicacion, noticia.orden, edicion.edicion FROM noticia, seccion, edicion WHERE seccion.idseccion = noticia.idseccion and edicion.idedicion = noticia.idedicion and noticia.idnoticia IN ($metavals4) and noticia.idseccion IN ($categories_to_import) ORDER BY noticia.idnoticia DESC"; 
		//$sql = "SELECT noticia.idnoticia, noticia.creacion, seccion.seccion, seccion.idseccion, noticia.noticia, noticia.resumen, noticia.texto, noticia.ultimahora, noticia.claves, noticia.intro, noticia.antetitulo, noticia.ubicacion, noticia.orden, edicion.edicion FROM noticia, seccion, edicion WHERE seccion.idseccion = noticia.idseccion and edicion.idedicion = noticia.idedicion and noticia.idnoticia NOT IN ($metavals4) and seccion.idseccion IN ($categories_to_import) and noticia.idedicion = 1792 ORDER BY noticia.idnoticia DESC limit $limit"; 
		}
	else
		{
		$sql = "select  noticia.idnoticia, noticia.creacion, seccion.seccion, seccion.idseccion, noticia.noticia, noticia.resumen, noticia.texto, noticia.claves, noticia.ultimahora, noticia.intro, noticia.antetitulo, noticia.ubicacion from noticia, seccion WHERE seccion.idseccion = noticia.idseccion and seccion.idseccion IN ($categories_to_import) ORDER BY noticia.idnoticia asc limit $limit"; 
		}

//echo PHP_EOL . $sql . PHP_EOL;
    	foreach ($dbp->query($sql) as $row)
        {
		date_default_timezone_set('America/Managua');
		$idnoticia = $row['idnoticia'];
		$articlesection= $row['idseccion'];
		$post_id = $idnoticia;
		$articledate = $creacion;
		$articledate = strtotime($articledate);
		$articlemonth = date("m", $articledate);
		$articleyear = date("Y", $articledate);
		$articleday = date("d", $articledate);
		$string = strtotime($creacion);
		//	$x=date("r", $string);
//			$articletext = html_entity_decode($articletext,ENT_QUOTES,"UTF-8");
		$articlesection= $section[$articlesection];
		$post_cat = $articlesection;

		$post_term_results = wp_set_post_terms( $post_id, $post_cat, 'category' );
			echo PHP_EOL . "idnoticia = $idnoticia";
			echo PHP_EOL . "\n post_term_resulta= $post_term_results \n\n";
			echo PHP_EOL . "\n article section = $articlesection \n\n";
			echo PHP_EOL . "post_cat = $post_cat ";
			$new_posts[] = 'http://noticias.laprensa.com.ni/index.php?p=' . $post_id . PHP_EOL;
		var_dump($post_term_results);
//usleep(50000);
	}
$dbp = null;
}
catch(PDOException $e)
{
echo 'Shucks!';
}

echo "\n Importacion Completa! \n\n";
foreach ($new_posts as $new_post)
{
	echo $new_post;
	$i++;
}
echo PHP_EOL . $i . ' Posts Processed ' . PHP_EOL;
echo PHP_EOL . "start time : $start_time";
echo PHP_EOL . "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
//get_footer();
//echo '<meta http-equiv="refresh" content="60;http://hoy.doap.com/hoy-import.php" />';
//<meta http-equiv="refresh" content="30=http://hoy.doap.com/hoy-import.php">
?>
