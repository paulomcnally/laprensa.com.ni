<?php

/*
  Plugin Name: Custom XML Feed
  Plugin URI: http://javiercorre.com/
  Description: This plugin creates a custom xml feed, designed to work with the emerald full iPhone app. The feed generated can work with special readers like a specific mobile app or your own reader, you may modify the feed-template.php to fit your needs.
  Version: 1.0
  Author: Javier Correa
  Author URI: https://twitter.com/javiercorre
  License: GPL2
 */

/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : yo@javiercorre.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/* wordpress do all the work because of the "do_feed_" prefix */

define('CUSTOM_XML_DIR', WP_PLUGIN_DIR . '/custom-xml-feed');

function the_custom_xml_post_url() {
    $url = add_query_arg(array('p' => get_the_ID(), 'post-nift' => '1'), home_url('/'));
    echo esc_url($url);
}

function the_custom_xml_categories() {
    $categories = get_the_category();
    foreach ($categories as $category) {
        echo '<category term="' . $category->category_nicename . '" label="' . $category->cat_name . '" />';
    }
}

function xmlsafe($string) {
	$replace = 	array(
		'"'=> "&quot;",
        "&" => "&amp;",
        "'"=> "&apos;",
        "<" => "&lt;",
        ">"=> "&gt;"
        );
	return strtr($string, $replace);
 
}

function the_custom_xml_summary() {
    $dom = new DOMDocument('1.0', get_option('blog_charset'));
    $summary = '<meta http-equiv="Content-Type" content="text/html; charset="' . get_option('blog_charset') . '">';
    $summary .= get_the_excerpt();
    @$dom->loadHTML($summary);
    //echo htmlentities($dom->textContent, ENT_XML1, get_option('blog_charset'));
    echo xmlsafe($dom->textContent);
}

function the_custom_xml_images() {
    global $post;
    $output = '';
    $images = get_attached_media('image');
    // Agrega las imagenes desde media
    foreach ($images as $img) {
        $info = wp_get_attachment_image_src($img->ID);
        $output .= '<link rel="enclosure" type="' . $img->post_mime_type . '" length="" href="' . $info[0] . '" title=""/>';
        $info = wp_get_attachment_image_src($img->ID, 'full');
        $output .= '<link rel="enclosure" type="' . $img->post_mime_type . '" length="" href="' . $info[0] . '" title=""/>';
        break; // Solo la primer imagen
    }
    if (strlen($output) == 0) {
        // Buscar imagen en el contenido, si existe
        $matches = '';
        preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        $src = $matches [1] [0];
        if (!empty($src)) {
            $output .= '<link rel="enclosure" type="image/jpeg" length="" href="' . $src . '" title=""/>';
        }
    }
    echo $output;
}

