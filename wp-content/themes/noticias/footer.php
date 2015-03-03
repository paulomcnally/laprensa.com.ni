<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.2
 * @filesource     wp-content/themes/responsive/footer.php
 * @link           http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 * @since          available since Release 1.0
 */

/* 
 * Globalize Theme options
 */
global $responsive_options;
$responsive_options = responsive_get_options();
?>
<?php responsive_wrapper_bottom(); // after wrapper content hook ?>
</div><!-- end of #wrapper -->
<?php responsive_wrapper_end(); // after wrapper hook ?>
</div><!-- end of #container -->
<?php responsive_container_end(); // after container hook ?>

<div id="footer" class="clearfix">
	<?php responsive_footer_top(); ?>

        <?php if( has_nav_menu( 'footer-menu', 'responsive' ) ) { ?>
            <div id="footermenu" style="">
		<?php wp_nav_menu( array(
                                   'container'      => 'div',
                                   'container_id'      => "footer-menu-container",
                                   'container_class'=> 'grid col-540',
                                   'fallback_cb'    => false,
                                   'menu_class'     => 'footer-menu',
                                   'theme_location' => 'footer-menu'
                               )
            );
            ?>
	</div>
        <?php } ?>

	<div id="footer-wrapper">


		<div id="footer-widget" class="grid col-940">

		<?php get_sidebar( 'footer' ); ?>

			<div class="grid col-380 fit">
				<?php echo news_get_social_icons() ?>
			</div>
				<br><div style="font-family:StagSansBook;font-size:1.1em;"><?php _e( date( 'Y' ) ); ?> Grupo Editorial La Prensa, Todos los Derechos Reservados</div><br>
			<!-- end of col-380 fit -->

		</div>
		<!-- end of col-940 -->
		<?php //get_sidebar( 'colophon' ); ?>
<style>
#nav_menu-2 { position:relative;left:10px;top:30px; }
</style>
		<div class="grid col-300 copyright" style="font-family:StagSansBook;font-size:1.1em;padding-left:5px;">
				<div class="lp-sprite-v8logofooter2-1x" style="margin-top:10px;"></div>
			<?php //esc_attr_e( '&copy;', 'responsive' ); ?> <?php //_e( date( 'Y' ) ); ?><a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<?php //bloginfo( 'name' ); ?>
				<br>Editorial La Prensa, S.A.<br>
				Km. 4 1/2 Carretera Norte, Managua, Nicaragua<br>
				Apartado Postal #192<br>
				PBX (505) 2255-6767<br>
				FAX (505) 2255-6780 ext. 5369<br>
				Informacion: <a href="mailto:info@laprensa.com.ni">info@laprensa.com.ni</a>
			</a>
		</div>
		<!-- end of .copyright -->

		<!-- end .powered -->

	</div>
	<!-- end #footer-wrapper -->
	<?php responsive_footer_bottom(); ?>
</div><!-- end #footer -->
<?php responsive_footer_after(); ?>
<div style="position:relative;float:right;margin-right:10px;margin-bottom:4px;font-family:Marvel;font-size:.9em;">
<a href="http://doap.com" title="Como MSP de Amazon, manejamos y administramos la infraestructura basada en AWS, incluyendo las bases de datos y aplicaciones."><b>Proporcionado por DevOps and Platforms</b>. Visitanos @ doap.com</a>, <a href="https://plus.google.com/b/114223147376691661545/+Doap1/about?cfem=1" title="Doap on Google Plus!">G+</a>, <a href="https://www.youtube.com/channel/UCMEmQc2J9SH-ORx0Sp2D79w" title="Doap on Youtube">YouTube</a>, <a href="https://www.facebook.com/devopsandplatforms?ref=hl" title="Doap on Facebook">FB</a>, <a href="https://twitter.com/doapydave" title="Doap on Twitter">Twitter</a>, <a href="http://www.pinterest.com/doapydave/devopsandplatforms/" title="Pinterest">P+</a></div>
<?php wp_footer(); ?>
<?php //include(STYLESHEETPATH . '/server-info.php'); ?>
<?php include(STYLESHEETPATH . '/interstitial-ad-widget.php'); ?>
<!-- W3TC-include-js-body-end -->
</body>
</html>
