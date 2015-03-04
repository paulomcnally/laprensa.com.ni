<?php
define('WP_USE_THEMES', true);
/** Loads the WordPress Environment and Template */
//require_once( '/var/www/html/wp-blog-header.php' );
require_once( '/var/www/html/wp-load.php' );
require_once('/var/www/html/wp-config.php');
$wp->init(); $wp->parse_request(); $wp->query_posts();
$wp->register_globals(); $wp->send_headers();
require_once( '/var/www/html/wp-admin/includes/image.php' );
switch_to_blog('68');
get_header();
function substring_index($subject, $delim, $count){
    if($count < 0){
        return implode($delim, array_slice(explode($delim, $subject), $count));
    }else{
        return implode($delim, array_slice(explode($delim, $subject), 0, $count));
    }
}

function stripAccents($stripAccents){
  return strtr($stripAccents,'àáâãäçéèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÍÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ','aaaaaceeeeeiiiinooooouuuuyyAAAAACEEEEIIIIINOOOOOUUUUY');
}
//date stuff
get_header();
date_default_timezone_set('America/Managua');
$b = time();
$month = date("m", $b);
$monthspelled = date("M", $b);
$day = date("D", $b);
$numday = date("d", $b);
$year = date("Y", $b);

//connect info for pgsql.
$pgsql_hostname = 'pgsql.doap.internal';
$pgsql_username = 'laprensa';
$pgsql_password = 'Blade-mobile8Occupy';
$pgsql_db = 'laprensa';
$pgsql_port = '5432';
$limit = '2';
$pic_search_string = '"</p></div></div>'; 

$hupso1 = <<<'EOT'
 #hupso_counters_1 { display:none;visibility:hidden; }
