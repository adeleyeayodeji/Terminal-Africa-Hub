<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Ivato Book Shipment Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Ivato_Book_Shipment_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Ivato Book Shipment Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-ivato-book-shipment';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Ivato Book Shipment Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Ivato Book Shipment', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Ivato Book Shipment Widget icon.
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
     * Retrieve the list of categories the Terminal Ivato Book Shipment Widget belongs to.
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
     * Register Terminal Ivato Book Shipment Widget Controls
     * 
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'hero_section',
            [
                'label' => __('Book Shipment Section', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        //toggle title
        $this->add_control(
            'enable_title',
            [
                'label' => __('Enable Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Yes', 'terminal-africa-hub'),
                'label_off' => __('No', 'terminal-africa-hub'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Send your parcels with ease and assurance.', 'terminal-africa-hub'),
                'condition' => [
                    'enable_title' => 'yes',
                ],
            ]
        );

        //cta text
        $this->add_control(
            'cta_text',
            [
                'label' => __('CTA Text', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Book a Shipment', 'terminal-africa-hub'),
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
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        //cta background color
        $this->add_control(
            'cta_background_color',
            [
                'label' => __('CTA Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-book-shipment--body--wrapper a' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //cta text color
        $this->add_control(
            'cta_text_color',
            [
                'label' => __('CTA Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-book-shipment--body--wrapper a span' => 'color: {{VALUE}}',
                ],
            ]
        );

        //cta hover background color
        $this->add_control(
            'cta_hover_background_color',
            [
                'label' => __('CTA Hover Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-book-shipment--body--wrapper a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //cta hover text color
        $this->add_control(
            'cta_hover_text_color',
            [
                'label' => __('CTA Hover Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-book-shipment--body--wrapper a:hover span' => 'color: {{VALUE}}',
                ],
            ]
        );

        //remove bottom space
        $this->add_control(
            'remove_bottom_space',
            [
                'label' => __('Remove Bottom Space', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => __('Yes', 'terminal-africa-hub'),
                'label_off' => __('No', 'terminal-africa-hub'),
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-book-shipment' => 'padding-bottom: 0;',
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
        <div class="terminal-hub-ivato-book-shipment">
            <div class="terminal-hub-ivato-book-shipment--header">
                <?php if ($settings['enable_title'] === 'yes') : ?>
                    <h2>
                        <?php echo esc_html($settings['title']); ?>
                    </h2>
                <?php endif; ?>
            </div>
            <div class="terminal-hub-ivato-book-shipment--body">
                <div class="terminal-hub-ivato-book-shipment--body--wrapper">
                    <a href="<?php echo esc_url($settings['cta_link']['url']); ?>">
                        <span>
                            <?php echo esc_html($settings['cta_text']); ?>
                        </span>
                        <img src="<?php echo TERMINAL_THEME_ASSETS_URI ?>/img/book-shipment-icon.svg" alt="Book Shipment">
                    </a>
                </div>
            </div>
        </div>
<?php
    }
}
