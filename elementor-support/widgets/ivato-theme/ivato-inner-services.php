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

        //add service list repeater
        $service_list = new \Elementor\Repeater();

        $service_list->add_control(
            'service_image',
            [
                'label' => __('Service Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $service_list->add_control(
            'service_title',
            [
                'label' => __('Service Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Service Title', 'terminal-africa-hub'),
            ]
        );

        $service_list->add_control(
            'service_description',
            [
                'label' => __('Service Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Service Description', 'terminal-africa-hub'),
            ]
        );

        $this->add_control(
            'service_list',
            [
                'label' => __('Service List', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $service_list->get_controls(),
                'default' => [
                    [
                        'service_image' => [
                            'url' => get_template_directory_uri() . '/assets/img/44f580b0f42bb6ce447cb6973453537f.png',
                        ],
                        'service_title' => __('Service Title', 'terminal-africa-hub'),
                        'service_description' => __('Service Description', 'terminal-africa-hub'),
                    ],
                ],
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
        <div class="terminal-hub-ivato-services-list">
            <div class="terminal-hub-ivato-services-list--items">
                <?php
                foreach ($settings['service_list'] as $service) :
                ?>
                    <div class="terminal-hub-ivato-services-list--items--item">
                        <img src="<?php echo $service['service_image']['url']; ?>" alt="<?php echo $service['service_title']; ?>">
                        <h3><?php echo $service['service_title']; ?></h3>
                        <p>
                            <?php echo $service['service_description']; ?>
                        </p>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
<?php
    }
}
