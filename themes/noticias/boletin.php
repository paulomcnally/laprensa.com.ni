<?php
/*
Template Name: Boletin
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>BOLETIN</title>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="http://www.laprensa.com.ni/xmlrpc.php">
<link rel="alternate" type="application/rss+xml" title="La Prensa Noticias » Feed" href="http://www.laprensa.com.ni/feed">
<link rel="alternate" type="application/rss+xml" title="La Prensa Noticias » RSS de los comentarios" href="http://www.laprensa.com.ni/comments/feed">
<link rel="shortcut icon" href="http://www.laprensa.com.ni/favicon.ico" type="image/x-icon">
<link rel="alternate" type="application/rss+xml" title="La Prensa Noticias » Boletin RSS de la categoría" href="http://www.laprensa.com.ni/boletin/feed">
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://www.laprensa.com.ni/xmlrpc.php?rsd">
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://laprensa19.doap.us/wp-includes/wlwmanifest.xml">

<style type="text/css">
body { margin: 0 auto; padding: 0; background: #f6f6f6;}
img {border: 0;}
a:link {
	text-decoration:none;
	color:#FFF
}
a:visited {
	text-decoration:none;
	color:#FFF
}
a:hover {
	text-decoration:none;
	color:#FFF
}
a:active {
	text-decoration:none;
	color:#FFF
}
</style>

</head>
<body>
<table width="100%" border="0"  cellspacing="0" cellpadding="0" bgcolor="#f6f6f6">
  <tr>
    <td align="center" valign="top">

<!-- header -->
	  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#595959" style="border-bottom: 5px solid #0466a0; ">
      <tr>
      <td height="10"></td></tr>
  			<tr>
    			<td align="center" valign="top">
					<table width="620" border="0" align="center" cellpadding="0" cellspacing="0">
      					<tr>
        					<td align="center" valign="top">
        						<table width="620" border="0" cellspacing="0" cellpadding="0">
  									
  									<tr>
<!-- start logo -->									
    									<td height="50" align="left" valign="top" style="padding:5px">
											<a href="http://www.laprensa.com.ni/"><img src="http://laprensa15.doap.us/wp-content/uploads/sites/2/2015/01/laprensalogoboletin2.png" alt="" style="display: inline-block;" /></a>
										</td>
<!-- start text -->											
    									
    									<td width="234" align="right" valign="top" style="padding:5px">
											<p>
                <a style="color: #fff; font-size: 13px; font-weight: 600;  text-transform: capitalize; font-family: Open Sans, Tahoma, Arial, sans-serif;" href="http://www.laprensa.com.ni/boletin" >Ver versión online<br /><?php setlocale(LC_ALL,"es_ES"); echo strftime("%A %d de %B %Y");?> </a></p>
									</td>
  									</tr>
								</table>
							</td>
      					</tr>
     					<tr>
        					<td align="center" valign="top">
        						<table width="620" border="0" cellspacing="0" cellpadding="0">
  									<tr>
    									<td align="center" valign="top" height="5">
										</td>
  									</tr>
								</table>
        					</td>
      					</tr>
    				</table>
				</td>  
			</tr>
		</table>
		<!--start featured post-->
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-bottom: 40px;">
        <tr>
        <td height="20"></td>
        </tr>
			<tr>
				<td>
				<?php
				
function new_excerpt_length($length) {
return 50;
}
add_filter('excerpt_length', 'new_excerpt_length');

// Changing excerpt more
function new_excerpt_more($more) {
return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
?>
				 <?php if (have_posts()) : ?>
                <?php
                        query_posts('posts_per_page=1&cat=71168');
                        while (have_posts()) : the_post();
                                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                                
                ?>  
                
                <table width="600" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border: 1px solid #d5d5d5;">
  						<tr>
    						<td align="center" valign="top">
								<table width="600" border="0" cellspacing="0" cellpadding="0" style="padding: 13px;">
      								<tr>
        								<td align="center" valign="top">
                                        <!-- IMAGE -->
										    <a href="<?php the_permalink(); ?>"><img src="<?php echo $url; ?>" alt="" style="display: inline-block; width:574px;" /> </a>
									  </td>
      								</tr>
     								<tr>
        								<td align="left" valign="top" style=" padding: 10px 0; color: #212227; font-size: 24px; font-weight: 800;  font-family: Open Sans, Tahoma, Arial, sans-serif;">
									 <a href="<?php the_permalink(); ?>" style="color:#212227; text-decoration:none;"><?php the_title(); ?></a>
										</td>
      								</tr>
      								<tr>
        								<td align="left" valign="top" style="color: #666; font-size: 13px; font-weight: 400; font-family: Open Sans, Tahoma, Arial, sans-serif;"><?php the_excerpt(); ?></td>
      								</tr>
    							</table>
							</td>
 					 	</tr>
  						<tr>
    						<td align="center" valign="top">
    							<table width="600" border="0" cellspacing="0" cellpadding="0">
  									<tr>
    									<td height="35" align="left" valign="middle" style="border-top: 1px solid #d5d5d5;">
											<a style="padding-left: 13px; color: #0466a0; font-size: 13px; font-weight: 800;  text-decoration: none; font-family: Open Sans, Tahoma, Arial, sans-serif;" href="#">
																		<?php
$category = get_the_category(); 
echo $category[1]->cat_name;
?>
											</a>
										</td>
  									</tr>
								</table>
    						</td>
  						</tr>
					</table></td>
			</tr>
    
                        
              <?php endwhile; endif; ?>
                <!-- 2 COLUMNS -->
                <?php if (have_posts()) : ?>
                <?php
                        query_posts('posts_per_page=1&cat=26704');
                        while (have_posts()) : the_post();
                                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                                
                ?>  
                    <tr>
				<td><br />
				  <table width="600" border="0" cellspacing="0" cellpadding="0">
						<tr valign="top">
							<td width="289" >
								<table width="289" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border: 1px solid #d5d5d5;">
									<tr>
										<td align="center" valign="top">
										  <table width="289" border="0" cellspacing="0" cellpadding="0" style="padding: 13px;">
												<tr>
													<td align="center" valign="top">
													   <a href="<?php the_permalink(); ?>"><img src="<?php echo $url; ?>" alt="" style="display: inline-block; width:266px;" /></a>
													</td>
												</tr>
												<tr>
													<td align="left" valign="top" style=" padding: 10px 0; color: #212227; font-size: 16px; font-weight: 800;  font-family: Open Sans, Tahoma, Arial, sans-serif;">
									<a href="<?php the_permalink(); ?>" style="color:#212227; text-decoration:none;"><?php the_title(); ?></a>
													</td>
												</tr>
												<tr>
													<td align="left" valign="top" style="color: #666; font-size: 13px; font-weight: 400; font-family: Open Sans, Tahoma, Arial, sans-serif;">
									<?php the_excerpt(); ?>
													</td>
												</tr>
										  </table>
										</td>
									</tr>
									<tr>
										<td align="center" valign="top">
											<table width="289" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td height="35" align="left" valign="middle" style="border-top: 1px solid #d5d5d5;">
														<a style="padding-left: 13px; color: #0466a0; font-size: 13px; font-weight: 800;  text-decoration: none; font-family: Open Sans, Tahoma, Arial, sans-serif;" href="#">
																								<?php
$category = get_the_category(); 
echo $category[1]->cat_name;
?></a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td><?php endwhile; ?>       
                        
               <?php endif; ?>
               <?php if (have_posts()) : ?>
                <?php
                        query_posts('cat=26704&offset=1&posts_per_page=1');
                        while (have_posts()) : the_post();
                                 $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                ?>     
							<td width="24" rowspan="2">&nbsp;</td>
							<td width="287">
								<table width="289" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border: 1px solid #d5d5d5;">
									<tr>
										<td align="center" valign="top">
											<table width="289" border="0" cellspacing="0" cellpadding="0" style="padding: 13px;">
												<tr>
													<td align="center" valign="top">
													  <a href="<?php the_permalink(); ?>"><img src="<?php echo $url; ?>" alt="" style="display: inline-block; width:266px;" /> </a><!-- IMAGE -->
													</td>
												</tr>
												<tr>
													<td align="left" valign="top" style=" padding: 10px 0; color: #212227; font-size: 16px; font-weight: 800;  font-family: Open Sans, Tahoma, Arial, sans-serif;"><a href="<?php the_permalink(); ?>" style="color:#212227; text-decoration:none;"><?php the_title(); ?></a></td>
												</tr>
												<tr>
													<td align="left" valign="top" style="color: #666; font-size: 13px; font-weight: 400; font-family: Open Sans, Tahoma, Arial, sans-serif;"><?php the_excerpt(); ?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td align="center" valign="top">
										  <table width="289" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td height="35" align="left" valign="middle" style="border-top: 1px solid #d5d5d5;">
														<a style="padding-left: 13px; color: #0466a0; font-size: 13px; font-weight: 800;  text-decoration: none; font-family: Open Sans, Tahoma, Arial, sans-serif;" href="#">
																		<?php
$category = get_the_category(); 
echo $category[1]->cat_name;
?>
														</a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
              </td>
  			</tr>
                                
                        <?php endwhile; ?>
                
                <?php endif; ?>
                <!-- recomendacion del editor-->
                <?php if (have_posts()) : ?>
                <?php
                        query_posts('posts_per_page=1&cat=71168');
                        while (have_posts()) : the_post();
                                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                                
                ?> 
                <tr>
            <td height="10"></td>
            </tr>
            <tr>
    									<td align="center" valign="top">
                                        <table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#222222" style="border: 1px solid #d5d5d5; padding:13px;">
  <tr>
    <td colspan="2" style="border-bottom: 2px solid #0466a0;"><a style="padding-left: 13px; color: #fff; font-size: 13px; font-weight: 800;  text-decoration: none; font-family: Open Sans, Tahoma, Arial, sans-serif;" href="#">
															RECOMENDACIÓN DEL EDITOR</a></td>
    </tr>
  <tr>
    <td width="160" rowspan="2" align="center" valign="middle" style="padding:3px;"><a href="<?php the_permalink(); ?>"><img src="<?php echo $url; ?>" alt="" style="display: inline-block; width:120px;" /></a></td>
    <td width="380" valign="top" style=" padding: 5px 0; color: #fff; font-size: 16px; font-weight: 500;  font-family: Open Sans, Tahoma, Arial, sans-serif;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
  </tr>
  <tr>
    <td valign="top" style="color: #d9d8d8; font-size: 13px; font-weight: 400; font-family: Open Sans, Tahoma, Arial, sans-serif;"><?php the_excerpt(); ?></td>
  </tr>
</table>
</td>
  									</tr>    
  									 <?php endwhile; ?>
                
                <?php endif; ?>
                <tr>
            <td height="10"></td>
            </tr>
            	<tr>
        					<td align="center" valign="top">
        						<table width="600" border="0" cellspacing="0" cellpadding="0">
  									<tr>
    									<td align="center" valign="top">
    									<!-- AdSpeed.com Serving Code 7.9.5 for [Zone] boletin 640x120 -->
<a href="http://g.adspeed.net/ad.php?do=clk&zid=57345&wd=640&ht=120&pair=asemail" target="_top"><img style="border:0px;" src="http://g.adspeed.net/ad.php?do=img&zid=57345&wd=640&ht=120&pair=asemail" alt="i" width="595"/></a><!-- 
AdSpeed.com End -->

									
										</td>
  									</tr>
								</table>
        					</td>
		  </tr>	
                         <tr>
            <td height="10"></td>
            </tr>
           
            	<tr>
        					<td align="center" valign="top">&nbsp;</td>
		  </tr>	
                         <tr>
            <td height="10"></td>
            </tr>
            <!--INICIO 4 MODULOS-->           <?php if (have_posts()) : ?>
                <?php
                        query_posts('posts_per_page=1&cat=26704&offset=2');
                        while (have_posts()) : the_post();
                                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                                
                ?>  
                    <tr>
				<td><br />
				  <table width="600" border="0" cellspacing="0" cellpadding="0">
						<tr valign="top">
							<td width="289" >
								<table width="289" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border: 1px solid #d5d5d5;">
									<tr>
										<td align="center" valign="top">
										  <table width="289" border="0" cellspacing="0" cellpadding="0" style="padding: 13px;">
												<tr>
													<td align="center" valign="top">
													   <a href="<?php the_permalink(); ?>"><img src="<?php echo $url; ?>" alt="" style="display: inline-block; width:266px;" /></a>
													</td>
												</tr>
												<tr>
													<td align="left" valign="top" style=" padding: 10px 0; color: #212227; font-size: 16px; font-weight: 800;  font-family: Open Sans, Tahoma, Arial, sans-serif;">
									<a href="<?php the_permalink(); ?>" style="color:#212227; text-decoration:none;"><?php the_title(); ?></a>
													</td>
												</tr>
												<tr>
													<td align="left" valign="top" style="color: #666; font-size: 13px; font-weight: 400; font-family: Open Sans, Tahoma, Arial, sans-serif;">
									<?php the_excerpt(); ?>
													</td>
												</tr>
										  </table>
										</td>
									</tr>
									<tr>
										<td align="center" valign="top">
											<table width="289" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td height="35" align="left" valign="middle" style="border-top: 1px solid #d5d5d5;">
														<a style="padding-left: 13px; color: #0466a0; font-size: 13px; font-weight: 800;  text-decoration: none; font-family: Open Sans, Tahoma, Arial, sans-serif;" href="#">
																		<?php
$category = get_the_category(); 
echo $category[1]->cat_name;
?>	</a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td><?php endwhile; ?>       
                        
               <?php endif; ?>
               
               <?php if (have_posts()) : ?>
                <?php
                        query_posts('cat=26704&offset=3&posts_per_page=1');
                        while (have_posts()) : the_post();
                                 $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                ?>     
							<td width="24" rowspan="2">&nbsp;</td>
							<td width="287">
								<table width="289" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border: 1px solid #d5d5d5;">
									<tr>
										<td align="center" valign="top">
											<table width="289" border="0" cellspacing="0" cellpadding="0" style="padding: 13px;">
												<tr>
													<td align="center" valign="top">
													  <a href="<?php the_permalink(); ?>"><img src="<?php echo $url; ?>" alt="" style="display: inline-block; width:266px;" /> </a><!-- IMAGE -->
													</td>
												</tr>
												<tr>
													<td align="left" valign="top" style=" padding: 10px 0; color: #212227; font-size: 16px; font-weight: 800;  font-family: Open Sans, Tahoma, Arial, sans-serif;"><a href="<?php the_permalink(); ?>" style="color:#212227; text-decoration:none;"><?php the_title(); ?></a></td>
												</tr>
												<tr>
													<td align="left" valign="top" style="color: #666; font-size: 13px; font-weight: 400; font-family: Open Sans, Tahoma, Arial, sans-serif;"><?php the_excerpt(); ?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td align="center" valign="top">
										  <table width="289" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td height="35" align="left" valign="middle" style="border-top: 1px solid #d5d5d5;">
														<a style="padding-left: 13px; color: #0466a0; font-size: 13px; font-weight: 800;  text-decoration: none; font-family: Open Sans, Tahoma, Arial, sans-serif;" href="#">
																		<?php
$category = get_the_category(); 
echo $category[1]->cat_name;
?>
														</a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
              </td>
  			</tr>
                                
                        <?php endwhile; ?>
                
                <?php endif; ?>
                           <?php if (have_posts()) : ?>
                <?php
                        query_posts('posts_per_page=1&cat=26704&offset=4');
                        while (have_posts()) : the_post();
                                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                                
                ?>  
                    <tr>
				<td><br />
				  <table width="600" border="0" cellspacing="0" cellpadding="0">
						<tr valign="top">
							<td width="289" >
								<table width="289" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border: 1px solid #d5d5d5;">
									<tr>
										<td align="center" valign="top">
										  <table width="289" border="0" cellspacing="0" cellpadding="0" style="padding: 13px;">
												<tr>
													<td align="center" valign="top">
													   <a href="<?php the_permalink(); ?>"><img src="<?php echo $url; ?>" alt="" style="display: inline-block; width:266px;" /></a>
													</td>
												</tr>
												<tr>
													<td align="left" valign="top" style=" padding: 10px 0; color: #212227; font-size: 16px; font-weight: 800;  font-family: Open Sans, Tahoma, Arial, sans-serif;">
									<a href="<?php the_permalink(); ?>" style="color:#212227; text-decoration:none;"><?php the_title(); ?></a>
													</td>
												</tr>
												<tr>
													<td align="left" valign="top" style="color: #666; font-size: 13px; font-weight: 400; font-family: Open Sans, Tahoma, Arial, sans-serif;">
									<?php the_excerpt(); ?>
													</td>
												</tr>
										  </table>
										</td>
									</tr>
									<tr>
										<td align="center" valign="top">
											<table width="289" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td height="35" align="left" valign="middle" style="border-top: 1px solid #d5d5d5;">
														<a style="padding-left: 13px; color: #0466a0; font-size: 13px; font-weight: 800;  text-decoration: none; font-family: Open Sans, Tahoma, Arial, sans-serif;" href="#">
		<?php
$category = get_the_category(); 
echo $category[1]->cat_name;
?></a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td><?php endwhile; ?>       
                        
               <?php endif; ?>
               
               <?php if (have_posts()) : ?>
                <?php
                        query_posts('cat=26704&offset=5&posts_per_page=1');
                        while (have_posts()) : the_post();
                                 $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                ?>     
							<td width="24" rowspan="2"></td>
							<td width="287">
								<table width="289" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="border: 1px solid #d5d5d5;">
									<tr>
										<td align="center" valign="top">
											<table width="289" border="0" cellspacing="0" cellpadding="0" style="padding: 13px;">
												<tr>
													<td align="center" valign="top">
													  <a href="<?php the_permalink(); ?>"><img src="<?php echo $url; ?>" alt="" style="display: inline-block; width:266px;" /> </a><!-- IMAGE -->
													</td>
												</tr>
												<tr>
													<td align="left" valign="top" style=" padding: 10px 0; color: #212227; font-size: 16px; font-weight: 800;  font-family: Open Sans, Tahoma, Arial, sans-serif;"><a href="<?php the_permalink(); ?>" style="color:#212227; text-decoration:none;"><?php the_title(); ?></a></td>
												</tr>
												<tr>
													<td align="left" valign="top" style="color: #666; font-size: 13px; font-weight: 400; font-family: Open Sans, Tahoma, Arial, sans-serif;"><?php the_excerpt(); ?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td align="center" valign="top">
										  <table width="289" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td height="35" align="left" valign="middle" style="border-top: 1px solid #d5d5d5;">
														<a style="padding-left: 13px; color: #0466a0; font-size: 13px; font-weight: 800;  text-decoration: none; font-family: Open Sans, Tahoma, Arial, sans-serif;" href="#">
														<?php
                                                        $category = get_the_category(); 
														echo $category[1]->cat_name;
														?>
														</a>
													</td>
												</tr>
											</table>
										</td>
									</tr>
					</table>
							</td>
						</tr>
					</table>
              </td>
  			</tr>
                                </table>
                        <?php endwhile; ?>
                
                <?php endif; ?>
                <!-- INICIO SEGUNDA PUBLICIDAD -->
                <tr>
        					<td align="center" valign="top">
        						<table width="600" border="0" cellspacing="0" cellpadding="0">
  									<tr>
    									<td align="center" valign="top">
    									<!-- AdSpeed.com Serving Code 7.9.5 for [Zone] boletin_2 640x120 -->
<a href="http://g.adspeed.net/ad.php?do=clk&zid=57391&wd=640&ht=120&pair=asemail" target="_top"><img style="border:0px;" src="http://g.adspeed.net/ad.php?do=img&zid=57391&wd=640&ht=120&pair=asemail" alt="i" width="600"/></a>
<!--AdSpeed.com End -->
										</td>
  									</tr>
								</table>
        					</td>
      					</tr>	
            <tr>
            <td height="10"></td>
            </tr>
                <!--INICIO LPTV -->
                <tr>
				<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#4f4f4f" style="border-top: 5px solid #0466a0;border-bottom: 5px solid #0466a0; ">
  			<tr>
				<td align="center" valign="top">
                <table width="600" border="0" cellspacing="0" cellpadding="0">
				  <tr>
				    <td height="80" colspan="3" align="left" valign="top"><table width="600" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                    <td width="187" height="10"></td>
                    </tr>
				      <tr>
				        <td height="80" colspan="3" align="left" valign="top">
                        <img src="http://laprensa13.doap.us/wp-content/uploads/sites/2/2014/06/lptv-header-logo.png" style="display:inline-block;" />                        </td>
			          </tr>
				      <tr>
				        
				        
			<?php if (have_posts()) : ?>
                <?php
                        query_posts('cat=19&posts_per_page=3');
                        while (have_posts()) : the_post();
                                 $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                ?>     	        
				<td align="left" valign="top">
           <table width="187" border="0" cellspacing="0" cellpadding="0">
				          <tr>             
				            <td width="187" align="center" valign="top"><a href="<?php the_permalink(); ?>"><img src="<?php echo $url; ?>" alt="" style="display: inline-block; width:187px;" /></a>
				              <!-- IMAGE --></td>
			              </tr>
				          <tr>
				            <td width="187" align="left" valign="top" bgcolor="#000" style="padding: 10px;"><p style="margin: 0; padding: 0; color: #fff; font-size: 13px; font-weight: 700;  font-family: Open Sans, Tahoma, Arial, sans-serif;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></p></p>
				              </td>
			              </tr>
				          </table></td>
				        <td width="20">&nbsp;</td>        
				        <?php endwhile; ?>
                
                <?php endif; ?>
		
		 </tr>
				          </table></td>
			          </tr>
				      <tr>
				        <td height="20" colspan="5">&nbsp;</td>
			          </tr>
			        </table>				    </td>
				  </tr>
				</table></td>
  			</tr>
		</table>		
<!-- start footer --><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10">&nbsp;</td>
  </tr>
</table>
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#4f4f4f" style="">
  			<tr>
    			<td align="center" valign="top">
    				<table width="620" border="0" align="center" cellpadding="0" cellspacing="0">
   	   					<tr>
        					<td align="center" valign="top">
								<table width="620" border="0" cellspacing="0" cellpadding="0">
          					
          							<tr>
            							<td height="115" colspan="6" align="center" valign="bottom" style="color: #fff; font-size: 14px; text-decoration: none; font-family: Open Sans, Tahoma, Arial, sans-serif;"><br />
                                        <a href="#"><img src="http://laprensa15.doap.us/wp-content/uploads/sites/2/2015/01/laprensalogoboletin2.png" alt="" style="display: inline-block; width:330px" /></a><br />
                                        EDITORIAL LA PRENSA, S.A. <br />					      
                                        Km. 4½ Carretera Norte, Managua, Nicaragua<br />
            							      Apartado Postal #192<br />
            							      PBX (505) 2255-6767<br />
            							      FAX (505) 2255-6780 ext. 5369<br />
            							      Información: <a href="mailto:info@laprensa.com.ni">info@laprensa.com.ni</a>
/ <a href="mailto:edicion.digital@laprensa.com.ni">edicion.digital@laprensa.com.ni</a>							              
<div>© 2014<a href="http://www.laprensa.com.ni/" title="La Prensa Noticias" target="_blank"> La Prensa Noticias</a></div></td>
            						</tr>
          							<tr>
           					 			<td height="90" colspan="6" align="center" valign="middle" style=" color:#FFF; font-size: 14px; font-family: Open Sans, Tahoma, Arial, sans-serif;">Usted recibe este mensaje porque está registrado en nuestra base de datos. Si desea dejar de recibir este boletín haga clic<a href="http://list.laprensa.com.ni/lists/?p=unsubscribe&uid=c1aba41ac329dc77a33feacaf5ada480&utm_source=emailcampaign185&utm_medium=phpList&utm_content=HTML&utm_campaign=Noticias+Matutinas+de+La+Prensa"> aquí</a>. 
Si recibió este mensaje a través de otra persona y desea continuar recibiendo el boletín de noticias de <a href="http://www.laprensa.com.ni">www.laprensa.com.ni</a> puede suscribirse <a href="http://www.laprensa.com.ni/login">aquí.</a></td>
            						</tr>
        						</table>
							</td>
      					</tr>
    				</table>
    			</td>
  			</tr>
		</table>
		</td>
  </tr>
</table>
</body>
</html>