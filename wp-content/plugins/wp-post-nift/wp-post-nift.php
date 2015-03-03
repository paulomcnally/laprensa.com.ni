<?php

/*
  Plugin Name: WP-Post-NIFT
  Plugin URI:
  Description: Displays a NIFT version of your WordPress blog's post/page.
  Version: 0.1
  Author: Alvarez Velez, Juan Carlos
  Author URI: http://sistemastic.wordpress.com
  Text Domain: wp-post-nift
  FIXME: Put the right information on plugin comments
  FIXME: Clean post content and transform the media elements
 */


/*
  Copyright 2014  Juan Carlos Alvarez  (email : alvarezvelez.juancarlos@gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

### Function: Post NIFT allowed

function is_allowed_on_nift($type) {
    $post_nift_options = get_option('post_nift_options');
    return intval($post_nift_options[$type]);
}

// <editor-fold defaultstate="collapsed" desc="Create Text Domain For Translations">
### Create Text Domain For Translations
add_action('init', 'post_nift_textdomain');

function post_nift_textdomain() {
    load_plugin_textdomain('wp-post-nift', false, 'wp-post-nift');
}

// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="NIFT Option Menu">
### Function: NIFT Option Menu
add_action('admin_menu', 'post_nift_menu');

function post_nift_menu() {
    if (function_exists('add_options_page')) {
        add_options_page(__('Post NIFT', 'wp-post-nift'), __('Post NIFT', 'wp-post-nift'), 'manage_options', 'wp-post-nift/post-nift-options.php');
    }
}

// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="Post NIFT htaccess ReWrite Rules">
### Function: Post NIFT htaccess ReWrite Rules
add_filter('generate_rewrite_rules', 'post_nift_rewrite');

function post_nift_rewrite($wp_rewrite) {
    // Print Rules For Posts
    $r_rule = '';
    $r_link = '';
    $post_nift_link = get_permalink();
    if (substr($post_nift_link, -1, 1) != '/' && substr($wp_rewrite->permalink_structure, -1, 1) != '/') {
        $post_nift_link_text = '.post-nift';
    } else {
        $post_nift_link_text = 'post-nift';
    }
    $rewrite_rules = $wp_rewrite->generate_rewrite_rule($wp_rewrite->permalink_structure . $post_nift_link_text, EP_PERMALINK);
    $rewrite_rules = array_slice($rewrite_rules, 5, 1);
    $r_rule = array_keys($rewrite_rules);
    $r_rule = array_shift($r_rule);
    $r_rule = str_replace('/trackback', '', $r_rule);
    $r_link = array_values($rewrite_rules);
    $r_link = array_shift($r_link);
    $r_link = str_replace('tb=1', 'post-nift=1', $r_link);
    $wp_rewrite->rules = array_merge(array($r_rule => $r_link), $wp_rewrite->rules);
    // Print Rules For Pages
    $page_uris = $wp_rewrite->page_uri_index();
    $uris = $page_uris[0];
    if (is_array($uris)) {
        $post_nift_page_rules = array();
        foreach ($uris as $uri => $pagename) {
            $wp_rewrite->add_rewrite_tag('%pagename%', "($uri)", 'pagename=');
            $rewrite_rules = $wp_rewrite->generate_rewrite_rules($wp_rewrite->get_page_permastruct() . '/page-nift', EP_PAGES);
            error_log(print_r($rewrite_rules, 1));
            $rewrite_rules = array_slice($rewrite_rules, 5, 1);
            $r_rule = array_keys($rewrite_rules);
            $r_rule = array_shift($r_rule);
            $r_rule = str_replace('/trackback', '', $r_rule);
            $r_link = array_values($rewrite_rules);
            $r_link = array_shift($r_link);
            $r_link = str_replace('tb=1', 'post-nift=1', $r_link);
            $post_nift_page_rules = array_merge($post_nift_page_rules, array($r_rule => $r_link));
        }
        $wp_rewrite->rules = array_merge($post_nift_page_rules, $wp_rewrite->rules);
    }
}

// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="Post NIFT Public Variables">
### Function: Post NIFT Public Variables
add_filter('query_vars', 'post_nift_variables');

function post_nift_variables($public_query_vars) {
    $public_query_vars[] = 'post-nift';
    $public_query_vars[] = 'page-nift';
    return $public_query_vars;
}

// </editor-fold>
### Function: Post NIFT Contenido

function post_nift_the_content() {
    $dom = new DOMDocument('1.0', get_option('blog_charset'));
    $hdom = new DOMDocument('1.0', get_option('blog_charset'));
    $dom->formatOutput = true;
    // $fragment = $dom->createDocumentFragment();
    $content = '<meta http-equiv="Content-Type" content="text/html; charset="'. get_option('blog_charset') . '">';
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
    if($nodos->length > 0) {
        $body = $nodos->item(0);
        foreach ($body->childNodes as $child) {
            $t = $child->textContent;
            if(strlen(trim($t)) == 0) {
                continue;
            }
            $nd = $dom->createElement('p');
            $nd->appendChild($dom->createTextNode($child->textContent));
            $base->appendChild($nd);
        }
    }
    echo $dom->saveXML($base);
}

### Function: Load WP-Post-NIFT
add_action('template_redirect', 'wp_post_nift', 5);

function wp_post_nift() {
    //if (intval(get_query_var('post-nift')) == 1 || intval(get_query_var('page-nift')) == 1) {
    if (intval(get_query_var('post-nift')) == 1 && !is_404()) {
        include(WP_PLUGIN_DIR . '/wp-post-nift/post-nift.php');
        exit();
    }
}

### Function: Can Show?

function post_nift_can($type) {
    $post_nift_options = get_option('post_nift_options');
    return intval($post_nift_options[$type]);
}

### Function: Remove Image From Text

function strip_image($content) {
    $content = preg_replace('/<img(.+?)src=[\"\'](.+?)[\"\'](.*?)>/', '', $content);
    return $content;
}

### Function: Remove Video From Text

function strip_video($content) {
    $content = preg_replace('/<object[^>]*?>.*?<\/object>/', '', $content);
    $content = preg_replace('/<embed[^>]*?>.*?<\/embed>/', '', $content);
    return $content;
}

### Function: Replace One Time Only

function str_replace_one_match($search, $replace, $content) {
    if ($pos = strpos($content, $search)) {
        return substr($content, 0, $pos) . $replace . substr($content, $pos + strlen($search));
    } else {
        return $content;
    }
}

### Function: Post NIFT Options
add_action('activate_wp-post-nift/wp-post-nift.php', 'post_nift_init');

function post_nift_init() {
    post_nift_textdomain();
    // Add Options
    $post_nift_options = array();
    $post_nift_options['links'] = 1;
    $post_nift_options['images'] = 1;
    $post_nift_options['videos'] = 0;
    $post_nift_options['disclaimer'] = sprintf(__('Copyright &copy; %s %s. All rights reserved.', 'wp-post-nift'), date('Y'), get_option('blogname'));
    add_option('post_nift_options', $post_nift_options, 'Post NIFT Options');
}