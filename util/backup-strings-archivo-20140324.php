<?php
define('WP_USE_THEMES', true);
//define( 'SHORTINIT', true );
//$dir = new DirectoryIterator(dirname(__FILE__));
//date_default_timezone_set('America/Managua');
//setlocale(LC_ALL, "es_NI.utf8");
$_SERVER[ 'HTTP_HOST' ] = 'noticias.laprensa.com.ni';
require_once( '/var/www/html/lpmu/wp-load.php' );
require_once('/var/www/html/lpmu/wp-config.php');
//require_once('/var/www/html/lpmu/wp-includes/wp-db.php');
require_once( '/var/www/html/lpmu/wp-admin/includes/image.php' );
switch_to_blog('2');
global $wpdb;
require_once("/var/www/html/lpmu/wp-includes/formatting.php");
function extractSidebar($str)
{
      //str - string to search
      //id - text to search for
      $start_tag = '<p';
      $end_tag = '</td>';
      $block_end_tag = '</td>';
      $block_start_tag = '<td';
	$sidebar_paragraphs = substr_count($str, 'class="texto_sidebar"');
	$sidebar_titles = substr_count($str, 'class="titulo_sidebar"');
	$sidebar_subtitles = substr_count($str, 'class="subtitulo_sidebar"');
	$count = $sidebar_subtitles + $sidebar_paragraphs;
	if ($sidebar_titles)
		{
		$block_start = 'class="titulo_sidebar"';
		$pos_srch = strpos($str,$block_start);
                //extract string up to id value
                $beg = substr($str,0,$pos_srch);
                //get position of start delimiter
                $pos_start_tag = strrpos($beg,$block_start_tag);
        	$last_tag = strpos($str,$block_end_tag,$pos_start_tag);
		$block_string = substr($str, $pos_start_tag, $last_tag);
		$count = $count + 1 - substr_count($str, 'class="titulo_sidebar"');
		if ($sidebar_subtitles)
			{
			$sub_block_start = 'class="subtitulo_sidebar"';
                	$sub_block_start_tag = '<p';
                	$sub_block_end_tag = '</p>';
                	$sub_pos_srch = strpos($str,$sub_block_start,$sub_last_tag);                
			$sub_next_tag = strpos($str,$sub_block_start_tag,$sub_pos_srch);
                	$sub_last_tag = strpos($str,$sub_block_end_tag,$sub_next_tag);
                	$sub_block_string = substr($str, $sub_next_tag, $last_tag);
			$sub_block_count = substr_count($str, 'class="subtitulo_sidebar"');
			if ($sub_block_count == $sidebar_subtitles)
			{
			$count = $count - $sub_block_count + 1;
			$sub_block_equals = 'TRUE';
			}
			}
		if ($sidebar_subtitles && !$sidebar_paragraphs)
			{
			$id = 'class="subtitulo_sidebar"';
			$end_tag = '</p>';
			}
		elseif (!$sidebar_subtitles && !$sidebar_paragraphs)
			{
			$start_tag = '<td';
			$id = 'class="titulo_sidebar"';
			}
		else
			{
			$id = 'class="texto_sidebar"';
			$end_tag = '</p>';
			}
		}
	elseif ($sidebar_subtitles)
		{
		$block_start = 'class="subtitulo_sidebar"';
      		$block_start_tag = '<p';
      		$block_end_tag = '</p>';
		$pos_srch = strpos($str,$block_start);
                //extract string up to id value
                $beg = substr($str,0,$pos_srch);
                //get position of start delimiter
                $pos_start_tag = strrpos($beg,$block_start_tag);
        $last_tag = strpos($str,$block_end_tag,$pos_start_tag);
	$block_string = substr($str, $post_start_tag, $last_tag);
	$count = $count - substr_count($str, 'class="subtitulo_sidebar"');
		if (!$sidebar_paragraphs)
			{
			$id = 'class="subtitulo_sidebar"';
			$end_tag = '</p>';
			}
		else
			{
			$id = 'class="texto_sidebar"';
			$end_tag = '</p>';
			}
		}
	else
		{
		$id = 'class="texto_sidebar"';
      		$block_start_tag = '<p';
		$block_start = 'class="texto_sidebar"';
      		$block_end_tag = '</p>';
		$end_tag = '</p>';
		$pos_srch = strpos($str,$block_start);
                 //extract string up to id value
                $beg = substr($str,0,$pos_srch);
                //get position of start delimiter
                $pos_start_tag = strrpos($beg,$block_start_tag);
        $last_tag = strpos($str,$block_end_tag,$pos_start_tag);
	$block_string = substr($str, $post_start_tag, $last_tag);
	$count = $count - substr_count($str, 'class="texto_sidebar"');
		}
	
//$id = 'sidebar';
echo PHP_EOL . 'pos_srch = ' . $pos_srch;
echo PHP_EOL . 'beg = ' . $beg;
echo PHP_EOL . 'pos_start_tag = ' . $pos_start_tag;
        //$last_tag = strrpos($str,$start_tag,$pos_start_tag);
        //$last_tag = strpos($str,$block_end_tag,$pos_start_tag);
$block_string = substr($str, $pos_start_tag, $last_tag);
	//$count = $count - substr_count($str, 'class="titulo_sidebar"');
         //get position of end delimiter
echo 'new_start = ' . $last_tag;
	while ($i<$count)
		{
        	$next_tag = strpos($str,$start_tag,$last_tag);
        	$last_tag = strpos($str,$end_tag,$next_tag);
		//$last_tag = $pos_end_tag;
echo PHP_EOL . 'last_tag = ' . $last_tag . PHP_EOL;
		$i++;
		}
        	 //length of end deilimter
        	 $end_tag_len = strlen($end_tag);
        	 //length of string to extract
        	 $len = ($last_tag+$end_tag_len)-$pos_start_tag;
        		
echo 'end_tag_len = ' . $end_tag_len;
echo 'len = ' . $len;
	 //Extract the tag
         $sidebar_text = substr($str,$pos_start_tag,$len);
echo PHP_EOL . 'count = ' . $count;
echo PHP_EOL . 'count paragraph = ' . $sidebar_paragraphs;
echo PHP_EOL . 'count title = ' . $sidebar_titles;
echo PHP_EOL . 'count subtitle = ' . $sidebar_subtitles;
echo PHP_EOL . 'block_start = ' . $block_start ;
echo PHP_EOL . 'block_string = ' . $block_string ;
echo PHP_EOL . 'block_start_tag = ' . $block_start_tag ;
echo PHP_EOL . 'end = ' . $end_tag ;
echo PHP_EOL . 'start_tag = ' . $start_tag ;
echo PHP_EOL . 'id = ' . $id;
echo PHP_EOL . 'sublock equals = ' . $sub_block_equals;

$total_str_len = strlen($str);
$credito_srch_str = substr($str,$pos_start_tag,$total_str_len);
$credito_sidebar = extractTag($credito_srch_str , 'class="credito_nota_interna"','<span ','</span>');
$sidebar_title_tag = extractTag($sidebar_text , 'class="titulo_sidebar','<span ','</span>');
$sidebar_title = wp_strip_all_tags($sidebar_title_tag);
//$credito_nota_sidebar = str_replace("credito_nota_interna", "credito_nota_sidebar", $credito_nota_sidebar );
$tag = array (
		sidebar_text => $sidebar_text,
		sidebar_title => $sidebar_title ,
		sidebar_title_tag => $sidebar_title_tag ,
		sidebar_credit => $credito_sidebar
	);
		
         return $tag;
}

