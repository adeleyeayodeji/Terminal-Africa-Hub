<?php
//check for security
if (!defined('ABSPATH')) {
    exit('You must not access this file directly!');
}


/**
 * Terminal Services v2 Elementor Widget
 * 
 * @access public
 * @since 1.0.0
 * @package Terminal Africa Hub
 * @author Terminal Development Team
 * 
 */
class Terminal_Service_V2_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Services v2 Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-service-v2';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Services v2 Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Service v2', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Services v2 Widget icon.
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
     * Retrieve the list of categories the Terminal Services v2 Widget belongs to.
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['terminal-elements'];
    }

    /**
     * Register Terminal Services v2 Widget Controls
     *
     * Adds different input fields to allow the user to change and customize the widget settings
     *
     * @access protected
     */
    protected function _register_controls()
    {
        //start_controls_section
        $this->start_controls_section(
            'terminal_service_v2_section',
            [
                'label' => __('Terminal Service v2', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        //title 
        $this->add_control(
            'terminal_service_v2_title',
            [
                'label' => __('Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Logistics services', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        //items array 
        $repeater = new \Elementor\Repeater();

        //icon
        $repeater->add_control(
            'terminal_service_v2_icon',
            [
                'label' => __('Icon', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'label_block' => true,
                'default' => 'fa-solid fa-box-open', // Default icon
            ]
        );

        //title
        $repeater->add_control(
            'terminal_service_v2_item_title',
            [
                'label' => __('Item Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Track Shipment', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        //description
        $repeater->add_control(
            'terminal_service_v2_item_description',
            [
                'label' => __('Item Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        //items
        $this->add_control(
            'terminal_service_v2_items',
            [
                'label' => __('Items', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'terminal_service_v2_item_title' => __('Track Shipment', 'terminal-africa-hub'),
                        'terminal_service_v2_item_description' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'terminal-africa-hub'),
                    ],
                    [
                        'terminal_service_v2_item_title' => __('Secure Packaging', 'terminal-africa-hub'),
                        'terminal_service_v2_item_description' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'terminal-africa-hub'),
                    ],
                    [
                        'terminal_service_v2_item_title' => __('Track Shipment', 'terminal-africa-hub'),
                        'terminal_service_v2_item_description' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'terminal-africa-hub'),
                    ],
                    [
                        'terminal_service_v2_item_title' => __('Track Shipment', 'terminal-africa-hub'),
                        'terminal_service_v2_item_description' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'terminal-africa-hub'),
                    ],
                    [
                        'terminal_service_v2_item_title' => __('Secure Packaging', 'terminal-africa-hub'),
                        'terminal_service_v2_item_description' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'terminal-africa-hub'),
                    ],
                    [
                        'terminal_service_v2_item_title' => __('Track Shipment', 'terminal-africa-hub'),
                        'terminal_service_v2_item_description' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'terminal-africa-hub'),
                    ],
                ],
                'title_field' => '{{{ terminal_service_v2_item_title }}}',
            ]
        );

        //end_controls_section
        $this->end_controls_section();
    }

    /**
     * Render Terminal Services v2 Widget output on the frontend.
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="terminal-service-v2">
            <div class="terminal-service-v2-header">
                <h2>
                    <?php echo esc_html($settings['terminal_service_v2_title']); ?>
                </h2>
            </div>
            <div class="terminal-service-v2-content">
                <?php
                if ($settings['terminal_service_v2_items']) {
                    foreach ($settings['terminal_service_v2_items'] as $item) {
                ?>
                        <div class="terminal-service-v2-items">
                            <div class="terminal-service-v2-icon">
                                <?php
                                if (!empty($item['terminal_service_v2_icon']['value'])) {
                                    \Elementor\Icons_Manager::render_icon($item['terminal_service_v2_icon'], ['aria-hidden' => 'true']);
                                } else {
                                    echo '<img src="' . esc_url(TERMINAL_THEME_ASSETS_URI . 'img/box-search.svg') . '" alt="' . esc_attr($item['terminal_service_v2_item_title']) . '">';
                                }
                                ?>
                            </div>
                            <h3>
                                <?php echo esc_html($item['terminal_service_v2_item_title']); ?>
                            </h3>
                            <div class="terminal-service-v2-p-holder">
                                <p>
                                    <?php echo esc_html($item['terminal_service_v2_item_description']); ?>
                                </p>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
<?php
    }
}
