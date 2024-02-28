<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Terminal Africa Hub
 * @since 1.0.0
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die('Direct access is not allowed');
}

//define constants
define('TERMINAL_THEME_VERSION', time());
define('TERMINAL_THEME_DIR', get_template_directory());
define('TERMINAL_THEME_URI', get_template_directory_uri());
//assets url
define('TERMINAL_THEME_ASSETS_URI', TERMINAL_THEME_URI . '/assets/');
define('TERMINAL_THEME_BUILD_URI', TERMINAL_THEME_URI . '/build/');
//text domain
define('TERMINAL_THEME_TEXT_DOMAIN', 'terminal-africa-hub');
//book shipment url
define('TERMINAL_BOOK_SHIPMENT_URL', 'https://terminal.africa/book-shipment/');
//track shipment url
define('TERMINAL_TRACK_SHIPMENT_URL', 'https://terminal.africa/track-shipment/');

//check if TerminalTheme class exists
if (!class_exists('TerminalTheme')) {
    require_once get_template_directory() . '/includes/terminal-africa-core.php';
    $terminalTheme = new TerminalTheme();
}
