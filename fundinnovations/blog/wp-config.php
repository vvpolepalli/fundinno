<?php
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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'fundinno_blog');


/** MySQL database username */
//define('DB_USER', 'fundinno_blog');
define('DB_USER', 'root');


/** MySQL database password */
//define('DB_PASSWORD', 'Jdf30dj2sl81kuT');
define('DB_PASSWORD', 'root');


/** MySQL hostname */
define('DB_HOST', 'localhost');


/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
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
define('AUTH_KEY',         '7WTA+@uz3+_MTW%1ETw:W-~|2jNZ>?<  8l=ki@e}>.?Vg|>|43ii ile8 W)ejj');

define('SECURE_AUTH_KEY',  'm2V4p?u^#u:N&,43E]D4+Luh$WP)cS|}x~nc9(QyPD!m?>oCd59h%5kh=/,@)L=E');

define('LOGGED_IN_KEY',    '|#R|DD>O.umfP~Z#M+#zfu3Dy+b+ ADyga0etp<6?Q4:fW|wP;r:d|(e-jXp2c+S');

define('NONCE_KEY',        'C;wA<Tq9kF1/>g[ze@@PX},SN{vl^5pL}z-1VdNEvnl$a43tNi!SDo9-3g;+bs.x');

define('AUTH_SALT',        'HoMDd-@{T/yR>B=q7KpDhc[DT|}?;0cjk^g<|*RGq5h!Togg5pN2a]bgi4*<8m,l');

define('SECURE_AUTH_SALT', 'zyu,F,!F5cvctFzz41~BJ)DDp|%Dyq(7cI7s(t:[e,W#]|P3vTN2|&rFvJilsELz');

define('LOGGED_IN_SALT',   'mf6Dja<>6jTqYx)||.F}_pJK/p}(~PPMhNZGmJl!Pyu%5ix|5Z9[*Qe2[q`z^$x7');

define('NONCE_SALT',       'QY>)OUxi]vOD_6k<K+YfK$.t~w)9CG^0Jo|$u=^*yINPUS<&Ky2vDweG{Q~O+[.k');


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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
