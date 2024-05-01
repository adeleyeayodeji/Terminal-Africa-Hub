<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
?>
<div class="row m-0">
    <div class="col-lg-3 col-md-3 col-sm-6 mb-5">
        <div class="terminal-footer-1">
            <a href="<?php echo esc_url(home_url()); ?>">
                <?php
                //fetch footer_logo
                $footer_img_link = get_theme_mod('footer_logo', TERMINAL_THEME_ASSETS_URI . 'img/logo-full.png');
                //display footer_logo
                echo '<img src="' . esc_url($footer_img_link) . '" alt="' . get_bloginfo('name') . '">';
                ?>
            </a>
            <p>
                <?php echo esc_html(get_theme_mod('company_address', '123, Company Street, Company City, Company Country')); ?>
            </p>
            <nav>
                <a href="mailto:<?php echo esc_attr(get_theme_mod('company_email', 'info@company.com')) . '" target="_blank'; ?>"><?php echo esc_html(get_theme_mod('company_email', 'info@company.com')); ?></a>
                <a href="tel:<?php echo esc_attr(get_theme_mod('company_phone', '+234012345678')); ?>"><?php echo esc_html(get_theme_mod('company_phone', '+234012345678')); ?></a>
            </nav>
        </div>
        <div class="terminal-footer-1-social">
            <nav>
                <a href="<?php echo esc_url(get_theme_mod('facebook_link')); ?>" target="_blank">
                    <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/facebook.svg') ?>" alt="">
                </a>
                <a href="<?php echo esc_url(get_theme_mod('twitter_link')); ?>" target="_blank">
                    <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/x.svg') ?>" alt="">
                </a>
                <a href="<?php echo esc_url(get_theme_mod('instagram_link')); ?>" target="_blank">
                    <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/instagram.svg') ?>" alt="">
                </a>
            </nav>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 mb-5">
        <h4>Product</h4>
        <?php
        //get wp menu 'product'
        wp_nav_menu(
            array(
                'theme_location' => 'footer',
                'container' => '',
                'menu_class' => 't-hub-menu-ul',
                'menu' => 'products'
            )
        );
        ?>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 mb-5">
        <h4>Company</h4>
        <?php
        //get wp menu 'product'
        wp_nav_menu(
            array(
                'theme_location' => 'footer',
                'container' => '',
                'menu_class' => 't-hub-menu-ul',
                'menu' => 'company'
            )
        );
        ?>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 mb-5">
        <h4>Legal</h4>
        <?php
        //get wp menu 'product'
        wp_nav_menu(
            array(
                'theme_location' => 'footer',
                'container' => '',
                'menu_class' => 't-hub-menu-ul',
                'menu' => 'legal'
            )
        );
        ?>
    </div>
</div>