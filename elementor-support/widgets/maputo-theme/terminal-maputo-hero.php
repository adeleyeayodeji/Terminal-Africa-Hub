<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Maputo Hero Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Maputo_Hero_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Hero Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-maputo-hero';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Hero Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Maputo Hero', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Hero Widget icon.
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
     * Retrieve the list of categories the Terminal Hero Widget belongs to.
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
     * Register Terminal Hero Widget Controls
     * 
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'hero_section',
            [
                'label' => __('Hero Section', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        //Hero Container color
        $this->add_control(
            'hero_container_color',
            [
                'label' => __('Hero Container Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#F5F3E8',
            ]
        );


        $repeater = new \Elementor\Repeater();

        //hero bg color
        $repeater->add_control(
            'hero_item_bg_color',
            [
                'label' => __('Hero Item Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#E3CCAD'
            ]
        );

        //hero text color
        $repeater->add_control(
            'hero_item_text_color',
            [
                'label' => __('Hero Item Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000'
            ]
        );

        $repeater->add_control(
            'hero_item_image',
            [
                'label' => __('Hero Item Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'hero_item_title',
            [
                'label' => __('Hero Item Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Hero Item Title', 'terminal-africa-hub'),
            ]
        );

        $repeater->add_control(
            'hero_item_description',
            [
                'label' => __('Hero Item Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Hero Item Description', 'terminal-africa-hub'),
            ]
        );

        $repeater->add_control(
            'hero_item_button_text',
            [
                'label' => __('Hero Item Button Text', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Hero Item Button Text', 'terminal-africa-hub'),
            ]
        );

        $repeater->add_control(
            'hero_item_button_link',
            [
                'label' => __('Hero Item Button Link', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::URL,
            ]
        );

        //button bg color
        $repeater->add_control(
            'hero_item_button_bg_color',
            [
                'label' => __('Hero Item Button Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .thub-maputo-services-hero--item-content a' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //button text color
        $repeater->add_control(
            'hero_item_button_text_color',
            [
                'label' => __('Hero Item Button Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .thub-maputo-services-hero--item-content a' => 'color: {{VALUE}}',
                ],
            ]
        );

        //button hover bg color
        $repeater->add_control(
            'hero_item_button_hover_bg_color',
            [
                'label' => __('Hero Item Button Hover Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .thub-maputo-services-hero--item-content a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //button hover text color
        $repeater->add_control(
            'hero_item_button_hover_text_color',
            [
                'label' => __('Hero Item Button Hover Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .thub-maputo-services-hero--item-content a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'hero_items',
            [
                'label' => __('Hero Items', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'hero_item_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'hero_item_title' => __('Hero Item Title', 'terminal-africa-hub'),
                        'hero_item_description' => __('Hero Item Description', 'terminal-africa-hub'),
                        'hero_item_button_text' => __('Hero Item Button Text', 'terminal-africa-hub'),
                        'hero_item_button_link' => [
                            'url' => '#',
                        ]
                    ]
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render Terminal Hero Widget Output
     * 
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="thub-maputo-services-hero" style="background-color: <?php echo $settings['hero_container_color']; ?>">
            <div class="thub-maputo-services-hero--items">
                <?php
                foreach ($settings['hero_items'] as $item) {
                ?>
                    <div class="thub-maputo-services-hero--item" style="background-color: <?php echo $item['hero_item_bg_color']; ?>">
                        <div class="thub-maputo-services-hero--item-image">
                            <img src="<?php echo $item['hero_item_image']['url']; ?>" alt="Maputo Services">
                        </div>
                        <div class="thub-maputo-services-hero--item-content">
                            <h4 style="color: <?php echo $item['hero_item_text_color']; ?>"><?php echo esc_html($item['hero_item_title']); ?></h4>
                            <p style="color: <?php echo $item['hero_item_text_color']; ?>">
                                <?php echo wp_kses_post($item['hero_item_description']); ?>
                            </p>
                            <a href="<?php echo esc_url($item['hero_item_button_link']['url']); ?>" class="thub-maputo-services-hero--item-button">
                                <?php echo esc_html($item['hero_item_button_text']); ?>
                            </a>
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
