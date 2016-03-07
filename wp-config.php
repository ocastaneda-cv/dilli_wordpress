<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'dilli_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'SLTV#Drr*;iO~c91y Wn]nguWv-FV+7K-9?|dGO.GJ#&^iB@+BvUUd`|3g|%u1@T');
define('SECURE_AUTH_KEY',  '}@%<06GtdrP<zcqcw-`2EF~QA%m}4@AJL%klMCL;l8)NEPGe4&w6c6,vS~Y7k2^G');
define('LOGGED_IN_KEY',    'X8q2MCU|@4W.cyjc+hX30Qmg:GffE~6Jv+](5x^}|k=~-|FK6cJ4p) gCUtX+?4i');
define('NONCE_KEY',        '  R-2SRvC_LsoP+s-W8n&|u[p85QKz-Ag[-K@o_e5rXi-N4izc+X.0!?Ob@>I+OA');
define('AUTH_SALT',        '3x#}5sT ssW3rz&7.-Hjc%x>Cchz{q[ra8)Bu#B]zhZK.(Ee%1[//b`2f@b=&RR{');
define('SECURE_AUTH_SALT', 'inNwh].Y1<7Q-o:z-+0q|Q`tuSdMt+[WI(CN8e^f-)^T(*<>ZQu5bzC?IIGN?TYJ');
define('LOGGED_IN_SALT',   'F/f3q,TrFs2{0-3d^KgR5S_t7VM41ns4,Uks*rz;~EVQ)dC+50mM$su&CI>&1k ]');
define('NONCE_SALT',       'Wc ^7/e^;Ml !iGKTPxu@|:!xx_JVZ#]wtSM4+b*ru;7&9ctCq|mDt-kF2&liq~R');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
