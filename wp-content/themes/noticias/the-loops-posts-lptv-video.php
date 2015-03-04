<?php
/**
 * The Loops Template: List of TV Post content
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
    <?php if ( have_posts() ) : ?>
        <?php while( have_posts() ) : the_post(); ?>
            <?php echo get_the_content(); ?>
        <?php endwhile; ?>
    <?php else : ?>
    <?php endif; ?>
