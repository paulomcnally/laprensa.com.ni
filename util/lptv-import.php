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
require_once( '/var/www/html/lpmu/wp-admin/includes/media.php' );
switch_to_blog('2');
ini_set('default_charset', 'UTF-8');
mb_internal_encoding( 'UTF-8'); 
mb_regex_encoding( 'UTF-8');
global $wpdb;
$mysql_hostname = 'data.doap.com';
$mysql_username = 'root';
$mysql_password ='fr1ck0ff';
$mysql_db = 'laprensatv';
$author = '109';
$limit = '1000';
date_default_timezone_set('America/Managua');
$b = time();
$month = date("m", $b);
$monthspelled = date("M", $b);
$day = date("D", $b);
$numday = date("d", $b);
$year = date("Y", $b);
$start_time = date("Y-m-d H:i:s");
$section=array("1" => "19", "3" => "17", "6" => "27", "8" => "2293", "15" => "3", "23" => "1675", "38" => "25763", "45" => "23", "66" => "924", "88" => "35632", "259" => "35630", "1167" => "17", "1396" => "6740", "1736" => "17", "2340" => "3518", "2341" => "27", "2508" => "3", "2609" => "1677", "2820" => "32", "2973" => "26", "3236" => "991", "7632" => "19");
$pic_search_string = '"</p></div></div>'; 
$lptv_columns = "ID, post_date, post_title, post_content, post_excerpt, post_status, post_name, guid, post_parent, post_type, post_mime_type";
$lptv_imported = array();
$lptv_imported_var = '';
/*** mysql connector ***/
try {
    $db = new PDO("mysql:dbname=$mysql_db;host=$mysql_hostname", "$mysql_username", "$mysql_password" );
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

$lptv_imported = $wpdb->get_col( "SELECT meta_value FROM $wpdb->postmeta where meta_key = 'lptv_post' ORDER BY ABS(meta_value) ASC;" );

//usleep(50000);
//$metavals3= implode( ",", $articles_imported);
$lptv_imported_var = implode( ",", $lptv_imported);
$last_imported = $lptv_imported['0'];
if ( $lptv_imported_var == null)  $lptv_imported_var = 99999; 

//echo "lptv_imported_var $lptv_imported_var";
echo "last_imported = $last_imported";
//echo var_dump($lptv_imported);

try 
{
//        $dbp = new PDO("mysql:dbname=$mysql_db;host=$mysql_hostname", "$mysql_username", "$mysql_password", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET character_set_results = utf8"));
        $dbp = new PDO("mysql:dbname=$mysql_db;host=$mysql_hostname", "$mysql_username", "$mysql_password", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        //$dbp = new PDO("mysql:dbname=$mysql_db;host=$mysql_hostname;charset=utf8", "$mysql_username", "$mysql_password");
//	$sql = "SELECT * FROM lptv where idlptv NOT IN ($lptv_imported_var) and idedicion IN ($mon_sat_edicions_var) ORDER BY ABS(orden) ASC LIMIT $limit;";
	//$sql = "SELECT $lptv_columns FROM wp_posts WHERE ID NOT IN ($lptv_imported_var) and post_type = 'post' and post_status = 'publish' ORDER BY ABS(ID) ASC LIMIT $limit;";
	$sql = "SELECT $lptv_columns FROM wp_posts WHERE ID NOT IN ($lptv_imported_var) and post_type = 'post' and post_status = 'publish' ORDER BY ABS(ID) ASC LIMIT $limit;";


	foreach ($dbp->query($sql) as $row)
	{
		$idlptv= $row['ID'];
                $articletext = $row['post_content'];
		$articletext = Normalizer::normalize($articletext );
                $articleexcerpt = $row['post_excerpt'];
		$articleexcerpt = Normalizer::normalize($articleexcerpt );
                $permalink = $row['post_name'];
		$permalink = Normalizer::normalize($permalink );
//usleep(500000);
		date_default_timezone_set('America/Managua');
                $string = $row['post_date'];
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
		$articledate = strtotime($articledate);
		$articlemonth = date("m", $articledate);
		$articleyear = date("Y", $articledate);
		$articleday = date("d", $articledate);
		$string = strtotime($creacion);
		
		echo PHP_EOL . PHP_EOL;
                $permanoticia = $row['post_title'];
		$permanoticia = Normalizer::normalize($permanoticia);

                if (strlen($permanoticia) > 60 )
		{
                	$permalink=remove_accents(substr($permalink,0,60));
                	//$permanoticia = 'Caricatura Del Dia - ' . $edicion;
//			$permalink = remove_accents($permanoticia); 
//	echo "shortened permalink before sanitize = $permalink. \n";
  //      	        $permalink = sanitize_title_with_dashes($permalink);
//                	$permanoticia= $permanoticia . '...';
                }

		try 
		{
		//        $dbp = new PDO("mysql:dbname=$mysql_db;host=$mysql_hostname", "$mysql_username", "$mysql_password", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET character_set_results = utf8"));
			$dbcat = new PDO("mysql:dbname=$mysql_db;host=$mysql_hostname", "$mysql_username", "$mysql_password", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	        //	$dbp = new PDO("mysql:dbname=$mysql_db;host=$mysql_hostname;charset=utf8", "$mysql_username", "$mysql_password");
		//	$sql = "SELECT * FROM lptv where idlptv NOT IN ($lptv_imported_var) and idedicion IN ($mon_sat_edicions_var) ORDER BY ABS(orden) ASC LIMIT $limit;";
			$sqlcat = "select term_id,name from wp_terms where term_id IN (SELECT term_id FROM `wp_term_taxonomy` where taxonomy IN ('post_tag', 'category') and term_taxonomy_id IN (SELECT term_taxonomy_id FROM `wp_term_relationships` where object_id = $idlptv)) limit $limit;";
			$new_section=array();
			$new_tag=array();

			foreach ($dbcat->query($sqlcat) as $rowcat)
			{
				$lptv_cat = $rowcat['term_id'];
				$lptv_name = $rowcat['name'];
				if (array_key_exists($lptv_cat, $section))
				{
					$new_section[] = $section[$lptv_cat];	
				}
				else
				{
					$new_tag[] = $lptv_name;
				}

			}
			$dbcat = null;
		}
		catch(PDOException $e)
		{
		}
		
		if (!in_array('19',$new_section))
		{
			$new_section[] = '19';
		}

                $post = array(
                  'comment_status' => 'open',
                  'ping_status'    => 'closed', // 'closed' means pingbacks or trackbacks turned off
                  'post_author'    => $author,    //The user ID number of the author.
                  'post_content'   => '', //The full text of the post.
                  'post_date'      => $creacion, //The time post was made.
                  'post_date_gmt'  => $creacion, //The time post was made, in GMT.
                  'post_excerpt'   => $articleexcerpt, //For all your post excerpt needs.
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




                $article_exists = $wpdb->get_var( "SELECT * FROM $wpdb->postmeta where meta_key = 'lptv_post' and meta_value = $idlptv limit 1;" );

	echo "\n article_exists = $article_exists \n";
//usleep(50000);
                if( $article_exists == null )
		{
	                $post_id = wp_insert_post($post);
			echo "\n post creado - # = $post_id \nhttp://noticias.laprensa.com.ni/index.php?p=$post_id\n";
			$new_posts[] = 'http://noticias.laprensa.com.ni/index.php?p=' . $post_id . PHP_EOL;

//usleep(50000);
	                $migrated_lptv = add_post_meta( $post_id, 'lptv_post', $idlptv, true );
//usleep(50000);
//			$post_cat = 4081;
			$post_term_results = wp_set_post_terms( $post_id, $new_section, 'category' );
			$post_term_results = wp_set_post_terms( $post_id, $new_tag, 'post_tag' );
//usleep(50000);
//			$post_term_results = wp_set_post_terms( $post_id, $articletags );
//usleep(50000);

			$video_info = array();
			$video_info = getlptv_video_info($idlptv);
			$video_type = $video_info['video_type'];
			$video_image = $video_info['poster'];
			$video_image_name = substring_index($video_image,'/',-1);
			$attach_id = ($video_image) ? uploadNewImage($video_image, $video_image_name, $permanoticia) : '';
//			$poster = wp_get_attachment_url($attach_id);
			$poster_array = wp_get_attachment_image_src( $attach_id, 'Video-Poster-640x360' );
			$poster = $poster_array['0'];

	//for troubleshooting
	echo "\n post_id = $post_id \n";
	echo "date = $articledate . \n";
	echo "creacion = $creacion . \n";
	echo "month = $articlemonth . \n";
	echo "year $articleyear . \n";
	echo "idlptv = $idlptv. \n" . PHP_EOL;
	echo "permanoticia = $permanoticia. \n";
	echo "permalink = $permalink. \n";
	echo "post excerpt = " . $articleexcerpt . PHP_EOL;
	echo "post content = " . $articletext. PHP_EOL;
	echo PHP_EOL . "video_type = " . $video_type . PHP_EOL;
	echo "video_image = " . $video_image . PHP_EOL;
	echo "video_image_name = " . $video_image_name . PHP_EOL;
	echo "attach_id = " . $attach_id . PHP_EOL;
	echo "poster = " . $poster . PHP_EOL;
	print_r($video_info);
	//break;

switch ($video_type) {
	case "lptv":
		$video_id = '';
	echo PHP_EOL . "CASE " . $video_type . PHP_EOL;
		$video_url = $video_info['lptv_video'];
	echo "video_url = " . $video_url . PHP_EOL;
		$video_name = substring_index($video_url,'/',-1);
	echo "video_name = " . $video_name . PHP_EOL;
		$video_id = uploadNewImage($video_url, $video_name, $permanoticia);
		echo "video_id = " . $video_id . PHP_EOL;
		$lpvideo_url = wp_get_attachment_url($video_id);
		echo "lpvideo_url= " . $lpvideo_url . PHP_EOL;
		if ($video_id)
		{
			if ($video_info['file_type'] == 'mov')
			{
				$new_video_tag = '<div class="lp-mov-embed">' . PHP_EOL . '[doap_video url="' . $lpvideo_url . '" poster="' . $poster . '" title="' . $permanoticia . '" width="640" height="360" class="video-normal"]' . PHP_EOL . '</div>';
			}
			else
			{
				$new_video_tag = '<div class="lp-video-embed">' . PHP_EOL . '[video width="640" height="360" mp4="' . $lpvideo_url . '" poster="' . $poster . '"][/video]' . PHP_EOL . '<p class="video-title">' . $permanoticia . '</p>' . PHP_EOL . '</div>';
			}
		}
		else
		{
			 $new_video_tag = '';
		}
		break;
	case "youtube":
	echo PHP_EOL . "CASE " . $video_type . PHP_EOL;
		$video_tag = $video_info['youtube'];
		$new_video_tag = '<div class="video-embed">' . PHP_EOL . '[doap_youtube url="' . $video_tag . '" width="640" height="360"]' . PHP_EOL . '<p class="video-title">' . $permanoticia . '</p>' . PHP_EOL . '</div>';
		break;
	case "external":
	echo PHP_EOL . "CASE " . $video_type . PHP_EOL;
		$video_tag = $video_info['external_video'];
		$new_video_tag = '<div class="su-youtube su-responsive-media-yes">' . PHP_EOL . '<div class="fluid-width-video-wrapper" style="padding-top: 56.25%;">' . PHP_EOL . $video_tag . PHP_EOL . '</div>' . PHP_EOL . '<p class="video-title">' . $permanoticia . '</p>' . PHP_EOL . '</div>';
		break;
	case "soundslider":
	echo PHP_EOL . "CASE " . $video_type . PHP_EOL;
		$video_tag = $video_info['soundslider'];
		$new_video_tag = '<a href="' . $video_tag . '" title="' . $permanoticia . '" target="_blank"><img style="background: url(' . $poster . '); background-size: 560px 315px; width:560px; height:315px;" src="http://noticias.laprensa.com.ni/wp-content/uploads/sites/2/2014/05/play560.png"></a>' . PHP_EOL . PHP_EOL;
		break;
}


	echo "video_tag = " . $video_tag . PHP_EOL;
	echo "new_video_tag = " . $new_video_tag . PHP_EOL;

                        if ( $attach_id )
			{
				if ( !update_post_meta( $attach_id , 'video_thumbnail', 1) ) add_post_meta( $attach_id , 'video_thumbnail', 1, true );
				if ( !update_post_meta( $post_id, '_video_thumbnail', $poster ) ) add_post_meta( $post_id, '_video_thumbnail', $poster , true );
				set_post_thumbnail( $post_id, $attach_id );
			//	s3CopyImage($attach_id);
			}
			else
			{
				if (get_post_meta( $post_id, '_video_thumbnail', 1 ) || get_post_meta( $post_id, '_thumbnail_id', 1 ))
				{
					echo PHP_EOL . PHP_EOL . PHP_EOL . 'Post has thumbnail' . PHP_EOL . PHP_EOL . PHP_EOL;
				}
				else
				{
					echo PHP_EOL . PHP_EOL . PHP_EOL . 'NO thumbnail - Might Need to Delete this post - ' . $post_id . PHP_EOL . PHP_EOL . PHP_EOL;
					if ( !update_post_meta( $post_id , 'lptv_broken', 1) ) add_post_meta( $attach_id , 'lptv_broken', 1, true );
					//wp_delete_post($post_id, 1);
				}
			}	
			$i++;

			if ($i == 200) break;

		}

		remove_filter('content_save_pre', 'wp_filter_post_kses');
		remove_filter('content_filtered_save_pre', 'wp_filter_post_kses');
		$lptv_content = $new_video_tag . $articletext;
		echo PHP_EOL . "lptv_content = " . PHP_EOL . "----------------------" . PHP_EOL . $lptv_content . PHP_EOL . PHP_EOL;
		$update_post = array(
		       'ID'             => $post_id,
		       'post_content'   => $lptv_content, //The full text of the post.
		       'post_date'      => $creacion, //The time post was made.
		       'post_date_gmt'  => $creacion,
		       'post_status'    => 'publish' ////The time post was made, in GMT.
		);

		$update_post_results = wp_update_post($update_post);
		$migrated_lptv = add_post_meta( $attach_id, 'idlptv', $idlptv, true );
		echo PHP_EOL . PHP_EOL . "migrated_lptv = " . $migrated_lptv . PHP_EOL;
		add_filter('content_save_pre', 'wp_filter_post_kses');
		add_filter('content_filtered_save_pre', 'wp_filter_post_kses');
echo PHP_EOL . '_______________________________________________________________________________________________________' . PHP_EOL;
	}
	$dbp = null;
}
catch(PDOException $e)
{
}
//echo phpinfo();
foreach ($new_posts as $new_post)
{
	echo $new_post;
}
echo PHP_EOL . "start time : $start_time";
echo PHP_EOL . "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
?>
