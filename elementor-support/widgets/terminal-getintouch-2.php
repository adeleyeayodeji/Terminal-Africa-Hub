<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Get In Touch 2 Elementor Widget
 * 
 * @access public
 * @since 1.0.0
 * @package Terminal Africa Hub
 * @author Terminal Development Team
 * 
 */
class Terminal_GetInTouch_2_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Get In Touch Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-getintouch-2';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Get In Touch Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Get In Touch 2', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Get In Touch Widget icon.
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
     * Retrieve the list of categories the Terminal Get In Touch Widget belongs to.
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
     * Register Terminal Get In Touch Widget Controls
     *
     * Adds different input fields to allow the user to change and customize the widget settings
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

        //type
        $this->add_control(
            'type',
            [
                'label' => __('Type', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'safi' => __('Safi', 'terminal-africa-hub'),
                    'default' => __('Default', 'terminal-africa-hub'),
                ],
                'default' => 'default',
            ]
        );

        //content
        $this->add_control(
            'content',
            [
                'label' => __('Content', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet consectetur. Ipsum pharetra sapien sagittis quisque.', 'terminal-africa-hub'),
                'label_block' => true,
                'condition' => [
                    'type' => 'safi',
                ],
            ]
        );

        //background color
        $this->add_control(
            'background_color',
            [
                'label' => __('Background Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f7941e',
                'selectors' => [
                    '{{WRAPPER}} .thub-type-safi-get-intouch-2' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'type' => 'safi',
                ],
            ]
        );

        //foreground color
        $this->add_control(
            'foreground_color',
            [
                'label' => __('Foreground Color', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .thub-type-safi-get-intouch-2' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'type' => 'safi',
                ],
            ]
        );

        //title
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Get in touch', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        //email value
        $this->add_control(
            'email',
            [
                'label' => __('Email', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('speedgo@gmail.com', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        //phone value
        $this->add_control(
            'phone',
            [
                'label' => __('Phone', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('+2348173836387', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        //facebook url
        $this->add_control(
            'facebook',
            [
                'label' => __('Facebook URL', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('https://www.facebook.com/terminalafrica', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        //instagram url
        $this->add_control(
            'instagram',
            [
                'label' => __('Instagram URL', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('https://www.instagram.com/terminalafrica', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        //twitter url
        $this->add_control(
            'twitter',
            [
                'label' => __('Twitter URL', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('https://www.twitter.com/terminalafrica', 'terminal-africa-hub'),
                'label_block' => true,
            ]
        );

        //end
        $this->end_controls_section();
    }

    /**
     * Render Terminal Get In Touch Widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <style>
            .thub-type-safi-get-intouch-2 h2 {
                color: <?php echo $settings['foreground_color']; ?> !important;
            }

            .thub-type-safi-get-intouch-2 .terminal-get-intouch-2--body--content--data {
                color: <?php echo $settings['foreground_color']; ?> !important;
            }

            .thub-type-safi-get-intouch-2 .terminal-get-intouch-2--body--email a,
            .thub-type-safi-get-intouch-2 .terminal-get-intouch-2--body--phone a {
                color: <?php echo $settings['foreground_color']; ?> !important;
            }

            .thub-type-safi-get-intouch-2 .terminal-get-intouch-2--body span {
                color: <?php echo $settings['foreground_color']; ?> !important;
            }
        </style>

        <div class="terminal-get-intouch-2 <?php echo "thub-type-" . $settings['type']; ?>-get-intouch-2">
            <div class="terminal-get-intouch-2--header">
                <div class="terminal-get-intouch-2--header--title">
                    <h2>
                        <?php echo esc_html($settings['title']); ?>
                    </h2>
                </div>
                <div class="terminal-get-intouch-2--header--line">
                    <div class="terminal-get-intouch-2--header--line--first"></div>
                    <div class="terminal-get-intouch-2--header--line--last"></div>
                </div>
            </div>
            <?php if ($settings['type'] == 'safi') : ?>
                <div class="terminal-get-intouch-2--body--content">
                    <div class="terminal-get-intouch-2--body--content--data">
                        <?php echo wp_kses_post($settings['content']); ?>
                    </div>
                </div>
            <?php endif ?>
            <div class="terminal-get-intouch-2--body">
                <div class="terminal-get-intouch-2--body--email">
                    <span>
                        Email
                    </span>
                    <a href="mailto:<?php echo esc_attr($settings['email']); ?>">
                        <?php echo esc_attr($settings['email']); ?>
                    </a>
                </div>
                <div class="terminal-get-intouch-2--body--phone">
                    <span>
                        Phone
                    </span>
                    <a href="tel:<?php echo esc_attr($settings['phone']); ?>">
                        <?php echo esc_attr($settings['phone']); ?>
                    </a>
                </div>
            </div>
            <div class="terminal-get-intouch-2--footer">
                <div class="terminal-get-intouch-2--footer--social">
                    <a href="<?php echo esc_url($settings['facebook']); ?>" target="_blank">
                        <img src="<?php echo esc_url(TERMINAL_THEME_URI . '/assets/img/facebook-2.svg'); ?>" alt="facebook">
                        <span>
                            Facebook
                        </span>
                    </a>
                </div>
                <div class="terminal-get-intouch-2--footer--social">
                    <a href="<?php echo esc_url($settings['instagram']); ?>" target="_blank">
                        <img src="<?php echo esc_url(TERMINAL_THEME_URI . '/assets/img/instagram-2.svg'); ?>" alt="instagram">
                        <span>
                            Instagram
                        </span>
                    </a>
                </div>
                <div class="terminal-get-intouch-2--footer--social">
                    <a href="<?php echo esc_url($settings['twitter']); ?>" target="_blank">
                        <img src="<?php echo esc_url(TERMINAL_THEME_URI . '/assets/img/twitter-2.svg'); ?>" alt="twitter">
                        <span>
                            Twitter
                        </span>
                    </a>
                </div>
            </div>
        </div>
<?php
    }
}
