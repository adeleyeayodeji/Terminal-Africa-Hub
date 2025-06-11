<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Ivato FAQs Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Ivato_Faqs_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Ivato FAQs Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-ivato-faqs';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Ivato FAQs Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Ivato FAQs', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Ivato FAQs Widget icon.
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
     * Retrieve the list of categories the Terminal Ivato FAQs Widget belongs to.
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
     * Register Terminal Ivato FAQs Widget Controls
     * 
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'hero_section',
            [
                'label' => __('FAQs Section', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        //type
        $this->add_control(
            'type',
            [
                'label' => __('Type', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'ivato' => __('Ivato', 'terminal-africa-hub'),
                    'maputo' => __('Maputo', 'terminal-africa-hub'),
                ],
                'default' => 'ivato',
            ]
        );

        //hide title
        $this->add_control(
            'hide_title',
            [
                'label' => __('Hide Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no'
            ]
        );

        //show description for maputo
        $this->add_control(
            'description',
            [
                'label' => __('Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 'terminal-africa-hub'),
                'condition' => [
                    'type' => 'maputo',
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('FAQs', 'terminal-africa-hub'),
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
                    '{{WRAPPER}} .terminal-hub-ivato-faqs' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .terminal-hub-ivato-faqs h2, {{WRAPPER}} .terminal-hub-ivato-faqs h3, {{WRAPPER}} .terminal-hub-ivato-faqs p, {{WRAPPER}} .terminal-hub-ivato-faqs span, {{WRAPPER}} .terminal-hub-ivato-faqs a' => 'color: {{VALUE}}',
                ],
            ]
        );

        //link text
        $this->add_control(
            'link_title',
            [
                'label' => __('Link Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('See All FAQs', 'terminal-africa-hub')
            ]
        );

        //link url
        $this->add_control(
            'link_url',
            [
                'label' => __('Link URL', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ]
            ]
        );

        //link color
        $this->add_control(
            'link_text_color',
            [
                'label' => __('Link Text Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#3B343E',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-faqs--left a span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .terminal-hub-ivato-faqs--left a svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );

        //link hover color
        $this->add_control(
            'link_hover_color',
            [
                'label' => __('Link Hover Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-faqs--left a:hover span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .terminal-hub-ivato-faqs--left a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .terminal-hub-ivato-faqs--left a:hover svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );

        //link hover background color
        $this->add_control(
            'link_hover_background_color',
            [
                'label' => __('Link Hover Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#3b343e',
                'selectors' => [
                    '{{WRAPPER}} .terminal-hub-ivato-faqs--left a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //faqs repeater
        $faqs_repeater = new \Elementor\Repeater();

        $faqs_repeater->add_control(
            'question',
            [
                'label' => __('Question', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('What is Terminal Africa?', 'terminal-africa-hub'),
            ]
        );

        $faqs_repeater->add_control(
            'answer',
            [
                'label' => __('Answer', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('Terminal Africa is a shipping company that provides shipping services to individuals and businesses.', 'terminal-africa-hub'),
            ]
        );

        //add to control
        $this->add_control(
            'faqs',
            [
                'label' => __('FAQs', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $faqs_repeater->get_controls(),
                'default' => [
                    [
                        'question' => __('What is Terminal Africa?', 'terminal-africa-hub'),
                        'answer' => __('Terminal Africa is a shipping company that provides shipping services to individuals and businesses.', 'terminal-africa-hub'),
                    ],
                    [
                        'question' => __('What is Terminal Africa?', 'terminal-africa-hub'),
                        'answer' => __('Terminal Africa is a shipping company that provides shipping services to individuals and businesses.', 'terminal-africa-hub'),
                    ],
                    [
                        'question' => __('What is Terminal Africa?', 'terminal-africa-hub'),
                        'answer' => __('Terminal Africa is a shipping company that provides shipping services to individuals and businesses.', 'terminal-africa-hub'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render Terminal Ivato FAQs Widget Output
     * 
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="terminal-hub-ivato-faqs <?php echo esc_attr($settings['type']); ?> <?php echo $settings['hide_title'] === 'yes' ? 'maputo-hide-title' : ''; ?>">
            <div class="terminal-hub-ivato-faqs--left">
                <h2>
                    <?php echo esc_html($settings['title']); ?>
                </h2>
                <?php if ($settings['type'] === 'maputo') : ?>
                    <p>
                        <?php echo wp_kses_post($settings['description']); ?>
                    </p>
                <?php endif; ?>
                <a href="<?php echo esc_url($settings['link_url']['url']); ?>">
                    <span>
                        <?php echo esc_html($settings['link_title']); ?>
                    </span>
                    <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.651642 11.7238C0.307128 11.3655 0.318299 10.7958 0.676594 10.4512L5.40189 6L0.676593 1.54875C0.318299 1.20424 0.307127 0.634497 0.651641 0.276201C0.996156 -0.0820923 1.56589 -0.0932637 1.92419 0.25125L7.32419 5.35125C7.50066 5.52093 7.60039 5.75518 7.60039 6C7.60039 6.24481 7.50066 6.47907 7.32419 6.64875L1.92419 11.7487C1.56589 12.0933 0.996156 12.0821 0.651642 11.7238Z" fill="#333333" />
                    </svg>
                </a>
            </div>
            <div class="terminal-hub-ivato-faqs--right">
                <div class="terminal-hub-ivato-faqs--right--items">
                    <?php
                    foreach ($settings['faqs'] as $faq) :
                    ?>
                        <div class="terminal-hub-ivato-faqs--right--items--item">
                            <div class="terminal-hub-ivato-faqs--right--items--item--question">
                                <img src="<?php echo TERMINAL_THEME_ASSETS_URI ?>/img/plus.svg" alt="Plus Icon">
                                <h3>
                                    <?php echo esc_html($faq['question']); ?>
                                </h3>
                            </div>
                            <div class="terminal-hub-ivato-faqs--right--items--item--answer">
                                <p>
                                    <?php echo wp_kses_post($faq['answer']); ?>
                                </p>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
<?php
    }
}
