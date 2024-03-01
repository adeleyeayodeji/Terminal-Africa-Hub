<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Services Elementor Widget
 * 
 * @access public
 * @since 1.0.0
 * @package Terminal Africa Hub
 * @author Terminal Development Team
 * 
 */
class Terminal_Services_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Services Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-services';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Services Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Services', TERMINAL_THEME_TEXT_DOMAIN);
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Services Widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-gallery';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Terminal Services Widget belongs to.
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
     * Register Terminal Services Widget Controls
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

        //column direction
        $this->add_control(
            'column_direction',
            [
                'label' => __('Column Direction', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'row',
                'options' => [
                    'row' => __('Row', TERMINAL_THEME_TEXT_DOMAIN),
                    'row-reverse' => __('Row Reverse', TERMINAL_THEME_TEXT_DOMAIN)
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Our Services', TERMINAL_THEME_TEXT_DOMAIN),
            ]
        );

        //title type
        $this->add_control(
            'title_type',
            [
                'label' => __('Title Type', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'terminal-large',
                'options' => [
                    'terminal-large' => __('Large', TERMINAL_THEME_TEXT_DOMAIN),
                    'terminal-small' => __('Small', TERMINAL_THEME_TEXT_DOMAIN)
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('We offer a wide range of services to meet your needs', TERMINAL_THEME_TEXT_DOMAIN),
            ]
        );

        //enable link button
        $this->add_control(
            'enable_link',
            [
                'label' => __('Enable Link', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', TERMINAL_THEME_TEXT_DOMAIN),
                'label_off' => __('No', TERMINAL_THEME_TEXT_DOMAIN),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //url title
        $this->add_control(
            'url_title',
            [
                'label' => __('URL Title', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('View all services', TERMINAL_THEME_TEXT_DOMAIN),
                'condition' => [
                    'enable_link' => 'yes',
                ],
            ]
        );

        //url title color
        $this->add_control(
            'url_title_color',
            [
                'label' => __('URL Title Color', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-service a' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'enable_link' => 'yes',
                ],
            ]
        );

        //url button bg
        $this->add_control(
            'url_button_bg',
            [
                'label' => __('URL Button Background', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f7941e',
                'selectors' => [
                    '{{WRAPPER}} .terminal-service a' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'enable_link' => 'yes',
                ],
            ]
        );

        //hover
        $this->add_control(
            'url_button_bg_hover',
            [
                'label' => __('URL Button Background Hover', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f7941e',
                'selectors' => [
                    '{{WRAPPER}} .terminal-service a:hover' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'enable_link' => 'yes',
                ],
            ]
        );

        //hover text color
        $this->add_control(
            'url_title_color_hover',
            [
                'label' => __('URL Title Color Hover', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-service a:hover' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'enable_link' => 'yes',
                ],
            ]
        );

        //url
        $this->add_control(
            'url',
            [
                'label' => __('URL', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', TERMINAL_THEME_TEXT_DOMAIN),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                ],
                'condition' => [
                    'enable_link' => 'yes',
                ],
            ]
        );

        //image url
        $this->add_control(
            'image',
            [
                'label' => __('Image', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => TERMINAL_THEME_ASSETS_URI . 'img/image-1.svg',
                ],
            ]
        );

        //image size
        $this->add_responsive_control(
            'image_size',
            [
                'label' => __('Image Size', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%', 'rem'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 100
                    ]
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .terminal-service img' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                ],
            ]
        );

        //background color
        $this->add_control(
            'background_color',
            [
                'label' => __('Background Color', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fdeedd',
                'selectors' => [
                    '{{WRAPPER}} .terminal-service' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render Terminal Services Widget Output
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //get title_type
        $title_type = $settings['title_type'];
?>
        <div class="terminal-service" style="background-color: <?php echo esc_attr($settings['background_color']); ?>">
            <div class="row m-0 justify-content-center align-items-center" style="flex-direction: <?php echo esc_attr($settings['column_direction']); ?>">
                <div class="col-lg-5 col-md-5 col-sm-12 mb-5">
                    <h2 class="<?php echo esc_attr($title_type); ?>">
                        <?php echo esc_html($settings['title']); ?>
                    </h2>
                    <p>
                        <?php echo esc_html($settings['description']); ?>
                    </p>
                    <div>
                        <?php if ('yes' === $settings['enable_link']) : ?>
                            <a href="<?php echo esc_url($settings['url']['url']); ?>" title="<?php echo esc_attr($settings['url_title']); ?>">
                                <?php echo esc_html($settings['url_title']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 text-center">
                    <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
                </div>
            </div>
        </div>
<?php
    }
}
