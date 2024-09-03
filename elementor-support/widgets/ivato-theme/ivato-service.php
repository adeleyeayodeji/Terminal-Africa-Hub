<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Ivato Service Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Ivato_Service_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Ivato Service Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-ivato-service';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Ivato Service Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Ivato Service', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Ivato Service Widget icon.
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
     * Retrieve the list of categories the Terminal Ivato Service Widget belongs to.
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
     * Register Terminal Ivato Service Widget Controls
     * 
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'hero_section',
            [
                'label' => __('Service Section', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('We don’t just deliver parcels, we deliver promises. From pick-up to destination, we’re the wheels that keep your business rolling.', 'terminal-africa-hub'),
            ]
        );

        //repeater images
        $first_repeater = new \Elementor\Repeater();
        $first_repeater->add_control(
            'image',
            [
                'label' => __('Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => TERMINAL_THEME_ASSETS_URI . '/img/44f580b0f42bb6ce447cb6973453537f.png',
                ],
            ]
        );

        //repeater images
        $this->add_control(
            'images',
            [
                'label' => __('Images', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $first_repeater->get_controls(),
                'default' => [
                    [
                        'image' => [
                            'url' => TERMINAL_THEME_ASSETS_URI . '/img/44f580b0f42bb6ce447cb6973453537f.png',
                        ],
                    ],
                    [
                        'image' => [
                            'url' => TERMINAL_THEME_ASSETS_URI . '/img/44f580b0f42bb6ce447cb6973453537f.png',
                        ],
                    ],
                    [
                        'image' => [
                            'url' => TERMINAL_THEME_ASSETS_URI . '/img/44f580b0f42bb6ce447cb6973453537f.png',
                        ],
                    ],
                ],
            ]
        );

        //repeater images
        $second_repeater = new \Elementor\Repeater();
        $second_repeater->add_control(
            'second_image',
            [
                'label' => __('Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => TERMINAL_THEME_ASSETS_URI . '/img/44f580b0f42bb6ce447cb6973453537f.png',
                ],
            ]
        );

        $this->add_control(
            'second_images',
            [
                'label' => __('Second Images', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $second_repeater->get_controls(),
                'default' => [
                    [
                        'second_image' => [
                            'url' => TERMINAL_THEME_ASSETS_URI . '/img/44f580b0f42bb6ce447cb6973453537f.png',
                        ],
                    ],
                    [
                        'second_image' => [
                            'url' => TERMINAL_THEME_ASSETS_URI . '/img/44f580b0f42bb6ce447cb6973453537f.png',
                        ],
                    ],
                    [
                        'second_image' => [
                            'url' => TERMINAL_THEME_ASSETS_URI . '/img/44f580b0f42bb6ce447cb6973453537f.png',
                        ],
                    ],
                ],
            ]
        );

        //cta
        $this->add_control(
            'cta',
            [
                'label' => __('CTA', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Explore all services', 'terminal-africa-hub'),
            ]
        );

        //cta link
        $this->add_control(
            'cta_link',
            [
                'label' => __('CTA Link', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        //button background color
        $this->add_control(
            'button_background_color',
            [
                'label' => __('Button Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0A010E',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-services--body--bottom--cta a' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //button text color
        $this->add_control(
            'button_text_color',
            [
                'label' => __('Button Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-services--body--bottom--cta a' => 'color: {{VALUE}}',
                ],
            ]
        );

        //button hover background color
        $this->add_control(
            'button_hover_background_color',
            [
                'label' => __('Button Hover Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-services--body--bottom--cta a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //button hover text color
        $this->add_control(
            'button_hover_text_color',
            [
                'label' => __('Button Hover Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-services--body--bottom--cta a:hover' => 'color: {{VALUE}}',
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
        <div class="terminal-hub-ivato-services">
            <div class="terminal-hub-ivato-services--header">
                <h2>
                    <?php echo esc_html($settings['title']); ?>
                </h2>
                <p>
                    <?php echo esc_html($settings['description']); ?>
                </p>
            </div>
            <div class="terminal-hub-ivato-services--body">
                <div class="terminal-hub-ivato-services--body--top">
                    <?php foreach ($settings['images'] as $image) : ?>
                        <img src="<?php echo esc_url($image['image']['url']); ?>" alt="">
                    <?php endforeach; ?>
                </div>
                <div class="terminal-hub-ivato-services--body--bottom">
                    <div class="terminal-hub-ivato-services--body--bottom--images">
                        <?php foreach ($settings['second_images'] as $image) : ?>
                            <img src="<?php echo esc_url($image['second_image']['url']); ?>" alt="">
                        <?php endforeach; ?>
                    </div>
                    <div class="terminal-hub-ivato-services--body--bottom--cta">
                        <a href="<?php echo esc_url($settings['cta_link']['url']); ?>">
                            <span>
                                <?php echo esc_html($settings['cta']); ?>
                            </span>
                            <img src="<?php echo TERMINAL_THEME_ASSETS_URI ?>/img/chevron-right.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
