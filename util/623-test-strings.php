<?php
define('WP_USE_THEMES', true);
//define( 'SHORTINIT', true );
//$dir = new DirectoryIterator(dirname(__FILE__));
//date_default_timezone_set('America/Managua');
//setlocale(LC_ALL, "es_NI.utf8");
$_SERVER[ 'HTTP_HOST' ] = 'noticias.laprensa.com.ni';
require_once( '/var/www/html/lpmu/wp-load.php' );
require_once('/var/www/html/lpmu/wp-config.php');
require_once('/home/shawn/cleanfunctions.php');
//require_once('/var/www/html/lpmu/wp-includes/wp-db.php');
require_once( '/var/www/html/lpmu/wp-admin/includes/image.php' );
switch_to_blog('2');
global $wpdb;
$pgsql_hostname = 'lp-rds.laprensa.com.ni';
$pgsql_username = 'shawn';
$pgsql_password ='fr1ck0ff';
$pgsql_db = 'laprensa';
$pgsql_port = '5432';
require_once("/var/www/html/lpmu/wp-includes/formatting.php");
$remove_txt = array('<img src="/img/cuadritonaranja.gif" width="6" height="6" alt=".">','<img src="/img/cuadritonaranja.gif" width="6" height="6">', '<table width="100%" border="0" cellspacing="5" cellpadding="0" xmlns:msxsl="urn:schemas-microsoft-com:xslt" xmlns:user="http://my_domain_name/my_namespace">','<table width="100%" border="0" cellpadding="0" cellspacing="5" bgcolor="#F7F7F7">','<table width="100%" border="0" cellspacing="0" cellpadding="0">','<td width="1" align="left" valign="bottom"><table width="1" border="0" cellspacing="3" cellpadding="0">','<td style="padding-top:8px; padding-bottom:8px">','<td align="left">','<td align="left" valign="top">','</td>');
$table_tags = array('<table>','</table>','<tr>','</tr>','<td>','</td>','<div>','</div>');
$cat_post_body = '/var/www/html/laprensa/lp-archivo/public_html/archivo/2000/junio/01/regionales/regionales-20000601-04.info';
$cat_pic_file = 'economia-20000529-01.jpg';
$cat_post_text = file_get_contents($cat_post_body);
$cat_post_text = <<<EOD
<p>&nbsp;</p>
<div class="na-media na-image-normal image-210025" style="width: 600px;"><img title="1396224524_310314playMLB,photo01.jpg" src="http://du89eogdt5czf.cloudfront.net/wp-content/uploads/sites/55/2014/03/600x400_1396224524_310314playMLB,photo01.jpg" alt="" width="600" height="400" />
<div class="info">
<p>Mike Trout, en apenas su tercer a&ntilde;o en las Grandes Ligas,  ya es considerado el mejor jugador del beisbol. LA PRENSA/AP</p>
</div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>El primer episodio en 2014 de la rivalidad entre Miguel Cabrera y Mike Trout se libr&oacute; con calculadoras. Pero no fue para sacar cuentas saberm&eacute;tricas para terciar en el debate sobre qui&eacute;n es el mejor.</p>
<p>&nbsp;</p>
<p>En la antesala del inicio de la temporada, Cabrera y Trout pactaron nuevos contratos que avalan el extraordinario presente de bonanza econ&oacute;mica que impera en el beisbol de Grandes Ligas.</p>
<p>&nbsp;</p>
<p>Con el monto de 292 millones de d&oacute;lares por 10 a&ntilde;os que pact&oacute; con los Tigres de Detroit, Cabrera qued&oacute; presumiendo con el contrato m&aacute;s lucrativo de todas las ligas profesionales de Estados Unidos. La magnitud fue tal que LeBron James, el referente m&aacute;ximo de la NBA, reaccion&oacute; aturdido y &mdash;con envidia sana&mdash; lament&aacute;ndose que su liga tuviese un tope salarial.</p>
<p>&nbsp;</p>
<p>Los ejecutivos de Detroit defendieron a capa y espada el compromiso garantizado que hab&iacute;an asumido con el venezolano de 31 a&ntilde;os, insistiendo que el ganador de la Triple Corona en 2012 est&aacute; encaminado a ser uno de los mejores de todos los tiempos.</p>
<p>&nbsp;</p>
<p>Apenas horas despu&eacute;s trascendi&oacute; otro contrato de impacto, con los Angelinos de Los &Aacute;ngeles atando a Trout por 144.5 millones y seis temporada. Con apenas dos campa&ntilde;as de servicio en las mayores, Trout tendr&aacute; un salario promedio de 24 millones. Nada mal para el jardinero de 22 a&ntilde;os, segundo detr&aacute;s de Cabrera en las votaciones al Jugador M&aacute;s Valioso de la Liga Americana en las &uacute;ltimas dos campa&ntilde;as, ambas tras encendidos debates al compararse estad&iacute;sticas tradicionales con los an&aacute;lisis avanzados.</p>
<p>&nbsp;</p>
<p>&iquest;Volver&aacute;n a medir fuerzas en uno nuevo pulso por ser el m&aacute;s valioso de su liga? Eso se sabr&aacute; en los pr&oacute;ximos meses, en los que las mayores ver&aacute;n a Derek Jeter despedirse tras una ilustre trayectoria de dos d&eacute;cadas. La ilusi&oacute;n del capit&aacute;n de los Yanquis es irse a lo grande, con un sexto anillo de campe&oacute;n de la Serie Mundial.</p>
<p>&nbsp;</p>
<h2>&iquest;PODR&Aacute; REPETIR BOSTON?</h2>
<p>&nbsp;</p>
<p>Los Medias Rojas de Boston intentar&aacute;n convertirse en el primer club que revalida el t&iacute;tulo del Cl&aacute;sico de Oto&ntilde;o desde los Yanquis entre 1998-2000. Robinson Can&oacute; abandon&oacute; el Bronx y ahora es compa&ntilde;ero de equipo de F&eacute;lix Hern&aacute;ndez, en Seattle.</p>
<p>&nbsp;</p>
<p>Las lesiones de codo, con la posterior operaci&oacute;n Tommy John, se han acentuado, dejando fuera a una media docena de brazos en la pretemporada como fue el caso de Jarrod Parker, Patrick Corbin, Kris Medlen, Brandon Beachy, Bruce Rond&oacute;n y Luke Hochevar.</p>
<p>&nbsp;</p>
<h2>REPETICIONES DE V&Iacute;DEO</h2>
<p>&nbsp;</p>
<p>La consigna de las Mayores es reducir al m&iacute;nimo las pol&eacute;micas por fallos de sus umpires, como el que le cost&oacute; a Armando Galarraga un juego perfecto en 2010. As&iacute; que a partir de esta campa&ntilde;a, con una inversi&oacute;n de 10 millones de d&oacute;lares, se tendr&aacute; un &ldquo;centro de comando&rdquo; instalado en el Chelsea Market de Nueva York que analizar&aacute; jugadas cerradas, salvo bolas y strikes. Ocho umpires estar&aacute;n asignados a trabajar en el sitio cada semana.</p>
<p>&nbsp;</p>
<p>Incre&iacute;ble que no haya sido hasta ahora que el beisbol haya decidido aceptar la tecnolog&iacute;a para evitarse innecesarias controversias. Hasta la Serie Mundial de Peque&ntilde;as Ligas ven&iacute;a usando las repeticiones desde 2008.</p>
<p>&nbsp;</p>
<p>Ahora, los m&aacute;nager podr&aacute;n presentar un reclamo por partido, obligando al umpire llamar a Nueva York para que emita el fallo definitivo. Si estaba en lo correcto, el piloto dispondr&aacute; de un segundo reclamo. Luego del s&eacute;ptimo inning, los umpires podr&aacute;n pedir por iniciativa propia un an&aacute;lisis, pero solo en caso que el afectado ya hizo uso del suyo.</p>
<p>&nbsp;</p>
<h2>EMBESTIDAS EN EL PLATO</h2>
<p>&nbsp;</p>
<p>A modo de experimento por un a&ntilde;o, los corredores no podr&aacute;n embestir deliberadamente a los receptores en el plato.</p>
<p>&nbsp;</p>
<p>La nueva regla, 7.13, estipula que &ldquo;el corredor intentando anotar no podr&aacute; salirse del sendero directo al plato para buscar contacto con el c&aacute;cher (u otro jugador cubriendo el plato)&rdquo;.</p>
<p>&nbsp;</p>
<p>El jugador que no cumpla con la regla ser&aacute; declarado out sin importar si el defensor deja caer la pelota. Todav&iacute;a se permite el contacto si el receptor tiene la pelota y est&aacute; bloqueando el plato. Puede ir por el contacto, pero no podr&aacute; usar los codos y hombros. Lo que se trata de estimular es que los corredores intenten deslizarse con m&aacute;s frecuencia en vez de embestir.</p>
<p>&nbsp;</p>
<h2>M&Aacute;S GLOBALIZACI&Oacute;N</h2>
<p>&nbsp;</p>
<p>Los dos primeros juegos de la campa&ntilde;a se disputaron el fin de semana en Sydney, con una serie entre los Dodgers y Diamondbacks. Tras aperturas en Jap&oacute;n, M&eacute;xico y Puerto Rico, fue la primera vez que las mayores montaron juegos oficiales en Australia, todo como parte del objetivo se expandir el deporte.</p>
<p>&nbsp;</p>
<p>El p&iacute;cher japon&eacute;s Masahiro Tanaka debutar&aacute; con los Yanquis. Su adquisici&oacute;n por 155 millones y siete a&ntilde;os es la primera tras el cambio del proceso de subastas para importar peloteros de Jap&oacute;n, en el que un club de Grandes Ligas no puede pasarse m&aacute;s all&aacute; de los 20 millones en cuanto al desembolso que debe darle a su contraparte nip&oacute;n para negociar con el jugador. Y los Medias Blancas de Chicago conf&iacute;an que Jos&eacute; Dariel Abreu sea el nuevo desertor cubano que cause sensaci&oacute;n, siguiendo los pasos de Yasiel Puig (Dodgers), Yoenis C&eacute;spedes (Atl&eacute;ticos) y Aroldis Chapman (Rojos).</p>
<p>&nbsp;</p>
<p>Tambi&eacute;n est&aacute;n surgiendo jugadores brasile&ntilde;os. Yan Gomes desplaz&oacute; a Carlos Santana como titular de la receptor&iacute;a en Cleveland y Andr&eacute; Rienzo podr&iacute;a abrirse dentro de poco un hueco en la rotaci&oacute;n de los Medias Blancas.</p>
<p>&nbsp;</p>
<h2>M&Aacute;NAGER NOVATOS</h2>
<p>&nbsp;</p>
<p>Entre los nuevos m&aacute;nager, Brad Ausmus releva a Jim Leyland en Detroit, Bryan Prince a Dusty Baker en Cincinnati; Matt Williams a Davey Johnson en Washington; y Rick Renter&iacute;a a Dale Sveum en los Cachorros. Todos tendr&aacute;n su primera experiencia como pilotos. La &uacute;nica excepci&oacute;n es Lloyd McClendon en Seattle.</p>
<p>&nbsp;</p>
<p>Asignar la responsabilidad a un dirigente debutante funcion&oacute; con Mike Matheny en San Luis, al conducirles el a&ntilde;o pasado a la Serie Mundial en lugar de Tony La Russa.</p>
<p>&nbsp;</p>
<p>Se trata de una tendencia que se viene imponiendo desde fines de 2011. En los 17 cambios de m&aacute;nager que se han dado desde entonces, los equipos se han ido 13 veces por un dirigente con menos experiencia dirigiendo que su predecesor. Y dos de los pilotos que ten&iacute;an experiencia previa (Ozzie Guill&eacute;n y Bobby Valentine) no sobrevivieron su primer a&ntilde;o al frente.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div class="na-media na-image-normal image-210026" style="width: 600px;"><img title="1396224548_310314playMLB,photo02.jpg" src="http://du89eogdt5czf.cloudfront.net/wp-content/uploads/sites/55/2014/03/600x400_1396224548_310314playMLB,photo02.jpg" alt="" width="600" height="530" />
<div class="info">
<p>Masahiro Tanaka, novato a seguir. LA PRENSA/AP</p>
</div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p class="print-pages">Ver en la versi&oacute;n impresa las p&aacute;ginas: 9 B</p>
EOD;

