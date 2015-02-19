<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Search Form Template
 *
 *
 * @file           searchform.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/searchform.php
 * @link           http://codex.wordpress.org/Function_Reference/get_search_form
 * @since          available since Release 1.0
 */
?>
<form action="/buscar" id="cse-search-box">
        <div>
          <input type="text" id="buscadorinput" name="q" style="position:relative;top:-3px;">
<button style="border:0;background-color:#efefef;padding:0;position:relative;top:5px;"><input type=image class="lp-sprite-v8searchboxbluebutton" style="border:0;background-color:#efefef;"></button>
        </div>
        </form>
