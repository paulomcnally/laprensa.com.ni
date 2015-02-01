<?php
/*
Plugin Name: Site Plugin for airandplumbing.com 
Description: Site specific code changes for airandplumbing.com 
*/
/* Start Adding Functions Below this Line */
function get_doap_excerpt($limit, $dots=NULL, $chars=NULL) {
        remove_filter( 'get_the_excerpt', 'responsive_custom_excerpt_more' );
        remove_filter( 'excerpt_more', 'responsive_pro_excerpt_more_text' );
        remove_filter( 'excerpt_length', 'responsive_pro_excerpt_more_length' );
        remove_filter( 'excerpt_more', 'responsive_auto_excerpt_more' );
        remove_filter( 'excerpt_length', 'responsive_excerpt_length' );
        $theexcerpt = get_the_excerpt();
//        add_filter( 'get_the_excerpt', 'responsive_custom_excerpt_more' );
        $numwords = str_word_count($theexcerpt, 0);
        $words = str_word_count($theexcerpt, 2);
        if ($chars)
        {
                $theexcerpt = get_doap_limit_chars($theexcerpt,$limit,$dots);
        }
        else
        {
                if ($numwords > $limit)
                {
                        if ($dots && strlen($theexcerpt) > 0)
                        {
                        $dots = '...';
                        }
                        $theexcerpt = implode(' ', array_slice(explode(' ', $theexcerpt), 0, $limit)) . $dots;
                }
        }
        return $theexcerpt;
}
function get_doap_limit_chars($string, $limit, $dots=NULL) {
        $words = str_word_count($string, 2);
        if ($dots && strlen($string) > 0)
        {
                $dots = '...';
        }
        if (strlen($string) > $limit)
        {
                $wc_start = array_keys($words);
                foreach ($wc_start as $wc_pos)
                {
                        $word_end = $wc_pos - 1;
                        if ($word_end <= $limit)
                        {
                                $string_end = $word_end;
                        }
                }
                $string = substr($string,0,$string_end) . $dots;
        }
        return $string;
}
/* Stop Adding Functions Below this Line */
?>

