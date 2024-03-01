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
        //enqueue scripts
        wp_enqueue_style('terminal-africa-hub', TERMINAL_THEME_BUILD_URI . 'terminal-theme.css', array(), TERMINAL_THEME_VERSION, 'all');
        //enqueue scripts
        wp_enqueue_script('terminal-africa-hub-script', TERMINAL_THEME_BUILD_URI . 'terminal-theme.js', array('jquery'), TERMINAL_THEME_VERSION, true);
    }

    /**
     * Admin scripts
     * 
     * @return void
     */
    public function enqueue_admin_scripts()
    {
        //enqueue scripts
        wp_enqueue_script('terminal-africa-hub-admin', TERMINAL_THEME_ASSETS_URI . 'terminal-theme-admin.js', array('jquery'), TERMINAL_THEME_VERSION, true);
    }
}
