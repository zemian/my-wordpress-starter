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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mywordpress' );

/** Database username */
define( 'DB_USER', 'zemian' );

/** Database password */
define( 'DB_PASSWORD', 'test123' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         'a3e/^YJ7SwL|~R+R=M5j<)3h<5=-nFM8rW|- aj*<fy8+S>n,5MZkXO<A;Dmv|L%');
define('SECURE_AUTH_KEY',  'N<Tl=|k-#iKm-@j%MTL^UfviP]*c:(7J</Ed)~{qip[!bODSa7IYPFCo6NYoaH|Z');
define('LOGGED_IN_KEY',    'o+JPL3t2r`q|/ S-T>y3f~!bHoX5`tz7|VVEM|!;(-9<OIbDPW?6M?OYRbkLN|.$');
define('NONCE_KEY',        'Nq|@5(mfEh)+DZoj]TU-;}<WE537Da|7HF&4-Pmj4`D7R@3<D7}DQi#3058p~c-^');
define('AUTH_SALT',        'w_j-[F7L[r!h,<+9`Ifn+RkuTC{Y-h9:zNO9w&ZbLKGBr;S,_zjr| Dz}&4e{8`J');
define('SECURE_AUTH_SALT', 'j3g$NY(Pb^=Z-x-]rR&+vWxi&GvDTYY<-`:`B%R9E2.q~49D`~08KVVHLwjgb^tV');
define('LOGGED_IN_SALT',   '7G(Qg1 `@6)Zw^d;%;5cEb&;j6N}+Jr2!B+HXt.Dv}h5|f=.,P W&#8-4vw[jti.');
define('NONCE_SALT',       'g/`tf!)u:-|)+;_GgAFno%|i^#P`tq|Bk4JK?viaW)gpShmy[}hSS7euwil`54Pu');

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

// == Explicit WP URL
define( 'WP_HOME', 'http://localhost:8080' );
define( 'WP_SITEURL', 'http://localhost:8080/wordpress' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

// Change the wp-content and related folder locations to be outside of "wordpress"!
define( 'WP_CONTENT_DIR', realpath(ABSPATH . '../my-wp-content' ) );
define( 'WP_CONTENT_URL', WP_HOME . '/my-wp-content');

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
