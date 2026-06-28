<?php
define( 'WP_CACHE', true );
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u572932744_qmr' );

/** Database username */
define( 'DB_USER', 'u572932744_u572932744_Vlw' );

/** Database password */
define( 'DB_PASSWORD', '285Wjhk5uv' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          ')%Nur^y7x;/o<<P:N.?lDs{gpEx=2H<y6ixc)v+U>n^18@M^zORO-BnMI~UL>jN3' );
define( 'SECURE_AUTH_KEY',   'xSuN#1>/Kn,N@(e.([V{Fb+Gi.KAjkxL? )e^8I x{@ [#(-qM._){3S5K^{6}rf' );
define( 'LOGGED_IN_KEY',     'WM#qgM7]yP$3r@ZCKCEE|tP:Osu/9.bFm*o%gRz3rPPs6-U<Fo*xyl`Trj)RY3Hp' );
define( 'NONCE_KEY',         'mSWp-=P;~gD|`u^^;>-JzSIK&*J7d$,gl0C6N:]guLZ-V1JSC0hg%x `d/#I0{:M' );
define( 'AUTH_SALT',         'mhWf)3_ZF C LH#7miYQ9^ZAEcUcvvZ3sMPfpLsBsr]swE42CCp?*5><;IJsxIjp' );
define( 'SECURE_AUTH_SALT',  'ap*n@`Q~2Ykeo&|vZA.b.3pUGtVJwTX!qPZ4=R#*_xU==k%O3^Ab~[@)Bp?:r%T:' );
define( 'LOGGED_IN_SALT',    'HfM?q%7Q:1xG%jObvS6Ws%ldIu9BLKf|~1z.08N-EmcKM=b+wT?cz%nu/~X:3UR0' );
define( 'NONCE_SALT',        '$LVr[(vn>)C3g[S)%:Z%^Sk}}46BFHB6mN3g` Fz0{y$Kf1[RBNP(<[dK_j(6A4B' );
define( 'WP_CACHE_KEY_SALT', 'xa<sah({n24X[TluK[-acfpH<*tA5wiR:@Io__7:D}u2r1BL+LxyVtwn_o-M)%SC' );


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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
