#!/bin/bash
#cd /var/www/html/lpmu/wp-content/plugins
#sudo find . -name *.png > /home/shawn/noticias-png-files.txt
set -x
cd /home/shawn
#sed -i 's#\./##g' /home/shawn/noticias-png-files.txt
FILEPATH=`dirname $(readlink -f $0)`
echo $FILEPATH
FILE=$FILEPATH/noticias-gif-files.txt
LOG=$FILEPATH/noticias-rem-gif-files.log
i=0
while read line; do
  if [[ $line != "" ]]; then
    arr[$i]=$line
    let i=$i+1
  fi
done < "$FILE"
if [[ $i == 0 ]]; then
  exit;
fi
echo "Number of files in the array: ${#arr[*]}" >> $LOG
for i in ${!arr[*]};
do
  thumb=`printf "%s" "${arr[$i]}"`
  echo "Copying $thumb ..." >> $LOG
  /usr/bin/s3cmd del --config=/var/www/html/.s3cfg "s3://laprensa.com.ni/$thumb" >> $LOG

done

#cat /dev/null > $FILE
