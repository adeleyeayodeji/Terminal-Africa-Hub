<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Ivato Map Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Ivato_Map_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Ivato Map Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-ivato-map';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Ivato Map Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Ivato Map', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Ivato Map Widget icon.
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
     * Retrieve the list of categories the Terminal Ivato Map Widget belongs to.
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
     * Register Terminal Ivato Map Widget Controls
     * 
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'hero_section',
            [
                'label' => __('Map Section', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        //iframe url
        $this->add_control(
            'iframe_url',
            [
                'label' => __('Iframe URL', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::URL,
                'input_type' => 'url',
                'placeholder' => __('https://your-iframe-url.com', 'terminal-africa-hub'),
                'default' => [
                    'url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4670.258977352!2d3.3518655756550637!3d6.613386022110931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b93ca9389e6e3%3A0xbfaa265ccacf5538!2sTerminal%20Africa%20Inc.!5e1!3m2!1sen!2sng!4v1726657092937!5m2!1sen!2sng'
                ],
                'description' => __('Enter the URL for the iframe. Ensure it is a valid URL.', 'terminal-africa-hub'),
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
        $iframe_url = $settings['iframe_url']['url'];
?>
        <div class="terminal-hub-ivato-map">
            <iframe src="<?php echo esc_url($iframe_url); ?>" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
<?php
    }
}
