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
define('DB_NAME', 'mysite');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'H_|Z)Yc!&Ga* D/~(A$1,57c)g RgE I+%I,<Sz{*ZE/Ze26bYn#.O_|rN(_J|i{');
define('SECURE_AUTH_KEY',  'E- ]?,NHROuZ,E&,J-eaL9lyjOZ`-$W~* x|_#sP,krSj#@a6Ax*nhyez:Fe@(3*');
define('LOGGED_IN_KEY',    'N0^/ v0&.E_KoWHgP.79/#8*Ih<u#75tM)RT5/  KLz,@:AGe FPfratKNhVl3;<');
define('NONCE_KEY',        'u(Ry]8~r;e]k{I-I;UO)_%rg-.Xbkf+IiTdeT?)qkSpyBZhn&/U0L%bt,n(QrYQ6');
define('AUTH_SALT',        '*!5La!.E}? q14xVj).8d-SC+KM|zwk&V{X# hCL F]W`?u%I-v(+8^Ten%V_ToJ');
define('SECURE_AUTH_SALT', '9=7l.%.q*9>_3 !rrEXa{5[mbVE=D^)X;rDgRq`l$u-#kz=X`H[=q;<pRcQ:;Pqu');
define('LOGGED_IN_SALT',   'x=#-U2Y4;YhE0GGdX%C7m#?7&~(zixDR+OreG-ci(ZqILWk`l2nc~.F^w$ec}ARH');
define('NONCE_SALT',       'RcdE?*_^}!Y%z?-0uhjx7c@R{.n>I{o]xqjYZa)-Ds/`:Kr{m2Z%Fz24JU&I#u%b');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
