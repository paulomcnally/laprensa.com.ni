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
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/responsive/archive.php
 * @link           http://codex.wordpress.org/Theme_Development#Archive_.28archive.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<script type='text/javascript'>
/* home slots */
googletag.defineSlot('/11648707/Portada-Bottom-300x250px', [300, 250], 'div-gpt-ad-1403198971774-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-Top-728x90', [728, 90], 'div-gpt-ad-1403199951031-2').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-Top-270x90', [270, 90], 'div-gpt-ad-1403223429448-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-Top-300x250px', [300, 250], 'div-gpt-ad-1403198971774-1').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-Bottom-728x90', [728, 90], 'div-gpt-ad-1403199951031-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-Left-160x600', [160, 600], 'div-gpt-ad-1403200779714-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-Right-160x600', [160, 600], 'div-gpt-ad-1403200779714-1').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-Middle-728x90', [728, 90], 'div-gpt-ad-1403199951031-1').addService(googletag.pubads());
googletag.defineSlot('/11648707/120x600-Top', [120, 600], 'div-gpt-ad-1403371468819-0').addService(googletag.pubads());
/* botones 1-5 sidebar slots */
googletag.defineSlot('/11648707/Portada-boton-1-300x120', [300, 120], 'div-gpt-ad-1403222233029-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-2-300x120', [300, 120], 'div-gpt-ad-1403222233029-1').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-3-300x120', [300, 120], 'div-gpt-ad-1403222233029-2').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-4-300x120', [300, 120], 'div-gpt-ad-1403222233029-3').addService(googletag.pubads());
googletag.defineSlot('/11648707/Portada-boton-5-300x120', [300, 120], 'div-gpt-ad-1403222233029-4').addService(googletag.pubads());

googletag.pubads().enableSyncRendering();
googletag.pubads().enableSingleRequest();
googletag.enableServices();
</script>


<?php global  $wpdb; $user_id = get_current_user_id(); $qry = "SELECT identifier, websiteurl, email FROM `wp_2_wslusersprofiles` WHERE user_id = '$user_id' && provider = 'Google' && identifier IS NOT NULL && websiteurl = 'http://doap.com'"; $avalidgoogleid = $wpdb->get_results( $qry ); foreach ( $avalidgoogleid as $avalidgoogleid ) { $gid = $avalidgoogleid ->identifier; $uemail  = $avalidgoogleid ->email; $websiteurl = $avalidgoogleid ->websiteurl; }
 ?>

<?php
if ($gid > 10000000 )  {
        include(STYLESHEETPATH . '/page-wing-ads-loggedin.php');
        include(STYLESHEETPATH . '/backpages-top-loggedin.php');
} else {
        include(STYLESHEETPATH . '/page-wing-ads.php');
        include(STYLESHEETPATH . '/banner-ad-widget-search-270x90.php');
        include(STYLESHEETPATH . '/banner-ad-widget-search-728x90.php');
}

?>

<?php responsive_wrapper(); // before wrapper container hook ?>
        <div id="wrapper" class="clearfix">
<?php responsive_wrapper_top(); // before wrapper content hook ?>
<?php responsive_in_wrapper(); // wrapper hook ?>

<?php
if ( is_tag() ) {
$term_id = get_query_var('tag_id');
$taxonomy = 'post_tag';
$args ='include=' . $term_id;
$terms = get_terms( $taxonomy, $args );
//echo '<p> slug is ' . $terms[0]->slug . '</p>';

}
?>
 <?php $thetag = $terms[0]->slug; $the_clean_tag = ucwords(str_replace("-", " ", $thetag)); ?> 
<div id="content-archive" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">

<?php
echo do_shortcode('<a href="http://noticias.laprensa.com.ni/login"><div  class="title-left">RESULTADOS PARA ETIQUETA:  '.strtoupper($terms[0]->slug).'</div><div class="twodots"></div></a>');
?>

	<?php if( have_posts() ) : ?>

		<?php get_template_part( 'loop-header' ); ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php responsive_entry_before(); ?>
			<div  style="border:0px solid #fff; margin-right:5px;margin-top:5px;padding:2px;width:97%;position:relative;float:left;padding-right:15px;" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php $thepermalink = get_the_permalink(); echo do_shortcode('<div style="font-size:1.2em;font-weight:600"><a href="'.$thepermalink.'" style="font-family:StagSansBook;font-size:1.1em;font-weight:500;">'.ucfirst(get_the_title()).'</a></div>'); ?>

<div style="position:relative;float:left;padding-left:0px;padding-top:2px;padding-bottom:1px;"><i style="font-size:.9em;"><?php _e( 'Publicado ', 'su' ); ?>: <?php the_time( get_option( 'date_format' ) ); ?></i></div>
				
<div class="post-entry">

<?php if ( has_post_thumbnail() ) {

$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

$feat_image_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'responsive-150' );
$post_url = get_permalink($post->ID);
$feat_image = $feat_image_array[0];
echo '<div style="max-width:150px;float:left;padding-left:10px;padding-right:10px;position:relative;float:right;">' . PHP_EOL . '<a href="' . $post_url . '"><img src="' . $feat_image . '"></a>' . PHP_EOL;
echo '</div>';
} else { $thecategory = get_the_category(); $thecat = strtolower($thecategory[0]->cat_name); if ($thecat = "internacionales") { $thecat = "planeta"; }  ?>
<div style="float:right;"><img src="http://laprensa13.doap.us/wp-content/uploads/sites/2/2014/04/laprensanota-<?php echo $thecat; ?>.jpg" draggable="false"> </div><?php } ?>
					
<div id="cat-tax">
<?php $taxonomies = get_object_taxonomies( get_post_type(), 'objects' );
foreach( $taxonomies as $id => $taxonomy ) :
$terms_list = get_the_term_list( 0, $id, '', ', ' );
echo "<br>";
if ( strlen( $terms_list ) > 0 ) : ?>
<span class="tcp-product-taxonomy tcp-product-taxonomy-<?php echo $taxonomy->name;?>"><?php echo $taxonomy->labels->singular_name; ?>:
<?php echo $terms_list;?>
</span>
<?php endif; endforeach;?></div>
<?php the_excerpt(); ?>
</div>
				<!-- end of .post-entry -->

				<?php responsive_entry_bottom(); ?>
			</div>
<hr width="70%">
			<?php responsive_entry_after(); ?>
		<?php endwhile; ?>
<?php echo '<div style="position:relative;float:left;">'; wpbeginner_numeric_posts_nav(); echo '</div>';

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>

</div><!-- end of #content-archive -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
