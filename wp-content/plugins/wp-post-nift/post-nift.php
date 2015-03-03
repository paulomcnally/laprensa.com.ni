<?php
/*
 * WordPress Plugin: WP-Post-NIFT
 * Copyright (c) 2012 Lester "GaMerZ" Chan
 *
 * File Written By:
 * - Lester "GaMerZ" Chan
 * - http://lesterchan.net
 *
 * File Information:
 * - Process Printing Page
 * - wp-content/plugins/wp-post-nift/post-nift.php
 */


### Variables
$links_text = '';

### Actions
// add_action('init', 'post_nift_content');

### Print Options
$post_nift_options = get_option('post_nift_options');
if (ob_get_level()) {
   ob_end_clean();
}

### Load Print Post/Page Template
if(file_exists(get_stylesheet_directory().'/post-nift-template.php')) {
	include(get_stylesheet_directory().'/post-nift-template.php');
} else {
	include(WP_PLUGIN_DIR.'/wp-post-nift/post-nift-template.php');
}
