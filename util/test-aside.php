#!/usr/bin/php
<?php
define('WP_USE_THEMES', true);
/** Loads the WordPress Environment and Template */
//require_once( '/var/www/html/lpmu/wp-blog-header.php' );
$_SERVER[ 'HTTP_HOST' ] = 'noticias.laprensa.com.ni';
require_once( '/var/www/html/lpmu/wp-load.php' );
require_once('/var/www/html/lpmu/wp-config.php');
require_once('/var/www/html/lpmu/wp-includes/formatting.php');
//$wp->init(); $wp->parse_request(); $wp->query_posts();
//$wp->register_globals(); $wp->send_headers();
require_once( '/var/www/html/lpmu/wp-admin/includes/image.php' );
switch_to_blog('2');
global $wpdb;
function substring_index($subject, $delim, $count){
    if($count < 0){
        return implode($delim, array_slice(explode($delim, $subject), $count));
    }else{
        return implode($delim, array_slice(explode($delim, $subject), 0, $count));
    }
}

function stripAccents($stripAccents){
  return strtr($stripAccents,'àáâãäçéèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÍÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ','aaaaaceeeeeiiiinooooouuuuyyAAAAACEEEEIIIIINOOOOOUUUUY');
}
//date stuff
date_default_timezone_set('America/Managua');
$b = time();
$month = date("m", $b);
$monthspelled = date("M", $b);
$day = date("D", $b);
$numday = date("d", $b);
$year = date("Y", $b);
$lastBuildDate = $day . ', ' . $numday . ' ' . $monthspelled . ' ' . $year . ' 00:00:00 +0600';
//$idedicion = '2013-07-28';
$lastBuildDate = 'Wed, 02 Oct 2002 15:00:00 +0200';
//if (!isset($_GET['seccion'])) { $seccion = '*'; } else { $seccion = $_GET['seccion']; }
if (isset($_GET['seccion']) && ($_GET['seccion'] || '')) { $seccion = $_GET['seccion']; }
if (isset($_GET['edicion'])) { $idedicion = $_GET['edicion']; } else { $idedicion = date("Y-m-d"); }
//connect info for pgsql.
$pgsql_hostname = 'lp-rds.laprensa.com.ni';
//$pgsql_hostname = 'pgsql.doap.com';
$pgsql_username = 'shawn';
$pgsql_password ='fr1ck0ff';
$pgsql_db = 'laprensa';
$pgsql_port = '5432';
$limit = '100';
$pic_search_string = '"</p></div></div>'; 
/*** pgsql connector ***/
try {
    $db = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
$asides_imported= $wpdb->get_col( "SELECT distinct meta_value FROM $wpdb->postmeta where meta_key = 'idacl' ORDER BY ABS(meta_value) DESC;" );
$metavals4= implode( ",", $asides_imported);
//$last_imported = $asides_imported['0'];
$last_imported = 51112; 
$idnoticia = 188227;
//$last_imported = 51045; 
//$last_imported = 10351;
echo "\n Comenzando Importacion " . PHP_EOL;
echo "\n articulos importado ya = $metavals4 " . PHP_EOL;
echo "\n ultimo articulo importado = $last_imported " . PHP_EOL;

try
{
    	$dbp = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
	if ($metavals4)
		{ 
		$sql = "select texto from noticia WHERE idnoticia = $idnoticia limit 1;";	
		}
	else
		{
		$sql = "select distinct acl.idnoticia from acl WHERE acl.idacl > $last_imported and acl.idnoticia IN (SELECT idnoticia from noticia) ORDER BY acl.idnoticia ASC limit $limit";	
		}

foreach ($dbp->query($sql) as $result);
$articletext = $result['texto'];
//$acl_idnoticia_results = $result->fetchAll(PDO::FETCH_COLUMN, 0);
//$idnoticias_with_aside = implode( ",", $acl_idnoticia_results);
$idnoticias_with_aside = 51275;
echo "\n idnoticias_with_aside = $idnoticias_with_aside \n\n\n\n" . PHP_EOL;
$wp_potential_posts = $wpdb->get_col( "SELECT distinct post_id FROM $wpdb->postmeta where meta_key = 'idnoticia' and meta_value IN ($idnoticias_with_aside) ORDER BY ABS(post_id) ASC limit $limit;" );
//$wp_pot_posts_ids = implode( ",", $wp_potential_posts);
$wp_pot_posts_ids = 22968; 
echo "\n wp_pot_posts_ids = $wp_pot_posts_ids\n\n\n\n" . PHP_EOL;
$wp_posts_to_modify = $wpdb->get_col( "SELECT ID FROM $wpdb->posts where ID IN ($wp_pot_posts_ids) and post_type = 'post' and post_status = 'publish' ORDER BY ABS(ID) ASC limit $limit;" );
print_r($wp_posts_to_modify);
echo "\n post_id[0] = $wp_posts_to_modify[0]\n\n\n\n" . PHP_EOL;
$i=0;
foreach ($wp_posts_to_modify as $row)
	{
	date_default_timezone_set('America/Managua');
	$str1 = "";
	$paragraph = array();
	$oPos = array();
	$post_id = $row;
	//$idnoticia = $wpdb->get_var( "SELECT meta_value FROM $wpdb->postmeta where meta_key = 'idnoticia' and post_id = $post_id ORDER BY ABS(post_id) ASC limit 1;" );
	//$articletext =  $wpdb->get_var( "SELECT post_content FROM $wpdb->posts where ID = $post_id;" );
	//$articledate = $wpdb->get_var( "SELECT post_date FROM $wpdb->posts where ID = $post_id;" );
	//$articletitle =  $wpdb->get_var( "SELECT post_title FROM $wpdb->posts where ID = $post_id;" );
	//$articlelink =  $wpdb->get_var( "SELECT guid FROM $wpdb->posts where ID = $post_id;" );
//echo "<hr>";
//echo '<div>';
echo "\n post_id= $post_id<br>\n\n\n\n" . PHP_EOL;
echo "\n idnoticia = $idnoticia <br>\n\n\n\n" . PHP_EOL;
echo "\n articledate = $articledate<br>\n\n\n\n" . PHP_EOL;
echo "\n post_title = $articletitle<br>\n\n\n\n" . PHP_EOL;
echo  PHP_EOL. $articlelink . "          " . $articletitle . PHP_EOL;

try     {
        $acl = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );

	$sqlacl = "SELECT idacl, acl, intro, texto FROM acl WHERE idnoticia = $idnoticia limit $limit";



	$strAcl = '<div class="aside-div">';
        foreach ($acl->query($sqlacl) as $bar)
                {
		$x = $bar['idacl'];
		echo "\n\n\n\n idacl = $x \n\n\n\n";
		//$check_acl = $wpdb->get_var( "SELECT meta_id FROM $wpdb->postmeta where meta_key = 'idacl' and meta_value = $x limit 1;" );
		//$strAcl .= '<li>';
          	if(!empty($bar['acl']))
			{
			 $strAcl .= '[doap_box title="' . $bar['acl'] . '" box_color="#336699" class="aside-box"]';
			}
		else
			{
			$strAcl .= '[doap_box title="" box_color="#336699" class="aside-box"]';
			}
          	if(!empty($bar['intro'])) {
            		$bar['intro'] = explode("\n",$bar['intro']);
            		$strAcl .= '<ul class="aside-intro">';
            		foreach($bar['intro'] as $line)
              		$strAcl .= '<li>' . $line . '</li>';
            		$strAcl .= '</ul>';
          		}
          	if(!empty($bar['texto'])) $strAcl .= '<div class="aside-text">' . nl2br($bar['texto']) . '</div>';
          	$strAcl .= '[/doap_box]';
		$acl_results = add_post_meta( $post_id, 'idacl', $bar['idacl'], false);
	echo "\nacl_results = $acl_results \n" . PHP_EOL;
        	}
        $strAcl .= '</div>';
        $str = $articletext;

$line_breaks = array('</p>','<br>','<br />','</h1>','</h2>','</h3>','</h4>','</h5>','</div>');
foreach ($line_breaks as $line_break)
{
	$x = substr_count($str,$line_break);
	echo PHP_EOL . $line_break . ' = ' . $x;
	$break_count = $break_count + $x; 
}
$php_eol = substr_count($str,PHP_EOL);
//echo PHP_EOL . 'PHP_EOL' . ' = ' . $php_eol;
//echo PHP_EOL . $break_count . ' = ' . 'total line breaks';
if ($php_eol > $break_count)
{
$break_count = $php_eol - $break_count + $break_count;
}
//echo PHP_EOL . $break_count . ' = ' . 'total line breaks after removing php_eol';
$alength = strlen($str);
$sblength = strlen($strAcl );
//echo "\n\n\narticle length = $alength\n\n";
//echo "\n\n\nsidebar length = $sblength\n\n";
	echo PHP_EOL . 'sidebar goes inside story' . PHP_EOL;
	foreach ($line_breaks as $line_break)
	{
		$lb_count = substr_count($str,$line_break);
		$prev_pos = 0;
		$ii = 0;
		while ($ii < $lb_count)
		{
			$new_pos = stripos($str,$line_break,$prev_pos);
			$prev_pos = $new_pos + strlen($line_break); 
			$pos[$line_break][] = $new_pos; 
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
	echo PHP_EOL . 'sidebar goes on top' . PHP_EOL;
	$entry_point = $pos['</p>'][4];
}
//echo PHP_EOL . $entry_point . PHP_EOL;
$first_half = substr($str,0,$entry_point);
$second_half = substr($str,$entry_point,$alength);
	echo PHP_EOL . 'first'. $first_half . PHP_EOL;
	echo PHP_EOL . 'second'. $second_half . PHP_EOL;
	echo PHP_EOL . 'aside'. $strAcl. PHP_EOL;
$articletext = $first_half . PHP_EOL . $strAcl . PHP_EOL . $second_half ;

	$acl = null;

	$update_post = array(
	  'ID'             => $post_id, 
	  'post_content'   => $articletext //The full text of the post.
	);  
//	$update_post_results = wp_update_post($update_post);
	echo "\n<br>update_post_results = $update_post_results \n<br>" . PHP_EOL;

	}
	catch(PDOException $e)
	{
	}


$i++;
	}
	$dbp = null;
}
	catch(PDOException $e)
	{
    	}

echo "\n Importacion Completa! \n\n";
//echo '<meta http-equiv="refresh" content="60;http://hoy.doap.com/hoy-import.php" />';
//<meta http-equiv="refresh" content="30=http://hoy.doap.com/hoy-import.php">
?>
