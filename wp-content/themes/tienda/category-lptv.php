<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Deportes Template
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

get_header('lptv'); ?>

<?php include(STYLESHEETPATH . '/lptv-adblock.php'); ?>

<?php

if (isset($_GET['the_id'])) {
   $_SESSION['ses_id'] = $_GET['the_id'];
}
?>


<?php $thetag = "test"; //$cat_string = single_tag_title('Categoría: '); ?> 
<?php //include('/var/www/html/lpmu/wp-content/themes/noticias' . '/banner-ad-widget.php'); ?>
<div style="clear:both;"></div>
<div id="lptv-main-box"><iframe id="homepage-autoplay" width="995" height="485" src="//www.youtube.com/embed/videoseries?list=PLLSDIHSJqOp3qfRVJLgaksJyQC4YM9FGD&showinfo=0&autohide=no&autoplay=0" frameborder="0" allowfullscreen></iframe></div>  
<div style="clear:both;"></div>
<div style="width:100%;" id="content-archive" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">
<div style="clear:both;"></div>

<?php //echo do_shortcode('[doap_spacer size="73"]'); ?>

 <?php /* <iframe src=https://s3-us-west-2.amazonaws.com/s3.laprensa.com.ni/home/nadia/animavideo/index.html height=120 width=450></iframe> */  ?>

<div style="width:100%;">

<div style="position:relative;float:right;padding-right:30px;">
<?php //echo do_shortcode('[xyz-ips snippet="date-widget"]'); ?>
</div>



