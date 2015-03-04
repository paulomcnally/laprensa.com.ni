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

get_header();
/**
 * Include Ads Slot Definition
 */
$category = get_the_category();
$category_has_custom_ads = array(
    "nacionales",
    "deportes",
    "internacionales",
    "economia",
    "politica",
    "espectaculo",
    "salud",
    "departamentales",
    "tecnologia",
    "ciencia",
    "opinion",
    "nosotras",
    "aqui-entre-nos",
    "la-prensa-domingo",
    "empresariales",
    "promociones",
    "productos",
    "contactanos"
);
$category_name= "";
if($category){
    foreach($category as $category_item) {
        $category_index = array_search($category_item->slug, $category_has_custom_ads);
        if($category_index !== false){
            $category_name = $category_item->slug;
            break;
        }
    }
}
include(STYLESHEETPATH . '/single-adblock.php');

global  $wpdb; 
$user_id = get_current_user_id(); 
$qry = "SELECT identifier, websiteurl, email FROM `wp_2_wslusersprofiles` WHERE user_id = '$user_id' && provider = 'Google' && identifier IS NOT NULL && websiteurl = 'http://doap.com'"; 
$avalidgoogleid = $wpdb->get_results( $qry ); 
foreach ( $avalidgoogleid as $avalidgoogleid ) { 
    $gid = $avalidgoogleid ->identifier; 
    $uemail  = $avalidgoogleid ->email; 
    $websiteurl = $avalidgoogleid ->websiteurl; 
}



/**
 * Generate category list links
 */
$taxonomy = 'category';
$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
$separator = ', ';
if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {
    $term_ids = implode( ',' , $post_terms );
    $terms = wp_list_categories( 'title_li=&style=none&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids );
    $terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );
    $term = str_replace("Destacados", "", $terms);
    $term = str_replace(",", "", $term);
}

if ($gid > 10000000 )  {
    include(STYLESHEETPATH . '/page-wing-ads-loggedin.php');
    include(STYLESHEETPATH . '/backpages-top-loggedin.php');
} else {
    // FIXME: use file_exists on this condition
    if($category_name !== ""){
        include(STYLESHEETPATH . '/page-wing-ads-'. $category_name .'.php');
        include(STYLESHEETPATH . '/banner-ad-widget-728x90-'. $category_name .'.php');
        // FIXME: Use named convention
        // include(STYLESHEETPATH . '/banner-ad-widget-'. $category_name .'-top-left-728x90.php');
        include(STYLESHEETPATH . '/banner-ad-widget-270x90-'. $category_name .'.php');
        // FIXME: Use named convention
        // include(STYLESHEETPATH . '/banner-ad-widget-'. $category_name .'-top-right-270x90.php');
    } 
    else { 
        include(STYLESHEETPATH . '/page-wing-ads.php'); 
        // FIXME: Use named convention
        // include(STYLESHEETPATH . '/banner-ad-widget-top-left-728x90.php');
        // include(STYLESHEETPATH . '/banner-ad-widget-top-right-270x90.php');
        include(STYLESHEETPATH . '/banner-ad-widget-728x90.php');
        include(STYLESHEETPATH . '/banner-ad-widget-270x90.php');
    }
}
?>

<?php responsive_wrapper(); // before wrapper container hook
// FIXME: The wrapper declaration should be in the header.php not here
?>
<div id="wrapper" class="clearfix">
<?php responsive_wrapper_top(); // before wrapper content hook ?>
<?php responsive_in_wrapper(); // wrapper hook ?>
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

$monthnum = get_query_var('monthnum'); $day_of_month = get_query_var('day'); $_year = get_query_var('year'); $archive_month = $monthnum; $archive_day = $day_of_month; $archive_year  = $_year;
$adate = $day_of_month.'-'.$monthnum.'-'.$_year;
$timestamp = strtotime($adate);

date_default_timezone_set("America/Managua");
ini_set('default_charset', 'utf-8');
header('Content-Type: text/html; charset=utf-8' );
$x = time();
$oldLocale = setlocale(LC_TIME, 'es_ES.UTF-8');
$archive_date = ucwords(strftime("%A %d %B %Y", $timestamp));
setlocale(LC_TIME, $oldLocale);

if ( $_GET['archive_page'] == 1) {
    echo do_shortcode('[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://www.laprensa.com.ni/'.$_year.'/'.$monthnum.'/'.$day_of_month.'/'.$single_cat_slug.'/?archive_page=1" title="Use los botones de abajo para navegar por las categorías para este día en la historia."><div class="title-left">'.str_replace("-"," ",mb_strtoupper($single_cat_title)).': '.$archive_date.'</div><div class="line-container"><div class="line"></div></div></a>[/doap_heading]');
} else {
    echo do_shortcode('[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://www.laprensa.com.ni/'.$single_cat_slug.'"><div class="title-left">'.str_replace("-"," ",mb_strtoupper($single_cat_title)).'</div><div class="line-container"><div class="line"></div></div></a>[/doap_heading]');
}

include(STYLESHEETPATH . '/edicion-code.php');
?>

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
                    if ( has_post_thumbnail() && !$lptv_post ) {
                        responsive_pro_featured_image();
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
                    <div class="about-author">
                        <?php _e( 'About', 'responsive' ); ?> <?php the_author_posts_link(); ?></div>
                        <p><?php the_author_meta( 'description' ) ?></p>
                    </div><!-- end of #author-meta -->
                <?php endif; // no description, no author's meta ?>

                <?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
            </div>
            <!-- end of .post-entry -->
            <?php get_template_part( 'post-data-single' ); ?>

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

    <?php endwhile; ?>
<?php
    get_template_part( 'loop-nav' );
else :
    get_template_part( 'loop-no-posts' );
endif;
?>
</div><!-- end of #content -->

<?php get_sidebar('single'); ?>
<?php echo do_shortcode('[doap_divider text="Volver a la parte superior de la página"]'); ?>

<div style="width:100%;border:0px solid #fff;height:90px;margin:0 auto;">
<?php 
if ($gid > 10000000)  { 
    include(STYLESHEETPATH . '/bottom-ads-loggedin.php'); 
} else { 
    if($category_name !== ""){
        include(STYLESHEETPATH . '/banner-ad-widget-'. $category_name .'-bottom-center-970x90.php');
    } 
    else { 
        include(STYLESHEETPATH . '/banner-ad-widget-bottom-center-728x90.php');
    }
}
?>
</div>

<?php get_footer(); ?>
<style>
    #exampleHTMLToPage_b { float:right;left:-10px; }
</style>
