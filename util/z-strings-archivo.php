<?php
define('WP_USE_THEMES', true);
//define( 'SHORTINIT', true );
//$dir = new DirectoryIterator(dirname(__FILE__));
//date_default_timezone_set('America/Managua');
//setlocale(LC_ALL, "es_NI.utf8");
$_SERVER[ 'HTTP_HOST' ] = 'noticias.laprensa.com.ni';
require_once( '/var/www/html/lpmu/wp-load.php' );
require_once('/var/www/html/lpmu/wp-config.php');
require_once('/home/shawn/cleanfunctions.php');
//require_once('/var/www/html/lpmu/wp-includes/wp-db.php');
require_once( '/var/www/html/lpmu/wp-admin/includes/image.php' );
switch_to_blog('2');
global $wpdb;
require_once("/var/www/html/lpmu/wp-includes/formatting.php");
$remove_txt = array('<img src="/img/cuadritonaranja.gif" width="6" height="6" alt=".">','<img src="/img/cuadritonaranja.gif" width="6" height="6">', '<table width="100%" border="0" cellspacing="5" cellpadding="0" xmlns:msxsl="urn:schemas-microsoft-com:xslt" xmlns:user="http://my_domain_name/my_namespace">','<table width="100%" border="0" cellpadding="0" cellspacing="5" bgcolor="#F7F7F7">','<table width="100%" border="0" cellspacing="0" cellpadding="0">','<td width="1" align="left" valign="bottom"><table width="1" border="0" cellspacing="3" cellpadding="0">','<td style="padding-top:8px; padding-bottom:8px">','<td align="left">','<td align="left" valign="top">','</td>');
$table_tags = array('<table>','</table>','<tr>','</tr>','<td>','</td>','<div>','</div>');
$cat_post_body = '/var/www/html/laprensa/lp-archivo/public_html/archivo/2000/mayo/31/economia/economia-20000531-02.info';
$cat_pic_file = 'regionales-20000529-04.jpg';
$cat_post_text = file_get_contents($cat_post_body);
echo $cat_post_text . PHP_EOL . PHP_EOL;
$cat_post_text = str_ireplace("\x0D", "", $cat_post_text);
$cat_post_text = mb_convert_encoding($cat_post_text, "UTF-8", "CP1252");
$post_text = extractTag_CS($cat_post_text, 'size="2" face="Georgia, Times New Roman, Times, serif"', '<P><font ', '</FONT><img src="/img/cuadritonaranja.gif" width="6" height="6"></P>');
$post_text = getTextBetween($post_text, '<P><font size="2" face="Georgia, Times New Roman, Times, serif">', '</FONT><img src="/img/cuadritonaranja.gif" width="6" height="6"></P>');
$post_text = '<p class="archivo_v1_body">' . $post_text . '</p>';
$credito = extractTag($cat_post_text, 'class="credito"','<td ','</td>');
$credito_nota_interna = extractTag($cat_post_text, 'class="credito_nota_interna"','<span ','</span>');
$correo = extractTag($cat_post_text, 'class="correos"','<td ','</td>');
$has_sidebar = substr_count($cat_post_text, 'sidebar');
echo 'HAS SIDEBAR = ' . $has_sidebar;
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
if ($has_antetitulo)
{
$antetitulo_text = extractTag($cat_post_text, 'color="#000000" size="4" face="Georgia, Times New Roman, Times, serif"','<font','</font>');
$clean_antetitulo = wp_strip_all_tags($antetitulo_text);
$cat_post_text = str_replace($antetitulo_text , "", $cat_post_text);
}
if ($has_caption)
{
$caption_text = extractTag($cat_post_text, 'color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size=1','<font','</FONT>');
$clean_caption= wp_strip_all_tags($caption_text);
$cat_post_text = str_replace($caption_text, "", $cat_post_text);
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
$permalink = remove_accents($clean_title );
$cat_post_text = str_replace($title, "", $cat_post_text);
if ($has_image)
{
$pic_tag = extractTag($cat_post_text, $cat_pic_file,'<IMG ','>');
$cat_post_text = str_replace($pic_tag, "", $cat_post_text );
}
$post_text = $intro_text . $autor_text . $post_text;
echo 'TITLE' . PHP_EOL . $title . PHP_EOL;
//$cat_post_text = str_replace($credito , "", $cat_post_text);
//$cat_post_text = str_replace($credito_nota_interna , "", $cat_post_text);
//$cat_post_text = str_replace($correo, "", $cat_post_text);
//$text = html_entity_decode($title,ENT_QUOTES,"UTF-8");
//$clean_title = wp_strip_all_tags($title);

$pic_start = 'src="fotos/';
if (substr_count($cat_post_text, $pic_start)) 
{
        $pic_end = '"';
$foto = getTextBetween($cat_post_text, $pic_start, $pic_end);
}
echo PHP_EOL . 'POST TEXT before removeTAG' . PHP_EOL . $cat_post_text . PHP_EOL;
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
$table_test = extractTag($cat_post_text,' ','<table','>');
//$cat_post_text = removeTag($cat_post_text,'align','<table ','>');
//$cat_post_text = removeTag($cat_post_text,'width','<table ','>');
echo 'POST TEXT before remove_txt' . PHP_EOL . $cat_post_text . PHP_EOL;
$cat_post_text = str_replace($remove_txt, "", $cat_post_text );
echo 'POST TEXT before table_tags' . PHP_EOL . $cat_post_text . PHP_EOL;
$cat_post_text = str_replace($table_tags, "", $cat_post_text );
echo 'POST TEXT before REMOVE table_tags' . PHP_EOL . $cat_post_text . PHP_EOL;
$cat_post_text = removeTableTags($cat_post_text); 
echo 'POST TEXT before REMOVE EMPTY LINES' . PHP_EOL . $cat_post_text . PHP_EOL;
$cat_post_text = removeEmptyLines($cat_post_text);
//$aside = '<div class="archivo-aside-div">[doap_box title="' . $sidebar_array['sidebar_title'] . '" box_color="#336699" class="archivo-aside"]' . $texto_sidebar . '[/doap_box]</div>';
//$new_text = replaceTextTables($cat_post_text);
//$cat_post_text = removeTag($cat_post_text ,'trsp','<img src','>');
echo PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL; 
echo 'ANTETITULO_TEXT' . PHP_EOL . $antetitulo_text . PHP_EOL;
echo 'ANTETITULO' . PHP_EOL . $clean_antetitulo . PHP_EOL;
echo 'CLEAN INTRO' . PHP_EOL . $clean_intro . PHP_EOL;
echo 'INTRO' . PHP_EOL . $intro . PHP_EOL;
echo 'CAPTION' . PHP_EOL . $clean_caption . PHP_EOL;
echo 'AUTOR CLEAN' . PHP_EOL . $clean_autor . PHP_EOL;
echo 'AUTOR' . PHP_EOL . $autor_text. PHP_EOL;
//echo 'FOTO' . PHP_EOL . $foto . PHP_EOL;
echo 'FOTO' . PHP_EOL . $pic_tag . PHP_EOL;
echo 'TITLE' . PHP_EOL . $title . PHP_EOL;
echo 'CLEAN TITLE' . PHP_EOL . $clean_title . PHP_EOL;
echo 'DECODED TITLE' . PHP_EOL . $text. PHP_EOL;
echo 'PERMALINK' . PHP_EOL . $permalink . PHP_EOL;
echo 'table_test ' . PHP_EOL . $table_test . PHP_EOL;
//echo 'credito' . PHP_EOL . $credito . PHP_EOL;
//echo 'credito interna' . PHP_EOL . $credito_nota_interna . PHP_EOL;
//echo 'credito SIDEBAR' . PHP_EOL . $credito_nota_sidebar . PHP_EOL;
//echo 'correo' . PHP_EOL . $correo . PHP_EOL;
//echo 'ASIDE' . PHP_EOL . $aside . PHP_EOL;
echo 'POST TEXT' . PHP_EOL . $cat_post_text . PHP_EOL;
echo 'INTRO_TEXT' . PHP_EOL . $intro_text . PHP_EOL;
echo 'POST TEXT NEW' . PHP_EOL . $post_text . PHP_EOL;
//echo 'NEW POST TEXT' . PHP_EOL . $new_text . PHP_EOL;
?>