EOT;
$hupso2 = <<<'EOT'
#hupso_counters_2 { display:none;visibility:hidden; }
EOT;
$metastyle =  <<<'EOT'
#post-meta { display:none;visibility:hidden; }
EOT;


 
/*** pgsql connector ***/
try {
    $db = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

$caricaturas_imported= $wpdb->get_col( "SELECT meta_value FROM $wpdb->postmeta where meta_key = 'idcaricatura' ORDER BY ABS(meta_value) DESC;" );

//$metavals3= implode( ",", $articles_imported);
$caricaturas_imported_var = implode( ",", $caricaturas_imported);
$last_imported = $caricaturas_imported['0'];
if ( $caricaturas_imported_var == null)  $caricaturas_imported_var = 99999; 

print "caricaturas_imported_var $caricaturas_imported_var";
print "last_imported = $last_imported";
//break;

//try 
//	{
//	//$dbp = new PDO("pgsql:host=$pgsql_hostname;dbname=$pgsql_db", $pgsql_username, $pgsql_password);
//        $dbp = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
//	$sql = "SELECT idedicion FROM edicion WHERE extract(dow FROM edicion) <> 0 ORDER BY edicion ASC;";
//	$mon_sat_edicions = $dbp->query($sql);
//	$mon_sat_edicions_var = implode( ",", $mon_sat_edicions);
//        $dbp = null;
//        }
//catch(PDOException $e)
//{
//}

//print '"mon_sat' . var_dump($mon_sat_edicions);
//print "mont_sat_var $mon_sat_edicions_var";
//break;

try 
	{
//	$dbp = new PDO("pgsql:host=$pgsql_hostname;dbname=$pgsql_db", $pgsql_username, $pgsql_password);
        $dbp = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
//	$sql = "SELECT * FROM caricatura where idcaricatura NOT IN ($caricaturas_imported_var) and idedicion IN ($mon_sat_edicions_var) ORDER BY ABS(orden) ASC LIMIT $limit;";
	$sql = "SELECT caricatura.idcaricatura,caricatura.idedicion,caricatura.caricatura,caricatura.orden,caricatura.creacion,edicion.edicion FROM caricatura INNER JOIN edicion ON caricatura.idedicion = edicion.idedicion WHERE idcaricatura NOT IN ($caricaturas_imported_var) and caricatura.idedicion IN (SELECT idedicion FROM edicion WHERE extract(dow FROM edicion) <> 0) ORDER BY ABS(caricatura.orden) ASC LIMIT $limit;";


	foreach ($dbp->query($sql) as $row)
		{
		 $idcaricatura= $row['idcaricatura'];

		date_default_timezone_set('America/Managua');
                $string = $row['creacion'];
                $pos = strrpos( $string, '.');
                if ($pos !== false) {
                    $creacion = substr($string, 0, $pos );
                }
                else  {
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
                if (strlen($permanoticia) > 60 ) {
                $permanoticia=substr($permanoticia,0,60);
                //$permanoticia = 'Caricatura Del Dia - ' . $edicion;
                $permalink = sanitize_title_with_dashes($permanoticia);
                $permanoticia= $permanoticia . '...';
                }

                $post = array(
                  'comment_status' => 'closed',
                  'ping_status'    => 'closed', // 'closed' means pingbacks or trackbacks turned off
                  'post_author'    => '612',    //The user ID number of the author.
                  'post_content'   => '', //The full text of the post.
                  'post_date'      => $creacion, //The time post was made.
                  'post_date_gmt'  => $creacion, //The time post was made, in GMT.
                 // 'post_excerpt'   => '', //For all your post excerpt needs.
                  'post_name'      => $permalink, // The name (slug) for your post
                //  'post_parent'    => [ <post ID> ] //Sets the parent of the new post.
                  'post_status'    => 'draft',    //Set the status of the new post.
                  'post_title'     => $permanoticia, //The title of your post.
        //        'post_category'     => array( '1', '$articlesection', '3', '4'),  //The title of your post.
                  'post_type'      => 'content_block' //You may want to insert a regular post, page, link, a menu item or some custom post type
                //  'tags_input'     => $articletags //For tags.
                 // 'tax_input'      => [ array( 'taxonomy_name' => array( 'term', 'term2', 'term3' ) ) ] // support for custom taxonomies.
                );


print "\n post_id = $post_id \n";
print "date = $articledate . \n";
print "creacion = $creacion . \n";
print "month = $articlemonth . \n";
print "year $articleyear . \n";
print "permalink $permalink . \n";
print "idcaricatura $idcaricatura. \n";


                $article_exists = $wpdb->get_var( "SELECT * FROM $wpdb->postmeta where meta_key = 'idcaricatura' and meta_value = $idcaricatura limit 1;" );

                if( $article_exists == null )
		{
	                $post_id = wp_insert_post($post);
	                $migrated_caricatura = add_post_meta( $post_id, 'idcaricatura', $idcaricatura, true );


//for troubleshooting
print "\n post_id = $post_id \n";
print "date = $articledate . \n";
print "creacion = $creacion . \n";
print "month = $articlemonth . \n";
print "year $articleyear . \n";
//break;

$cat_post_pic = '/var/www/html/laprensa/files/caricatura/' . $caricaturaname;
                        if (file_exists($cat_post_pic))
                        {
                                $time = $year . "/" . $nummonth;
                                $wp_upload_dir = wp_upload_dir($time);
                                $file = $cat_post_pic;
                                $image_data = file_get_contents($file);
                                $filename = basename($cat_post_pic);
                                if(wp_mkdir_p($wp_upload_dir['path']))
                                    $file = $wp_upload_dir['path'] . '/' . $filename;
                                else
                                    $file = $wp_upload_dir['basedir'] . '/' . $filename;
                                file_put_contents($file, $image_data);

                                //create post attachment
                                $wp_filetype = wp_check_filetype($filename, null);
                                $img_title = substring_index ($cat_post_pic, '.', 1);
                                $img_title = preg_replace('/\.[^.]+$/', '', $img_title);
                                //$get_img_title_var = get_page_by_title( $img_title);
                                //$get_img_title_var = wp_get_attachment_link( '', '' , $img_title, false, false );
                                //$get_pic_title_var = get_page_by_title( $pic);

                                $attachment = array(
                                        'guid' => $wp_upload_dir['url'] . '/' . $cat_pic_file,
                                        'post_author'    => '612',    //The user ID number of the author.
                                        'post_mime_type' => $wp_filetype['type'],
                                        'post_title' => $cat_pic_file,
                                        'post_content' => '',
                                        'post_status' => 'inherit'
                                );

                                $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
                                echo "\n attachment creado - # $attach_id \n\n";
                                if ( $attach_id )
				{
					$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
					$migrated_idimagen = add_post_meta( $attach_id, 'idimagen', $caricaturaimgid, true );
					$migrated_idimagen = add_post_meta( $post_id, 'idimagen', $caricaturaimgid, true);
					wp_update_attachment_metadata( $attach_id, $attach_data );
				}
		
				$i++;

			if ($i == 200) break;

                        }
			//update post caricatura and add metadata

			$pics_imported= $wpdb->get_col( "SELECT guid FROM $wpdb->posts where post_parent = $post_id and post_type = 'attachment' and post_mime_type like 'image%' ORDER BY ID ASC;" );
			//$metavals3= implode( ",", $articles_imported);
			$pics_imported_var = implode( ",", $pics_imported);
			$caricatura_first_pic = $pics_imported['0'];

			$caricatura_content = '<div style="border-color: black; border:5px;position:relative;width:100%;">' .  PHP_EOL . '<h1>' . $caricaturaname. '</h1>' . PHP_EOL . '<span  style="font-size:1.2em;">' . $caricaturadesc . '</span>' . PHP_EOL . '<img class="size-large wp-image-' . $attach_id . '" alt="' . $permanoticia . '" src="' . $caricatura_first_pic . '" width="600" height="445"></div>';


			     $update_post = array(
			       'ID'             => $post_id,
			       'post_content'   => $caricatura_content, //The full text of the post.
			       'post_date'      => $creacion, //The time post was made.
			       'post_date_gmt'  => $creacion,
			       'post_status'    => 'publish' ////The time post was made, in GMT.
			     );

			$update_post_results = wp_update_post($update_post);
//			$caricatura_desde_meta = add_post_meta( $post_id, 'desde', $caricaturadesde, true );
//			$caricatura_hasta_meta = add_post_meta( $post_id, 'hasta', $caricaturahasta, true);
			if ( $caricatura_thumb )
			{
				set_post_thumbnail( $post_id, $caricatura_thumb );
			}
			else
			{
				set_post_thumbnail( $post_id, $caricatura_first_pic );
			}
		}



        $page_exists = $wpdb->get_var( "SELECT * FROM $wpdb->postmeta where meta_key = 'idcaricatura_page' and meta_value = $idcaricatura limit 1;" );
        if( $page_exists == null )
	{

	$caricatura_page_content = '<style>' . PHP_EOL . $hupso1 . PHP_EOL . $hupso2 . PHP_EOL . $metastyle . PHP_EOL . '</style>' . PHP_EOL . '<h5> Modelo Semana ' . $caricaturadesde . ' - ' . $caricaturahasta . '</h5>' . PHP_EOL . '[content_block id=' . $post_id . ']';
	$caricatura_page_excerpt = $caricaturadesc; 

	     $caricatura_page= array(
                  'comment_status' => 'closed',
                  'ping_status'    => 'closed', // 'closed' means pingbacks or trackbacks turned off
                  'post_author'    => '242',    //The user ID number of the author.
                  'post_content'   => $caricatura_page_content, //The full text of the post.
                  'post_date'      => $creacion, //The time post was made.
                  'post_date_gmt'  => $creacion, //The time post was made, in GMT.
                  'post_excerpt'   => $caricatura_page_excerpt, //The time post was made, in GMT.
                  'post_name'      => $permalink, // The name (slug) for your post
                  'post_status'    => 'publish',    //Set the status of the new post.
                  'post_title'     => $permanoticia, //The title of your post.
                  'post_type'      => 'caricatura' //You may want to insert a regular post, page, link, a menu item or some custom post type
	     );

		$page_id = wp_insert_post($caricatura_page);
		$migrated_caricatura_page = add_post_meta( $page_id, 'idcaricatura_page', $idcaricatura, true );
//		$page_term_results = wp_set_post_terms( $page_id, 'caricatura', 'category' );
		if ( $caricatura_thumb )
		{
			set_post_thumbnail( $page_id, $caricatura_thumb );
		}
		else
		{
			set_post_thumbnail( $page_id, $caricatura_first_pic );
		}

	}

        $post_exists = $wpdb->get_var( "SELECT * FROM $wpdb->postmeta where meta_key = 'idcaricatura_post' and meta_value = $idcaricatura limit 1;" );
        if( $post_exists == null )
	{

	$caricatura_post_content = '<style>' . PHP_EOL . $hupso1 . PHP_EOL . $hupso2 . PHP_EOL . $metastyle . PHP_EOL . '</style>' . PHP_EOL . '<h5> Modelo Semana ' . $caricaturadesde . ' - ' . $caricaturahasta . '</h5>' . PHP_EOL . '[content_block id=' . $post_id . ']';
	$caricatura_post_excerpt = $caricaturadesc; 

	     $caricatura_post= array(
                  'comment_status' => 'closed',
                  'ping_status'    => 'closed', // 'closed' means pingbacks or trackbacks turned off
                  'post_author'    => '242',    //The user ID number of the author.
                  'post_content'   => $caricatura_post_content, //The full text of the post.
                  'post_date'      => $creacion, //The time post was made.
                  'post_date_gmt'  => $creacion, //The time post was made, in GMT.
                  'post_excerpt'   => $caricatura_post_excerpt, //The time post was made, in GMT.
                  'post_name'      => $permalink, // The name (slug) for your post
                  'post_status'    => 'publish',    //Set the status of the new post.
                  'post_title'     => $permanoticia, //The title of your post.
                  'post_type'      => 'post' //You may want to insert a regular post, page, link, a menu item or some custom post type
	     );

		$caricatura_post_id = wp_insert_post($caricatura_post);
		$migrated_caricatura_post= add_post_meta( $caricatura_post_id, 'idcaricatura_post', $idcaricatura, true );
		$post_term_results = wp_set_post_terms( $caricatura_post_id, 1, 'category' );
		if ( $caricatura_thumb )
		{
			set_post_thumbnail( $caricatura_post_id, $caricatura_thumb );
		}
		else
		{
			set_post_thumbnail( $caricatura_post_id, $caricatura_first_pic );
		}

	}

	}
	$dbp = null;
	}
catch(PDOException $e)
{
}
			
		
	
//echo '<meta http-equiv="refresh" content="20;http://hoy.doap.com/hoy-caricaturas.php" />';
//<meta http-equiv="refresh" content="30=http://hoy.doap.com/hoy-import.php">
?>
