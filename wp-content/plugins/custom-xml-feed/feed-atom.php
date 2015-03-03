<?php
/**
 * Based on:
 * Atom Feed Template for displaying Atom Posts feed.
 *
 * @package WordPress
 */
header('Content-Type: application/xml; charset=' . get_option('blog_charset'), true);
$more = 1;

echo '<?xml version="1.0" encoding="' . get_option('blog_charset') . '"?' . '>';
?>

<feed
    xmlns="http://www.w3.org/2005/Atom"
    xml:lang="<?php bloginfo_rss('language'); ?>"<?php
    /**
     * Fires at end of the Atom feed root to add namespaces.
     *
     * @since 2.0.0
     */
    do_action('atom_ns');
    ?>>
    <id><?php bloginfo('atom_url'); ?></id>
    <title><?php bloginfo_rss('name');
    wp_title_rss(); ?></title>
    <link href="<?php bloginfo_rss('url') ?>" />
    <link rel="self" type="application/atom+xml" href="<?php self_link(); ?>" />
    <subtitle><?php bloginfo_rss("description") ?></subtitle>
    <category term="Noticias, Información, Nicaragua"/>
    <updated><?php echo mysql2date('Y-m-d\TH:i:s-06:00', get_lastpostmodified('GMT'), false); ?></updated>
    <author>
        <name>Grupo Editorial La Prensa</name>
        <email>info@laprensa.com.ni</email>
    </author>
    <?php
    /**
     * Fires just before the first Atom feed entry.
     *
     * @since 2.0.0
     */
    do_action('atom_head');
    ?>
    <rights>Copyright 2014 Grupo Editorial La Prensa</rights>
    <logo>http://www.laprensa.com.ni/services/feed/atom/images/laprensa-rss.png</logo>
    <icon>http://www.laprensa.com.ni/services/feed/atom/images/laprensa-rss.png</icon>
<?php while (have_posts()) : the_post(); ?>
        <entry>
            <id><?php the_guid(); ?></id>
            <title type="text"><?php the_title_rss(); ?></title>
            <updated><?php echo get_post_modified_time('Y-m-d\TH:i:s-06:00', true); ?></updated>
            <link href="<?php the_permalink_rss() ?>" />
            <link rel="alternate" type="<?php bloginfo_rss('html_type'); ?>" href="<?php the_permalink_rss() ?>" />
    <?php the_custom_xml_categories(); ?>

            <summary type="text" xml:lang="<?php bloginfo_rss('language'); ?>"><?php the_custom_xml_summary(); ?></summary>
            <content type="text/xml" xml:lang="<?php bloginfo_rss('language'); ?>" src="<?php the_custom_xml_post_url(); ?>" /><?php
            atom_enclosure();
            /**
             * Fires at the end of each Atom feed item.
             *
             * @since 2.0.0
             */
            do_action('atom_entry');
            ?>
        <?php the_custom_xml_images(); ?>

        </entry>
<?php endwhile; ?>
</feed>
