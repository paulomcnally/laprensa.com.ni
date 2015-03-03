<?php
define('WP_USE_THEMES', false);
/** Loads the WordPress Environment and Template */
//require_once( '/var/www/html/wp-blog-header.php' );
require_once( '/var/www/html/wp-load.php' );
require_once('/var/www/html/wp-config.php');
$wp->init(); $wp->parse_request(); $wp->query_posts();
$wp->register_globals(); $wp->send_headers();
require_once( '/var/www/html/wp-admin/includes/image.php' );
switch_to_blog('51');


function substring_index($subject, $delim, $count){
    if($count < 0){
        return implode($delim, array_slice(explode($delim, $subject), $count));
    }else{
        return implode($delim, array_slice(explode($delim, $subject), 0, $count));
    }
}
//na-media 
$article1 = <<<EOD
 <p>&nbsp;</p>
<div class="na-image-left image-29151" style="width: 288px;"><img title="1376070613_kattia.jpg" src="http://www.hoy.com.ni/imgs/2013/08/288x318_1376070613_kattia.jpg" alt="" width="288" height="192" />
<div class="info">
<p>Kattia Obald&iacute;a, la joven que no puede casarse mientras est&eacute; atada con hombre que no conoce. La Naci&oacute;n de Costa Rica</p>
</div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>HOY /<a href="http://www.nacion.com/"> LA NACI&Oacute;N DE COSTA RICA<br /></a></p>
<p>Era noviembre del 2006. Kattia Obald&iacute;a Chavarr&iacute;a cumplir&iacute;a el sue&ntilde;o de casarse. Ella ten&iacute;a encargado el queque y listos el vestido, los arreglos florales, el anillo y los centros de mesa. Los invitados ya estaban confirmados.</p>
<p><br />La boda ser&iacute;a en una semana y entonces acudi&oacute; al Registro Civil a solicitar su certificado de solter&iacute;a y el de su novio. La funcionaria que la atendi&oacute; en la ventanilla le pregunt&oacute; para qu&eacute; requer&iacute;a el documento. &ldquo;Lo necesito para casarme&rdquo;, respondi&oacute;. &ldquo;&iquest;Para casarse?, pero usted ya est&aacute; casada&rdquo;, dijo la funcionaria.</p>
<p><br />&ldquo;Usted est&aacute; confundida; est&aacute; hablando de mi hermana mayor, que est&aacute; casada. Yo soy Kattia Obald&iacute;a&rdquo;, contest&oacute; la joven, quien ahora tiene 27 a&ntilde;os.</p>
<p><br />Sin embargo, la funcionaria ten&iacute;a raz&oacute;n. Desde el 24 de julio del 2006, Obald&iacute;a aparece casada con un cubano, de apellido Mart&iacute;nez, a quien a la fecha no conoce, y quien nunca ha ingresado a Costa Rica, seg&uacute;n Migraci&oacute;n.</p>
<p><br />&nbsp;&ldquo;Me empez&oacute; a temblar el cuerpo, me pon&iacute;a de pie y me sentaba repetidas veces, gritaba que eso no era cierto. Entr&eacute; en una histeria y tuvieron que tranquilizarme hasta que un oficial del Registro Civil me explic&oacute; todo...&rdquo;, cont&oacute; Obald&iacute;a.<br />Ella es parte de un grupo de ocho hombres y 23 mujeres que fueron casados, sin saberlo, en el 2006. Esos matrimonios aparecieron en el protocolo de la notaria Kattia Salas Guevara.</p>
<p><br />En enero del 2012, el Tribunal Penal de San Jos&eacute; hall&oacute; culpable a Salas de cometer 31 delitos de falsedad ideol&oacute;gica y fij&oacute; la pena en 186 a&ntilde;os de prisi&oacute;n, readecuados a 18 a&ntilde;os.</p>
<p><br />Sin embargo, en agosto del 2012, el Tribunal de Apelaciones de Goicoechea orden&oacute; su libertad, tras se&ntilde;alar que en la sentencia condenatoria hubo errores que ameritaban realizar un nuevo juicio.</p>
<p><br />El nuevo debate se realizar&aacute; entre agosto y octubre del 2014, seg&uacute;n confirm&oacute; la oficina de prensa del Poder Judicial.<br />Kattia Obald&iacute;a no se pudo casar y la relaci&oacute;n con su novio de ese momento termin&oacute;. &ldquo;Tratamos de luchar hasta que nos cansamos; tuvimos muchos problemas en la relaci&oacute;n a ra&iacute;z de eso&rdquo;.</p>
<p><br />Actualmente, tiene otra relaci&oacute;n, pero tampoco puede casarse, y dijo que &ldquo;juntarse&rdquo; con &eacute;l no es una opci&oacute;n en su vida.<br />&ldquo;Usted no sabe cu&aacute;nto dar&iacute;a yo por firmar el papel y casarme con la persona que yo decid&iacute;, pero siento que agarraron mi mano, me casaron y me usaron como cualquier cosa. Tengo la fe de que alg&uacute;n d&iacute;a lo voy a hacer&rdquo;, expres&oacute; la mujer.<br />Obald&iacute;a asegura que existen otras v&iacute;ctimas de estos matrimonios &ldquo;de papel&rdquo; que no han podido asegurar a sus hijos o pedir pensi&oacute;n alimentaria porque aparecen inscritos con los apellidos de extranjeros que no conocen.</p>
<p><br />Ayuda. El 2 de agosto, durante una misa celebrada en Cartago en honor a la Virgen de los &Aacute;ngeles, los presidentes de los tres poderes de la Rep&uacute;blica &ldquo;consagraron&rdquo; sus instituciones y pidieron perd&oacute;n por las &ldquo;transgresiones&rdquo; de lo que ha ocurrido en el pasado.</p>
<p><br />&ldquo;A m&iacute; eso me inspir&oacute; a escribirles una carta abierta, a trav&eacute;s de <a href="http://www.nacion.com/">La Naci&oacute;n</a> , y pedirles que hicieran algo. Ya no sabemos a qui&eacute;n acudir. Necesitamos la mano de alguien, de Laura Chinchilla, de Zarella Villanueva, de Luis Fernando Mendoza, para que se enteren de lo terrible que es esto. Es un grito desesperado para que hagan algo&rdquo;, dijo.</p>
<p><br />La Fiscal&iacute;a inform&oacute; ayer de que contra la notaria Kattia Salas existe otra investigaci&oacute;n en curso por 26 personas que tambi&eacute;n denunciaron matrimonios falsos.</p>
<p>&nbsp;</p>
EOD;

