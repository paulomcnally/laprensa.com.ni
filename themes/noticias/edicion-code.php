<?php
//$orderdate = $_GET['fecha'];

 $monthnum = get_query_var('monthnum');
 $day_of_month = get_query_var('day');
 $_year = get_query_var('year');

//$orderdate = explode('-', $orderdate);

//$archive_month = $orderdate[0];
$archive_month = $monthnum;
//$archive_day   = $orderdate[1];
$archive_day   = $day_of_month;;
//$archive_year  = $orderdate[2];
$archive_year  = $_year;

if ( $_GET['archive_page'] == 1) {
//echo 'Mas en '.$archive_day.'-'.$archive_month.'-'.$archive_year.'<br>';
include(STYLESHEETPATH . '/edicion-buttons.php');
}
?>
