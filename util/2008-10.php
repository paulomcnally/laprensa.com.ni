#!/usr/bin/php
<?php
define('WP_USE_THEMES', true);
define('BUCKET', 'laprensa.com.ni');
define('UTILPATH', dirname(__FILE__) . '/');
define('WP_PATH', dirname(__FILE__) . '/../');
$_SERVER[ 'HTTP_HOST' ] = 'www.laprensa.com.ni';
require_once(WP_PATH . 'wp-load.php');
require_once(WP_PATH . 'wp-config.php');
require_once(WP_PATH . 'wp-includes/formatting.php');
require_once(UTILPATH . 'cleanfunctions.php');
require_once(WP_PATH . 'wp-admin/includes/image.php');
switch_to_blog('2');
global $wpdb;
$start_time = date("Y-m-d H:i:s");
$remove_txt = array('<img src="/img/cuadritonaranja.gif" width="6" height="6" alt=".">','<img src="/img/cuadritonaranja.gif" width="6" height="6">', '<table width="100%" border="0" cellspacing="5" cellpadding="0" xmlns:msxsl="urn:schemas-microsoft-com:xslt" xmlns:user="http://my_domain_name/my_namespace">','<table width="100%" border="0" cellpadding="0" cellspacing="5" bgcolor="#F7F7F7">','<table width="100%" border="0" cellspacing="0" cellpadding="0">','<td width="1" align="left" valign="bottom"><table width="1" border="0" cellspacing="3" cellpadding="0">','<td style="padding-top:8px; padding-bottom:8px">','<td align="left">','<td align="left" valign="top">','</td>','<table width="300" border="0" cellpadding="0" cellspacing="1" bgcolor="#0066CC">','<table width="0" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000">','<table align="right" width="300" border="0" cellspacing="5" cellpadding="0">','<table width="300" border="0" align="right" cellpadding="0" cellspacing="5">','<img alt="" src="/archivo/img/bullet_nota.gif" width="4" height="4" />','<table width="100%" border="0" cellspacing="3" cellpadding="0">','<table width="100%" border="0" cellspacing="1" cellpadding="0">','<table width="100%" border="0" cellspacing="5" cellpadding="0">','<table width="100%" border="0" cellspacing="0" cellpadding="4">','<img src="/archivo/img/bullet_nota.gif" width="4" height="4">','<table width="0" border="0" cellpadding="2" cellspacing="0">','<td align="left">','<td align="left" valign="top">','<td width="100%" align="left" valign="top">','<td width="4" align="left" valign="middle">','<td width="0" align="left" valign="top">','<td align="left" bgcolor="#F2FBFF">','<td align="center" valign="top">','<div align="left"></div>','<td bgcolor="#FFFFFF">','<div align="left">','<img src="/archivo/img/bullet.gif" width="4" height="4">','<img src="/archivo/img/icono3.gif" border="0">');

