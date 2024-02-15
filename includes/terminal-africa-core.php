<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die('Direct access is not allowed');
}

/**
 * Terminal Africa WordPress Theme
 *  Template designed for T Hub
 * 
 * @since 1.0.0
 * @author Adeleye Ayodeji
 */

class TerminalTheme
{
    /**
     * Init
     * 
     */
    public function __construct()
    {
        //enqueue frontend scripts
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        //support menu
        add_action('after_setup_theme', array($this, 'theme_support'));
    }

    /**
     * theme_support
     * 
     */
    public function theme_support()
    {
        //add theme support
        add_theme_support('menus');
        //register menus
        register_nav_menus(
            array(
                'primary' => __('Primary Menu', 'terminal-africa-hub'),
                'footer' => __('Footer Menu', 'terminal-africa-hub')
            )
        );
    }

    /**
     * enqueue_scripts
     * 
     */
    public function enqueue_scripts()
    {
        //enqueue scripts
        wp_enqueue_style('terminal-africa-hub', TERMINAL_THEME_BUILD_URI . 'terminal-theme.css', array(), TERMINAL_THEME_VERSION, 'all');
        //enqueue scripts
        wp_enqueue_script('terminal-africa-hub-script', TERMINAL_THEME_BUILD_URI . 'terminal-theme.js', array('jquery'), TERMINAL_THEME_VERSION, true);
    }
}
