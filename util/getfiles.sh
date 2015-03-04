#!/bin/bash
#set -x
#ls -l /var/www/html/lpmu/wp-content/uploads/sites/2/2014/04/photo_07f6fdd137710* > /home/shawn/localfiles.txt
cd /home/shawn
#sed -i 's#\./##g' /home/shawn/noticias-redo.txt
FILEPATH=`dirname $(readlink -f $0)`
echo $FILEPATH
FILE=$FILEPATH/localfiles.txt
LOG=$FILEPATH/localfiles.log
#YEAR=('2000' '2006' '2009' '2010' '2011' '2012' '2013' '2014')
YEAR=('2010' '2011')
MONTH=('01' '02' '03' '04' '05' '06' '07' '08' '09' '10' '11' '12')
echo '' > $LOG
#for t in "${YEAR[@]}"
#count=0
#while [ "x${YEAR[count]}" != "x" ]

for j in ${!YEAR[*]};
do
  numyear=`printf "%s" "${YEAR[$j]}"`
#   echo $numyear >> $LOG


for k in ${!MONTH[*]};
do
  nummonth=`printf "%s" "${MONTH[$k]}"`
  echo $numyear/$nummonth >> $LOG
  ls -l /var/www/html/lpmu/wp-content/uploads/sites/2/$numyear/$nummonth/ > /home/shawn/localfiles-$numyear-$nummonth.txt
#  ls -l /var/www/html/lpmu/wp-content/uploads/sites/2/$numyear/ > /home/shawn/localfiles-$numyear-$nummonth.txt
  s3cmd ls s3://laprensa.com.ni/wp-content/uploads/sites/2/$numyear/$nummonth/ > /home/shawn/s3files-$numyear-$nummonth.txt
#  s3cmd ls s3://laprensa.com.ni/wp-content/uploads/sites/2/$numyear/ > /home/shawn/s3files-$numyear-$nummonth.txt

done

done

