<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Hero 2 Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Hero_2_Widget extends \Elementor\Widget_Base
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
        return 'terminal-hero-2';
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
        return __('Terminal Hero 2', 'terminal-africa-hub');
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
            'content_section',
            [
                'label' => __('Content', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __('Enter your title', 'terminal-africa-hub'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'input_type' => 'text',
                'placeholder' => __('Enter your description', 'terminal-africa-hub'),
            ]
        );


        //image
        $this->add_control(
            'image',
            [
                'label' => __('Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => TERMINAL_THEME_ASSETS_URI . 'img/shipment-hero-2.svg',
                ],
            ]
        );

        //Header Type
        $this->add_control(
            'header_type',
            [
                'label' => __('Header Type', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'ivato-default' => __('Default', 'terminal-africa-hub'),
                    'ivato-hero-advanced' => __('Header 2', 'terminal-africa-hub'),
                ],
                'default' => 'ivato-default',
            ]
        );

        //Button one bg color
        $this->add_control(
            'button_one_bg_color',
            [
                'label' => __('Button One BG Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-thub-hero-2--content--cta--link-1' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        //Button one text color
        $this->add_control(
            'button_one_text_color',
            [
                'label' => __('Button One Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-thub-hero-2--content--cta--link-1' => 'color: {{VALUE}};',
                ],
            ]
        );

        //Button one hover bg color
        $this->add_control(
            'button_one_hover_bg_color',
            [
                'label' => __('Button One Hover BG Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-thub-hero-2--content--cta--link-1:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        //Button one hover text color
        $this->add_control(
            'button_one_hover_text_color',
            [
                'label' => __('Button One Hover Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-thub-hero-2--content--cta--link-1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        //second button text border color
        $this->add_control(
            'second_button_text_border_color',
            [
                'label' => __('Second Button Text Border Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-thub-hero-2--content--cta--link-2' => 'border-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'second_button_text_color',
            [
                'label' => __('Second Button Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-thub-hero-2--content--cta--link-2' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        //second button text border hover color
        $this->add_control(
            'second_button_text_border_hover_color',
            [
                'label' => __('Second Button Text Border Hover Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-thub-hero-2--content--cta--link-2:hover' => 'border-color: {{VALUE}} !important;',
                ],
            ]
        );

        //second button text hover color
        $this->add_control(
            'second_button_text_hover_color',
            [
                'label' => __('Second Button Text Hover Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-thub-hero-2--content--cta--link-2:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );


        //second button text
        $this->add_control(
            'second_button_text',
            [
                'label' => __('Second Button Text', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __('Enter your second button text', 'terminal-africa-hub'),
                'default' => 'Get Quotes',
            ]
        );

        //second button link
        $this->add_control(
            'second_button_link',
            [
                'label' => __('Second Button Link', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('Enter your second button link', 'terminal-africa-hub'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        //end
        $this->end_controls_section();
    }

    /**
     * Render Terminal Hero Widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $header_type = $settings['header_type'];
?>
        <div class="terminal-thub-hero-2 <?php echo esc_attr($header_type); ?>">
            <div class="terminal-thub-hero-2--content">
                <h1>
                    <?php echo esc_html($settings['title']); ?>
                </h1>
                <p>
                    <?php echo esc_html($settings['description']); ?>
                </p>
                <div class="terminal-thub-hero-2--content--cta">
                    <a href="#" class="terminal-thub-hero-2--content--cta--link-1">
                        Book Shipment
                    </a>
                    <a href="<?php echo esc_url($settings['second_button_link']['url']); ?>" class="terminal-thub-hero-2--content--cta--link-2">
                        <?php echo esc_html($settings['second_button_text']); ?>
                    </a>
                </div>
            </div>
            <div class="terminal-thub-hero-2--image">
                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="Terminal Africa Hub Hero Image">
            </div>
        </div>
<?php
    }
}
