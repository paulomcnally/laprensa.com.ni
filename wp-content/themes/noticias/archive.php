<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Archive Template
 *
 *
 * @file           archive.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/responsive/archive.php
 * @link           http://codex.wordpress.org/Theme_Development#Archive_.28archive.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<?php include(STYLESHEETPATH . '/home-adblock.php'); ?>

<?php responsive_wrapper(); // before wrapper container hook ?>
        <div id="wrapper" class="clearfix">
<?php responsive_wrapper_top(); // before wrapper content hook ?>
<?php responsive_in_wrapper(); // wrapper hook ?>

<?php

//$orderdate = $_GET['fecha'];

 $monthnum = get_query_var('monthnum'); 
 $day_of_month = get_query_var('day'); 
 $_year = get_query_var('year'); 

//$orderdate = explode('-', $orderdate);

//$archive_month = $orderdate[0];
$archive_month = $monthnum;
//$archive_day   = $orderdate[1];
$archive_day   = $day_of_month;;
//$archive_year  = $orderdate[2];
$archive_year  = $_year;
?>

<div id="content-archive" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">
<div id="primary" class="site-content">
<?php
 $monthnum = get_query_var('monthnum'); $day_of_month = get_query_var('day'); $_year = get_query_var('year'); $archive_month = $monthnum; $archive_day = $day_of_month; $archive_year  = $_year;
$adate = $day_of_month.'-'.$monthnum.'-'.$_year;
$timestamp = strtotime($adate);
//echo $timestamp;
//echo $adate;
date_default_timezone_set("America/Managua");
//echo date_default_timezone_get();
ini_set('default_charset', 'utf-8');
header('Content-Type: text/html; charset=utf-8' );
$x = time();
$oldLocale = setlocale(LC_TIME, 'es_ES.UTF-8');
//echo "<div charset=utf-8 "."id=header-date".">".ucwords(strftime("%A %d %B %Y", $timestamp))."</div>";
$archive_date = ucwords(strftime("%A %d %B %Y", $timestamp));
setlocale(LC_TIME, $oldLocale);
echo do_shortcode('[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://www.laprensa.com.ni/'.$_year.'/'.$monthnum.'/'.$day_of_month.'" title="Use los botones de abajo para navegar por las categorías para este día en la historia."><div class="title-left">Edicion: '.$archive_date.'</div><div class="line-container"><div class="line"></div></div></a>[/doap_heading]');
?>
<style>
#content-archive { position:relative;margin-top:5px;}
</style>
<div id="content" role="main">
<div style="background-color:#e2e2e2;padding-left:4px;padding-top:4px;padding-right:0px;max-height:300px;margin-bottom:10px;padding-bottom:10px;">



<?php include(STYLESHEETPATH . '/edicion-buttons.php'); ?>
<div style="background-color:#e2e2e2;position:relative;left:5px;padding-left:4px;padding-top:4px;padding-right:0px;max-height:200px;overflow-y:scroll;max-width:97%;background-color:#fff;">
<div style="position:relative;float:right;margin-right:10px;top:-20px;width:50%">
</div>
<?php //include(STYLESHEETPATH . '/datepicker.php'); ?>
<?php
$args = array_merge( $wp_query->query_vars, array( 'posts_per_page' => 100 ));
add_filter('posts_clauses', 'filterEdiciones');
$the_query = new WP_Query( $args );
//:wvar_dump($the_query);
if( $the_query->have_posts() ) 
{
	//get_template_part( 'deportes-loop-header' ); 
	while( $the_query->have_posts() )
	{ 
		$the_query->the_post();
?>
<a href="<?php the_permalink(); ?>?archive_page=1" title="<?php the_title();?>"><?php the_title(); ?></a><br>


<?php
	}
}
?>
</p>
</div>
</div>
</div><!-- #content -->
</div><!-- #primary -->


<?php
//archive page slider here
//echo "Archive slider:"; 
//get_template_part('includes/slider');
?>


<div style="position:relative;float:right;margin-right:10px;top:-20px;width:50%">
<?php include(STYLESHEETPATH . '/datepicker.php'); ?>
</div>


<div style="width:100%;height:2px;"></div>
        <?php
wp_reset_query();
$args = array_merge( $wp_query->query_vars, array( 'posts_per_page' => 10 ));
add_filter('posts_clauses', 'filterEdiciones');
$the_query = new WP_Query( $args );
//var_dump($the_query);
if( $the_query->have_posts() ) 
{
                get_template_part( 'loop-header' );
                responsive_entry_before();
	//get_template_part( 'deportes-loop-header' ); 
	while( $the_query->have_posts() )
	{ 
		$the_query->the_post();
?>
                        <div style="width:100%;" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <?php responsive_entry_top(); ?>

                                <?php //get_template_part( 'post-meta' );
$extract_chars = 240;
include(STYLESHEETPATH . '/templates/cat-mini.php');
echo '</div><hr>';
/*
?>

                                <div class="post-entry">
                                        <?php
//                                      if(
if ( has_post_thumbnail() ) {

//the_post_thumbnail();
$feat_image_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'responsive-150' );
$post_url = get_permalink($post->ID);
$feat_image = $feat_image_array[0];
echo '<div style="max-width:150px;float:left;padding-left:10px;padding-right:10px;">' . PHP_EOL . '<a href="' . $post_url . '"><img src="' . $feat_image . '"></a>' . PHP_EOL;
echo '</div>';
}
 responsive_pro_get_option( 'search_post_excerpts' );
                                                add_filter( 'excerpt_more', 'responsive_pro_excerpt_more_text' );
                                                add_filter( 'excerpt_length', 'responsive_pro_excerpt_more_length' );
                                                the_excerpt();
                                                remove_filter( 'excerpt_more', 'responsive_pro_excerpt_more_text' );
                                                remove_filter( 'excerpt_length', 'responsive_pro_excerpt_more_length' );
                                        wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
                                </div>
                                <!-- end of .post-entry -->

                                <?php get_template_part( 'post-data' ); ?>

                                <?php responsive_entry_bottom(); ?>
                        </div><!-- end of #post-<?php the_ID(); ?> -->
                        <div><?php echo get_the_term_list( $post->ID, 'category', 'Categoría: ', ', ', '' ); ?></div>
                        <div><?php echo get_the_term_list( $post->ID, 'post_tag', 'Etiquetas: ', ', ', '' ); ?></div>
                        <?php responsive_entry_after(); ?>

                <?php
*/
	}
//                        responsive_entry_after(); 
echo '<div style="position:relative;float:left;">'; wpbeginner_numeric_posts_nav(); echo '</div>';
//              get_template_part( 'loop-nav' );
}
else
{
	get_template_part( 'loop-no-posts' );
}
?>





</div><!-- end of #content-archive -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
