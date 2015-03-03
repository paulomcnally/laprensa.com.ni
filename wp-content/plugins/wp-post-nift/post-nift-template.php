<?php
/*
 * WordPress Plugin: WP-Post-NIFT
 *
 * File Written By:
 * - Juan Carlos Alvarez
 * - http://sistemastic.com
 *
 * File Information:
 * - NIFT Post/Page Template
 * - wp-content/plugins/wp-post-nift/post-nift-template.php
 */

global $text_direction;

header('Content-Type: application/xml; charset=' . get_option('blog_charset'), true);
// header('Content-Type: text/html; charset=' . get_option('blog_charset'), true);

echo '<?xml version="1.0" encoding="' . get_option('blog_charset') . '"?' . '>';
?>

<nitf><head><title><?php echo the_title(); ?></title></head><body>
<?php if (have_posts()): ?>
<?php while (have_posts()): the_post(); ?>
<body.head><hedline><hl1><?php echo the_title(); ?></hl1></hedline></body.head>
<?php post_nift_the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>
</body></nitf>