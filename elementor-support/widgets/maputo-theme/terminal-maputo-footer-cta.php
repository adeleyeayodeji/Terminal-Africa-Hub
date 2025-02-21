<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Maputo Footer CTA Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Maputo_Footer_CTA_Widget extends \Elementor\Widget_Base
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
        return 'terminal-maputo-footer-cta';
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
        return __('Terminal Maputo Footer CTA', 'terminal-africa-hub');
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


        //footer cta background color
        $this->add_control(
            'footer_cta_background_color',
            [
                'label' => __('Footer CTA Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#d8ddcd',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-maputo-footer-cta' => 'background: {{VALUE}}',
                ],
            ]
        );

        //footer cta title
        $this->add_control(
            'footer_cta_title',
            [
                'label' => __('Footer CTA Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        //footer cta description
        $this->add_control(
            'footer_cta_description',
            [
                'label' => __('Footer CTA Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        //footer cta link
        $this->add_control(
            'footer_cta_link',
            [
                'label' => __('Footer CTA Link', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::URL,
            ]
        );

        //footer cta text
        $this->add_control(
            'footer_cta_text',
            [
                'label' => __('Footer CTA Text', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT
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
        <div class="terminal-hub-maputo-footer-cta-container">
            <div class="terminal-hub-maputo-footer-cta">
                <div class="terminal-hub-maputo-footer-cta--left">
                    <h3>
                        <?php echo esc_html($settings['footer_cta_title']); ?>
                    </h3>
                    <p>
                        <?php echo esc_html($settings['footer_cta_description']); ?>
                    </p>
                </div>
                <div class="terminal-hub-maputo-footer-cta--right">
                    <a href="<?php echo esc_url($settings['footer_cta_link']['url']); ?>">
                        <?php echo esc_html($settings['footer_cta_text']); ?>
                    </a>
                </div>
            </div>
        </div>
<?php
    }
}
