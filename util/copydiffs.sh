#!/bin/bash
#set -x
#ls -l /var/www/html/lpmu/wp-content/uploads/sites/2/2014/04/photo_07f6fdd137710* > /home/shawn/localfiles.txt
cd /home/shawn
#sed -i 's#\./##g' /home/shawn/noticias-redo.txt
FILEPATH=`dirname $(readlink -f $0)`
echo $FILEPATH
LOG=$FILEPATH/diffs3copy.log
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
FILE=$FILEPATH/diffs-$numyear-$nummonth.txt
arr=()
i=0
while read line; do
  if [[ $line != "" ]]; then
    arr[$i]=$line
    let i=$i+1
  fi
done < "$FILE"
if [[ $i == 0 ]]; then
  echo "No files in the directory: $FILE" >> $LOG
#  exit;
fi
echo "Number of files in the array: ${#arr[*]}" >> $LOG

for i in ${!arr[*]};
  do
    thumb=`printf "%s" "${arr[$i]}"`
    xyz=${thumb:0:1}
    xthumb=${thumb:3}

    echo "xyz = $xyz" >> $LOG
    if [[ $xyz == "<" ]]; then
  #    echo $thumb >> $LOG
      echo $xthumb >> $LOG
  /usr/bin/s3cmd put --config=/var/www/html/.s3cfg --no-check-md5 --no-encrypt -p -P -H --add-header="Expires:`date -u +"%a, %d %b %Y %H:%M:%S GMT" --date "next Year"`" --add-header='Cache-Control:max-age=31536000, public' "/var/www/html/lpmu/$xthumb" "s3://laprensa.com.ni/$xthumb" >> $LOG
      echo "" >> $LOG
    fi
  done

done
done

