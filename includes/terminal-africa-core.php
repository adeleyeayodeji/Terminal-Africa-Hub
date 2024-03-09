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
        //check if elementor plugin is installed
        if (class_exists('Elementor\Plugin')) {
            //init theme
            $this->init();
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
        ob_start();
        require_once TERMINAL_THEME_DIR . '/templates/notice/install-elementor.php';
        echo ob_get_clean();
    }

    /**
     * Init Theme
     * 
     */
    public function init()
    {
        //init elementor
        $this->init_elementor();
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
        //wp
        add_action('init', array($this, 'after_theme_initilized'));
        //wp ajax terminal_import_demo
        add_action('wp_ajax_terminal_import_demo', array($this, 'terminal_import_demo'));
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
            //import demo content
            $importer = new TerminalDemoImporter();
            $importer->import_demo();
            //update option
            update_option('terminal_hub_demo_imported', 'yes');
            //send success message
            wp_send_json_success(array(
                'message' => 'Demo content imported successfully'
            ));
        } catch (\Exception $e) {
            wp_send_json_error(array(
                'message' => "Something went wrong, please try again. Error: {$e->getMessage()}"
            ));
        }
    }

    /**
     * after_theme_initilized
     * 
     */
    public function after_theme_initilized()
    {
        //check if the user has already imported the demo content
        $imported = get_option('terminal_hub_demo_imported', 'no');
        if ($imported == 'no') {
            //add admin notice
            add_action('admin_notices', array($this, 'demo_import_notice'));
        }
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
        $to = get_option('admin_email');
        $subject = 'New message from ' . get_bloginfo('name');
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
        //add theme support
        add_theme_support('menus');
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
            'title' => __('Terminal Africa', 'terminal-africa'),
            'priority' => 30,
        ));

        // Add a new setting for the 'Book Shipment' button color
        $wp_customize->add_setting('book_shipment_color', array(
            'default' => '#f7941e',
            'transport' => 'refresh',
        ));

        // Add a color control for the 'Book Shipment' button color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'book_shipment_color', array(
            'label' => __('Book Shipment Header Color', 'terminal-africa'),
            'section' => 'terminal_africa_section',
            'settings' => 'book_shipment_color'
        )));

        //hover color control for the 'Book Shipment' button
        $wp_customize->add_setting('book_shipment_hover_color', array(
            'default' => '#333333',
            'transport' => 'refresh',
        ));

        // Add a color control for the 'Book Shipment' button hover color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'book_shipment_hover_color', array(
            'label' => __('Book Shipment Header Hover Color', 'terminal-africa'),
            'section' => 'terminal_africa_section',
            'settings' => 'book_shipment_hover_color'
        )));

        // Add a new setting for the 'Track Shipment' button color
        $wp_customize->add_setting('track_shipment_color', array(
            'default' => '#f7941e',
            'transport' => 'refresh',
        ));

        // Add a color control for the 'Track Shipment' button color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'track_shipment_color', array(
            'label' => __('Track Shipment Header Color', 'terminal-africa'),
            'section' => 'terminal_africa_section',
            'settings' => 'track_shipment_color'
        )));

        //hover color control for the 'Track Shipment' button
        $wp_customize->add_setting('track_shipment_hover_color', array(
            'default' => '#333333',
            'transport' => 'refresh',
        ));

        // Add a color control for the 'Track Shipment' button hover color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'track_shipment_hover_color', array(
            'label' => __('Track Shipment Header Hover Color', 'terminal-africa'),
            'section' => 'terminal_africa_section',
            'settings' => 'track_shipment_hover_color'
        )));

        //Add book shipment link
        $wp_customize->add_setting('book_shipment_link', array(
            'default' => '#',
            'transport' => 'refresh',
        ));

        // Add a control for the book shipment link
        $wp_customize->add_control('book_shipment_link', array(
            'label' => __('Book Shipment Link', 'terminal-africa'),
            'section' => 'terminal_africa_section',
            'settings' => 'book_shipment_link'
        ));

        //Add track shipment link
        $wp_customize->add_setting('track_shipment_link', array(
            'default' => '#',
            'transport' => 'refresh',
        ));

        // Add a control for the track shipment link
        $wp_customize->add_control('track_shipment_link', array(
            'label' => __('Track Shipment Link', 'terminal-africa'),
            'section' => 'terminal_africa_section',
            'settings' => 'track_shipment_link'
        ));
    }

    /**
     * terminal_footer_customizer
     * 
     */
    public function terminal_footer_customizer($wp_customize)
    {
        // Create a new section for Terminal Africa
        $wp_customize->add_section('terminal_footer_section', array(
            'title' => __('Terminal Footer', 'terminal-africa'),
            'priority' => 30,
        ));

        // Add a new setting for the footer background color
        $wp_customize->add_setting('footer_background_color', array(
            'default' => '#343434',
            'transport' => 'refresh',
        ));

        // Add a color control for the footer background color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_background_color', array(
            'label' => __('Footer Background Color', 'terminal-africa'),
            'section' => 'terminal_footer_section',
            'settings' => 'footer_background_color'
        )));

        // Add a new setting for the footer text color
        $wp_customize->add_setting('footer_text_color', array(
            'default' => '#ffffff',
            'transport' => 'refresh',
        ));

        // Add a color control for the footer text color
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_text_color', array(
            'label' => __('Footer Text Color', 'terminal-africa'),
            'section' => 'terminal_footer_section',
            'settings' => 'footer_text_color'
        )));

        //theme footer logo
        $wp_customize->add_setting('footer_logo', array(
            'default' => TERMINAL_THEME_ASSETS_URI . 'img/logo-full.png',
            'transport' => 'refresh',
        ));

        // Add a control for the footer logo
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
            'label' => __('Footer Logo', 'terminal-africa'),
            'section' => 'terminal_footer_section',
            'settings' => 'footer_logo'
        )));

        //Company email
        $wp_customize->add_setting('company_email', array(
            'default' => 'info@company.com',
            'transport' => 'refresh',
        ));

        // Add a control for the company email
        $wp_customize->add_control('company_email', array(
            'label' => __('Company Email', 'terminal-africa'),
            'section' => 'terminal_footer_section',
            'settings' => 'company_email'
        ));

        //Company phone
        $wp_customize->add_setting('company_phone', array(
            'default' => '+234012345678',
            'transport' => 'refresh',
        ));

        // Add a control for the company phone
        $wp_customize->add_control('company_phone', array(
            'label' => __('Company Phone', 'terminal-africa'),
            'section' => 'terminal_footer_section',
            'settings' => 'company_phone'
        ));

        //social media links
        $wp_customize->add_setting('facebook_link', array(
            'default' => '#',
            'transport' => 'refresh',
        ));

        // Add a control for the facebook link
        $wp_customize->add_control('facebook_link', array(
            'label' => __('Facebook Link', 'terminal-africa'),
            'section' => 'terminal_footer_section',
            'settings' => 'facebook_link'
        ));

        $wp_customize->add_setting('twitter_link', array(
            'default' => '#',
            'transport' => 'refresh',
        ));

        // Add a control for the twitter link
        $wp_customize->add_control('twitter_link', array(
            'label' => __('Twitter Link', 'terminal-africa'),
            'section' => 'terminal_footer_section',
            'settings' => 'twitter_link'
        ));


        $wp_customize->add_setting('instagram_link', array(
            'default' => '#',
            'transport' => 'refresh',
        ));

        // Add a control for the instagram link
        $wp_customize->add_control('instagram_link', array(
            'label' => __('Instagram Link', 'terminal-africa'),
            'section' => 'terminal_footer_section',
            'settings' => 'instagram_link'
        ));
    }

    //add custom style 
    public function terminal_africa_customizer_styles()
    {
?>
        <style type="text/css">
            .terminal-header .t-hub-dedicated a:first-child {
                background-color: <?php echo get_theme_mod('book_shipment_color', '#f7941e'); ?> !important;
            }

            .terminal-header .t-hub-dedicated a:first-child:hover {
                background-color: <?php echo get_theme_mod('book_shipment_hover_color', '#333333'); ?> !important;
            }

            .terminal-header .t-hub-dedicated a:last-child {
                border-color: <?php echo get_theme_mod('track_shipment_color', '#f7941e'); ?> !important;
                color: <?php echo get_theme_mod('track_shipment_color', '#f7941e'); ?> !important;
            }

            .terminal-header .t-hub-dedicated a:last-child:hover {
                border-color: <?php echo get_theme_mod('track_shipment_hover_color', '#333333'); ?> !important;
                color: <?php echo get_theme_mod('track_shipment_hover_color', '#333333'); ?> !important;
            }

            /**
            * Terminal Footer
            */
            .terminal-africa-theme-bs .terminal-footer {
                background-color: <?php echo get_theme_mod('footer_background_color', '#343434'); ?> !important;
            }

            .terminal-africa-theme-bs .terminal-footer .t-hub-menu-ul li a {
                color: <?php echo get_theme_mod('footer_text_color', '#ffffff'); ?> !important;
            }

            .terminal-africa-theme-bs .terminal-footer .terminal-footer-1 nav a {
                color: <?php echo get_theme_mod('footer_text_color', '#ffffff'); ?> !important;
            }

            .terminal-africa-theme-bs .terminal-footer h4 {
                color: <?php echo get_theme_mod('footer_text_color', '#ffffff'); ?> !important;
            }
        </style>
<?php
    }

    /**
     * enqueue_scripts
     * 
     */
    public function enqueue_scripts()
    {
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
