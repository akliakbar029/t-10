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
define( 'DB_NAME', 't-10' );

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
define( 'AUTH_KEY',         '@QQSo0&T/@zbrsH`=cXE0o65lKejjV&+xDHKJ`f fXvz[.&Vm^6$*^M0t7+tXOxF' );
define( 'SECURE_AUTH_KEY',  'm<|]jo7RjGy#+Ot,d*.4p<J1_1Hjv;5%Fy_w_WOSJ>j*0`8W-IPV<h<B#D;#1lCU' );
define( 'LOGGED_IN_KEY',    '4&,w7bULl-iC(:/K(L`99^e{TD:Gm@cUbZWuN!A|$PGhYW SNUk8WNY&J&p9Y@Kh' );
define( 'NONCE_KEY',        'iyT#b}lS$@w/,sJ[}n8UX{,-495`j%LV@=tt hkA)!NE^V n2F~2]^0Qzy?J+{3~' );
define( 'AUTH_SALT',        'XsOdP[tr1+rK7oI{W[p=xM.6Z[z{Xk`S{JRY5VMQ^`UNs` -vsK2l5,:.#d4e<1{' );
define( 'SECURE_AUTH_SALT', 'W?,=`ZM6,{G(c^Kw7DJ5:2(}& %!u_:]VBR%4E4_q[PJ`a9~qh ITA^XXF<%&?=D' );
define( 'LOGGED_IN_SALT',   ']9!`5{wc3+&I3OGYrXyxy0@M.W-SZn62|@Kc5Rj?h1F(ktF*0W$Hz5pnY[,cR;~]' );
define( 'NONCE_SALT',       'rR~U[/Q!Rj).I8LR}:Yp#__$K jx_u_,BPW~= iw93QMyfT5oF*oIJ#dRZ^eO]7u' );

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
