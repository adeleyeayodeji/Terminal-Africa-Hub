<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Terminal Ivato Locations Widget Elementor
 * 
 * @access public
 * @author Adeleye Ayodeji
 * @since 1.0.0
 */

class Terminal_Ivato_Locations_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Terminal Ivato Locations Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'terminal-ivato-locations';
    }

    /**
     * Get widget title.
     *
     * Retrieve Terminal Ivato Locations Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Terminal Ivato Locations', 'terminal-africa-hub');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Terminal Ivato Locations Widget icon.
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
     * Retrieve the list of categories the Terminal Ivato Locations Widget belongs to.
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
     * Register Terminal Ivato Locations Widget Controls
     * 
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'hero_section',
            [
                'label' => __('Locations Section', 'terminal-africa-hub'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Our Locations (Hubs)', 'terminal-africa-hub'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('We don’t just deliver parcels, we deliver promises. From pick-up to destination, we’re the wheels that keep your business rolling.', 'terminal-africa-hub'),
            ]
        );

        //list of address repeater
        $address = new \Elementor\Repeater();

        $address->add_control(
            'address_title',
            [
                'label' => __('Enter Title', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Ikeja Hub', 'terminal-africa-hub')
            ]
        );

        //address description
        $address->add_control(
            'address_description',
            [
                'label' => __('Enter Description', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('1, Olufunmilayo street, Dideolu Estate, Ogba, Lagos 100218', 'terminal-africa-hub')
            ]
        );

        //address email
        $address->add_control(
            'address_email',
            [
                'label' => __('Enter Email', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('speedgo@gmail.com', 'terminal-africa-hub')
            ]
        );

        //address phone
        $address->add_control(
            'address_phone',
            [
                'label' => __('Enter Phone', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('+234 817 383 6387', 'terminal-africa-hub')
            ]
        );

        //add open hours repeater to the section
        $this->add_control(
            'address',
            [
                'label' => __('Address', 'terminal-africa-hub'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $address->get_controls(),
                'default' => [
                    [
                        'address_title' => __('Ikeja Hub', 'terminal-africa-hub'),
                        'address_description' => __('1, Olufunmilayo street, Dideolu Estate, Ogba, Lagos 100218', 'terminal-africa-hub'),
                        'address_email' => __('speedgo@gmail.com', 'terminal-africa-hub'),
                        'address_phone' => __('+234 817 383 6387', 'terminal-africa-hub')
                    ],
                    [
                        'address_title' => __('Ikeja Hub', 'terminal-africa-hub'),
                        'address_description' => __('1, Olufunmilayo street, Dideolu Estate, Ogba, Lagos 100218', 'terminal-africa-hub'),
                        'address_email' => __('speedgo@gmail.com', 'terminal-africa-hub'),
                        'address_phone' => __('+234 817 383 6387', 'terminal-africa-hub')
                    ],
                    [
                        'address_title' => __('Ikeja Hub', 'terminal-africa-hub'),
                        'address_description' => __('1, Olufunmilayo street, Dideolu Estate, Ogba, Lagos 100218', 'terminal-africa-hub'),
                        'address_email' => __('speedgo@gmail.com', 'terminal-africa-hub'),
                        'address_phone' => __('+234 817 383 6387', 'terminal-africa-hub')
                    ],
                ]
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
        <div class="terminal-hub-ivato-locations">
            <div class="terminal-hub-ivato-locations--header">
                <h2>
                    <?php echo esc_html($settings['title']); ?>
                </h2>
                <p>
                    <?php echo esc_html($settings['description']); ?>
                </p>
            </div>
            <div class="terminal-hub-ivato-locations--body">
                <div class="terminal-hub-ivato-locations--body--items">
                    <?php
                    foreach ($settings['address'] as $address) :
                    ?>
                        <div class="terminal-hub-ivato-locations--body--items--item">
                            <div class="terminal-hub-ivato-locations--body--items--item--header">
                                <div class="terminal-hub-ivato-locations--body--items--item--header--icon">
                                    <img src="<?php echo TERMINAL_THEME_ASSETS_URI ?>/img/map-icon.svg" alt="Terminal Africa Hub">
                                </div>
                                <h3>
                                    <?php echo esc_html($address['address_title']); ?>
                                </h3>
                            </div>
                            <div class="terminal-hub-ivato-locations--body--items--item--content">
                                <p>
                                    <?php echo esc_html($address['address_description']); ?>
                                </p>
                            </div>
                            <div class="terminal-hub-ivato-locations--body--items--item--cta">
                                <a href="mailto:<?php echo esc_html($address['address_email']); ?>">
                                    <img src="<?php echo TERMINAL_THEME_ASSETS_URI ?>/img/map-icon.svg" alt="Email">
                                    <span>
                                        <?php echo esc_html($address['address_email']); ?>
                                    </span>
                                </a>
                                <a href="tel:<?php echo esc_html($address['address_phone']); ?>">
                                    <img src="<?php echo TERMINAL_THEME_ASSETS_URI ?>/img/phone.svg" alt="Phone">
                                    <span>
                                        <?php echo esc_html($address['address_phone']); ?>
                                    </span>
                                </a>
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