$div_start = '<div class="na-media na';
$div_end= '</div>';
$div_pos_start = strpos($article1, $div_start);
$div_pos_end_1 = strpos($article1, $div_end, $div_pos_start);
$div_pos_end_2 = strpos($article1, $div_end, ($div_pos_end_1 + 1 ));
$div_pos_end = $div_pos_end_2 - $div_pos_start + strlen($div_end);
$div = substr( $article1, $div_pos_start, $div_pos_end );
$count = 1;
$img_replaced_text = str_replace($div, "", $article1, $count);

echo "\n\n\n\n$img_replaced_text\n\n\n\n";

//$div_info= substring_index(substring_index($div, '<div class="info"><p>', -1 ) ,  '</p></div></div>', 1 );

$creacion = '2013-07-22 13:54:28';
$no_pic_post_date = date("Y-m-d H:i:s",strtotime("-5 minutes",strtotime($creacion)));
$no_pic_post_date = date("Y-m-d H:i:s",strtotime("-15 minutes",strtotime($creacion)));

$newstring = '/2013/08/06/';

$c = substr($newstring,1,10);
$b = strtotime($c);
$year = date("Y", $b);
$month = date("m", $b);
$numday = date("d", $b);
//$model_post_content = '<style>' . PHP_EOL . '#hupso_counters_1 \{ display:none;visibility:hidden; \}' . PHP_EOL . '#hupso_counters_2 \{ display:none;visibility:hidden; \}' . PHP_EOL . '#post-meta \{ display:none;visibility:hidden; \}' . PHP_EOL PHP_EOL . '</style>' . PHP_EOL . '<h5> Modelo Semana ' . $modeldesde . ' - ' . $modelhasta . '</h5>' . PHP_EOL . '[content_block id=' . $post_id . ']';


