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
$author = '110';
$limit = '50';
date_default_timezone_set('America/Managua');
$b = time();
$month = date("m", $b);
$monthspelled = date("M", $b);
$day = date("D", $b);
$numday = date("d", $b);
$year = date("Y", $b);

$pic_search_string = '"</p></div></div>'; 

$caricatura_html= <<<'EOT'
<div class="header container">
<div class ="manuel">
<div class="g-page" align="center" data-width="330" data-href="//plus.google.com/112598034920157494570" data-rel="publisher"></div>
<script type="text/javascript" src="/scripts/manuel.js"></script>
<script type="text/javascript">
manuel();
</script></div></div>
EOT;

$caricaturas_imported = array();
$caricaturas_imported_var = '';
/*** pgsql connector ***/
try {
    $db = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

$caricaturas_imported= $wpdb->get_col( "SELECT DISTINCT meta_value FROM $wpdb->postmeta where meta_key = 'idcaricatura' ORDER BY ABS(meta_value) DESC;" );

//usleep(50000);
//$metavals3= implode( ",", $articles_imported);
$caricaturas_imported_var = implode( ",", $caricaturas_imported);
$last_imported = $caricaturas_imported['0'];
if ( $caricaturas_imported_var == null)  $caricaturas_imported_var = 99999; 

//echo "caricaturas_imported_var $caricaturas_imported_var";
echo "last_imported = $last_imported";
//echo var_dump($caricaturas_imported);

try 
{
        $dbp = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
//	$sql = "SELECT * FROM caricatura where idcaricatura NOT IN ($caricaturas_imported_var) and idedicion IN ($mon_sat_edicions_var) ORDER BY ABS(orden) ASC LIMIT $limit;";
	$sql = "SELECT caricatura.idcaricatura,caricatura.idedicion,caricatura.caricatura,caricatura.orden,caricatura.creacion,edicion.edicion FROM caricatura INNER JOIN edicion ON caricatura.idedicion = edicion.idedicion WHERE idcaricatura NOT IN ($caricaturas_imported_var) and caricatura.idedicion IN (SELECT idedicion FROM edicion WHERE extract(dow FROM edicion) <> 0) and caricatura.caricatura <> '' ORDER BY ABS(caricatura.orden) ASC LIMIT $limit;";


	foreach ($dbp->query($sql) as $row)
	{
		$idcaricatura= $row['idcaricatura'];

//usleep(500000);
		date_default_timezone_set('America/Managua');
                $string = $row['creacion'];
                $pos = strrpos( $string, '.');
                if ($pos !== false)
		{
                    $creacion = substr($string, 0, $pos );
                }
                else
		{
                    $creacion = $string;
                }
                $articledate = $creacion;
                $articledate = $row['edicion'];
                $edicion = $row['edicion'];
		$articledate = strtotime($articledate);
		$articlemonth = date("m", $articledate);
		$articleyear = date("Y", $articledate);
		$articleday = date("d", $articledate);
		$string = strtotime($creacion);
		$x=date("r", $string);
		
		$caricaturaname = $row['caricatura'];
		$idcaricatura= $row['idcaricatura'];

                //$permanoticia = $caricaturaname;
                $permanoticia = 'Caricatura Del Dia - ' . $edicion;
                $permalink = sanitize_title_with_dashes($permanoticia);
                if (strlen($permanoticia) > 60 )
		{
                	$permanoticia=substr($permanoticia,0,60);
                	//$permanoticia = 'Caricatura Del Dia - ' . $edicion;
                	$permalink = sanitize_title_with_dashes($permanoticia);
                	$permanoticia= $permanoticia . '...';
                }

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

//	echo "date = $articledate . \n";
//	echo "creacion = $creacion . \n";
//	echo "month = $articlemonth . \n";
//	echo "year $articleyear . \n";
//	echo "permalink $permalink . \n";


                $article_exists = $wpdb->get_var( "SELECT * FROM $wpdb->postmeta where meta_key = 'idcaricatura' and meta_value = $idcaricatura limit 1;" );

//usleep(50000);
                if( $article_exists == null )
		{
	                $post_id = wp_insert_post($post);
//usleep(50000);
	                $migrated_caricatura = add_post_meta( $post_id, 'idcaricatura', $idcaricatura, true );
//usleep(50000);
			$post_cat = 1672;
			$articletags = 'Manuel Guillén, caricatura';
			$post_term_results = wp_set_post_terms( $post_id, $post_cat, 'category' );
//usleep(50000);
			$post_term_results = wp_set_post_terms( $post_id, $articletags );
//usleep(50000);

	//for troubleshooting
	echo "\n post_id = $post_id \n";
	echo "date = $articledate . \n";
	echo "creacion = $creacion . \n";
	echo "month = $articlemonth . \n";
	echo "year $articleyear . \n";
	echo "idcaricatura $idcaricatura. \n";
	//break;

			$cat_post_pic = '/var/www/html/laprensa/files/caricatura/' . $caricaturaname;

	echo "cat_post_pic = $cat_post_pic. \n";
	echo "caricaturaname = $caricaturaname. \n";
	echo "permanoticia = $permanoticia. \n";
			$attach_id = uploadNewImage($cat_post_pic, $caricaturaname, $permanoticia);
	echo "attach_id $attach_id . \n";
//usleep(50000);
                        if ( $attach_id )
			{
				$migrated_caricatura = add_post_meta( $attach_id, 'idcaricatura', $idcaricatura, true );
//usleep(50000);
				echo PHP_EOL . PHP_EOL . "migrated_caricatura = " . $migrated_caricatura . PHP_EOL;
				set_post_thumbnail( $post_id, $attach_id );
//usleep(50000);
				s3CopyImage($attach_id);
//usleep(50000);
			}
			else
			{
				wp_delete_post($post_id, 1);
			}	
			$i++;

			if ($i == 200) break;

		}
		//update post caricatura and add metadata

//		$pics_imported= $wpdb->get_col( "SELECT guid FROM $wpdb->posts where post_parent = $post_id and post_type = 'attachment' and post_mime_type like 'image%' ORDER BY ID ASC;" );
		//$metavals3= implode( ",", $articles_imported);
//		$pics_imported_var = implode( ",", $pics_imported);
//		$caricatura_first_pic = $pics_imported['0'];

//		$caricatura_image_caption = '[caption id="attachment_' . $attach_id .'" align="aligncenter" width="600"]<img class="size-large wp-image-' . $attach_id . '" alt="' . $permanoticia . '" src="' . $caricatura_first_pic . '" width="600" height="445">' . $permanoticia . '[/caption]';
		$caricatura_content = $caricatura_html; 

echo PHP_EOL . PHP_EOL . $caricatura_content . PHP_EOL . PHP_EOL;

		remove_filter('content_save_pre', 'wp_filter_post_kses');
		remove_filter('content_filtered_save_pre', 'wp_filter_post_kses');

		$update_post = array(
		       'ID'             => $post_id,
		       'post_content'   => $caricatura_content, //The full text of the post.
		       'post_date'      => $creacion, //The time post was made.
		       'post_date_gmt'  => $creacion,
		       'post_status'    => 'publish' ////The time post was made, in GMT.
		);

		$update_post_results = wp_update_post($update_post);
//usleep(50000);
		add_filter('content_save_pre', 'wp_filter_post_kses');
		add_filter('content_filtered_save_pre', 'wp_filter_post_kses');
	}
	$dbp = null;
}
catch(PDOException $e)
{
}
//echo '<meta http-equiv="refresh" content="20;http://hoy.doap.com/hoy-caricaturas.php" />';
//<meta http-equiv="refresh" content="30=http://hoy.doap.com/hoy-import.php">
?>
