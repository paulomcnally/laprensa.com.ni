<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/** x-forwarded-for enabler **/
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
$xffaddrs = explode(',',$_SERVER['HTTP_X_FORWARDED_FOR']);
$_SERVER['REMOTE_ADDR'] = $xffaddrs[0];
 }

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
// **enable db auto update
//define( 'WP_AUTO_UPDATE_CORE', false );
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'noticias');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'fr1ck0ff');

/** MySQL hostname */
//define('DB_HOST', 'test-mysql-2014-08-18.capk1cf67rj2.us-west-2.rds.amazonaws.com');
//define('DB_HOST', 'or-mysql-test.capk1cf67rj2.us-west-2.rds.amazonaws.com');
define('DB_HOST', 'data.doap.com');

//define('DB_HOST', 'daves-fivesix.capk1cf67rj2.us-west-2.rds.amazonaws.com');
//define('DB_HOST', 'or-db-424-v1b.capk1cf67rj2.us-west-2.rds.amazonaws.com');
//define('DB_HOST', 'daves-db424-read-replica.capk1cf67rj2.us-west-2.rds.amazonaws.com');
//define('DB_HOST', 'shawn-db-params.capk1cf67rj2.us-west-2.rds.amazonaws.com');
//define('DB_HOST', 'or-db-514v1a.capk1cf67rj2.us-west-2.rds.amazonaws.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define('SUNRISE', 'on');
define('W3TC_DYNAMIC_SECURITY', 'QEAdwB79skhXMkZQcILJ');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'o0ox+44z)C(sv,-MkiaZD!x>u)lU9,FZ[D]@LYB`[c>r|=4hF1[ry^hHVQWwESxu');
define('SECURE_AUTH_KEY',  'n,kvga0.RQs:j`]H@]=0UL}&]ro)>_3i7V^C$E]0SF6QtB-LjvCXyg1|BZ[$T;)/');
define('LOGGED_IN_KEY',    '&VzXV*4q.!O4{Vc/|7|N6]M&&l/:#n66;d8V,lf73%idYM r|q&Hcj^(PdWpwHB.');
define('NONCE_KEY',        'cp*Ep$|;({;n%nF6g|5}!%v>kt|bPFmPb/I|JA8~2TxgR133vf{9NOOVRAU83I6C');
define('AUTH_SALT',        '^*^Kk:`BhI jn8hIcAFL,r><KLU6M$-u#*fF`1lVmM]N~Jmv(a_GwzTp 97T$Uw%');
define('SECURE_AUTH_SALT', 'GC*ZS,.xuW-O[=b_S}nFMWcyCk3{$=)sory;sf[kY`f;+`^-ILKM-&D(ksOm)DGX');
define('LOGGED_IN_SALT',   'Rqk)qByNah~9Y9K9NV {.@E/oS`cuG|Wf.>Jg++J@wTjPSHA+W|N=;h&{|ME%5^M');
define('NONCE_SALT',       'X:(|@M}K,S;10yw|}gsU<+Za!A0k8+L9X0x!nFOPqD~apC1Nc>I=1<:>:N69<|K6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'laprensa.com.ni');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
//define( 'WP_DEFAULT_THEME', 'responsivepro' );
define( 'WP_DEFAULT_THEME', 'noticias' );
define( 'WP_MAX_MEMORY_LIMIT' , '512M' );
/** try to fix site slowness by disabling wpcron for every page load  **/
/**replaced wp-cron with an actual cronjob to run every 10 min.  **/
define('DISABLE_WP_CRON', true);

//define('COOKIE_DOMAIN', 'laprensa.com.ni');
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');


/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
