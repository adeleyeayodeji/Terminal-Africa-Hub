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
        //init theme
        $this->init();
    }

    /**
     * Elementor Missing Checker
     * 
     */
    public function elementor_missing_checker()
    {
        //check if plugin is installed
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
        //get plugins
        $plugins = get_plugins();
        //check if elementor is installed
        if (isset($plugins['elementor/elementor.php'])) {
            //check if the plugin is activated
            if (!is_plugin_active('elementor/elementor.php')) {
                //add admin notice
                add_action('admin_notices', array($this, 'elementor_missing_notice'));
            }
        } else {
            //add admin notice
            add_action('admin_notices', array($this, 'elementor_missing_notice'));
        }
    }

    /**
     * Elementor Missing Notice
     * 
     */
    public function elementor_missing_notice()
    {
        //check WP_ALLOW_MULTISITE
        $multisite_checks = is_multisite();
        //check multi site
        if ($multisite_checks) {
            $view = "install-elementor-multisite";
        } else {
            $view = "install-elementor";
        }
        ob_start();
        require_once TERMINAL_THEME_DIR . '/templates/notice/' . $view . '.php';
        echo ob_get_clean();
    }

    /**
     * Init Theme
     * 
     */
    public function init()
    {
        //create custom url preview_header
        add_action('init', [$this, 'custom_rewrite_rule']);
        //register query vars
        add_filter('query_vars', [$this, 'register_query_vars']);
        //check if elementor plugin is installed
        if (class_exists('Elementor\Plugin')) {
            //init elementor
            $this->init_elementor();
        } else {
            //add admin notice
            add_action('init', array($this, 'elementor_missing_checker'));
        }
        //enqueue frontend scripts
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        //enqueue admin scripts
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
        //support menu
        add_action('after_setup_theme', array($this, 'theme_support'));
        //add custom page on customiser
        add_action('customize_register', array($this, 'terminal_africa_customizer'));
        //terminal footer customize_register
        add_action('customize_register', array($this, 'terminal_footer_customizer'));
        //wp head
        add_action('wp_head', array($this, 'terminal_africa_customizer_styles'), PHP_INT_MAX);
        //customizer scripts
        add_action('customize_controls_enqueue_scripts', array($this, 'terminal_africa_customizer_scripts'), PHP_INT_MAX);
        //check page init
        add_action('after_setup_theme', array($this, 'check_page_init'));
        //add ajax terminal_hub_contact_form
        add_action('wp_ajax_terminal_hub_contact_form', array($this, 'terminal_hub_contact_form'));
        //wp ajax terminal_import_demo
        add_action('wp_ajax_terminal_import_demo', array($this, 'terminal_import_demo'));
        //add admin menu for theme customiser
        add_action('admin_menu', array($this, 'terminal_africa_theme_menu'));
        //api init
        add_action('rest_api_init', array($this, 'terminal_africa_api_init'));
        //parse request
        add_action('parse_request', array($this, 'parse_request'));
    }

    /**
     * Format faq html
     * 
     */
    public static function format_faq_html($answer)
    {
        //check for http or https and add link
        $url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i';
        $email = '/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})/i';
        $uppercase = '/\b([A-Z]+)\b/';
        //convert all “ to "
        $content = str_replace('“', '"', $answer);
        //convert all ” to "
        $content = str_replace('”', '"', $content);
        // Make URLs clickable
        $content = preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $content);
        // Make emails clickable
        $content = preg_replace($email, '<a href="mailto:$1">$1</a>', $content);
        // Make uppercase text bold
        $content = preg_replace($uppercase, '<b>$1</b>', $content);
        //get all uppercase text and make them bold
        $content = preg_replace($uppercase, '<b>$1</b>', $content);
        //add line breaks
        return nl2br($content);
    }

    /**
     * register_query_vars
     * 
     */
    public function register_query_vars($vars)
    {
        $vars[] = 'preview_header';
        $vars[] = 'preview_footer';
        return $vars;
    }

    /**
     * parse_request
     * 
     */
    public function parse_request()
    {
        global $wp;

        if (array_key_exists('preview_header', $wp->query_vars)) {
            echo $this->site_header();
            exit;
        }

        if (array_key_exists('preview_footer', $wp->query_vars)) {
            echo $this->site_footer();
            exit;
        }
    }

    /**
     * custom_rewrite_rule
     * 
     */
    public function custom_rewrite_rule()
    {
        //rule for preview-header
        add_rewrite_rule('^preview-header/?$', 'index.php?preview_header=true', 'top');
        //rule for preview-footer
        add_rewrite_rule('^preview-footer/?$', 'index.php?preview_footer=true', 'top');
        //flush_rewrite_rules
        flush_rewrite_rules();
    }

    /**
     * terminal_africa_api_init
     * 
     */
    public function terminal_africa_api_init()
    {
        //register route
        register_rest_route('terminal-africa/v1', '/site-content', array(
            'methods' => WP_REST_Server::READABLE,
            'callback' => array($this, 'terminal_hub_site_content_api'),
            'permission_callback' => '__return_true'
        ));
    }

    /**
     * terminal_hub_site_content_api
     * 
     */
    public function terminal_hub_site_content_api($request)
    {

        //return the content
        return new WP_REST_Response([
            'header' => [
                'header_details' => 'The header carries the assets of the site such as the logo, navigation, and other important assets',
                'preview_header_url' => home_url('preview-header'),
                'site_header_content' => $this->site_header()
            ],
            'footer' => [
                'footer_details' => 'The footer carries just the content of the site footer along with javascripts for navigations',
                'preview_footer_url' => home_url('preview-footer'),
                'site_footer_content' => $this->site_footer()
            ]
        ]);
    }

    /**
     * Site header
     * 
     */
    public function site_header()
    {
        ob_start();
        get_header();
        //get the content
        return ob_get_clean();
    }

    /**
     * Site footer
     * 
     */
    public function site_footer()
    {
        ob_start();
        get_footer();
        //get the content
        return ob_get_clean();
    }

    /**
     * terminal_africa_theme_menu
     * 
     */
    public function terminal_africa_theme_menu()
    {
        add_theme_page(
            'Import Demo',
            'Import Demo',
            'manage_options',
            'terminal-africa-hub',
            array($this, 'terminal_africa_hub_page'),
            3
        );
    }

    /**
     * terminal_africa_hub_page
     * 
     */
    public function terminal_africa_hub_page()
    {
        ob_start();
        require_once TERMINAL_THEME_DIR . '/templates/admin/terminal-africa-hub.php';
        echo ob_get_clean();
    }

    /**
     * terminal_import_demo
     * 
     */
    public function terminal_import_demo()
    {
        try {
            //check nonce
            if (!check_ajax_referer('terminal-africa-theme-admin-nonce', 'nonce')) {
                wp_send_json_error(array(
                    'message' => 'Nonce verification failed'
                ));
            }
            //require terminal import demo
            require_once TERMINAL_THEME_DIR . '/includes/terminal-demo-importer.php';

            //check method exist wordpress_importer_init
            if (!function_exists('wordpress_importer_init')) {
                wp_send_json_error(array(
                    'message' => 'Wordpress Importer not found'
                ));
            }

            //get demo_id
            $demo_id = sanitize_text_field($_POST['demo_id']);

            //import demo content
            $importer = new TerminalDemoImporter();
            $html = $importer->import_demo($demo_id);

            //check if html has 'Have fun!'
            if (strpos($html, 'Have fun!') !== false) {
                //update option
                update_option('terminal_hub_demo_imported', 'yes');
                //save active $demo_id
                update_option('terminal_hub_active_demo', $demo_id);
                //send success message
                wp_send_json_success(array(
                    'message' => 'Demo content imported successfully'
                ));
            } else {
                //delete option terminal_hub_demo_imported
                delete_option('terminal_hub_demo_imported');
                //delete active $demo_id
                delete_option('terminal_hub_active_demo');
                //send error message
                wp_send_json_error(array(
                    'message' => 'Demo content could not be imported',
                    'html' => $html
                ));
            }
        } catch (\Exception $e) {
            wp_send_json_error(array(
                'message' => "Error: {$e->getMessage()}"
            ));
        }
    }

    /**
     * deactivate
     * 
     */
    public function deactivate()
    {
        //delete option terminal-first-init
        delete_option('terminal-first-init');
        //delete option terminal_hub_demo_imported
        delete_option('terminal_hub_demo_imported');
        //delete demo id
        delete_option('terminal_hub_active_demo');
    }

    /**
     * activate
     * 
     */
    public function activate()
    {
        //delete option terminal-first-init
        delete_option('terminal-first-init');
        //delete option terminal_hub_demo_imported
        delete_option('terminal_hub_demo_imported');
        //delete demo id
        delete_option('terminal_hub_active_demo');
    }

    /**
     * after_theme_initilized
     * 
     */
    public function after_theme_initilized()
    {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
        //check plugin is install
        $plugins = get_plugins();
        if (isset($plugins['wordpress-importer/wordpress-importer.php'])) {
            //check if the plugin is activated
            if (!is_plugin_active('wordpress-importer/wordpress-importer.php')) {
                //add admin notice
                add_action('admin_notices', array($this, 'wordpress_importer_missing_notice'));
                //return
                return;
            }

            //check if the user has already imported the demo content
            $imported = get_option('terminal_hub_demo_imported', 'no');
            if ($imported == 'no') {
                //add admin notice
                add_action('admin_notices', array($this, 'demo_import_notice'));
            }
        } else {
            //add admin notice
            add_action('admin_notices', array($this, 'wordpress_importer_missing_notice'));
        }
    }

    /**
     * wordpress_importer_missing_notice
     * 
     */
    public function wordpress_importer_missing_notice()
    {
        //check WP_ALLOW_MULTISITE
        $multisite_checks = is_multisite();
        //check multi site
        if ($multisite_checks) {
            $view = "install-importer-multisite";
        } else {
            $view = "install-importer";
        }
        ob_start();
        require_once TERMINAL_THEME_DIR . '/templates/notice/' . $view . '.php';
        echo ob_get_clean();
    }

    /**
     * demo_import_notice
     * 
     */
    public function demo_import_notice()
    {
        ob_start();
        require_once TERMINAL_THEME_DIR . '/templates/notice/demo-import.php';
        echo ob_get_clean();
    }

    /**
     * terminal_hub_contact_form
     * 
     */
    public function terminal_hub_contact_form()
    {
        //check nonce
        if (!check_ajax_referer('terminal-africa-theme-nonce', 'nonce')) {
            wp_send_json_error(array(
                'message' => 'Nonce verification failed'
            ));
        }
        //get form data
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);
        //send email
        $to = get_option('thub_admin_email');
        //check $to valid
        if (empty($to)) {
            wp_send_json_error(array(
                'message' => 'Unable to send email, please check the admin email address and try again'
            ));
        }
        $subject = 'Contact Request From - ' . $email;
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $body = 'Name: ' . $name . '<br/>';
        $body .= 'Email: ' . $email . '<br/>';
        $body .= 'Message: ' . $message . '<br/>';

        //send email
        $send = wp_mail($to, $subject, $body, $headers);
        if ($send) {
            wp_send_json_success(array(
                'message' => 'Message sent successfully'
            ));
        } else {
            //get error message from $send
            wp_send_json_error(array(
                'message' => 'Message could not be sent, please try again'
            ));
        }
    }

    /**
     * check_page_init
     * 
     */
    public function check_page_init()
    {
        //check if page url match elementor-app
        $current_url = $_SERVER['REQUEST_URI'];
        //get option terminal-first-init
        $first_init = get_option('terminal-first-init', false);
        if (strpos($current_url, 'elementor-app') !== false && $first_init === false) {
            //add option terminal-first-init
            add_option('terminal-first-init', true);
            //redirect to wp admin
            wp_redirect(admin_url());
            exit;
        }
    }

    /**
     * init_elementor
     * 
     */
    public function init_elementor()
    {
        //include the class file
        require_once TERMINAL_THEME_DIR . '/elementor-support/elementor-core.php';
        //init elementor
        new TerminalElementor();

        //wp
        add_action(
            'init',
            array($this, 'after_theme_initilized')
        );
    }

    /**
     * terminal_africa_customizer_scripts
     * 
     */
    public function terminal_africa_customizer_scripts()
    {
        wp_enqueue_script('terminal-africa-customizer', TERMINAL_THEME_ASSETS_URI . 'js/customizer.js', array('jquery', 'customize-controls'), TERMINAL_THEME_VERSION, true);
    }

    /**
     * theme_support
     * 
     */
    public function theme_support()
    {
        //register menus
        register_nav_menus(
            array(
                'primary' => __('Primary Menu', 'terminal-africa-hub'),
                'footer' => __('Footer Menu', 'terminal-africa-hub')
            )
        );
        //add theme logo upload support
        add_theme_support('custom-logo');
        //add title support
        add_theme_support('title-tag');

        //automatic-feed-links
        add_theme_support('automatic-feed-links');

        //post-thumbnails
        add_theme_support("post-thumbnails");

        //add_theme_support responsive-embeds
        add_theme_support("responsive-embeds");

        //add theme support for custom-header
        // add_theme_support('custom-header');

        //add theme support for custom-background
        // add_theme_support('custom-background');

        //add theme support for align-wide
        add_theme_support('align-wide');

        /**
         * Enqueue editor styles.
         */
        add_editor_style(array('assets/css/base/gutenberg-editor.css'));

        /**
         * Add support for Block Styles.
         */
        add_theme_support('wp-block-styles');

        //add theme supoort "html5"
        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

        //Set Your homepage displays to static page
        $args = array(
            'post_type' => 'page',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'title' => 'Home',
        );
        // The Query
        $query = new WP_Query($args);
        // The Loop
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $homepage_id = get_the_ID();
            }
            wp_reset_postdata();
        }
        //Check if the homepage is set
        if (isset($homepage_id)) {
            $page_on_front = get_option('page_on_front');
            if (empty($page_on_front)) {
                update_option('page_on_front', $homepage_id);
                update_option('show_on_front', 'page');
            }
        }

        //Check if we have menu 'Main Menu' then set to primary
        $menu_name = 'Main Menu';
        $menu_exists = wp_get_nav_menu_object($menu_name);
        if ($menu_exists) {
            $menu_id = $menu_exists->term_id;
            //set Display location to primary
            set_theme_mod('nav_menu_locations', array('primary' => $menu_id));
        }

        //check if permalink is set to post name
        if (get_option('permalink_structure') !== '/%postname%/') {
            global $wp_rewrite;
            $wp_rewrite->set_permalink_structure('/%postname%/');
            $wp_rewrite->flush_rules();
        }
    }

    public function terminal_africa_customizer($wp_customize)
    {
        // Create a new section for Terminal Africa
        $wp_customize->add_section('terminal_africa_section', array(
            'title' => __('Terminal Africa', 'terminal-africa-hub'),
            'priority' => 30,
        ));

        //Header Type select
        $wp_customize->add_setting('header_type', array(
            'default' => '1',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ));

        // Add a control for the header type
        $wp_customize->add_control('header_type', array(
            'label' => __('Header Type', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'header_type',
            'type' => 'select',
            'choices' => array(
                '1' => 'Header 1',
                '2' => 'Header 2',
                'safi' => 'Safi Header',
                'maputo' => 'Maputo Header'
            )
        ));

        /////////////// Safi Header Start ///////////////
        //show primary color
        $wp_customize->add_setting('main_button_bg_color_safi', array(
            'default' => '#f7941e',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the primary color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_button_bg_color_safi', array(
            'label' => __('Main Button Background Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'main_button_bg_color_safi',
            //only show for safi header
            'active_callback' => function () {
                return get_theme_mod('header_type', '1') == 'safi';
            }
        )));

        //main button text color
        $wp_customize->add_setting('main_button_text_color_safi', array(
            'default' => '#ffffff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the primary color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_button_text_color_safi', array(
            'label' => __('Main Button Text Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'main_button_text_color_safi',
            //only show for safi header
            'active_callback' => function () {
                return get_theme_mod('header_type', '1') == 'safi';
            }
        )));

        //hover color control for the main button
        $wp_customize->add_setting('main_button_hover_bg_color_safi', array(
            'default' => '#f7941e',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the primary color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_button_hover_bg_color_safi', array(
            'label' => __('Main Button Hover Background Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'main_button_hover_bg_color_safi',
            //only show for safi header
            'active_callback' => function () {
                return get_theme_mod('header_type', '1') == 'safi';
            }
        )));

        //hover text color
        $wp_customize->add_setting('main_button_hover_text_color_safi', array(
            'default' => '#ffffff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the primary color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_button_hover_text_color_safi', array(
            'label' => __('Main Button Hover Text Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'main_button_hover_text_color_safi',
            //only show for safi header
            'active_callback' => function () {
                return get_theme_mod('header_type', '1') == 'safi';
            }
        )));

        //Outline Color
        $wp_customize->add_setting('main_button_outline_color_safi', array(
            'default' => '#f7941e',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the primary color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_button_outline_color_safi', array(
            'label' => __('Main Button Outline Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'main_button_outline_color_safi',
            //only show for safi header
            'active_callback' => function () {
                return get_theme_mod('header_type', '1') == 'safi';
            }
        )));

        //hover outline color
        $wp_customize->add_setting('main_button_hover_outline_color_safi', array(
            'default' => '#f7941e',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the primary color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_button_hover_outline_color_safi', array(
            'label' => __('Main Button Hover Outline Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'main_button_hover_outline_color_safi',
            //only show for safi header
            'active_callback' => function () {
                return get_theme_mod('header_type', '1') == 'safi';
            }
        )));

        /////////////// Safi Header End ///////////////

        /////////////// Maputo Header Start ///////////////

        // Login Background Color
        $wp_customize->add_setting('maputo_login_background_color', array(
            'default' => '#ffffff33',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the login background color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'maputo_login_background_color', array(
            'label' => __('Login Background Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'maputo_login_background_color',
            //only show for maputo header
            'active_callback' => function () {
                return get_theme_mod('header_type', '1') == 'maputo';
            }
        )));

        // Login Text Color
        $wp_customize->add_setting('maputo_login_text_color', array(
            'default' => '#ffffff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the login text color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'maputo_login_text_color', array(
            'label' => __('Login Text Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'maputo_login_text_color',
            //only show for maputo header
            'active_callback' => function () {
                return get_theme_mod('header_type', '1') == 'maputo';
            }
        )));

        //Hover Login Background Color
        $wp_customize->add_setting('maputo_login_background_hover_color', array(
            'default' => '#ffffff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the login background hover color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'maputo_login_background_hover_color', array(
            'label' => __('Login Background Hover Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'maputo_login_background_hover_color',
            //only show for maputo header
            'active_callback' => function () {
                return get_theme_mod('header_type', '1') == 'maputo';
            }
        )));

        //Hover Login Text Color
        $wp_customize->add_setting('maputo_login_text_hover_color', array(
            'default' => '#ffffff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the login text hover color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'maputo_login_text_hover_color', array(
            'label' => __('Login Text Hover Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'maputo_login_text_hover_color',
            //only show for maputo header
            'active_callback' => function () {
                return get_theme_mod('header_type', '1') == 'maputo';
            }
        )));

        //Sign Up Background Color
        $wp_customize->add_setting('maputo_sign_up_background_color', array(
            'default' => '#ffffff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the sign up background color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'maputo_sign_up_background_color', array(
            'label' => __('Sign Up Background Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'maputo_sign_up_background_color',
            //only show for maputo header
            'active_callback' => function () {
                return get_theme_mod('header_type', '1') == 'maputo';
            }
        )));

        //Sign Up Text Color
        $wp_customize->add_setting('maputo_sign_up_text_color', array(
            'default' => '#ffffff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the sign up text color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'maputo_sign_up_text_color', array(
            'label' => __('Sign Up Text Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'maputo_sign_up_text_color',
            //only show for maputo header
            'active_callback' => function () {
                return get_theme_mod('header_type', '1') == 'maputo';
            }
        )));

        //Hover Sign Up Background Color
        $wp_customize->add_setting('maputo_sign_up_background_hover_color', array(
            'default' => '#ffffff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the sign up background hover color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'maputo_sign_up_background_hover_color', array(
            'label' => __('Sign Up Background Hover Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'maputo_sign_up_background_hover_color',
            //only show for maputo header
            'active_callback' => function () {
                return get_theme_mod('header_type', '1') == 'maputo';
            }
        )));

        //Hover Sign Up Text Color
        $wp_customize->add_setting('maputo_sign_up_text_hover_color', array(
            'default' => '#ffffff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the sign up text hover color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'maputo_sign_up_text_hover_color', array(
            'label' => __('Sign Up Text Hover Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'maputo_sign_up_text_hover_color',
            //only show for maputo header
            'active_callback' => function () {
                return get_theme_mod('header_type', '1') == 'maputo';
            }
        )));

        //Header Background Color
        $wp_customize->add_setting('maputo_header_background_color', array(
            'default' => '#ffffff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the header background color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'maputo_header_background_color', array(
            'label' => __('Header Background Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'maputo_header_background_color',
            //only show for maputo header
            'active_callback' => function () {
                return get_theme_mod('header_type', '1') == 'maputo';
            }
        )));

        //Header Text Color
        $wp_customize->add_setting('maputo_header_text_color', array(
            'default' => '#ffffff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the header text color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'maputo_header_text_color', array(
            'label' => __('Header Text Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'maputo_header_text_color',
            //only show for maputo header
            'active_callback' => function () {
                return get_theme_mod('header_type', '1') == 'maputo';
            }
        )));

        /////////////// Maputo Header End ///////////////

        /////////////// Default Header Start ///////////////

        // Add a new setting for the 'Book Shipment' button color
        $wp_customize->add_setting('book_shipment_color', array(
            'default' => '#f7941e',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the 'Book Shipment' button color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'book_shipment_color', array(
            'label' => __('Book Shipment Header Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'book_shipment_color',
            //check if header is not safi or maputo
            'active_callback' => function () {
                $header_type = get_theme_mod('header_type', '1');
                $ignore_headers = array('safi', 'maputo');
                return !in_array($header_type, $ignore_headers);
            }
        )));

        //hover color control for the 'Book Shipment' button
        $wp_customize->add_setting('book_shipment_hover_color', array(
            'default' => '#333333',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the 'Book Shipment' button hover color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'book_shipment_hover_color', array(
            'label' => __('Book Shipment Header Hover Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'book_shipment_hover_color',
            //check if header is not safi
            'active_callback' => function () {
                $header_type = get_theme_mod('header_type', '1');
                $ignore_headers = array('safi', 'maputo');
                return !in_array($header_type, $ignore_headers);
            }
        )));

        // Add a new setting for the 'Track Shipment' button color
        $wp_customize->add_setting('track_shipment_color', array(
            'default' => '#f7941e',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the 'Track Shipment' button color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'track_shipment_color', array(
            'label' => __('Track Shipment Header Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'track_shipment_color',
            //check if header is not safi
            'active_callback' => function () {
                $header_type = get_theme_mod('header_type', '1');
                $ignore_headers = array('safi', 'maputo');
                return !in_array($header_type, $ignore_headers);
            }
        )));

        //hover color control for the 'Track Shipment' button
        $wp_customize->add_setting('track_shipment_hover_color', array(
            'default' => '#333333',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the 'Track Shipment' button hover color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'track_shipment_hover_color', array(
            'label' => __('Track Shipment Header Hover Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'track_shipment_hover_color',
            //check if header is not safi
            'active_callback' => function () {
                $header_type = get_theme_mod('header_type', '1');
                $ignore_headers = array('safi', 'maputo');
                return !in_array($header_type, $ignore_headers);
            }
        )));

        /////////////// Default Header End ///////////////

        //Add book shipment link
        // $wp_customize->add_setting('book_shipment_link', array(
        //     'default' => '#',
        //     'transport' => 'refresh',
        //     'sanitize_callback' => 'esc_url_raw'
        // ));

        // // Add a control for the book shipment link
        // $wp_customize->add_control('book_shipment_link', array(
        //     'label' => __('Book Shipment Link', 'terminal-africa-hub'),
        //     'section' => 'terminal_africa_section',
        //     'settings' => 'book_shipment_link'
        // ));

        //Add track shipment link
        // $wp_customize->add_setting('track_shipment_link', array(
        //     'default' => '#',
        //     'transport' => 'refresh',
        //     'sanitize_callback' => 'esc_url_raw'
        // ));

        // // Add a control for the track shipment link
        // $wp_customize->add_control('track_shipment_link', array(
        //     'label' => __('Track Shipment Link', 'terminal-africa-hub'),
        //     'section' => 'terminal_africa_section',
        //     'settings' => 'track_shipment_link'
        // ));

        //header design 
        $wp_customize->add_setting('header_design', array(
            'default' => 'thub-default-header',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ));

        // Add a control for the header design
        $wp_customize->add_control('header_design', array(
            'label' => __('Header Design', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'header_design',
            'type' => 'select',
            'choices' => array(
                'thub-default-header' => 'Default Header',
                'ivato-header' => 'Ivato Header'
            )
        ));

        //add header active color
        $wp_customize->add_setting('header_active_color', array(
            'default' => 'unset',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the header active color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_active_color', array(
            'label' => __('Header Active Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'header_active_color'
        )));

        //add footer active color
        $wp_customize->add_setting('footer_active_color', array(
            'default' => 'unset',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the footer active color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_active_color', array(
            'label' => __('Footer Active Color', 'terminal-africa-hub'),
            'section' => 'terminal_africa_section',
            'settings' => 'footer_active_color'
        )));
    }

    /**
     * terminal_footer_customizer
     * 
     */
    public function terminal_footer_customizer($wp_customize)
    {
        // Create a new section for Terminal Africa
        $wp_customize->add_section('terminal_footer_section', array(
            'title' => __('Terminal Footer', 'terminal-africa-hub'),
            'priority' => 30,
        ));

        //footer type
        $wp_customize->add_setting('footer_type', array(
            'default' => '1',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ));

        // Add a control for the footer type
        $wp_customize->add_control('footer_type', array(
            'label' => __('Footer Type', 'terminal-africa-hub'),
            'section' => 'terminal_footer_section',
            'settings' => 'footer_type',
            'type' => 'select',
            'choices' => array(
                '1' => 'Footer 1',
                '2' => 'Footer 2',
                'safi' => 'Safi Footer',
                'maputo' => 'Maputo Footer'
            )
        ));

        //if footer_type is 2 show icon color
        $wp_customize->add_setting('footer_icon_color', array(
            'default' => '#ffffff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the footer icon color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_icon_color', array(
            'label' => __('Footer Icon Foreground Color', 'terminal-africa-hub'),
            'section' => 'terminal_footer_section',
            'settings' => 'footer_icon_color',
            //check if footer type is 2
            'active_callback' => function () {
                return get_theme_mod('footer_type', '1') == '2';
            }
        )));

        // Add a new setting for the footer icon background color
        $wp_customize->add_setting('footer_icon_background_color', array(
            'default' => '#343434',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the footer icon background color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_icon_background_color', array(
            'label' => __('Footer Icon Background Color', 'terminal-africa-hub'),
            'section' => 'terminal_footer_section',
            'settings' => 'footer_icon_background_color',
            //check if footer type is 2
            'active_callback' => function () {
                return get_theme_mod('footer_type', '1') == '2';
            }
        )));

        // Add a new setting for the footer background color
        $wp_customize->add_setting('footer_background_color', array(
            'default' => '#343434',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the footer background color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_background_color', array(
            'label' => __('Footer Background Color', 'terminal-africa-hub'),
            'section' => 'terminal_footer_section',
            'settings' => 'footer_background_color'
        )));

        // Add a new setting for the footer text color
        $wp_customize->add_setting('footer_text_color', array(
            'default' => '#ffffff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the footer text color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_text_color', array(
            'label' => __('Footer Text Color', 'terminal-africa-hub'),
            'section' => 'terminal_footer_section',
            'settings' => 'footer_text_color'
        )));

        //theme footer logo
        $wp_customize->add_setting('footer_logo', array(
            'default' => TERMINAL_THEME_ASSETS_URI . 'img/logo-full.png',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        ));

        // Add a control for the footer logo
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
            'label' => __('Footer Logo', 'terminal-africa-hub'),
            'section' => 'terminal_footer_section',
            'settings' => 'footer_logo'
        )));

        //footer copyright color
        $wp_customize->add_setting('footer_copyright_color', array(
            'default' => '#b8b3a7',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        // Add a color control for the footer copyright color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_copyright_color', array(
            'label' => __('Footer Copyright Color', 'terminal-africa-hub'),
            'section' => 'terminal_footer_section',
            'settings' => 'footer_copyright_color',
            //check if footer type is 2
            'active_callback' => function () {
                return get_theme_mod('footer_type', '1') == '2';
            }
        )));

        //Add company address
        $wp_customize->add_setting('company_address', array(
            'default' => '123, Company Street, Company City, Company Country',
            'transport' => 'refresh',
            'sanitize_callback' => 'wp_kses_post'
        ));

        // Add a control for the company address
        $wp_customize->add_control('company_address', array(
            'label' => __('Company Address', 'terminal-africa-hub'),
            'section' => 'terminal_footer_section',
            'settings' => 'company_address',
            //check if footer type is 1
            'active_callback' => function () {
                return get_theme_mod('footer_type', '1') == '1';
            }
        ));

        //Company email
        $wp_customize->add_setting('company_email', array(
            'default' => 'info@company.com',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_email'
        ));

        // Add a control for the company email
        $wp_customize->add_control('company_email', array(
            'label' => __('Company Email', 'terminal-africa-hub'),
            'section' => 'terminal_footer_section',
            'settings' => 'company_email',
        ));

        //Company phone
        $wp_customize->add_setting('company_phone', array(
            'default' => '+234012345678',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ));

        // Add a control for the company phone
        $wp_customize->add_control('company_phone', array(
            'label' => __('Company Phone', 'terminal-africa-hub'),
            'section' => 'terminal_footer_section',
            'settings' => 'company_phone',
        ));

        //social media links
        $wp_customize->add_setting('facebook_link', array(
            'default' => '#',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        ));

        // Add a control for the facebook link
        $wp_customize->add_control('facebook_link', array(
            'label' => __('Facebook Link', 'terminal-africa-hub'),
            'section' => 'terminal_footer_section',
            'settings' => 'facebook_link'
        ));

        $wp_customize->add_setting('twitter_link', array(
            'default' => '#',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        ));

        // Add a control for the twitter link
        $wp_customize->add_control('twitter_link', array(
            'label' => __('Twitter Link', 'terminal-africa-hub'),
            'section' => 'terminal_footer_section',
            'settings' => 'twitter_link'
        ));


        $wp_customize->add_setting('instagram_link', array(
            'default' => '#',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        ));

        // Add a control for the instagram link
        $wp_customize->add_control('instagram_link', array(
            'label' => __('Instagram Link', 'terminal-africa-hub'),
            'section' => 'terminal_footer_section',
            'settings' => 'instagram_link'
        ));

        //add linkedin
        $wp_customize->add_setting('linkedin_link', array(
            'default' => '#',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        ));

        // Add a control for the linkedin link
        $wp_customize->add_control('linkedin_link', array(
            'label' => __('Linkedin Link', 'terminal-africa-hub'),
            'section' => 'terminal_footer_section',
            'settings' => 'linkedin_link',
            //check if footer type is 2
            'active_callback' => function () {
                return get_theme_mod('footer_type', '1') == '2';
            }
        ));
    }

    //add custom style 
    public function terminal_africa_customizer_styles()
    {
?>
        <style type="text/css">
            .terminal-header .t-hub-dedicated a:first-child,
            .terminal-mobile-menu-content .t-hub-dedicated a:first-child,
            .t-hub-mobile-menu-cta .t-hub-mobile-menu-cta--links a:first-child {
                background-color: <?php echo esc_attr(get_theme_mod('book_shipment_color', '#f7941e')); ?> !important;
            }

            .terminal-header .t-hub-dedicated a:first-child:hover,
            .terminal-mobile-menu-content .t-hub-dedicated a:first-child:hover,
            .t-hub-mobile-menu-cta .t-hub-mobile-menu-cta--links a:first-child:hover {
                background-color: <?php echo esc_attr(get_theme_mod('book_shipment_hover_color', '#333333')); ?> !important;
            }

            .terminal-header .t-hub-dedicated a:last-child,
            .terminal-mobile-menu-content .t-hub-dedicated a:last-child,
            .t-hub-mobile-menu-cta .t-hub-mobile-menu-cta--links a:last-child {
                border-color: <?php echo esc_attr(get_theme_mod('track_shipment_color', '#f7941e')); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('track_shipment_color', '#f7941e')); ?> !important;
            }

            .terminal-header .t-hub-dedicated a:last-child:hover,
            .terminal-mobile-menu-content .t-hub-dedicated a:last-child:hover,
            .t-hub-mobile-menu-cta .t-hub-mobile-menu-cta--links a:last-child:hover {
                border-color: <?php echo esc_attr(get_theme_mod('track_shipment_hover_color', '#333333')); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('track_shipment_hover_color', '#333333')); ?> !important;
            }

            /**
             * Maputo Header
             */
            .maputo-header,
            .ivato-header.maputo-header-mobile {
                background-color: <?php echo esc_attr(get_theme_mod('maputo_header_background_color', '#ffffff')); ?> !important;
            }

            .maputo-header .maputo-header-left a,
            .ivato-header.maputo-header-mobile .t-hub-mobile-menu-cta--links a {
                color: <?php echo esc_attr(get_theme_mod('maputo_header_text_color', '#ffffff')); ?> !important;
            }

            .maputo-header .maputo-header-right a:first-child,
            .ivato-header.maputo-header-mobile .t-hub-mobile-menu-cta--links a:first-child {
                background-color: <?php echo esc_attr(get_theme_mod('maputo_login_background_color', '#ffffff33')); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('maputo_login_text_color', '#ffffff')); ?> !important;
            }

            .maputo-header .maputo-header-right a:first-child:hover,
            .ivato-header.maputo-header-mobile .t-hub-mobile-menu-cta--links a:first-child:hover {
                background-color: <?php echo esc_attr(get_theme_mod('maputo_login_background_hover_color', '#ffffff')); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('maputo_login_text_hover_color', '#ffffff')); ?> !important;
            }

            .maputo-header .maputo-header-right a:last-child,
            .ivato-header.maputo-header-mobile .t-hub-mobile-menu-cta--links a:last-child {
                background-color: <?php echo esc_attr(get_theme_mod('maputo_sign_up_background_color', '#ffffff')); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('maputo_sign_up_text_color', '#ffffff')); ?> !important;
            }

            .maputo-header .maputo-header-right a:last-child:hover,
            .ivato-header.maputo-header-mobile .t-hub-mobile-menu-cta--links a:last-child:hover {
                background-color: <?php echo esc_attr(get_theme_mod('maputo_sign_up_background_hover_color', '#ffffff')); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('maputo_sign_up_text_hover_color', '#ffffff')); ?> !important;
            }


            /**
             * Safi Header
             */
            .terminal-header .t-hub-dedicated-safi a,
            .terminal-mobile-menu-content .t-hub-dedicated-safi a {
                border-color: <?php echo esc_attr(get_theme_mod('main_button_outline_color_safi', '#f7941e')); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('main_button_outline_color_safi', '#ffffff')); ?> !important;
            }

            .terminal-header .t-hub-dedicated-safi a:hover,
            .terminal-mobile-menu-content .t-hub-dedicated-safi a:hover {
                border-color: <?php echo esc_attr(get_theme_mod('main_button_hover_outline_color_safi', '#333333')); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('main_button_hover_outline_color_safi', '#333333')); ?> !important;
            }

            .terminal-header .t-hub-dedicated-safi a:last-child,
            .terminal-mobile-menu-content .t-hub-dedicated-safi a:last-child {
                background-color: <?php echo esc_attr(get_theme_mod('main_button_bg_color_safi', '#f7941e')); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('main_button_text_color_safi', '#ffffff')); ?> !important;
                border: 1px solid <?php echo esc_attr(get_theme_mod('main_button_bg_color_safi', '#f7941e')); ?> !important;
            }

            .terminal-header .t-hub-dedicated-safi a:last-child:hover,
            .terminal-mobile-menu-content .t-hub-dedicated-safi a:last-child:hover {
                background-color: <?php echo esc_attr(get_theme_mod('main_button_hover_bg_color_safi', '#333333')); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('main_button_hover_text_color_safi', '#ffffff')); ?> !important;
                border: 1px solid <?php echo esc_attr(get_theme_mod('main_button_hover_bg_color_safi', '#333333')); ?> !important;
            }


            /**
            * Maputo Pop up button styles
            */
            .t-hub-dedicated.maputo-header-mobile-dedicated a:first-child {
                background-color: <?php echo esc_attr(get_theme_mod('maputo_login_background_color', '#ffffff33')); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('maputo_login_text_color', '#ffffff')); ?> !important;
            }

            .t-hub-dedicated.maputo-header-mobile-dedicated a:first-child:hover {
                background-color: <?php echo esc_attr(get_theme_mod('maputo_login_background_hover_color', '#ffffff')); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('maputo_login_text_hover_color', '#ffffff')); ?> !important;
            }

            .t-hub-dedicated.maputo-header-mobile-dedicated a:last-child {
                background-color: <?php echo esc_attr(get_theme_mod('maputo_sign_up_background_color', '#ffffff')); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('maputo_sign_up_text_color', '#ffffff')); ?> !important;
            }

            .t-hub-dedicated.maputo-header-mobile-dedicated a:last-child:hover {
                background-color: <?php echo esc_attr(get_theme_mod('maputo_sign_up_background_hover_color', '#ffffff')); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('maputo_sign_up_text_hover_color', '#ffffff')); ?> !important;
            }


            /**
            * Terminal Footer
            */
            .terminal-africa-theme-bs .terminal-footer {
                background-color: <?php echo esc_attr(get_theme_mod('footer_background_color', '#343434')); ?> !important;
            }

            .terminal-africa-theme-bs .terminal-footer .t-hub-menu-ul li a {
                color: <?php echo esc_attr(get_theme_mod('footer_text_color', '#ffffff')); ?>;
            }

            .terminal-africa-theme-bs .terminal-footer .terminal-footer-1 nav a {
                color: <?php echo esc_attr(get_theme_mod('footer_text_color', '#ffffff')); ?> !important;
            }

            .terminal-africa-theme-bs .terminal-footer h4 {
                color: <?php echo esc_attr(get_theme_mod('footer_text_color', '#ffffff')); ?> !important;
            }

            .terminal-africa-theme-bs .terminal-footer p {
                color: <?php echo esc_attr(get_theme_mod('footer_text_color', '#ffffff')); ?> !important;
            }

            .terminal-africa-theme-bs .terminal-footer .terminal-ivato-copyright p,
            .terminal-africa-theme-bs .terminal-footer .terminal-ivato-copyright a {
                color: <?php echo esc_attr(get_theme_mod('footer_copyright_color', '#b8b3a7')); ?> !important;
            }

            <?php if (get_theme_mod('header_active_color', 'unset') !== 'unset') : ?>.terminal-header .current-menu-item a {
                color: <?php echo esc_attr(get_theme_mod('header_active_color', '#f7941e')); ?> !important;
            }

            <?php endif; ?><?php if (get_theme_mod('footer_active_color', 'unset') !== 'unset') :
                            ?>.terminal-footer .current-menu-item a {
                color: <?php echo esc_attr(get_theme_mod('footer_active_color', '#f7941e')); ?> !important;
            }

            <?php endif; ?>
        </style>
