<?php
date_default_timezone_set('America/Managua');
//$b = time();
$today = date("Y-m-d H:i"); 
echo PHP_EOL . 'today = ' . $today ;
$gmt_mod = strtotime($today.' UTC');
$gmt_adjusted = date("Y-m-d H:i",$gmt_mod); 
//$gmt_adjusted = date($today, strtotime("-8 hours"));
echo PHP_EOL . 'gmt_adjusted = ' . $gmt_adjusted ;

$c = date("Y-m-d",strtotime("+1 day"));
$tomorrow = date("Y-m-d", strtotime("+ 1 day"));
$yesterday= date("Y-m-d", strtotime("- 1 day"));
$last_month = date("Y-m-d", strtotime("- 1 month"));
$test_date = '2014-09-26 13:05:00';
$monthnum = date("m",strtotime($test_date));
if (date("Y-m-d",strtotime($test_date)) == date("Y-m-d"))
{
	echo PHP_EOL . 'Test date is today' . PHP_EOL;
	$post_hour = date("h:i A",strtotime($test_date));
	if ($post_hour > '01:00')
	{
		echo PHP_EOL . 'ULTIMO MINUTO ' . $post_hour . PHP_EOL;
	}
}
//$c = strtotime($b);
//$month = date("m", $c);
//$/numday = date("d", $c);
//$year = date("Y", $c);
//$edicion = $year . '-' . $month . '-' . $numday;
//echo PHP_EOL . 'edicion = ' . $edicion;
//echo PHP_EOL . 'month = ' . $month ;
///echo PHP_EOL . 'numday= ' . $numday;
//echo PHP_EOL . 'year = ' . $year ;
echo PHP_EOL . 'c = ' . $c;
echo PHP_EOL . 'tomorrow = ' . $tomorrow;
echo PHP_EOL . 'yesterday= ' . $yesterday;
echo PHP_EOL . 'last month = ' . $last_month;
if ($yesterday < $tomorrow) echo PHP_EOL . 'yesterday is less than tomorrow';
$today = date("Y-m-d");
$gmt_today = gmdate("Y-m-d H:i", strtotime($today));
echo PHP_EOL . 'today 2  = ' . $today;
echo PHP_EOL . 'gmt_today = ' . $gmt_today;
function get_doap_excerpt($limit, $dots=NULL, $chars=NULL) {
        remove_filter( 'get_the_excerpt', 'responsive_custom_excerpt_more' );
        $theexcerpt = get_the_excerpt();
        add_filter( 'get_the_excerpt', 'responsive_custom_excerpt_more' );
	if (strlen($chars && $theexcerpt < $limit))
	{
		return $theexcerpt;
	}
	else
        $words = str_word_count($theexcerpt, 2);
	if ($dots)
	{
	$dots = '...';
	}
        if ($words > $limit)
        {
                $theexcerpt = implode(' ', array_slice(explode(' ', $theexcerpt), 0, $limit)) . $dots;
        }
	return $theexcerpt;
}
$xyz= str_word_count('hello this is a test for a certain number of characters...',2);
//var_dump($xyz)
//$x = time();
$x = date();
//$oldLocale = setlocale(LC_TIME, 'es_ES');
$oldLocale = setlocale(LC_ALL, 'es_ES.UTF-8');
echo $oldLocale;
echo PHP_EOL.ucwords(strftime("%A %d %B %Y", $x)).PHP_EOL;
setlocale(LC_TIME, $oldLocale);
echo "monthnum = $monthnum" . PHP_EOL;
?>

