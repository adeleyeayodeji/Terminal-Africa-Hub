<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Ivato Reviews Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Ivato_Reviews_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Ivato Reviews Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-ivato-reviews';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Ivato Reviews Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Ivato Reviews', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Ivato Reviews Widget icon.
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
     * Retrieve the list of categories the Terminal Ivato Reviews Widget belongs to.
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
     * Register Terminal Ivato Reviews Widget Controls
     * 
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'hero_section',
            [
                'label' => __('Reviews Section', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'header_title',
            [
                'label' => __('Header Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Reviews', 'terminal-africa-hub'),
            ]
        );

        $this->add_control(
            'header_description',
            [
                'label' => __('Header Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Find out what our customers are saying about their experience with us and why they love it.', 'terminal-africa-hub'),
            ]
        );

        //bg color
        $this->add_control(
            'bg_color',
            [
                'label' => __('BG Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-reviews' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //text color
        $this->add_control(
            'text_color',
            [
                'label' => __('Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-reviews h2, {{WRAPPER}} .terminal-hub-ivato-reviews h3, {{WRAPPER}} .terminal-hub-ivato-reviews p, {{WRAPPER}} .terminal-hub-ivato-reviews span, {{WRAPPER}} .terminal-hub-ivato-reviews a' => 'color: {{VALUE}}',
                ],
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
            'title',
            [
                'label' => __('Body Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('SpeedGo delivered my UK parcel in 2 days. I couldn’t believe it.', 'terminal-africa-hub'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Body Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('SpeedGo delivered my UK parcel in 2 days. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'terminal-africa-hub'),
            ]
        );

        $this->add_control(
            'author_name',
            [
                'label' => __('Author Name', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Blessing Ojediran', 'terminal-africa-hub'),
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
        <div class="terminal-hub-ivato-reviews">
            <div class="terminal-hub-ivato-reviews--header">
                <h2>
                    <?php echo esc_html($settings['header_title']); ?>
                </h2>
                <p>
                    <?php echo esc_html($settings['header_description']); ?>
                </p>
            </div>
            <div class="terminal-hub-ivato-reviews--body">
                <div class="terminal-hub-ivato-reviews--body--left" style="background-image: url('<?php echo esc_url($settings['image']['url']); ?>');">
                    <!-- do nothing -->
                </div>
                <div class="terminal-hub-ivato-reviews--body--right">
                    <h3>
                        <?php echo esc_html($settings['title']); ?>
                    </h3>
                    <p>
                        <?php echo esc_html($settings['description']); ?>
                    </p>
                    <p>
                        -- <?php echo esc_html($settings['author_name']); ?>
                    </p>
                </div>
            </div>
        </div>
<?php
    }
}
