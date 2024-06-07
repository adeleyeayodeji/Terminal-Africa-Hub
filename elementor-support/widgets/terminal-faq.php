<?php
//check for security
if (!defined('ABSPATH')) {
    die('ABSPATH must be defined to access this file');
}


/**
 * Terminal FAQ Elementor Widget
 * 
 * @access public
 * @since 1.0.0
 * @package Terminal Africa Hub
 * @author Terminal Development Team
 * 
 */
class Terminal_FAQ_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal FAQ Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-faq';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal FAQ Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal FAQ', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal FAQ Widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-table-of-contents';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Terminal FAQ Widget belongs to.
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
     * Register Terminal FAQ Widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'question',
            [
                'label' => __('Question', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Question', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'answer',
            [
                'label' => __('Answer', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Answer', 'terminal-africa-hub'),
                'show_label' => false,
            ]
        );

        $this->add_control(
            'faqs',
            [
                'label' => __('FAQs', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'question' => __('Question 1', 'terminal-africa-hub'),
                        'answer' => __('Answer 1', 'terminal-africa-hub'),
                    ],
                    [
                        'question' => __('Question 2', 'terminal-africa-hub'),
                        'answer' => __('Answer 2', 'terminal-africa-hub'),
                    ],
                ],
                'title_field' => '{{{ question }}}',
            ]
        );

        //enable or disable footer link
        $this->add_control(
            'enable_footer_link',
            [
                'label' => __('Enable Footer Link', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'terminal-africa-hub'),
                'label_off' => __('Hide', 'terminal-africa-hub'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        //footer link control
        $this->add_control(
            'footer_link',
            [
                'label' => __('Footer Link', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Can\'t find the answer you\'re looking for? Please chat to our friendly team.', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        //link
        $this->add_control(
            'footer_link_url',
            [
                'label' => __('Footer Link URL', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'terminal-africa-hub'),
                'show_label' => false,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render Terminal FAQ Widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="terminal-faqs">
            <?php
            foreach ($settings['faqs'] as $key => $faq) :
            ?>
                <div class="terminal-faq-item">
                    <div class="terminal-faq-header">
                        <h3>
                            <?php echo esc_html($faq['question']); ?>
                        </h3>
                        <img src="<?php echo TERMINAL_THEME_ASSETS_URI . '/img/accordion-' . ($key == 0 ? 'close' : 'open') . '.svg' ?>" alt="<?php echo esc_html($faq['question']); ?>">
                    </div>
                    <div class="terminal-faq-body" style="display: <?php echo ($key == 0) ? 'block' : 'none'; ?>">
                        <p style="color:black;">
                            <?php
                            echo terminal_hub_format_faq($faq['answer']);
                            ?>
                        </p>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
            <div class="terminal-faq-footer-note" style="display: <?php echo ($settings['enable_footer_link'] == 'yes') ? 'block' : 'none'; ?>">
                <a href="<?php echo esc_url($settings['footer_link_url']['url']); ?>">
                    <?php echo esc_html($settings['footer_link']); ?>
                </a>
            </div>
        </div>
<?php
    }
}
