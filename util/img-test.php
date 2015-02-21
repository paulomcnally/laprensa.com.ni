#!/usr/bin/php
<?php
define('WP_USE_THEMES', true);
define('BUCKET', 'laprensa.com.ni');
/** Loads the WordPress Environment and Template */
//require_once( '/var/www/html/lpmu/wp-blog-header.php' );
$_SERVER[ 'HTTP_HOST' ] = 'noticias.laprensa.com.ni';
require_once( '/var/www/html/lpmu/wp-load.php' );
require_once('/var/www/html/lpmu/wp-config.php');
require_once('/var/www/html/lpmu/wp-includes/formatting.php');
require_once('/home/shawn/cleanfunctions.php');
//$wp->init(); $wp->parse_request(); $wp->query_posts();
//$wp->register_globals(); $wp->send_headers();
require_once( '/var/www/html/lpmu/wp-admin/includes/image.php' );
switch_to_blog('2');
global $wpdb;
$pgsql_hostname = 'lp-rds.laprensa.com.ni';
$pgsql_username = 'shawn';
$pgsql_password ='fr1ck0ff';
$pgsql_db = 'laprensa';
$pgsql_port = '5432';
$limit = '100';
//get_header();
//date stuff
date_default_timezone_set('America/Managua');
$b = time();
$month = date("m", $b);
$monthspelled = date("M", $b);
$day = date("D", $b);
$numday = date("d", $b);
$year = date("Y", $b);
$lastBuildDate = $day . ', ' . $numday . ' ' . $monthspelled . ' ' . $year . ' 00:00:00 +0600';
//$idedicion = '2013-07-28';
$lastBuildDate = 'Wed, 02 Oct 2002 15:00:00 +0200';
//if (!isset($_GET['seccion'])) { $seccion = '*'; } else { $seccion = $_GET['seccion']; }
if (isset($_GET['seccion']) && ($_GET['seccion'] || '')) { $seccion = $_GET['seccion']; }
if (isset($_GET['edicion'])) { $idedicion = $_GET['edicion']; } else { $idedicion = date("Y-m-d"); }
//connect info for pgsql.
//$pgsql_hostname = 'olympus.capk1cf67rj2.us-west-2.rds.amazonaws.com';
$pic_search_string = '"</p></div></div>'; 
//$categories_to_import = "5,53,7,29,1,27,3,11,35,10,31,34,9,52,2,30,21,6,8,32"; 
$categories_to_import = "5, 53, 7, 29, 1, 27, 3, 11, 35, 10, 31, 34, 9, 52, 2, 30, 21, 6, 8, 32";
//$section=array("5" => "3","53" => "3","7" => "17","29" => "17","1" => "21","27" => "21","3" => "22","11" => "22","35" => "22","10" => "23","31" => "23","34" => "25","9" => "26","52" => "26","2" => "27","30" => "27","21" => "28","6" => "30","8" => "31","32" => "31");
  $section=array("5" => "3", "53" => "3", "7" => "17", "29" => "17", "1" => "21", "27" => "21", "3" => "22", "11" => "22", "35" => "22", "10" => "23", "31" => "23", "34" => "25", "9" => "26", "52" => "26", "2" => "27", "30" => "27", "21" => "28", "6" => "30", "8" => "31", "32" => "31");

