<?php
/*
Plugin Name: Site Plugin for noticias.laprensa.com.ni
Description: Site specific code changes for noticias.laprensa.com.ni
*/
/* Start Adding Functions Below this Line */
// Creating the widget 
class lptv_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'lptv_widget',

// Widget name will appear in UI
__('LPTV Widget', 'lptv_widget_domain'),

// Widget description
array( 'description' => __( 'LPTV Sidebar', 'lptv_widget_domain' ), )
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo '<div class="lptv_widget-2-wrapper">';
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
//$lptv_widget_text = <<<EOD
?>
<style>
.quickhover:hover
   {
     z-index:10000 !important;
   }
.widget_lptv_widget { height:435px; }
</style>
<div class="quickhover" id="tv-box-wrapper" style="z-index:90;">
    <div id="tv-box-group" style="top:-5px;width:300px;position:relative;top:0px;z-index:90;">
        <div id="lptv-yt-box" style="position:relative;">
            <?php echo do_shortcode('[the-loop id="1645826"]'); ?>
            <div style="position:relative;float:left;max-width:292px;height:130px;">
            <?php echo do_shortcode('[doap_lptv_carousel source="category: 2682" limit="12" items="3" link="post" width="276" height="60" responsive="yes" mousewheel="no" autoplay="0" class="carousel-shawn"]'); ?>
            </div>
            <div style="position:relative;float:left;max-width:292px;height:130px;">
            <?php echo do_shortcode('[doap_lptv_carousel source="category: 70484" limit="12" items="3" link="post" width="276" height="60" responsive="yes" mousewheel="no" autoplay="0" class="carousel-shawn"]'); ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php
//EOD;
//echo __( $lptv_widget_text, 'lptv_widget_domain' );
echo $args['after_widget'];
}
                
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'lptv_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class lptv_widget ends here

// Register and load the widget
function lptv_load_widget() {
        register_widget( 'lptv_widget' );
}
add_action( 'widgets_init', 'lptv_load_widget' );
/* Stop Adding Functions Below this Line */
/*
class noticias_por_correo_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'noticias_por_correo_widget',

// Widget name will appear in UI
__('Noticias por correo Widget', 'noticias_por_correo_widget_domain'),

// Widget description
array( 'description' => __( 'Noticias por correo Sidebar', 'noticias_por_correo_widget_domain' ), )
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
//$lptv_widget_text = <<<EOD
?>
<p>
<a href="http://feeds.feedburner.com/NoticiasdeLaPrensa" rel="alternate" type="application/rss+xml">Suscribase gratis para informarse del diario acontecer nacional e internacional</a>
<div style="position:relative;float:left;"><img src="http://noticias.laprensa.com.ni/wp-content/uploads/sites/2/2014/06/sobrenegro.svg" alt="Screen Shot 2014-06-06 at 5.02.07 PM" width="40" height="30" style="margin-right:5px;" class="alignleft size-full wp-image-1145831"></div></p>
<?php
//EOD;
//echo __( $lptv_widget_text, 'lptv_widget_domain' );
echo $args['after_widget'];
}
                
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'noticias_por_correo_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class lptv_widget ends here

// Register and load the widget
function noticias_por_correo_load_widget() {
        register_widget( 'noticias_por_correo_widget' );
}
add_action( 'widgets_init', 'noticias_por_correo_load_widget' );
*/
/* Stop Adding Functions Below this Line */
?>
