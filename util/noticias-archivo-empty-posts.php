#!/usr/bin/php
<?php
define('WP_USE_THEMES', true);
define('BUCKET', 'laprensa.com.ni');
define('UTILPATH', dirname(__FILE__) . '/');
define('WP_PATH', dirname(__FILE__) . '/../');
$_SERVER[ 'HTTP_HOST' ] = 'noticias.laprensa.com.ni';
require_once(WP_PATH . 'wp-load.php');
require_once(WP_PATH . 'wp-config.php');
require_once(WP_PATH . 'wp-includes/formatting.php');
require_once(UTILPATH . 'cleanfunctions.php');
require_once(WP_PATH . 'wp-admin/includes/image.php');
switch_to_blog('2');
global $wpdb;
$start_time = date("Y-m-d H:i:s");
//$wp->register_globals();
echo $wpdb->prefix . PHP_EOL; 
$redirect_start = <<<EOD
<head>
<meta http-equiv="refresh" content="0; url=
EOD;
$redirect_end = <<<EOD
">
</head>
<body>
</body>
</html>
EOD;
//$start_date = strtotime("2005-02-16");
//$end_date = strtotime("2005-02-16");
$categories_to_import = array("nacionales", "elmundo", "sucesos", "deportes", "economia", "regionales", "editorial", "opinion", "politica", "portada");
$s3_destination_base = "s3://laprensa.com.ni";
$section=array("nacionales"=>"21", "elmundo"=>"3", "sucesos"=>"30", "deportes"=>"17", "economia"=>"31", "regionales"=>"26", "editorial"=>"23", "opinion"=>"23", "politica"=>"27", "portada"=>"32");
$remove_txt = array('<img src="/img/cuadritonaranja.gif" width="6" height="6" alt=".">','<img src="/img/cuadritonaranja.gif" width="6" height="6">');
$q = 0;
//$i = $start_date;
$articles_imported2 = $wpdb->get_results( "SELECT ID, post_date FROM `wp_2_posts` where post_date < '2006-03-26' and post_content like '%<p class=\"archivo_v1_body\"></p>' and post_type = 'post' and post_status = 'publish' limit 1500;" );
//$articles_imported2 = $wpdb->get_results( "SELECT ID, post_date FROM `wp_2_posts` where ID = 896097 limit 1;" );
//$metavals4= '"' . implode( '","', $articles_imported2) . '"';
//$last_imported = $articles_imported2['0'];
foreach ($articles_imported2 as $key => $row)
{
//for ($i = $start_date; $i <= $end_date; $i = strtotime('+1 days', $i)) {
//    echo $i;
echo 'POST DATE ' . $row->post_date . PHP_EOL . PHP_EOL;
$i = date("Y-m-d", strtotime($row->post_date));
echo 'I ' . $i . PHP_EOL . PHP_EOL;
$i = strtotime($i);
//$i = date("Y-m-d", $row->post_date);
//echo 'I ' . $i . PHP_EOL . PHP_EOL;
$post_id=$row->ID;
$news_file = get_post_meta($post_id, 'lparchivo', true);
$month = (date("n", $i)-1);
$monthspelled = strtolower(date("F", $i));
$meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
$day = date("D", $i);
$numday = date("d", $i);
$nummonth= date("m", $i);
$year = date("Y", $i);
$creacion = $year . "-" . $nummonth . "-" . $numday . " 00:01:00";
$gm_creacion = $year . "-" . $nummonth . "-" . $numday . " 06:01:00";
$thismonth = $meses[$month];
$base_dir = "/var/www/html/laprensa/lp-archivo/public_html/archivo/$year/$thismonth/$numday/";
/*
			echo $year . PHP_EOL;
			echo $numday . PHP_EOL;
			echo $day . PHP_EOL;
			echo $monthspelled . PHP_EOL;
			echo $month . PHP_EOL;
			echo $meses[$month] . PHP_EOL;
*/
//$c = strtotime('+1 days', $start_date);

			echo date("d", $i) . PHP_EOL;
if (file_exists($base_dir)) {
$dir = new DirectoryIterator($base_dir);
foreach ($dir as $fileinfo) {
    	if (!$fileinfo->isDot()) {
       		// var_dump($fileinfo->getFilename());
		$extension = strtolower(substr(strrchr($fileinfo, '.'), 1));
		if ($extension == 'html') {
			echo $fileinfo . PHP_EOL;
//			echo "HELLO!" . PHP_EOL;
			echo $fileinfo->getPath() . PHP_EOL;
			$dirinfo = $fileinfo->getPath();
			$dir_name = strtolower(substr(strrchr($dirinfo, '/'), 1));
			echo $dir_name . PHP_EOL;
		}
		if ($fileinfo->isDir()) {
			echo "Directory Name : " . $fileinfo . PHP_EOL;
			if (in_array($fileinfo, $categories_to_import)) {
//				echo PHP_EOL . PHP_EOL . strtoupper($fileinfo) . "!!!!!!!!!" . PHP_EOL . PHP_EOL;
				$cat_name = strtolower($fileinfo);
$cat_dir = $base_dir . $fileinfo . "/";
//				echo PHP_EOL . PHP_EOL . $cat_dir . PHP_EOL . PHP_EOL;



				if (file_exists($cat_dir)) {
					$catdir = new DirectoryIterator($cat_dir);
					foreach ($catdir as $catfileinfo) {
if ($catfileinfo == $news_file)
{
//					    	if (!$catfileinfo->isDot() && $catfileinfo != "index.html") {
       		// var_dump($fileinfo->getFilename());
//							$extension = strtolower(substr(strrchr($catfileinfo, '.'), 1));
//							if ($extension == 'html') {
								echo $catfileinfo . PHP_EOL;
								$cat_post_file = $catfileinfo->pathName;
								//$cat_post_file = str_replace(".html", ".info", $cat_post_file);
								$cat_dir_orig = $cat_dir;
								$cat_dir_orig = str_replace("/var/www/html/laprensa/lp-archivo/public_html", "/srv/www/uploads", $cat_dir_orig);
								$cat_post_orig = $cat_dir_orig . $catfileinfo;
								$cat_post_file = str_replace(".html", ".info", $catfileinfo);
								$cat_pic_file = str_replace(".html", ".jpg", $catfileinfo);
								$cat_post_body = $cat_dir . $cat_post_file;
								$cat_post_pic = $cat_dir . $cat_pic_file;
								//echo $cat_post_body . PHP_EOL;
//								echo $cat_post_pic . PHP_EOL;
								if (file_exists($cat_post_body)) {
									$cat_post_text = file_get_contents($cat_post_body);
									echo PHP_EOL . $creacion . PHP_EOL;


$cat_post_text = str_ireplace("\x0D", "", $cat_post_text);
$cat_post_text = str_ireplace(' alt="."', "", $cat_post_text);
$cat_post_text = mb_convert_encoding($cat_post_text, "UTF-8", "CP1252");
$cat_post_text = html_entity_decode($cat_post_text, ENT_COMPAT, "UTF-8");
if (substr_count($cat_post_text, 'img/cuadritonaranja'))
{
$orange_tag = extractTag($cat_post_text,'img/cuadritonaranja','<img','>');
}
else
{
$orange_tag = extractTag($cat_post_text,'gif/cuadritonaranja','<img','>');
}
$cat_post_text = str_ireplace($orange_tag, "<!--end--text-->", $cat_post_text);
//echo PHP_EOL . PHP_EOL . $cat_post_text . PHP_EOL . PHP_EOL;
$post_text = getTextBetween($cat_post_text, '<!--texto-->', '<!--end--text-->');
$post_text = str_ireplace('</font>', "", $post_text);
//$post_text = extractTag_CS($cat_post_text, 'size="2" face="Georgia, Times New Roman, Times, serif"', '<P><font ', '</FONT><img src="/img/cuadritonaranja.gif" width="6" height="6"></P>');
//$post_text = getTextBetween($post_text, '<P><font size="2" face="Georgia, Times New Roman, Times, serif">', '</FONT><img src="/img/cuadritonaranja.gif" width="6" height="6"></P>');
//echo PHP_EOL . PHP_EOL . $post_text . PHP_EOL . PHP_EOL;
$has_caption = substr_count($cat_post_text, 'color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size=1');
$has_intro = substr_count($cat_post_text, 'color="#333333" face="Verdana, Arial, Helvetica, sans-serif" size="2"');
$has_antetitulo = substr_count($cat_post_text, 'color="#000000" size="4" face="Georgia, Times New Roman, Times, serif"');
$has_image = substr_count($cat_post_text, $cat_pic_file);
$has_autor = substr_count($cat_post_text, 'size="1" color="#666666" face="Verdana, Arial, Helvetica, sans-serif"');
$has_title= substr_count($cat_post_text, 'color=#003399 size="5" face="Verdana, Arial, Helvetica, sans-serif');
$has_text= substr_count($cat_post_text, '<!--texto-->');
if ($has_text && $has_title)
{
	$post_text = '<p class="archivo_v1_body">' . $post_text . '</p>';
}
else
{
	$post_text = '<p class="archivo_v1_body">El texto de esta nota ya no está disponible</p>';
	$crap_posts++;
}
if ($has_intro)
{
$intro_array = extractTags($cat_post_text, 'color="#333333" face="Verdana, Arial, Helvetica, sans-serif" size="2"','<font','</font>');
	$intro_text = '<ul class="intro">' . PHP_EOL; 
foreach ($intro_array as $intro)
	{
	$clean_intro = wp_strip_all_tags($intro);
	$cat_post_text = str_replace($intro, "", $cat_post_text);
	$intro_text .= '<li>' . $clean_intro . '</li>' . PHP_EOL;
	}
$intro_text .= '</ul>' . PHP_EOL;
}
else
{
	$intro_text  = '';
}
if ($has_antetitulo)
{
$antetitulo_text = extractTag($cat_post_text, 'color="#000000" size="4" face="Georgia, Times New Roman, Times, serif"','<font','</font>');
$clean_antetitulo = wp_strip_all_tags($antetitulo_text);
$cat_post_text = str_replace($antetitulo_text , "", $cat_post_text);
}
else
{
	$clean_antetitulo  = '';
}
if ($has_caption)
{
$caption_text = extractTag($cat_post_text, 'color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size=1','<font','</FONT>');
$clean_caption= wp_strip_all_tags($caption_text);
$cat_post_text = str_replace($caption_text, "", $cat_post_text);
}
else
{
	$clean_caption = '';
}
if ($has_autor)
{
$autor_text = extractTag($cat_post_text, 'size="1" color="#666666" face="Verdana, Arial, Helvetica, sans-serif"','<p><font','</FONT></p>');
$clean_autor = wp_strip_all_tags($autor_text);
$cat_post_text = str_replace($autor_text, "", $cat_post_text);
$autor_text = '<p class="autor">' . $clean_autor . '</p>' . PHP_EOL;
}
$title = extractTag($cat_post_text, 'color=#003399 size="5" face="Verdana, Arial, Helvetica, sans-serif"','<FONT ','</FONT>');
$clean_title = wp_strip_all_tags($title);
$permalink = remove_accents($clean_title);
$cat_post_text = str_replace($title, "", $cat_post_text);
if ($has_image)
{
$pic_tag = extractTag_CS($cat_post_text, $cat_pic_file,'<IMG ','>');
$cat_post_text = str_replace($pic_tag, "", $cat_post_text );
}
$post_text = $intro_text . $autor_text . $post_text;

                $articlesection= $section[$cat_name];
                $post_status = 'publish';

                $post = array(
		  'ID'             => $post_id,
                  'comment_status' => 'closed',
                  'ping_status'    => 'closed', // 'closed' means pingbacks or trackbacks turned off
                  'post_author'    => '109',    //The user ID number of the author.
                  'post_content'   => $post_text, //The full text of the post.
                  'post_date'      => $creacion, //The time post was made.
                  'post_date_gmt'  => $gm_creacion, //The time post was made, in GMT.
                //  'post_excerpt'   => $articleexerpt, //For all your post excerpt needs.
//                  'post_name'      => $permalink, // The name (slug) for your post
                //  'post_parent'    => [ <post ID> ] //Sets the parent of the new post.
                  'post_status'    => $post_status,    //Set the status of the new post.
//                  'post_title'     => $clean_title, //The title of your post.
        //        'post_category'     => array( '1', '$articlesection', '3', '4'),  //The title of your post.
                  'post_type'      => 'post' //You may want to insert a regular post, page, link, a menu item or some custom post type
                //  'tags_input'     => $articletags //For tags.
                 // 'tax_input'      => [ array( 'taxonomy_name' => array( 'term', 'term2', 'term3' ) ) ] // support for custom taxonomies.
                );
	}
$q++;
//                $post_id = wp_insert_post($post);




$update_post_results = wp_update_post($post);

$total_posts++;


		//usleep(50000);
                echo "\n post creado - # = $post_id \n\n";
									
								}
							}
						}
					}
				}
			}
		}
    	}
}
echo "\n Importacion Completa! \n\n";
//var_dump($post);
echo PHP_EOL . "start time : $start_time";
echo PHP_EOL . "end time: " . date("Y-m-d H:i:s") . PHP_EOL;
echo $total_posts . ' Posts processed' . PHP_EOL;
echo $crap_posts . ' Posts with bad or missing data'. PHP_EOL;
?>
