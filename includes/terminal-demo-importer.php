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
            $demo_file = TERMINAL_THEME_DIR . '/assets/xml/demo-content.xml';
            if (!file_exists($demo_file)) {
                throw new \Exception('The XML file does not exist');
            }

            ob_start();
            $result = $importer->import($demo_file);
            $html = ob_get_clean();

            // Return the output of the import
            return $html;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
