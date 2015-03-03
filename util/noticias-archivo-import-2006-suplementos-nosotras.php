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
$remove_txt1 = array('<img src="/img/cuadritonaranja.gif" width="6" height="6" alt=".">', '<img src="/img/cuadritonaranja.gif" width="6" height="6">', '<table width="100%" border="0" cellspacing="5" cellpadding="0" xmlns:msxsl="urn:schemas-microsoft-com:xslt" xmlns:user="http://my_domain_name/my_namespace">', '<table width="100%" border="0" cellpadding="0" cellspacing="5" bgcolor="#F7F7F7">', '<table width="100%" border="0" cellspacing="0" cellpadding="0">', '<td width="1" align="left" valign="bottom"><table width="1" border="0" cellspacing="3" cellpadding="0">','<td style="padding-top:8px; padding-bottom:8px">','<td align="left">','<td align="left" valign="top">','</td>','<table width="300" border="0" cellpadding="0" cellspacing="1" bgcolor="#0066CC">','<table width="0" border="0" cellpadding="0" cellspacing="1" bgcolor="#000000">','<table align="right" width="300" border="0" cellspacing="5" cellpadding="0">','<table width="300" border="0" align="right" cellpadding="0" cellspacing="5">','<img alt="" src="/archivo/img/bullet_nota.gif" width="4" height="4" />','<table width="100%" border="0" cellspacing="3" cellpadding="0">','<table width="100%" border="0" cellspacing="1" cellpadding="0">');
$remove_txt2 = array('<table width="100%" border="0" cellspacing="5" cellpadding="0">','<table width="100%" border="0" cellspacing="0" cellpadding="4">','<img src="/archivo/img/bullet_nota.gif" width="4" height="4">','<table width="0" border="0" cellpadding="2" cellspacing="0">','<td align="left">','<td align="left" valign="top">','<td width="100%" align="left" valign="top">','<td width="4" align="left" valign="middle">','<td width="0" align="left" valign="top">','<td align="left" bgcolor="#F2FBFF">','<td align="center" valign="top">','<div align="left"></div>','<td bgcolor="#FFFFFF">','<div align="left">','<img src="/archivo/img/bullet.gif" width="4" height="4">','<img src="/archivo/img/icono3.gif" border="0">', '<imgsrc="../../../../../../img/bullet_nota.gif"width="4"height="4">', '<td width="60%" align="left" valign="top">', '<td align="left" valign="middle">', '<div align="left" class="texto_noticias">', '<img src="../../../../../../img/bullet_nota.gif" width="4" height="4">');

