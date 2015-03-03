<?php
//$wp->register_globals();
require_once(WP_PATH . 'wp-admin/includes/media.php');
define('DONOTCACHEPAGE', true);
define('DONOTCACHEDB', true);
define('DONOTCACHEOBJECT', true);
function substring_index($subject, $delim, $substring_index_count){
    if($substring_index_count < 0){
        return implode($delim, array_slice(explode($delim, $subject), $substring_index_count));
    }else{
        return implode($delim, array_slice(explode($delim, $subject), 0, $substring_index_count));
    }
}
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
	$sb_count = $sidebar_subtitles + $sidebar_paragraphs;
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
		$sb_count = $sb_count + 1 - substr_count($str, 'class="titulo_sidebar"');
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
			$sb_count = $sb_count - $sub_block_count + 1;
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
	$sb_count = $sb_count - substr_count($str, 'class="subtitulo_sidebar"');
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
	$sb_count = $sb_count - substr_count($str, 'class="texto_sidebar"');
		}
	
//$id = 'sidebar';
//echo PHP_EOL . 'pos_srch = ' . $pos_srch;
//echo PHP_EOL . 'beg = ' . $beg;
//echo PHP_EOL . 'pos_start_tag = ' . $pos_start_tag;
        //$last_tag = strrpos($str,$start_tag,$pos_start_tag);
        //$last_tag = strpos($str,$block_end_tag,$pos_start_tag);
$block_string = substr($str, $pos_start_tag, $last_tag);
	//$count = $count - substr_count($str, 'class="titulo_sidebar"');
         //get position of end delimiter
//echo 'new_start = ' . $last_tag;
	while ($ii<$sb_count)
		{
        	$next_tag = strpos($str,$start_tag,$last_tag);
        	$last_tag = strpos($str,$end_tag,$next_tag);
		//$last_tag = $pos_end_tag;
//echo PHP_EOL . 'last_tag = ' . $last_tag . PHP_EOL;
		$ii++;
		}
        	 //length of end deilimter
        	 $end_tag_len = strlen($end_tag);
        	 //length of string to extract
        	 $len = ($last_tag+$end_tag_len)-$pos_start_tag;
        		
//echo 'end_tag_len = ' . $end_tag_len;
//echo 'len = ' . $len;
	 //Extract the tag
         $sidebar_text = substr($str,$pos_start_tag,$len);
//echo PHP_EOL . 'sb_count = ' . $sb_count;
//echo PHP_EOL . 'count paragraph = ' . $sidebar_paragraphs;
//echo PHP_EOL . 'count title = ' . $sidebar_titles;
//echo PHP_EOL . 'count subtitle = ' . $sidebar_subtitles;
//echo PHP_EOL . 'block_start = ' . $block_start ;
//echo PHP_EOL . 'block_string = ' . $block_string ;
//echo PHP_EOL . 'block_start_tag = ' . $block_start_tag ;
//echo PHP_EOL . 'end = ' . $end_tag ;
//echo PHP_EOL . 'start_tag = ' . $start_tag ;
//echo PHP_EOL . 'id = ' . $id;
//echo PHP_EOL . 'sublock equals = ' . $sub_block_equals;

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
if (substr_count($id) && substr_count($start_tag) &&substr_count($end_tag))
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
}
//return processed string
return $str;
}
 function extractTag_CS($str,$id,$start_tag,$end_tag)
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
         
         return $tag;
 }


 function extractTag($str,$id,$start_tag,$end_tag)
 {
      //str - string to search
      //id - text to search for
      //start_tag - start delimiter
     //end_tag - end delimiter
         
         if($id) 
         {
                 $pos_srch = stripos($str,$id);
                 //extract string up to id value
                 $beg = substr($str,0,$pos_srch);
                 
                 //get position of start delimiter
                 $pos_start_tag = strripos($beg,$start_tag);
         }
         else
                $pos_start_tag = stripos($str,$start_tag); //if no id value get first tag found
                
         //get position of end delimiter
         $pos_end_tag = stripos($str,$end_tag,$pos_start_tag);
         //length of end deilimter
         $end_tag_len = strlen($end_tag);
         //length of string to extract
         $len = ($pos_end_tag+$end_tag_len)-$pos_start_tag;
         //Extract the tag
         $tag = substr($str,$pos_start_tag,$len);
         
         return $tag;
 }

 function extractTags($str,$id,$start_tag,$end_tag)
 {
      //str - string to search
      //id - text to search for
      //start_tag - start delimiter
     //end_tag - end delimiter
        if ($id)
	{
		$ex_tags_count = substr_count($str, $id);
	}
	else
	{
		$ex_tags_count = substr_count($str, $start_tag);
	}
	$tags = array();
	while ($iv<$ex_tags_count)
	{
         if($id) 
         {
                 $pos_srch = stripos($str,$id,$pos_end_tag);
                 //extract string up to id value
                 $beg = substr($str,0,$pos_srch);
                 
                 //get position of start delimiter
                 $pos_start_tag = strripos($beg,$start_tag);
         }
         else
                $pos_start_tag = stripos($str,$start_tag,$pos_end_tag); //if no id value get first tag found
                
         //get position of end delimiter
         $pos_end_tag = stripos($str,$end_tag,$pos_start_tag);
         //length of end deilimter
         $end_tag_len = strlen($end_tag);
         //length of string to extract
         $len = ($pos_end_tag+$end_tag_len)-$pos_start_tag;
         //Extract the tag
         $tags[] = substr($str,$pos_start_tag,$len);
	 $iv++;
         }
         return $tags;
 }

