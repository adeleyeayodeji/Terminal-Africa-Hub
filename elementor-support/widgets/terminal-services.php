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
        return __('Terminal Services', 'terminal-africa-hub');
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
                'label' => __('Content', 'terminal-africa-hub'),
            ]
        );

        //type
        $this->add_control(
            'type',
            [
                'label' => __('Type', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __('Default', 'terminal-africa-hub'),
                    'safi' => __('Safi', 'terminal-africa-hub')
                ]
            ]
        );

        //column direction
        $this->add_control(
            'column_direction',
            [
                'label' => __('Column Direction', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'row',
                'options' => [
                    'row' => __('Row', 'terminal-africa-hub'),
                    'row-reverse' => __('Row Reverse', 'terminal-africa-hub')
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Our Services', 'terminal-africa-hub'),
            ]
        );

        //enable top title
        $this->add_control(
            'enable_top_title',
            [
                'label' => __('Enable Top Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'terminal-africa-hub'),
                'label_off' => __('No', 'terminal-africa-hub'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        //top title
        $this->add_control(
            'top_title',
            [
                'label' => __('Top Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Our Services', 'terminal-africa-hub'),
                'condition' => [
                    'enable_top_title' => 'yes',
                ],
            ]
        );

        //title color
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-service h2' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .terminal-service h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        //title type
        $this->add_control(
            'title_type',
            [
                'label' => __('Title Type', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'terminal-large',
                'options' => [
                    'terminal-large' => __('Large', 'terminal-africa-hub'),
                    'terminal-small' => __('Small', 'terminal-africa-hub')
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('We offer a wide range of services to meet your needs', 'terminal-africa-hub'),
                'condition' => [
                    'type' => 'default',
                ],
            ]
        );

        //repeater for safi
        $this->add_control(
            'safi_services',
            [
                'label' => __('Safi Services', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'condition' => [
                    'type' => 'safi',
                ],
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => __('Title', 'terminal-africa-hub'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                ],
                'default' => [
                    [
                        'title' => __('✅ Fast shipping', 'terminal-africa-hub'),
                    ],
                    [
                        'title' => __('✅ Cargo shipping', 'terminal-africa-hub'),
                    ],
                    [
                        'title' => __('✅ Secure packaging', 'terminal-africa-hub'),
                    ],
                    [
                        'title' => __('✅ International express delivery', 'terminal-africa-hub'),
                    ],
                ],
            ]
        );
        //description color
        $this->add_control(
            'description_color',
            [
                'label' => __('Description Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-service p' => 'color: {{VALUE}}',
                ],
            ]
        );

        //enable link button
        $this->add_control(
            'enable_link',
            [
                'label' => __('Enable Link', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'terminal-africa-hub'),
                'label_off' => __('No', 'terminal-africa-hub'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //url title
        $this->add_control(
            'url_title',
            [
                'label' => __('URL Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('View all services', 'terminal-africa-hub'),
                'condition' => [
                    'enable_link' => 'yes',
                ],
            ]
        );

        //url title color
        $this->add_control(
            'url_title_color',
            [
                'label' => __('URL Title Color', 'terminal-africa-hub'),
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
                'label' => __('URL Button Background', 'terminal-africa-hub'),
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
                'label' => __('URL Button Background Hover', 'terminal-africa-hub'),
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
                'label' => __('URL Title Color Hover', 'terminal-africa-hub'),
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
                'label' => __('URL', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'terminal-africa-hub'),
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
                'label' => __('Image', 'terminal-africa-hub'),
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
                'label' => __('Image Size', 'terminal-africa-hub'),
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
                'label' => __('Background Color', 'terminal-africa-hub'),
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
            <div class="row m-0 justify-content-center align-items-center" style="flex-direction: <?php echo esc_attr($settings['column_direction']); ?>;gap: 20px;">
                <div class="col-lg-5 col-md-12 col-sm-12 mb-5">
                    <?php if ('yes' === $settings['enable_top_title']) : ?>
                        <h3 class="top-title <?php echo esc_attr($title_type); ?>">
                            <?php echo esc_html($settings['top_title']); ?>
                        </h3>
                    <?php endif; ?>
                    <h2 class="<?php echo esc_attr($title_type); ?>">
                        <?php echo esc_html($settings['title']); ?>
                    </h2>
                    <p>
                        <?php if ($settings['type'] == 'safi') : ?>
                    <ul class="thub-safi-services-list">
                        <?php foreach ($settings['safi_services'] as $service) : ?>
                            <li>
                                <span>
                                    <?php echo esc_html($service['title']); ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <?php echo wp_kses($settings['description'], 'post'); ?>
                <?php endif; ?>
                </p>
                <div>
                    <?php if ('yes' === $settings['enable_link']) : ?>
                        <a href="<?php echo esc_url($settings['url']['url']); ?>" title="<?php echo esc_attr($settings['url_title']); ?>" class="<?php echo "thub-type-btn-" . $settings['type']; ?>">
                            <?php echo esc_html($settings['url_title']); ?>
                        </a>
                    <?php endif; ?>
                </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 text-center">
                    <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
                </div>
            </div>
        </div>
<?php
    }
}