<?php
    }

    /**
     * enqueue_scripts
     * 
     */
    public function enqueue_scripts()
    {
        //enqueue comment-reply
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
        //add blockui
        wp_enqueue_script('terminal-blockui', TERMINAL_THEME_ASSETS_URI . 'js/jquery.blockUI.js', array('jquery'), TERMINAL_THEME_VERSION, true);
        //enqueue scripts
        wp_enqueue_style('terminal-africa-hub', TERMINAL_THEME_BUILD_URI . 'terminal-theme.css', array(), TERMINAL_THEME_VERSION, 'all');
        //enqueue scripts
        wp_enqueue_script('terminal-africa-hub-script', TERMINAL_THEME_BUILD_URI . 'terminal-theme.js', array('jquery'), TERMINAL_THEME_VERSION, true);
        //localize scripts
        wp_localize_script('terminal-africa-hub-script', 'terminal_africa_hub', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'home_url' => home_url(),
            'nonce' => wp_create_nonce('terminal-africa-theme-nonce')
        ));
    }

    /**
     * Admin scripts
     * 
     * @return void
     */
    public function enqueue_admin_scripts()
    {
        //izitoast css
        wp_enqueue_style('terminal-izitoast', TERMINAL_THEME_ASSETS_URI . 'css/iziToast.min.css', array(), TERMINAL_THEME_VERSION, 'all');
        //sweet alert css
        wp_enqueue_style('terminal-sweetalert', TERMINAL_THEME_ASSETS_URI . 'css/sweetalert2.min.css', array(), TERMINAL_THEME_VERSION, 'all');
        //izitoast js
        wp_enqueue_script('terminal-izitoast', TERMINAL_THEME_ASSETS_URI . 'js/iziToast.min.js', array('jquery'), TERMINAL_THEME_VERSION, true);
        //sweet alert js
        wp_enqueue_script('terminal-sweetalert', TERMINAL_THEME_ASSETS_URI . 'js/sweetalert2.min.js', array('jquery'), TERMINAL_THEME_VERSION, true);
        //terminal africa hub admin css
        wp_enqueue_style('terminal-africa-hub-admin', TERMINAL_THEME_ASSETS_URI . 'css/terminal-theme-admin.css', array(), TERMINAL_THEME_VERSION, 'all');
        //enqueue scripts
        wp_enqueue_script('terminal-africa-hub-admin', TERMINAL_THEME_ASSETS_URI . 'js/terminal-theme-admin.js', array('jquery'), TERMINAL_THEME_VERSION, true);
        //localize scripts
        wp_localize_script('terminal-africa-hub-admin', 'terminal_africa_hub_admin', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('terminal-africa-theme-admin-nonce'),
            'asset_url' => TERMINAL_THEME_ASSETS_URI
        ));
    }
}