function removeTag($str, $id, $start_tag, $end_tag)
{
//str – string to search
//id – text to search for
//start_tag – start delimiter to remove
//end_tag – end delimiter to remove
//find position of tag identifier. loops until all instance of text removed
while(($pos_srch = strpos($str,$id)) !== false)
{
//get text before identifier
$beg = substr($str, 0, $pos_srch);
//get position of start tag
$pos_start_tag = strrpos($beg, $start_tag);
//extract text up to but not including start tag
$beg = substr($beg, 0, $pos_start_tag);
//echo PHP_EOL . PHP_EOL . "beg: ".$beg;
//get text from identifier and on
$end = substr($str, $pos_srch);
//echo PHP_EOL . PHP_EOL . "end : ".$end ;
//get length of end tag
$end_tag_len = strlen($end_tag);
//echo PHP_EOL . PHP_EOL . "end_tag_len : ".$end_tag_len ;
//find the first position of end tag
$pos_end_tag = strpos($end, $end_tag);
//echo PHP_EOL . PHP_EOL . "pos_end_tag : ".$pos_end_tag ;
//compare the number of start tags and end tags within the current end tag pointed to
//there should be equal number of start tags and end tags (considering children of same tag)
while (substr_count(substr($end, 0, $pos_end_tag), $start_tag) < substr_count(substr($end, 0, $pos_end_tag), $end_tag))
{
//find position of next end tag
$pos_end_tag = strpos($end, $end_tag, $pos_end_tag);
//echo PHP_EOL . PHP_EOL . "pos_end_tag : ".$pos_end_tag ;
}
//extract after end tag and on
$end = substr($end, $pos_end_tag + $end_tag_len);
$str = $beg.$end;
}
//return processed string
return $str;
}
 function extractTag($str,$id,$start_tag,$end_tag)
 {
      //str - string to search
      //id - text to search for
      //start_tag - start delimiter
     //end_tag - end delimiter
         
         if($id) 
         {
                 $pos_srch = strpos($str,$id);
                 //extract string up to id value
                 $beg = substr($str,0,$pos_srch);
                 
                 //get position of start delimiter
                 $pos_start_tag = strrpos($beg,$start_tag);
         }
         else
                $pos_start_tag = strpos($str,$start_tag); //if no id value get first tag found
                
         //get position of end delimiter
         $pos_end_tag = strpos($str,$end_tag,$pos_start_tag);
         //length of end deilimter
         $end_tag_len = strlen($end_tag);
         //length of string to extract
         $len = ($pos_end_tag+$end_tag_len)-$pos_start_tag;
         //Extract the tag
         $tag = substr($str,$pos_start_tag,$len);
         if (substr_count($str, $id)) 
         {
	 return $tag;
	 }
	 else
	 {
	 return "";
	 }
 }
