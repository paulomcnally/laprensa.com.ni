#!/bin/bash
from="no-reply@laprensa.com.ni"
to="shawn@doap.com"
subject="Boletin"
curl http://noticias.laprensa.com.ni/category/boletin -o /home/shawn/test-email.html
message=`cat /home/shawn/test-email.html`
(
echo "From: ${from}";
echo "To: ${to}";
echo "Subject: ${subject}";
echo "Content-Type: text/html";
echo "MIME-Version: 1.0";
echo "";
echo "${message}";
) | sendmail -t
