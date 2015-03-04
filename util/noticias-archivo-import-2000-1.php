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
$start_time = date("Y-m-d H:i:s");
//$wp->register_globals();
echo $wpdb->prefix . PHP_EOL; 
$redirect_start = <<<EOD
<head>
<meta http-equiv="refresh" content="0; url=
EOD;
$redirect_end = <<<EOD
">
</head>
<body>
</body>
</html>
EOD;
$start_date = strtotime("2000-07-07");
$end_date = strtotime("2000-09-07");
$categories_to_import = array("nacionales", "elmundo", "sucesos", "deportes", "economia", "regionales", "editorial", "opinion", "politica", "portada");
$s3_destination_base = "s3://laprensa.com.ni";
$section=array("nacionales"=>"21", "elmundo"=>"3", "sucesos"=>"30", "deportes"=>"17", "economia"=>"31", "regionales"=>"26", "editorial"=>"23", "opinion"=>"23", "politica"=>"27", "portada"=>"32");
$remove_txt = array('<img src="/img/cuadritonaranja.gif" width="6" height="6" alt=".">','<img src="/img/cuadritonaranja.gif" width="6" height="6">');
$q = 0;
$i = $start_date;
$articles_imported2 = $wpdb->get_col( "SELECT distinct meta_value FROM $wpdb->postmeta where meta_key = 'lparchivo' ORDER BY ABS(meta_value) DESC;" );
$metavals4= '"' . implode( '","', $articles_imported2) . '"';
$last_imported = $articles_imported2['0'];
for ($i = $start_date; $i <= $end_date; $i = strtotime('+1 days', $i)) {
    echo $i;

$month = (date("n", $i)-1);
$monthspelled = strtolower(date("F", $i));
$meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
$day = date("D", $i);
$numday = date("d", $i);
$nummonth= date("m", $i);
$year = date("Y", $i);
$creacion = $year . "/" . $nummonth . "/" . $numday . " 00:01:00";
$thismonth = $meses[$month];
$base_dir = "/var/www/html/laprensa/lp-archivo/public_html/archivo/$year/$thismonth/$numday/";
			echo $year . PHP_EOL;
			echo $numday . PHP_EOL;
			echo $day . PHP_EOL;
			echo $monthspelled . PHP_EOL;
			echo $month . PHP_EOL;
			echo $meses[$month] . PHP_EOL;

//$c = strtotime('+1 days', $start_date);

			echo date("d", $i) . PHP_EOL;
if (file_exists($base_dir)) {
$dir = new DirectoryIterator($base_dir);
foreach ($dir as $fileinfo) {
    	if (!$fileinfo->isDot()) {
       		// var_dump($fileinfo->getFilename());
		$extension = strtolower(substr(strrchr($fileinfo, '.'), 1));
		if ($extension == 'html') {
			echo $fileinfo . PHP_EOL;
			echo "HELLO!" . PHP_EOL;
			echo $fileinfo->getPath() . PHP_EOL;
			$dirinfo = $fileinfo->getPath();
			$dir_name = strtolower(substr(strrchr($dirinfo, '/'), 1));
			echo $dir_name . PHP_EOL;
		}
		if ($fileinfo->isDir()) {
			echo "Directory Name : " . $fileinfo . PHP_EOL;
			if (in_array($fileinfo, $categories_to_import)) {
				echo PHP_EOL . PHP_EOL . strtoupper($fileinfo) . "!!!!!!!!!" . PHP_EOL . PHP_EOL;
				$cat_name = strtolower($fileinfo);
$cat_dir = $base_dir . $fileinfo . "/";
				echo PHP_EOL . PHP_EOL . $cat_dir . PHP_EOL . PHP_EOL;



				if (file_exists($cat_dir)) {
					$catdir = new DirectoryIterator($cat_dir);
					foreach ($catdir as $catfileinfo) {
					    	if (!$catfileinfo->isDot() && $catfileinfo != "index.html") {
       		// var_dump($fileinfo->getFilename());
							$extension = strtolower(substr(strrchr($catfileinfo, '.'), 1));
							if ($extension == 'html') {
								echo $catfileinfo . PHP_EOL;
								$cat_post_file = $catfileinfo->pathName;
								//$cat_post_file = str_replace(".html", ".info", $cat_post_file);
								$cat_dir_orig = $cat_dir;
								$cat_dir_orig = str_replace("/var/www/html/laprensa/lp-archivo/public_html", "/srv/www/uploads", $cat_dir_orig);
								$cat_post_orig = $cat_dir_orig . $catfileinfo;
								$cat_post_file = str_replace(".html", ".info", $catfileinfo);
								$cat_pic_file = str_replace(".html", ".jpg", $catfileinfo);
								$cat_post_body = $cat_dir . $cat_post_file;
								$cat_post_pic = $cat_dir . $cat_pic_file;
								//echo $cat_post_body . PHP_EOL;
								echo $cat_post_pic . PHP_EOL;
								if (file_exists($cat_post_body)) {
									$cat_post_text = file_get_contents($cat_post_body);
									echo PHP_EOL . $creacion . PHP_EOL;


$cat_post_text = str_ireplace("\x0D", "", $cat_post_text);
$cat_post_text = str_ireplace(' alt="."', "", $cat_post_text);
$cat_post_text = mb_convert_encoding($cat_post_text, "UTF-8", "CP1252");
$post_text = extractTag_CS($cat_post_text, 'size="2" face="Georgia, Times New Roman, Times, serif"', '<P><font ', '</FONT><img src="/img/cuadritonaranja.gif" width="6" height="6"></P>');
$post_text = getTextBetween($post_text, '<P><font size="2" face="Georgia, Times New Roman, Times, serif">', '</FONT><img src="/img/cuadritonaranja.gif" width="6" height="6"></P>');
$post_text = '<p class="archivo_v1_body">' . $post_text . '</p>';

$has_caption = substr_count($cat_post_text, 'color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size=1');
$has_intro = substr_count($cat_post_text, 'color="#333333" face="Verdana, Arial, Helvetica, sans-serif" size="2"');
$has_antetitulo = substr_count($cat_post_text, 'color="#000000" size="4" face="Georgia, Times New Roman, Times, serif"');
$has_image = substr_count($cat_post_text, $cat_pic_file);
$has_autor = substr_count($cat_post_text, 'size="1" color="#666666" face="Verdana, Arial, Helvetica, sans-serif"');
if ($has_intro)
{
$intro_array = extractTags($cat_post_text, 'color="#333333" face="Verdana, Arial, Helvetica, sans-serif" size="2"','<font','</font>');
	$intro_text = '<ul class="intro">' . PHP_EOL; 
foreach ($intro_array as $intro)
	{
	$clean_intro = wp_strip_all_tags($intro);
	$cat_post_text = str_replace($intro, "", $cat_post_text);
	$intro_text .= '<li>' . $clean_intro . '</li>' . PHP_EOL;
	}
$intro_text .= '</ul>' . PHP_EOL;
}
else
{
	$intro_text  = '';
}
if ($has_antetitulo)
{
$antetitulo_text = extractTag($cat_post_text, 'color="#000000" size="4" face="Georgia, Times New Roman, Times, serif"','<font','</font>');
$clean_antetitulo = wp_strip_all_tags($antetitulo_text);
$cat_post_text = str_replace($antetitulo_text , "", $cat_post_text);
}
else
{
	$clean_antetitulo  = '';
}
if ($has_caption)
{
$caption_text = extractTag($cat_post_text, 'color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size=1','<font','</FONT>');
$clean_caption= wp_strip_all_tags($caption_text);
$cat_post_text = str_replace($caption_text, "", $cat_post_text);
}
else
{
	$clean_caption = '';
}
if ($has_autor)
{
$autor_text = extractTag($cat_post_text, 'size="1" color="#666666" face="Verdana, Arial, Helvetica, sans-serif"','<p><font','</FONT></p>');
$clean_autor = wp_strip_all_tags($autor_text);
$cat_post_text = str_replace($autor_text, "", $cat_post_text);
$autor_text = '<p class="autor">' . $clean_autor . '</p>' . PHP_EOL;
}
$title = extractTag($cat_post_text, 'color=#003399 size="5" face="Verdana, Arial, Helvetica, sans-serif"','<FONT ','</FONT>');
$clean_title = wp_strip_all_tags($title);
$permalink = remove_accents($clean_title);
$cat_post_text = str_replace($title, "", $cat_post_text);
if ($has_image)
{
$pic_tag = extractTag_CS($cat_post_text, $cat_pic_file,'<IMG ','>');
$cat_post_text = str_replace($pic_tag, "", $cat_post_text );
}
$post_text = $intro_text . $autor_text . $post_text;

                $articlesection= $section[$cat_name];
                $post_status = 'publish';

                $post = array(
                  'comment_status' => 'closed',
                  'ping_status'    => 'closed', // 'closed' means pingbacks or trackbacks turned off
                  'post_author'    => '109',    //The user ID number of the author.
                  'post_content'   => $post_text, //The full text of the post.
                  'post_date'      => $creacion, //The time post was made.
                  'post_date_gmt'  => $creacion, //The time post was made, in GMT.
                //  'post_excerpt'   => $articleexerpt, //For all your post excerpt needs.
                  'post_name'      => $permalink, // The name (slug) for your post
                //  'post_parent'    => [ <post ID> ] //Sets the parent of the new post.
                  'post_status'    => $post_status,    //Set the status of the new post.
                  'post_title'     => $clean_title, //The title of your post.
        //        'post_category'     => array( '1', '$articlesection', '3', '4'),  //The title of your post.
                  'post_type'      => 'post' //You may want to insert a regular post, page, link, a menu item or some custom post type
                //  'tags_input'     => $articletags //For tags.
                 // 'tax_input'      => [ array( 'taxonomy_name' => array( 'term', 'term2', 'term3' ) ) ] // support for custom taxonomies.
                );
		//$query = 'SELECT * FROM $wpdb->postmeta where meta_key = "lparchivo" and meta_value = "' . $catfileinfo . '" limit 1;'; 
		$query = 'SELECT distinct meta_value FROM wp_2_postmeta where meta_key = "lparchivo" and meta_value = "' . $catfileinfo . '";'; 
                //$article_exists = $wpdb->get_var($query);
		//$artcile_exists = $wpdb->get_col( "SELECT distinct meta_value FROM $wpdb->postmeta where meta_key = 'lparchivo' and meta_value = \"$catfileinfo\";" );



//echo PHP_EOL . 'metavals4 = ' . $metavals4 . PHP_EOL;
//echo PHP_EOL . 'article exists = ' . $last_imported . PHP_EOL;
//echo PHP_EOL . 'title_start = ' . $title_start . PHP_EOL;
//echo PHP_EOL . 'title_end = ' . $title_end . PHP_EOL;
//echo PHP_EOL . 'title_pos_start = ' . $title_pos_start . PHP_EOL;
//echo PHP_EOL . 'title_pos_end = ' . $title_pos_end . PHP_EOL;
//echo PHP_EOL . 'title_sub_start = ' . $title_sub_start . PHP_EOL;
//echo PHP_EOL . 'title_sub_end = ' . $title_sub_end . PHP_EOL;
//echo PHP_EOL . 'cat_post_title = ' . $cat_post_title . PHP_EOL;
//echo PHP_EOL . 'title= ' . $title . PHP_EOL;


//Next Line Commented out by Shawn 2014/03/25
	//	$article_exists = $wpdb->get_col( "SELECT distinct meta_value FROM $wpdb->postmeta where meta_key = 'lparchivo' and meta_value IN ($metavals4);"); 
//echo PHP_EOL . 'article exists = ' . $article_exists[0] . PHP_EOL;
                if(!in_array($cat_post_file,$articles_imported2)) {
                //if( 1 == 1 ) {
	if ($q == 60) {
//	break;
	}
$q++;
                $post_id = wp_insert_post($post);
		//usleep(50000);
                echo "\n post creado - # = $post_id \n\n";

		$cat_orig_permalink = get_permalink($post_id);
if (!file_exists($cat_dir_orig))
{
	if (!mkdir($cat_dir_orig, 0777, true)) {
	    die('Failed to create folder...' . $cat_dir_orig);
	}
}
$redirect_file_content = $redirect_start . $cat_orig_permalink . $redirect_end;
echo PHP_EOL . "cat post orig = " . $cat_post_orig . PHP_EOL;
//break;
file_put_contents($cat_post_orig, $redirect_file_content);




                $post_cat = $articlesection;
                $post_term_results = wp_set_post_terms( $post_id, $post_cat, 'category' );
		//usleep(50000);
                //$post_term_results = wp_set_post_terms( $post_id, $articletags );

echo PHP_EOL . "cat post file = " . $cat_post_file . PHP_EOL;

                $migrated_lparchivo = add_post_meta( $post_id, 'lparchivo', $cat_post_file, true );
		//usleep(50000);
		if ($has_antetitulo)
		{
                	$antetitulo_meta_id = add_post_meta( $post_id, 'antetitulo', $clean_antetitulo, true );
		//usleep(50000);
		}
		echo PHP_EOL . $migrated_lparchivo . PHP_EOL;
//exit;

                        $image_exists = -1;
                        $args = array( 'post_type' => 'attachment', 'post_parent' => $post_id );
                        $attachments = get_posts( $args );
		//usleep(50000);
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
                        if ( $image_exists == -1 && (file_exists($cat_post_pic)) )
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
		//usleep(50000);

                                //create post attachment
                                $wp_filetype = wp_check_filetype($filename, null);
                                $img_title = substring_index ($cat_post_pic, '.', 1);
                                $img_title = preg_replace('/\.[^.]+$/', '', $img_title);
                                //$get_img_title_var = get_page_by_title( $img_title);
                                //$get_img_title_var = wp_get_attachment_link( '', '' , $img_title, false, false );
                                //$get_pic_title_var = get_page_by_title( $pic);

                                $attachment = array(
                                        'guid' => $wp_upload_dir['url'] . '/' . $cat_pic_file,
                                        'post_author'    => '109',    //The user ID number of the author.
                                        'post_mime_type' => $wp_filetype['type'],
                                        'post_title' => $cat_pic_file,
                                        'post_content' => '',
                                        'post_excerpt' => $clean_caption,
                                        'post_status' => 'inherit'
                                );




                                $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
		//usleep(50000);
                                echo "\n attachment creado - # $attach_id \n\n";
                                if ( $attach_id )
                                        {
                                        $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
                                        $migrated_idimagen = add_post_meta( $attach_id, 'lparchivo_img', $cat_post_pic, false );
                                        $migrated_idimagen = add_post_meta( $post_id, 'lparchivo_img', $cat_post_pic, false );

                                        wp_update_attachment_metadata( $attach_id, $attach_data );
                                        set_post_thumbnail( $post_id, $attach_id );


		//usleep(50000);

$attachment_guid_array = $wpdb->get_col( "SELECT guid FROM $wpdb->posts where ID = $attach_id LIMIT 1;" );
		//usleep(50000);
$attachment_guid = $attachment_guid_array['0'];
$attachment_site = substring_index($attachment_guid, '/wp-content', 1);
$attachment_file = substring_index($attachment_guid, '/', -1);
$sourcefiles = substring_index($attachment_guid, $attachment_site, -1 );
$s3pic = "http://d130eh1tuk2jcl.cloudfront.net" . $sourcefiles;
$sourcefiles = substring_index($sourcefiles, '.' , 1 );
$sourcefiles = '/var/www/html/lpmu' . $sourcefiles . '*';
$destination_path = substring_index($attachment_guid, $attachment_site, -1 );
$destination_path = substring_index($destination_path, $attachment_file, 1 );
$destination_path = $s3_destination_base . $destination_path;
$s3command = '/usr/bin/s3cmd put --config=/var/www/html/.s3cfg --no-check-md5 --skip-existing --no-encrypt -P -H --recursive --add-header="Expires:`date -u +"%a, %d %b %Y %H:%M:%S GMT" --date "next Year"`" --add-header="Cache-Control:max-age=31536000, public" ' . $sourcefiles . ' ' . $destination_path;
//$s3result = exec($s3command);
		//usleep(50000);
echo PHP_EOL . $s3result . PHP_EOL;
//$pic_search_string = 'src="' . $attachment_file . '"';
$pic_search_string = 'src="' . $cat_pic_file. '"';
$pic_replace_string = 'src="' . $s3pic . '"';
//$cat_post_text = str_ireplace($pic_search_string, $pic_replace_string, $cat_post_text);
echo PHP_EOL . $cat_post_pic;
echo PHP_EOL . $wp_upload_dir;
echo PHP_EOL . $file;
echo PHP_EOL . $time;
echo PHP_EOL . $s3command . PHP_EOL;
echo PHP_EOL . $attachment_guid;
echo PHP_EOL . $attachment_site;
echo PHP_EOL . $attachment_file;
echo PHP_EOL . $sourcefiles;
echo PHP_EOL . $destination_path;
echo PHP_EOL . $s3pic;
echo PHP_EOL;

		//usleep(50000);
//echo PHP_EOL . $cat_post_text;

//exit;
                                        }
									
								}
							}
						}
					}
				}
			}
		}
    	}
}
}
}
}
}
echo "\n Importacion Completa! \n\n";
echo PHP_EOL . "start time : $start_time";
echo PHP_EOL . "end time: " . date("Y-m-d H:i:s") . PHP_EOL;

?>
