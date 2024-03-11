<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Review Elementor Widget
 * 
 * @access public
 * @since 1.0.0
 * @package Terminal Africa Hub
 * @author Terminal Development Team
 * 
 */
class Terminal_Review_Widget extends \Elementor\Widget_Base
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
        return 'terminal-review';
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
        return __('Terminal Review', TERMINAL_THEME_TEXT_DOMAIN);
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
                'label' => __('Content', TERMINAL_THEME_TEXT_DOMAIN),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'review_title',
            [
                'label' => __('Review Title', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __('Enter Review Title', TERMINAL_THEME_TEXT_DOMAIN),
                'default' => __('Customer Review', TERMINAL_THEME_TEXT_DOMAIN),
            ]
        );

        //description
        $this->add_control(
            'review_description',
            [
                'label' => __('Review Description', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'input_type' => 'text',
                'placeholder' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas consectetur ut pretium egestas aliquam libero, duis est sed. Velit varius sit a elit et quis lectus enim, justo', TERMINAL_THEME_TEXT_DOMAIN),
                'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas consectetur ut pretium egestas aliquam libero, duis est sed. Velit varius sit a elit et quis lectus enim, justo', TERMINAL_THEME_TEXT_DOMAIN),
            ]
        );

        //aurthor
        $this->add_control(
            'review_author',
            [
                'label' => __('Review Author', TERMINAL_THEME_TEXT_DOMAIN),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __('Enter Review Author', TERMINAL_THEME_TEXT_DOMAIN),
                'default' => __('John Doe', TERMINAL_THEME_TEXT_DOMAIN),
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
        $review_title = $settings['review_title'];
?>
        <div class="terminal-review">
            <h2>
                <?php echo esc_html($review_title); ?>
            </h2>
            <p>
                <?php echo esc_html($settings['review_description']); ?>
            </p>
            <p class="terminal-review-profile">
                <?php echo esc_html($settings['review_author']); ?>
            </p>
            <div class="d-flex">
                <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/star-filled.svg') ?>" alt="">
                <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/star-filled.svg') ?>" alt="">
                <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/star-filled.svg') ?>" alt="">
                <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/star.svg') ?>" alt="">
                <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/star.svg') ?>" alt="">
            </div>
        </div>
<?php
    }
}
