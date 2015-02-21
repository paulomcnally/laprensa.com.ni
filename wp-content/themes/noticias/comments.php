<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Comments Template
 *
 *
 * @file           comments.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2010 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/comments.php
 * @link           http://codex.wordpress.org/Theme_Development#Comments_.28comments.php.29
 * @since          available since Release 1.0
 */
?>
<?php echo do_shortcode('[loggedout]<div style="background-color:#369;"><div style="max-width:80%;position:relative;float:left;">

Apegados a la libertad de expresión y a las políticas de privacidad, www.laprensa.com.ni modera los comentarios. Para publicar un comentario más rápidamente debe iniciar sesión con su cuenta en Google o Facebook.
No se publicaran comentarios que contengan expresiones ofensivas, imputaciones de delito, acusaciones personales o que inciten a la violencia. Solo se publicarán aquellos comentarios cuyo contenido esté relacionado a la nota. 
<p>
LA PRENSA tampoco publicará comentarios escritos en mayúsculas o que hagan enlace hacia otros sitios webs no autorizados, y únicamente se publicará comentarios escritos en español. 
<p>
Los comentarios y opiniones que expresen nuestros lectores no son necesariamente compartidos por Editorial LA PRENSA, ni la empresa se hace responsable por sus contenidos. 
<p>
Se le solicita a los lectores reportar un comentario publicado que contradiga estas disposiciones a: edicion.digital@laprensa.com.ni para que sea removido. 
<p>
----------------------------------
<hr>
</div><style>#wp-social-login-connect-options { max-width:100px;  } </style><div style="max-width:100px;position:relative;float:left;">[wordpress_social_login]</div></div><hr>[/loggedout]'); ?>
<?php if( post_password_required() ) { ?>
	<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'responsive' ); ?></p>

	<?php return;
} ?>

<?php if( have_comments() ) : ?>
	<h6 id="comments">
		<?php
		printf( _n( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'responsive' ),
				number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
		?>
	</h6>

	<?php if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div class="navigation">
			<div class="previous"><?php previous_comments_link( __( '&#8249; Older comments', 'responsive' ) ); ?></div>
			<!-- end of .previous -->
			<div class="next"><?php next_comments_link( __( 'Newer comments &#8250;', 'responsive', 0 ) ); ?></div>
			<!-- end of .next -->
		</div><!-- end of.navigation -->
	<?php endif; ?>

	<ol class="commentlist">
		<?php wp_list_comments( 'type=comment&avatar_size=60&callback=noticias_comment&reverse_top_level=1&reverse_children=1' ); ?>
	</ol>

	<?php if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div class="navigation">
			<div class="previous"><?php previous_comments_link( __( '&#8249; Older comments', 'responsive' ) ); ?></div>
			<!-- end of .previous -->
			<div class="next"><?php next_comments_link( __( 'Newer comments &#8250;', 'responsive', 0 ) ); ?></div>
			<!-- end of .next -->
		</div><!-- end of.navigation -->
	<?php endif; ?>

<?php else : ?>

<?php endif; ?>

<?php
if( !empty( $comments_by_type['pings'] ) ) : // let's seperate pings/trackbacks from comments
	$count = count( $comments_by_type['pings'] );
	( $count !== 1 ) ? $txt = __( 'Pings&#47;Trackbacks', 'responsive' ) : $txt = __( 'Pings&#47;Trackbacks', 'responsive' );
	?>

	<h6 id="pings"><?php printf( __( '%1$d %2$s for "%3$s"', 'responsive' ), $count, $txt, get_the_title() ) ?></h6>

	<ol class="commentlist">
	 	<?php wp_list_comments( 'type=pings&max_depth=<em>' ); ?>
	</ol>


<?php endif; ?>

<?php if( comments_open() ) : ?>

	<?php
	$fields = array(
		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'responsive' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
		'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></p>',
		'email'  => '<p class="comment-form-email"><label for="email">' . __( 'E-mail', 'responsive' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
		'<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" /></p>',
		'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website', 'responsive' ) . '</label>' .
		'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
	);

	$defaults = array( 'fields' => apply_filters( 'comment_form_default_fields', $fields ) );

	comment_form( $defaults );
	?>


<?php endif; ?>
