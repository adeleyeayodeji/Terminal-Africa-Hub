<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

?>
<div class="terminal-header maputo-header">
    <div class="maputo-header-left">
        <div class="t-hub-logo">
            <a href="<?php echo esc_url(home_url()); ?>">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
                if ($logo_image) {
                    echo '<img src="' . esc_url($logo_image[0]) . '" alt="' . get_bloginfo('name') . '">';
                } else {
                    echo '<img src="http://tplug.terminal.africa/wp-content/uploads/2025/02/Frame-2380-1.png" alt="Terminal Africa Default">';
                }
                ?>
            </a>
        </div>
        <div class="t-hub-menu">
            <?php
            //wp menu
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container' => '',
                    'menu_class' => 't-hub-menu-ul'
                )
            );
            ?>
        </div>
    </div>
    <div class="t-hub-dedicated ivato-header-2-wrapper-desktop maputo-header-right">
        <div class="d-flex">
            <a href="#">Login</a>
            <a href="#">Sign Up</a>
        </div>
    </div>
</div>
<div class="terminal-mobile-menu ivato-header maputo-header-mobile">
    <div class="t-hub-logo">
        <a href="<?php echo esc_url(home_url()); ?>">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
            if ($logo_image) {
                echo '<img src="' . esc_url($logo_image[0]) . '" alt="' . get_bloginfo('name') . '">';
            } else {
                echo '<img src="http://tplug.terminal.africa/wp-content/uploads/2025/02/Frame-2380-1.png" alt="Terminal Africa Default">';
            }
            ?>
        </a>
    </div>
    <div class="t-hub-mobile-menu-cta">
        <div class="t-hub-mobile-menu-cta--links">
            <div class="d-flex">
                <a href="#">Login</a>
                <a href="#">Sign Up</a>
            </div>
        </div>
        <div class="t-hub-mobile-menu terminal-mobile-menu-content-trigger cursor-pointer">
            <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/menu-icon.svg') ?>" alt="" class="cursor-pointer" data-close-menu-icon="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/close-menu.svg') ?>" data-open-menu-icon="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/menu-icon.svg') ?>">
        </div>
    </div>
</div>
<div class="terminal-mobile-menu-content">
    <div class="t-hub-menu">
        <?php
        //wp menu
        wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'container' => '',
                'menu_class' => 't-hub-menu-ul'
            )
        );
        ?>
    </div>
    <div class="t-hub-dedicated ivato-header-2-wrapper-mobile">
        <nav class="d-flex">
            <a href="#">Login</a>
            <a href="#">Sign Up</a>
        </nav>
    </div>
</div>