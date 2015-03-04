#!/usr/bin/php
<?php
define('WP_USE_THEMES', true);
define('BUCKET', 'laprensa.com.ni');
$_SERVER[ 'HTTP_HOST' ] = 'noticias.laprensa.com.ni';
require_once( '/var/www/html/lpmu/wp-load.php' );
require_once('/var/www/html/lpmu/wp-config.php');
require_once('/var/www/html/lpmu/wp-includes/formatting.php');
require_once('/home/shawn/cleanfunctions.php');
require_once( '/var/www/html/lpmu/wp-admin/includes/image.php' );
switch_to_blog('2');
global $wpdb;
$pgsql_hostname = 'lp-rds.laprensa.com.ni';
$pgsql_username = 'shawn';
$pgsql_password ='fr1ck0ff';
$pgsql_db = 'laprensa';
$pgsql_port = '5432';
$author = '109';
$limit = '50';
/*** pgsql connector ***/
try {
    $db = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
$search = '%.laprensa.com.ni/infografia/%';
$info = array();
try 
{
        $dbp = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
//	$sql = "SELECT * FROM infografia where idinfografia NOT IN ($infografias_imported_var) and idedicion IN ($mon_sat_edicions_var) ORDER BY ABS(orden) ASC LIMIT $limit;";
	//$sql = "SELECT idnoticia, texto FROM noticia WHERE texto LIKE '%http://www.laprensa.com.ni/infografia/%' ORDER BY idnoticia ASC LIMIT $limit;";
	//$sql = "SELECT idnoticia, texto FROM noticia WHERE texto LIKE '%http://www.laprensa.com.ni/infografia/%' ORDER BY idnoticia ASC;";
	$sql = "SELECT idnoticia, texto FROM noticia WHERE texto LIKE " . "'" . $search . "'" ." ORDER BY idnoticia ASC;";

	foreach ($dbp->query($sql) as $row)
	{
		$idnoticia = $row['idnoticia'];
		$texto = $row['texto'];
		$has_infografia = substr_count($cat_post_text,$search );
		if ($has_infografia > 1)
		{
		$info[]=$idnoticia;
		}
		else
		{
//		echo 'Only 1!' . PHP_EOL;
		}
usleep(25000);
	}
	$dbp = null;
}
catch(PDOException $e)
{
}
echo PHP_EOL;
print_r($info);
echo PHP_EOL;
//echo '<meta http-equiv="refresh" content="20;http://hoy.doap.com/hoy-infografias.php" />';
//<meta http-equiv="refresh" content="30=http://hoy.doap.com/hoy-import.php">
?>
