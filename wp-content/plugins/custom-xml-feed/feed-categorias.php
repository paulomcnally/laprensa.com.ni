<?php
/**
 * Custom XML feed generator template.
 * Modify it to fit your needs.
 */
header('Content-Type: application/xml; charset=' . get_option('blog_charset'), true);
$more = 1;

$args = array(
    'type' => 'post',
    'child_of' => 0,
    'parent' => '',
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => 1,
    'hierarchical' => 1,
    'exclude' => '',
    'include' => '',
    'number' => '',
    'taxonomy' => 'category',
    'pad_counts' => false
);

$only_show = array('destacados', 'nacionales', 'columna-del-dia','deportes', 'politica', 'economia', 'cultura', 'espectaculo', 'salud', 'departamentales', 'tecnologia', 'ciencia', 'opinion', 'nosotras', 'aqui-entre-nos', 'la-prensa-domingo');
$cats = get_categories($args);
$categories = array();
foreach ($cats as $category) {
	if(in_array($category->category_nicename, $only_show)) {
		$categories[] = $category;
	}
}

$fecha = date('Y-m-d\Th:i:s-06:00', time());

function the_category_feed($name) {
    $url = add_query_arg( array( 'feed' => 'matom', 'category_name' => $name ), home_url( '/' ) );
    echo esc_url($url);
}

echo '<?xml version="1.0" encoding="' . get_option('blog_charset') . '"?' . '>';
?>

<opml version="2.0">
<head>
  <title><?php bloginfo_rss('name'); ?></title>
  <dateCreated><?php echo $fecha ?></dateCreated>
  <dateModified><?php echo mysql2date('Y-m-d\Th:i:s-06:00', get_lastpostmodified(), false); ?></dateModified>
  <ownerName>Grupo Editorial La Prensa</ownerName>
  <ownerEmail>info@laprensa.com.ni</ownerEmail>
</head>
<body>
<?php foreach ($categories as $category) { ?>
<outline text="<?php echo $category->category_nicename; ?>" title="<?php echo $category->cat_name; ?>" xmlUrl="<?php the_category_feed($category->category_nicename); ?>" type="atom" created="<?php echo $fecha ?>" />
<?php } ?>
</body>
</opml>