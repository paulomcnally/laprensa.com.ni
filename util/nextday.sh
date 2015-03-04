#!/bin/bash
#set -x
month=`date +%m`
year=`date +%Y`
day=`date +%d`
hour=`date +%H`
BUCKET="laprensalogs"
echo $year$month$day-$hour
echo $HOSTNAME
array=( admin_sql.log sql.log create_pix.log create_thumbfp.log yomama )
for i in "${array[@]}"
do
	echo $i
	FILE="/var/www/html/laprensa/logs/$i"
	#S3FILE=$(s3cmd ls s3://$BUCKET/almidon/$HOSTNAME/$i-$year$month$day-$hour)
	S3FILE=$(s3cmd ls s3://$BUCKET/almidon/$HOSTNAME/$i-$year$month$day-00)
echo $S3FILE
	if [[ ! -z "$S3FILE" ]];
	then
   	echo rm -f $FILE
	fi
done
#mv /var/www/html/laprensa/logs/sql.log /var/www/html/laprensa/logs/sql.log-$year$month$day

