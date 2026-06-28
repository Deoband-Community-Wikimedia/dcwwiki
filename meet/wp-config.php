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
define( 'DB_NAME', 'u572932744_HDstj' );

/** Database username */
define( 'DB_USER', 'u572932744_Y3Wxy' );

/** Database password */
define( 'DB_PASSWORD', 'tCjayyDAkw' );

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
define( 'AUTH_KEY',          '@o<h%i7P%2tP]u=N[wg1^8m5H+#O62W}Ldtf<[Ik`72il.-XMQw%0SlvPuX)OkjP' );
define( 'SECURE_AUTH_KEY',   '@|o]AAr{ycrUiH]=9}Km{~:.29APg]m),.;P[$*9Yd-}o?/jBZDv/,R.mQ72mVoP' );
define( 'LOGGED_IN_KEY',     'D0L^{`Dh1fi+uc^I:,^11gscoy*q=c_w-?G9Z4S8;>l+E#G,f(oH(kY2k)o[>MX-' );
define( 'NONCE_KEY',         'G.Tjp#&ID%;Y0H<;ug]?*7f(X,0GCKLphcPhMw#+G,_M]f2TcNHZdLEw3VVSW.:m' );
define( 'AUTH_SALT',         'L@Z&/!b7vz!!X~*<$l3WW=KN`BtVp9)Jc|>6)M>`0h~CTb)tX&=@T:tubv*z#L{e' );
define( 'SECURE_AUTH_SALT',  'GK7a(^3)=/L2YeI0DJ:r6O[ec8h0q.8}Crle{&.v[:4U`[?LLF~_[1`iY+&V}SeU' );
define( 'LOGGED_IN_SALT',    'bswoF9SMNo@sV$ymYt{>/Ad=,ey0bkXXqFi0#:|vv)VzM#Ru8#>H[h4iCLUvv<?)' );
define( 'NONCE_SALT',        'o>aJq;RI/3ntEZ* W3;=JA(K(8%*8ThTh>mDr.,UL!Lrx!TkI&c.@I0Kz3lBz#2Q' );
define( 'WP_CACHE_KEY_SALT', 'f^.g+&(H:o^;m(hn/1aK<9c%K]{6/fo(m; c,H(N0(VWo}r#.WU8BSiR8w1uLL9z' );


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