$table_tags = array('<table>','</table>','<tr>','</tr>','<td>','</td>','<div>','</div>','<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#E3F1F9">','<td align="center" valign="middle">','<table width="250" border="0" align="right" cellpadding="0" cellspacing="5">','<table width="250" border="0" cellpadding="0" cellspacing="1" bgcolor="#0066CC">');
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
echo $wpdb->prefix . PHP_EOL; 
$start_date = strtotime("2008-10-02");
$end_date = strtotime("2008-11-01");
//$categories_to_import = array("nacionales", "elmundo", "sucesos", "deportes", "economia", "regionales", "editorial", "opinion", "politica", "portada");
$categories_to_import = array("deportes", "economia", "regionales", "editorial", "politica", "internacionales");
$s3_destination_base = "s3://laprensa.com.ni";
$section=array("nacionales"=>"21", "elmundo"=>"3", "sucesos"=>"30", "deportes"=>"17", "economia"=>"31", "regionales"=>"26", "editorial"=>"23", "opinion"=>"23", "politica"=>"27", "portada"=>"32", "internacionales"=>"3");
$q = 0;
$i = $start_date;
for ($i = $start_date; $i <= $end_date; $i = strtotime('+1 days', $i))
{
    echo $i;

$month = (date("n", $i)-1);
$monthspelled = strtolower(date("F", $i));
$meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
$day = date("D", $i);
$numday = date("d", $i);
$nummonth= date("m", $i);
$year = date("Y", $i);
$creacion = $year . "/" . $nummonth . "/" . $numday . " 00:01:00";
$articleedition = $year . "-" . $nummonth . "-" . $numday;
$gmt_creacion = $year . "/" . $nummonth . "/" . $numday . " 06:01:00";
$thismonth = $meses[$month];
$base_dir = "/var/www/html/laprensa/lp-archivo/public_html/archivo/$year/$thismonth/$numday/noticias/";
echo $year . PHP_EOL;
echo $numday . PHP_EOL;
echo $day . PHP_EOL;
echo $monthspelled . PHP_EOL;
echo $month . PHP_EOL;
echo $meses[$month] . PHP_EOL;

//$c = strtotime('+1 days', $start_date);

echo date("d", $i) . PHP_EOL;
if (file_exists($base_dir))
{
	$dir = new DirectoryIterator($base_dir);
	foreach ($dir as $fileinfo)
	{
    		if (!$fileinfo->isDot())
		{
       		// var_dump($fileinfo->getFilename());
			$extension = strtolower(substr(strrchr($fileinfo, '.'), 1));
			if ($extension == 'shtml')
			{
				echo $fileinfo . PHP_EOL;
				echo "HELLO!" . PHP_EOL;
				echo $fileinfo->getPath() . PHP_EOL;
				$dirinfo = $fileinfo->getPath();
				$dir_name = strtolower(substr(strrchr($dirinfo, '/'), 1));
				echo $dir_name . PHP_EOL;
			}
			if ($fileinfo->isDir())
			{
				echo "Directory Name : " . $fileinfo . PHP_EOL;
				if (in_array($fileinfo, $categories_to_import))
				{
					echo PHP_EOL . PHP_EOL . strtoupper($fileinfo) . "!!!!!!!!!" . PHP_EOL . PHP_EOL;
					$cat_name = strtolower($fileinfo);
					$cat_dir = $base_dir . $fileinfo . "/";
					echo PHP_EOL . PHP_EOL . $cat_dir . PHP_EOL . PHP_EOL;
	


					if (file_exists($cat_dir))
					{
						$catdir = new DirectoryIterator($cat_dir);
						foreach ($catdir as $catfileinfo)
						{
					    		if (!$catfileinfo->isDot() && $catfileinfo != "index.shtml" && !substr_count($catfileinfo,"_print"))
							{
						       		// var_dump($fileinfo->getFilename());
								$extension = strtolower(substr(strrchr($catfileinfo, '.'), 1));
								if ($extension == 'shtml')
								{
									echo $catfileinfo . PHP_EOL;
									$cat_post_file = $catfileinfo->pathName;
									//$cat_post_file = str_replace(".html", ".info", $cat_post_file);
									$cat_dir_orig = $cat_dir;
									$cat_dir_orig = str_replace("/var/www/html/laprensa/lp-archivo/public_html", "/srv/www/uploads", $cat_dir_orig);
									$cat_post_orig = $cat_dir_orig . $catfileinfo;
									$cat_post_file = str_replace(".shtml", ".include", $catfileinfo);
									$cat_post_body = $cat_dir . $cat_post_file;
									//echo $cat_post_body . PHP_EOL;
									if (file_exists($cat_post_body))
									{
										$cat_post_text = file_get_contents($cat_post_body);
										$cat_post_text = mb_convert_encoding($cat_post_text, "UTF-8", "ISO-8859-1");
										//echo $cat_post_text . PHP_EOL . PHP_EOL;
										$pic_start = 'src="fotos/';
									        $pic_end = '"';
										$cat_pic_file = getTextBetween($cat_post_text, $pic_start, $pic_end);
										$pic_tag = extractTag($cat_post_text, 'src="fotos/','<img ','>');
										$credito = extractTag($cat_post_text, 'class="credito"','<td ','</td>');
										$credito_nota_interna = extractTag($cat_post_text, 'class="credito_nota_interna"','<span ','</span>');
										$correo = extractTag($cat_post_text, 'class="correos"','<td ','</td>');
										$has_sidebar = substr_count($cat_post_text, 'sidebar');
										if ($has_sidebar) 
										{
											$sidebar_array = extractSidebar($cat_post_text);
											$texto_sidebar = $sidebar_array['sidebar_text']; 
											//$texto_sidebar = extractTag($texto_sidebar , 'class="credito_nota_interna"','<span ','</span>');
											$credito_nota_sidebar_orig = $sidebar_array['sidebar_credit'];
											$credito_nota_sidebar = str_replace("credito_nota_interna", "credito_nota_sidebar", $sidebar_array['sidebar_credit']);
											$cat_post_text = str_replace($texto_sidebar, "", $cat_post_text);
											$cat_post_text = str_replace($credito_nota_sidebar_orig , "", $cat_post_text);
											$texto_sidebar .= $credito_nota_sidebar; 
											$texto_sidebar = removeTag($texto_sidebar,'trsp','<td','/td>');
											$texto_sidebar = str_replace($sidebar_array['sidebar_title_tag'], "", $texto_sidebar);
											$texto_sidebar = str_replace($remove_txt, "", $texto_sidebar);
											$texto_sidebar = str_replace($table_tags, "", $texto_sidebar);
											$texto_sidebar = removeEmptyLines($texto_sidebar);
										}
										$intro = extractTag($cat_post_text, 'class="intronota"','<td','</td>');
										$title = extractTag($cat_post_text, 'class="titulo_nota_nacionales"','<span','</span>');
										$cat_post_text = str_replace($intro, "", $cat_post_text);
										$cat_post_text = str_replace($title, "", $cat_post_text);
										$cat_post_text = str_replace($credito , "", $cat_post_text);
										$cat_post_text = str_replace($credito_nota_interna , "", $cat_post_text);
										$cat_post_text = str_replace($correo, "", $cat_post_text);
										$text = html_entity_decode($title,ENT_QUOTES,"UTF-8");
										$clean_title = wp_strip_all_tags($text);
										$clean_intro = wp_strip_all_tags($intro);
										$new_intro_tag ='';
										if ($clean_intro)
										{
											$new_intro_tag = '<ul class="intro"><li>' . $clean_intro . '</li></ul>';
										}
										$permalink = remove_accents($clean_title );
										//$clean_title = wp_strip_all_tags($title);
										$cat_post_text = removeTag($cat_post_text,'trsp','<td','/td>');
										$cat_post_text = removeTag($cat_post_text ,'publicidad','<td','/td>');
										$cat_post_text = removeTag($cat_post_text ,'fetch','<script','</script>');
										$cat_post_text = removeTag($cat_post_text ,'javascript','<script','</script>');
										$cat_post_text = removeTag($cat_post_text,'imprimir_noticia_but1','<td','/td>');
										$cat_post_text = removeTag($cat_post_text,'fondo_barra_abajo_nota','<td','/td>');
										$cat_post_text = removeTag($cat_post_text,'enviar_noticia_but_1','<td','/td>');
										$cat_post_text = removeTag($cat_post_text,'comentarenforo_but_abajo1','<td','/td>');
										$cat_post_text = removeTag($cat_post_text,'fondo_barra_abajo_nota2','<td','/td>');
										$cat_post_text = removeTag($cat_post_text,'subir_but_abajo_1','<td','/td>');
										$cat_post_text = removeTag($cat_post_text,'href="http://ads.laprensa.com.ni','<a ','</a>');
										//$cat_post_text = removeTag($cat_post_text,'align','<table ','>');
										//$cat_post_text = removeTag($cat_post_text,'width','<table ','>');
										$cat_post_text = str_replace($pic_tag, "", $cat_post_text );
										$cat_post_text = str_replace($remove_txt, "", $cat_post_text );
										$cat_post_text = replaceTextTables($cat_post_text);
										$cat_post_text = str_replace($table_tags, "", $cat_post_text );
										$cat_post_text = removeEmptyLines($cat_post_text);
										if ($has_sidebar)
										{
											$aside = '<div class="archivo-aside-div">[doap_box title="' . $sidebar_array['sidebar_title'] . '" box_color="#336699" class="archivo-aside"]' . $texto_sidebar . '[/doap_box]</div>';
											$cat_post_text = $aside . $cat_post_text;  
										}
										if ($new_intro_tag)
										{
											$cat_post_text = $new_intro_tag . $cat_post_text;
										}
/*
										echo PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL; 
										echo 'INTRO' . PHP_EOL . $intro . PHP_EOL;
										echo 'SIDEBAR' . PHP_EOL . $texto_sidebar . PHP_EOL;
										echo 'FOTO' . PHP_EOL . $foto . PHP_EOL;
										echo 'TITLE' . PHP_EOL . $title . PHP_EOL;
										echo 'CLEAN TITLE' . PHP_EOL . $clean_title . PHP_EOL;
										echo 'DECODED TITLE' . PHP_EOL . $text. PHP_EOL;
										echo 'PERMALINK' . PHP_EOL . $permalink . PHP_EOL;
										echo 'credito' . PHP_EOL . $credito . PHP_EOL;
										echo 'credito interna' . PHP_EOL . $credito_nota_interna . PHP_EOL;
										echo 'credito SIDEBAR' . PHP_EOL . $credito_nota_sidebar . PHP_EOL;
										echo 'correo' . PHP_EOL . $correo . PHP_EOL;
										echo 'ASIDE' . PHP_EOL . $aside . PHP_EOL;
										echo PHP_EOL . $creacion . PHP_EOL;
										echo PHP_EOL . $cat_post_text . PHP_EOL;
										echo "pull in relevent components from /var/www/html/wp-admin/archivo-import.php!" . PHP_EOL;
										echo PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL; 
*/	

										$cat_post_pic = $cat_dir . 'fotos/' .$cat_pic_file;
	
								                $articlesection = $section[$cat_name];
								                $post_status = 'publish';

								                $post = array(
								                  'comment_status' => 'closed',
								                  'ping_status'    => 'closed', // 'closed' means pingbacks or trackbacks turned off
								                  'post_author'    => '109',    //The user ID number of the author.
							        	          'post_content'   => $cat_post_text, //The full text of the post.
							                	  'post_date'      => $creacion, //The time post was made.
								                  'post_date_gmt'  => $gmt_creacion, //The time post was made, in GMT.
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
										$query = "SELECT post_id FROM wp_2_postmeta where meta_key = 'lparchivo' and meta_value = '" . $cat_post_file . "' and post_id IN (SELECT post_id FROM wp_2_postmeta where meta_key = 'edicion' and meta_value = '" . $articleedition . "') LIMIT 1;"; 
								                //$article_exists = $wpdb->get_var($query);
										//$artcile_exists = $wpdb->get_col( "SELECT distinct meta_value FROM $wpdb->postmeta where meta_key = 'lparchivo' and meta_value = \"$catfileinfo\";" );
										//$articles_imported2 = $wpdb->get_col( "SELECT distinct meta_value FROM $wpdb->postmeta where meta_key = 'lparchivo' ORDER BY ABS(meta_value) DESC;" );
//										usleep(500000);

//$metavals3= implode( ",", $articles_imported);
//$metavals4= '"' . implode( '","', $articles_imported2) . '"';
//$last_imported = $articles_imported2['0'];

//echo PHP_EOL . 'metavals4 = ' . $metavals4 . PHP_EOL;
//echo PHP_EOL . 'article exists = ' . $last_imported . PHP_EOL;
//echo PHP_EOL . 'title_start = ' . $title_start . PHP_EOL;
//echo PHP_EOL . 'title_end = ' . $title_end . PHP_EOL;
//echo PHP_EOL . 'title_pos_start = ' . $title_pos_start . PHP_EOL;
//echo PHP_EOL . 'title_pos_end = ' . $title_pos_end . PHP_EOL;
//echo PHP_EOL . 'title_sub_start = ' . $title_sub_start . PHP_EOL;
//echo PHP_EOL . 'title_sub_end = ' . $title_sub_end . PHP_EOL;
//echo PHP_EOL . 'cat_post_title = ' . $cat_post_title . PHP_EOL;
//echo PHP_EOL . 'title = ' . $title . PHP_EOL;
//echo PHP_EOL . 'pic_start = ' . $pic_start . PHP_EOL;
//echo PHP_EOL . 'pic_end = ' . $pic_end . PHP_EOL;
//echo PHP_EOL . 'pic_pos_start = ' . $pic_pos_start . PHP_EOL;
//echo PHP_EOL . 'pic_pos_end = ' . $pic_pos_end . PHP_EOL;
//echo PHP_EOL . 'pic_pos_end_1 = ' . $pic_pos_end_1 . PHP_EOL;
//echo PHP_EOL . 'pic_sub_start = ' . $pic_sub_start . PHP_EOL;
//echo PHP_EOL . 'pic_sub_end = ' . $pic_sub_end . PHP_EOL;
//echo PHP_EOL . 'cat_pic = ' .$cat_pic . PHP_EOL;
//echo PHP_EOL . 'cat_pic_file = ' .$cat_pic_file . PHP_EOL;
//echo PHP_EOL . 'cat_post_pic = ' . $cat_post_pic . PHP_EOL;


//		$article_exists = $wpdb->get_col( "SELECT distinct meta_value FROM $wpdb->postmeta where meta_key = 'lparchivo' and meta_value IN ($metavals4);"); 
//echo PHP_EOL . 'article exists = ' . $article_exists[0] . PHP_EOL;
//usleep(500000);
										$article_exists = $wpdb->get_var("$query");
										echo "articleexists = $article_exists" . PHP_EOL;
										echo $query . PHP_EOL;
//exit;
//echo PHP_EOL . 'article exists = ' . $article_exists[0] . PHP_EOL;
//usleep(500000);
									        if (empty($article_exists))
									        {
	
											$q++;
											echo "q = $q";
                									$post_id = wp_insert_post($post);
//											usleep(500000);
									                echo "\n post creado - # = $post_id \n\n";
											$cat_orig_permalink = get_permalink($post_id);
											if (!file_exists($cat_dir_orig))
											{
												if (!mkdir($cat_dir_orig, 0777, true)) 
												{
													die('Failed to create folder...' . $cat_dir_orig);
												}
											}
											$redirect_file_content = $redirect_start . $cat_orig_permalink . $redirect_end;
											echo PHP_EOL . "cat post orig = " . $cat_post_orig . PHP_EOL;
											//break;
											file_put_contents($cat_post_orig, $redirect_file_content);
									                $post_cat = $articlesection;
									                $post_term_results = wp_set_post_terms( $post_id, $post_cat, 'category' );
//											usleep(500000);
									                //$post_term_results = wp_set_post_terms( $post_id, $articletags );

											echo PHP_EOL . "cat post file = " . $cat_post_file . PHP_EOL;

									                $migrated_lparchivo = add_post_meta( $post_id, 'lparchivo', $cat_post_file, true );
											echo PHP_EOL . $migrated_lparchivo . PHP_EOL;

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
//exit;

								                        $image_exists = -1;
/*
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
*/
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

								                                //create post attachment
								                                $wp_filetype = wp_check_filetype($filename, null);
								                                $img_title = substring_index ($cat_post_pic, '.', 1);
								                                $img_title = preg_replace('/\.[^.]+$/', '', $img_title);
								                                //$get_img_title_var = get_page_by_title( $img_title);
								                                //$get_img_title_var = wp_get_attachment_link( '', '' , $img_title, false, false );
							        	                        //$get_pic_title_var = get_page_by_title( $pic);
												$caption = wp_strip_all_tags($credito);
							                        	        $attachment = array(
							                                	        'guid' => $wp_upload_dir['url'] . '/' . $cat_pic_file,
								                                        'post_author'    => '109',    //The user ID number of the author.
								                                        'post_mime_type' => $wp_filetype['type'],
								                                        'post_title' => $cat_pic_file,
								                			'post_excerpt'   => $caption, //For all your post excerpt needs.
								                                        'post_content' => '',
								                                        'post_status' => 'inherit'
								                                );

	
        	                        							$attach_id = wp_insert_attachment( $attachment, $file, $post_id );
//											usleep(500000);
                	                							echo "\n attachment creado - # $attach_id \n\n";
								                                if ( $attach_id )
							                                        {
								                                        $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
								                                        $migrated_idimagen = add_post_meta( $attach_id, 'lparchivo_img', $cat_post_pic, false );
								                                        $migrated_idimagen = add_post_meta( $post_id, 'lparchivo_img', $cat_post_pic, false );

							        	                                wp_update_attachment_metadata( $attach_id, $attach_data );
							                	                        set_post_thumbnail( $post_id, $attach_id );
//											usleep(1500000);
/*
													$attachment_guid_array = $wpdb->get_col( "SELECT guid FROM $wpdb->posts where ID = $attach_id LIMIT 1;" );
													$attachment_guid = $attachment_guid_array['0'];
													$attachment_site = substring_index($attachment_guid, '/wp-content', 1);
													$attachment_file = substring_index($attachment_guid, '/', -1);
													$sourcefiles = substring_index($attachment_guid, $attachment_site, -1 );
													$s3pic = "http://d130eh1tuk2jcl.cloudfront.net" . $sourcefiles;
													$sourcefiles = substring_index($sourcefiles, '.' , 1 );
													$sourcefiles = '/var/www/html' . $sourcefiles . '*';
													$destination_path = substring_index($attachment_guid, $attachment_site, -1 );
													$destination_path = substring_index($destination_path, $attachment_file, 1 );
													$destination_path = $s3_destination_base . $destination_path;
													$s3command = '/usr/bin/s3cmd put --config=/var/www/html/.s3cfg --no-check-md5 --skip-existing --no-encrypt -P -H --recursive --add-header="Expires:`date -u +"%a, %d %b %Y %H:%M:%S GMT" --date "next Year"`" --add-header="Cache-Control:max-age=31536000, public" ' . $sourcefiles . ' ' . $destination_path;
													//$s3result = exec($s3command);
													//usleep(500000);
													echo PHP_EOL . 's3result =' . $s3result . PHP_EOL;
													//$pic_search_string = 'src="' . $attachment_file . '"';
													$pic_search_string = 'src="fotos/' . $cat_pic_file. '"';
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
*/
                                        								$update_post = array(
								                                          'ID'             => $post_id,
							        	                                  'post_content'   => $cat_post_text, //The full text of the post.
							                	                //        'post_exerpt'    => $articleexerpt, //The exerpt of the post.
							                        	                  'post_date'      => $creacion, //The time post was made.
							                                	          'post_date_gmt'  => $gmt_creacion,
							                                        	  'post_status'    => $post_status ////The time post was made, in GMT.
								                                        );
								                                        $update_post_results = wp_update_post($update_post);
//											usleep(500000);
                	                        						}
											}
										}
										else
										{
											echo "articleexists = $article_exists" . PHP_EOL;
											echo $query . PHP_EOL;
											$skipped++;
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
echo "\n Importacion Completa! \n\n";
echo PHP_EOL . "Articles Imported: $q";
echo PHP_EOL . "Articles Skipped: $skipped";
echo PHP_EOL . "start time : $start_time";
echo PHP_EOL . "end time: " . date("Y-m-d H:i:s") . PHP_EOL;

?>
