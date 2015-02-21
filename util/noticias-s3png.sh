#!/bin/bash
cd /var/www/html/lpmu/wp-content/themes
sudo find . -name *.png > /home/shawn/noticias-png-files.txt
cd /home/shawn
sed -i 's#\./##g' /home/shawn/noticias-png-files.txt
FILEPATH=`dirname $(readlink -f $0)`
echo $FILEPATH
FILE=$FILEPATH/noticias-png-files.txt
LOG=$FILEPATH/noticias-png-files.log
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
  /usr/bin/s3cmd put --config=/var/www/html/.s3cfg --no-check-md5 --no-encrypt -p -P -H --add-header="Expires:`date -u +"%a, %d %b %Y %H:%M:%S GMT" --date "next Year"`" --add-header='Cache-Control:max-age=31536000, public' "/var/www/html/lpmu/wp-content/themes/$thumb" "s3://laprensa.com.ni/wp-content/themes/$thumb" >> $LOG

done

#cat /dev/null > $FILE
