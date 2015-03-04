<?php
//$conn = mysql_connect("localhost","root","");
//mysql_select_db("phppot_examples",$conn);
require_once("../wp-config.php");
require_once("../wp-load.php");
$wp->init(); $wp->parse_request(); $wp->query_posts();
$wp->register_globals(); $wp->send_headers();
get_header();
if ( !is_user_logged_in() && !user_can( get_current_user_id(), 'edit_others_posts' )) {
    echo 'Tiene que ingresar su usuario y contraseña para continuar...';
        get_footer();
} else {
$current_user = wp_get_current_user();
$username = $current_user->user_login;
$user_display_name = $current_user->display_name;
echo '<br><b>Persona corriendo la importacion: </b>' . $user_display_name . '<br><b># Usuario: </b>' . $username;
if(isset($_POST["editions"]) && $_POST["editions"]!="") {
$editions = implode(',', $_POST['editions']);
$sections = implode(',', $_POST['sections']);
}
}
echo "<br>Editions: " . $editions;
echo "<br>Sections: " . $sections;
echo "<br>";
//var_dump($_POST);
include('import-web.php');
//include('change-posts-to-idnoticia.php');
?>
