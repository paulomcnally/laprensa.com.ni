#!/bin/bash
cd /var/www/html/lpmu/wp-content/cache/minify/000002/12b6a/
sudo find . -name "*.js" > /home/shawn/noticias-js-files.txt
cd /home/shawn
sed -i 's#\./##g' /home/shawn/noticias-js-files.txt
FILEPATH=`dirname $(readlink -f $0)`
echo $FILEPATH
FILE=$FILEPATH/noticias-js-files.txt
LOG=$FILEPATH/noticias-js-files.log
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
  /usr/bin/s3cmd put --config=/var/www/html/.s3cfg --no-check-md5 --no-encrypt -m text/javascript -p -P -H --add-header="Expires:`date -u +"%a, %d %b %Y %H:%M:%S GMT" --date "next Year"`" --add-header='Cache-Control:max-age=31536000, public' "/var/www/html/lpmu/wp-content/cache/minify/000002/12b6a/$thumb" "s3://laprensa.com.ni/wp-content/cache/minify/000002/12b6a/$thumb" >> $LOG

done

#cat /dev/null > $FILE