function removeEmptyLines($string)
{
$remove_txt = array('<style>p{ padding: 5px; }</style>');
$string = str_replace($remove_txt, "", $string);
return preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $string);
}
function getTextBetween($str, $delim_start, $delim_end)
{
	$delim_pos_start = stripos($str, $delim_start);
	$delim_pos_start = $delim_pos_start + strlen($delim_start);
	$delim_pos_end_1 = stripos($str, $delim_end, $delim_pos_start);
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
//	echo 'match' . PHP_EOL .$match;
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
//			echo 'oldstring' . PHP_EOL . $oldstring. PHP_EOL;
//			echo 'newstring' . PHP_EOL . $newstring. PHP_EOL;
			$newtag = str_replace($oldstring,$newstring,$match);
//			echo 'newtag ' . PHP_EOL . $newtag . PHP_EOL;
			$str = str_replace($match,$newtag,$str);
			$match = $newtag;
			}
		}
	$match_no_spaces = str_replace(' ', '', $match);
	$str = str_replace($match,$match_no_spaces,$str);
	}
	return $str;
}
function removeTableTags($str)
{
	$rtt_count = substr_count($str, '<table ');
	while ($iii<$rtt_count)
	{
	if (substr_count($str, '<table '))
		{	
		$tag_to_remove = extractTag($str,' ','<table','>');
		$str = str_replace($tag_to_remove , "", $str);
//		echo PHP_EOL . 'REMOVE TABLE TAGS' . PHP_EOL;
//		echo PHP_EOL . $str . PHP_EOL;
		}
	$iii++;
	}
	return $str;
}
function insertAside($str,$strAcl)
{
$str = str_ireplace("\x0D", "", $str);
//$str = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x80-\x9F]/u', '', $str);
//$str =  mb_convert_encoding($str, "UTF-8", "CP1252");
//$str =  mb_convert_encoding($str, "UTF-8", "ISO-8859-1");
$str = html_entity_decode($str,ENT_QUOTES,"UTF-8");
$line_breaks = array('</p>','<br>','<br />','</h1>','</h2>','</h3>','</h4>','</h5>','</div>');
foreach ($line_breaks as $line_break)
{
	$xy = mb_substr_count($str,$line_break);
//	echo PHP_EOL . $line_break . ' = ' . $xy;
	$break_count = $break_count + $xy; 
}
$php_eol = mb_substr_count($str,PHP_EOL);
//echo PHP_EOL . 'PHP_EOL' . ' = ' . $php_eol;
//echo PHP_EOL . $break_count . ' = ' . 'total line breaks';
if ($php_eol > $break_count)
{
$break_count = $php_eol - $break_count + $break_count;
}
//echo PHP_EOL . $break_count . ' = ' . 'total line breaks after removing php_eol';
$alength = mb_strlen($str);
$sblength = mb_strlen($strAcl);
//echo "\n\n\narticle length = $alength\n\n";
//echo "\n\n\nsidebar length = $sblength\n\n";
//	echo PHP_EOL . 'sidebar goes inside story' . PHP_EOL;
	foreach ($line_breaks as $line_break)
	{
		$lb_count = mb_substr_count($str,$line_break);
		$prev_pos = 0;
		$ii = 0;
		while ($ii < $lb_count)
		{
			$new_pos = mb_stripos($str,$line_break,$prev_pos);
			$prev_pos = $new_pos + mb_strlen($line_break); 
			$pos[$line_break][] = $prev_pos; 
			$pos_type[$prev_pos][] = $line_break; 
//			echo PHP_EOL . $new_pos . ' = ' . 'position of ' . $line_break;
			$ii++;
		}
	}
//	print_r($pos);
//	print_r($pos_type);
	$desired_entry_point = ((1 - (($sblength/$alength) +.1))/2);
	foreach ($pos_type as $position => $tag)
	{
		$posval = intval($position);
//		echo PHP_EOL . 'posval = ' . $posval . PHP_EOL;
		$pos_calc = $posval/$alength;
//		echo PHP_EOL . 'pos_calc = ' . $pos_calc . PHP_EOL;
		if ($pos_calc > $desired_entry_point)
		{
//			echo PHP_EOL . $entry_point . PHP_EOL;
			break;
		}
		$entry_point = $posval;
	}
if (3 * ($sblength/$alength) > 1)
{
//	echo PHP_EOL . 'sidebar goes on top' . PHP_EOL;
	$entry_point = $pos['</p>'][1];
}
//echo PHP_EOL . 'entry point = ' . $entry_point . PHP_EOL;
$first_half = mb_substr($str,0,$entry_point);
$second_half = mb_substr($str,$entry_point,$alength);
//echo PHP_EOL . 'first half' . PHP_EOL . $first_half . PHP_EOL;
//echo PHP_EOL . 'sidebar' . PHP_EOL . $strAcl . PHP_EOL;
//echo PHP_EOL . 'second half' . PHP_EOL . $second_half . PHP_EOL;
$articletext = $first_half . PHP_EOL . $strAcl . PHP_EOL . $second_half ;

return $articletext;
}
function getAside($idnoticia)
{
global $wpdb, $pgsql_hostname, $pgsql_username, $pgsql_password, $pgsql_db, $pgsql_port, $limit,$idarticulo;
	try     {
	        $acl = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
		if ($idarticulo)
		{
			$sqlacl = "SELECT idaclart as idacl, aclart as acl, intro, texto FROM aclart WHERE idarticlo = $idnoticia limit $limit;";
		}
		else
		{
			$sqlacl = "SELECT idacl, acl, intro, texto FROM acl WHERE idnoticia = $idnoticia limit $limit";
		}
		$strAcl = '<div class="aside-div">';
		$has_bar = 0;
	        foreach ($acl->query($sqlacl) as $bar)
	                {
			if ($bar) {$has_bar = 1;}
			$xyz = $bar['idacl'];
//			echo "\n\n\n\n idacl = $xyz \n\n\n\n";
			$check_acl = $wpdb->get_var( "SELECT meta_id FROM $wpdb->postmeta where meta_key = 'idacl' and meta_value = $xyz limit 1;" );
			if(!empty($check_acl)) {
//				echo "Sidebar has has already been imported into another story!!!";
//				echo "Sidebar = $check_acl";
				//exit;
			}
	          	if(!empty($bar['acl']))
			{
				 $strAcl .= '[doap_box title="' . $bar['acl'] . '" box_color="#336699" class="aside-box"]';
			}
			else
			{
				$strAcl .= '[doap_box title="" box_color="#336699" class="aside-box"]';
			}
	          	if(!empty($bar['intro']))
			 {
	            		$bar['intro'] = explode("\n",$bar['intro']);
	      	      		$strAcl .= '<ul class="aside-intro">';
        	    		foreach($bar['intro'] as $line)
        	      		$strAcl .= '<li>' . $line . '</li>';
            			$strAcl .= '</ul>';
          		}
	          	if(!empty($bar['texto'])) $strAcl .= '<div class="aside-text">' . nl2br($bar['texto']) . '</div>';
	          	$strAcl .= '[/doap_box]';
			$acl_results = add_post_meta( $post_id, 'idacl', $bar['idacl'], false);
//			echo "\nacl_results = $acl_results \n" . PHP_EOL;
	        	}
			if ($has_bar)
			{
			        $strAcl .= '</div>';
			}
			else
			{
				$strAcl = 0;
			}
			$acl = null;
	
		}
		catch(PDOException $e)
		{
		}
	return $strAcl;
}
function s3CopyImage($attach_id)
{
	global $wpdb;
	$attachment_guid_array = $wpdb->get_row( "SELECT * FROM $wpdb->posts where ID = $attach_id LIMIT 1;", ARRAY_A);
	$attachment_guid = $attachment_guid_array['guid'];
	$attachment_mime_type= $attachment_guid_array['post_mime_type'];
	$attachment_site = substring_index($attachment_guid, '/wp-content', 1);
	$attachment_file = substring_index($attachment_guid, '/', -1);
	$attachment_file_extension= substring_index($attachment_file, '.', -1);
	$attachment_filename = substring_index($attachment_file, '.', 1);
	$path = substring_index($attachment_guid, $attachment_site, -1 );
	$path = substring_index($path, $attachment_file, 1 );

	if ($attachment_mime_type == 'application/pdf')
	$myimage_dimensions['0'] = '';
	else
	$myimage_dimensions = list_thumbnail_sizes();
	$s3filecount = 0;
	foreach ($myimage_dimensions as $dimensions)
	{
		$sourcefile = $attachment_filename . $dimensions . '.' . $attachment_file_extension;
		$sourcefile = ABSPATH . $path . $sourcefile;
		$sourcefiles .= $sourcefile . ' ';
	//	$destination_path = 's3://' . BUCKET . $path;
	//	$s3command = '/usr/bin/s3cmd put --config=/var/www/html/.s3cfg --no-check-md5 --skip-existing --no-encrypt -m ' . $attachment_mime_type . ' -P -H --add-header="Expires:`date -u +"%a, %d %b %Y %H:%M:%S GMT" --date "next Year"`" --add-header="Cache-Control:max-age=31536000, public" ' . $sourcefile . ' ' . $destination_path;
		//echo PHP_EOL . 's3command = ' . $s3command . PHP_EOL;
	//	$s3result = exec($s3command);
	//	if ($s3result) $s3filecount++;
	}
	//echo PHP_EOL . $s3filecount . ' thumnails copied to S3!!!!!!!!!' . PHP_EOL;
	$sourcefile = $attachment_filename . '.' . $attachment_file_extension;
	$sourcefile = ABSPATH . $path . $sourcefile;
	$sourcefiles .= $sourcefile . ' ';
	$destination_path = 's3://' . BUCKET . $path;
	$s3command = '/usr/bin/s3cmd put --config=/var/www/html/.s3cfg --no-check-md5 --skip-existing --no-encrypt -m ' . $attachment_mime_type . ' -P -H --add-header="Expires:`date -u +"%a, %d %b %Y %H:%M:%S GMT" --date "next Year"`" --add-header="Cache-Control:max-age=31536000, public" ' . $sourcefiles . $destination_path;
	$s3result = exec($s3command);
//usleep(100000);
	//echo PHP_EOL . 's3command = ' . $s3command . PHP_EOL;
//	echo PHP_EOL . 's3result = ' . $s3result . PHP_EOL;
}
function list_thumbnail_sizes(){
        global $_wp_additional_image_sizes;
        $sizes = array();
        foreach( get_intermediate_image_sizes() as $s ){
                $sizes[ $s ] = array( 0, 0 );
                if( in_array( $s, array( 'thumbnail', 'medium', 'large' ) ) ){
                        $sizes[ $s ][0] = get_option( $s . '_size_w' );
                        $sizes[ $s ][1] = get_option( $s . '_size_h' );
                }else{
                        if( isset( $_wp_additional_image_sizes ) && isset( $_wp_additional_image_sizes[ $s ] ) )
                                $sizes[ $s ] = array( $_wp_additional_image_sizes[ $s ]['width'], $_wp_additional_image_sizes[ $s ]['height'], );
                        }
                }

                foreach( $sizes as $size => $atts ){
                        $image_sizes[] = '-' . implode( 'x', $atts );
                }
        return $image_sizes;
 }
