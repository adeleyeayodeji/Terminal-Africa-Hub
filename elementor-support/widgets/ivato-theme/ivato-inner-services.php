<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Ivato Inner Services Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Ivato_Inner_Services_Widget extends \Elementor\Widget_Base
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
        return 'terminal-ivato-inner-services';
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
        return __('Terminal Ivato inner Services', 'terminal-africa-hub');
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
