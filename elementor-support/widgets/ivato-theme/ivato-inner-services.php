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

        //type
        $this->add_control(
            'design_type',
            [
                'label' => __('Design Type', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'ivato',
                'options' => [
                    'ivato' => __('Ivato', 'terminal-africa-hub'),
                    'maputo' => __('Maputo', 'terminal-africa-hub'),
                ],
            ]
        );

        //enable title
        $this->add_control(
            'enable_title',
            [
                'label' => __('Enable Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        //title
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Title', 'terminal-africa-hub'),
                'condition' => [
                    'enable_title' => 'yes',
                ],
            ]
        );

        //bg color
        $this->add_control(
            'bg_color',
            [
                'label' => __('BG Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-services-list' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //text color
        $this->add_control(
            'text_color',
            [
                'label' => __('Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-services-list h2, {{WRAPPER}} .terminal-hub-ivato-services-list h3, {{WRAPPER}} .terminal-hub-ivato-services-list p, {{WRAPPER}} .terminal-hub-ivato-services-list span, {{WRAPPER}} .terminal-hub-ivato-services-list a' => 'color: {{VALUE}}',
                ],
            ]
        );

        //description
        $this->add_control(
            'description',
            [
                'label' => __('Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('From tracking to packaging to international deliveries and everywhere in between, we’ve got you covered.', 'terminal-africa-hub'),
                'condition' => [
                    'design_type' => 'maputo',
                ],
            ]
        );

        //add service list repeater
        $service_list = new \Elementor\Repeater();

        //add condition to enable image
        $service_list->add_control(
            'enable_image',
            [
                'label' => __('Enable Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        //add service image
        $service_list->add_control(
            'service_image',
            [
                'label' => __('Service Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'enable_image' => 'yes',
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

        //CTA Text if enable_title is yes
        $this->add_control(
            'cta_text',
            [
                'label' => __('CTA Text', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('See all services &gt;', 'terminal-africa-hub'),
                'condition' => [
                    'enable_title' => 'yes',
                ],
            ]
        );

        //CTA Link if enable_title is yes
        $this->add_control(
            'cta_link',
            [
                'label' => __('CTA Link', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::URL,
                'condition' => [
                    'enable_title' => 'yes',
                ],
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        //design type 
        $this->add_control(
            'design_type',
            [
                'label' => __('Design Type', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'type-1',
                'options' => [
                    'ivato-type-1' => __('Ivato Type 1', 'terminal-africa-hub'),
                    'ivato-type-2' => __('Ivato Type 2', 'terminal-africa-hub'),
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
        <div class="terminal-hub-ivato-services-list <?php echo $settings['design_type']; ?>">
            <?php if ($settings['enable_title'] === 'yes') : ?>
                <?php if ($settings['design_type'] === 'ivato') : ?>
                    <div class="terminal-hub-ivato-services-list--header">
                        <h2>
                            <?php echo $settings['title']; ?>
                        </h2>
                        <a href="<?php echo $settings['cta_link']['url']; ?>">
                            <span><?php echo $settings['cta_text']; ?></span>
                        </a>
                    </div>
                <?php
                elseif ($settings['design_type'] === 'maputo') :
                ?>
                    <div class="terminal-hub-maputo-services-list--header">
                        <h2>
                            <?php echo $settings['title']; ?>
                        </h2>
                        <p>
                            <?php echo $settings['description']; ?>
                        </p>
                        <a href="<?php echo $settings['cta_link']['url']; ?>">
                            <span>
                                <?php echo $settings['cta_text']; ?>
                                <svg width="9" height="12" viewBox="0 0 9 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.15128 11.7238C0.806762 11.3655 0.817933 10.7958 1.17623 10.4512L5.90153 6L1.17623 1.54875C0.817933 1.20424 0.806761 0.634497 1.15128 0.276201C1.49579 -0.0820923 2.06553 -0.0932637 2.42382 0.25125L7.82382 5.35125C8.00029 5.52093 8.10003 5.75518 8.10003 6C8.10003 6.24481 8.00029 6.47907 7.82382 6.64875L2.42382 11.7487C2.06553 12.0933 1.49579 12.0821 1.15128 11.7238Z" fill="#333333" />
                                </svg>
                            </span>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="terminal-hub-ivato-services-list--items <?php echo $settings['design_type']; ?>">
                <?php
                foreach ($settings['service_list'] as $service) :
                ?>
                    <div class="terminal-hub-ivato-services-list--items--item">
                        <?php if ($service['enable_image'] === 'yes') : ?>
                            <img src="<?php echo $service['service_image']['url']; ?>" alt="<?php echo $service['service_title']; ?>">
                        <?php endif; ?>
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
