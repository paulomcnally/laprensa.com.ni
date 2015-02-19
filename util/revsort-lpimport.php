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
//$limit = '1000';
$limit = '400';
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
$categories_to_import = "5, 53, 7, 29, 1, 27, 3, 11, 35, 10, 31, 34, 9, 52, 2, 30, 21, 6, 8, 32, 56, 43, 19, 12, 28, 36, 33, 51, 24, 23, 20, 49, 22, 48";
//$categories_to_import = "48";
$section=array("5" => "3", "53" => "3", "7" => "17", "29" => "17", "1" => "21", "27" => "21", "3" => "22", "11" => "22", "35" => "22", "10" => "10", "31" => "10", "34" => "25", "9" => "26", "52" => "26", "2" => "27", "30" => "27", "21" => "991", "6" => "30", "8" => "31", "32" => "31", "56" => "64139", "43" => "32", "19" => "64140", "12" => "64136", "28" => "1677", "36" => "64141", "33" => "63968", "51" => "64137", "24" => "64138", "23" => "63721", "20" => "64134", "49" => "64135", "22" => "1676", "48" => "65465");
$ubicacion=array("H" => "3516", "A" => "2271", "C" => "3515", "E" => "23");
/*
$user_login = 'badmin';
$creds = array();
$creds['user_login'] = 'badmin';
$creds['user_password'] = 'fr1ck0ff';
$creds['remember'] = true;

$user = wp_signon( $creds, false );
$userID = $user->ID;

wp_set_current_user( $userID, $user_login );
wp_set_auth_cookie( $userID, true, false );
do_action( 'wp_login', $user_login );
//var_dump($user);
$current_user = wp_get_current_user();
echo PHP_EOL . PHP_EOL . PHP_EOL;
//var_dump($current_user);
echo 'IS USER LOGGED IN?' . is_user_logged_in();
*/
//exit;
/*** pgsql connector ***/
try {
    $db = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
$articles_imported2 = $wpdb->get_col( "SELECT distinct meta_value FROM $wpdb->postmeta where meta_key = 'idnoticia' ORDER BY ABS(meta_value) DESC;" );
//usleep(50000);

$metavals4= implode( ",", $articles_imported2);
//$last_imported = $articles_imported2['0'];
$last_imported = '186499';
echo "\n Comenzando Importacion <br>\n\n" . PHP_EOL;
echo date("Y-m-d H:i:s");
$start_time = date("Y-m-d H:i:s");
//echo "\n <br>articulos importado ya = $metavals4 <br>\n\n\n\n" . PHP_EOL;
echo "\n <br>ultimo articulo importado = $last_imported <br>\n\n\n\n" . PHP_EOL;

try	{
	$dbp = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
	if ($metavals4)
		{ 
	//$sql = "select  noticia.idnoticia, noticia.creacion, seccion.seccion, seccion.idseccion, noticia.noticia, noticia.resumen, noticia.texto, noticia.ultimahora, noticia.claves, noticia.intro, noticia.antetitulo, noticia.ubicacion from noticia, seccion WHERE seccion.idseccion = noticia.idseccion and noticia.idnoticia > $last_imported and noticia.idnoticia NOT IN ($metavals4) and seccion.idseccion IN ($categories_to_import) ORDER BY noticia.idnoticia asc limit $limit"; 
		//$sql = "SELECT noticia.idnoticia, noticia.creacion, seccion.seccion, seccion.idseccion, noticia.noticia, noticia.resumen, noticia.texto, noticia.ultimahora, noticia.claves, noticia.intro, noticia.antetitulo, noticia.ubicacion, noticia.orden, edicion.edicion FROM noticia, seccion, edicion WHERE noticia.idnoticia > 197859 and seccion.idseccion = noticia.idseccion and edicion.idedicion = noticia.idedicion and noticia.idnoticia NOT IN ($metavals4) and seccion.idseccion IN ($categories_to_import) and noticia.idedicion < 1849 and edicion.estado = 'A' ORDER BY noticia.idnoticia DESC limit $limit"; 
		$sql = "SELECT noticia.idnoticia, noticia.creacion, seccion.seccion, seccion.idseccion, noticia.noticia, noticia.resumen, noticia.texto, noticia.claves, noticia.intro, noticia.antetitulo, noticia.ubicacion, noticia.orden, edicion.edicion FROM noticia, seccion, edicion WHERE seccion.idseccion = noticia.idseccion and edicion.idedicion = noticia.idedicion and noticia.idnoticia NOT IN ($metavals4) and seccion.idseccion IN ($categories_to_import) and noticia.idedicion < 1893 and edicion.estado = 'A' and edicion.edicion < '2014-09-20' ORDER BY noticia.idnoticia DESC limit $limit"; 
		//$sql = "SELECT noticia.idnoticia, noticia.creacion, seccion.seccion, seccion.idseccion, noticia.noticia, noticia.resumen, noticia.texto, noticia.ultimahora, noticia.claves, noticia.intro, noticia.antetitulo, noticia.ubicacion, noticia.orden, edicion.edicion FROM noticia, seccion, edicion WHERE seccion.idseccion = noticia.idseccion and edicion.idedicion = noticia.idedicion and noticia.idnoticia NOT IN ($metavals4) and seccion.idseccion IN ($categories_to_import) and noticia.idedicion = 1792 ORDER BY noticia.idnoticia DESC limit $limit"; 
		}
	else
		{
		//$sql = "select  noticia.idnoticia, noticia.creacion, seccion.seccion, seccion.idseccion, noticia.noticia, noticia.resumen, noticia.texto, noticia.claves, noticia.intro, noticia.antetitulo, noticia.ubicacion from noticia, seccion WHERE seccion.idseccion = noticia.idseccion and seccion.idseccion IN ($categories_to_import) ORDER BY noticia.idnoticia asc limit $limit"; 
		$sql = "SELECT noticia.idnoticia, noticia.creacion, seccion.seccion, seccion.idseccion, noticia.noticia, noticia.resumen, noticia.texto, noticia.claves, noticia.intro, noticia.antetitulo, noticia.ubicacion, noticia.orden, edicion.edicion FROM noticia, seccion, edicion WHERE seccion.idseccion = noticia.idseccion and edicion.idedicion = noticia.idedicion and seccion.idseccion IN ($categories_to_import) and noticia.idedicion < 1893 and edicion.estado = 'A' and edicion.edicion < '2014-09-20' ORDER BY noticia.idnoticia DESC limit $limit"; 
		}

    	foreach ($dbp->query($sql) as $row)
        {
		date_default_timezone_set('America/Managua');
		$string = $row['creacion'];
		$crdate = $string;
		$pos1 = strrpos( $string, '.');
		if ($pos1 !== false) {
		    $creacion = substr($string, 0, $pos1 );
		}
		else  {
			$creacion = $string;
		}
		$idnoticia = $row['idnoticia'];
		$articledate = $creacion;
		$articledate = strtotime($articledate);
		$articlemonth = date("m", $articledate);
		$articleyear = date("Y", $articledate);
		$articleday = date("d", $articledate);
		$string = strtotime($creacion);
		//	$x=date("r", $string);
		$articletext = $row['texto'];
		$articletext = str_ireplace("<p>&nbsp;</p>","",$articletext);
//			$articletext = html_entity_decode($articletext,ENT_QUOTES,"UTF-8");
		$articletext = removeEmptyLines($articletext);
		$articleexerpt= $row['resumen'];
		$articlesection= $row['idseccion'];
		$articleedition= $row['edicion'];
		$articlepeso = ($row['order']) ? int($row['order']) : 0;
		$articlesection= $section[$articlesection];
		$articleubicacion= $row['ubicacion'];
		$articleubicacion= $ubicacion[$articleubicacion];
		$articletags= $row['claves'];
//		$articleultimahora = $row['ultimahora'];
		$articleintro= $row['intro'];
		$antetitulo = $row['antetitulo'];

		if ( $articleubicacion )
		{
			$articlesection = $articleubicacion . ',' . $articlesection;
		}
		//if ($articlepeso !> 0) $articlepeso = 0;
		echo "\n idnoticia = $idnoticia \n\n";
		echo "\n creacion = $creacion \n\n";
		echo "\n article section = $articlesection \n\n";
		echo "\n article ubicacion= $articleubicacion\n\n";
		//echo "\n article text = $articletext \n\n";
		echo "\n article tags = $articletags \n\n";

		$permanoticia = $row['noticia'];
		if ($permanoticia == 'Titular por asignar' ) $permanoticia = $articleexerpt;
		if (substr_count($articletext,'Cuerpo de la nota. Por completar') === 1) $post_status = 'draft';
		if ( strlen($articleexerpt) == 1)
		{
			$permanoticia = $articleexerpt . $permanoticia;
			$articleexerpt = '';
			$articletext= $articleexerpt . $articletext;
		}
		$permanoticia = ucfirst($permanoticia);

		$permalink = remove_accents($permanoticia);
		if (strlen($permalink) > 60 )
		{
			$permalink = substr($permanoticia,0,60);
			$permalink = substr($permanoticia, 0, strrpos( $permalink, ' ') );
			$permalink = remove_accents($permanoticia);
		}
		$articletext = str_replace('<p> </p>','',$articletext);
		$today = date("Y-m-d"); 
		if ($articleedition > $today)
		{
			$post_status = 'future';
		}
		else
		{
			$post_status = 'publish';
		}
		$gm_creacion = gmdate("Y-m-d H:i", strtotime($creacion));
		if ($articleedition > $creacion)
		{
			$creacion = $articleedition . ' 00:00:01';
			$gm_creacion = $articleedition . ' 06:00:01';
		}
		if ($permanoticia == 'Titular por asignar' ) $permanoticia = $articleexerpt;
		if (substr_count($articletext,'Cuerpo de la nota. Por completar') === 1) $post_status = 'draft';
		$post = array(
			  'comment_status' => 'open',
			  'ping_status'    => 'open', // 'closed' means pingbacks or trackbacks turned off
			  'post_author'    => $author,    //The user ID number of the author.
			  'post_content'   => $articletext, //The full text of the post.
			  'post_date'      => $creacion, //The time post was made.
			  'post_date_gmt'  => $gm_creacion, //The time post was made, in GMT.
			  'post_excerpt'   => $articleexerpt, //For all your post excerpt needs.
			  'post_name'      => $permalink, // The name (slug) for your post
			//  'post_parent'    => [ <post ID> ] //Sets the parent of the new post.
			  'post_status'    => $post_status,    //Set the status of the new post.
			  'post_title'     => $permanoticia, //The title of your post.
		//	  'post_category'     => array( '1', '$articlesection', '3', '4'),  //The title of your post.
			  'post_type'      => 'post' //You may want to insert a regular post, page, link, a menu item or some custom post type
			//  'tags_input'     => $articletags //For tags.
			 // 'tax_input'      => [ array( 'taxonomy_name' => array( 'term', 'term2', 'term3' ) ) ] // support for custom taxonomies. 
		);  

		$article_exists = $wpdb->get_var( "SELECT * FROM $wpdb->postmeta where meta_key = 'idnoticia' and meta_value = $idnoticia limit 1;" );
//usleep(50000);

		if( $article_exists == null )
		{
			$post_id = wp_insert_post($post);
//usleep(50000);
			echo "\n post creado - # = $post_id \nhttp://noticias.laprensa.com.ni/index.php?p=$post_id\n";
			$new_posts[] = 'http://noticias.laprensa.com.ni/index.php?p=' . $post_id . PHP_EOL;
			$post_cat = $articlesection;
			$post_term_results = wp_set_post_terms( $post_id, $post_cat, 'category' );
			$post_term_results = wp_set_post_terms( $post_id, $articletags );

			$peso_key = '_peso';
			$peso_value = 'field_53928c088c264';
			$edicion_key = '_edicion';
			$edicion_value = 'field_5392f40e4c56b';
			$destacado_key = '_destacado';
			$destacado_value = 'field_539505501fe87';
			$breves_key = '_breves';
			$breves_value = 'field_53950cfd36d92';
			$pm_edicion_result = add_post_meta( $post_id, $edicion_key, $edicion_value, true );
			$pm_peso_result = add_post_meta( $post_id, $peso_key, $peso_value, true );
			$pm_destacado_result = add_post_meta( $post_id, $destacado_key, $destacado_value, true );
			$pm_breves_result = add_post_meta( $post_id, $breves_key, $breves_value, true );
			add_post_meta( $post_id, 'edicion', $articleedition, true );
			add_post_meta( $post_id, 'peso', $articlepeso, true );
			add_post_meta( $post_id, 'destacado', 0, true );
			add_post_meta( $post_id, 'breves', 0, true );
			$migrated_idnoticia = add_post_meta( $post_id, 'idnoticia', $idnoticia, true );
//usleep(50000);
			if(!empty($articleintro))
			{
				$intro_results = add_post_meta( $post_id, 'intro', $articleintro, true );
			}
       		        if (!empty($antetitulo))
	                {
       	 		$antetitulo_meta_id = add_post_meta( $post_id, 'antetitulo', $antetitulo, true );
//usleep(50000);
	                }

			try     {
			        $dbautor = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );

				$sqlautor = "select distinct autor.autor from autor, credito WHERE autor.idautor = credito.idautor and credito.idnoticia =$idnoticia limit $limit";

			        foreach ($dbautor->query($sqlautor) as $row)
			        {
					$articleauthor= $row['autor'];
					if(!empty($articleauthor))
					{
						$author_results = add_post_meta( $post_id, 'autor', $articleauthor, false );
					}
				}
		        	$dbautor = null;
	        		}
       		 	catch(PDOException $e)
       		 	{
       		 	}

//usleep(50000);
			$video_replaced_text = getVideos($articletext);
			$image_replaced_text = getNewImages($video_replaced_text);
			$strAcl = getAside($idnoticia);
			if ($strAcl)
			{
				$image_replaced_text = insertAside($image_replaced_text, $strAcl);
			}
			//$image_replaced_text = getNewImages($articletext);
			$update_post = array(
					  'ID'             => $post_id, 
					  'post_content'   => $image_replaced_text, //The full text of the post.
					  'post_exerpt'    => $articleexerpt, //The exerpt of the post.
					  'post_date'      => $creacion, //The time post was made.
					  'post_date_gmt'  => $gm_creacion,
					  'post_status'    => $post_status ////The time post was made, in GMT.
					  //'post_status'    => $publish ////The time post was made, in GMT.
			);  

			$update_post_results = wp_update_post($update_post);
//usleep(50000);
		}
	}
    		$dbp = null;
	}
catch(PDOException $e)
{
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
if ($i == 0)
{
//	var_dump();
//echo $metavals4;
echo $sql;
}
//get_footer();
//echo '<meta http-equiv="refresh" content="60;http://hoy.doap.com/hoy-import.php" />';
//<meta http-equiv="refresh" content="30=http://hoy.doap.com/hoy-import.php">
?>
