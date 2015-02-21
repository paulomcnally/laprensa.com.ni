<?php
require_once(WP_PATH . 'wp-content/plugins/shortcodes-ultimate/inc/core/tools.php');
$args = array(
	'post_type' => 'marcador',
	'post_status' => 'publish',
//	'meta_key' => 'activo_en_deportes',
//	'meta_value' => 1,
	'meta_query' => array(
		array(
		'key' => $marcador_key,
	        'value' => 1,
	        'compare' => '='
                     )
        ),
	'posts_per_page' => $posts_per_page
//	'tag_id' => 24124
//	'post__in'  => get_option( 'sticky_posts' ),
//	'ignore_sticky_posts' => 1
);
//$story_count = 0;
//wp_reset_query();
//$return .= ' IS FRONT PAGES? = ' . is_front_page();
$return = '';
$marc_query = new WP_Query( $args );
if( $marc_query->have_posts() ) 
{
while ( $marc_query->have_posts() )
{
	$marc_query->the_post();
//if (has_post_thumbnail()) $return .= 'HAS POST THUMBNAIL!';
$thumb = get_post_thumbnail_id( $post->ID );
if ($xyz = get_post_meta( $thumb, '_wp_attachment_backup_sizes', true))
{
$file_path = wp_get_attachment_url( $thumb ) . PHP_EOL;
$info = pathinfo( $file_path );
$dir = $info['dirname'];
$orig_file = $xyz['full-orig']['file'];
$attach_url = $dir . '/' . $orig_file;
}
else
{
        $attach_url = wp_get_attachment_url( $thumb );
}

	if ( $marcador_key == 'activo_en_portada' && has_post_thumbnail() )
	{
		//$image = Su_Tools::su_image_resize( $attach_url, 280, 153 );
		//$marcador_image_array = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		//$marcador_image = $marcador_image_array[0];
		$image = su_image_resize( $attach_url, 280, 153 );
		$marcador_image = $image['url'];
		$marcador_img = 'background:url(\'' . $marcador_image . '\');width:280px;height:153px;';
//		$macador_background = 'background:url("' . $marcador_image . '");';
//		$return .= '<a href="'. $marcador_image . '">IMAGE</a>';
	}
	else
	{
		$marcador_img = 'background-color:#ccc;width:278px;height:153px;';
	}
$home_meta_id = get_post_meta( $post->ID, 'en_casa', true );
$away_meta_id = get_post_meta( $post->ID, 'visitante', true );
$related_post = get_post_meta( $post->ID, 'post_relacionado', true );
$home_meta_array = get_term($home_meta_id, 'equipos', 'ARRAY_A');
$away_meta_array = get_term($away_meta_id, 'equipos', 'ARRAY_A');
$home_meta = $home_meta_array['name'];
$away_meta = $away_meta_array['name'];
//$home_logo = $home_team_thumb_id['0'];
$home_score_meta = get_post_meta( $post->ID, 'puntos_en_casa', true );
$away_score_meta = get_post_meta( $post->ID, 'puntos_visitante', true );
$game_title = ucfirst(get_the_title());
$game_status = get_doap_excerpt('10');
if ($home_score_meta > $away_score_meta)
{
	$home_color='background-color:#333;';
	$away_color='background-color:#606060;';
}
elseif ($home_score_meta < $away_score_meta)
{
	$home_color='background-color:#606060;';
	$away_color='background-color:#333;';
}
else
{
	$home_color='background-color:#333;';
	$away_color='background-color:#333;';
}



if ($home_meta_id)
{
//wp_reset_query();
$args = array(
	'posts_per_page' => 1,
	'post_type' => 'logo',
//	'tag_id' => $away_meta_array['term_id']
//	'equipos' => $away_meta_array['term_id']
	'tax_query' => array(
        array(
            'taxonomy' => 'equipos',
            'field' => 'id',
            'terms' => $away_meta_array['term_id']
        ),
    )
);
$away_logos = new WP_Query( $args );
if( $away_logos->have_posts() ) 
{
while ( $away_logos->have_posts() )
{
	$away_logos->the_post();
	$away_team_logo_id = $post->ID;
//echo "away team logo id = $away_team_logo_id" . PHP_EOL;
//echo 'away team thumb id = ' . get_post_thumbnail_id($away_team_logo_id) .PHP_EOL;
	$away_team_thumb_id[] = get_post_thumbnail_id($away_team_logo_id);
	$away_logo = get_post_thumbnail_id($away_team_logo_id);
	$away_team_sport = get_post_meta( $post->ID, 'deporte', true );
}
}
else
{
//	$return .= 'NO LOGOS FOUND';
//	var_dump($away_logos);
}
//$away_logo = $away_team_thumb_id[$i];
$away_logo_thumb_array = wp_get_attachment_image_src( $away_logo, 'thumbnail' );
$away_logo_thumb = $away_logo_thumb_array[0];
$args = array(
	'posts_per_page' => 1,
	'post_type' => 'logo',
//	'tag_id' => $home_meta_array['term_id']
	'tax_query' => array(
        array(
            'taxonomy' => 'equipos',
            'field' => 'id',
            'terms' => $home_meta_array['term_id']
        ),
    )
);
$home_logos = new WP_Query( $args );
if( $home_logos->have_posts() ) 
{
while ( $home_logos->have_posts() )
{
	$home_logos->the_post();
	$home_team_logo_id = $post->ID;
//echo "home team logo id = $home_team_logo_id" . PHP_EOL;
//echo 'home team thumb id = ' . get_post_thumbnail_id($home_team_logo_id) . PHP_EOL;
	$home_team_thumb_id[] = get_post_thumbnail_id($home_team_logo_id);
	$home_logo = get_post_thumbnail_id($home_team_logo_id);
	$home_team_sport = get_post_meta( $post->ID, 'deporte', true );
}
}
else
{
//	$return .= 'NO LOGOS FOUND';
//	var_dump($home_logos);
}
//$home_logo = $home_team_thumb_id[$i];
$home_logo_thumb_array = wp_get_attachment_image_src( $home_logo, '150,150' );
$home_logo_thumb = $home_logo_thumb_array[0];
if ( $home_team_sport <> $away_team_sport  || !isset($home_team_sport) || !isset($away_team_sport) )
{
	$deporte_icon = '';
}
else
{
	$deporte_icon = $home_team_sport;
}
$i++;
if ( !$laprensa_home && $marcador_key == 'activo_en_deportes')
{
//$return .= 'HELLO';
$return .= '<div id="scoreboard-strip">';
$return .= '<div style="position:relative;float:left;"><img src="http://laprensa13.doap.us/wp-content/themes/noticias/core/icons/' . $deporte_icon . '.png" alt="futbol" width="22" height="22" class="size-thumbnail wp-image-1146384" /></div>';
$return .= '<div class="marc-game-status">'. $game_status . '</div></div>';
$return .= '<div style="clear:both;"></div>';
$return .= '<div class="marcador">';
$return .= '<div class="marcador-inner">';
$return .= '<div class="marcador-left">';
$return .= '<div class="marc-home-team-name">'. $home_meta . '</div>';
//$return .= '<div>'. $home_logo. '</div>';
$return .= '<div class="marc-home-team-logo"><img src="' . $home_logo_thumb . '"></div>';
$return .= '<div class="marc-score" style="' . $home_color . '">'. $home_score_meta . '</div>';
$return .= '</div>';
$return .= '<div class="marcador-right">';
$return .= '<div class="marc-score" style="' . $away_color . '">'. $away_score_meta . '</div>';
//$return .= '<div>'. $away_logo. '</div>';
$return .= '<div class="marc-away-team-logo"><img src="' . $away_logo_thumb . '"></div>';
$return .= '<div class="marc-home-team-name">'. $away_meta . '</div>';
$return .= '</div>';
$return .= '<div style="clear:both;"></div>';
$return .= '</div>';
$return .= '<div class="marc-game-title">'. $game_title . '</div>';
$return .= '</div>';

}
}
if ( $home_meta_id && $marcador_key == 'activo_en_portada')
{
//	$max_width = ($even == $left_300_story) ? 'width:340px;' : 'width:213px;';
//		$return .= '<div style="position:absolute;display:block;bottom:0px;left:0px;height:30px;width:100%;max-width:100%;color:#fff;background:rgba(0, 0, 0, 0.5);border-radius:0;opacity:1;font-size:11pt;"><div><div style="position:absolute;width:60px;margin:0px 5px 5px 0px;padding:5px;color:#fff;"> ' . $posted_time . '</div>';
//	$theexcerpt = ($even == $left_300_story ) ? get_doap_excerpt(7, 1) : get_doap_excerpt(50,1);
	$font_size = ( 1 == 1 ) ? 'font-size:16px;' : 'font-size:14px;';
	$title_height = ( 1 == 1 ) ? 'height:30px;line-height:2;' : 'height:20px;line-height:1;';
	$bottom_height = ( 1 == 1 ) ? 'height:40px;line-height:1.5;' : 'height:20px;line-height:1;';
	$font_color= ( 1 == 1 ) ? 'color:#fff;' : 'color:#fff;';
//	$margin_right = ($even == 4) ? 'margin-right:0px;' : 'margin-right:7px;';
//	$padding_left = ($even == $left_300_story ) ? 'padding-left:8px;' : 'padding-left:0px;';
	$background = ( 1 == 1) ? 'background:rgba(0, 0, 0, 0.5);' : 'background:rgba(3, 3, 3, 0.75);';
//	$excerpt_align= ($even == $left_300_story ) ? 'text-align:left;' : 'text-align:justify;';
//	$post_url = get_permalink($marcador_post);
	//$top_text = '<div style="z-index:10;position:absolute;' . $font_color . $background . 'border-radius:0;opacity:1;font-family:Arial;' . $font_size . 'text-align:center;padding:2px 5px 2px 5px;' . $title_height . '">' . $game_status. '</div>';
	//$top_text = '<div style="z-index:10;width:100%;height:30px;' . $font_color . $background . 'border-radius:0;opacity:1;font-family:Arial;' . $font_size . 'text-align:center;' . $title_height . '">' . $game_status. '</div>';
	$top_text = '<div style="z-index:10;width:100%;height:30px;background-color:#333;' . $font_color . 'border-radius:0;opacity:1;font-family:Arial;' . $font_size . 'text-align:center;' . $title_height . '">' . $game_status. '</div>';
//	$bottom_text = ($even == $left_300_story ) ? $theexcerpt : $title;
//	$return .= '<a href="' . $post_url . '">';
	$return .= '<div style="width:280px;height:281px;position:relative;float:left;border: 1px solid #ccc;margin-right:8px;">';
	//$return .= '<div><img src="http://laprensa13.doap.us/wp-content/uploads/sites/2/2014/06/laprensa-280x34-1.png"></div>';
        $return .= "<!--  Marcador-Superior-Portada-280x34 --><div id='div-gpt-ad-1404234613796-0' style='width:280px; height:34px;'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('div-gpt-ad-1404234613796-0'); });</script></div>";
	$return .= $top_text . PHP_EOL;
	$return .= '<div class="marcador-portada" style="' . $marcador_img . '">';
//	$return .= '<div style="clear:both;"></div>';
	//$return .= '<div style="padding-right:4px;padding-left:4px;position:relative;float:left;width:89x;height:80px;"><img src="' . $home_logo_thumb . '" style="width:89px;height:80px;"></div>';
	$return .= '<div style="position:relative;float:left;width:50%;margin-top:20px;margin-bottom:10px;height:80px;"><div style="width:89px;margin:0px auto 0px auto;"><img src="' . $home_logo_thumb . '" style="width:89px;height:80px;"></div></div>';
	$return .= '<div style="position:relative;float:right;width:50%;margin-top:20px;margin-bottom:10px;height:80px;"><div style="width:89px;margin:0px auto 0px auto;"><img src="' . $away_logo_thumb . '" style="margin-left:auto;margin-right:auto;width:89px;height:80px;"></div></div>';
	//$return .= '<div style="padding-left:4px;padding-right:4px;position:relative;float:right;width:89px;height:80px;"><img src="' . $away_logo_thumb . '" style="width:89px;height:80px;"></div>';
	$return .= '<div style="width:100%;height:30px;">';
	$return .= '<div style="line-height:1;color:#fff;font-family:Arial;font-size:1em;font-weight:bold;width:50%;text-align:center;vertical-align:middle;position:relative;float:left;">'. $home_meta . '</div>';
	$return .= '<div style="line-height:1;color:#fff;font-family:Arial;font-size:1em;font-weight:bold;width:50%;text-align:center;vertical-align:middle;position:relative;float:right;">'. $away_meta . '</div>';
	$return .= '</div>';
	$return .= '</div>';
//	$return .= '<div style="clear:both;"></div>';
	$return .= '<div style="width:100%;height:30px;background-color:#333;">';
	$return .= '<div style="line-height:1.6;color:#fff;font-family:Arial;font-size:18px;width:46.5%;text-align:center;vertical-align:middle;position:relative;float:left;">'. $home_score_meta . '</div>';
	$return .= '<div style="display:table-cell;width:7%;position:relative;float:left;"><div style="height: 1px;margin-top:1em;width: 100%;background: #fff;border-bottom: 1px solid #fff;"></div></div>';
	$return .= '<div style="line-height:1.6;color:#fff;font-family:Arial;font-size:18px;width:46.5%;text-align:center;vertical-align:middle;position:relative;float:right;">'. $away_score_meta . '</div>';
	$return .= '</div>';
//	$return .= '<div style="clear:both;"></div>';
//	$return .= '<div style="' . $max_width . 'position:relative;margin-top:0px;margin-bottom:0px;border: 1px solid #ccc;">' . PHP_EOL;
//	$return .= '<div style="margin: 0px;position:absolute;display:block;bottom:0px;left:0px;height:35px;' . $max_width . $background . 'color:#fff;border-radius:0;opacity:1;' . $font_size . 'font-family:Arial;text-align:left;">';
	//$return .= '<div><img src="http://laprensa13.doap.us/wp-content/uploads/sites/2/2014/06/laprensa-280x34-1.png"></div>';
        $return .= "<!-- Marcador-Inferior-Portada-280x34 --><div id='div-gpt-ad-1404234613796-1' style='width:280px; height:34px;'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('div-gpt-ad-1404234613796-1'); });</script></div>";
	$return .= '</div>';
//	$return .= '<div class="mas-en-titles"><p><a href="' . $post_url . '">'. $title . '</a></p></div>' . PHP_EOL;
	if ($related_post)
	{
		$post_relacionado = get_post($related_post);
		if ($post_relacionado)
		{
			//$return .= 'HAY POST RELACIONADO';
			$return .= '<div id="story-no-clear" style="margin-right:4px;">';
			include('marcador-post.php');
			$return .= '</div>';
		}
		else
		{
			$return .= 'NO HAY POST RELACIONADO';
		}
	}
}
if ( $home_meta_id && $marcador_key == 'futbol_total_home_slider')
{
	if ($related_post)
	{
		$slide_link = get_permalink( $related_post );
		$slide_title = get_the_title( $related_post );
	}
	else
	{
		$slide_link = '';
		$slide_title = '';
	}
//echo 'orig_attach' . $attach_url . PHP_EOL;
//	$image = su_image_resize( $attach_url, 529, 261, true, false );
//var_dump($image);
//	$attach_url = $image['url'];
//echo $attach_url . PHP_EOL;
	$score = $home_score_meta . ' - ' . $away_score_meta;
	$slide = array(
        	'image' => $attach_url,
        	'link'  => $slide_link,
        	'title'  => $slide_title, 
		'home_team' => $home_meta,
		'away_team' => $away_meta,
		'home_logo' => $home_logo_thumb,
		'away_logo' => $away_logo_thumb,
		'score'     => $score,
        	'attach_id'  => $thumb
        );

 $slides[] = $slide;
}
}
}
else
{
	if ($marcador_key == 'activo_en_portada')
	{
		$marcadorfile = fopen('/srv/www/uploads/common/marcadorhome.php', 'w');
		fwrite($marcadorfile, PHP_EOL);
		fclose($marcadorfile);
	}
	if ( $marcador_key == 'activo_en_deportes')
	{
		$marcadorfile = fopen('/srv/www/uploads/common/marcadordeportes.php', 'w');
		fwrite($marcadorfile, PHP_EOL);
		fclose($marcadorfile);
	}
	
}
//wp_reset_query();
//wp_reset_postdata();