function getNewImages($cat_post_text)
{
	global $wpdb, $pgsql_hostname, $pgsql_username, $pgsql_password, $pgsql_db, $pgsql_port, $articleyear, $articlemonth, $limit, $post_id;
	$cat_post_text = standardizeMediaDivs($cat_post_text);
	$div_info_start = '<div class="info"';
	$div_info_end = '</div>';
	$div_img_start = '<div class="na-media na';
	$div_img_id = ' image-';
	$div_img_end = '</div>';
	$div_gallery_start = '<div class="na-media na-gallery';
	$div_gallery_id = ' gallery-';
	$div_gallery_end = '</div>';
	$new_gal_tag_start = '[gallery ';
	$new_gal_tag_id = 'link="file" ids="';
	$new_gal_tag_end = '"]';
	$afp_img_start = '<img src="';
	$afp_img_id = 'laprensa.com.ni/files/imagen/';
	$afp_img_end = '/>';
	$infografia_start = '<a';
	$infografia_id = 'href="http://www.laprensa.com.ni/infografia/';
	$infografia_end = '</a>';
	$new_infografia_tag = '';
	$has_afp_img = substr_count($cat_post_text,$afp_img_id);
	$has_div_info = substr_count($cat_post_text,$div_info_start);
	$has_div_img = substr_count($cat_post_text,$div_img_start);
	$has_div_gallery = substr_count($cat_post_text,$div_gallery_start);
	$has_infografia = substr_count($cat_post_text,$infografia_id );
	$div_info_array = array();
	$foto_array = array();
	$image = array();
	if ($has_infografia)
	{
		$old_info_tag = extractTag($cat_post_text, $infografia_id, $infografia_start, $infografia_end);
		$cat_post_text = str_replace($old_info_tag, '', $cat_post_text);
		$new_infografia_tag = str_replace($infografia_id , 'href="http://noticias.laprensa.com.ni/infografia/', $old_info_tag);
	} 
	$new_galleries = array();
	if($has_div_gallery)
	{
		$gallery_array = extractTags($cat_post_text, $div_gallery_id, $div_gallery_start, $div_gallery_end);
		foreach ($gallery_array as $gallery)
		{
//			echo PHP_EOL . 'div gallery = ' . $gallery . PHP_EOL;
	        	$old_gallery = getTextBetween($gallery, $div_gallery_id, '"');
			try    
			{
	                        $dbp6 = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
	                        $sql6 = "SELECT coleccion.idcoleccion, coleccion.idimagen, coleccion.texto, imagen.imagen FROM coleccion,imagen WHERE coleccion.idgaleria = $old_gallery and coleccion.idimagen = imagen.idimagen ORDER BY coleccion.idcoleccion LIMIT 100;";
	                        foreach ($dbp6->query($sql6) as $row6)
	                                {
	                       		$gal_image['id'][] = $row6['idimagen'];
	                       		$gal_image['filename'][] = $row6['imagen'];
	                                $gal_image['caption'][]= $row6['texto'];
	                                }
	                        $dbp3 = null;
	               	}
	              	catch(PDOException $e)
	               	{
//	               		echo PHP_EOL . 'old_gallery = ' . $old_gallery . PHP_EOL;
	               	}

			$mmm=0;
			$gal_count = count($gal_image['id']);
			while ($mmm<$gal_count)
			{
				$image_name = $gal_image['filename'][$mmm];
				$caption = wp_strip_all_tags($gal_image['caption'][$mmm]);
				$cat_post_pic = '/var/www/html/laprensa/files/imagen/' . $gal_image['filename'][$mmm];
//				echo PHP_EOL . 'cat_post_pic = ' . $cat_post_pic . PHP_EOL;
				$attach_id = uploadNewImage($cat_post_pic, $image_name, $caption);
	//			s3CopyImage($attach_id);
				$gal_image['new_img_id'][$mmm] = $attach_id;
				$mmm++;	
			}
			$new_img_ids = implode(',',$gal_image['new_img_id']);
			$new_gallery_tag = $new_gal_tag_start . $new_gal_tag_id . $new_img_ids . $new_gal_tag_end;
//			echo PHP_EOL . 'new_gallery_tag = ' . $new_gallery_tag . PHP_EOL;
			$new_galleries[] = $new_gallery_tag;
			$cat_post_text = str_replace($gallery,$new_gallery_tag,$cat_post_text);
			$set_thumb = set_post_thumbnail( $post_id, $gal_image['new_img_id'][0]);
//			echo 'First Gallery Image set_thumb = ' . $set_thumb . PHP_EOL;
		}
		print_r($new_galleries);
	}
	if($has_div_img)
	{
		if ($has_afp_img)
		{
	//		$afp_img_array = extractTags($cat_post_text,$afp_img_id,$afp_img_start,$afp_img_end);
	//		foreach ($afp_img_array as $afp_img)
	//			{
	//			echo PHP_EOL . 'afp img = ' . $afp_img. PHP_EOL;
	//			$old_img = getTextBetween($afp_img, $afp_img_start,'"');
	//			$old_img_file = substring_index($old_img,'/',-1);
	//			$s3command = '/usr/bin/s3cmd put --config=/var/www/html/.s3cfg --no-check-md5 --skip-existing --no-encrypt -P -H --add-header="Expires:`date -u +"%a, %d %b %Y %H:%M:%S GMT" --date "next Year"`" --add-header="Cache-Control:max-age=31536000, public" /var/www/html/laprensa/files/imagen/' . $old_img_file . ' ' . 's3://' . BUCKET . '/afp/';
	//			$s3result = exec($s3command);
	//			$new_img = 'http://laprensa11';
	//			$cat_post_text = str_replace($div_info,'',$cat_post_text);
	//			}
	//	$has_div_info = 0;
		$div_img_id = $afp_img_id;
//		echo PHP_EOL . 'has afp img = ' . $has_afp_img. PHP_EOL;
		}
		if ($has_div_info)
		{
			$div_info_array = extractTags($cat_post_text,'',$div_info_start,$div_info_end);
			foreach ($div_info_array as $div_info)
			{
//				echo PHP_EOL . 'div info = ' . $div_info . PHP_EOL;
				$image['caption'][] = wp_strip_all_tags(removeNewGalleries($new_galleries,$div_info));
				$replace_string = ''; 
				$replace_string = preserveNewGalleries($new_galleries,$div_info);
//				echo PHP_EOL . 'replace_string = ' . $replace_string . PHP_EOL;
				$cat_post_text = str_replace($div_info,$replace_string,$cat_post_text);
			}
		}
		$foto_array = extractTags($cat_post_text, $div_img_id, $div_img_start, $div_img_end);
		foreach ($foto_array as $foto)
		{
//			echo PHP_EOL . 'foto div = ' . $foto . PHP_EOL;
			if ($has_afp_img)
	        	{
	        		$old_img = getTextBetween($foto, $afp_img_start,'"');
				$old_img_file = substring_index($old_img,'/',-1);
				$imgid = substring_index($old_img_file, '.', 1);
				$image['id'][] = $imgid;
	                       	$image['filename'][] = $old_img_file; 
			}
			else
			{
				$imgid = getTextBetween($foto, ' image-', '"');
				$image['id'][] = $imgid; 
				try    
				{
       		                        $dbp3 = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
       		                        $sql3 = "SELECT imagen,credito FROM imagen where idimagen = $imgid limit 1;";
       		                        foreach ($dbp3->query($sql3) as $row3)
                                        {
                         			$image['filename'][] = $row3['imagen'];
                                	        $image['credito'][]= $row3['credito'];
                                        }
                                $dbp3 = null;
                  		}
	             	 	catch(PDOException $e)
        	         	{
  //      	        		echo PHP_EOL . 'articleimgid = ' . $imgid . PHP_EOL;
        	         	}
			}
//			echo PHP_EOL . 'image id = ' . $imgid . PHP_EOL;
			$replace_string = "[imported_image_$imgid]"; 
			$replace_string .= preserveNewGalleries($new_galleries,$foto);
			$cat_post_text = str_replace($foto,$replace_string,$cat_post_text);
		}
//	        echo PHP_EOL . 'IMAGE ARRAY' . PHP_EOL;
//		print_r($image);
//	        echo PHP_EOL . 'INFO ARRAY' . PHP_EOL;
//		print_r($div_info_array);
//	        echo PHP_EOL . 'FOTO ARRAY' . PHP_EOL;
//		print_r($foto_array);
//		echo PHP_EOL;
	}
	$mmm=0;
	$my_count = count($image['id']);
	while ($mmm<$my_count)
	{
		$image_name = $image['filename'][$mmm];
		if (!$image['caption'][$mmm])
		{
			$caption = $image['credito'][$mmm];
		}
		else
		{
			$caption =  $image['caption'][$mmm];
		}
		$cat_post_pic = '/var/www/html/laprensa/files/imagen/' . $image['filename'][$mmm];
//		echo PHP_EOL . 'cat_post_pic = ' . $cat_post_pic . PHP_EOL;
		if (!$image_name)
		{
			$cat_post_pic = getTextBetween($foto_array[$mmm],'img src="','"/>');
			$image_name = substring_index($cat_post_pic , '/', -1);
			$image_test = substring_index($image_name , '_', 1);
			$cat_post_pic_test = '/var/www/html/laprensa/files/imagen/' . $image_test;
			if (file_exists("$cat_post_pic_test"))
			{
				$cat_post_pic = $cat_post_pic_test;
				$image_name = $image_test;
			}
		}
		$attach_id = uploadNewImage($cat_post_pic,$image_name,$caption);

//usleep(100000);

		if ( $attach_id )
		{
			$migrated_idimagen = add_post_meta( $attach_id, 'idimagen', $imgid, false );
			$migrated_idimagen = add_post_meta( $post_id, 'idimagen', $imgid, false );
//usleep(100000);	
			if ($mmm)
			{
				$image_tag = wp_get_attachment_image( $attach_id, 'large', 0, $attr );
//				echo PHP_EOL . 'image_tag = ' . $image_tag . PHP_EOL;
				//	$image_attributes = wp_get_attachment_image_src( $attach_id, 'large' ); // returns an array
				//	if( $image_attributes )
				if( $image_tag)
				{
					$abc = $image['id'][$mmm];
//					echo 'abc = ' . $abc . PHP_EOL;
					//$image_tag = '<img src="'. $image_attributes[0] . '" width="' . $image_attributes[1]. '" height="' . $image_attributes[2] .'">';
					$cat_post_text = str_replace("[imported_image_$abc]", $image_tag, $cat_post_text);
				}
			}
			else
			{
				$set_thumb = 0;
//				echo PHP_EOL . 'mmm = ' . $mmm . PHP_EOL;
//				echo PHP_EOL . 'post_id = '  . $post_id. PHP_EOL;
//				echo PHP_EOL . 'attach_id = ' . $attach_id. PHP_EOL;
				$set_thumb = set_post_thumbnail( $post_id, $attach_id );
//				echo 'set_thumb = ' . $set_thumb . PHP_EOL;
				$abc = $image['id'][0];
				$cat_post_text = str_replace("[imported_image_$abc]", '', $cat_post_text);
			}
	
//			s3CopyImage($attach_id);
//usleep(100000);
		}

//			}

		$mmm++;
	}
	$cat_post_text = $new_infografia_tag . $cat_post_text;
	return $cat_post_text;
}

