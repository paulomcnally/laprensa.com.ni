<?php
/**
 * Custom XML feed generator template.
 * Modify it to fit your needs.
 */

header('Content-Type: ' . feed_content_type('rss-http') . '; charset=' . get_option('blog_charset'), true);
$more = 1;

echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>

<root>
<language><?php bloginfo_rss( 'language' ); ?></language>
	<?php while( have_posts()) : the_post(); ?>
	<item>
		<title><?php the_title_rss() ?></title>
		<pubDate><?php echo mysql2date('d M Y H:i', get_post_time('Y-m-d H:i', true), true); ?></pubDate>
		<?php $content = get_the_content_feed('rss2'); ?>
		<description>
			<![CDATA[
			<?php echo $content; ?>
			<p>by: <?php the_author() ?></p>
			]]>
		</description>
		<link><?php the_permalink_rss() ?></link>
		<image>
			<?php if (has_post_thumbnail() ):
      		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
      		echo $image[0]; ?>
      		<?php endif; ?>
		</image>
<?php rss_enclosure(); ?>
	<?php do_action('rss2_item'); ?>
	</item>
	<?php endwhile; ?>
</root>