/*** pgsql connector ***/
try {
    $db = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
$articles_imported2 = $wpdb->get_col( "SELECT distinct meta_value FROM $wpdb->postmeta where meta_key = 'idnoticia' ORDER BY ABS(meta_value) DESC;" );
usleep(50000);
$image_sizes = get_intermediate_image_sizes();
print_r($image_sizes);
$myimage_dimensions = list_thumbnail_sizes();
foreach ($myimage_dimensions as $dimensions)
{
	echo 'image-name' . $dimensions . 'extension' . PHP_EOL;
}

echo wp_get_attachment_image( 27576, 'large', 0, $attr );

exit;


$metavals4= implode( ",", $articles_imported2);
$last_imported = '186499';
echo "\n Comenzando Importacion <br>\n\n" . PHP_EOL;
echo "\n <br>articulos importado ya = $metavals4 <br>\n\n\n\n" . PHP_EOL;
echo "\n <br>ultimo articulo importado = $last_imported <br>\n\n\n\n" . PHP_EOL;

try	{
	$dbp = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
	if ($metavals4)
		{ 
		$sql = "select  noticia.idnoticia, noticia.creacion, seccion.seccion, seccion.idseccion, noticia.noticia, noticia.resumen, noticia.texto, noticia.ultimahora, noticia.claves, noticia.intro, noticia.antetitulo from noticia, seccion WHERE seccion.idseccion = noticia.idseccion and noticia.idnoticia > $last_imported and noticia.idnoticia NOT IN ($metavals4) and seccion.idseccion IN ($categories_to_import) ORDER BY noticia.idnoticia asc limit $limit"; 
		}
	else
		{
		$sql = "select  noticia.idnoticia, noticia.creacion, seccion.seccion, seccion.idseccion, noticia.noticia, noticia.resumen, noticia.texto, noticia.claves, noticia.ultimahora, noticia.intro, noticia.antetitulo from noticia, seccion WHERE seccion.idseccion = noticia.idseccion and seccion.idseccion IN ($categories_to_import) ORDER BY noticia.idnoticia asc limit $limit"; 
		}

//echo "\n $metavals4 \n";
//echo "\n $sql \n";
//echo "\n hello \n";

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
		$articletext= $row['texto'];
		$articleexerpt= $row['resumen'];
		$articlesection= $row['idseccion'];
		$articlesection= $section[$articlesection];
		$articletags= $row['claves'];
		$articleultimahora = $row['ultimahora'];
		$articleintro= $row['intro'];
		$antetitulo = $row['antetitulo'];

		if ( $articleultimahora == 'TRUE' )
		{
			$articlesection = '1,' . $articlesection;
		}

echo "\n idnoticia = $idnoticia \n\n";
echo "\n creacion = $creacion \n\n";
echo "\n article section = $articlesection \n\n";
//echo "\n article text = $articletext \n\n";
echo "\n article tags = $articletags \n\n";

		$permanoticia = $row['noticia'];
	$post_status = 'publish';
	if ($permanoticia == 'Titular por asignar' ) $permanoticia = $articleexerpt;
	if (substr_count($articletext,'Cuerpo de la nota. Por completar') === 1) $post_status = 'draft';
	if ( strlen($articleexerpt) == 1) {
		$permanoticia = $articleexerpt . $permanoticia;
		$articleexerpt = '';
		$articletext= $articleexerpt . $articletext;
	}
		$permanoticia = ucfirst($permanoticia);


		$permalink = remove_accents($permanoticia);
		if (strlen($permanoticia) > 60 ) {
		$permanoticia=substr($permanoticia,0,60);
		$permanoticia= substr($permanoticia, 0, strrpos( $permanoticia, ' ') );
		$permalink = remove_accents($permanoticia);
		$permanoticia= $permanoticia . '...';
		}

$strAcl = getAside($idnoticia);
if ($strAcl)
{
	$articletext = insertAside($articletext,$strAcl);
}
		$post = array(
		  'comment_status' => 'open',
		  'ping_status'    => 'open', // 'closed' means pingbacks or trackbacks turned off
		  'post_author'    => '109',    //The user ID number of the author.
		  'post_content'   => $articletext, //The full text of the post.
		  'post_date'      => $creacion, //The time post was made.
		  'post_date_gmt'  => $creacion, //The time post was made, in GMT.
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
usleep(50000);

		if( $article_exists == null ) {
		$post_id = wp_insert_post($post);
usleep(50000);
		echo "\n post creado - # = $post_id \n\n";
		$post_cat = $articlesection;
		$post_term_results = wp_set_post_terms( $post_id, $post_cat, 'category' );
		$post_term_results = wp_set_post_terms( $post_id, $articletags );


		$migrated_idnoticia = add_post_meta( $post_id, 'idnoticia', $idnoticia, true );
usleep(50000);
		if(!empty($articleintro))
		{
			$intro_results = add_post_meta( $post_id, 'intro', $articleintro, true );
		}
                if (!empty($antetitulo))
                {
                        $antetitulo_meta_id = add_post_meta( $post_id, 'antetitulo', $antetitulo, true );
                usleep(50000);
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

usleep(50000);

		//1. get count of all image-na class in content
		$oldimagecount = substr_count($articletext, 'na-media');
		if ( $oldimagecount == 0 )
		{
			$article_has_no_image = 1;
		}
		else
		{
			$article_has_no_image = 0;
		}
		$oldimgcounter = $oldimagecount; 
		$image_replaced_text = $articletext;
echo '<br>article_has_no_image = ' . $article_has_no_image . '<br>';
		//2. start loop (get image ids)

		$i=1;
		while($i<=$oldimagecount)
			{
			$imagen_dbentry = 0;
			$image_name = "";
			$articleimgid = substring_index(substring_index($image_replaced_text,  ' image-', -$oldimgcounter ) ,  '"', 1 );
echo '<br><b>articleimgid = ' . $articleimgid . '</b><br>';
			if ($articleimgid)
			{
			try 	{
				//$dbp3 = new PDO("pgsql:host=$pgsql_hostname;dbname=hoy", $pgsql_username, $pgsql_password);
				$dbp3 = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
				$sql3 = "SELECT imagen,credito FROM imagen where idimagen = $articleimgid limit 1;";
				foreach ($dbp3->query($sql3) as $row3)
				        {
					 $pic = $row3['imagen'];
					 $caption = $row3['credito'];
echo '<br>pic = ' . $pic . '<br>';
					$imagen_dbentry = 1;
					}
				$dbp3 = null;
				}
				catch(PDOException $e)
				    {
					echo PHP_EOL . 'articleimgid = ' . $articleimgid . PHP_EOL;
				    }
usleep(50000);
			$pic_orig = $pic;
			$image_name = $pic;
//			$pic = str_replace(' ', '-', $pic);



			$div_start = '<div class="na-media na';
			$div_end= '</div>';
			$div_pos_start = strpos($image_replaced_text, $div_start);
			$div_pos_end_1 = strpos($image_replaced_text, $div_end, $div_pos_start);
			$div_pos_end_2 = strpos($image_replaced_text, $div_end, ($div_pos_end_1 + 1 ));
			$div_pos_end = $div_pos_end_2 - $div_pos_start + strlen($div_end);
			$div = substr( $image_replaced_text, $div_pos_start, $div_pos_end );
			$div_url = substring_index(substring_index($div, 'src="', -1 ) ,  '"', 1 );
if (!$imagen_dbentry)
{
			$image_name_full = substring_index($div_url, '/', -1 );
echo '<br>image_name = ' . $image_name_full . '<br>';
	//		$image_name_full = substring_index($div_url, substring_index($div_url, '/', -1 ), -1);
echo '<br>image_name = ' . $image_name_full . '<br>';
			$image_name = substring_index($image_name_full, substring_index($image_name_full, '_', 1 ). '_', -1);
			//$image_name = substr($image_name_full , strrpos($image_name_full,'_'),strlen($image_name_full));
//			$image_name = substr($image_name_full , strrpos($image_name_full,'_'),strlen($image_name_full));
			$processed_pic = '/var/www/html/' . substring_index($div_url, substring_index($div_url, '/', 3 ), -1);
echo '<br>processed_pic = ' . $processed_pic . '<br>';
}
			$div_info= substring_index(substring_index($div, '<div class="info"><p>', -1 ) ,  '</p></div></div>', 1 );
			$count = 1;
			$image_replaced_text = str_replace($div, "", $image_replaced_text, $count);


echo '<br>div = ' . $div. '<br>';
echo '<br>div_url = ' . $div_url . '<br>';
//echo '<br>div_info = ' . $div_info . '<br>';
echo '<br><br>';
// echo '<br> ' . $image_replaced_text . '<br>';
echo '<br><br>';
echo '<br>image_name = ' . $image_name . '<br>';




			//$image_replaced_text= substring_index($image_replaced_text,  $pic_search_string, -$oldimgcounter );
			$oldimgcounter--;

			$image_exists = -1;
			$args = array( 'post_type' => 'attachment', 'post_parent' => $post_id );
			$attachments = get_posts( $args );
			if ( $attachments ) 
				{
				foreach ( $attachments as $attachment_post ) 
					{
				if ($img_title == $attachment_post->post_title)
						{
						$image_exists = 1;
						}
					}
				}
			if ( $image_exists == -1 )
			{


			$cat_post_pic = '/var/www/html/laprensa/files/imagen/' . $image_name;
                        if (file_exists($cat_post_pic) && (!empty($image_name)))
                        {
                                $time = $articleyear . "/" . $articlemonth;
                                $wp_upload_dir = wp_upload_dir($time);
                                $file = $cat_post_pic;
                                $image_data = file_get_contents("$file");
                                $filename = sanitize_file_name(basename($cat_post_pic));
                                $sanitized_image_name = sanitize_file_name(basename($image_name));
                                if(wp_mkdir_p($wp_upload_dir['path']))
                                    $file = $wp_upload_dir['path'] . '/' . $filename;
                                else
                                    $file = $wp_upload_dir['basedir'] . '/' . $filename;
                                file_put_contents($file, $image_data);
usleep(50000);

                                //create post attachment
                                $wp_filetype = wp_check_filetype($filename, null);
                                $img_title = substring_index ($image_name, '.', 1);
                                $img_title = preg_replace('/\.[^.]+$/', '', $img_title);
                                $img_url = $wp_upload_dir['url'];
//                                $img_url = str_replace('caricatura.doap.com', 'caricatura.laprensa.com.ni',$img_url);

                                $attachment = array(
                                        'guid' => $img_url . '/' . $sanitized_image_name,
                                        'post_author'    => '109',    //The user ID number of the author.
                                        'post_mime_type' => $wp_filetype['type'],
                                        'post_title' => $sanitized_image_name,
                                        'post_content' => '',
					'post_excerpt'   => $caption, //For all your post excerpt needs.
                                        'post_status' => 'inherit'
                                );

                                $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
usleep(50000);
                                echo "\n attachment creado - # $attach_id \n\n";
                                echo $wp_upload_dir['url'] . '/' . $sanitized_image_name;



				if ( $attach_id )
					{
					$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
usleep(500000);
					$migrated_idimagen = add_post_meta( $attach_id, 'idimagen', $articleimgid, false );
					$migrated_idimagen = add_post_meta( $post_id, 'idimagen', $articleimgid, false );
	
usleep(50000);
					wp_update_attachment_metadata( $attach_id, $attach_data );
					set_post_thumbnail( $post_id, $attach_id );
usleep(50000);
						
						
$attachment_guid_array = $wpdb->get_col( "SELECT guid FROM $wpdb->posts where ID = $attach_id LIMIT 1;" );
usleep(50000);
$attachment_guid = $attachment_guid_array['0'];
$attachment_site = substring_index($attachment_guid, '/wp-content', 1);
$attachment_file = substring_index($attachment_guid, '/', -1);
$attachment_file_truncated = substr($attachment_file, 0, 11);
$sourcefiles = substring_index($attachment_guid, $attachment_site, -1 );
$sourcefiles = str_replace($attachment_file, $attachment_file_truncated, $sourcefiles); 
$sourcefiles = '/var/www/html/lpmu' . $sourcefiles . '*';
$destination_path = substring_index($attachment_guid, $attachment_site, -1 );
$destination_path = substring_index($destination_path, $attachment_file, 1 );
$destination_path = 's3://laprensa.com.ni' . $destination_path;
//$s3command = '/usr/bin/s3cmd put --config=/var/www/html/.s3cfg --no-check-md5 --skip-existing --no-encrypt -P -H --recursive --add-header="Expires:`date -u +"%a, %d %b %Y %H:%M:%S GMT" --date "next Year"`" --add-header="Cache-Control:max-age=31536000, public" ' . $sourcefiles . ' ' . $destination_path;
$s3command = '/usr/bin/s3cmd put --config=/var/www/html/.s3cfg --no-check-md5 --skip-existing --no-encrypt -P -H --recursive --add-header="Expires:`date -u +"%a, %d %b %Y %H:%M:%S GMT" --date "next Year"`" --add-header="Cache-Control:max-age=31536000, public" ' . $sourcefiles . ' ' . $destination_path;
$s3result = exec($s3command);
usleep(500000);
echo '<br>s3command = ' . $s3command. '<br>';
echo '<br>s3result = ' . $s3result . '<br>';

	if (strlen($div_info) > 3 && strlen($articleexerpt) < 5)
	{
	$articleexerpt = $div_info;
	}

					$update_post = array(
					  'ID'             => $post_id, 
					  'post_content'   => $image_replaced_text, //The full text of the post.
					  'post_exerpt'    => $articleexerpt, //The exerpt of the post.
					  'post_date'      => $creacion, //The time post was made.
					  'post_date_gmt'  => $creacion,
					  'post_status'    => $post_status ////The time post was made, in GMT.
					);  

					$update_post_results = wp_update_post($update_post);
usleep(50000);
					}


			}
			$i++;


	if ($i == 200) break;
}
if ( $article_has_no_image )
{

$no_pic_post_date = date("Y-m-d H:i:s",strtotime("-15 minutes",strtotime($creacion)));

					$update_post = array(
					  'ID'             => $post_id, 
					  'post_date'      => $no_pic_post_date, //The time post was made.
					  'post_date_gmt'  => $no_pic_post_date,
					  'post_status'    => $post_status ////The time post was made, in GMT.
					);  

					$update_post_results = wp_update_post($update_post);
usleep(50000);
}


			}
		}
    		$dbp = null;
		}
	}
}
	catch(PDOException $e)
    		{
    		}

echo "\n Importacion Completa! \n\n";
//get_footer();
//echo '<meta http-equiv="refresh" content="60;http://hoy.doap.com/hoy-import.php" />';
//<meta http-equiv="refresh" content="30=http://hoy.doap.com/hoy-import.php">
?>
