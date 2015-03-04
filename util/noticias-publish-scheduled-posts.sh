#!/bin/bash
#mysql -u root -pfr1ck0ff -h db.doap.com noticias -e "UPDATE wp_2_posts SET post_status = 'publish' WHERE post_status = 'future' AND post_date < (CONVERT_TZ(NOW(),'America/Managua','UTC'));"
mysql -u root -pfr1ck0ff -h db.doap.com noticias -e "UPDATE wp_2_posts SET post_status = 'publish' WHERE post_date_gmt > NOW() - INTERVAL 1 DAY and post_status = 'future' AND post_date_gmt < NOW();"

