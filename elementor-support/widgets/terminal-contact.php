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
        return __('Terminal Contact', TERMINAL_THEME_TEXT_DOMAIN);
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
                'label' => __('Content', TERMINAL_THEME_TEXT_DOMAIN),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
                Talk to us
            </h3>
            <form action="" class="terminal-form-fields">
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <textarea name="message" id="message" class="form-control" placeholder="Enter your message" cols="50" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </div>
            </form>
        </div>
<?php
    }
}
