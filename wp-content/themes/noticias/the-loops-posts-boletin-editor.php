<?php
/**
 * The Loops Template: Boletin recomendacion editor
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
<table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#222222" style="border: 1px solid #d5d5d5 !important; padding:13px !important;">
    <?php if ( have_posts() ) : ?>
    <?php while( have_posts() ) : the_post(); ?>

    <tr>
        <td colspan="2" style="border-bottom: 2px solid #0466a0 !important;"><a style="padding-left: 13px !important; color: #fff !important; font-size: 13px !important; font-weight: 800 !important;  text-decoration: none !important; font-family: Open Sans, Tahoma, Arial, sans-serif !important;" href="#">
                RECOMENDACIÓN DEL EDITOR</a></td>
    </tr>
    <tr>
        <td width="160" rowspan="2" align="center" valign="middle" style="padding:3px;">
            <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" style="padding-left: 13px !important; color: #fff !important;">
                <?php the_post_thumbnail('boletin-picked'); ?>
                </a></td>
        <td width="380" valign="top">
            <a href="<?php the_permalink(); ?>" style=" padding: 5px 0 !important; color: #fff !important; font-size: 16px !important; font-weight: 500 !important;  font-family: Open Sans, Tahoma, Arial, sans-serif !important;"><?php the_title(); ?></td></a>
    </tr>
    <tr>
        <td valign="top" style="color: #d9d8d8; font-size: 13px; font-weight: 400; font-family: Open Sans, Tahoma, Arial, sans-serif;"><?php substr(the_excerpt()); ?></td>
    </tr>
    <?php endwhile; ?>
    <?php else : ?>
    <?php endif; ?>
</table>
