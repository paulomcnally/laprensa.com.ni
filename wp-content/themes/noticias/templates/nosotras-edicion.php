
<?php
// Posts are found
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
?>

<?php $edicion = get_the_title(); ?>
<?php $portadalink = get_the_permalink(); ?>
<?php $edicion = '<div style="position:relative;float:left;font-family:StagBook;font-size:1.4em;line-height:1.2em;padding:2px;">Edición No.<br>&nbsp;'.str_replace("Edicion", "", $edicion).'</div>';
echo $edicion;
 ?>
<div style="position:relative;padding-top:4px;padding-right:6px;text-align:right;line-height:1.5em;font-size:1em;">
<a style="color:#fff;" href=<?php echo $portadalink; ?>>Portada</a><br>
<a style="color:#fff;" href=http://www.laprensa.com.ni/suplemento/nosotras/moda-nosotras>Moda</a><br>
</div>
<div style="position:relative;float:right;padding-right:6px;text-align:right;line-height:1.5em;font-size:1em;">
<a style="color:#fff;" href=http://www.laprensa.com.ni/suplemento/nosotras/editorial-nosotras>Editorial</a><br>
<a style="color:#fff;" href=http://www.laprensa.com.ni/suplemento/nosotras/belleza-nosotras>Belleza</a><br>
<a style="color:#fff;" href=http://www.laprensa.com.ni/suplemento/nosotras/sal-y-pimienta-nosotras>Sal y Pimienta</a><br>
<a style="color:#fff;" href=http://www.laprensa.com.ni/suplemento/nosotras/charla-nosotras>Charla</a><br>
<a style="color:#fff;" href=http://www.laprensa.com.ni/suplemento/nosotras/sexualidad-nosotras>Sexualidad</a><br>
<a style="color:#fff;" href=http://www.laprensa.com.ni/suplemento/nosotras/consulte-la-ginecologa>Consulte la ginecologa</a><br>
<a style="color:#fff;" href=http://www.laprensa.com.ni/suplemento/nosotras/salud-nosotras>Salud</a><br>
</div>

<?php
	}
}
// Posts not found
?>