$cat_post_text = str_ireplace("\x0D", "", $cat_post_text);
$div_info_start = '<div class="info"';
$div_info_end = '</div>';
$div_img_start = '<div class="na-media na';
$div_img_end = '</div>';

function get_my_excerpt($limit, $cat_post_text, $dots=NULL, $chars=NULL) {
        if ($dots)
        {
        $dots = '...';
        }
//        remove_filter( 'get_the_excerpt', 'responsive_custom_excerpt_more' );
        //$theexcerpt = get_the_excerpt();
        $theexcerpt = strip_tags($cat_post_text);
///        add_filter( 'get_the_excerpt', 'responsive_custom_excerpt_more' );
        $words = str_word_count($theexcerpt, 2);
        $numwords = str_word_count($theexcerpt, 0);
	if ($chars)
	{
		$wc_start = array_keys($words);
		foreach ($wc_start as $wc_pos)
		{
			$word_end = $wc_pos - 1;
			if ($word_end <= $limit)
			{
				$excerpt_end = $word_end;
			}
		}
		$theexcerpt = substr($theexcerpt,0,$excerpt_end) . $dots;
	}
	else
	{
        	if ($numwords > $limit)
        	{
        	        $theexcerpt = implode(' ', array_slice(explode(' ', $theexcerpt), 0, $limit)) . $dots;
        	}
	}
//var_dump($words);
        return $theexcerpt;
}
echo PHP_EOL . PHP_EOL . ' limit by words = ' . get_my_excerpt(50, $cat_post_text);
echo PHP_EOL . PHP_EOL . ' limit by characters = ' . get_my_excerpt(270, $cat_post_text,1,1);

//echo PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL . PHP_EOL; 
//echo 'ANTETITULO_TEXT' . PHP_EOL . $antetitulo_text . PHP_EOL;
//echo 'ANTETITULO' . PHP_EOL . $clean_antetitulo . PHP_EOL;
//echo 'CAPTION' . PHP_EOL . $clean_caption . PHP_EOL;
//echo 'AUTOR CLEAN' . PHP_EOL . $clean_autor . PHP_EOL;
//echo 'AUTOR' . PHP_EOL . $autor_text. PHP_EOL;
//echo 'FOTO' . PHP_EOL . $pic_tag . PHP_EOL;
//echo 'TITLE' . PHP_EOL . $title . PHP_EOL;
//echo 'CLEAN TITLE' . PHP_EOL . $clean_title . PHP_EOL;
//echo 'PERMALINK' . PHP_EOL . $permalink . PHP_EOL;
//echo 'INTRO_TEXT' . PHP_EOL . $intro_text . PHP_EOL;
//echo 'POST TEXT NEW' . PHP_EOL . $post_text . PHP_EOL;
echo PHP_EOL . PHP_EOL;
?>
