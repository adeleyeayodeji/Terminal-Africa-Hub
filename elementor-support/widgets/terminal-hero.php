<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Hero Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Hero_Widget extends \Elementor\Widget_Base
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
        return 'terminal-hero';
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
        return __('Terminal Hero', TERMINAL_THEME_TEXT_DOMAIN);
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
        return [TERMINAL_THEME_TEXT_DOMAIN];
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
                'label' => __('Hero Section', TERMINAL_THEME_TEXT_DOMAIN),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'hero_background',
            [
                'label' => __('Background Image', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'hero_title',
            [
                'label' => __('Hero Title', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('We Deliver Your Goods', TERMINAL_THEME_TEXT_DOMAIN),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'hero_description',
            [
                'label' => __('Hero Description', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('We deliver your goods to your door step with ease and convenience. We are the best in the business.', TERMINAL_THEME_TEXT_DOMAIN),
                'label_block' => true,
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
        <div class="terminal-hero-section" style="background-image: url('<?php echo esc_url($settings['hero_background']['url']); ?>');">
            <div class="hero-content">
                <h1>
                    <?php echo esc_html($settings['hero_title']); ?>
                </h1>
                <p>
                    <?php echo esc_html($settings['hero_description']); ?>
                </p>
                <div class="d-flex terminal-cta">
                    <a href="<?php echo esc_url(TERMINAL_BOOK_SHIPMENT_URL); ?>">Book Shipment</a>
                    <a href="<?php echo esc_url(TERMINAL_TRACK_SHIPMENT_URL); ?>">Track Shipment</a>
                </div>
            </div>
        </div>
    <?php
    }

    /**
     * Render Terminal Hero Widget Output on the live preview.
     * 
     * @access protected
     */
    protected function _content_template()
    {
    ?>
        <div class="terminal-hero-section" style="background-image: url('{{{ settings.hero_background.url }}}');">
            <div class="hero-content">
                <h1>
                    {{{ settings.hero_title }}}
                </h1>
                <p>
                    {{{ settings.hero_description }}}
                </p>
                <div class="d-flex terminal-cta">
                    <a href="<?php echo esc_url(TERMINAL_BOOK_SHIPMENT_URL); ?>">Book Shipment</a>
                    <a href="<?php echo esc_url(TERMINAL_TRACK_SHIPMENT_URL); ?>">Track Shipment</a>
                </div>
            </div>
        </div>
<?php
    }
}