function uploadNewImage($cat_post_pic, $image_name, $caption)
{
	global $wpdb, $pgsql_hostname, $pgsql_username, $pgsql_password, $pgsql_db, $pgsql_port, $articleyear, $articlemonth, $limit, $post_id, $author, $attach_id;
	$attach_id = '';
	if (substr_count($cat_post_pic, 'http://'))
	{
		if (setLocalFilePath())
		{
			$image = 1;
		}
		else
		{
			if (substr_count($cat_post_pic, ' '))
			{
				$cat_post_pic = str_replace(' ', '%20', $cat_post_pic);
			}
			$image = 1;
			if (substr_count($cat_post_pic, 'laprensa.com.ni'))
			{
				$cat_post_pic = str_replace('http://laprensa.com.ni', 'http://www.laprensa.com.ni', $cat_post_pic);
				$cat_post_pic = str_replace('http://dev.laprensa.com.ni', 'http://www.laprensa.com.ni', $cat_post_pic);
				$cat_post_pic = str_replace('http://www.dev.laprensa.com.ni', 'http://www.laprensa.com.ni', $cat_post_pic);
				$cat_post_pic = str_replace('http://tv.laprensa.com.ni', '/var/www/html/laprensa/tv', $cat_post_pic);
				$cat_post_pic = str_replace('http://www.laprensa.com.ni/tv', '/var/www/html/laprensa/tv', $cat_post_pic);
			}
		}
	}
	else
	{
		$image = file_exists($cat_post_pic);
	}
        if (($image) && (!empty($image_name)))
        {
	        $time = $articleyear . "/" . $articlemonth;
		$wp_upload_dir = wp_upload_dir($time);
		$file = $cat_post_pic;
		$image_data = file_get_contents("$file");
		if (!empty($image_data))
		{
		$filename = remove_accents($image_name);
		$sanitized_image_title = substring_index($filename, '.', 1);
		$sanitized_image_name = sanitize_file_name($filename); 
		$filename = sanitize_file_name($filename);
//		$sanitized_image_name = remove_accents(sanitize_file_name(basename($image_name)));
		if(wp_mkdir_p($wp_upload_dir['path']))
			$file = $wp_upload_dir['path'] . '/' . $filename;
		else
			$file = $wp_upload_dir['basedir'] . '/' . $filename;
//		echo PHP_EOL . 'file = ' . $file . PHP_EOL;
		file_put_contents($file, $image_data);
		//create post attachment
		$wp_filetype = wp_check_filetype($file, null);
//		$img_title = substring_index ($image_name, '.', 1);
//		$img_title = preg_replace('/\.[^.]+$/', '', $img_title);
		$img_url = $wp_upload_dir['url'];
//                                $img_url = str_replace('caricatura.doap.com', 'caricatura.laprensa.com.ni',$img_url);
		$attachment = array(
			'guid' => $img_url . '/' . $sanitized_image_name,
			'ping_status' => 'closed',
			'comment_status' => 'closed',
			'post_author'    => $author,    //The user ID number of the author.
			'post_mime_type' => $wp_filetype['type'],
			'post_title' => $sanitized_image_title,
			'post_content' => '',
			'post_excerpt'   => $caption, //For all your post excerpt needs.
			'post_status' => 'inherit'
		);

		$attach_id = wp_insert_attachment( $attachment, $file, $post_id );
		$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
		wp_update_attachment_metadata( $attach_id, $attach_data );
//		echo "\n attachment creado - # $attach_id \n\n";
		echo $wp_upload_dir['url'] . '/' . $sanitized_image_name;
		}
		if ($temp) fclose($temp);
	}
	else
	{
//		echo 'cat_post_pic = ' . $cat_post_pic . PHP_EOL;
//		echo 'imagen name = ' . $imagen_name . PHP_EOL;
	}
	return $attach_id;
}
function preserveNewGalleries($new_galleries,$str)
{
	print_r($new_galleries);
	$replace_string = '';
	foreach ($new_galleries as $new_gallery)
	{
		if (substr_count($str, $new_gallery))
		{
		$replace_string .= $new_gallery;	
//		echo PHP_EOL . 'new_gallery in function = ' . $new_gallery. PHP_EOL;
		}
	}
 
//	echo PHP_EOL . 'replace_string in function = ' . $replace_string. PHP_EOL;
	return $replace_string;

}

