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
     * 
     */
    public function download_demo()
    {
        try {
            //check if the file exists
            if (file_exists(TERMINAL_THEME_DIR . '/assets/xml/demo-content.xml')) {
                //return the file path
                return TERMINAL_THEME_DIR . '/assets/xml/demo-content.xml';
            }
            //check WP_ALLOW_MULTISITE
            $multisite_checks = defined('WP_ALLOW_MULTISITE') ? WP_ALLOW_MULTISITE : false;
            //check multi site
            if ($multisite_checks) {
                $source = ABSPATH . "wp-content/plugins/terminal-demo/terminal-demo.xml";
                //check file exists
                if (!file_exists($source)) {
                    throw new \Exception('The demo file does not exist, please install the Terminal Demo plugin');
                }
                //return the file path
                return $source;
            }
            //source from remote
            $source = 'https://tplugtest.com/downloads/demo-content.xml';
            $destination = TERMINAL_THEME_DIR . '/assets/xml/demo-content.xml';

            $response = wp_remote_get($source);

            if (is_wp_error($response)) {
                // Handle error
                throw new \Exception($response->get_error_message());
            } else {
                $download = file_put_contents($destination, wp_remote_retrieve_body($response));
            }
            //check if the file was downloaded
            if (!$download) {
                throw new \Exception('The demo file could not be downloaded');
            }
            //return the file path
            return $destination;
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
     * import_demo
     * 
     */
    public function import_demo()
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
            $demo_file = $this->download_demo();
            if (!file_exists($demo_file)) {
                throw new \Exception('The XML file does not exist');
            }

            // Remove previous nav menus
            $this->remove_menus();

            ob_start();
            $result = $importer->import($demo_file);
            $html = ob_get_clean();

            //check WP_ALLOW_MULTISITE
            $multisite_checks = defined('WP_ALLOW_MULTISITE') ? WP_ALLOW_MULTISITE : false;
            //check multi site then leave the demo file
            if (!$multisite_checks) {
                // Remove the demo file
                $this->remove_demo();
            }

            // Return the output of the import
            return $html;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
