<?php
/**
 * The Loops Template: List of TV Carrusel
 *
 * Display a post title and excerpt
 *
 * The "The Loops Template:" bit above allows this to be selectable
 * from a dropdown menu on the edit loop screen.
 *
 * @package The Loops
 * @since 0.2
 */
?>
<div id="lptv-slider">
    <div id="" class="su-carousel su-carousel-pages- su-carousel-responsive-" style="" data-autoplay="" data-speed="" data-mousewheel="" data-items="" data-scroll="">
        <div class="su-carousel-slides">
            <?php if ( have_posts() ) : ?>
                <?php while( have_posts() ) : the_post(); ?>
                    <div class="su-carousel-slide">
                        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
                        <?php the_post_thumbnail( array(92, 60, true) ); ?>
                        <div class="su-slider-slide-title">
                            <?php the_title(); ?>
                            <div class="slide-description" style="top:215px;">
                                <?php substr(the_excerpt(), 41, 1); ?>
                            </div>
                        </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="tl-not-found"><?php tl_not_found_text(); ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>
