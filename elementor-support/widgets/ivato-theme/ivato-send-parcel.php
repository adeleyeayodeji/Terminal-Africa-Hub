<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Ivato Send Parcel Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Ivato_Send_Parcel_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Ivato Send Parcel Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-ivato-send-parcel';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Ivato Send Parcel Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Ivato Send Parcel', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Ivato Send Parcel Widget icon.
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
     * Retrieve the list of categories the Terminal Ivato Send Parcel Widget belongs to.
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
     * Register Terminal Ivato Send Parcel Widget Controls
     * 
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'hero_section',
            [
                'label' => __('Send Parcel Section', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        //title
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Send your parcels with ease and assurance.', 'terminal-africa-hub'),
            ]
        );

        //book shipment button
        $this->add_control(
            'book_shipment_button',
            [
                'label' => __('Book Shipment Button', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Book Shipment', 'terminal-africa-hub'),
            ]
        );

        //book shipment text color
        $this->add_control(
            'book_shipment_text_color',
            [
                'label' => __('Book Shipment Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-africa-hub-ivato-send-parcel--cta--book-shipment' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        //book shipment bg color
        $this->add_control(
            'book_shipment_bg_color',
            [
                'label' => __('Book Shipment BG Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-africa-hub-ivato-send-parcel--cta--book-shipment' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );

        //hover color
        $this->add_control(
            'book_shipment_hover_text_color',
            [
                'label' => __('Book Shipment Hover Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-africa-hub-ivato-send-parcel--cta--book-shipment:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        //hover bg color
        $this->add_control(
            'book_shipment_hover_bg_color',
            [
                'label' => __('Book Shipment Hover BG Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-africa-hub-ivato-send-parcel--cta--book-shipment:hover' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );

        //book shipment link
        $this->add_control(
            'book_shipment_link',
            [
                'label' => __('Book Shipment Link', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('#', 'terminal-africa-hub'),
                'default' => [
                    'url' => '#',
                ]
            ]
        );

        //contact us button
        $this->add_control(
            'contact_us_button',
            [
                'label' => __('Contact Us Button', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Contact Us', 'terminal-africa-hub'),
            ]
        );

        //contact us text color
        $this->add_control(
            'contact_us_text_color',
            [
                'label' => __('Contact Us Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-africa-hub-ivato-send-parcel--cta--contact-us' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        //contact us border color
        $this->add_control(
            'contact_us_border_color',
            [
                'label' => __('Contact Us Border Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-africa-hub-ivato-send-parcel--cta--contact-us' => 'border-color: {{VALUE}} !important',
                ],
            ]
        );

        //contact us hover text color
        $this->add_control(
            'contact_us_hover_text_color',
            [
                'label' => __('Contact Us Hover Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-africa-hub-ivato-send-parcel--cta--contact-us:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        //contact us hover border color
        $this->add_control(
            'contact_us_hover_border_color',
            [
                'label' => __('Contact Us Hover Border Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-africa-hub-ivato-send-parcel--cta--contact-us:hover' => 'border-color: {{VALUE}} !important',
                ],
            ]
        );

        //contact us link
        $this->add_control(
            'contact_us_link',
            [
                'label' => __('Contact Us Link', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('#', 'terminal-africa-hub'),
                'default' => [
                    'url' => '#',
                ]
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render Terminal Ivato Send Parcel Widget Output
     * 
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="terminal-africa-hub-ivato-send-parcel">
            <div class="terminal-africa-hub-ivato-send-parcel--header">
                <h3><?php echo esc_html($settings['title']); ?></h3>
            </div>
            <div class="terminal-africa-hub-ivato-send-parcel--cta">
                <a href="<?php echo esc_url($settings['book_shipment_link']['url']); ?>" class="terminal-africa-hub-ivato-send-parcel--cta--book-shipment" style="color: <?php echo esc_attr($settings['book_shipment_text_color']); ?>; background-color: <?php echo esc_attr($settings['book_shipment_bg_color']); ?>;"><?php echo esc_html($settings['book_shipment_button']); ?></a>
                <a href="<?php echo esc_url($settings['contact_us_link']['url']); ?>" class="terminal-africa-hub-ivato-send-parcel--cta--contact-us" style="color: <?php echo esc_attr($settings['contact_us_text_color']); ?>; border-color: <?php echo esc_attr($settings['contact_us_border_color']); ?>;"><?php echo esc_html($settings['contact_us_button']); ?></a>
            </div>
        </div>
<?php
    }
}
