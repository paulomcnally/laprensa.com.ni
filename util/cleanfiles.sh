#!/bin/bash
#set -x
#ls -l /var/www/html/lpmu/wp-content/uploads/sites/2/2014/04/photo_07f6fdd137710* > /home/shawn/localfiles.txt
cd /home/shawn
#sed -i 's#\./##g' /home/shawn/noticias-redo.txt
FILEPATH=`dirname $(readlink -f $0)`
echo $FILEPATH
LOG=$FILEPATH/localfiles.log
#YEAR=('2000' '2006' '2009' '2010' '2011' '2012' '2013' '2014')
YEAR=('2011')
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
FILE=$FILEPATH/localfiles-$numyear-$nummonth.txt
CLEANFILE=$FILEPATH/clean-localfiles-$numyear-$nummonth.txt

echo "" > $CLEANFILE
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
echo "" > $CLEANFILE
q=0
for i in ${!arr[*]};
  do
    thumb=`printf "%s" "${arr[$i]}"`
#  echo ${thumb##*\/var\/www\/html\/lpmu} >> $CLEANFILE
    xthumb=${thumb##*:}
  echo "q = $q"
  if [ "$xthumb" != "" ] && [ "$q" != '0' ]; then
    echo "/wp-content/uploads/sites/2/$numyear/$nummonth/${xthumb:3}" >> $CLEANFILE
  fi
  let q=$q+1
done


FILE=$FILEPATH/s3files-$numyear-$nummonth.txt
CLEANFILE=$FILEPATH/clean-s3files-$numyear-$nummonth.txt
s3arr=()
i=0
while read line; do
  if [[ $line != "" ]]; then
    s3arr[$i]=$line
    let i=$i+1
  fi
done < "$FILE"
if [[ $i == 0 ]]; then
  echo "No files in the directory: $FILE" >> $LOG
#  exit;
fi
echo "Number of files in the array: ${#s3arr[*]}" >> $LOG
echo "" > $CLEANFILE
for i in ${!s3arr[*]};
  do
    thumb=`printf "%s" "${s3arr[$i]}"`
  if [[ $thumb != "" ]]; then
    echo ${thumb##*laprensa.com.ni} >> $CLEANFILE
  fi
done


done


done

