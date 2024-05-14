<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Review v2 Elementor Widget
 * 
 * @access public
 * @since 1.0.0
 * @package Terminal Africa Hub
 * @author Terminal Development Team
 * 
 */
class Terminal_Review_V2_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Review Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-review-v2';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Review Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Review v2', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Review Widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-image-white';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Terminal Review Widget belongs to.
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
     * Register Terminal Review Widget Controls
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

        //description
        $this->add_control(
            'review_note',
            [
                'label' => __('Review Content', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'input_type' => 'text',
                'placeholder' => __('Enter description', 'terminal-africa-hub'),
                'default' => __('Id urna, nisl, ut quam. Diam suspendisse fringilla quam arcu mattis est velit in. Nibh in purus sit convallis phasellus ut. At vel erat ultricies commodo. Neque suspendisse a habitasse commodo.', 'terminal-africa-hub'),
            ]
        );

        //aurthor
        $this->add_control(
            'review_author',
            [
                'label' => __('Review Author', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __('Enter Review Author', 'terminal-africa-hub'),
                'default' => __('Edikan David', 'terminal-africa-hub'),
            ]
        );

        //image
        $this->add_control(
            'review_image',
            [
                'label' => __('Review Image', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => TERMINAL_THEME_ASSETS_URI . 'img/sample-testimonial.png',
                ],
            ]
        );

        //end 
        $this->end_controls_section();
    }

    /**
     * Render Terminal Review Widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <div class="terminal-testimonial-2">
            <div class="terminal-testimonial-2--first">
                <div class="terminal-testimonial-2--first--comment">
                    <p>
                        <?php echo esc_html($settings['review_note']); ?>
                    </p>
                </div>
                <div class="terminal-testimonial-2--first--author">
                    <p>
                        <?php echo esc_html($settings['review_author']); ?>
                    </p>
                </div>
                <div class="terminal-testimonial-2--first--navigation">
                    <div class="terminal-testimonial-2--first--navigation--idle terminal-testimonial-2--first--navigation--active"></div>
                    <!-- <div class="terminal-testimonial-2--first--navigation--idle"></div> -->
                    <!-- <div class="terminal-testimonial-2--first--navigation--idle"></div> -->
                    <!-- <div class="terminal-testimonial-2--first--navigation--idle"></div> -->
                    <!-- <div class="terminal-testimonial-2--first--navigation--idle"></div> -->
                </div>
            </div>
            <div class="terminal-testimonial-2--second">
                <div class="terminal-testimonial-2--second--bg">
                    <div class="terminal-testimonial-2--second--bg--image">
                        <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/chat-quote.svg'); ?>" alt="" class="terminal-testimonial-2--second--bg--image--first">
                        <img src="<?php echo esc_url($settings['review_image']['url']); ?>" alt="" class="terminal-testimonial-2--second--bg--image--second">
                        <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/boxes.svg'); ?>" alt="" class="terminal-testimonial-2--second--bg--image--third">
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
