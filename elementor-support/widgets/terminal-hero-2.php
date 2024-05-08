<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Hero 2 Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Hero_2_Widget extends \Elementor\Widget_Base
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
        return 'terminal-hero-2';
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
        return __('Terminal Hero 2', 'terminal-africa-hub');
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
            'content_section',
            [
                'label' => __('Content', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __('Enter your title', 'terminal-africa-hub'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'input_type' => 'text',
                'placeholder' => __('Enter your description', 'terminal-africa-hub'),
            ]
        );


        //image
        $this->add_control(
            'image',
            [
                'label' => __('Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => TERMINAL_THEME_ASSETS_URI . 'img/shipment-hero-2.svg',
                ],
            ]
        );

        //end
        $this->end_controls_section();
    }

    /**
     * Render Terminal Hero Widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="terminal-thub-hero-2">
            <div class="terminal-thub-hero-2--content">
                <h1>
                    <?php echo esc_html($settings['title']); ?>
                </h1>
                <p>
                    <?php echo esc_html($settings['description']); ?>
                </p>
                <div class="terminal-thub-hero-2--content--cta">
                    <a href="#" class="terminal-thub-hero-2--content--cta--link-1">
                        Book Shipment
                    </a>
                    <a href="#" class="terminal-thub-hero-2--content--cta--link-2">
                        Get Quotes
                    </a>
                </div>
            </div>
            <div class="terminal-thub-hero-2--image">
                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="Terminal Africa Hub Hero Image">
            </div>
        </div>
    <?php
    }

    /**
     * Render Terminal Hero Widget output on the frontend.
     *
     * Written in JS and used to generate the final HTML.
     *
     * @access protected
     */
    protected function content_template()
    {
    ?>
        <div class="terminal-thub-hero-2">
            <div class="terminal-thub-hero-2--content">
                <h1>
                    {{{settings.title}}}
                </h1>
                <p>
                    {{{settings.description}}}
                </p>
                <div class="terminal-thub-hero-2--content--cta">
                    <a href="#" class="terminal-thub-hero-2--content--cta--link-1">
                        Book Shipment
                    </a>
                    <a href="#" class="terminal-thub-hero-2--content--cta--link-2">
                        Get Quotes
                    </a>
                </div>
            </div>
            <div class="terminal-thub-hero-2--image">
                <img src="{{{settings.image.url}}}" alt="Terminal Africa Hub Hero Image">
            </div>
        </div>
<?php
    }
}
