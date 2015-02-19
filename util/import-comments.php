#!/usr/bin/php
<?php
define('WP_USE_THEMES', true);
define('BUCKET', 'laprensa.com.ni');
define('UTILPATH', dirname(__FILE__) . '/');
define('WP_PATH', dirname(__FILE__) . '/../');
$_SERVER[ 'HTTP_HOST' ] = 'noticias.laprensa.com.ni';
require_once(WP_PATH . 'wp-load.php');
require_once(WP_PATH . 'wp-config.php');
require_once(WP_PATH . 'wp-includes/formatting.php');
require_once(UTILPATH . 'cleanfunctions.php');
require_once(WP_PATH . 'wp-admin/includes/image.php');
switch_to_blog('2');
global $wpdb;
$pgsql_hostname = 'lp-rds.laprensa.com.ni';
$pgsql_username = 'shawn';
$pgsql_password ='fr1ck0ff';
$pgsql_db = 'laprensa';
$pgsql_port = '5432';
$author = '109';
$limit = '100000';
//$limit = '400';
date_default_timezone_set('America/Managua');
/*** pgsql connector ***/
try {
    $db = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
$comments_imported2 = $wpdb->get_col( "SELECT distinct meta_value FROM $wpdb->commentmeta where meta_key = 'idcomentario' ORDER BY ABS(meta_value) DESC;" );
$comments_imported = implode( ",", $comments_imported2);
$idnoticias_imported2 = $wpdb->get_col( "SELECT post_id FROM $wpdb->postmeta WHERE post_id = meta_value AND meta_key = 'idnoticia' ORDER BY post_id DESC;" );
$idnoticias_imported = implode( ",", $idnoticias_imported2);
echo "\n Comenzando Importacion <br>\n\n" . PHP_EOL;
echo date("Y-m-d H:i:s");
$start_time = date("Y-m-d H:i:s");
//echo PHP_EOL . PHP_EOL . "COMMENTS IMPORTED" . PHP_EOL . PHP_EOL . $comments_imported . PHP_EOL;
//echo PHP_EOL . PHP_EOL . "IDNOTICIAS IMPORTED" . PHP_EOL . PHP_EOL . $idnoticias_imported . PHP_EOL;

try
{
	$dbp = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
	if ($comments_imported)
		{ 
		$sql = "SELECT idcomentario, idnoticia, nombre, email, comentario, ip, creacion FROM comentario WHERE idnoticia IN ($idnoticias_imported) AND estado = 'A' AND idcomentario NOT IN ($comments_imported) ORDER BY idnoticia DESC LIMIT $limit;";
		}
	else
		{
		$sql = "SELECT idcomentario, idnoticia, nombre, email, comentario, ip, creacion FROM comentario WHERE idnoticia IN ($idnoticias_imported) AND estado = 'A' ORDER BY idnoticia DESC LIMIT $limit;";
		}
//echo $sql;
    	foreach ($dbp->query($sql) as $row)
        {
		$idcomentario = $row['idcomentario'];
		$idnoticia = $row['idnoticia'];
		$nombre = $row['nombre'];
		$email = $row['email'];
		$comentario = $row['comentario'];
		$ip = $row['ip'];
		$string = $row['creacion'];
		$crdate = $string;
		$pos1 = strrpos( $string, '.');
		if ($pos1 !== false) {
		    $creacion = substr($string, 0, $pos1 );
		}
		else  {
			$creacion = $string;
		}
		$gmt_mod = strtotime($creacion.' UTC');
		$gmt_adjusted = date("Y-m-d H:i",$gmt_mod);

		$data = array(
		    'comment_post_ID' => $idnoticia,
		    'comment_author' => $nombre,
		    'comment_author_email' => $email,
		    'comment_author_url' => '',
		    'comment_content' => $comentario,
		    'comment_type' => '',
		    'comment_parent' => 0,
		    'user_id' => '',
		    'comment_author_IP' => $ip,
		    'comment_agent' => '',
		    'comment_date' => $gmt_adjusted,
		    'comment_approved' => 1,
		);

		$new_comment_id = wp_insert_comment( $data );
		add_comment_meta( $new_comment_id, 'idcomentario', $idcomentario, true );
	//	echo PHP_EOL . "http://noticias.laprensa.com.ni/?p=" . $idnoticia . PHP_EOL;
	//	echo PHP_EOL . "new_comment_id = $new_comment_id ... idcomentario = $idcomentatio ... $comentario" . PHP_EOL;
		$i++;

	}
$dbp = null;
}
catch(PDOException $e)
{
echo 'Shucks!';
}

echo "\n Importacion Completa! \n\n";
echo PHP_EOL . $i . ' Comments Processed ' . PHP_EOL;
echo PHP_EOL . "start time : $start_time";
echo PHP_EOL . "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
//get_footer();
//echo '<meta http-equiv="refresh" content="60;http://hoy.doap.com/hoy-import.php" />';
//<meta http-equiv="refresh" content="30=http://hoy.doap.com/hoy-import.php">
?>
