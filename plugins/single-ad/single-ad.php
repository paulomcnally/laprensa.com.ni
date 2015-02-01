<?php
/*
Plugin Name: Single Page Ad Widget 300x250
Description: Insert ad based on category
*/
/* Start Adding Functions Below this Line */
// Creating the widget 
class single_ad_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'single_ad_widget',

// Widget name will appear in UI
__('Single Ad Widget', 'single_ad_widget_domain'),

// Widget description
array( 'description' => __( 'Single Ad Sidebar', 'single_ad_widget_domain' ), )
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {

	echo '<div style="background-color:#fff;width:100%;height:10px;clear:both;"></div>';
	echo '<div id="single-300x250" style="height:250px;">';
	$categories = get_the_category();
foreach ($categories as $cattemp)
{
	$category[]=$cattemp->slug;
}
if (empty($category))
{
	$category = array("single");
}
//$category = array_map(function ($ar) {return $ar['slug'];}, $categories);
	//echo $category[0]->cat_name;
//	echo '<!--' . var_dump($category) . '--!>';
        if ( in_array( 'nacionales', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-nacionales.php'); }
        else if ( in_array( 'deportes', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-deportes.php'); }
        else if ( in_array( 'internacionales', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-internacionales.php'); }
        else if ( in_array( 'economia', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-economia.php'); }
        else if ( in_array( 'politica', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-politica.php'); }
        else if ( in_array( 'espectaculo', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-espectaculo.php'); }
        else if ( in_array( 'salud', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-salud.php'); }
        else if ( in_array( 'departamentales', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-departamentales.php'); }
        else if ( in_array( 'tecnologia', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-tecnologia.php'); }
        else if ( in_array( 'ciencia', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-ciencia.php'); }
        else if ( in_array( 'opinion', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-opinion.php'); }
        else if ( in_array( 'nosotras', $category, TRUE ) ) { include(STYLESHEETPATH . '/nosotras-sidebar-300x250-ads.php'); }
        //else if ( in_array( 'nosotras', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-nosotras.php'); }
        else if ( in_array( 'aqui entre nos', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-aqui-entre-nos.php'); }
        else if ( in_array( 'aqui-entre-nos', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-aqui-entre-nos.php'); }
        else if ( in_array( 'la prensa domingo', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-la-prensa-domingo.php'); }
        else if ( in_array( 'la-prensa-domingo', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-la-prensa-domingo.php'); }
        else if ( in_array( 'empresariales', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-empresariales.php'); }
        else if ( in_array( 'promociones', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-promociones.php'); }
        else if ( in_array( 'productos', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-productos.php'); }
        else if ( in_array( 'contactanos', $category, TRUE ) ) { include(STYLESHEETPATH . '/single-sidebar-300x250-ads-contactanos.php'); }
        else {
        include(STYLESHEETPATH . '/ad-300x250-top-none.php');
        }
        //include(STYLESHEETPATH . '/single-sidebar-300x250-ads.php');

	echo "</div>";

	echo '<div style="background-color:#fff;width:100%;height:10px;clear:both;"></div>';
}
                
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class single_ad_widget ends here

// Register and load the widget
function single_ad_load_widget() {
        register_widget( 'single_ad_widget' );
}
add_action( 'widgets_init', 'single_ad_load_widget' );
