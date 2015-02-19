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
$limit = '50';
date_default_timezone_set('America/Managua');
$b = time();
$month = date("m", $b);
$monthspelled = date("M", $b);
$day = date("D", $b);
$numday = date("d", $b);
$year = date("Y", $b);

$portadas_imported = array();
$portadas_imported_var = '';
/*** pgsql connector ***/
try {
    $db = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

$portadas_imported= $wpdb->get_col( "SELECT meta_value FROM $wpdb->postmeta where meta_key = 'idedicion' ORDER BY ABS(meta_value) ASC;" );

usleep(50000);
//$metavals3= implode( ",", $articles_imported);
$portadas_imported_var = implode( ",", $portadas_imported);
$last_imported = $portadas_imported['0'];
if ( $portadas_imported_var == null)  $portadas_imported_var = 20151313;

echo "portadas_imported_var $portadas_imported_var";
echo "last_imported = $last_imported";
echo var_dump($portadas_imported);

try 
{
        $dbp = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
//	$sql = "SELECT * FROM portada where idedicion NOT IN ($portadas_imported_var) and idedicion IN ($mon_sat_edicions_var) ORDER BY ABS(orden) ASC LIMIT $limit;";
	$sql = "SELECT edicion,portada,pdf,paginas,idedicion,numero FROM edicion WHERE edicion IS NOT NULL and estado = 'A' and idedicion NOT IN ($portadas_imported_var) ORDER BY edicion DESC limit $limit;";


	foreach ($dbp->query($sql) as $row)
	{
		$idedicion= $row['idedicion'];
                $edicion = $row['edicion'];

usleep(500000);
		date_default_timezone_set('America/Managua');
		$creacion = $edicion;
                $articledate = $creacion;
                $articledate = $row['edicion'];
		$articledate = strtotime($articledate);
		$articlemonth = date("m", $articledate);
		$articleyear = date("Y", $articledate);
		$articleday = date("d", $articledate);
		$string = strtotime($creacion);
		$x=date("r", $string);
		
		$portadajpg = $row['portada'];
		$num_paginas = $row['paginas'];
		$portadapdf = $row['pdf'];
		$idedicion= $row['idedicion'];
		$edicion_num= $row['numero'];

                //$permanoticia = $portadajpg;
                $permanoticia = 'Edición No. ' . $edicion_num . ' - ' . $edicion;
                $permalink = sanitize_title_with_dashes($edicion);

                $post = array(
                  'comment_status' => 'closed',
                  'ping_status'    => 'closed', // 'closed' means pingbacks or trackbacks turned off
                  'post_author'    => $author,    //The user ID number of the author.
                  'post_content'   => '', //The full text of the post.
                  'post_date'      => $creacion, //The time post was made.
                  'post_date_gmt'  => $creacion, //The time post was made, in GMT.
                 // 'post_excerpt'   => '', //For all your post excerpt needs.
                  'post_name'      => $permalink, // The name (slug) for your post
                //  'post_parent'    => [ <post ID> ] //Sets the parent of the new post.
                  'post_status'    => 'draft',    //Set the status of the new post.
                  'post_title'     => $permanoticia, //The title of your post.
        //        'post_category'     => array( '1', '$articlesection', '3', '4'),  //The title of your post.
                  'post_type'      => 'post' //You may want to insert a regular post, page, link, a menu item or some custom post type
                //  'tags_input'     => $articletags //For tags.
                 // 'tax_input'      => [ array( 'taxonomy_name' => array( 'term', 'term2', 'term3' ) ) ] // support for custom taxonomies.
                );

	echo "\n post_id = $post_id \n";
	echo "date = $articledate . \n";
	echo "creacion = $creacion . \n";
	echo "month = $articlemonth . \n";
	echo "year $articleyear . \n";
	echo "permalink $permalink . \n";
	echo "idedicion $idedicion. \n";


                $article_exists = $wpdb->get_var( "SELECT * FROM $wpdb->postmeta where meta_key = 'idedicion' and meta_value = $idedicion limit 1;" );

usleep(50000);
                if( $article_exists == null )
		{
	                $post_id = wp_insert_post($post);
usleep(50000);
	                $migrated_portada = add_post_meta( $post_id, 'idedicion', $idedicion, true );
usleep(50000);
			$post_cat = 3680;
			$articletags = 'Portada Impresa, portada';
			$post_term_results = wp_set_post_terms( $post_id, $post_cat, 'category' );
usleep(50000);
			$post_term_results = wp_set_post_terms( $post_id, $articletags );
usleep(50000);

	//for troubleshooting
	echo "\n post_id = $post_id \n";
	echo "date = $articledate . \n";
	echo "creacion = $creacion . \n";
	echo "month = $articlemonth . \n";
	echo "year $articleyear . \n";
	//break;

			$cat_post_pic = '/var/www/html/laprensa/files/edicion/' . $portadajpg;
			$attach_id_jpg = uploadNewImage($cat_post_pic, $portadajpg, $permanoticia);
usleep(50000);
                        if ( $attach_id_jpg )
			{
				$migrated_portada = add_post_meta( $attach_id_jpg, 'edicion_jpg', $idedicion, true );
usleep(50000);
				echo PHP_EOL . PHP_EOL . "migrated_portada = " . $migrated_portada . PHP_EOL;
				set_post_thumbnail( $post_id, $attach_id_jpg );
usleep(50000);
				s3CopyImage($attach_id_jpg);
usleep(50000);
			}
			else
			{
				wp_delete_post($post_id, 1);
			}	


			$cat_post_pic = '/var/www/html/laprensa/files/edicion/' . $portadapdf;
			$attach_id_pdf = uploadNewImage($cat_post_pic, $portadapdf, $permanoticia);
usleep(50000);
                        if ( $attach_id_pdf )
			{
				$migrated_portada = add_post_meta( $attach_id_pdf, 'edicion_pdf', $idedicion, true );
usleep(50000);
				echo PHP_EOL . PHP_EOL . "migrated_portada = " . $migrated_portada . PHP_EOL;
usleep(50000);
				s3CopyImage($attach_id_pdf);
usleep(50000);
			}

			$i++;

			if ($i == 200) break;

		}

		$pdfimage = wp_get_attachment_image_src( $attach_id_pdf, 'full' );
		$pdf_image_tag = '<a href="' . $pdfimage['0'] . '" target="_blank">Hace Clic para ver PDF/Hi-Res Imagen</a>';
		$portada_content = $permanoticia . ' - ' . $num_paginas . ' páginas' . PHP_EOL . '<br>' . PHP_EOL . $pdf_image_tag; 

echo PHP_EOL . PHP_EOL . $portada_content . PHP_EOL . PHP_EOL;

//		remove_filter('content_save_pre', 'wp_filter_post_kses');
//		remove_filter('content_filtered_save_pre', 'wp_filter_post_kses');

		$update_post = array(
		       'ID'             => $post_id,
		       'post_content'   => $portada_content, //The full text of the post.
		       'post_date'      => $creacion, //The time post was made.
		       'post_date_gmt'  => $creacion,
		       'post_status'    => 'publish' ////The time post was made, in GMT.
		);

		$update_post_results = wp_update_post($update_post);
usleep(50000);
//		add_filter('content_save_pre', 'wp_filter_post_kses');
//		add_filter('content_filtered_save_pre', 'wp_filter_post_kses');
	}
	$dbp = null;
}
catch(PDOException $e)
{
}
//echo '<meta http-equiv="refresh" content="20;http://hoy.doap.com/hoy-portadas.php" />';
//<meta http-equiv="refresh" content="30=http://hoy.doap.com/hoy-import.php">
?>
