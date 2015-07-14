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
define('DB_NAME', 'admin_femac_2015');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost:8888');

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
define('AUTH_KEY',         'L^{#wjRda_)%vW7#71KH(],FqQnM5_k4KE1-RYnImkPr!U?=i~q.C(H#8gU QVe^');
define('SECURE_AUTH_KEY',  '}_ze5ZBnvk0)(CwB8i(; yH0&0gFSJEAv[J~J^V%Z=9{e>XEG7|t?^@UBlF]iTK|');
define('LOGGED_IN_KEY',    's2G5|oy$ly67]2o<zx7?m]3|5XPg)/m(4>N.|oO,p6^CHFt($]-BsgKH3p:>04$l');
define('NONCE_KEY',        'ILHR}.c1.kb<+_)S`WUP>p-XDS47|9Ajen[U0Z;7>8.]^:B^n7)&clsO>)nLfx6)');
define('AUTH_SALT',        '%y|2;OAn]zSet?,}dsEsxsq#o*+-l]/Pw]smN38|3G:WnAXj<[v;wD*r=5y#]2*.');
define('SECURE_AUTH_SALT', '+XX}x~^z%<rU +k%EH#mloFskIA)!ww~%$_Ux8e)_rO^k1D^$ogPp?qb]xTsK6c#');
define('LOGGED_IN_SALT',   '|KYxW>iRSUK=;aMb~v-<wCy[X1yks{,cjCE4b:,g)JNU1{y:mhGn`vX<dR4P7yua');
define('NONCE_SALT',       ';OZ;EL-,*riUCA}B9.t$<ws0HLE)ktd,n@ZYPIT+F~u;PwhDJ}?B`~J+wHok9!X[');

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
