<?php
//check for security
if (!defined('ABSPATH')) {
    die('ABSPATH must be defined to access this file');
}

/**
 * Terminal Contact Elementor Widget
 * 
 * @access public
 * @since 1.0.0
 * @package Terminal Africa Hub
 * @author Terminal Development Team
 * 
 */
class Terminal_Contact_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Contact Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-contact';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Contact Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Contact', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Contact Widget icon.
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
     * Retrieve the list of categories the Terminal Contact Widget belongs to.
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
     * Register Terminal Contact Widget Controls
     * 
     * @access protected
     * 
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

        //title
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Talk to us', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        //button text
        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Send Message', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        //button bg
        $this->add_control(
            'button_bg',
            [
                'label' => __('Button Background', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f7941e',
                'selectors' => [
                    '{{WRAPPER}} .terminal-contact-form .btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        //button text color
        $this->add_control(
            'button_text_color',
            [
                'label' => __('Button Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-contact-form .btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        //button hover bg
        $this->add_control(
            'button_hover_bg',
            [
                'label' => __('Button Hover Background', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .terminal-contact-form .btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        //button hover text color
        $this->add_control(
            'button_hover_text_color',
            [
                'label' => __('Button Hover Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-contact-form .btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        //end
        $this->end_controls_section();
    }

    /**
     * Render Terminal Contact Widget output on the frontend
     * 
     * @access protected
     * 
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="terminal-contact-form">
            <h3>
                <?php echo esc_html($settings['title']); ?>
            </h3>
            <form action="" class="terminal-form-fields" id="terminal-submit-contact">
                <input type="hidden" name="contact_mail" value="<?php echo esc_attr($settings['from_mail']); ?>">
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <textarea name="message" id="message" class="form-control" placeholder="Enter your message" cols="50" rows="5" required></textarea>
                </div>
                <div class="terminal-form-message" style="display: none;"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <?php echo esc_html($settings['button_text']); ?>
                    </button>
                </div>
            </form>
        </div>
<?php
    }
}
