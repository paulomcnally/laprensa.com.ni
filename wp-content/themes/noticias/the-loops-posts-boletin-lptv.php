<?php
/**
 * The Loops Template: Boletin LPTV
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
<td align="left" valign="top">
    <table width="187" border="0" cellspacing="0" cellpadding="0">
        <tr>             
            <td width="187" align="center" valign="top">
                <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" style="color: #fff !important;">
                    <?php the_post_thumbnail('boletin-lptv'); ?>
                    </a>
                <!-- IMAGE --></td>
        </tr>
        <tr>
            <td width="187" align="left" valign="top" bgcolor="#000" style="padding: 10px;"><p style="margin: 0; padding: 0; color: #fff; font-size: 13px; font-weight: 700;  font-family: Open Sans, Tahoma, Arial, sans-serif;"><?php the_title(); ?></p></a>
        </td>
    </tr>
</table></td>
<td width="20">&nbsp;</td> 
<?php endwhile; ?>
<?php else : ?>
<?php endif; ?>
