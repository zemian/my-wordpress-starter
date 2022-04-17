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
define( 'DB_USER', 'mydbuser' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define('AUTH_KEY',         '#DgUibSe~Rs- rDk|mPp|g X~?vZ~yjyDvkF+:hN-d,I;Ti.esKi6qXdi/KUi&_.');
define('SECURE_AUTH_KEY',  '%pt?2DvH~Dpb?%,r$OH&Hg4=b[g#@:2WT$H]ie}rq!3,<%%6UE}HY666-G}&hNc$');
define('LOGGED_IN_KEY',    '+_9(@5z1UU&)=pW7?l`ktl[UKao^dS( +=dB%||F .)b%:v%3ls-H>ltB0#<Xiqr');
define('NONCE_KEY',        'b^|[+xj{gWAI/:-,=m2ki%<--X;x6gJtV/tq+sl6v6(~|NAZce~BjRTinDRqy$gs');
define('AUTH_SALT',        '|d/`3)!_ALxTf$B8+V;(PG}d1Q+X|BS-S~1f4_*ACH6QzZ+Bi_Z?>P2y|EiCBKnp');
define('SECURE_AUTH_SALT', '@JRi;tD++5Wai3}LX-e4ni:(Wt*W[&`Q)XFs~b1TrTtJ+z|>).hh{x:)4HAqi(zL');
define('LOGGED_IN_SALT',   '/QX!.Y@HbKOb<Tx5i6A9?qc2Gm |R`IYz:c@_ `aq--w?AK=awIk}<yqpePD:5#N');
define('NONCE_SALT',       'PSslM ^ XBI#@t~7HyU];6u.t$e@jv{%fPLit|o+/THN7+@p&a2-R^LAb/G!kW`!');

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
