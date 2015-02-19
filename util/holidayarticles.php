<?php
//date stuff
//date_default_timezone_set('America/Managua');
date_default_timezone_set('UTC');
$b = time();
$month = date("m", $b);
$monthspelled = date("M", $b);
$day = date("D", $b);
$numday = date("d", $b);
$hour = date("H", $b);
$year = date("Y", $b);
//connect info for pgsql.
$pgsql_hostname = 'pgsql.doap.internal';
//$pgsql_hostname = 'lp-rds.laprensa.com.ni';
//$pgsql_hostname = 'pgsql.doap.com';
$pgsql_username = 'shawn';
$pgsql_password ='fr1ck0ff';
$pgsql_db = 'laprensa';
$pgsql_port = '5432';
$limit = '5';
$sections = array(27,29,30,31,32,34,35,52,53);
//$sections = array(9,27,29,30,31,32,34,35,43,52,53);
//$sections = array(31,27,29);
//$sections = array(30);
$edicion = $year . "-" . $month . "-" . $numday;
/*** pgsql connector ***/
try {
    $db = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

echo "\nedicion = $edicion\n";

try  {
    $db_edition = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
    $sql_edition = "SELECT idedicion,estado FROM edicion WHERE edicion = '$edicion';";
    foreach ($db_edition->query($sql_edition) as $edition_row);
       {
        $idedicion=$edition_row['idedicion'];
	$edicion_estado=$edition_row['estado'];
	echo "\nidedicion = $idedicion\n";
	echo "\nestado = $idedicion\n";
	echo "\nhour= $hour\n";
	
       }
   $db_edition = null;
     }
 catch(PDOException $e)
 {
 }

if (!isset($idedicion))
	{
	exit;
	}
foreach ($sections as $current_section)
{
echo "section = $current_section\n\n";
try     {
        $last5 = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );

	$sqllast5 = "SELECT idnoticia,idseccion,noticia,resumen,texto,ultimahora,claves,LOCALTIMESTAMP,idregion,idedicion,estado,idusuario,antetitulo,subtitulo,hora,ubicacion,orden,raiting_1,raiting_2,raiting_3,raiting_4,raiting_5,tipo,intro,destacado,presentar FROM noticia WHERE idseccion = $current_section ORDER BY idnoticia DESC LIMIT $limit";
echo "Before executing 5 note query\n\n";
$i=0;
$j=0;
$new_posts = array();
$old_posts = array();
//$old_posts = $last5->query($sqllast5);
foreach ($last5->query($sqllast5) as $current_note)
        {
//	$creacion = $current_note['LOCALTIMESTAMP'];
        $orig_idnoticia = $current_note['idnoticia'];
	$old_posts[$i] = $orig_idnoticia;

echo "idnoticia = $orig_idnoticia\n\n";
echo "noticia = $noticia\n\n";
	try     {
        	$new_post = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
        	$sql_new_post = "INSERT INTO noticia (idseccion,noticia,resumen,texto,ultimahora,claves,creacion,idregion,idedicion,estado,idusuario,antetitulo,subtitulo,hora,ubicacion,orden,raiting_1,raiting_2,raiting_3,raiting_4,raiting_5,tipo,intro,destacado,presentar) SELECT idseccion,noticia,resumen,texto,'FALSE',claves,LOCALTIMESTAMP,idregion,'$idedicion',estado,idusuario,antetitulo,subtitulo,hora,ubicacion,orden,raiting_1,raiting_2,raiting_3,raiting_4,raiting_5,tipo,intro,destacado,presentar from noticia where idseccion = $current_section and idnoticia = $orig_idnoticia LIMIT 1 RETURNING idnoticia;";
//        	$sql_new_post = "INSERT INTO noticia (idseccion,noticia,resumen,texto,ultimahora,claves,creacion,idregion,idedicion,estado,idusuario,antetitulo,subtitulo,hora,ubicacion,orden,raiting_1,raiting_2,raiting_3,raiting_4,raiting_5,tipo,intro,destacado,presentar) SELECT idseccion,noticia,resumen,texto,ultimahora,claves,LOCALTIMESTAMP,idregion,'$idedicion',estado,idusuario,antetitulo,subtitulo,hora,ubicacion,orden,raiting_1,raiting_2,raiting_3,raiting_4,raiting_5,tipo,intro,destacado,presentar from noticia where idseccion = $current_section and idnoticia = $orig_idnoticia LIMIT 1 RETURNING idnoticia;";

//echo "sql_new_post = \n\n$sql_new_post\n\n";
	foreach ($new_post->query($sql_new_post) as $new_note);
		{
		$new_posts[$j]=$new_note['idnoticia'];		
		$idnoticia=$new_note['idnoticia'];		

//			echo "new_note = $new_note";
			echo "new idnoticia = $idnoticia";
			echo "find sidebars for orig_idnoticia and copy them to acl table";

$old_acls = array();
$idacl=0;
$k=0;
$new_acls = array();
$new_idacl=0;
$l=0;
        		try     {
        		        $acl = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
        		        $sql_acl = "SELECT idacl FROM acl WHERE idnoticia = $orig_idnoticia ORDER BY idacl ASC;";

			        foreach ($acl->query($sql_acl) as $old_acl);
			                {
			                $old_acls[$k]=$old_acl['idacl'];
			                $idacl=$old_acl['idacl'];
				        echo "old idacl = $idacl";
					$k++;
					$new_acls = array();
					$new_idacl=0;
					$l=0;
			if ($idacl > 0)
			{
					try     {
                                		$db_acl = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
                                		$sql_new_acl = "INSERT INTO acl (acl,intro,texto,idnoticia) SELECT acl,intro,texto,'$idnoticia' AS idnoticia FROM acl WHERE idacl =  $idacl AND idnoticia = $orig_idnoticia RETURNING idacl;";
                                		foreach ($db_acl->query($sql_new_acl) as $new_acl);
                                		        {
			                		$new_acls[$l]=$new_acl['idacl'];
			                		$new_idacl=$new_acl['idacl'];
				        		echo "new idacl = $new_idacl";
							$l++;
							}
				                $db_acl = null;
						}
				        catch(PDOException $e)
				        {
        				}	
			}
					echo "\nnew_acls\n";
					print_r($new_acls);
			                }
				echo "\n\n";
		                $acl = null;
		                }
				catch(PDOException $e)
        			{
        			}

				echo "\nold_acls\n";
				print_r($old_acls);
			$j++;
		}
print_r($new_posts);
echo "\n\n";
		$new_post = null;
		}
	catch(PDOException $e)
	{
	}
	$i++;
	}
	$last5 = null;
	}
	catch(PDOException $e)
	{
	}
}
echo "\nold_posts\n";
print_r($old_posts);
echo "\nnew_posts\n";
print_r($new_posts);

if ($edicion_estado != "A" )
        {
	try  {
		$db_edi_estado = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
    		$sql_edi_estado = "UPDATE edicion SET estado = 'R' WHERE idedicion = $idedicion;";
    		foreach ($db_edi_estado->query($sql_edi_estado) as $edi_estado_row);
       			{
        		echo "\nedicion ready for publication\n";
	       		}
   		$db_edi_estado = null;
     	}
 catch(PDOException $e)
 {
 }
}
//echo '<meta http-equiv="refresh" content="60;http://hoy.doap.com/hoy-import.php" />';
//<meta http-equiv="refresh" content="30=http://hoy.doap.com/hoy-import.php">
?>
