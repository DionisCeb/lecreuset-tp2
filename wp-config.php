<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'lecreuset-tp2' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '/ZivsT?mPn)UJc|@HX[9j2yPY E])</DaGq$:h0b2NQIOTU}CY6r{Z ydEs+&{i%' );
define( 'SECURE_AUTH_KEY',  'ZJdI[]zi|9.t4w0.P`iiu|+aPs,63LbU.>mof,M=:SZW>Ag(*@jWisU>[.RyhyA.' );
define( 'LOGGED_IN_KEY',    'yNln/kVFbmE!|natF-ryvaX-_X~z3;DEr3S(1Fe3<C3Kn*by5j_}>Oa)Cj<nHX.9' );
define( 'NONCE_KEY',        '%YcXMmy4=fFoHWbSW%q[&Y_;V%qR0[gUvE.5kCzz J%x:OroHh?tQ-%|>f7HJ5;c' );
define( 'AUTH_SALT',        'DA?=_o{Y=YO.%4@4Fp/xP 6ghVUWky._,c^BIbJx?]*o7=-w>C/(gf2.BW@)wj)~' );
define( 'SECURE_AUTH_SALT', 'e[Kg~&kZwMo6T XX/lA6Jg.=Z,ogxl)@1.=E?8-t~{qwQF<;{eUaOe#&3A!/R@*8' );
define( 'LOGGED_IN_SALT',   'U3L1S/O,K;<p^cI;4U#}7(/DlKFo,XTG)9tB]_Lx&x=m;A91p&qw&:.4>VB^6aK[' );
define( 'NONCE_SALT',       '@XIasFS0Zs^c$*/*QQE}n<|RwCPnX3z(f-00ErR|pOB`$@MH)XV2HaKiX4RS%7=+' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
