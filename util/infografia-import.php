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
$limit = '5000';
date_default_timezone_set('America/Managua');
$b = time();
$month = date("m", $b);
$monthspelled = date("M", $b);
$day = date("D", $b);
$numday = date("d", $b);
$year = date("Y", $b);

EOT;
$metastyle =  <<<'EOT'
#post-meta { display:none;visibility:hidden; }
EOT;

$infografias_imported = array();
$infografias_imported_var = '';
/*** pgsql connector ***/
try {
    $db = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
$infografias_without_image = "1222,1761,1762,1763,1841,1924,2046,2125,2200,2205,2242,2320,2423,2446,2474,2580,2646,2743,2853,3360,3412";
$infografias_imported= $wpdb->get_col( "SELECT post_name FROM $wpdb->posts where post_type = 'infografia' and post_status = 'publish' ORDER BY ABS(post_name) ASC;" );

//$metavals3= implode( ",", $articles_imported);
$infografias_imported_var = implode( ",", $infografias_imported);
$last_imported = $infografias_imported['0'];
if ( $infografias_imported_var == null)  $infografias_imported_var = 99999; 
$infografias_imported_var = $infografias_imported_var . ',' . $infografias_without_image;
//echo "infografias_imported_var $infografias_imported_var";
echo "last_imported = $last_imported";
//echo var_dump($infografias_imported);

try 
{
        $dbp = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
//	$sql = "SELECT * FROM infografia where idinfografia NOT IN ($infografias_imported_var) and idedicion IN ($mon_sat_edicions_var) ORDER BY ABS(orden) ASC LIMIT $limit;";
	$sql = "SELECT idinfografia,infografia,imagen,creacion FROM infografia WHERE idinfografia NOT IN ($infografias_imported_var) ORDER BY ABS(idinfografia) ASC LIMIT $limit;";

	foreach ($dbp->query($sql) as $row)
	{
		$idinfografia= $row['idinfografia'];

		date_default_timezone_set('America/Managua');
                $string = $row['creacion'];
                $pos = strrpos( $string, '.');
                if ($pos !== false)
		{
                    $creacion = substr($string, 0, $pos );
                }
                else
		{
                    $creacion = $string;
                }
                $articledate = $creacion;
		$articledate = strtotime($articledate);
		$articlemonth = date("m", $articledate);
		$articleyear = date("Y", $articledate);
		$articleday = date("d", $articledate);
		
		$infografianame = $row['imagen'];
		$infografiatitle = $row['infografia'];

                $post = array(
                  'post_author'    => $author,    //The user ID number of the author.
                  'post_date'      => $creacion, //The time post was made.
                  'post_date_gmt'  => $creacion, //The time post was made, in GMT.
                  'post_name'      => $idinfografia, // The name (slug) for your post
                  'post_status'    => 'publish',    //Set the status of the new post.
                  'post_title'     => $infografiatitle , //The title of your post.
                  'post_type'      => 'infografia' //You may want to insert a regular post, page, link, a menu item or some custom post type
                );

	echo "date = $articledate . \n";
	echo "creacion = $creacion . \n";
	echo "month = $articlemonth . \n";
	echo "year $articleyear . \n";
	echo "permalink $permalink . \n";
	echo "idinfografia $idinfografia. \n";
	echo "infografianame $infografianame. \n";
	echo "infografiatitle $infografiatitle. \n";


                $article_exists = $wpdb->get_var( "SELECT post_name FROM $wpdb->posts where post_type = 'infografia' and post_status = 'publish' and post_name = $idinfografia limit 1;" );
	echo PHP_EOL . "article_exists $article_exists . \n";

                if( $article_exists == null )
		{
	                $post_id = wp_insert_post($post);

	//for troubleshooting
	echo "\n post_id = $post_id \n";
	echo "date = $articledate . \n";
	echo "creacion = $creacion . \n";
	echo "month = $articlemonth . \n";
	echo "year $articleyear . \n";
	//break;

			$cat_post_pic = '/var/www/html/laprensa/files/infografia/' . $infografianame;


			$attach_id = uploadNewImage($cat_post_pic, $infografianame, $infografiatitle);
                        if ( $attach_id )
			{
				$migrated_infografia = add_post_meta( $attach_id, 'idinfografia', $idinfografia, true );
				set_post_thumbnail( $post_id, $attach_id );
				s3CopyImage($attach_id);
			}
			else
			{
				echo 'attachment could not be uploaded' . PHP_EOL . PHP_EOL;
				wp_delete_post($post_id, 1);
			}	
			$i++;

//			if ($i == 200) break;

		}
	}
	$dbp = null;
}
catch(PDOException $e)
{
}
echo "$i Posts Processed";
//echo '<meta http-equiv="refresh" content="20;http://hoy.doap.com/hoy-infografias.php" />';
//<meta http-equiv="refresh" content="30=http://hoy.doap.com/hoy-import.php">
?>
