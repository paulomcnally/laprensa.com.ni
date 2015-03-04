<?php
/**
 * The default template for displaying content.
 *
 * @file      footer.php
 * @package   noticias
 * @author    Sami Ch.
 * @link          http://doap.com
 */
$counter = 1;
?>
<?php get_template_part('includes/edicion'); ?>

<div id="posts-list">
        <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                        <div class="post">
                                <div class="post-image">
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail', array('title' => "") ); ?></a>
                                </div>

                                <div class="right">

                                        <?php if ( is_sticky() ) : ?>
                                                <div class="sticky"><?php _e( 'Mejor Historia!', 'noticias' ); ?></div>
                                        <?php endif; ?>

                                        <h2> <a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'noticias'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                                        <div class="post-meta">
                                                <span class="date"><?php the_time('m-j-Y'); ?></span>
                                                <span class="sep"> - </span>
                                                <span class="category"><?php the_category(', '); ?></span>
                                                <?php the_tags( '<span class="sep"> - </span><span class="tags">' . __('Etiquetado: ', 'noticias' ) . ' ', ", ", "</span>" ) ?>
                                                <?php if ( comments_open() ) : ?>
                                                        <span class="sep"> - </span>
                                                        <span class="comments"><?php comments_popup_link( __('No hay comentarios', 'noticias'), __( 'Un comentario', 'noticias'), __('% comentarios', 'noticias')); ?></span>
                                                <?php endif; ?>
                                        </div>

                                        <div class="exceprt">
                                                <?php
                                                        /**
                                                         * the_excerpt() returns first 30 words in the post.
                                                         * length is defined in functions.php.
                                                         */
//echo "Excerpt:";
                                                        the_excerpt();
                                                ?>
                                        </div>

                                        <div class="more" style="position:relative;float:left;">
                                                <a href="<?php the_permalink(); ?>"><?php _e('Leer esta noticia &rarr;', 'noticias'); ?></a>
                                        </div>

<?php $counter = $counter + 1; if ($counter == 3 || $counter == 6 || $counter == 9 || $counter == 12) {
?>
<?php } ?>


                                </div>
                        </div><!-- post -->

                <?php endwhile; ?>

                <?php if ( function_exists('max_magazine_pagination') ) { max_magazine_pagination(); } ?>

        <?php endif; ?>

</div>
