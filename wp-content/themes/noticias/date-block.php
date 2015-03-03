<div>
<?php
date_default_timezone_set("America/Managua");
//echo date_default_timezone_get();
ini_set('default_charset', 'utf-8');
header('Content-Type: text/html; charset=utf-8' );
?>
<?php
$x = time();
$oldLocale = setlocale(LC_TIME, 'es_ES.UTF-8');
echo "<div charset=utf-8 "."id=header-date".">".ucwords(strftime("%A %d %B %Y", $x))."</div>";
setlocale(LC_TIME, $oldLocale);
?>
</div>
