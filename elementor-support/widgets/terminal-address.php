<?php
//check for security
if (!defined('ABSPATH')) {
    die('ABSPATH must be defined to access this file');
}

/**
 * Terminal Address Elementor Widget
 * 
 * @access public
 * @since 1.0.0
 * @package Terminal Africa Hub
 * @author Terminal Development Team
 * 
 */
class Terminal_Address_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Address Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-address';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Address Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Address', TERMINAL_THEME_TEXT_DOMAIN);
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Address Widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-image';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Terminal Address Widget belongs to.
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['terminal-elements'];
    }

    /**
     * Register Terminal Address Widget Controls
     *
     * Adds different input fields to allow the user to change and customize the widget settings
     *
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', TERMINAL_THEME_TEXT_DOMAIN),
            ]
        );

        $this->add_control(
            'address',
            [
                'label' => __('Address', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'input_type' => 'text',
                'default' => 'Amman street, Ikeja, Lagos.',
                'placeholder' => __('Enter your address', TERMINAL_THEME_TEXT_DOMAIN),
            ]
        );

        $this->add_control(
            'phone',
            [
                'label' => __('Phone', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => '+23412345678',
                'placeholder' => __('Enter your phone number', TERMINAL_THEME_TEXT_DOMAIN),
            ]
        );

        $this->add_control(
            'email',
            [
                'label' => __('Email', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => 'info@company.com',
                'placeholder' => __('Enter your email', TERMINAL_THEME_TEXT_DOMAIN),
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render Terminal Address Widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="terminal-meet-us">
            <h3>
                Meet Us
            </h3>
            <ul>
                <li>
                    <div class="d-flex">
                        <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/phone-icon.svg'); ?>" alt="">
                        <a href="tel:<?php echo esc_attr($settings['phone']); ?>"><?php echo esc_html($settings['phone']); ?></a>
                    </div>
                </li>
                <li>
                    <div class="d-flex">
                        <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/email.svg'); ?>" alt="">
                        <a href="mailto:<?php echo esc_attr($settings['email']); ?>">
                            <?php echo esc_html($settings['email']); ?>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="d-flex">
                        <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/address.svg'); ?>" alt="">
                        <p>
                            <?php echo esc_html($settings['address']); ?>
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    <?php
    }

    /**
     * Render Terminal Address Widget output on the frontend.
     *
     * Written in JS and used to generate the final HTML with the help of JavaScript.
     *
     * @access protected
     */
    protected function _content_template()
    {
    ?>
        <div class="terminal-meet-us">
            <h3>
                Meet Us
            </h3>
            <ul>
                <li>
                    <div class="d-flex">
                        <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/phone-icon.svg'); ?>" alt="">
                        <a href="tel:{{settings.phone}}">{{settings.phone}}</a>
                    </div>
                </li>
                <li>
                    <div class="d-flex">
                        <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/email.svg'); ?>" alt="">
                        <a href="mailto:{{settings.email}}">
                            {{settings.email}}
                        </a>
                    </div>
                </li>
                <li>
                    <div class="d-flex">
                        <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/address.svg'); ?>" alt="">
                        <p>
                            {{settings.address}}
                        </p>
                    </div>
                </li>
            </ul>
        </div>
<?php
    }
}
