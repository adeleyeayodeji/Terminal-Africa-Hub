<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Ivato Hero Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Ivato_Hero_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Ivato Hero Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-ivato-hero';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Ivato Hero Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Ivato Hero', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Ivato Hero Widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-slides';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Terminal Ivato Hero Widget belongs to.
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['terminal-africa-hub'];
    }

    /**
     * Register Terminal Ivato Hero Widget Controls
     * 
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'hero_section',
            [
                'label' => __('Hero Section', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'hero_image',
            [
                'label' => __('Hero Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => TERMINAL_THEME_ASSETS_URI . '/img/service-2-img.png',
                ],
            ]
        );

        $this->add_control(
            'hero_title',
            [
                'label' => __('Hero Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Fast and Reliable Shipping with SpeedGo Logistics', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'hero_description',
            [
                'label' => __('Hero Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('We don’t just deliver parcels, we deliver promises. From pick-up to destination, we’re the wheels that keep your business rolling.', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        //first button bg
        $this->add_control(
            'hero_button_bg',
            [
                'label' => __('Button Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f1f1f1',
                'selectors' => [
                    '{{WRAPPER}} a:first-child' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //button text color
        $this->add_control(
            'hero_button_text_color',
            [
                'label' => __('Button Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} a:first-child' => 'color: {{VALUE}}',
                ],
            ]
        );

        //first button bg hover
        $this->add_control(
            'hero_button_bg_hover',
            [
                'label' => __('Button Background Hover Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} a:first-child:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //first button text color hover
        $this->add_control(
            'hero_button_text_color_hover',
            [
                'label' => __('Button Text Hover Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} a:first-child:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render Terminal Hero Widget Output
     * 
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="terminal-hub-ivato-home-hero">
            <div class="terminal-hub-ivato-home-hero--header">
                <div class="terminal-hub-ivato-home-hero--header--left">
                    <h1>
                        <?php echo $settings['hero_title']; ?>
                    </h1>
                </div>
                <div class="terminal-hub-ivato-home-hero--header--right">
                    <p>
                        <?php echo $settings['hero_description']; ?>
                    </p>
                    <a href="#">Book Shipment</a>
                </div>
            </div>
            <div class="terminal-hub-ivato-home-hero--body">
                <img src="<?php echo $settings['hero_image']['url']; ?>" alt="<?php echo $settings['hero_title']; ?>">
            </div>
        </div>
<?php
    }
}
