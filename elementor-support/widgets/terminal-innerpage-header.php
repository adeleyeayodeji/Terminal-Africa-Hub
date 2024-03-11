<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Innerpage Header Widget Elementor
 * 
 * @access public
 * @since 1.0.0
 * @package Terminal Africa Hub
 * @author Terminal Development Team
 * 
 */
class Terminal_Innerpage_Header_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Innerpage Header Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-innerpage-header';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Innerpage Header Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Innerpage Header', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Innerpage Header Widget icon.
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
     * Retrieve the list of categories the Terminal Innerpage Header Widget belongs to.
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
     * Register Terminal Innerpage Header Widget Controls
     *
     * Adds different input fields to allow the user to change and customize the widget settings
     *
     * @access protected
     *
     * @return void
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'terminal-africa-hub'),
            ]
        );

        //title color
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
            ]
        );

        //header background color
        $this->add_control(
            'header_bg_color',
            [
                'label' => __('Header Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fdeedd',
            ]
        );

        //add hr 
        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        //end control
        $this->end_controls_section();
    }

    /**
     * Render Terminal Innerpage Header Widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     *
     * @return void
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $header_bg_color = $settings['header_bg_color'];
?>
        <div class="terminal-innerpage-header" style="background-color: <?php echo esc_attr($header_bg_color); ?>">
            <h2 style="color:<?php echo esc_attr($settings['title_color']); ?>">
                <?php echo esc_html(get_the_title()); ?>
            </h2>
        </div>
<?php
    }
}
