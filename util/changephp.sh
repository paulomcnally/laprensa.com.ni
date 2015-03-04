#!/bin/bash
#set -x
#ls -l /var/www/html/lpmu/wp-content/uploads/sites/2/2014/04/photo_07f6fdd137710* > /home/shawn/localfiles.txt
#cd /home/shawn
#sed -i "s#\./##g' /home/shawn/noticias-redo.txt
FILEPATH=`dirname $(readlink -f $0)`
echo $FILEPATH
FILE=$FILEPATH/phpchanges.txt
LOG=$FILEPATH/phpchanges.log
PHPFILES=('azote-import.php' 'readd-infografia-thumbnail.php' 'portada-impresa-import.php' 'infografia-import.php' 'cari-import.php' 'lptv-import.php' 'readd-caricatura-thumbnail.php' 'readd-post-thumbnail.php' 'lpimport.php' 'revsort-lpimport.php' 'suplementoimport.php' 'generate-thumbnails.php')
echo 'Changing PHP files' > $LOG

for j in ${!PHPFILES[*]};
do
  phpfile=`printf "%s" "${PHPFILES[$j]}"`
  echo $phpfile >> $LOG
  grep -rl "require_once('/var/www/html/lpmu/wp-load.php');" ./$phpfile | xargs sed -i "s#require_once('/var/www/html/lpmu/wp-load.php');#require_once(WP_PATH . 'wp-load.php');#g" >> $LOG
  grep -rl "require_once('/var/www/html/lpmu/wp-config.php');" ./$phpfile | xargs sed -i "s#require_once('/var/www/html/lpmu/wp-config.php');#require_once(WP_PATH . 'wp-config.php');#g" >> $LOG
  grep -rl "require_once('/var/www/html/lpmu/wp-includes/formatting.php');" ./$phpfile | xargs sed -i "s#require_once('/var/www/html/lpmu/wp-includes/formatting.php');#require_once(WP_PATH . 'wp-includes/formatting.php');#g" >> $LOG
  grep -rl "require_once('/home/shawn/cleanfunctions.php');" ./$phpfile | xargs sed -i "s#require_once('/home/shawn/cleanfunctions.php');#require_once(UTILPATH . 'cleanfunctions.php');#g" >> $LOG
  grep -rl "require_once('/var/www/html/lpmu/wp-admin/includes/image.php');" ./$phpfile | xargs sed -i "s#require_once('/var/www/html/lpmu/wp-admin/includes/image.php');#require_once(WP_PATH . 'wp-admin/includes/image.php');#g" >> $LOG

  echo $phpfile >> $LOG
  grep -rl "require_once( '/var/www/html/lpmu/wp-load.php' );" ./$phpfile | xargs sed -i "s#require_once( '/var/www/html/lpmu/wp-load.php' );#require_once(WP_PATH . 'wp-load.php');#g" >> $LOG
  grep -rl "require_once( '/var/www/html/lpmu/wp-config.php ');" ./$phpfile | xargs sed -i "s#require_once( '/var/www/html/lpmu/wp-config.php' );#require_once(WP_PATH . 'wp-config.php');#g" >> $LOG
  grep -rl "require_once( '/var/www/html/lpmu/wp-includes/formatting.php' );" ./$phpfile | xargs sed -i "s#require_once( '/var/www/html/lpmu/wp-includes/formatting.php' );#require_once(WP_PATH . 'wp-includes/formatting.php');#g" >> $LOG
  grep -rl "require_once( '/home/shawn/cleanfunctions.php' );" ./$phpfile | xargs sed -i "s#require_once( '/home/shawn/cleanfunctions.php');#require_once(UTILPATH . 'cleanfunctions.php' );#g" >> $LOG
  grep -rl "require_once( '/var/www/html/lpmu/wp-admin/includes/image.php' );" ./$phpfile | xargs sed -i "s#require_once( '/var/www/html/lpmu/wp-admin/includes/image.php' );#require_once(WP_PATH . 'wp-admin/includes/image.php');#g" >> $LOG

done