if ( $home_meta_id && $marcador_key == 'activo_en_portada')
{
	$marcadorfile = fopen('/srv/www/uploads/common/marcadorhome.php', 'w');
	fwrite($marcadorfile, $return . PHP_EOL);
	fclose($marcadorfile);
}
if ( $home_meta_id && $marcador_key == 'activo_en_deportes')
{
	$marcadorfile = fopen('/srv/www/uploads/common/marcadordeportes.php', 'w');
	fwrite($marcadorfile, $return . PHP_EOL);
	fclose($marcadorfile);
}
//	echo $return;
if ( $home_meta_id && $marcador_key == 'futbol_total_home_slider')
{
$fb_slider = Su_Shortcodes::futbol_slider('','',$slides);
if ($fb_slider)
{
$return2 .= '<div class="futbol-total">';
$return2 .=$fb_slider;
$return2 .='<div class="mobile-hide"><div style="clear:both;"></div><div id="div-gpt-ad-1403883993058-0" style="background-color:#ccc;width:529px; height:70px;"></div></div>';
$return2 .='</div>';
$anuncio = <<<EOT
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1403883993058-0'); });
</script>
EOT;
$return2 = $return2 . $anuncio;
}
	$marcadorslider= fopen('/srv/www/uploads/common/futbol-slider.php', 'w');
	fwrite($marcadorslider, $return2 . PHP_EOL);
	fclose($marcadorslider);
}
//var_dump( $away_team_thumb_id );
//var_dump( $home_team_thumb_id );

?>
