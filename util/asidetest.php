#!/usr/bin/php
<?php
require_once('/home/shawn/cleanfunctions.php');
$str = <<<EOD
<div class="na-media na-image-left image-209163"><img src="http://du89eogdt5czf.cloudfront.net/wp-content/uploads/sites/55/2014/03/288x318_1395622988_240314dptNota1-7,photo01.jpg" alt="" />
<div class="info">
<p>Seg&uacute;n las autoridades de Ixchen,  en Granada,<br /> muchas mujeres se quejan de maltrato y mala <br />atenci&oacute;n, tanto en la Fiscal&iacute;a como en<br /> la Comisar&iacute;a de la Mujer, por lo que<br /> prefieren no denunciar a sus agresores.<br /> LA PRENSA/ ARCHIVO</p>
</div>
</div>
<p><strong><em>Luc&iacute;a Vargas</em></strong></p>
<p>&nbsp;</p>
<p>En los primeros dos meses de este a&ntilde;o, 92 mujeres pidieron acompa&ntilde;amiento legal en Ixchen, Granada, por haber sufrido violencia. Estos datos, seg&uacute;n Ruth D&iacute;az, asesora legal de Ixchen, evidencian que los casos de violencia hacia la mujer &mdash;por lo menos en ese departamento&mdash; &ldquo;no han podido bajar&rdquo;.</p>
<p>&nbsp;</p>
<p>Estas mujeres fueron v&iacute;ctimas de violencia sexual, f&iacute;sica, patrimonial y econ&oacute;mica. Tambi&eacute;n se han registrado demandas de ayuda por parte de personas de la tercera edad que sufren maltrato de sus parientes, seg&uacute;n los datos ofrecidos por Ixchen.</p>
<p>&nbsp;</p>
<p>El a&ntilde;o pasado, este organismo registr&oacute; 480 casos que fueron atendidos de manera integral. De estos, ocho casos fueron de abuso sexual y seis violaciones contra menores de edad.</p>
<p>&nbsp;</p>
<p>&ldquo;La violencia sigue presente, no hemos podido bajar los &iacute;ndices a pesar de los esfuerzos que se hacen para empoderar a la mujer, y que no siga siendo objeto de manipulaci&oacute;n en el entorno familiar&rdquo;, dice D&iacute;az.</p>
<p>&nbsp;</p>
<p>En cuanto a casos graves cometidos contra la ni&ntilde;ez, la entidad contabiliza dos en lo que va del a&ntilde;o. En el m&aacute;s reciente la v&iacute;ctima es una menor de 9 a&ntilde;os.</p>
<p>&nbsp;</p>
<p>Y en el otro caso, el agresor fue el padre biol&oacute;gico, quien viol&oacute; a sus dos hijas de 12 y 13 a&ntilde;os. Una de ellas qued&oacute; embarazada y pari&oacute; en enero de este a&ntilde;o.</p>
<p>&nbsp;</p>
<h2>
<div class="na-media na-image-left image-209164" style="width: 279px;"><img title="1395622998_240314dptNota1-7,photo02.jpg" src="http://du89eogdt5czf.cloudfront.net/wp-content/uploads/sites/55/2014/03/288x318_1395622998_240314dptNota1-7,photo02.jpg" alt="" width="279" height="318" />
<div class="info">
<p>&nbsp;</p>
<p>F&aacute;tima Flores,  jefa de la Polic&iacute;a de Granada. LA PRENSA/ ARCHIVO</p>
</div>
</div>
NO TIENEN ACCESO A LA JUSTICIA</h2>
<p>&nbsp;</p>
<p>D&iacute;az refiri&oacute; que una de las dificultades que han denunciado las mujeres es el acceso a la justicia. &ldquo;En el caso nuestro hemos tenido mayor acercamiento con los jueces de los diferentes juzgados, quienes el a&ntilde;o pasado nos remitieron 74 casos, en cambio con la Fiscal&iacute;a y la Polic&iacute;a, que son las encargadas de garantizar la justicia para las v&iacute;ctimas, ha sido m&iacute;nima la coordinaci&oacute;n&rdquo;, sostuvo la asesora legal.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p class="print-pages">Ver en la versi&oacute;n impresa las p&aacute;ginas: 7 A</p>
EOD;
$sidebar = <<<EOD
<div class="aside-div">[doap_box title="Estudio" box_color="#336699" class="aside-box"]<div class="aside-text">“Sin referentes claros, no se puede ser un buen padre. Hoy hay padres tan preocupados por hacerlo todo bien, que no saben actuar espontáneamente. Si les pedimos que actúen con naturalidad, nos preguntan qué libro les aconsejamos que lean. Nuestros padres sabían lo que tenían que hacer y, cuando metían la pata, no se dejaban dominar por la mala conciencia”, dice Gregorio Luri.<br />
<br />
Por el contrario, muchos padres modernos, hagan lo que hagan, se preguntan si no podrían haberlo hecho de otra manera. Nuestros hijos necesitan referentes claros; padres seguros y con convicciones diáfanas”.</div>[/doap_box]</div>
EOD;


