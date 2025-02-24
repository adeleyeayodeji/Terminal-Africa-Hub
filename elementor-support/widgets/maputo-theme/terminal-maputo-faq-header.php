<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Maputo FAQ Header Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Maputo_FAQ_Header_Widget extends \Elementor\Widget_Base
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
        return 'terminal-maputo-faq-header';
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
        return __('Terminal Maputo FAQ Header', 'terminal-africa-hub');
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

        //FAQ Header Title
        $this->add_control(
            'faq_header_title',
            [
                'label' => __('FAQ Header Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Frequently Asked Questions', 'terminal-africa-hub'),
            ]
        );

        //FAQ Header Button Text
        $this->add_control(
            'faq_header_button_text',
            [
                'label' => __('FAQ Header Button Text', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Contact Support', 'terminal-africa-hub'),
            ]
        );

        //FAQ Header Button Link
        $this->add_control(
            'faq_header_button_link',
            [
                'label' => __('FAQ Header Button Link', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        //FAQ Header Button Color
        $this->add_control(
            'faq_header_button_color',
            [
                'label' => __('FAQ Header Button Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .thub-maputo-faq-header a' => 'color: {{VALUE}}',
                ],
            ]
        );

        //FAQ Header Button Background Color
        $this->add_control(
            'faq_header_button_background_color',
            [
                'label' => __('FAQ Header Button Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .thub-maputo-faq-header a' => 'background: {{VALUE}}',
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
        <div class="thub-maputo-faq-header">
            <h1>
                <?php echo esc_html($settings['faq_header_title']); ?>
            </h1>
            <?php
            if (!empty($settings['faq_header_button_text'])):
            ?>
                <a href="<?php echo esc_url($settings['faq_header_button_link']['url']); ?>">
                    <?php echo esc_html($settings['faq_header_button_text']); ?>
                </a>
            <?php
            endif;
            ?>
        </div>
<?php
    }
}
