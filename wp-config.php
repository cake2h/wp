<?php
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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mysite' );

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
define( 'AUTH_KEY',         '4:ZY[]O1N;MS.48&xH.+?5oUbXeg^I^3UN A]0z*(%wAN]R>zWAJQ|t}muPo(7V~' );
define( 'SECURE_AUTH_KEY',  '2%r6yEsuU$*nXMkr^&tmt .OMq-ihQnsg}ds[k.N/Ec* ,1YHRq9Cl1(<wX)0G[H' );
define( 'LOGGED_IN_KEY',    ')R$2|q31yhdgnZ4*]a{lYhdZz!4GWD&}geg`dq[ad/1#0QhMx_Y,VLYrW/O@?Py?' );
define( 'NONCE_KEY',        'Ke646%[h=zrZ~(@U-xMmF2<2Q:.>e4%l@^d-g5=n239UB<}cbN]q/LFgK|6wln0Y' );
define( 'AUTH_SALT',        'MV7^&-qo[6k*fMRN.ELws6dZ@SM<:]ai@c{x!!P9^&kOu0A:cuBG^x9C6vR[HGsY' );
define( 'SECURE_AUTH_SALT', 'Zc_4es|U0OBDE.VYHU).E?xAs2nVC>7x1XaeJc*;/t~N9tnM$US{-4)~=~W{Y[7;' );
define( 'LOGGED_IN_SALT',   'I5#%73]&)FlW`C[5J./r1&-|1E=$IpU4=Cq3H4V3FcA-{}-uFI8R/&u-c.{$9n$T' );
define( 'NONCE_SALT',       'rjx5!9^1Y%VRCGe)cEo%]=wCCBos&@,rF-8`:(VjB. 37X;YrLyYr25Bo~N70|S@' );

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
