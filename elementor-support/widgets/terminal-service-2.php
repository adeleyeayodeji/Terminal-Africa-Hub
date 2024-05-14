<?php
//check for security
if (!defined('ABSPATH')) {
    exit('You must not access this file directly!');
}


/**
 * Terminal Services 2 Elementor Widget
 * 
 * @access public
 * @since 1.0.0
 * @package Terminal Africa Hub
 * @author Terminal Development Team
 * 
 */
class Terminal_Service_2_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Services v2 Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-service-02';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Services v2 Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Service 02', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Services v2 Widget icon.
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
     * Retrieve the list of categories the Terminal Services v2 Widget belongs to.
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['terminal-widgets'];
    }

    /**
     * Register Terminal Services v2 Widget Controls
     *
     * Adds different input fields to allow the user to change and customize the widget settings
     *
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        //title
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Check out our services', 'terminal-africa-hub'),
            ]
        );

        //description
        $this->add_control(
            'description',
            [
                'label' => __('Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Aliquet id quam amet, augue netus tristique elementum eros urna. Dignissim nisl mauris cras feugiat congue at euismod donec.Lectus interdum nibh laoreet nunc bibendum volutpat.', 'terminal-africa-hub'),
            ]
        );

        //image
        $this->add_control(
            'image',
            [
                'label' => __('Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => TERMINAL_THEME_ASSETS_URI . 'img/service-2-img.png',
                ],
            ]
        );

        //item 1 title
        $this->add_control(
            'item_1_title',
            [
                'label' => __('Item 1 Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Track Shipment', 'terminal-africa-hub'),
            ]
        );

        //item 1 description
        $this->add_control(
            'item_1_description',
            [
                'label' => __('Item 1 Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Dui consectetur gravida platea ut dis diam. Enim morbi proin auctor et.', 'terminal-africa-hub'),
            ]
        );

        //item 2 title
        $this->add_control(
            'item_2_title',
            [
                'label' => __('Item 2 Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Secure Packaging', 'terminal-africa-hub'),
            ]
        );

        //item 2 description
        $this->add_control(
            'item_2_description',
            [
                'label' => __('Item 2 Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Et sit duis vestibulum proin. Sollicitudin velit, etiam a feugiat sagittis.', 'terminal-africa-hub'),
            ]
        );

        //item 3 title
        $this->add_control(
            'item_3_title',
            [
                'label' => __('Item 3 Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('International Shipping', 'terminal-africa-hub'),
            ]
        );

        //item 3 description
        $this->add_control(
            'item_3_description',
            [
                'label' => __('Item 3 Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Dui consectetur gravida platea ut dis diam. Enim morbi proin auctor et.', 'terminal-africa-hub'),
            ]
        );

        //end
        $this->end_controls_section();
    }

    /**
     * Render Terminal Services v2 Widget output on the frontend
     *
     * Written in PHP and used to generate the final HTML
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="terminal-service-2">
            <div class="terminal-service-2--title">
                <h2>
                    <?php echo esc_html($settings['title']); ?>
                </h2>
                <p>
                    <?php echo esc_html($settings['description']); ?>
                </p>
            </div>
            <div class="terminal-service-2--image">
                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="">
            </div>
            <div class="terminal-service-2--footer">
                <div class="terminal-service-2--footer--item">
                    <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/track-shipment-img.svg'); ?>" alt="">
                    <h4>
                        <?php echo esc_html($settings['item_1_title']); ?>
                    </h4>
                    <p>
                        <?php echo esc_html($settings['item_1_description']); ?>
                    </p>
                </div>
                <div class="terminal-service-2--footer--item">
                    <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/secure-package.svg'); ?>" alt="">
                    <h4>
                        <?php echo esc_html($settings['item_2_title']); ?>
                    </h4>
                    <p>
                        <?php echo esc_html($settings['item_2_description']); ?>
                    </p>
                </div>
                <div class="terminal-service-2--footer--item">
                    <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/international-shipping.svg'); ?>" alt="">
                    <h4>
                        <?php echo esc_html($settings['item_3_title']); ?>
                    </h4>
                    <p>
                        <?php echo esc_html($settings['item_3_description']); ?>
                    </p>
                </div>
            </div>
            <div class="terminal-service-2--footer--cta">
                <a href="#">
                    View all services
                </a>
            </div>
        </div>
<?php
    }
}