$hupso1 = <<<'EOT'
#hupso_counters_1 { display:none;visibility:hidden; }
EOT;
$hupso2 = <<<'EOT'
#hupso_counters_2 { display:none;visibility:hidden; }
EOT;
$metastyle = <<<'EOT'
#post-meta { display:none;visibility:hidden; }
EOT;

$model_page_content = '<style>' . PHP_EOL . $hupso1 . PHP_EOL . $hupso2 . PHP_EOL . $metastyle . PHP_EOL . '</style>' . PHP_EOL . '<h5> Modelo Semana ' . $modeldesde . ' - ' . $modelhasta . '</h5>' . PHP_EOL . '[content_block id=' . $post_id . ']';
$oldimagecount = 1;
 $oldimagecount = substr_count($article1, 'na-media');
 if ( $oldimagecount == 0 )
 {
         $article_has_no_image = 1;
 }
 else
 {
         $article_has_no_image = 0;
 }

echo "\n\n\n\n$no_pic_post_date\n\n\n\n";
echo "\n\n\n$a\n\n";
echo "\n\n\n$c\n\n";
echo "\n\n\n$b\n\n";
echo "\n\n\n$year\n\n";
echo "\n\n\n$month\n\n";
echo "\n\n\n$numday\n\n";
echo "\n\n\n$model_post_content \n\n";
echo "\n\n\n$hupso1";
echo "\n\n\n$hupso2";
echo "\n\n\n$metastyle \n\n";

echo "\n\n\noldimagecount = $oldimagecount\n\n";
echo "\n\n\narticle_has_no_image = $article_has_no_image\n\n";
echo "\n\n\n$model_page_content\n\n";

if ( $article_has_no_image )
{

echo "\n\n\n\ncreacion = $creacion\n\n\n\n";
echo "\n\n\n\nno pic post date = $no_pic_post_date\n\n\n\n";
}

//$attachment_guid = 'http://hoy.doap.com/wp-content/uploads/sites/51/2013/08/1376996759_200813notmoto,photo01.jpg';
$attachment_guid = 'http://www.hoy.com.ni/wp-content/uploads/sites/51/2013/10/1381396291_101013mercpescado,photo01.jpg';
$attachment_site = substring_index($attachment_guid, '/wp-content', 1);
$attachment_file = substring_index($attachment_guid, '/', -1);
$sourcefiles = substring_index($attachment_guid, $attachment_site, -1 );
$sourcefiles = substring_index($sourcefiles, '.' , 1 );
$sourcefiles = '/var/www/html' . $sourcefiles . '*';
$destination_path = substring_index($attachment_guid, $attachment_site, -1 );
$destination_path = substring_index($destination_path, $attachment_file, 1 );
$destination_path = 's3://s3.hoy.com.ni' . $destination_path;
$s3command = 's3cmd put --skip-existing --no-encrypt -P -H ' . $sourcefiles . ' ' . $destination_path;
$configdir = '/var/www/html/laprensa/classes';
$rootdir = substr($configdir, 0, strrpos($configdir,'/'));


$file1 = '1342988583_ONA22072012Roza - Móvil.mp4';
$file2 = '1377207519_Cámaras de seguridad capturan agresión - LA PRENSA TV.mp4';
$file3 = '1341155092_ONA30062012Bendaña Ayuno.mp4';
$file4 = '1347067231_Protestan contra Tumarín.mp4';
$file5 = '1347067480_Shakira canta con su papá.mp4';

$url1 = rawurlencode($file1);
$url2 = rawurlencode($file2);
$url3 = rawurlencode($file3);
$url4 = rawurlencode($file4);
$url5 = rawurlencode($file5);

//echo "\n\n\n$url1\n\n";
//echo "\n\n\n$url2\n\n";
//echo "\n\n\n$url3\n\n";
//echo "\n\n\n$url4\n\n";
//echo "\n\n\n$url5\n\n";
echo "\n\n\n$s3command\n\n";
//echo "\n\n\n$rootdir\n\n";

//exec($s3command);
 
?>