function removeEmptyLines($string)
{
return preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $string);
}
function getTextBetween($str, $delim_start, $delim_end)
{
	$delim_pos_start = strpos(strtolower($str), $delim_start);
	$delim_pos_start = $delim_pos_start + strlen($delim_start);
	$delim_pos_end_1 = strpos(strtolower($str), $delim_end, $delim_pos_start);
	$delim_pos_end = $delim_pos_end_1 - $delim_pos_start;
	$text = substr( $str, $delim_pos_start, $delim_pos_end );
	return $text;
}
function replaceTextTables($str)
{
	$delim_start = preg_quote('<table ','#');
	$delim_end = preg_quote('>','#');
	$newvalue = '5';
	$tag_delim_end = '"';
	$table_search_str = '#(' . $delim_start . ')(.*)(' . $delim_end . ')#';
// echo 'delim_start ' . PHP_EOL . $delim_start . PHP_EOL;
//echo 'delim_end ' . PHP_EOL . $delim_end . PHP_EOL;
//echo 'table_search_str ' . PHP_EOL . $table_search_str . PHP_EOL;
preg_match_all ($table_search_str ,$str, $matches);
print_r($matches);
$styles = array("width", "border", "align", "cellspacing", "cellpadding", "bgcolor");
foreach ($matches[0] as $match)
	{
	echo 'match' . PHP_EOL .$match;
	//$oldvalue=getTextBetween($match, $delim_start, $tag_delim_end);
	foreach ($styles as $style)
		{
		$style = $style . '="';
		if (substr_count($match, $style))
			{
			$oldvalue = getTextBetween($match, $style, $tag_delim_end);
			$oldstring = $style . $oldvalue . $tag_delim_end;
			//$newstring = $style . $newvalue . $tag_delim_end;
			$newstring = ''; 
			echo 'oldstring' . PHP_EOL . $oldstring. PHP_EOL;
			echo 'newstring' . PHP_EOL . $newstring. PHP_EOL;
			$newtag = str_replace($oldstring,$newstring,$match);
			echo 'newtag ' . PHP_EOL . $newtag . PHP_EOL;
			$str = str_replace($match,$newtag,$str);
			$match = $newtag;
			}
		}
	$match_no_spaces = str_replace(' ', '', $match);
	$str = str_replace($match,$match_no_spaces,$str);
	}
	return $str;
}
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
