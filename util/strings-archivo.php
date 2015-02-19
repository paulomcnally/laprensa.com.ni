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
$cat_post_body = '/var/www/html/laprensa/lp-archivo/public_html/archivo/2009/septiembre/10/noticias/deportes/348638.include';
$cat_post_text = file_get_contents($cat_post_body);
$cat_post_text = mb_convert_encoding($cat_post_text, "UTF-8", "ISO-8859-1");
echo $cat_post_text . PHP_EOL . PHP_EOL;
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
$has_intro = substr_count($cat_post_text, 'class="intronota"');
if ($has_intro)
{
$intro = extractTag($cat_post_text, 'class="intronota"','<td','</td>');
$cat_post_text = str_replace($intro, "", $cat_post_text);
}
$title = extractTag($cat_post_text, 'class="titulo_nota_nacionales"','<span','</span>');
$cat_post_text = str_replace($title, "", $cat_post_text);
$cat_post_text = str_replace($credito , "", $cat_post_text);
$cat_post_text = str_replace($credito_nota_interna , "", $cat_post_text);
$cat_post_text = str_replace($correo, "", $cat_post_text);
$text = html_entity_decode($title,ENT_QUOTES,"UTF-8");
$clean_title = wp_strip_all_tags($text);
$permalink = remove_accents($clean_title );
//$clean_title = wp_strip_all_tags($title);

$pic_start = 'src="fotos/';
if (substr_count($cat_post_text, $pic_start)) 
{
        $pic_end = '"';
$foto = getTextBetween($cat_post_text, $pic_start, $pic_end);
}
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
//$cat_post_text = removeTag($cat_post_text,'align','<table ','>');
//$cat_post_text = removeTag($cat_post_text,'width','<table ','>');
$cat_post_text = str_replace($remove_txt, "", $cat_post_text );
$cat_post_text = str_replace($table_tags, "", $cat_post_text );
$cat_post_text = removeEmptyLines($cat_post_text);
$aside = '<div class="archivo-aside-div">[doap_box title="' . $sidebar_array['sidebar_title'] . '" box_color="#336699" class="archivo-aside"]' . $texto_sidebar . '[/doap_box]</div>';
$new_text = replaceTextTables($cat_post_text);
//$cat_post_text = removeTag($cat_post_text ,'trsp','<img src','>');
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
echo 'POST TEXT' . PHP_EOL . $cat_post_text . PHP_EOL;
echo 'NEW POST TEXT' . PHP_EOL . $new_text . PHP_EOL;
?>
