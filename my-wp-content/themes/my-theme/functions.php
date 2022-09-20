<?php
/*
 * WP entry file for theme.
 */
namespace MyTheme;

function add_resources() {
    // Add custom CSS and JS files

    // Use CDN versions
    wp_enqueue_style('fontawesome', 'https://unpkg.com/@fortawesome/fontawesome-free@6.2.0/css/all.min.css');
    wp_enqueue_style('bulmacss', 'https://unpkg.com/bulma@0.9.4/css/bulma.min.css');
    wp_enqueue_script('vuejs', 'https://unpkg.com/vue@3.2.39/dist/vue.global.js');

    // Remove unused WP CSS
    wp_dequeue_style('global-styles');
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style');
}


function init_plugin() {
    // Remove unused default WordPress items
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');

    // Note that name space is required with WP callback function
    add_action('wp_enqueue_scripts', 'MyTheme\add_resources');

	// Add main-menu
	require_once 'main-menu.php';
	MainMenu\setup();
}

// Main script entry
init_plugin();
