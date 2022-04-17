<?php
/**
 * This index is just a copy of the "wordpress/index.php". It duplicated here so it
 * can be use to load WordPress from the root of this project when deployed as documentRoot
 * inside a web server.
 *
 * NOTE: Without this index page, your WP_HOME will not able to load WP smoothly. You may
 * still load WP with the WP_SITEURL directly, but some preview features in Admin such as
 * Theme Customization will not able to load properly.
 */

// === Content from "wordpress/index.php" goes below this line:
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require __DIR__ . '/wordpress/wp-blog-header.php';