$table_tags = array('<table>','</table>','<tr>','</tr>','<td>','</td>','<div>','</div>','<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#E3F1F9">','<td align="center" valign="middle">','<table width="250" border="0" align="right" cellpadding="0" cellspacing="5">','<table width="250" border="0" cellpadding="0" cellspacing="1" bgcolor="#0066CC">','<table width="100%" border="0" cellpadding="0" cellspacing="5" bgcolor="#F7F7F7">','<table width="100%" border="0" cellpadding="0" cellspacing="5" bgcolor="#F7F7F7">','<table width="250" border="0" align="right" cellpadding="0" cellspacing="5">','<table width="250"  border="0" cellpadding="0" cellspacing="1" bgcolor="#0066CC">','<table width="100%"  border="0" cellspacing="1" cellpadding="0">','<table width="100%"  border="0" cellspacing="5" cellpadding="0">','<table width="100%"  border="0" cellpadding="0" cellspacing="5" bgcolor="#F7F7F7">');
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
$start_date = strtotime("2006-03-03");
$end_date = strtotime("2009-10-31");
//$categories_to_import = array("nacionales", "elmundo", "sucesos", "deportes", "economia", "regionales", "editorial", "opinion", "politica", "portada");
$categories_to_import = array("nosotras");
$s3_destination_base = "s3://laprensa.com.ni";
$section=array("nosotras" => 25763);
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
$base_dir = "/var/www/html/laprensa/lp-archivo/public_html/archivo/$year/$thismonth/$numday/suplementos/nosotras/";
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
									if (substr_count($cat_post_file, 'dolo-'))
									{
										$cat_post_file = "\\" . $cat_post_file;
									}
									//$cat_post_file = str_replace(".html", ".info", $cat_post_file);
									$cat_dir_orig = $cat_dir;
									$cat_dir_orig = str_replace("/var/www/html/laprensa/lp-archivo/public_html", "/srv/www/uploads", $cat_dir_orig);
									$cat_post_orig = $cat_dir_orig . $catfileinfo;
									$cat_post_file = str_replace(".shtml", ".info", $catfileinfo);
									$cat_post_body = $cat_dir . $cat_post_file;
									//echo $cat_post_body . PHP_EOL;
									if (file_exists($cat_post_body))
									{
//echo 'CAT POST BODY = ' . $cat_post_body . PHP_EOL . PHP_EOL;
										$cat_post_text = file_get_contents($cat_post_body);
//echo 'ENCODING = ' . mb_detect_encoding($cat_post_text) . PHP_EOL . PHP_EOL;
										$cat_post_text = mb_convert_encoding($cat_post_text, "UTF-8", "ISO-8859-1");
//echo 'ENCODING = ' . mb_detect_encoding($cat_post_text) . PHP_EOL . PHP_EOL;
										//echo $cat_post_text . PHP_EOL . PHP_EOL;
										$pic_start = 'src="';
									        $pic_end = '"';
										//$cat_pic_file = getTextBetween($cat_post_text, $pic_start, $pic_end);
										$cat_pic_file = str_replace(".shtml", ".jpg", $catfileinfo);
									if (substr_count($cat_pic_file, 'dolo-'))
									{
									//	$cat_pic_file = "\\" . $cat_pic_file;
									}
										$pic_tag = extractTag($cat_post_text, 'src="','<img ','>');
										$credito = extractTag($cat_post_text, 'class="credito"','<td ','</td>');
										$credito_nota_interna = extractTag($cat_post_text, 'class="credito_nota_interna"','<span ','</span>');
										$correo = extractTag($cat_post_text, 'class="correos"','<td ','</td>');
										$has_sidebar = substr_count($cat_post_text, 'sidebar');
										if ($has_sidebar) 
										{
											$sidebar_array = extractSidebar($cat_post_text);
											$texto_sidebar = $sidebar_array['sidebar_text']; 
//echo PHP_EOL . '1 - sidebar text ' . $texto_sidebar . PHP_EOL;
											//$texto_sidebar = extractTag($texto_sidebar , 'class="credito_nota_interna"','<span ','</span>');
											$credito_nota_sidebar_orig = $sidebar_array['sidebar_credit'];
											$credito_nota_sidebar = str_replace("credito_nota_interna", "credito_nota_sidebar", $sidebar_array['sidebar_credit']);
											$cat_post_text = str_replace($texto_sidebar, "", $cat_post_text);
											$cat_post_text = str_replace($credito_nota_sidebar_orig , "", $cat_post_text);
											$texto_sidebar .= $credito_nota_sidebar; 
//echo PHP_EOL . '2 - sidebar text ' . $texto_sidebar . PHP_EOL;
											$texto_sidebar = removeTag($texto_sidebar,'trsp','<td','/td>');
//echo PHP_EOL . '3 - sidebar text ' . $texto_sidebar . PHP_EOL;
											$texto_sidebar = str_replace($sidebar_array['sidebar_title_tag'], "", $texto_sidebar);
//echo PHP_EOL . '4 - sidebar text ' . $texto_sidebar . PHP_EOL;
											$texto_sidebar = str_replace($remove_txt1, "", $texto_sidebar);
//echo PHP_EOL . '5 - sidebar text ' . $texto_sidebar . PHP_EOL;
											$texto_sidebar = str_replace($remove_txt2, "", $texto_sidebar);
//echo PHP_EOL . '6 - sidebar text ' . $texto_sidebar . PHP_EOL;
											$texto_sidebar = str_replace($table_tags, "", $texto_sidebar);
//echo PHP_EOL . '7 - sidebar text ' . $texto_sidebar . PHP_EOL;
											$texto_sidebar = removeEmptyLines($texto_sidebar);
///echo PHP_EOL . '8 - sidebar text ' . $texto_sidebar . PHP_EOL;
										}
										$intro = extractTag($cat_post_text, 'class="intronota"','<td','</td>');
										$title = extractTag($cat_post_text, 'class="titulo_nota_suplementos_nosotras"','<span','</span>');
										//$subtitulo = extractTag($cat_post_text, 'class="subtitulos_noticias"','<span','</span>');
if (substr_count($cat_post_text, '<p class="subtitulos_noticias"'))
{
										$subtitulos = extractTags($cat_post_text, 'class="subtitulos_noticias"','<p','</p>');
										foreach ($subtitulos as $oldsubtitle)
										{
											$newsubtitle = str_replace('<p', '<h4', $oldsubtitle);
											$newsubtitle = str_replace('</p', '</h4', $newsubtitle);
											$cat_post_text = str_replace($oldsubtitle, $newsubtitle, $cat_post_text);
										}
}
if (substr_count($cat_post_text, '<font class="subtitulos_noticias"'))
{
										$subtitulos = extractTags($cat_post_text, 'class="subtitulos_noticias"','<font','</font>');
										foreach ($subtitulos as $oldsubtitle)
										{
//echo 'OLD SUBTITLE = ' . $oldsubtitle . PHP_EOL;
											$newsubtitle = str_replace('<font', '<h4', $oldsubtitle);
											$newsubtitle = str_replace('</font', '</h4', $newsubtitle);
											$cat_post_text = str_replace($oldsubtitle, $newsubtitle, $cat_post_text);
										}
}
										$cat_post_text = str_replace($intro, "", $cat_post_text);
										$cat_post_text = str_replace($title, "", $cat_post_text);
										//$cat_post_text = str_replace($subtitulo, "", $cat_post_text);
										$cat_post_text = str_replace($credito , "", $cat_post_text);
										$cat_post_text = str_replace($credito_nota_interna , "", $cat_post_text);
										$cat_post_text = str_replace($correo, "", $cat_post_text);
										$text = html_entity_decode($title,ENT_QUOTES,"UTF-8");
										$clean_title = wp_strip_all_tags($text);
										$clean_intro = wp_strip_all_tags($intro);
										$new_intro_tag ='';
										if ($clean_intro && $clean_intro != $clean_title)
										{
											$new_intro_tag = '<ul class="intro"><li>' . $clean_intro . '</li></ul>';
										}
										$permalink = remove_accents($clean_title );
		if (strlen($permalink) > 40 )
		{
			$permalink = substr($permanoticia,0,40);
			$permalink = substr($permanoticia, 0, strrpos( $permalink, ' ') );
			$permalink = remove_accents($permanoticia);
		}
										//$clean_title = wp_strip_all_tags($title);
										$cat_post_text = getTextBetween($cat_post_text, '<div align="left" class="texto_noticias">', '<!-- fin articulo.info -->');	
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
										$cat_post_text = removeTag($cat_post_text,'href="http://adserver.laprensa.com.ni','<a ','</a>');
										//$cat_post_text = removeTag($cat_post_text,'align','<table ','>');
										//$cat_post_text = removeTag($cat_post_text,'width','<table ','>');
										$cat_post_text = str_replace($pic_tag, "", $cat_post_text );
										$cat_post_text = str_replace($remove_txt1, "", $cat_post_text );
										$cat_post_text = str_replace($remove_txt2, "", $cat_post_text );
										$cat_post_text = str_replace($table_tags, "", $cat_post_text );
										$cat_post_text = replaceTextTables($cat_post_text);
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
										echo 'credito SIDEBAR' . PHP_EOL . $credito_nota_sidebar . PHP_EOL;
										echo 'correo' . PHP_EOL . $correo . PHP_EOL;
										echo 'ASIDE' . PHP_EOL . $aside . PHP_EOL;
										echo PHP_EOL . $creacion . PHP_EOL;
										echo PHP_EOL . $cat_post_text . PHP_EOL;
										echo "pull in relevent components from /var/www/html/wp-admin/archivo-import.php!" . PHP_EOL;
										echo PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL; 
*/	

										$cat_post_pic = $cat_dir . $cat_pic_file;
										echo 'credito interna' . PHP_EOL . $credito_nota_interna . PHP_EOL;
	
								                //$articlesection = $section[$cat_name];
								                $articlesection = 25763; 
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
									if (substr_count($cat_post_file, 'dolo-'))
									{
$clean_post_file = 'idolo-' . getTextBetween($cat_post_file, 'dolo-', '.') . '.info';
									}
									else
									{
									$clean_post_file = $cat_post_file;
									}
										$query = "SELECT post_id FROM wp_2_postmeta where meta_key = 'lparchivo' and meta_value = '" . $clean_post_file . "' LIMIT 1;"; 

//echo PHP_EOL . 'cat_post_text = ' . PHP_EOL . $cat_post_text . PHP_EOL;
										$article_exists = $wpdb->get_var("$query");
										echo "articleexists = $article_exists" . PHP_EOL;
										echo $query . PHP_EOL;
									        if (empty($article_exists))
									        {
	
											$q++;
											echo "q = $q";
                									$post_id = wp_insert_post($post);

/*											if ($subtitulo)
											{
												$clean_subtitulo = ucfirst(wp_strip_all_tags($subtitulo));
												if ($clean_title != $clean_subtitulo)
												{
													$subtitulo_meta = add_post_meta( $post_id, 'subtitulo', $clean_subtitulo , true );
												}
											}
*/
											$new_posts[] = $has_sidebar . ' - http://www.laprensa.com.ni/index.php?p=' . $post_id . PHP_EOL;
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

									                $migrated_lparchivo = add_post_meta( $post_id, 'lparchivo', $clean_post_file, true );
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
											add_post_meta( $post_id, 'peso', 0, true );
											add_post_meta( $post_id, 'destacado', 0, true );
											add_post_meta( $post_id, 'breves', 0, true );
$clean_autor = wp_strip_all_tags($credito_nota_interna);
											$author_results = add_post_meta( $post_id, 'autor', $clean_autor, true);
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
								                                $image_data = file_get_contents("$file");
							        	                        $filename = sanitize_file_name(basename($cat_post_pic));
								                                $img_title = substring_index ($cat_pic_file, '.', 1);
								                                $img_title = preg_replace('/\.[^.]+$/', '', $img_title);
									if (substr_count($cat_pic_file, 'dolo-'))
									{
$filename = 'idolo-' . getTextBetween($cat_pic_file, 'dolo-', '.') . '.jpg';
$img_title = 'idolo-' . getTextBetween($cat_pic_file, 'dolo-', '.');
									}
echo 'FILE NAME = ' . $filename . PHP_EOL;
							                	                if(wp_mkdir_p($wp_upload_dir['path']))
							                        	            $file = $wp_upload_dir['path'] . '/' . $filename;
							                                	else
												    $file = $wp_upload_dir['basedir'] . '/' . $filename;
								                                file_put_contents($file, $image_data);
echo 'FILE = ' . $file . PHP_EOL;
								                                //create post attachment
								                                $wp_filetype = wp_check_filetype($filename, null);
								                                //$get_img_title_var = get_page_by_title( $img_title);
								                                //$get_img_title_var = wp_get_attachment_link( '', '' , $img_title, false, false );
							        	                        //$get_pic_title_var = get_page_by_title( $pic);
												$caption = wp_strip_all_tags($credito);
							                        	        $attachment = array(
							                                	        'guid' => $wp_upload_dir['url'] . '/' . $cat_pic_file,
								                                        'post_author'    => '109',    //The user ID number of the author.
								                                        'post_mime_type' => $wp_filetype['type'],
								                                        'post_title' => $img_title,
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

                                        								$update_post = array(
								                                          'ID'             => $post_id,
							        	                                  'post_content'   => $cat_post_text, //The full text of the post.
							                	                //        'post_exerpt'    => $articleexerpt, //The exerpt of the post.
							                        	                  'post_date'      => $creacion, //The time post was made.
							                                	          'post_date_gmt'  => $gmt_creacion,
							                                        	  'post_status'    => $post_status ////The time post was made, in GMT.
								                                        );
//								                                        $update_post_results = wp_update_post($update_post);
//											usleep(500000);
                	                        						}
											}
											else
											{
echo PHP_EOL . 'IF EXIST TEST FAILED .. FILE NAME = ' . $cat_post_pic. PHP_EOL;
											}

if ($q == 10)
{
//exit;
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
foreach ($new_posts as $new_post)
{
        echo $new_post;
        $xx++;
}
echo PHP_EOL . $xx . ' ARTICLES CREATED' . PHP_EOL;

echo PHP_EOL . "Articles Imported: $q";
echo PHP_EOL . "Articles Skipped: $skipped";
echo PHP_EOL . "start time : $start_time";
echo PHP_EOL . "end time: " . date("Y-m-d H:i:s") . PHP_EOL;

?>