function the_custom_xml_post_content() {
    $dom = new DOMDocument('1.0', get_option('blog_charset'));
    $hdom = new DOMDocument('1.0', get_option('blog_charset'));
    // $dom->formatOutput = true;
    $content = '<meta http-equiv="Content-Type" content="text/html; charset="' . get_option('blog_charset') . '">';
    $content .= get_the_content_feed('atom');
    $content = preg_replace('/<iframe(.+?)src=[\"\'](.+?)[\"\'](.*?)>/', '', $content);
    $content = preg_replace('/<object[^>]*?>.*?<\/object>/', '', $content);
    $content = preg_replace('/<embed[^>]*?>.*?<\/embed>/', '', $content);
    // Nodo base para resultado
    $base = $dom->createElement('body.content');
    $dom->appendChild($base);
    // Se carga el contenido
    @$hdom->loadHTML($content);
    $xq = new DOMXPath($hdom);
    // Borrar imagenes sobrantes
    $nodos = $xq->query('//img');
    foreach ($nodos as $n) {
        $media = $dom->createElement('media');
        $media->setAttribute('mime-type', 'image');
        $nd = $dom->createElement('media-reference');
        $nd->setAttribute('mime-type', 'image/jpeg');
        $nd->setAttribute('source', $n->getAttribute('src'));
        $nd->setAttribute('width', '');
        $nd->setAttribute('height', '');
        $media->appendChild($nd);
        $nd = $dom->createElement('media-metadata');
        $nd->setAttribute('length', '');
        $nd->setAttribute('value', '0');
        $media->appendChild($nd);
        $nd = $dom->createElement('media-caption');
        $nd->nodeValue = $n->getAttribute('alt');
        $media->appendChild($nd);
        $base->appendChild($media);

        $n->parentNode->removeChild($n);
    }
    // Agregar imagenes desde media
    $images = get_attached_media('image');
    foreach ($images as $img) {
        $media = $dom->createElement('media');
        $media->setAttribute('mime-type', 'image');
        $info = wp_get_attachment_image_src($img->ID, 'full');
        $nd = $dom->createElement('media-reference');
        $nd->setAttribute('mime-type', $img->post_mime_type);
        $nd->setAttribute('source', $info[0]);
        $nd->setAttribute('width', $info[1]);
        $nd->setAttribute('height', $info[2]);
        $media->appendChild($nd);
        $nd = $dom->createElement('media-metadata');
        $nd->setAttribute('length', '');
        $nd->setAttribute('value', '0');
        $media->appendChild($nd);
        $nd = $dom->createElement('media-caption');
        $nd->nodeValue = $img->post_excerpt;
        $media->appendChild($nd);
        $base->appendChild($media);
    }
    // Borra todos los nodos de imagen agregados desde media
    $nodos = $xq->query('//figure');
    foreach ($nodos as $nd) {
        $nd->parentNode->removeChild($nd);
    }
    $nodos = $xq->query('//object');
    foreach ($nodos as $nd) {
        $nd->parentNode->removeChild($nd);
    }
    $nodos = $xq->query('//embed');
    foreach ($nodos as $nd) {
        $nd->parentNode->removeChild($nd);
    }
    $nodos = $xq->query('//iframe');
    foreach ($nodos as $nd) {
        $nd->parentNode->removeChild($nd);
    }
    $nodos = $xq->query('//script');
    foreach ($nodos as $nd) {
        $nd->parentNode->removeChild($nd);
    }
    // Se agrega el contenido de texto
    $nodos = $hdom->getElementsByTagName('body');
    if ($nodos->length > 0) {
        $body = $nodos->item(0);
        foreach ($body->childNodes as $child) {
            $t = $child->textContent;
            if (strlen(trim($t)) === 0) {
                continue;
            }
            $nd = $dom->createElement('p');
            $nd->appendChild($dom->createTextNode($child->textContent));
            $base->appendChild($nd);
        }
    }
    echo $dom->saveXML($base);
}

function custom_xml_feed_activate() {
    add_rewrite_rule('services/feed/atom/top\.xml', '?feed=matom&category_name=destacados', 'top');
    add_rewrite_rule('services/feed/atom/index\.opml', '?feed=categories', 'top');
    flush_rewrite_rules();
}

function custom_xml_feed_desactivate() {
    flush_rewrite_rules();
}

function custom_xml_reg_rule($wp_rewrite) {
    $mrules = array();
    $mrules['services/feed/atom/top\.xml'] = '?feed=matom&category_name=destacados';
    $mrules['services/feed/atom/index\.opml'] = '?feed=categories';
    $wp_rewrite->rules = array_merge($mrules, $wp_rewrite->rules);
}

function do_feed_categories() {
	if (ob_get_level()) {
		ob_end_clean();
	}
	
    load_template(CUSTOM_XML_DIR . '/feed-categorias.php');
}

function do_feed_matom() {	
	if (ob_get_level()) {
		ob_end_clean();
	}
	
    load_template(CUSTOM_XML_DIR . '/feed-atom.php');
}

function custom_xml_variables($public_query_vars) {
    $public_query_vars[] = 'post-nift';
    return $public_query_vars;
}

function custom_xml_template_redirect() {
    if (intval(get_query_var('post-nift')) == 1 && !is_404()) {
		if (ob_get_level()) {
			ob_end_clean();
		}
	
        include(CUSTOM_XML_DIR . '/post-nift-template.php');
        exit();
    }
}

function custom_xml_feed_init() {
    $categories_registered = FALSE;
    $matom_registered = FALSE;

    add_feed('categories', 'do_feed_categories');
    add_feed('matom', 'do_feed_matom');

    $rules = get_option('rewrite_rules');
    $feeds = array_keys($rules, 'index.php?&feed=$matches[1]');

    foreach ($feeds as $feed) {
        if (FALSE !== strpos($feed, 'categories')) {
            $categories_registered = TRUE;
        }

        if (FALSE !== strpos($feed, 'matom')) {
            $matom_registered = TRUE;
        }

        if ($matom_registered && $categories_registered) {
            break;
        }
    }

    if (!($matom_registered && $categories_registered)) {
        flush_rewrite_rules(FALSE);
    }
}

register_activation_hook(__FILE__, 'custom_xml_feed_activate');
register_deactivation_hook(__FILE__, 'custom_xml_feed_desactivate');

add_action('init', 'custom_xml_feed_init');
add_action('template_redirect', 'custom_xml_template_redirect', 5);
add_filter('generate_rewrite_rules', 'custom_xml_reg_rule');
add_filter('query_vars', 'custom_xml_variables');
