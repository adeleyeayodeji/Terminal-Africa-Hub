<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Init Elementor and Elementor Widgets
 * 
 * @since 1.0.0
 * @package Terminal Africa Hub
 * @author Adeleye Ayodeji
 */

class TerminalElementor
{
    /**
     * Init
     * 
     */
    public function __construct()
    {
        //register widgets
        add_action('elementor/widgets/widgets_registered', array($this, 'register_widgets'));
        //elementor admin js
        add_action('elementor/editor/after_enqueue_scripts', array($this, 'elementor_admin_scripts'));
    }

    /**
     * register_widgets
     * 
     */
    public function register_widgets()
    {
        //get all files in widgets directory and add them here
        $widgets = glob(TERMINAL_THEME_DIR . '/elementor-support/widgets/*.php');
        //loop through the files and include them
        foreach ($widgets as $widget) {
            require_once $widget;
        }
        //include ivato theme widgets
        $ivato_widgets = glob(TERMINAL_THEME_DIR . '/elementor-support/widgets/ivato-theme/*.php');
        //loop through the files and include them
        foreach ($ivato_widgets as $ivato_widget) {
            require_once $ivato_widget;
        }

        //include maputo theme widgets
        $maputo_widgets = glob(TERMINAL_THEME_DIR . '/elementor-support/widgets/maputo-theme/*.php');
        //loop through the files and include them
        foreach ($maputo_widgets as $maputo_widget) {
            require_once $maputo_widget;
        }

        //register terminal hero widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Hero_Widget());
        //Terminal_Partners_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Partners_Widget());
        //Terminal_Services_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Services_Widget());
        //Terminal_Review_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Review_Widget());
        //Terminal_GetInTouch_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_GetInTouch_Widget());
        //Terminal_Innerpage_Header_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Innerpage_Header_Widget());
        //Terminal_Address_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Address_Widget());
        //Terminal_Contact_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Contact_Widget());
        //Terminal_FAQ_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_FAQ_Widget());
        //Terminal_Service_V2_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Service_V2_Widget());
        //Terminal_Hero_2_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Hero_2_Widget());
        //Terminal_Service_2_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Service_2_Widget());
        //Terminal_Review_V2_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Review_V2_Widget());
        //Terminal_GetInTouch_2_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_GetInTouch_2_Widget());
        //Terminal_Ivato_About_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Ivato_About_Widget());
        //Terminal_Ivato_Hero_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Ivato_Hero_Widget());
        //Terminal_Ivato_Service_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Ivato_Service_Widget());
        //Terminal_Ivato_Reviews_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Ivato_Reviews_Widget());
        //Terminal_Ivato_Book_Shipment_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Ivato_Book_Shipment_Widget());
        //Terminal_Ivato_Faqs_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Ivato_Faqs_Widget());
        //Terminal_Ivato_Inner_Services_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Ivato_Inner_Services_Widget());
        //Terminal_Ivato_Locations_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Ivato_Locations_Widget());
        //Terminal_Ivato_Map_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Ivato_Map_Widget());
        //Terminal_Ivato_Offer_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Ivato_Offer_Widget());
        //Terminal_Ivato_Send_Parcel_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Ivato_Send_Parcel_Widget());
        //Terminal_Maputo_Hero_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Maputo_Hero_Widget());
        //Terminal_Maputo_Ceo_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Maputo_CEO_Widget());
        //Terminal_Maputo_FAQ_Header_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Maputo_FAQ_Header_Widget());
        //Terminal_Maputo_Footer_CTA_Widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Terminal_Maputo_Footer_CTA_Widget());
    }

    /**
     * elementor_admin_scripts
     * 
     */
    public function elementor_admin_scripts()
    {
        wp_enqueue_script('terminal-elementor-admin', TERMINAL_THEME_ASSETS_URI . 'js/elementor_admin_scripts.js', array('jquery'), TERMINAL_THEME_VERSION, true);
    }
}
