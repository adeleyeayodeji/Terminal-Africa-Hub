<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Ivato Offer Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Ivato_Offer_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Ivato Offer Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-ivato-offer';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Ivato Offer Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Ivato Offer', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Ivato Offer Widget icon.
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
     * Retrieve the list of categories the Terminal Ivato Offer Widget belongs to.
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
     * Register Terminal Ivato Offer Widget Controls
     * 
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'offer_section',
            [
                'label' => __('Offer Section', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        //header title 
        $this->add_control(
            'header_title',
            [
                'label' => __('Header Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('We offer', 'terminal-africa-hub'),
            ]
        );

        //header title span
        $this->add_control(
            'header_title_span',
            [
                'label' => __('Header Title Span', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('cargo services', 'terminal-africa-hub'),
            ]
        );

        //header description
        $this->add_control(
            'header_description',
            [
                'label' => __('Header Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('We deliver tailored solutions designed to meet the specific needs of each of our customers. Regardless of your cargo type, or final destination, we offer versatile solutions that cover air, land, and sea.', 'terminal-africa-hub'),
            ]
        );

        //header button
        $this->add_control(
            'header_button',
            [
                'label' => __('Header Button', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Book Cargo Shipment', 'terminal-africa-hub'),
            ]
        );

        //header button link
        $this->add_control(
            'header_button_link',
            [
                'label' => __('Header Button Link', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        //repeater
        $services_repeater = new \Elementor\Repeater();

        $services_repeater->add_control(
            'service_title',
            [
                'label' => __('Service Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Service Title', 'terminal-africa-hub'),
            ]
        );

        //add repeater to section
        $this->add_control(
            'services',
            [
                'label' => __('Services', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $services_repeater->get_controls(),
                'default' => [
                    [
                        'service_title' => __('Choose pickup hub/airport', 'terminal-africa-hub'),
                    ],
                    [
                        'service_title' => __('Choose destination airport', 'terminal-africa-hub'),
                    ],
                    [
                        'service_title' => __('Add your parcel items', 'terminal-africa-hub'),
                    ],
                    [
                        'service_title' => __('We send you an invoice', 'terminal-africa-hub'),
                    ],
                ],
            ]
        );

        //image
        $this->add_control(
            'image',
            [
                'label' => __('Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => TERMINAL_THEME_ASSETS_URI . '/img/44f580b0f42bb6ce447cb6973453537f.png',
                ],
            ]
        );

        //background color
        $this->add_control(
            'background_color',
            [
                'label' => __('Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render Terminal Ivato Offer Widget Output
     * 
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="terminal-hub-ivato-offer" style="background-color: <?php echo esc_attr($settings['background_color']); ?>;">
            <div class="terminal-hub-ivato-offer--header">
                <h2>
                    <?php echo esc_html($settings['header_title']); ?> <span><?php echo esc_html($settings['header_title_span']); ?></span>
                </h2>
                <p>
                    <?php echo esc_html($settings['header_description']); ?>
                </p>
                <a href="<?php echo esc_url($settings['header_button_link']['url']); ?>">
                    <span>
                        <?php echo esc_html($settings['header_button']); ?>
                    </span>
                </a>
            </div>
            <div class="terminal-hub-ivato-offer--body">
                <div class="terminal-hub-ivato-offer--body--left">
                    <ol>
                        <?php foreach ($settings['services'] as $index => $service) : ?>
                            <li>
                                <span>
                                    <?php echo $index + 1; ?>
                                </span>
                                <span>
                                    <?php echo esc_html($service['service_title']); ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
                <div class="terminal-hub-ivato-offer--body--right">
                    <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="Terminal Africa Hub">
                </div>
            </div>
        </div>
<?php
    }
}
