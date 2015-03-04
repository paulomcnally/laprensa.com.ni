#!/bin/bash
s3cmd ls s3://laprensa.com.ni/wp-content/uploads/sites/2/2014/04/photo* > /home/shawn/s3files.txt
cd /home/shawn
#sed -i 's#\./##g' /home/shawn/noticias-redo.txt
FILEPATH=`dirname $(readlink -f $0)`
echo $FILEPATH
FILE=$FILEPATH/s3files.txt
LOG=$FILEPATH/s3files.log
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
  echo ${thumb##*laprensa.com.ni} >> $LOG
#  echo "Copying $thumb ..." >> $LOG
#  /usr/bin/s3cmd put --config=/var/www/html/.s3cfg --no-check-md5 --no-encrypt -p -P -H --add-header="Expires:`date -u +"%a, %d %b %Y %H:%M:%S GMT" --date "next Year"`" --add-header='Cache-Control:max-age=31536000, public' "$thumb" "s3://laprensa.com.ni/wp-content/uploads/sites/2/2014/04/" >> $LOG

done

#cat /dev/null > $FILE