//$str = mb_convert_encoding($str, "UTF-8", "ISO-8859-1");
$str = html_entity_decode($str,ENT_QUOTES,"UTF-8");



$line_breaks = array('</p>','<br>','<br />','</h1>','</h2>','</h3>','</h4>','</h5>','</div>');
foreach ($line_breaks as $line_break)
{
	$x = substr_count($str,$line_break);
	echo PHP_EOL . $line_break . ' = ' . $x;
	$break_count = $break_count + $x; 
}
$php_eol = substr_count($str,PHP_EOL);
echo PHP_EOL . 'PHP_EOL' . ' = ' . $php_eol;
echo PHP_EOL . $break_count . ' = ' . 'total line breaks';
if ($php_eol > $break_count)
{
$break_count = $php_eol - $break_count + $break_count;
}
echo PHP_EOL . $break_count . ' = ' . 'total line breaks after removing php_eol';
$alength = strlen($str);
$sblength = strlen($sidebar);
echo "\n\n\narticle length = $alength\n\n";
echo "\n\n\nsidebar length = $sblength\n\n";
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
			$pos[$line_break][] = $prev_pos; 
			$pos_type[$prev_pos][] = $line_break; 
			echo PHP_EOL . $new_pos . ' = ' . 'position of ' . $line_break;
			$ii++;
		}
	}
	print_r($pos);
	print_r($pos_type);
	$desired_entry_point = ((1 - (($sblength/$alength) +.1))/2);
	foreach ($pos_type as $position => $tag)
	{
		$posval = intval($position);
		echo PHP_EOL . 'posval = ' . $posval . PHP_EOL;
		$pos_calc = $posval/$alength;
		echo PHP_EOL . 'pos_calc = ' . $pos_calc . PHP_EOL;
		if ($pos_calc > $desired_entry_point)
		{
			echo PHP_EOL . $entry_point . PHP_EOL;
			break;
		}
		$entry_point = $posval;
	}
if (3 * ($sblength/$alength) > 1)
{
	echo PHP_EOL . 'sidebar goes on top' . PHP_EOL;
	$entry_point = $pos['</p>'][4];
}
echo PHP_EOL . $entry_point . PHP_EOL;
$first_half = substr($str,0,$entry_point);
$second_half = substr($str,$entry_point,$alength);







echo PHP_EOL . 'first_half' . PHP_EOL;
echo PHP_EOL . $first_half . PHP_EOL;
echo PHP_EOL . 'sidebar' . PHP_EOL;
echo PHP_EOL . $sidebar . PHP_EOL;
echo PHP_EOL . 'second_half' . PHP_EOL;
echo PHP_EOL . $second_half . PHP_EOL;
echo PHP_EOL . 'position of 5th paragraph = ' . $pos['</p>'][4] . PHP_EOL;
print_r($pos);
?>
