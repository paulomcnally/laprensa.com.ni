<?php
/**
 * The base configurations of the WordPress.
 *
 * This file is a custom version of the wp-config file to help
 * with setting it up for multiple environments. Inspired by
 * Leevi Grahams ExpressionEngine Config Bootstrap
 * (http://ee-garage.com/nsm-config-bootstrap)
 *
 * @package WordPress
 * @author Abban Dunne @abbandunne
 * @link http://abandon.ie/wordpress-configuration-for-multiple-environments
 */


// Define Environments - may be a string or array of options for an environment
$environments = array(
	'local'       => array('.local', 'local.'),
	'development' => 'noticias.',
	'staging'     => 'stage.',
	'preview'     => 'preview.',
);

// Get Server name
$server_name = $_SERVER['SERVER_NAME'];

foreach($environments AS $key => $env){

	if(is_array($env)){

		foreach ($env as $option){

			if(stristr($server_name, $option)){

				define('ENVIRONMENT', $key);
				
				break 2;
			}

		}

	} else {

		if(stristr($server_name, $env)){

			define('ENVIRONMENT', $key);

			break;

		}
		
	}

}

// If no environment is set default to production
if(!defined('ENVIRONMENT')) define('ENVIRONMENT', 'production');

// Define different DB connection details depending on environment
switch(ENVIRONMENT){

	case 'local':

		define('DB_NAME', 'noticias');
		define('DB_USER', 'wordpress');
		define('DB_PASSWORD', 'wordpress');
		define('DB_HOST', 'localhost');
		define('WP_DEBUG', false);

		# define('WP_SITEURL', 'http://bootstrap.local/');
		# define('WP_HOME', 'http://bootstrap.local/');
        $table_prefix  = 'wp_';

		break;

	case 'development':

		define('DB_NAME', 'noticias');
		define('DB_USER', 'root');
		define('DB_PASSWORD', 'fr1ck0ff');
        define('DB_HOST', 'or-db-424-v1b.capk1cf67rj2.us-west-2.rds.amazonaws.com');
		define('WP_DEBUG', false);
        $table_prefix  = 'wp_';

		break;

	case 'staging':

		define('DB_NAME', 'database_name_here');
		define('DB_USER', 'username_here');
		define('DB_PASSWORD', 'password_here');
		define('DB_HOST', 'localhost');

		break;

	case 'preview':

		define('DB_NAME', 'database_name_here');
		define('DB_USER', 'username_here');
		define('DB_PASSWORD', 'password_here');
		define('DB_HOST', 'localhost');

		break;

	case 'mobile':

		define('DB_NAME', 'database_name_here');
		define('DB_USER', 'username_here');
		define('DB_PASSWORD', 'password_here');
		define('DB_HOST', 'localhost');

		break;

}

// If batabase isn't defined then it will be defined here.
// Put the details for your production environment in here.
if(!defined('DB_NAME'))
	define('DB_NAME', 'database_name_here');

if(!defined('DB_USER'))
	define('DB_USER', 'username_here');

if(!defined('DB_PASSWORD'))
	define('DB_PASSWORD', 'password_here');

if(!defined('DB_HOST'))
	define('DB_HOST', 'localhost');

if(!defined('DB_CHARSET'))
	define('DB_CHARSET', 'utf8');

if(!defined('DB_COLLATE'))
	define('DB_COLLATE', '');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

if(!defined('AUTH_KEY'))
    define('AUTH_KEY',         'o0ox+44z)C(sv,-MkiaZD!x>u)lU9,FZ[D]@LYB`[c>r|=4hF1[ry^hHVQWwESxu');

if(!defined('SECURE_AUTH_KEY'))
    define('SECURE_AUTH_KEY',  'n,kvga0.RQs:j`]H@]=0UL}&]ro)>_3i7V^C$E]0SF6QtB-LjvCXyg1|BZ[$T;)/');

if(!defined('LOGGED_IN_KEY'))
    define('LOGGED_IN_KEY',    '&VzXV*4q.!O4{Vc/|7|N6]M&&l/:#n66;d8V,lf73%idYM r|q&Hcj^(PdWpwHB.');

if(!defined('NONCE_KEY'))
    define('NONCE_KEY',        'cp*Ep$|;({;n%nF6g|5}!%v>kt|bPFmPb/I|JA8~2TxgR133vf{9NOOVRAU83I6C');

if(!defined('AUTH_SALT'))
    define('AUTH_SALT',        '^*^Kk:`BhI jn8hIcAFL,r><KLU6M$-u#*fF`1lVmM]N~Jmv(a_GwzTp 97T$Uw%');

if(!defined('SECURE_AUTH_SALT'))
    define('SECURE_AUTH_SALT', 'GC*ZS,.xuW-O[=b_S}nFMWcyCk3{$=)sory;sf[kY`f;+`^-ILKM-&D(ksOm)DGX');

if(!defined('LOGGED_IN_SALT'))
    define('LOGGED_IN_SALT',   'Rqk)qByNah~9Y9K9NV {.@E/oS`cuG|Wf.>Jg++J@wTjPSHA+W|N=;h&{|ME%5^M');

if(!defined('NONCE_SALT'))
    define('NONCE_SALT',       'X:(|@M}K,S;10yw|}gsU<+Za!A0k8+L9X0x!nFOPqD~apC1Nc>I=1<:>:N69<|K6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
if(!isset($table_prefix)) $table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
if(!defined('WPLANG'))
	define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if(!defined('WP_DEBUG'))
	define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'noticias.laprensa.com.ni');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
define( 'WP_DEFAULT_THEME', 'doap-responsive-pro' );
//define( 'WP_MAX_MEMORY_LIMIT' , '512M' );
/** try to fix site slowness by disabling wpcron for every page load  **/
/**replaced wp-cron with an actual cronjob to run every 10 min.  **/
define('DISABLE_WP_CRON', true);

//define('COOKIE_DOMAIN', 'laprensa.com.ni');

define('SUNRISE', 'on');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
