<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Ivato Hero Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Ivato_Hero_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Ivato Hero Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-ivato-hero';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Ivato Hero Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Ivato Hero', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Ivato Hero Widget icon.
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
     * Retrieve the list of categories the Terminal Ivato Hero Widget belongs to.
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
     * Register Terminal Ivato Hero Widget Controls
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

        //enable toggle for image display
        $this->add_control(
            'hero_image_toggle',
            [
                'label' => __('Display Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Yes', 'terminal-africa-hub'),
                'label_off' => __('No', 'terminal-africa-hub'),
            ]
        );

        $this->add_control(
            'hero_image',
            [
                'label' => __('Hero Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => TERMINAL_THEME_ASSETS_URI . '/img/service-2-img.png',
                ],
                'condition' => [
                    'hero_image_toggle' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'hero_title',
            [
                'label' => __('Hero Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Fast and Reliable Shipping with SpeedGo Logistics', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'hero_description',
            [
                'label' => __('Hero Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('We don’t just deliver parcels, we deliver promises. From pick-up to destination, we’re the wheels that keep your business rolling.', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        //hide button 1
        $this->add_control(
            'hero_button_1_toggle',
            [
                'label' => __('Show Button 1', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __('Yes', 'terminal-africa-hub'),
                'label_off' => __('No', 'terminal-africa-hub'),
            ]
        );

        //first button bg
        $this->add_control(
            'hero_button_bg',
            [
                'label' => __('Button Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0A010E',
                'selectors' => [
                    '{{WRAPPER}} a:first-child' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'hero_button_1_toggle' => 'yes',
                ],
            ]
        );

        //button text
        $this->add_control(
            'hero_button_text',
            [
                'label' => __('Button Text', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Book Shipment', 'terminal-africa-hub'),
                'condition' => [
                    'hero_button_1_toggle' => 'yes',
                ],
            ]
        );

        //button link
        $this->add_control(
            'hero_button_link',
            [
                'label' => __('Button Link', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ],
                'condition' => [
                    'hero_button_1_toggle' => 'yes',
                ],
            ]
        );

        //button text color
        $this->add_control(
            'hero_button_text_color',
            [
                'label' => __('Button Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} a:first-child' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'hero_button_1_toggle' => 'yes',
                ],
            ]
        );

        //first button bg hover
        $this->add_control(
            'hero_button_bg_hover',
            [
                'label' => __('Button Background Hover Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} a:first-child:hover' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'hero_button_1_toggle' => 'yes',
                ],
            ]
        );

        //first button text color hover
        $this->add_control(
            'hero_button_text_color_hover',
            [
                'label' => __('Button Text Hover Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} a:first-child:hover' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'hero_button_1_toggle' => 'yes',
                ],
            ]
        );

        //hide second button
        $this->add_control(
            'hero_button_2_toggle',
            [
                'label' => __('Show Button 2', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
                'label_on' => __('Yes', 'terminal-africa-hub'),
                'label_off' => __('No', 'terminal-africa-hub'),
            ]
        );

        //second button bg
        $this->add_control(
            'hero_button_bg_2',
            [
                'label' => __('Button 2 Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0A010E',
                'selectors' => [
                    '{{WRAPPER}} a:nth-child(2)' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'hero_button_2_toggle' => 'yes',
                ],
            ]
        );

        //second button text color
        $this->add_control(
            'hero_button_text_color_2',
            [
                'label' => __('Button 2 Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} a:nth-child(2)' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'hero_button_2_toggle' => 'yes',
                ],
            ]
        );

        //second button border
        $this->add_control(
            'hero_button_border_2',
            [
                'label' => __('Button 2 Border Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0A010E',
                'selectors' => [
                    '{{WRAPPER}} a:nth-child(2)' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'hero_button_2_toggle' => 'yes',
                ],
            ]
        );

        //second button bg hover
        $this->add_control(
            'hero_button_bg_hover_2',
            [
                'label' => __('Button 2 Background Hover Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} a:nth-child(2):hover' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'hero_button_2_toggle' => 'yes',
                ],
            ]
        );

        //second button text color hover
        $this->add_control(
            'hero_button_text_color_hover_2',
            [
                'label' => __('Button 2 Text Hover Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} a:nth-child(2):hover' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'hero_button_2_toggle' => 'yes',
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
        <div class="terminal-hub-ivato-home-hero">
            <div class="terminal-hub-ivato-home-hero--header">
                <div class="terminal-hub-ivato-home-hero--header--left">
                    <h1>
                        <?php echo $settings['hero_title']; ?>
                    </h1>
                </div>
                <div class="terminal-hub-ivato-home-hero--header--right">
                    <p>
                        <?php echo $settings['hero_description']; ?>
                    </p>
                    <div class="terminal-hub-ivato-home-hero--header--right--buttons">
                        <?php if ($settings['hero_button_1_toggle'] === 'yes') : ?>
                            <a href="<?php echo esc_url($settings['hero_button_link']['url']); ?>">
                                <?php echo esc_html($settings['hero_button_text']); ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($settings['hero_button_2_toggle'] === 'yes') : ?>
                            <a href="#">Track Package</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if ($settings['hero_image_toggle'] === 'yes') : ?>
                <div class="terminal-hub-ivato-home-hero--body">
                    <img src="<?php echo $settings['hero_image']['url']; ?>" alt="<?php echo $settings['hero_title']; ?>">
                </div>
            <?php endif; ?>
        </div>
<?php
    }
}