<?php echo do_shortcode('


[doap_tabs style="modern-light" class="product-library"]

[doap_tabs class="my-lptv-tabs"]
  [doap_tab title="^"] [/doap_tab]
  [doap_tab title="Mas Vistos "][doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://noticias.laprensa.com.ni/lptv"><div class="title-left">MAS VISTOS</div><div class="twodots"></div></a>[/doap_heading][doap_posts template="templates/box-loop-videos3.php" tax_term="19" tax_operator="0" author="1,102,108,113,114,116,117,103,111,118,112,110,107,115,120,106,104,105,119,109" order="desc" orderby="comment_count" post_parent=" " ignore_sticky_posts="no"]
<div class="home-728x90" style="margin-left:75px;">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-6970273280466483";
/* nica-728x90banner */
google_ad_slot = "4717436669";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div> [/doap_tab]
  	
	[doap_tab title="Activos"] 
	[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]
			<a href="https://www.youtube.com/playlist?list=PLLSDIHSJqOp3-RnU0WJrV_TM3e_ftKzqg"><div class="title-left">ACTIVOS</div><div class="twodots"></div></a>
	[/doap_heading] 
	<iframe width="853" height="480" src="//www.youtube.com/embed/videoseries?list=PLLSDIHSJqOp3-RnU0WJrV_TM3e_ftKzqg" frameborder="0" allowfullscreen></iframe>
	[/doap_tab]


  	[doap_tab title="Ambitos"] 
	[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]
			<a href="https://www.youtube.com/playlist?list=PLLSDIHSJqOp3LKyU4LTqa5M29E6qIASl1"><div class="title-left">AMBITOS</div><div class="twodots"></div></a>
	[/doap_heading] 
	<iframe width="853" height="480" src="//www.youtube.com/embed/videoseries?list=PLLSDIHSJqOp3LKyU4LTqa5M29E6qIASl1" frameborder="0" allowfullscreen></iframe>
	[/doap_tab]
  	
	[doap_tab title="Departamentales"] 
	[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]
			<a href="https://www.youtube.com/playlist?list=PLLSDIHSJqOp2lxsZEt3ygHPZhFlSrstcA"><div class="title-left">DEPARTAMENTALES</div><div class="twodots"></div></a>
	[/doap_heading] 
	<iframe width="853" height="480" src="//www.youtube.com/embed/videoseries?list=PLLSDIHSJqOp2lxsZEt3ygHPZhFlSrstcA" frameborder="0" allowfullscreen></iframe>
	[/doap_tab]

	[doap_tab title="Editorial"] 
	[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]
			<a href="https://www.youtube.com/playlist?list=PLLSDIHSJqOp06_HluZqmJNopcxe9IRwkP"><div class="title-left">EDITORIAL</div><div class="twodots"></div></a>
	[/doap_heading] 
	<iframe width="853" height="480" src="//www.youtube.com/embed/videoseries?list=PLLSDIHSJqOp06_HluZqmJNopcxe9IRwkP" frameborder="0" allowfullscreen></iframe>
	[/doap_tab]

	[doap_tab title="Internacionales"] 
	[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]
			<a href="https://www.youtube.com/playlist?list=PLLSDIHSJqOp38y3BtXOFfCPXNgDldZWxr"><div class="title-left">INTERNACIONALES</div><div class="twodots"></div></a>
	[/doap_heading] 
	<iframe width="853" height="480" src="//www.youtube.com/embed/videoseries?list=PLLSDIHSJqOp38y3BtXOFfCPXNgDldZWxr" frameborder="0" allowfullscreen></iframe>
	[/doap_tab]

	[doap_tab title="Deportes"] 
	[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]
			<a href="https://www.youtube.com/playlist?list=PLLSDIHSJqOp3ZHxN1xafQ6iOXgxP5qgGS"><div class="title-left">DEPORTES</div><div class="twodots"></div></a>
	[/doap_heading] 
	<iframe width="853" height="480" src="//www.youtube.com/embed/videoseries?list=PLLSDIHSJqOp3ZHxN1xafQ6iOXgxP5qgGS" frameborder="0" allowfullscreen></iframe>
	[/doap_tab]

	[doap_tab title="Politica"] 
	[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]
			<a href="https://www.youtube.com/playlist?list=PLLSDIHSJqOp0BCVjr5OwTcS_YUDbSQXgU"><div class="title-left">POLITICA</div><div class="twodots"></div></a>
	[/doap_heading] 
	<iframe width="853" height="480" src="//www.youtube.com/embed/videoseries?list=PLLSDIHSJqOp0BCVjr5OwTcS_YUDbSQXgU" frameborder="0" allowfullscreen></iframe>
	[/doap_tab]

	[doap_tab title="Vida"] 
	[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]
			<a href="https://www.youtube.com/playlist?list=PLLSDIHSJqOp206h7C2U1k_bClIZeuaEev"><div class="title-left">Vida</div><div class="twodots"></div></a>
	[/doap_heading] 
	<iframe width="853" height="480" src="//www.youtube.com/embed/videoseries?list=PLLSDIHSJqOp206h7C2U1k_bClIZeuaEev" frameborder="0" allowfullscreen></iframe>
	[/doap_tab]


[/doap_tabs]

<!--
  IMPORTANT
  You need to add this CSS code to the custom CSS editor at plugin settings page
-->
<style>
  .su-tabs.my-lptv-tabs { background-color: #f5f5f5; }
  .su-tabs.my-lptv-tabs .su-tabs-nav span { font-size: 1.3em }
  .su-tabs.my-lptv-tabs .su-tabs-nav span.su-tabs-current { background-color: #369 }
  .su-tabs.my-lptv-tabs .su-tabs-pane {
    padding: 1em;
    font-size: 1.3em;
    background-color: #f5f5f5;
  }
</style>
'); ?>

<?php 
echo do_shortcode('[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://noticias.laprensa.com.ni/lptv"><div class="title-left">VIDEOS DEL DIA</div><div class="twodots"></div></a>[/doap_heading]'); 
?>



<?php echo do_shortcode('<div style="position:relative;left:0px;">[doap_posts template="templates/box-loop-videos2.php" tax_term="19" posts_per_page="6" tax_operator="0" author="1,102,108,113,114,116,117,103,111,118,112,110,107,115,120,106,104,105,119,109" order="desc" orderby="date" post_parent=" " ignore_sticky_posts="no"]</div>'); ?>



<?php
echo do_shortcode('<hr>[doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://noticias.laprensa.com.ni/lptv"><div class="title-left">VIDEOS DESTACADOS</div><div class="twodots"></div></a>[/doap_heading]');
?>

	<?php 
  if( have_posts() ) : ?>

		<?php //get_template_part( 'loop-header' ); ?>

		                <?php $i = 1; while (have_posts() && $i < 7) : the_post(); ?>


			<?php responsive_entry_before(); ?>
			<div  id=lptvbox class=lptv-box-class id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php responsive_entry_top(); ?>

        <?php 	
		$theexcerpt = get_the_excerpt(); 
		$thepermalink = get_the_permalink(); 
	?>


				<div class="post-entry">
<?php $gmt_timestamp = get_post_time('U', true); ?>

<?php if ( has_post_thumbnail() ) {

$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

$feat_image_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'responsive-300' );
$post_url = get_permalink($post->ID);
$feat_image = $feat_image_array[0];
echo '<div id=lptv-image class=lptv-image-box>' . PHP_EOL . '<a href="' . $post_url . '"><img src="' . $feat_image . '"></a>' . PHP_EOL;
echo '</div>';

} else { ?>
<div style="width:280px;"><img src="http://laprensa13.doap.us/wp-content/uploads/sites/2/2014/04/laprensanota.jpg" draggable="false"> </div><?php } ?> 
					<?php
					//responsive_pro_featured_image();

					if( responsive_pro_get_option( 'archive_post_excerpts' ) ) {
						add_filter( 'excerpt_more', 'responsive_pro_excerpt_more_text' );
						add_filter( 'excerpt_length', 'responsive_pro_excerpt_more_length' );
						echo "<div style=max-width:98%;float:left;position:relative;>";
                                                $the_excerpt = get_the_excerpt(); //echo $the_excerpt;
//	echo do_shortcode('<a href="' . $thepermalink . '" title="Leer mas"><div id="lptv-note-titles">doap_animate type="fadeIn"]<h4>'.ucfirst(get_the_title()).'</h4>[/doap_animate]</div></a>'); 
                                        echo "</div>";
						remove_filter( 'excerpt_more', 'responsive_pro_excerpt_more_text' );
						remove_filter( 'excerpt_length', 'responsive_pro_excerpt_more_length' );
					}
					else {
						add_filter( 'excerpt_more', 'responsive_pro_excerpt_more_text' );
						add_filter( 'excerpt_length', 'responsive_pro_excerpt_more_length' );
					 echo "<div style=max-width:98%;float:left;position:relative;>";
                                                $the_excerpt = get_the_excerpt(); //echo $the_excerpt;
                                                $the_content = get_the_content(); //echo $the_content;
remove_filter( 'get_the_excerpt', 'responsive_custom_excerpt_more' );
        $theexcerpt = get_the_excerpt();
        add_filter( 'get_the_excerpt', 'responsive_custom_excerpt_more' );
        $words = str_word_count($theexcerpt, 2);
        $pos = array_keys($words);
        if (!array_key_exists('50', $pos))
        {
                $exp_pos = count($pos) - 1;
        }
        else
        {
                $exp_pos = 50;
        }
        //$theexcerpt = '<div style="padding-left:10px;" id="lptv-excerpt">' . substr($theexcerpt, 0, $pos[$exp_pos]) . '</div>' . PHP_EOL;
	echo do_shortcode('<a href="' . $thepermalink . '" title="'.get_the_excerpt().'"><div style=padding-left:10px;>'.ucfirst(get_the_title()).'</div></a>'); 
       // echo $theexcerpt;
                                        echo "</div>";
						remove_filter( 'excerpt_more', 'responsive_pro_excerpt_more_text' );
						remove_filter( 'excerpt_length', 'responsive_pro_excerpt_more_length' );
					} ?>

<?php
					wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) );
					?>
				</div>
				<!-- end of .post-entry -->





				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>
		<?php
		$i++; endwhile;

                echo '<div style="position:relative;float:left;width:100%;background-color:#dbdbdb;"><div id="lptv-page-nav" style="position:relative;float:right;top:-5px;">'; numeric_posts_nav(); echo '</div></div>';

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>

</div><!-- end of #content-archive -->



<?php// echo do_shortcode('[doap_divider text="Volver a la parte superior de la página"]'); ?>
</div>
<?php get_footer('lptv'); ?>
<style>
//.email-thumbnail { display:none; }
.laprensa-thumbnail { display:inline; }
#top-widget { width:100%; }
#footer-wrapper > #top-social-icons { position:relative;letf:30px; }
</style>
