<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ithinkanideadb01');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '$Napha8888');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME','https://ithinkanidea.dev');
define('WP_SITEURL','https://ithinkanidea.dev');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '9w_9)(HA %~j=70B^J)2n9@xLr[-& #3uArt4SISr<]^./Qh^|;C}g8Hg+^(zS`C');
define('SECURE_AUTH_KEY',  'O3QU(Mp)+c5pPt|S:2J=;D>:GY0[A[fud#30ECL<e5Kq1h {)~!fb1QTBpIS/^(f');
define('LOGGED_IN_KEY',    'y;ddZ?Idn>c)%h=Bf0@m;6w tww23o*H}*4k8,z;~2Z*!rnQ=qkb{_ZN%hDhl#f}');
define('NONCE_KEY',        'c(y9VW%3z%;pK>l{&>:~ZY#^c>=F5<RTR&7UJdz~xKdNH;0XMu07E+ew O&yv`)~');
define('AUTH_SALT',        'P<aGNzu[qS,x#SK51 js>pF[S#]Gm[;Da1+Dc$bA>?E[(KIKI,<<CBioq3w*VoE:');
define('SECURE_AUTH_SALT', '{ZR.;T(&Dm{m@sXVgl9FO&r7n^;80GIAvm8k[Rw%C(q}nF)hxC30~S/ITv7$&d~I');
define('LOGGED_IN_SALT',   '[:sVdAINo1p8m,Ag%VkVK}ih|M!y]mZ4etUP.8.>i_c^B+gb+PVZGnYJI]fgu/fg');
define('NONCE_SALT',       '!$FyWVS@N<Z4|`E86_*q#BVd8Xp=,9X?pVJyz[/^$o)kSglrgL7$T@]RB(>qzh1I');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'vvs_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */

ini_set( 'display_errors', 'Off');
ini_set( 'error_reporting', E_ALL);
define( 'WP_DEBUG', false);
define( 'WP_DEBUG_DISPLAY', false);



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
