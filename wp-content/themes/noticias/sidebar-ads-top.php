<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Advertising Widget Template
 *
 *
 * @file           sidebar-ads.php
 * @package        Responsive
 * @author         Juan Carlos Alvarez
 * @filesource     wp-content/themes/noticias/sidebar-ads.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 */
?>
<?php
if( !is_active_sidebar( 'ads-top' )
) {
	return;
}
?>
<?php responsive_widgets_before(); // above widgets container hook ?>
	<div id="ads-top" class="advertising grid col-940">
		<?php responsive_widgets(); // above widgets hook ?>

		<?php if( is_active_sidebar( 'ads-top' ) ) : ?>

			<?php dynamic_sidebar( 'ads-top' ); ?>

		<?php endif; //end of .advertisig ?>

		<?php responsive_widgets_end(); // after widgets hook ?>
	</div><!-- end of .advertising -->
<?php responsive_widgets_after(); // after widgets container hook ?>
