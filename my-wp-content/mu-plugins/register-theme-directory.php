<?php
/*
 * This MUST USE plugin will register all themes under the default WordPress installation.
 * This plugin script and idea is copied from Bedrocks project. See description below.
 */

/**
 * Plugin Name:  Register Theme Directory
 * Plugin URI:   https://github.com/roots/bedrock/
 * Description:  Register default theme directory
 * Version:      1.0.0
 * Author:       Roots
 * Author URI:   https://roots.io/
 * License:      MIT License
 */

if (!defined('WP_DEFAULT_THEME')) {
	register_theme_directory(ABSPATH . 'wp-content/themes');
}