function removeNewGalleries($new_galleries,$str)
{
	foreach ($new_galleries as $new_gallery)
	{
		if (substr_count($str, $new_gallery))
		{
		$str = str_replace($new_gallery, "", $str);
		}
	}
 
	return $str;
}


function getVideos($cat_post_text)
{
	global $wpdb, $pgsql_hostname, $pgsql_username, $pgsql_password, $pgsql_db, $pgsql_port, $articleyear, $articlemonth, $limit, $post_id;
	$cat_post_text = standardizeMediaDivs($cat_post_text);
	$div_info_start = '<div class="info"';
	$div_info_end = '</div>';
	$div_video_start = '<div class="na-media na-video-normal';
	$div_video_id = ' video-';
	$div_video_end = "</div>\n</div>";
	$div_embed_start = '<div class="na-media na-other';
	$div_embed_id = 'youtube';
	$div_embed_end = "</div>\n</div>";
	$new_video_tag_start = '<div class="lp-video-embed">' . PHP_EOL . '[video width="480" height="270" mp4="';
	$new_video_tag_middle = '" poster="';
	$new_video_tag_end = '"][/video]' . PHP_EOL;
	$new_video_tag_end2 = '</div>' . PHP_EOL;
	$new_embed_tag_start = '<div class="video-embed">' . PHP_EOL . '[doap_youtube url="';
	$new_embed_tag_id = '';
	$new_embed_tag_end = '" width="640" height="360"]' . PHP_EOL; 
	$new_embed_tag_end2 = '</div>' . PHP_EOL;
	$has_video = substr_count($cat_post_text,$div_video_start);
	$has_embed = substr_count($cat_post_text,$div_embed_start);
	$div_info_array = array();
	$video_array = array();
	$embed_array = array();
	if ($has_video)
	{
		$old_video_tag_array = extractTags($cat_post_text, $div_video_id, $div_video_start, $div_video_end);
		foreach ($old_video_tag_array as $old_video_tag)
		{
//			echo PHP_EOL . 'old_video_tag = ' . $old_video_tag . PHP_EOL;
			if (substr_count($old_video_tag, $div_info_start))
			{
				$video_title = extractTag($old_video_tag, '', $div_info_start, $div_info_end);
				$cat_post_text = str_replace($video_title, '', $cat_post_text);
				$old_video_tag = str_replace($video_title, '', $old_video_tag);
				$video_title = wp_strip_all_tags($video_title);
				if ($video_title)
				$video_title = '<p class="video-title">' . $video_title . '</p>';
//				echo PHP_EOL . 'video title = ' . $video_title . PHP_EOL;
			}
			if (substr_count($old_video_tag, 'background-image: url('))
			{
				$background = getTextBetween($old_video_tag, 'background-image: url(',');');
//				echo PHP_EOL . 'background = ' . $background . PHP_EOL;
				$poster = $new_video_tag_middle . $background;
//				echo PHP_EOL . 'poster = ' . $poster . PHP_EOL;
				$attachment_file = substring_index($background , '/', -1);
				$attachment_file_type = strtolower(substring_index($attachment_file , '.', -1));
//				echo PHP_EOL . 'attachment_file = ' . $attachment_file . PHP_EOL;
				$attach_id = uploadNewImage($background, $attachment_file , $video_title);
				if ( !update_post_meta( $post_id, '_video_thumbnail', $background ) ) add_post_meta( $post_id, '_video_thumbnail', $background , true );
				if ( !update_post_meta( $attach_id , 'video_thumbnail', 1) ) add_post_meta( $attach_id , 'video_thumbnail', 1, true );
//				echo PHP_EOL . 'attach_id = ' . $attach_id . PHP_EOL;
				$set_thumb = set_post_thumbnail( $post_id, $attach_id );
			}
			$video = getTextBetween($old_video_tag, 'href="', '"');
			$new_video_tag = $new_video_tag_start . $video . $poster . $new_video_tag_end . $video_title . $new_video_tag_end2;
			$new_video_tag = str_replace('media.laprensa.com.ni/clips', 'lpmedia1.doap.us/video', $new_video_tag);
//			echo PHP_EOL . 'new_video_tag = ' . $new_video_tag . PHP_EOL;
			$cat_post_text = str_replace($old_video_tag, $new_video_tag, $cat_post_text);
//			echo PHP_EOL . 'cat_post_text = ' . $cat_post_text . PHP_EOL;
		}
	} 
	if ($has_embed)
	{
		$old_embed_tag_array = extractTags($cat_post_text, $div_embed_id, $div_embed_start, $div_embed_end);
		foreach ($old_embed_tag_array as $old_embed_tag)
		{
//			echo PHP_EOL . 'old_embed_tag = ' . $old_embed_tag . PHP_EOL;
			if (substr_count($old_embed_tag, $div_info_start))
			{
				$embed_title = extractTag($old_embed_tag, '', $div_info_start, $div_info_end);
				$embed_title = wp_strip_all_tags($embed_title );
				if ($embed_title)
				$embed_title = '<p class="video-title">' . $embed_title . '</p>';
//				echo PHP_EOL . 'embed title = ' . $embed_title . PHP_EOL;
			}
			$embed = getTextBetween($old_embed_tag, 'src="', '"');
			$new_embed_tag = $new_embed_tag_start . $embed . $new_embed_tag_end . $embed_title . $new_embed_tag_end2;
//			echo PHP_EOL . 'new_embed_tag = ' . $new_embed_tag . PHP_EOL;
			$cat_post_text = str_replace($old_embed_tag, $new_embed_tag, $cat_post_text);
//			echo PHP_EOL . 'cat_post_text = ' . $cat_post_text . PHP_EOL;
		}
	} 
	return $cat_post_text; 
}
function getlptv_video_info($idlptv)
{
	global $mysql_hostname, $mysql_username, $mysql_password, $mysql_db, $limit;
	$video_info = array();
	try
	{
	        $dbp = new PDO("mysql:dbname=$mysql_db;host=$mysql_hostname", "$mysql_username", "$mysql_password", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	        $sql = "SELECT meta_key, meta_value FROM wp_postmeta WHERE meta_key IN ('_imagevideo', '_videoembed', '_videoembed_manual') AND post_id = $idlptv LIMIT 10;";
	        foreach ($dbp->query($sql) as $row)
	        {
			$meta_key = $row['meta_key'];
			$meta_value = $row['meta_value'];
//			echo PHP_EOL . '_____________' . PHP_EOL . 'meta_key/meta_value' . PHP_EOL . '____________';
//			echo PHP_EOL . $meta_key . PHP_EOL;
//			echo PHP_EOL . $meta_value . PHP_EOL;
//			echo PHP_EOL . '_____________' . PHP_EOL;
			if ($meta_key == '_imagevideo')
			{
				$video_info['poster'] = $meta_value;
			}
			if ($meta_key == '_videoembed')
			{
				if (substr_count($meta_value,'youtube.com'))
				{
					$video_info['video_type'] = 'youtube';
					if (substr_count($meta_key,'src="'))
					{
						$video_info['youtube'] = getTextBetween($meta_value, 'src="', '"');
					}
					else
					{
						$video_info['youtube'] = $meta_value;
					}
				}
				else
				{
					if (substr_count($meta_value,'soundslider'))
					{
						
						$soundslider = getTextBetween($meta_value, 'value="', '/soundslider.swf');
						if (!substr_count($soundslider, 'http://'))
						{
							$soundslider = 'http://' . $soundslider;
						}
						$video_info['soundslider'] = $soundslider . '/index.html';
						$video_info['video_type'] = 'soundslider';
						$video_info['file_type'] = 'swf';
					}
					else
					{
						$video_info['lptv_video'] = $meta_value;
						$video_info['video_type'] = 'lptv';
						$attachment_file = substring_index($meta_value, '/', -1);
						$attachment_file_type = strtolower(substring_index($attachment_file , '.', -1));
						$video_info['file_type'] = $attachment_file_type;
					}
				}
			}
			if ($meta_key == '_videoembed_manual')
			{
				if (substr_count($meta_value,'soundslider'))
				{
						
					$soundslider = getTextBetween($meta_value, 'value="', '/soundslider.swf');
					if (!substr_count($soundslider, 'http://'))
					{
						$soundslider = 'http://' . $soundslider;
					}
					$video_info['soundslider'] = $soundslider . '/index.html';
					$video_info['video_type'] = 'soundslider';
					$video_info['file_type'] = 'swf';
				}
				else
				{
					$video_info['external_video'] = $meta_value;
					$video_info['video_type'] = 'external';
//					echo '!!!!!____' . $meta_key . '____!!!!!' . PHP_EOL;
				}
			}

		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	return $video_info;
}
function standardizeMediaDivs($cat_post_text)
{

	$div_img_start = '<div' ;
	$div_img_id = ' class="na-media';
	$div_img_end = '">';
	$iframe_start = '<p><iframe' ;
	$iframe_end = '</iframe></p>';
	$img_start = '<img ';
	$img_id = 'src="';
	$img_end = '/>';
	$img_array = extractTags($cat_post_text, '', $img_start, $img_end);
	$iframe_array = extractTags($cat_post_text, '', $iframe_start, $iframe_end);
	$div_array = extractTags($cat_post_text, $div_img_id, $div_img_start, $div_img_end);
	foreach ($iframe_array as $iframe)
	{
//		echo PHP_EOL . 'standardize iframe = ' . $iframe;
		$new_iframe = '<div class="na-media na-other">' . $iframe . '<div class="info"></div>'. PHP_EOL . '</div>';
//		echo PHP_EOL . 'standardize new iframe = ' . $new_iframe;
		$cat_post_text= str_replace($iframe, $new_iframe, $cat_post_text);
	}
	foreach ($div_array as $div)
	{
//		echo PHP_EOL . 'standardize div = ' . $div;
		$class = getTextBetween($div, 'class="', '"');
		$new_div = '<div class="' . $class . '">';
//		echo PHP_EOL . 'standardize new div = ' . $new_div;
	//	if (!substr_count($img, 'infografia_id'))
	//	{
			$cat_post_text= str_replace($div, $new_div, $cat_post_text);
	//	}
	}
	foreach ($img_array as $img)
	{
//		echo PHP_EOL . 'standardize img = ' . $img;
		$src = getTextBetween($img, 'src="', '"');
		$new_img = '<img src="' . $src . '"/>';
//		echo PHP_EOL . 'standardize new img = ' . $new_img;
	//	if (!substr_count($img, 'infografia'))
	//	{
			$cat_post_text= str_replace($img, $new_img, $cat_post_text);
	//	}
	}
	return $cat_post_text;
}
function setLocalFilePath()
{
	global $cat_post_pic;
	$orig_path = $cat_post_pic;
	$tmp_pic = $cat_post_pic;
	if (substr_count($tmp_pic, 'http://'))
	{
		$host = getTextBetween($tmp_pic, 'http://', '/');
		if (substr_count($tmp_pic, 'laprensa.com.ni'))
		{
			$tmp_pic = str_replace('http://laprensa.com.ni', 'http://www.laprensa.com.ni', $tmp_pic );
			$tmp_pic = str_replace('http://dev.laprensa.com.ni', 'http://www.laprensa.com.ni', $tmp_pic );
			$tmp_pic = str_replace('http://www.dev.laprensa.com.ni', 'http://www.laprensa.com.ni', $tmp_pic );
			$tmp_pic = str_replace('http://tv.laprensa.com.ni', '/var/www/html/laprensa/tv', $tmp_pic );
			$tmp_pic = str_replace('http://www.laprensa.com.ni/tv', '/var/www/html/laprensa/tv', $tmp_pic );
		}
		if (substr_count($tmp_pic, $host . '/clips'))
		{
			$tmp_url = $host . '/clips';
			$tmp_pic = str_replace($tmp_url, '/var/www/html/laprensa/files/video', $tmp_pic );
		}
		if (substr_count($tmp_pic, $host . '/video'))
		{
			$tmp_url = $host . '/video';
			$tmp_pic = str_replace($tmp_url, '/var/www/html/laprensa/files/video', $tmp_pic );
		}
		if (substr_count($tmp_pic, $host . '/clipsminoticia'))
		{
			$tmp_url = $host . '/clipminoticia';
			$tmp_pic = str_replace($tmp_url, '/var/www/html/laprensa/files/videominoticia', $tmp_pic );
		}
		if (substr_count($tmp_pic, $host . '/files'))
		{
			$tmp_url = $host . '/files';
			$tmp_pic = str_replace($tmp_url, '/var/www/html/laprensa/files', $tmp_pic );
		}
		if (substr_count($tmp_pic, $host . '/wp-content/uploads/sites/55'))
		{
			$tmp_url = $host . '/wp-content/uploads/sites/55';
			$tmp_pic = str_replace($tmp_url, '/var/www/html/wp-content/uploads/sites/55', $tmp_pic );
		}
	}
	if (file_exists("$tmp_pic") && filesize("$tmp_pic"))
	{
		$cat_post_pic = $tmp_pic;
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}
?>

