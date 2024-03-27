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
        return __('Terminal Get In Touch', 'terminal-africa-hub');
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
                'label' => __('Content', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        //background color
        $this->add_control(
            'background_color',
            [
                'label' => __('Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fdeedd',
                'selectors' => [
                    '{{WRAPPER}} .terminal-in-touch' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __('Enter title', 'terminal-africa-hub'),
                'default' => __('Get in touch', 'terminal-africa-hub'),
            ]
        );

        //title color
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-in-touch h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'input_type' => 'text',
                'placeholder' => __('Enter description', 'terminal-africa-hub'),
                'default' => __('We are here to help you. Contact us for any inquiries or to get started with our services.', 'terminal-africa-hub'),
            ]
        );

        //description color
        $this->add_control(
            'description_color',
            [
                'label' => __('Description Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-in-touch p' => 'color: {{VALUE}};',
                ],
            ]
        );

        //contact
        $this->add_control(
            'contact',
            [
                'label' => __('Contact', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __('Enter contact', 'terminal-africa-hub'),
                'default' => __('Contact us', 'terminal-africa-hub'),
            ]
        );

        //url
        $this->add_control(
            'url',
            [
                'label' => __('URL', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ],
            ]
        );

        //link bg color
        $this->add_control(
            'link_bg_color',
            [
                'label' => __('Button Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f7941e',
                'selectors' => [
                    '{{WRAPPER}} .terminal-in-touch a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        //link text color
        $this->add_control(
            'link_text_color',
            [
                'label' => __('Button Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-in-touch a' => 'color: {{VALUE}};',
                ],
            ]
        );

        //button bg hover
        $this->add_control(
            'link_bg_color_hover',
            [
                'label' => __('Button Background Hover Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-in-touch a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        //button hover text color
        $this->add_control(
            'link_text_color_hover',
            [
                'label' => __('Button Text Hover Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-in-touch a:hover' => 'color: {{VALUE}};',
                ],
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
        //check if $settings['url']['url'] has http
        if (strpos($settings['url']['url'], 'http') === false) {
            $settings['url']['url'] = site_url($settings['url']['url']);
        }
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
}
