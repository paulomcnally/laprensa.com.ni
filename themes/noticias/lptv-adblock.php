<script type='text/javascript'>
/* home slots */
googletag.defineSlot('/11648707/LPTV-160X600-LEFT', [160, 600], 'div-gpt-ad-1407518876253-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/LPTV-160X600-RIGHT', [160, 600], 'div-gpt-ad-1411828438990-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/LPTV-970X90-TOP', [970, 90], 'div-gpt-ad-1407518727018-0').addService(googletag.pubads());
googletag.defineSlot('/11648707/LPTV-970X90-BOTTOM', [970, 90], 'div-gpt-ad-1407519093217-0').addService(googletag.pubads());
/* botones 1-5 sidebar slots */
googletag.pubads().enableSyncRendering();
googletag.pubads().enableSingleRequest();
googletag.enableServices();
</script>
<?php
global  $wpdb; $user_id = get_current_user_id(); $qry = "SELECT identifier, websiteurl, email FROM `wp_2_wslusersprofiles` WHERE user_id = '$user_id' && provider = 'Google' && identifier IS NOT NULL && websiteurl = 'http://doap.com'"; $avalidgoogleid = $wpdb->get_results( $qry ); foreach ( $avalidgoogleid as $avalidgoogleid ) { $gid = $avalidgoogleid ->identifier; $uemail  = $avalidgoogleid ->email; $websiteurl = $avalidgoogleid ->websiteurl; }
?>
<?php
if ($gid > 10000000 )  {
        include(STYLESHEETPATH . '/page-wing-ads-loggedin.php');
        include(STYLESHEETPATH . '/top-loggedin.php');
} else {
        include(STYLESHEETPATH . '/lptv-page-wing-ads.php');
        //include(STYLESHEETPATH . '/banner-ad-widget-728x90.php');
        include(STYLESHEETPATH . '/banner-ad-widget-lptv-970x90.php');
        //include(STYLESHEETPATH . '/banner-ad-widget-lptv-270x90.php');
}

?>

