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
        return __('Terminal Maputo CEO', 'terminal-africa-hub');
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
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
            <div class="thub-maputo-ceo--items">
                <?php
                foreach ($settings['items'] as $item) {
                ?>
                    <div class="thub-maputo-ceo--item">
                        <div class="thub-maputo-ceo--item--header">
                            <div class="thub-maputo-ceo--item--header--image">
                                <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['name']); ?>">
                            </div>
                            <div class="thub-maputo-ceo--item--header--content">
                                <h3>
                                    <?php echo esc_html($item['name']); ?>
                                </h3>
                                <p>
                                    <?php echo esc_html($item['position']); ?>
                                </p>
                            </div>
                        </div>
                        <div class="thub-maputo-ceo--item--content">
                            <p>
                                <?php echo esc_html($item['description']); ?>
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
