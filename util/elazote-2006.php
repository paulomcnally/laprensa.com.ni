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
$caricatura_html= <<<'EOT'
<div class="header container">
<div class ="manuel">
<div class="g-page" align="center" data-width="330" data-href="//plus.google.com/112598034920157494570" data-rel="publisher"></div>
<script type="text/javascript" src="/scripts/manuel.js"></script>
<script type="text/javascript">
manuel();
</script></div></div>
EOT;

echo $wpdb->prefix . PHP_EOL; 
$start_date = strtotime("2006-03-05");
$end_date = strtotime("2009-10-26");
//$categories_to_import = array("nacionales", "elmundo", "sucesos", "deportes", "economia", "regionales", "editorial", "opinion", "politica", "portada");
$categories_to_import = array("azoteeditorial", "azotelirico", "elcalachero", "lesocurrioasi", "arisca", "bisagra", "calachero", "contra", "editorial", "tritus", "elmurodefermin", "portada");
$s3_destination_base = "s3://laprensa.com.ni";
$section=array("azoteeditorial" => 3598, "azotelirico" => 3598, "elcalachero" => 3598, "lesocurrioasi" => 3598, "arisca" => 3598, "bisagra" => 3598, "calachero" => 3598, "contra" => 3598, "editorial" => 3598, "tritus" => 3598, "elmurodefermin" => 3598, "portada" => 3598);
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
$base_dir = "/var/www/html/laprensa/lp-archivo/public_html/archivo/$year/$thismonth/$numday/suplementos/elazote/";
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
					echo PHP_EOL . PHP_EOL . strtoupper($fileinfo) . "!!!!!!!!!" . PHP_EOL . PHP_EOL;
					$cat_name = strtolower($fileinfo);
					$cat_dir = $base_dir . $fileinfo . "/";
					echo PHP_EOL . PHP_EOL . 'cat_dir = ' . $cat_dir . PHP_EOL . PHP_EOL;
	


					if (file_exists($cat_dir))
					{
echo 'cat_dir EXISTS' . PHP_EOL;
						$catdir = new DirectoryIterator($cat_dir);
						foreach ($catdir as $catfileinfo)
						{
							echo 'catfileinfo = ' . $catfileinfo . PHP_EOL . PHP_EOL;
					    		if (!$catfileinfo->isDot() && $catfileinfo != "index.shtml" && !substr_count($catfileinfo,"_print"))
							{
						       		// var_dump($fileinfo->getFilename());
								$extension = strtolower(substr(strrchr($catfileinfo, '.'), 1));
								if ($extension == 'shtml')
								{
									echo 'catfileinfo = ' . $catfileinfo . PHP_EOL;
									//$cat_post_file = $catfileinfo->pathName;
									//echo 'cat_post_file before replace = ' . $cat_post_file . PHP_EOL;
									$cat_post_file = str_replace(".shtml", ".info", $catfileinfo);
									$cat_pic_stub = str_replace(".shtml", "", $catfileinfo);
									$cat_cari_image = $cat_dir . str_replace(".shtml", ".jpg", $catfileinfo);
									$cat_dir_orig = $cat_dir;
									$cat_dir_orig = str_replace("/var/www/html/laprensa/lp-archivo/public_html", "/srv/www/uploads", $cat_dir_orig);
									$cat_post_orig = $cat_dir_orig . $catfileinfo;
									//$cat_post_file = str_replace(".shtml", ".include", $catfileinfo);
									//$cat_cari_image = $cat_dir . 'caricatura_grande.jpg';
									$cat_post_pic = 'elazote-' . $cat_pic_stub . '.jpg';
									$cat_post_body = $cat_dir . $cat_post_file;
									echo 'post_body = ' . $cat_post_body . PHP_EOL;
									echo 'cari image = ' . $cat_cari_image. PHP_EOL;
									if (file_exists($cat_post_body) && file_exists($cat_cari_image))
									{
										$cat_post_text = file_get_contents($cat_post_body);
										$cat_post_text = mb_convert_encoding($cat_post_text, "UTF-8", "ISO-8859-1");
										$title = extractTag($cat_post_text, 'class="titulo_nota_suplementos_nosotras"','<span','</span>');
										//$clean_title = 'El Azote' . $year . '-' . $nummonth . '-' . $numday; 
										$text = html_entity_decode($title,ENT_QUOTES,"UTF-8");
										$clean_title = wp_strip_all_tags($text);
										$permalink = remove_accents($clean_title );

								                $articlesection = $section[$cat_name];
								                $post_status = 'publish';

								                $post = array(
								                  'comment_status' => 'closed',
								                  'ping_status'    => 'closed', // 'closed' means pingbacks or trackbacks turned off
								                  'post_author'    => '109',    //The user ID number of the author.
							        	          'post_content'   => $caricatura_html, //The full text of the post.
							                	  'post_date'      => $creacion, //The time post was made.
								                  'post_date_gmt'  => $gmt_creacion, //The time post was made, in GMT.
								                  'post_name'      => $permalink, // The name (slug) for your post
								                  'post_status'    => $post_status,    //Set the status of the new post.
								                  'post_title'     => $clean_title, //The title of your post.
								                  'post_type'      => 'post' //You may want to insert a regular post, page, link, a menu item or some custom post type
								                );
										//$query = 'SELECT * FROM $wpdb->postmeta where meta_key = "lparchivo" and meta_value = "' . $catfileinfo . '" limit 1;'; 
										//$query = "SELECT ID FROM wp_2_posts where post_title = '" . $clean_title . "' LIMIT 1;"; 
										$query = "SELECT post_id FROM wp_2_postmeta where meta_key = 'lparchivo' and meta_value = '" . $cat_post_file . "' and post_id IN (SELECT post_id FROM wp_2_postmeta where meta_key = 'edicion' and meta_value = '" . $articleedition . "') LIMIT 1;"; 
										$article_exists = $wpdb->get_var("$query");
										echo "articleexists = $article_exists" . PHP_EOL;
										echo $query . PHP_EOL;
									        if (empty($article_exists))
									        {
	
											$q++;

											echo "q = $q";
                remove_filter('content_save_pre', 'wp_filter_post_kses');
                remove_filter('content_filtered_save_pre', 'wp_filter_post_kses');
                									$post_id = wp_insert_post($post);
									                echo "\n post creado - # = $post_id \n\n";
											$cat_orig_permalink = get_permalink($post_id);
											if (!file_exists($cat_dir_orig))
											{
												if (!mkdir($cat_dir_orig, 0777, true)) 
												{
													die('Failed to create folder...' . $cat_dir_orig);
												}
											}
									                $post_cat = $articlesection;
									                $post_term_results = wp_set_post_terms( $post_id, 3598, 'category' );

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
									                $migrated_lparchivo = add_post_meta( $post_id, 'lparchivo', $cat_post_file, true );
											echo PHP_EOL . $migrated_lparchivo . PHP_EOL;

								                        $image_exists = -1;
								                        if ( $image_exists == -1 && (file_exists($cat_cari_image)) )
								                        {
								                                $time = $year . "/" . $nummonth;
								                                $wp_upload_dir = wp_upload_dir($time);
								                                $file = $cat_cari_image;
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
								                                        'post_title' => $img_title,
								                		//	'post_excerpt'   => $caption, //For all your post excerpt needs.
								                                        'post_content' => '',
								                                        'post_status' => 'inherit'
								                                );

	
        	                        							$attach_id = wp_insert_attachment( $attachment, $file, $post_id );
                	                							echo "\n attachment creado - # $attach_id \n\n";
echo 'file = ' . $file . PHP_EOL;
echo 'cat_cari_image = ' . $cat_cari_image . PHP_EOL;
								                                if ( $attach_id )

							                                        {
								                                        $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
								                                       // $migrated_idimagen = add_post_meta( $attach_id, 'lparchivo_img', $cat_post_pic, false );
								                                       // $migrated_idimagen = add_post_meta( $post_id, 'lparchivo_img', $cat_post_pic, false );

							        	                                wp_update_attachment_metadata( $attach_id, $attach_data );
							                	                        set_post_thumbnail( $post_id, $attach_id );
                remove_filter('content_save_pre', 'wp_filter_post_kses');
                remove_filter('content_filtered_save_pre', 'wp_filter_post_kses');

                                        								$update_post = array(
								                                          'ID'             => $post_id,
							        	                                  'post_content'   => $caricatura_html, //The full text of the post.
							                        	                  'post_date'      => $creacion, //The time post was made.
							                                	          'post_date_gmt'  => $gmt_creacion,
							                                        	  'post_status'    => $post_status ////The time post was made, in GMT.
								                                        );
								                                        $update_post_results = wp_update_post($update_post);
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
echo "\n Importacion Completa! \n\n";
echo PHP_EOL . "Articles Imported: $q";
echo PHP_EOL . "Articles Skipped: $skipped";
echo PHP_EOL . "start time : $start_time";
echo PHP_EOL . "end time: " . date("Y-m-d H:i:s") . PHP_EOL;

?>