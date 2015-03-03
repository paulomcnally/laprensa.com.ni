<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0"
  xmlns:content="http://purl.org/rss/1.0/modules/content/"
  xmlns:wfw="http://wellformedweb.org/CommentAPI/"
  xmlns:dc="http://purl.org/dc/elements/1.1/"
  xmlns:atom="http://www.w3.org/2005/Atom"
  xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
  xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
  xmlns:media="http://search.yahoo.com/mrss/"
  xmlns:georss="http://www.georss.org/georss"
>
<channel>
<?php
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
$pgsql_hostname = '10.0.0.86';
$pgsql_username = 'laprensa';
$pgsql_password = 'Blade-mobile8Occupy';
$pgsql_db = 'laprensa';
$pgsql_port = '5432';

/*** pgsql connector ***/
try {
    $db = new PDO("pgsql:dbname=$pgsql_db;host=$pgsql_hostname", "$pgsql_username", "$pgsql_password" );
    }
catch(PDOException $e)
    {
    //echo $e->getMessage();
    }

//endpgsql 

//pgsql channel info query
try {
    $dbp = new PDO("pgsql:host=$pgsql_hostname;dbname=laprensa", $pgsql_username, $pgsql_password);

    /*** The SQL SELECT statement ***/
$sql = "select noticia.idedicion as idedicion, edicion.edicion, edicion.portada, count(noticia.idnoticia) as articlecount from edicion, noticia where noticia.idedicion = edicion.idedicion group by noticia.idedicion, edicion.edicion, edicion.portada, edicion.paginas order by idedicion desc limit 1";
    foreach ($dbp->query($sql) as $row)
			{
?>

<?php
date_default_timezone_set('America/Managua');
if (!isset($idedicion)) { $idedicion = $row['idedicion']; }
if (!isset($string)) { $string = $row['edicion']; }
$string = $row['edicion'];
$pos = strrpos( $string, '.');
if ($pos !== false) {
    $creacion = substr($string, 0, $pos );
}

$string2 = strtotime($string);
$cr=date("r", $string2);
//echo "date: " . $cr;
//echo "\n";
?>

<?php                   
			if (isset($seccion)) { print '<title>La Prensa ' . $seccion . ' ' . $lastBuildDate . '</title>'; } else { print '<title><![CDATA[La Prensa Edicion: ' . $lastBuildDate. ']]></title>'; }
			if (isset($seccion)) { print '<atom:link href="http://doap.com/lpx.xml?seccion='.$seccion.'" rel="self" type="application/rss+xml"></atom:link>'; } else { print '<atom:link href="http://doap.com/hoy.xml" rel="self" type="application/rss+xml"></atom:link>'; } 
                        print '<link>http://doap.com/lpx.php</link>';
                        print '<description>La Prensa - El diario de los Nicaraguenses</description>';
                        print '<lastBuildDate>' . $lastBuildDate . '</lastBuildDate>';
			print '<language>es-US</language>';
			print '<sy:updatePeriod>hourly</sy:updatePeriod>';
			print '<sy:updateFrequency>1</sy:updateFrequency>';
                        print '<generator>DevOps and Platforms (doap.com) XML Parser v1.0</generator>';
			}
    /*** close the database connection ***/
    $dbp = null;
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

//end channel info pgsql query 

//pgsql query
try {
    $dbp = new PDO("pgsql:host=$pgsql_hostname;dbname=laprensa", $pgsql_username, $pgsql_password);

if (isset($_GET['seccion'])) { 
     $sql = "SELECT noticia.idnoticia, seccion.seccion, noticia.creacion as noticiacreacion, edicion.creacion, noticia.hora, noticia.ultimahora, seccion.seccion, noticia.claves, edicion.portada, edicion, noticia, uri, noticia.resumen, noticia.texto FROM noticia LEFT JOIN seccion USING(idseccion) LEFT JOIN edicion USING(idedicion) LEFT JOIN rating USING (idnoticia) WHERE (leido IS NOT NULL OR leido <> 0) AND idseccion = (SELECT idseccion FROM seccion WHERE seccion = '$seccion' ORDER BY idseccion LIMIT 1) ORDER BY idnoticia DESC LIMIT 10";
} else {

	$sql = "select  noticia.idnoticia, noticia.creacion, seccion.seccion, seccion.idseccion, noticia.noticia, noticia.resumen, noticia.texto from noticia, seccion WHERE seccion.idseccion = noticia.idseccion AND noticia.noticia <> 'Titular por asignar' AND noticia.noticia <> 'ocotal' ORDER BY noticia.idnoticia  desc limit 10";

}


    foreach ($dbp->query($sql) as $row)
        {
?>

<?php
date_default_timezone_set('America/Managua');
$string = $row['creacion'];
$pos = strrpos( $string, ' ');
if ($pos !== false) {
    $creacion = substr($string, 0, $pos );
}
$articledate = $creacion;
$articledate = strtotime($articledate);
//$articleday = 07;
//$articlemonth = 07;
$articlemonth = date("m", $articledate);
$articleyear = date("Y", $articledate);
//$day = date("D", $articledate);
$articleday = date("d", $articledate);
$string = strtotime($creacion);

$x=date("r", $string);
//echo "date: " . $x;
//echo "\n";
?>

<?php			print '<item>';
			if (isset($seccion)) { print '<title>' . ucfirst($row['noticia']) .'</title>'; } else { print '<title><![CDATA[' . substr(ucfirst($row['noticia']),0,50) .']]></title>'; }
                        print '<link>http://noticias.laprensa.com.ni/' . $articleyear . '/' . $articlemonth . '/' . $articleday . '/' . $row['idnoticia'] . '-' . strtolower(str_replace(" ","-",$row['noticia'])) .'.html</link>';
			print '<comments>http://noticias.laprensa.com.ni/' . $articleyear . '/' . $articlemonth . '/' . $articleday . '/' . $row['idnoticia'] . '-' . strtolower(str_replace(" ","-", $row['noticia'])) . '.html#comments</comments>';
                        print '<pubDate>'. $x. '</pubDate>';
                        print '<dc:creator>Editorial La Prensa</dc:creator>';
                        print '<category><![CDATA[' . $row['seccion'] . ']]></category>';
			print '<guid isPermaLink="false">http://noticias.laprensa.com.ni/?p=' . $row['idnoticia'] .'</guid>';
			print '<description><![CDATA[' . $row['noticia'] .']]></description>';
                        print '<content:encoded><![CDATA[' . $row['resumen'] . ' ' . $row['texto'] . ']]></content:encoded>';
                        print '<wfw:commentRss>http://noticias.laprensa.com.ni/' . $articleyear . '/' . $articlemonth . '/' . $articleday . '/' . $row['idnoticia'] . '-' .  strtolower(str_replace(" ","-", $row['noticia'])) .'.html </wfw:commentRss>';
                        print '<slash:comments>0</slash:comments>';
?>                        
<?php
			print '<media:content url="http://laprensa17.doap.us/wp-content/uploads/sites/2/2014/03/logolaprensa2.png">';
                        print '<media:description type="plain">La Prensa - El Diario de los Nicaragüenses.</media:description>';
                        print '<media:copyright>Editorial La Prensa</media:copyright>';
                        print '</media:content>';
        		                print '</item>';
        }
    $dbp = null;
}
catch(PDOException $e)
    {
//    echo $e->getMessage();
    }
//end pgsql query 
?>
</channel>
</rss>
