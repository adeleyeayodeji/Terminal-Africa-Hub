<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Get In Touch Elementor Widget
 * 
 * @access public
 * @since 1.0.0
 * @package Terminal Africa Hub
 * @author Terminal Development Team
 * 
 */
class Terminal_GetInTouch_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Get In Touch Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-getintouch';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Get In Touch Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Get In Touch', TERMINAL_THEME_TEXT_DOMAIN);
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Get In Touch Widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-image';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Terminal Get In Touch Widget belongs to.
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['terminal-widgets'];
    }

    /**
     * Register Terminal Get In Touch Widget Controls
     *
     * Adds different input fields to allow the user to change and customize the widget settings
     *
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', TERMINAL_THEME_TEXT_DOMAIN),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __('Enter title', TERMINAL_THEME_TEXT_DOMAIN),
                'default' => __('Get in touch', TERMINAL_THEME_TEXT_DOMAIN),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'input_type' => 'text',
                'placeholder' => __('Enter description', TERMINAL_THEME_TEXT_DOMAIN),
                'default' => __('We are here to help you. Contact us for any inquiries or to get started with our services.', TERMINAL_THEME_TEXT_DOMAIN),
            ]
        );

        //contact
        $this->add_control(
            'contact',
            [
                'label' => __('Contact', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __('Enter contact', TERMINAL_THEME_TEXT_DOMAIN),
                'default' => __('Contact us', TERMINAL_THEME_TEXT_DOMAIN),
            ]
        );

        //url
        $this->add_control(
            'url',
            [
                'label' => __('URL', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ],
            ]
        );

        //background color
        $this->add_control(
            'background_color',
            [
                'label' => __('Background Color', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fdeedd',
                'selectors' => [
                    '{{WRAPPER}} .terminal-in-touch' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        //end
        $this->end_controls_section();
    }

    /**
     * Render Terminal Get In Touch Widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="terminal-in-touch" style="background-color: <?php echo esc_attr($settings['background_color']); ?>">
            <div class="row m-0 justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>
                        <?php echo esc_html($settings['title']); ?>
                    </h2>
                    <p>
                        <?php echo esc_html($settings['description']); ?>
                    </p>
                    <div>
                        <a href="<?php echo esc_url($settings['url']['url']); ?>" title="<?php echo esc_attr($settings['contact']); ?>">
                            <?php echo esc_html($settings['contact']); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }

    /**
     * Render Terminal Get In Touch Widget Output
     *
     * @access protected
     */
    protected function _content_template()
    {
    ?>
        <div class="terminal-in-touch" style="background-color: {{{ settings.background_color }}}">
            <div class="row m-0 justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>
                        {{{ settings.title }}}
                    </h2>
                    <p>
                        {{{ settings.description }}}
                    </p>
                    <div>
                        <a href="{{{ settings.url.url }}}" title="{{{ settings.contact }}}">
                            {{{ settings.contact }}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
