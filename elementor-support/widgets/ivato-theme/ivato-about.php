<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Ivato About Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Ivato_About_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Ivato About Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-ivato-about';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Ivato About Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Ivato About', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Ivato About Widget icon.
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
     * Retrieve the list of categories the Terminal Ivato About Widget belongs to.
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
     * Register Terminal Ivato About Widget Controls
     * 
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'hero_section',
            [
                'label' => __('About Section', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        //fonts
        $this->add_control(
            'section_font',
            [
                'label' => __('Title Font', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::FONT,
                'default' => 'Lato, sans-serif',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-about h2, {{WRAPPER}} .terminal-hub-ivato-about h3, {{WRAPPER}} .terminal-hub-ivato-about p, {{WRAPPER}} .terminal-hub-ivato-about span, {{WRAPPER}} .terminal-hub-ivato-about a' => 'font-family: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => __('Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('About Us', 'terminal-africa-hub'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('We don’t just deliver parcels, we deliver promises. From pick-up to destination, we’re the wheels that keep your business rolling.', 'terminal-africa-hub'),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => TERMINAL_THEME_ASSETS_URI . '/img/service-2-img.png',
                ],
            ]
        );

        $this->add_control(
            'open_hours_title',
            [
                'label' => __('Open Hours Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Open Hours', 'terminal-africa-hub'),
            ]
        );


        //list of open hours repeater
        $open_hours = new \Elementor\Repeater();

        $open_hours->add_control(
            'open_day_list',
            [
                'label' => __('Enter Day', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Monday - Friday: 6.00 PM - 11.00 PM', 'terminal-africa-hub')
            ],
            [
                'label' => __('Enter Day', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Monday - Friday: 6.00 PM - 11.00 PM', 'terminal-africa-hub')
            ]
        );

        //add open hours repeater to the section
        $this->add_control(
            'open_hours',
            [
                'label' => __('Open Hours', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $open_hours->get_controls(),
            ]
        );

        //main office text
        $this->add_control(
            'main_office_text',
            [
                'label' => __('Main Office Text', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Main Office Address', 'terminal-africa-hub'),
            ]
        );

        //main office address
        $this->add_control(
            'main_office_address',
            [
                'label' => __('Main Office Address', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('1, Olufunmilayo street, Dideolu Estate, Ogba, Lagos 100218', 'terminal-africa-hub'),
            ]
        );

        //email
        $this->add_control(
            'email',
            [
                'label' => __('Email', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('info@terminalhub.com', 'terminal-africa-hub'),
            ]
        );

        //phone
        $this->add_control(
            'phone',
            [
                'label' => __('Phone', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('+234 800 000 0000', 'terminal-africa-hub'),
            ]
        );

        //first cta text
        $this->add_control(
            'first_cta_text',
            [
                'label' => __('First CTA Text', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Book Shipment', 'terminal-africa-hub'),
            ]
        );

        //first cta background
        $this->add_control(
            'first_cta_background',
            [
                'label' => __('First CTA Background', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-about--body--content--cta a:first-child' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //first cta text color
        $this->add_control(
            'first_cta_text_color',
            [
                'label' => __('First CTA Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-about--body--content--cta a:first-child' => 'color: {{VALUE}}',
                ],
            ]
        );

        //first cta hover text color
        $this->add_control(
            'first_cta_hover_text_color',
            [
                'label' => __('First CTA Hover Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-about--body--content--cta a:first-child:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        //first cta hover background color
        $this->add_control(
            'first_cta_hover_background_color',
            [
                'label' => __('First CTA Hover Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-about--body--content--cta a:first-child:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //first cta link
        $this->add_control(
            'first_cta_link',
            [
                'label' => __('First CTA Link', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        //enable second cta
        $this->add_control(
            'enable_second_cta',
            [
                'label' => __('Enable Second CTA', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Yes', 'terminal-africa-hub'),
                'label_off' => __('No', 'terminal-africa-hub'),
            ]
        );

        //second cta text
        $this->add_control(
            'second_cta_text',
            [
                'label' => __('Second CTA Text', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Track Shipment', 'terminal-africa-hub'),
                'condition' => [
                    'enable_second_cta' => 'yes',
                ],
            ]
        );

        //second cta border color
        $this->add_control(
            'second_cta_border_color',
            [
                'label' => __('Second CTA Border Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-about--body--content--cta a:last-child' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'enable_second_cta' => 'yes',
                ],
            ]
        );

        //second cta text color
        $this->add_control(
            'second_cta_text_color',
            [
                'label' => __('Second CTA Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-about--body--content--cta a:last-child' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'enable_second_cta' => 'yes',
                ],
            ]
        );

        //second hover text color
        $this->add_control(
            'second_cta_hover_text_color',
            [
                'label' => __('Second CTA Hover Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-about--body--content--cta a:last-child:hover' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'enable_second_cta' => 'yes',
                ],
            ]
        );

        //second cta hover background color
        $this->add_control(
            'second_cta_hover_background_color',
            [
                'label' => __('Second CTA Hover Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-about--body--content--cta a:last-child:hover' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'enable_second_cta' => 'yes',
                ],
            ]
        );

        //second cta link
        $this->add_control(
            'second_cta_link',
            [
                'label' => __('Second CTA Link', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
                'condition' => [
                    'enable_second_cta' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render Terminal About Widget Output
     * 
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="terminal-hub-ivato-about">
            <div class="terminal-hub-ivato-about--header">
                <h2>
                    <?php echo $settings['title']; ?>
                </h2>
                <p style="display: none;">
                    <?php echo $settings['description']; ?>
                </p>
            </div>
            <div class="terminal-hub-ivato-about--body">
                <div class="terminal-hub-ivato-about--body--image" style="background-image: url('<?php echo esc_url($settings['image']['url']); ?>');">
                </div>
                <div class="terminal-hub-ivato-about--body--content">
                    <div class="terminal-hub-ivato-about--body--content--top">
                        <h3>
                            <?php echo $settings['open_hours_title']; ?>
                        </h3>
                        <?php foreach ($settings['open_hours'] as $open_hour) : ?>
                            <p>
                                <?php echo $open_hour['open_day_list']; ?>
                            </p>
                        <?php endforeach; ?>
                    </div>
                    <div class="terminal-hub-ivato-about--body--content--bottom">
                        <h3>
                            <?php echo $settings['main_office_text']; ?>
                        </h3>
                        <p>
                            <?php echo $settings['main_office_address']; ?>
                        </p>
                    </div>
                    <div class="terminal-hub-ivato-about--body--content--contact">
                        <div class="terminal-hub-ivato-about--body--content--contact--email">
                            <img src="<?php echo TERMINAL_THEME_ASSETS_URI ?>/img/map.svg" alt="Email">
                            <span>
                                <?php echo $settings['email']; ?>
                            </span>
                        </div>
                        <div class="terminal-hub-ivato-about--body--content--contact--phone">
                            <img src="<?php echo TERMINAL_THEME_ASSETS_URI ?>/img/phone.svg" alt="Phone">
                            <span>
                                <?php echo $settings['phone']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="terminal-hub-ivato-about--body--content--cta">
                        <a href="<?php echo esc_url($settings['first_cta_link']['url']); ?>">
                            <?php echo esc_html($settings['first_cta_text']); ?>
                        </a>
                        <?php if ($settings['enable_second_cta'] === 'yes') : ?>
                            <a href="<?php echo esc_url($settings['second_cta_link']['url']); ?>">
                                <?php echo esc_html($settings['second_cta_text']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
