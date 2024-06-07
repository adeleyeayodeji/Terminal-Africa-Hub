<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Hero Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Hero_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Hero Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-hero';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Hero Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Hero', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Hero Widget icon.
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
     * Retrieve the list of categories the Terminal Hero Widget belongs to.
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
     * Register Terminal Hero Widget Controls
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
            'hero_background',
            [
                'label' => __('Background Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'hero_title',
            [
                'label' => __('Hero Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('We Deliver Your Goods', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'hero_description',
            [
                'label' => __('Hero Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('We deliver your goods to your door step with ease and convenience. We are the best in the business.', 'terminal-africa-hub'),
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
                    '{{WRAPPER}} .terminal-cta a:first-child' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //first button text color
        $this->add_control(
            'hero_button_text_color',
            [
                'label' => __('Button Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-cta a:first-child' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .terminal-cta a:first-child:hover' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .terminal-cta a:first-child:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        //second button bg
        $this->add_control(
            'hero_button_bg_2',
            [
                'label' => __('Button Background Color 2', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f1f1f1',
                'selectors' => [
                    '{{WRAPPER}} .terminal-cta a:last-child' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //second button text color
        $this->add_control(
            'hero_button_text_color_2',
            [
                'label' => __('Button Text Color 2', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-cta a:last-child' => 'color: {{VALUE}}',
                ],
            ]
        );

        //second button bg hover
        $this->add_control(
            'hero_button_bg_hover_2',
            [
                'label' => __('Button Background Hover Color 2', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-cta a:last-child:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //second button text color hover
        $this->add_control(
            'hero_button_text_color_hover_2',
            [
                'label' => __('Button Text Hover Color 2', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-cta a:last-child:hover' => 'color: {{VALUE}}',
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
        <div class="terminal-hero-section" style="background-image: url('<?php echo esc_url($settings['hero_background']['url']); ?>');">
            <div class="hero-content">
                <h1>
                    <?php echo esc_html($settings['hero_title']); ?>
                </h1>
                <p>
                    <?php echo wp_kses($settings['hero_description'], 'post'); ?>
                </p>
                <div class="d-flex terminal-cta">
                    <a href="<?php echo esc_attr(get_theme_mod('book_shipment_link', "#")); ?>">Book Shipment</a>
                    <a href="<?php echo esc_attr(get_theme_mod('track_shipment_link', "#")); ?>" style="border: transparent;">Track Shipment</a>
                </div>
            </div>
        </div>
    <?php
    }

    /**
     * Render Terminal Hero Widget Output on the live preview.
     * 
     * @access protected
     */
    protected function content_template()
    {
    ?>
        <div class="terminal-hero-section" style="background-image: url('{{{ settings.hero_background.url }}}');">
            <div class="hero-content">
                <h1>
                    {{{ settings.hero_title }}}
                </h1>
                <p>
                    {{{ settings.hero_description }}}
                </p>
                <div class="d-flex terminal-cta">
                    <a href="<?php echo esc_attr(get_theme_mod('book_shipment_link', "#")); ?>">Book Shipment</a>
                    <a href="<?php echo esc_attr(get_theme_mod('track_shipment_link', "#")); ?>" style="border: transparent;">Track Shipment</a>
                </div>
            </div>
        </div>
<?php
    }
}
