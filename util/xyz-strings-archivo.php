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
$cat_post_body = '/var/www/html/laprensa/lp-archivo/public_html/archivo/2000/junio/01/regionales/regionales-20000601-04.info';
$cat_pic_file = 'economia-20000529-01.jpg';
$cat_post_text = file_get_contents($cat_post_body);





$cat_post_text = str_ireplace("\x0D", "", $cat_post_text);
$cat_post_text = str_ireplace(' alt="."', "", $cat_post_text);
$cat_post_text = mb_convert_encoding($cat_post_text, "UTF-8", "CP1252");
$post_text = extractTag_CS($cat_post_text, 'size="2" face="Georgia, Times New Roman, Times, serif"', '<P><font ', '</FONT><img src="/img/cuadritonaranja.gif" width="6" height="6"></P>');

echo 'POST TEXT NEW' . PHP_EOL . $post_text . PHP_EOL;
$post_text = getTextBetween($post_text, '<P><font size="2" face="Georgia, Times New Roman, Times, serif">', '</FONT><img src="/img/cuadritonaranja.gif" width="6" height="6"></P>');
$post_text = '<p class="archivo_v1_body">' . $post_text . '</p>';

echo 'POST TEXT NEW' . PHP_EOL . $post_text . PHP_EOL;
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
$pic_tag = extractTag_CS($cat_post_text, $cat_pic_file,'<IMG ','>');
$cat_post_text = str_replace($pic_tag, "", $cat_post_text );
}
$post_text = $intro_text . $autor_text . $post_text;




echo PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL; 
echo 'ANTETITULO_TEXT' . PHP_EOL . $antetitulo_text . PHP_EOL;
echo 'ANTETITULO' . PHP_EOL . $clean_antetitulo . PHP_EOL;
echo 'CAPTION' . PHP_EOL . $clean_caption . PHP_EOL;
echo 'AUTOR CLEAN' . PHP_EOL . $clean_autor . PHP_EOL;
echo 'AUTOR' . PHP_EOL . $autor_text. PHP_EOL;
echo 'FOTO' . PHP_EOL . $pic_tag . PHP_EOL;
echo 'TITLE' . PHP_EOL . $title . PHP_EOL;
echo 'CLEAN TITLE' . PHP_EOL . $clean_title . PHP_EOL;
echo 'PERMALINK' . PHP_EOL . $permalink . PHP_EOL;
echo 'INTRO_TEXT' . PHP_EOL . $intro_text . PHP_EOL;
echo 'POST TEXT NEW' . PHP_EOL . $post_text . PHP_EOL;
?>
