<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
?>
<div class="terminal-header">
    <div class="t-hub-logo">
        <a href="<?php echo esc_url(home_url()); ?>">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
            if ($logo_image) {
                echo '<img src="' . esc_url($logo_image[0]) . '" alt="' . get_bloginfo('name') . '">';
            } else {
                echo '<img src="http://tplug.terminal.africa/wp-content/uploads/2025/02/logo-full.png" loading="lazy" alt="Terminal Africa Default">';
            }
            ?>
        </a>
    </div>
    <div class="t-hub-menu">
        <!-- silence is golden -->
    </div>
    <div class="t-hub-dedicated-safi">
        <div class="d-flex">
            <a href="#">Get Quotes</a>
            <a href="<?php echo esc_attr(get_theme_mod('track_shipment_link', "#")); ?>">Track Package</a>
            <a href="<?php echo esc_attr(get_theme_mod('book_shipment_link', "#")); ?>">Book Shipment</a>
        </div>
    </div>
</div>
<div class="terminal-mobile-menu">
    <div class="t-hub-logo">
        <a href="<?php echo esc_url(home_url()); ?>">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
            if ($logo_image) {
                echo '<img src="' . esc_url($logo_image[0]) . '" alt="' . get_bloginfo('name') . '">';
            } else {
                echo '<img src="' . esc_url(TERMINAL_THEME_ASSETS_URI . 'img/logo-full.png') . '" alt="Terminal Africa Default">';
            }
            ?>
        </a>
    </div>
    <div class="t-hub-mobile-menu terminal-mobile-menu-content-trigger cursor-pointer">
        <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/menu-icon.svg') ?>" alt="" class="cursor-pointer">
    </div>
</div>
<div class="terminal-mobile-menu-content terminal-mobile-menu-content-safi ">
    <div class="t-hub-menu">
        <!-- silence is golden -->
    </div>
    <div class="t-hub-dedicated-safi">
        <nav class="d-flex">
            <a href="#">Get Quotes</a>
            <a href="<?php echo esc_attr(get_theme_mod('track_shipment_link', "#")); ?>">
                Track Package
            </a>
            <a href="<?php echo esc_attr(get_theme_mod('book_shipment_link', "#")); ?>">
                Book Shipment
            </a>
        </nav>
    </div>
</div>