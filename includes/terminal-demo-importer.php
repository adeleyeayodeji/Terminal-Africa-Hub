<?php
//security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Africa Hub Demo Importer
 * @package Terminal Africa Hub
 * @author Terminal Africa Developer
 * 
 * @since 1.0.0
 */

class TerminalDemoImporter
{
    /**
     * Download the demo file
     * @param string $demo_name
     * 
     */
    public function download_demo(string $demo_name = 'terminal-murtala-demo')
    {
        try {
            //check if the file exists
            if (file_exists(TERMINAL_THEME_DIR . '/assets/xml/' . $demo_name . '.xml')) {
                //return the file path
                return TERMINAL_THEME_DIR . '/assets/xml/' . $demo_name . '.xml';
            }

            $source = ABSPATH . "wp-content/plugins/terminal-demo/$demo_name.xml";
            //check file exists
            if (!file_exists($source)) {
                throw new \Exception('The demo file does not exist, please install the Terminal Demo plugin');
            }
            //return the file path
            return $source;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the demo file
     * 
     */
    public function remove_demo()
    {
        try {
            //check if the file exists
            if (file_exists(TERMINAL_THEME_DIR . '/assets/xml/demo-content.xml')) {
                //delete the file
                $delete = unlink(TERMINAL_THEME_DIR . '/assets/xml/demo-content.xml');
                //check if the file was deleted
                if (!$delete) {
                    throw new \Exception('The demo file could not be deleted');
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove previous nav menus
     * 
     */
    public function remove_menus()
    {
        try {
            //get all menus
            $menus = wp_get_nav_menus();
            //loop through the menus
            foreach ($menus as $menu) {
                //delete the menu
                wp_delete_nav_menu($menu->term_id);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove all created pages
     * 
     */
    public function remove_pages()
    {
        try {
            //get all pages
            $pages = get_pages();
            //loop through the pages
            foreach ($pages as $page) {
                //delete the page
                wp_delete_post($page->ID, true);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * import_demo
     * @param string $demo_name
     * 
     */
    public function import_demo(string $demo_name = null)
    {
        try {

            /** WordPress Import Administration API */
            require_once ABSPATH . 'wp-admin/includes/import.php';

            if (!class_exists('WP_Importer')) {
                $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
                if (file_exists($class_wp_importer)) {
                    require $class_wp_importer;
                }
            }

            /** Functions missing in older WordPress versions. */
            require_once ABSPATH . 'wp-content/plugins/wordpress-importer/compat.php';

            /** WXR_Parser class */
            require_once ABSPATH . 'wp-content/plugins/wordpress-importer/parsers/class-wxr-parser.php';

            /** WXR_Parser_SimpleXML class */
            require_once ABSPATH . 'wp-content/plugins/wordpress-importer/parsers/class-wxr-parser-simplexml.php';

            /** WXR_Parser_XML class */
            require_once ABSPATH . 'wp-content/plugins/wordpress-importer/parsers/class-wxr-parser-xml.php';

            /** WXR_Parser_Regex class */
            require_once ABSPATH . 'wp-content/plugins/wordpress-importer/parsers/class-wxr-parser-regex.php';

            /** WP_Import class */
            require_once ABSPATH . 'wp-content/plugins/wordpress-importer/class-wp-import.php';

            //check file exist 
            if (!file_exists(ABSPATH . 'wp-content/plugins/wordpress-importer/wordpress-importer.php')) {
                throw new \Exception('WordPress Importer plugin is not installed or activated');
            }

            if (!class_exists('WP_Import')) {
                throw new \Exception('WordPress Import class does not exist');
            }

            $importer = new WP_Import();
            // Check if the XML file exists
            $demo_file = $this->download_demo($demo_name);
            if (!file_exists($demo_file)) {
                throw new \Exception('The XML file does not exist');
            }

            // Remove previous nav menus
            $this->remove_menus();

            //remove all created pages
            $this->remove_pages();

            ob_start();
            $result = $importer->import($demo_file);
            $html = ob_get_clean();

            //check WP_ALLOW_MULTISITE
            $multisite_checks = is_multisite();
            //check multi site then leave the demo file
            if (!$multisite_checks) {
                // Remove the demo file
                $this->remove_demo();
            }

            //update theme settings
            $this->update_theme_settings($demo_name);

            // Return the output of the import
            return $html;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * update_theme_settings
     * @param string $demo_name
     * 
     * @return void
     */
    public function update_theme_settings(string $demo_name)
    {
        try {
            //check if the name is terminal-murtala-demo
            switch ($demo_name) {

                case 'terminal-murtala-demo':
                    //update wp_customize footer_background_color
                    set_theme_mod('footer_background_color', '#343434');
                    //footer_text_color
                    set_theme_mod('footer_text_color', '#ffffff');
                    //footer_logo
                    set_theme_mod('footer_logo', 'https://tplug.terminal.africa/wp-content/uploads/2024/05/Screenshot-2024-05-17-at-8.35.59 AM.png');
                    //company_address
                    set_theme_mod('company_address', 'Powered by Terminal Africa. Lagos, Nigeria.');
                    //company_email
                    set_theme_mod('company_email', 'help@terminal.africa');
                    //company_phone
                    set_theme_mod('company_phone', '+234 000 111 22');
                    //facebook_link
                    set_theme_mod('facebook_link', 'https://www.facebook.com/terminalafrica');
                    //twitter_link
                    set_theme_mod('twitter_link', 'https://x.com/terminal_africa?lang=en');
                    //instagram_link
                    set_theme_mod('instagram_link', 'https://www.instagram.com/terminal_africa/?hl=en');
                    //book_shipment_color
                    set_theme_mod('book_shipment_color', '#F47722');
                    //track_shipment_color
                    set_theme_mod('track_shipment_color', '#F47722');

                    break;

                case 'terminal-jomo-demo':
                    //update wp_customize footer_background_color
                    set_theme_mod('footer_background_color', '#102E1A');
                    //footer_text_color
                    set_theme_mod('footer_text_color', '#ffffff');
                    //footer_logo
                    set_theme_mod('footer_logo', 'https://tplug.terminal.africa/wp-content/uploads/2024/05/Frame-2380.png');
                    //company_address
                    set_theme_mod('company_address', 'Powered by Terminal Africa. Lagos, Nigeria.');
                    //company_email
                    set_theme_mod('company_email', 'help@terminal.africa');
                    //company_phone
                    set_theme_mod('company_phone', '+234 000 111 22');
                    //facebook_link
                    set_theme_mod('facebook_link', 'https://www.facebook.com/terminalafrica');
                    //twitter_link
                    set_theme_mod('twitter_link', 'https://x.com/terminal_africa?lang=en');
                    //instagram_link
                    set_theme_mod('instagram_link', 'https://www.instagram.com/terminal_africa/?hl=en');
                    //book_shipment_color
                    set_theme_mod('book_shipment_color', '#264631');
                    //track_shipment_color
                    set_theme_mod('track_shipment_color', '#264631');

                    break;

                case 'terminal-safi-demo':
                    //set header type to safi
                    set_theme_mod('header_type', 'safi');
                    //main button bg color
                    set_theme_mod('main_button_bg_color_safi', '#f7941e');
                    //main button text color
                    set_theme_mod('main_button_text_color_safi', '#ffffff');
                    //main button hover bg color
                    set_theme_mod('main_button_hover_bg_color_safi', '#333333');
                    //main button hover text color
                    set_theme_mod('main_button_hover_text_color_safi', '#ffffff');
                    //main button outline color
                    set_theme_mod('main_button_outline_color_safi', '#f7941e');
                    //main button hover outline color
                    set_theme_mod('main_button_hover_outline_color_safi', '#333333');

                    //update wp_customize footer_background_color
                    set_theme_mod('footer_background_color', '#343434');
                    //footer_text_color
                    set_theme_mod('footer_text_color', '#ffffff');
                    //set footer type to safi
                    set_theme_mod('footer_type', 'safi');

                    //footer_logo
                    set_theme_mod('footer_logo', 'http://tplug.terminal.africa/wp-content/uploads/2025/02/logo-full.png');
                    //company_address
                    set_theme_mod('company_address', '123, Company Street, Company City, Company Country');
                    //company_email
                    set_theme_mod(
                        'company_email',
                        'help@terminal.africa'
                    );
                    //company_phone
                    set_theme_mod(
                        'company_phone',
                        '+234 000 111 22'
                    );
                    //facebook_link
                    set_theme_mod(
                        'facebook_link',
                        'https://www.facebook.com/terminalafrica'
                    );
                    //twitter_link
                    set_theme_mod('twitter_link', 'https://x.com/terminal_africa?lang=en');
                    //instagram_link
                    set_theme_mod('instagram_link', 'https://www.instagram.com/terminal_africa/?hl=en');

                    break;

                case 'terminal-maputo-demo':
                    //set header type to maputo
                    set_theme_mod('header_type', 'maputo');
                    //maputo_header_background_color
                    set_theme_mod('maputo_header_background_color', '#0a010e');
                    //maputo_header_text_color
                    set_theme_mod('maputo_header_text_color', '#ffffff');
                    //maputo_header_button_color
                    set_theme_mod('maputo_header_button_color', '#f7941e');
                    //maputo_header_button_text_color
                    set_theme_mod('maputo_header_button_text_color', '#ffffff');
                    //maputo_header_button_hover_color
                    set_theme_mod('maputo_header_button_hover_color', '#333333');
                    //maputo_header_button_hover_text_color
                    set_theme_mod('maputo_header_button_hover_text_color', '#ffffff');
                    //maputo_login_background_color
                    set_theme_mod('maputo_login_background_color', '#3d3d3d');
                    //maputo_login_text_color
                    set_theme_mod('maputo_login_text_color', '#ffffff');
                    //maputo_login_background_hover_color
                    set_theme_mod('maputo_login_background_hover_color', '#636363');
                    //maputo_login_text_hover_color
                    set_theme_mod('maputo_login_text_hover_color', '#ffffff');
                    //maputo_sign_up_background_color
                    set_theme_mod('maputo_sign_up_background_color', '#ffffff');
                    //maputo_sign_up_text_color
                    set_theme_mod('maputo_sign_up_text_color', '#000000');
                    //maputo_sign_up_background_hover_color
                    set_theme_mod('maputo_sign_up_background_hover_color', '#dddddd');
                    //maputo_sign_up_text_hover_color
                    set_theme_mod('maputo_sign_up_text_hover_color', '#000000');

                    //update wp_customize footer_background_color
                    set_theme_mod('footer_background_color', '#0a010e');
                    //footer_text_color
                    set_theme_mod('footer_text_color', '#ffffff');
                    //set footer type to maputo
                    set_theme_mod('footer_type', 'maputo');
                    //footer_icon_color
                    set_theme_mod('footer_icon_color', '#ffffff');
                    //footer_icon_background_color
                    set_theme_mod('footer_icon_background_color', '#0a010e');

                    //company_address
                    set_theme_mod('company_address', '123, Company Street, Company City, Company Country');
                    //company_email
                    set_theme_mod(
                        'company_email',
                        'help@terminal.africa'
                    );
                    //company_phone
                    set_theme_mod(
                        'company_phone',
                        '+234 000 111 22'
                    );
                    //facebook_link
                    set_theme_mod(
                        'facebook_link',
                        'https://www.facebook.com/terminalafrica'
                    );
                    //twitter_link
                    set_theme_mod('twitter_link', 'https://x.com/terminal_africa?lang=en');
                    //instagram_link
                    set_theme_mod('instagram_link', 'https://www.instagram.com/terminal_africa/?hl=en');

                    break;
                case 'terminal-ivato-demo':
                    //set header type to maputo
                    set_theme_mod('header_type', '2');
                    //set Header Design
                    set_theme_mod('header_design', 'ivato-header');
                    //set book_shipment_color
                    set_theme_mod('book_shipment_color', '#00aff0');
                    //set book_shipment_hover_color
                    set_theme_mod('book_shipment_hover_color', '#000000');
                    //track_shipment_color
                    set_theme_mod('track_shipment_color', '#000000');
                    //set track_shipment_hover_color
                    set_theme_mod('track_shipment_hover_color', '#686868');
                    //set footer type
                    set_theme_mod('footer_type', '2');
                    //set footer_icon_color
                    set_theme_mod('footer_icon_color', '#ffffff');
                    //set footer_icon_background_color
                    set_theme_mod('footer_icon_background_color', '#333333');
                    //set footer_background_color
                    set_theme_mod('footer_background_color', '#efefec');
                    //set footer_text_color
                    set_theme_mod('footer_text_color', '#333333');
                    //set footer_copyright_color
                    set_theme_mod('footer_copyright_color', '#b8b3a7');

                    //company_address
                    set_theme_mod('company_address', '123, Company Street, Company City, Company Country');
                    //company_email
                    set_theme_mod(
                        'company_email',
                        'help@terminal.africa'
                    );
                    //company_phone
                    set_theme_mod(
                        'company_phone',
                        '+234 000 111 22'
                    );
                    //facebook_link
                    set_theme_mod(
                        'facebook_link',
                        'https://www.facebook.com/terminalafrica'
                    );
                    //twitter_link
                    set_theme_mod('twitter_link', 'https://x.com/terminal_africa?lang=en');
                    //instagram_link
                    set_theme_mod('instagram_link', 'https://www.instagram.com/terminal_africa/?hl=en');

                    break;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
