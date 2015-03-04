#!/bin/bash
cd /var/www/html/lpmu
sudo find . -name *.css > /home/shawn/noticias-css-files.txt
cd /home/shawn
sed -i 's#\./##g' /home/shawn/noticias-css-files.txt
FILEPATH=`dirname $(readlink -f $0)`
echo $FILEPATH
FILE=$FILEPATH/noticias-css-files.txt
LOG=$FILEPATH/noticias-css-files.log
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
  /usr/bin/s3cmd put --config=/var/www/html/.s3cfg --no-check-md5 --no-encrypt -m text/css -p -P -H --add-header="Expires:`date -u +"%a, %d %b %Y %H:%M:%S GMT" --date "next Year"`" --add-header='Cache-Control:max-age=31536000, public' "/var/www/html/lpmu/$thumb" "s3://laprensa.com.ni/$thumb" >> $LOG

done

#cat /dev/null > $FILE
