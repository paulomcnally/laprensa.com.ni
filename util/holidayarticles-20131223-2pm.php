<?php
//date stuff
date_default_timezone_set('America/Managua');
$month = date("m", $b);
$monthspelled = date("M", $b);
$day = date("D", $b);
$numday = date("d", $b);
$year = date("Y", $b);
//connect info for pgsql.
$pgsql_hostname = 'pgsql.doap.internal';
//$pgsql_hostname = 'pgsql.doap.com';
$pgsql_username = 'shawn';
$pgsql_password ='fr1ck0ff';
$pgsql_db = 'laprensa-828';
$pgsql_port = '5432';
$limit = '5';
$pic_search_string = '"</p></div></div>'; 
//$sections = array(31,27,29,30,9,35,32,34);
$sections = array(31);
foreach ($sections as $current_section)
{
echo "section = $current_section\n\n";
/*** pgsql connector ***/
try {
    $db = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

try     {
        $last5 = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );

	$sqllast5 = "SELECT idnoticia,idseccion,noticia,resumen,texto,ultimahora,claves,LOCALTIMESTAMP,idregion,idedicion,estado,idusuario,antetitulo,subtitulo,hora,ubicacion,orden,raiting_1,raiting_2,raiting_3,raiting_4,raiting_5,tipo,intro,destacado,presentar FROM noticia WHERE idseccion = $current_section ORDER BY idnoticia DESC LIMIT $limit";
echo "Before executing 5 note query\n\n";
$i=0;
$j=0;
$old_posts = $last5->query($sqllast5);
//foreach ($last5->query($sqllast5) as $current_note)
//        {
	$orig_idnoticia = $current_note['idnoticia'];
$old_posts[$i] = $orig_idnoticia;
	$idseccion = $current_note['idseccion'];
	$noticia = $current_note['noticia'];
	$resumen = $current_note['resumen'];
	$texto = $current_note['texto'];
	$ultimahora = $current_note['ultimahora'];
	$claves = $current_note['claves'];
	$creacion = $current_note['LOCALTIMESTAMP'];
	$idregion = $current_note['idregion'];
	$idedicion = $current_note['idedicion'];
	$idedicion = $idedicion + 1;
	$estado = $current_note['estado'];
	$idusuario = $current_note['idusuario'];
	$antetitulo = $current_note['antetitulo'];
	$subtitulo = $current_note['subtitulo'];
	$hora = $current_note['hora'];
	$ubicacion = $current_note['ubicacion'];
	$orden = $current_note['orden'];
	$raiting_1 = $current_note['raiting_1'];
	$raiting_2 = $current_note['raiting_2'];
	$raiting_3 = $current_note['raiting_3'];
	$raiting_4 = $current_note['raiting_4'];
	$raiting_5 = $current_note['raiting_5'];
	$tipo = $current_note['tipo'];
	$intro = $current_note['intro'];
	$destacado = $current_note['destacado'];
	$presentar = $current_note['presentar'];
echo "idnoticia = $orig_idnoticia\n\n";
echo "noticia = $noticia\n\n";
	try     {
        	$new_post = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
        	//$sql_new_post = "INSERT INTO noticia (idnoticia,idseccion,noticia,resumen,texto,ultimahora,claves,creacion,idregion,idedicion,estado,idusuario,antetitulo,subtitulo,hora,ubicacion,orden,raiting_1,raiting_2,raiting_3,raiting_4,raiting_5,tipo,intro,destacado,presentar) VALUES (DEFAULT,$idseccion,$noticia,$resumen,$texto,$ultimahora,$claves,$creacion,$idregion,$idedicion,$estado,$idusuario,$antetitulo,$subtitulo,$hora,$ubicacion,$orden,$raiting_1,$raiting_2,$raiting_3,$raiting_4,$raiting_5,$tipo,$intro,$destacado,$presentar) RETURNING idnoticia;";
        	//$sql_new_post = "INSERT INTO noticia (idseccion,noticia,resumen,texto,ultimahora,claves,creacion,idregion,idedicion,estado,idusuario,antetitulo,subtitulo,hora,ubicacion,orden,raiting_1,raiting_2,raiting_3,raiting_4,raiting_5,tipo,intro,destacado,presentar) VALUES ($idseccion,$noticia,$resumen,$texto,$ultimahora,$claves,$creacion,$idregion,$idedicion,$estado,$idusuario,$antetitulo,$subtitulo,$hora,$ubicacion,$orden,$raiting_1,$raiting_2,$raiting_3,$raiting_4,$raiting_5,$tipo,$intro,$destacado,$presentar) RETURNING idnoticia;";
        	$sql_new_post = "INSERT INTO noticia (idseccion,noticia,resumen,texto,ultimahora,claves,creacion,idregion,idedicion,estado,idusuario,antetitulo,subtitulo,hora,ubicacion,orden,raiting_1,raiting_2,raiting_3,raiting_4,raiting_5,tipo,intro,destacado,presentar) SELECT idseccion,noticia,resumen,texto,ultimahora,claves,LOCALTIMESTAMP,idregion,idedicion,estado,idusuario,antetitulo,subtitulo,hora,ubicacion,orden,raiting_1,raiting_2,raiting_3,raiting_4,raiting_5,tipo,intro,destacado,presentar from noticia where idseccion = $current_section ORDER BY idnoticia DESC LIMIT $limit RETURNING idnoticia;";

//echo "sql_new_post = \n\n$sql_new_post\n\n";
	$j=0;
	foreach ($new_post->query($sql_new_post) as $new_note);
		{
		$new_posts[$j]=$new_note['idnoticia'];		
		$idnoticia=$new_note['idnoticia'];		
			echo "new_note = $new_note";
			echo "new idnoticia = $idnoticia";
			echo "find sidebars for orig_idnoticia and copy them to acl table";
		}
print_r($new_posts);
// $sqlQuery = "INSERT INTO noticia(idnoticia,idseccion,noticia,resumen,texto,ultimahora,claves,creacion,idregion,idedicion,estado,idusuario,antetitulo,subtitulo,hora,ubicacion,orden,raiting_1,raiting_2,raiting_3,raiting_4,raiting_5,tipo,intro,destacado,presentar) VALUES(default,:idseccion,:noticia,:resumen,:texto,:ultimahora,:claves,:creacion,:idregion,:idedicion,:estado,:idusuario,:antetitulo,:subtitulo,:hora,:ubicacion,:orden,:raiting_1,:raiting_2,:raiting_3,:raiting_4,:raiting_5,:tipo,:intro,:destacado,:presentar) RETURNING idnoticia"; 

//        $statement = $new_post->prepare($sqlQuery); 

//$statement->bindValue(":idseccion", $idseccion);
//$statement->bindValue(":noticia", $noticia);
//$statement->bindValue(":resumen", $resumen);
//$statement->bindValue(":texto", $texto);
//$statement->bindValue(":ultimahora", $ultimahora);
//$statement->bindValue(":claves", $claves);
//$statement->bindValue(":creacion", $creacion);
//$statement->bindValue(":idregion", $idregion);
//$statement->bindValue(":idedicion", $idedicion);
//$statement->bindValue(":estado", $estado);
//$statement->bindValue(":idusuario", $idusuario);
//$statement->bindValue(":antetitulo", $antetitulo);
//$statement->bindValue(":subtitulo", $subtitulo);
//$statement->bindValue(":hora", $hora);
//$statement->bindValue(":ubicacion", $ubicacion);
//$statement->bindValue(":orden", $orden);
//$statement->bindValue(":raiting_1", $raiting_1);
//$statement->bindValue(":raiting_2", $raiting_2);
//$statement->bindValue(":raiting_3", $raiting_3);
//$statement->bindValue(":raiting_4", $raiting_4);
//$statement->bindValue(":raiting_5", $raiting_5);
//$statement->bindValue(":tipo", $tipo);
//$statement->bindValue(":intro", $intro);
//$statement->bindValue(":destacado", $destacado);
//$statement->bindValue(":presentar", $presentar);
//$statement->execute(); 
      
//$result = $statement->fetch(PDO::FETCH_ASSOC); 
//echo "\n\n new story id = " . $result["idnoticia"]; 
echo "\n\n";
			

		$new_post = null;
		}
	catch(PDOException $e)
	{
	}

//	}
	$last5 = null;
	}
	catch(PDOException $e)
	{
	}
}
//echo '<meta http-equiv="refresh" content="60;http://hoy.doap.com/hoy-import.php" />';
//<meta http-equiv="refresh" content="30=http://hoy.doap.com/hoy-import.php">
?>
