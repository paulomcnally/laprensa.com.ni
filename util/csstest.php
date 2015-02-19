#!/usr/bin/php
<?php
//define('WP_USE_THEMES', true);
//define('BUCKET', 'laprensa.com.ni');
//define('UTILPATH', dirname(__FILE__) . '/');
//define('WP_PATH', dirname(__FILE__) . '/../');
//$_SERVER[ 'HTTP_HOST' ] = 'noticias.laprensa.com.ni';
//require_once(WP_PATH . 'wp-load.php');
//require_once(WP_PATH . 'wp-config.php');
//require_once(WP_PATH . 'wp-includes/formatting.php');
//require_once(UTILPATH . 'cleanfunctions.php');
//require_once(WP_PATH . 'wp-admin/includes/image.php');
//switch_to_blog('2');
//global $wpdb;
function getTextBetween($str, $delim_start, $delim_end)
{
	while (substr_count($str, $delim_start) && substr_count($str, $delim_end))
	{
	$text='';
	$delim_pos_start = '';
	$delim_pos_end_1 = '';
	$delim_pos_end = '';
	$delim2_pos_start = '';
	$delim_pos_start = stripos($str, $delim_start);
	$delim_pos_start = $delim_pos_start + strlen($delim_start);
	$delim_pos_end_1 = stripos($str, $delim_end, $delim_pos_start);
	$delim2_pos_start = stripos($str, $delim_start, $delim_pos_start);
	if ($delim2_pos_start < $delim_pos_end1)
	{
		$delim_pos_end1 = stripos($str, $delim_end, $delim_pos_end_1);
	}
	$delim_pos_end = $delim_pos_end_1 - $delim_pos_start;
	$text = substr( $str, $delim_pos_start, $delim_pos_end );
	$return[] = $text;
	$str = str_replace($text,'',$str);
	echo $text;
	$i++;
	if ($i == 10000) break;
	}
	return $return;
}
function textBetween($subject="",$start="",$end="") // {{{ 
{ 
    /* 
        * function to find contents of a string between two arbitrary sub-strings 
        * 
        * it handles nested delimiters 
        * it will return up to the end of $subject if $start is found and $end is not found 
        * 
        * input: 
        * $subject is the string to search in 
        * $start is the sub-string to search for as the beginning of the required contents 
        * $end is the sub-string to search for as the end of the required contents 
        * 
        * output: 
        * array: 
        *   "start" => the starting position in the subject of the $start sub-string 
        *   "end" => the ending position in the subject of the $end sub-string 
        *   "text" => the contents of $subject between the 2 delimiters, or $subject if 
        *             $start delimiter is not found 
        *   "between" => the contents of $subject between the 2 delimiters, or an empty 
        *                string if $start is not found 
        *   "left" => the left part of $subject before $start was found 
        *   "right" => the right part of $subject after $end was found 
        *   "outside" => the concatenated contents of "left" and "right" 
     */ 
    $ret=array("start"=>false,"end"=>false,"text"=>$subject,"between"=>"","left"=>"","right"=>""); 
    if(is_string($ret["text"]) && is_string($start)){ 
        $subl=strlen($ret["text"]); 
        $startl=strlen($start); 
        if($subl && $startl){ 
            /* find the beginning delimiter */ 
            $ret["start"]=strpos($ret["text"],$start); 
            if($ret["start"]!==false){ 
                /* starting delimiter found */ 
                $offset=$ret["start"]+$startl; 
                $ret["text"]=substr($ret["text"],$offset); 
                if(is_string($end)){ 
                    $endl=strlen($end); 
                    if($endl){ 
                        $ret["end"]=strpos($ret["text"],$end); 
                        if($ret["end"]!==false){ 
                            $checknested=true; 
                            $tmppos=0; 
                            while($checknested){ 
                                /* check for nested delimiters 
                                    search between the start point 
                                    and the currently found end point */ 
                                $ttp=strpos(substr($ret["text"],$tmppos,$ret["end"]-$tmppos),$start); 
                                if($ttp!==false){ 
                                    $tmppos+=$ttp; 
                                    /* we have nested delimiters 
                                        move the end point onto the next 
                                        delimiter */ 
                                    $ret["end"]=strpos($ret["text"],$end,$ret["end"]+1); 
                                    if($ret["end"]!==false){ 
                                        $tmppos++; 
                                    }else{ 
                                        $checknested=false; 
                                    } 
                                }else{ 
                                    /* there are no nested delimiters */ 
                                    $checknested=false; 
                                    if($ret["end"]!==false){ 
                                        $ret["text"]=substr($ret["text"],0,$ret["end"]); 
                                    } 
                                } 
                            } 
                        } 
                    } 
                } 
            } 
        } 
    } 
    if($ret["text"]!=$subject){ 
        $ret["between"]=$ret["text"]; 
    } 
    if($ret["start"]!==false){ 
        if($ret["start"]>0){ 
            $ret["outside"]=substr($subject,0,$ret["start"]); 
            $ret["left"]=$ret["outside"]; 
        } 
        if($ret["end"]!==false && $ret["end"]>0){ 
            $ret["right"]=substr($subject,$ret["start"]+$ret["end"]+$startl+$endl); 
            $ret["outside"].=$ret["right"]; 
        } 
    }else{ 
        $ret["outside"]=$subject; 
    } 
    // $ret["cc"]=$cc; 
    return $ret; 
} // }}} 
$css = file_get_contents('/var/www/html/lpmu/wp-content/themes/noticias/shawn-style.css');
$open = substr_count($css, '{');
$closed = substr_count($css, '}');
$css = str_replace('{','openbrace',$css);
$css = str_replace('}','closebrace',$css);
echo substr_count($css, 'openbrace');
echo substr_count($css, 'closebrace');
$tags = TextBetween($css,'openbrace','closebrace');
foreach ($tags['text'] as $tag)
{
//	echo $tag . PHP_EOL;
	$css = str_replace($tag,'', $css);
}
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo '___________________________________________________________________' . PHP_EOL;
//echo $css.PHP_EOL;
var_dump($tags);
echo "$open opening braces in css file" . PHP_EOL;
echo "$closed closing braces in css file" . PHP_EOL;
?>
