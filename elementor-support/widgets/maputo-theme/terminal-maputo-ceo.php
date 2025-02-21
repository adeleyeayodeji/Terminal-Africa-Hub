<?php
//check for security
if (! defined('ABSPATH')) {
    exit("Direct script access denied.");
}

/**
 * Terminal Maputo CEO Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */
class Terminal_Maputo_CEO_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve Terminal Maputo CEO Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal_maputo_ceo';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Maputo CEO Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Maputo CEO / Location Hub', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Maputo CEO Widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-person';
    }

    /**
     * Get widget categories.
     *
     * Retrieve Terminal Maputo CEO Widget categories.
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['general'];
    }

    /**
     * Register widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'terminal-africa-hub'),
            ]
        );

        //bg color
        $this->add_control(
            'bg_color',
            [
                'label' => __('Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#F5F3E8',
                'selectors' => [
                    '{{WRAPPER}} .thub-maputo-ceo' => 'background: {{VALUE}};',
                ],
            ]
        );

        //checkbox to show or hide the location hub
        $this->add_control(
            'show_location_hub',
            [
                'label' => __('Use as a Location Hub', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
                'return_value' => 'yes',
                'description' => __('Use this widget as a location hub', 'terminal-africa-hub'),
            ]
        );

        //location hub title
        $this->add_control(
            'location_hub_title',
            [
                'label' => __('Location Hub Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Location Hub', 'terminal-africa-hub'),
                'condition' => [
                    'show_location_hub' => 'yes',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $repeater->add_control(
            'name',
            [
                'label' => __('Name', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Blessing', 'terminal-africa-hub'),
            ]
        );

        $repeater->add_control(
            'position',
            [
                'label' => __('Position', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('CEO Shippo', 'terminal-africa-hub'),
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => __('Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'terminal-africa-hub'),
            ]
        );

        $this->add_control(
            'items',
            [
                'label' => __('Items', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'name' => __('Blessing', 'terminal-africa-hub'),
                        'position' => __('CEO Shippo', 'terminal-africa-hub'),
                        'description' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'terminal-africa-hub'),
                    ],
                ]
            ]
        );
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="thub-maputo-ceo">
            <?php if ($settings['show_location_hub'] == 'yes') : ?>
                <div class="thub-maputo-ceo--location-hub">
                    <h2><?php echo esc_html($settings['location_hub_title']); ?></h2>
                </div>
            <?php endif; ?>
            <div class="thub-maputo-ceo--items">
                <?php
                foreach ($settings['items'] as $item) {
                ?>
                    <div class="thub-maputo-ceo--item">
                        <div class="thub-maputo-ceo--item--header <?php echo empty($item['position']) ? 'thub-maputo-ceo--item--header--with-position' : ''; ?>">
                            <div class="thub-maputo-ceo--item--header--image <?php echo $settings['show_location_hub'] == 'yes' ? 'maputo-ceo--item--header--image--icon' : ''; ?>">
                                <?php if ($settings['show_location_hub'] == 'yes') : ?>
                                    <svg width="22" height="27" viewBox="0 0 22 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C13.2091 7 15 8.79086 15 11Z" stroke="#333333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M21 11C21 20.5228 11 26 11 26C11 26 1 20.5228 1 11C1 5.47715 5.47715 1 11 1C16.5228 1 21 5.47715 21 11Z" stroke="#333333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                <?php else : ?>
                                    <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['name']); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="thub-maputo-ceo--item--header--content">
                                <h3>
                                    <?php echo esc_html($item['name']); ?>
                                </h3>
                                <?php
                                if (!empty($item['position'])) :
                                ?>
                                    <p>
                                        <?php echo esc_html($item['position']); ?>
                                    </p>
                                <?php
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="thub-maputo-ceo--item--content">
                            <p>
                                <?php echo wp_kses_post($item['description']); ?>
                            </p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

<?php
    }
}
