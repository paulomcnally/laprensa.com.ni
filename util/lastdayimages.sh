#!/bin/bash
#set -x
cd /var/www/html/lpmu/wp-content/uploads/sites/
find . -mmin -1800 -type f > /tmp/noticias-last-3s.txt
#cd /home/shawn
cd /tmp
sed -i 's#\./##g' /tmp/noticias-last-3s.txt
sed -i '/wpcf7_captcha/d' /tmp/noticias-last-3s.txt
#FILEPATH=`dirname $(readlink -f $0)`
FILEPATH=/tmp
echo $FILEPATH
FILE=$FILEPATH/noticias-last-3s.txt
LOG=$FILEPATH/noticias-last-3s.log
i=0
while read line; do
  if [[ $line != "" ]]; then
    arr[$i]=$line
    let i=$i+1
  fi
done < "$FILE"
if [[ $i == 0 ]]
then
  exit;
fi
echo "Number of files in the array: ${#arr[*]}" >> $LOG
for i in ${!arr[*]};
do
  thumb=`printf "%s" "${arr[$i]}"`
  echo "Copying $thumb ..." >> $LOG
  /usr/bin/s3cmd put --config=/var/www/html/.s3cfg --no-check-md5 --no-encrypt -p -P -H --add-header="Expires:`date -u +"%a, %d %b %Y %H:%M:%S GMT" --date "next Year"`" --add-header='Cache-Control:max-age=31536000, public' "/var/www/html/lpmu/wp-content/uploads/sites/$thumb" "s3://laprensa.com.ni/wp-content/uploads/sites/$thumb" >> $LOG

done
#cat /dev/null > $FILE
