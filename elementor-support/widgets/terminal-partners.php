<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Partners Elementor Widget
 * 
 * @access public
 * @since 1.0.0
 * @author Terminal Development Team
 * 
 */
class Terminal_Partners_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Partners Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-partners';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Partners Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Partners', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Partners Widget icon.
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
     * Retrieve the list of categories the Terminal Partners Widget belongs to.
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
     * Register Terminal Partners Widget Controls
     *
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'partners_section',
            [
                'label' => __('Partners', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'partner_image',
            [
                'label' => __('Partner Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'partners',
            [
                'label' => __('Partners', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'partner_image' => [
                            'url' => TERMINAL_THEME_ASSETS_URI . 'img/dhl.svg',
                        ],
                    ],
                ],
                'title_field' => '{{{ partner_image.url }}}',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render Terminal Partners Widget output on the frontend.
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $partners = $settings['partners'];
?>
        <div class="terminal-partners">
            <div class="d-flex justify-content-between align-items-center">
                <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/dhl.svg') ?>" alt="DHL">
                <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/ups.svg') ?>" alt="UPS">
                <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/Fedex.svg') ?>" alt="Fedex">
                <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/Aramex.svg') ?>" alt="Aramex">
            </div>
        </div>
<?php
    }
}
