<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Single Posts Template
 *
 *
 * @file           single.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/single.php
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<?php include(STYLESHEETPATH . '/single-adblock.php'); ?>

<?php
global  $wpdb; $user_id = get_current_user_id(); $qry = "SELECT identifier, websiteurl, email FROM `wp_2_wslusersprofiles` WHERE user_id = '$user_id' && provider = 'Google' && identifier IS NOT NULL && websiteurl = 'http://doap.com'"; $avalidgoogleid = $wpdb->get_results( $qry ); foreach ( $avalidgoogleid as $avalidgoogleid ) { $gid = $avalidgoogleid ->identifier; $uemail  = $avalidgoogleid ->email; $websiteurl = $avalidgoogleid ->websiteurl; }
?>

<?php

$category = get_the_category();   //echo "<h1>".$category[0]->cat_name."</h1>";
?>

<?php
$taxonomy = 'category';

// get the term IDs assigned to post.
$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
// separator between links
$separator = ', ';

if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {

	$term_ids = implode( ',' , $post_terms );
	$terms = wp_list_categories( 'title_li=&style=none&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids );
	$terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );

	// display post categories

	$term = str_replace("Destacados", "", $terms);
	$term = str_replace(",", "", $term);
	//echo  $term;
}
?>




<?php 
if ($gid > 10000000 )  {
        include(STYLESHEETPATH . '/page-wing-ads-loggedin.php');
        include(STYLESHEETPATH . '/backpages-top-loggedin.php');
} else {

if ( in_category( 'nacionales' ) ) { include(STYLESHEETPATH . '/page-wing-ads-nacionales.php'); }
else if ( in_category( 'deportes' ) ) { include(STYLESHEETPATH . '/page-wing-ads-deportes.php'); }
else if ( in_category( 'internacionales' ) ) { include(STYLESHEETPATH . '/page-wing-ads-internacionales.php'); }
else if ( in_category( 'economia' ) ) { include(STYLESHEETPATH . '/page-wing-ads-economia.php'); }
else if ( in_category( 'politica' ) ) { include(STYLESHEETPATH . '/page-wing-ads-politica.php'); }
else if ( in_category( 'espectaculo' ) ) { include(STYLESHEETPATH . '/page-wing-ads-espectaculo.php'); }
else if ( in_category( 'salud' ) ) { include(STYLESHEETPATH . '/page-wing-ads-salud.php'); }
else if ( in_category( 'departamentales' ) ) { include(STYLESHEETPATH . '/page-wing-ads-departamentales.php'); }
else if ( in_category( 'tecnologia' ) ) { include(STYLESHEETPATH . '/page-wing-ads-tecnologia.php'); }
else if ( in_category( 'ciencia' ) ) { include(STYLESHEETPATH . '/page-wing-ads-ciencia.php'); }
else if ( in_category( 'opinion' ) ) { include(STYLESHEETPATH . '/page-wing-ads-opinion.php'); }
else if ( in_category( 'nosotras' ) ) { include(STYLESHEETPATH . '/page-wing-ads-nosotras.php'); }
else if ( in_category( 'Aquí Entre Nos' ) ) { include(STYLESHEETPATH . '/page-wing-ads-aqui-entre-nos.php'); }
else if ( in_category( 'la prensa domingo' ) ) { include(STYLESHEETPATH . '/page-wing-ads-la-prensa-domingo.php'); }
else if ( in_category( 'la-prensa-domingo' ) ) { include(STYLESHEETPATH . '/page-wing-ads-la-prensa-domingo.php'); }
else if ( in_category( 'empresariales' ) ) { include(STYLESHEETPATH . '/page-wing-ads-empresariales.php'); }
else if ( in_category( 'promociones' ) ) { include(STYLESHEETPATH . '/page-wing-ads-promociones.php'); }
else if ( in_category( 'productos' ) ) { include(STYLESHEETPATH . '/page-wing-ads-productos.php'); }
else if ( in_category( 'contactanos' ) ) { include(STYLESHEETPATH . '/page-wing-ads-contactanos.php');
} else { include(STYLESHEETPATH . '/page-wing-ads.php'); }

        //include(STYLESHEETPATH . '/page-wing-ads.php');
        
if ( in_category( 'nacionales' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-nacionales.php'); }
else if ( in_category( 'deportes' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-deportes.php'); }
else if ( in_category( 'internacionales' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-internacionales.php'); }
else if ( in_category( 'economia' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-economia.php'); }
else if ( in_category( 'politica' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-politica.php'); }
else if ( in_category( 'espectaculo' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-espectaculo.php'); }
else if ( in_category( 'salud' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-salud.php'); }
else if ( in_category( 'departamentales' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-departamentales.php'); }
else if ( in_category( 'tecnologia' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-tecnologia.php'); }
else if ( in_category( 'ciencia' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-ciencia.php'); }
else if ( in_category( 'opinion' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-opinion.php'); }
else if ( in_category( 'nosotras' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-nosotras.php'); }
else if ( in_category( 'aqui-entre-nos' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-aqui-entre-nos.php'); }
else if ( in_category( 'la-prensa-domingo' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-la-prensa-domingo.php'); }
else if ( in_category( 'empresariales' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-empresariales.php'); }
else if ( in_category( 'promociones' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-promociones.php'); }
else if ( in_category( 'productos' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-productos.php'); }
else if ( in_category( 'caricaturas' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-caricaturas.php'); }
else if ( in_category( 'cartelera-de-cine' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-caricaturas.php'); }
else if ( in_category( 'contactenos' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-contactenos.php'); }
else if ( in_category( 'contactanos-en-redaccion' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-contactenos.php'); }
else {
                include(STYLESHEETPATH . '/banner-ad-widget-728x90.php');
}


if ( in_category( 'nacionales' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-nacionales.php'); }
else if ( in_category( 'deportes' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-deportes-270x90.php'); }
else if ( in_category( 'internacionales' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-internacionales.php'); }
else if ( in_category( 'economia' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-economia.php'); }
else if ( in_category( 'politica' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-politica.php'); }
else if ( in_category( 'espectaculo' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-espectaculo.php'); }
else if ( in_category( 'salud' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-salud.php'); }
else if ( in_category( 'departamentales' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-departamentales.php'); }
else if ( in_category( 'tecnologia' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-tecnologia.php'); }
else if ( in_category( 'ciencia' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-ciencia.php'); }
else if ( in_category( 'opinion' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-opinion.php'); }
else if ( in_category( 'nosotras' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-nosotras.php'); }
else if ( in_category( 'Aquí Entre Nos' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-aqui-entre-nos.php'); }
else if ( in_category( 'la-prensa-domingo' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-la-prensa-domingo.php'); }
else if ( in_category( 'empresariales' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-empresariales.php'); }
else if ( in_category( 'promociones' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-promociones.php'); }
else if ( in_category( 'productos' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-productos.php'); }
else if ( in_category( 'caricaturas' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-caricaturas.php'); }
else if ( in_category( 'cartelera-de-cine' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-caricaturas.php'); }
else if ( in_category( 'contactenos' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-contactenos.php'); }
else if ( in_category( 'contactanos-en-redaccion' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-270x90-contactenos.php'); }
else {
                include(STYLESHEETPATH . '/banner-ad-widget-270x90.php');
} 

}

?>

<?php responsive_wrapper(); // before wrapper container hook ?>
        <div id="wrapper" class="clearfix">
<?php responsive_wrapper_top(); // before wrapper content hook ?>
<?php responsive_in_wrapper(); // wrapper hook ?>

<?php 
//$row['eventtime'] = time();
//$oldLocale = setlocale(LC_TIME, 'es_ES'); 
//echo "<div>".strftime("%a %d %b %y", $row['eventtime'])."</div>";
//setlocale(LC_TIME, $oldLocale);
?>

<div id="content" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">

<?php 
if ($category[0]->cat_ID == 26704 | $category[0]->cat_ID == 35752)
{
	if ($category[0]->cat_ID == 26704 && $category[1]->cat_ID == 35752)
        {
		$themaincat = $category[2]->cat_ID;
	        $single_cat_title = $category[2]->cat_name;
		$single_cat_slug = $category[2]->slug;
	}
	else
	{
		$themaincat = $category[1]->cat_ID;
	        $single_cat_title = $category[1]->cat_name;
		$single_cat_slug = $category[1]->slug;
	}
}
else
{
        $themaincat = $category[0]->cat_ID;
        $single_cat_title = $category[0]->cat_name;
	$single_cat_slug = $category[0]->slug;
}
//$category = get_the_category();
//$themaincat = $category[0]->cat_ID;
//$single_cat_title = str_replace(" ","-",$category[0]->cat_name);
//$single_cat_title = str_replace(" ","-",$single_cat_title);


 $monthnum = get_query_var('monthnum'); $day_of_month = get_query_var('day'); $_year = get_query_var('year'); $archive_month = $monthnum; $archive_day = $day_of_month; $archive_year  = $_year;
$adate = $day_of_month.'-'.$monthnum.'-'.$_year;
$timestamp = strtotime($adate);
//echo $timestamp;

date_default_timezone_set("America/Managua");
//echo date_default_timezone_get();
ini_set('default_charset', 'utf-8');
header('Content-Type: text/html; charset=utf-8' );
$x = time();
$oldLocale = setlocale(LC_TIME, 'es_ES.UTF-8');
//echo "<div charset=utf-8 "."id=header-date".">".ucwords(strftime("%A %d %B %Y", $timestamp))."</div>";
$archive_date = ucwords(strftime("%A %d %B %Y", $timestamp));
setlocale(LC_TIME, $oldLocale);



if ( $_GET['archive_page'] == 1) {
echo do_shortcode('[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://www.laprensa.com.ni/'.$_year.'/'.$monthnum.'/'.$day_of_month.'/'.$single_cat_slug.'/?archive_page=1" title="Use los botones de abajo para navegar por las categorías para este día en la historia."><div class="title-left">'.str_replace("-"," ",mb_strtoupper($single_cat_title)).': '.$archive_date.'</div><div class="line-container"><div class="line"></div></div></a>[/doap_heading]');
} else {
echo do_shortcode('[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://www.laprensa.com.ni/'.$single_cat_slug.'"><div class="title-left">'.str_replace("-"," ",mb_strtoupper($single_cat_title)).'</div><div class="line-container"><div class="line"></div></div></a>[/doap_heading]');
}

//include(STYLESHEETPATH . '/edicion-buttons.php');
include(STYLESHEETPATH . '/edicion-code.php');

?>

<?php //echo do_shortcode('<div style="width:100%;height:40px;position:relative;align:right;float:right;border:1px solid #fff;padding:0px;margin:0px;"><div style="width:450px;float:right;">[hupso]</div></div>'); ?>
<?php get_template_part( 'loop-header' );  ?>

	<?php if( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>

				<?php get_template_part( 'post-meta' ); ?>

				<div class="post-entry">
					<?php 
$video_thumb = get_post_meta( $post->ID, '_video_thumbnail', true );
$lptv = get_post_meta( $post->ID, 'lptv_post', true );
if ($single_cat_slug== 'lptv' || $lptv)
{
	$lptv_post = 1;
}
// if ( has_post_thumbnail() && !$lptv) {
 if ( has_post_thumbnail() && !$lptv_post ) {
?>
<?php
//$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

//$feat_image_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'responsive-450' );
//$post_url = get_permalink($post->ID);
//$feat_image = $feat_image_array[0];
//echo '' . PHP_EOL . '<img src="' . $feat_image . '">' . PHP_EOL;
//echo '<hr>';
responsive_pro_featured_image();
//echo "video thumb = $video_thumb    lptv = $lptv    single_cat_title = $single_cat_title    lptv_post = $lptv_post";
//echo '<div style="clear:both;"></div>';
//echo '<hr>';
}
else
{
//echo "video thumb = $video_thumb    lptv = $lptv    single_cat_title = $single_cat_title    lptv_post = $lptv_post";
}
$intro_meta = get_post_meta( get_the_ID(), 'intro', true );
if ($intro_meta)
{
        $lines = explode("\n", $intro_meta);
        foreach ($lines as $line)
        {
                $intro .= '<li>' . $line . '</li>';
        }
        $intro = '<ul class="intro">' . $intro . '</ul>';
}
else
{
        $intro = '';
}
echo $intro . PHP_EOL;
 ?>





					<?php the_content( __( 'Leer mas &#8250;', 'responsive' ) ); ?>

					<?php if( get_the_author_meta( 'description' ) != '' ) : ?>

						<div id="author-meta">
							<?php if( function_exists( 'get_avatar' ) ) {
								echo get_avatar( get_the_author_meta( 'email' ), '80' );
							} ?>
							<div class="about-author"><?php _e( 'About', 'responsive' ); ?> <?php the_author_posts_link(); ?></div>
							<p><?php the_author_meta( 'description' ) ?></p>
						</div><!-- end of #author-meta -->

					<?php endif; // no description, no author's meta ?>

					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div>
				<!-- end of .post-entry -->
				<?php get_template_part( 'post-data-single' ); ?>



<?php 
/*
if ($gid > 10000000)  { include(STYLESHEETPATH . '/middle-300x250-loggedin.php'); } else {

$category = get_the_category(); 
//echo $category[0]->cat_name;

	if ( in_category( 'nacionales' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-nacionales.php'); }
	else if ( in_category( 'deportes' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-deportes.php'); }
	else if ( in_category( 'internacionales' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-internacionales.php'); }
	else if ( in_category( 'economia' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-economia.php'); }
	else if ( in_category( 'politica' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-politica.php'); }
	else if ( in_category( 'economia' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-economia.php'); }
	else if ( in_category( 'espectaculo' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-espectaculo.php'); }
	else if ( in_category( 'salud' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-salud.php'); }
	else if ( in_category( 'departamentales' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-departamentales.php'); }
	else if ( in_category( 'tecnologia' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-tecnologia.php'); }
	else if ( in_category( 'ciencia' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-ciencia.php'); }
	else if ( in_category( 'opinion' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-opinion.php'); }
	else if ( in_category( 'nosotras' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-nosotras.php'); }
	else if ( in_category( 'Aquí Entre Nos' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-aqui-entre-nos.php'); }
	else if ( in_category( 'la-prensa-domingo' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-la-prensa-domingo.php'); }
	else if ( in_category( 'empresariales' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-empresariales.php'); }
	else if ( in_category( 'promociones' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-promociones.php'); }
	else if ( in_category( 'productos' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-productos.php'); }
	else if ( in_category( 'cartelera-de-cine' ) ) { //include(STYLESHEETPATH . '/ad-300x250-top-cartelera-de-cine.php'); }
	else if ( in_category( 'contactanos' ) ) { include(STYLESHEETPATH . '/ad-300x250-top-contactanos.php'); }
	else {
        include(STYLESHEETPATH . '/ad-300x250-top-none.php');
	} 

//include(STYLESHEETPATH . '/ad-300x250-category-page-center.php'); echo ""; 
}
*/
?>





				<div class="navigation">
					<div class="previous"><?php previous_post_link( '&#8249; %link' ); ?></div>
					<div class="next"><?php next_post_link( '%link &#8250;' ); ?></div>
				</div>
				<!-- end of .navigation -->
				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>


<?php echo do_shortcode('[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<div class="title-left">COMENTARIOS</div><div class="line-container"><div class="line"></div></div>[/doap_heading]'); ?>

			<?php responsive_comments_before(); ?>
			<?php comments_template( '', true ); ?>
			<?php responsive_comments_after(); ?>

		<?php
		endwhile;
//echo '<div style="position:relative;float:left;">'; wpbeginner_numeric_posts_nav(); echo '</div>';
	get_template_part( 'loop-nav' );

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>

<?php 
//echo do_shortcode('[doap_spacer size="20"]'); 
//echo do_shortcode('[xyz-ips snippet="single-page-tag-cloud"]'); 
?>

</div><!-- end of #content -->

<?php get_sidebar('single'); ?>
<?php echo do_shortcode('[doap_divider text="Volver a la parte superior de la página"]'); ?>

<?php 
echo '<div style="width:100%;border:0px solid #fff;height:90px;margin:0 auto;">';
if ($gid > 10000000)  { 
	include(STYLESHEETPATH . '/bottom-ads-loggedin.php'); 
} else { 
if ( in_category( 'nacionales' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-single-bottom-728x90-nacionales.php'); }
else if ( in_category( 'deportes' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-bottom-728x90-deportes.php'); }
else if ( in_category( 'internacionales' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-internacionales.php'); }
else if ( in_category( 'economia' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-economia.php'); }
else if ( in_category( 'politica' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-politica.php'); }
else if ( in_category( 'espectaculo' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-espectaculo.php'); }
else if ( in_category( 'salud' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-salud.php'); }
else if ( in_category( 'departamentales' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-departamentales.php'); }
else if ( in_category( 'tecnologia' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-tecnologia.php'); }
else if ( in_category( 'ciencia' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-ciencia.php'); }
else if ( in_category( 'opinion' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-opinion.php'); }
else if ( in_category( 'nosotras' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-nosotras.php'); }
else if ( in_category( 'aqui entre nos' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-aqui-entre-nos.php'); }
else if ( in_category( 'aqui-entre-nos' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-aqui-entre-nos.php'); }
else if ( in_category( 'la prensa domingo' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-la-prensa-domingo.php'); }
else if ( in_category( 'la-prensa-domingo' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-la-prensa-domingo.php'); }
else if ( in_category( 'empresariales' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-empresariales.php'); }
else if ( in_category( 'promociones' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-promociones.php'); }
else if ( in_category( 'productos' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-productos.php'); }
else if ( in_category( 'contactanos' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-contactanos.php'); }
else if ( in_category( 'contactanos-en-redaccion' ) ) { include(STYLESHEETPATH . '/banner-ad-widget-728x90-contactanos.php'); }
else {
//	include(STYLESHEETPATH . '/banner-ad-widget-single-bottom-728x90.php'); echo ""; 
}
	include(STYLESHEETPATH . '/banner-ad-widget-single-bottom-728x90.php'); echo ""; 
} 

echo "</div>";
?>


<?php get_footer(); ?>
<style>
#exampleHTMLToPage_b { float:right;left:-10px; }
</style>
