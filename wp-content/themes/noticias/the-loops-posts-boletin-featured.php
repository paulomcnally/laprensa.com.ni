<?php
/**
 * The Loops Template: Featured Boletin
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
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border: 1px solid #d5d5d5 !important;">
 <?php if ( have_posts() ) : ?>
                <?php while( have_posts() ) : the_post(); ?>
  						<tr>
    						<td align="center" valign="top">
								<table width="600" border="0" cellspacing="0" cellpadding="0" style="padding: 13px !important;">
      								<tr>
        								<td align="center" valign="top">
                                        <!-- IMAGE -->
                          <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
                       <?php the_post_thumbnail('boletin-featured'); ?>

										 </a>
									  </td>
      								</tr>
     								<tr>
        								<td align="left" valign="top" style="color: #212227 !important; font-size: 24px !important; font-weight: 800 !important;  font-family: Open Sans, Tahoma, Arial, sans-serif !important;">
											 <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"  style=" color: #212227 !important; font-size: 24px !important; font-weight: 800 !important;  font-family: Open Sans, Tahoma, Arial, sans-serif !important;"><?php the_title(); ?></a>
										</td>
      								</tr>
      								<tr>
        								<td align="left" valign="top" style="color: #666 !important; font-size: 13px !important; font-weight: 400 !important; font-family: Open Sans, Tahoma, Arial, sans-serif !important;">
                                        <?php substr(the_excerpt()); ?>
										</td>
      								</tr>
    							</table>
							</td>
 					 	</tr>
  						<tr>
    						<td align="center" valign="top">
    							<table width="600" border="0" cellspacing="0" cellpadding="0">
  									<tr>
    									<td height="35" align="left" valign="middle" style="border-top: 1px solid #d5d5d5 !important;">
												<?php 
$category = get_the_category(); 
if($category[0]){
echo '<a href="'.get_category_link($category[0]->term_id ).'" style="padding-left: 13px; color: #0466a0; font-size: 13px; font-weight: 800;  text-decoration: none; font-family: Open Sans, Tahoma, Arial, sans-serif;">'.$category[0]->cat_name.'</a>';
}
?>
										</td>
  									</tr>
								</table>
    						</td>
  						</tr>
                    
                <?php endwhile; ?>
            <?php else : ?>
            <?php endif; ?>
					</table>
