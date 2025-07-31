<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
?>
<div class="thub-safi-footer">
    <div class="row m-0">
        <div class="col-lg-3 col-md-3 col-sm-6 mb-5">
            <a href="<?php echo esc_url(home_url()); ?>" class="thub-safi-footer-logo">
                <?php
                //fetch footer_logo
                $footer_img_link = get_theme_mod('footer_logo', 'http://tplug.terminal.africa/wp-content/uploads/2025/02/logo-full.png');
                //display footer_logo
                echo '<img src="' . esc_url($footer_img_link) . '" alt="' . get_bloginfo('name') . '">';
                ?>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 mb-5 thub-safi-footer-parent-link">
            <a href="#">Track Package</a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 mb-5 thub-safi-footer-parent-link">
            <a href="#">Get Quotes</a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 mb-5 thub-safi-footer-parent-link d-none d-lg-block d-md-block">
            <!-- silence is golden -->
        </div>
    </div>
    <div class="row m-0 thub-safi-footer-address">
        <div class="col-lg-3 col-md-3 col-sm-6 mb-5">
            <p>Address</p>
            <p>
                <?php echo wp_kses(get_theme_mod('company_address', '123, Company Street, Company City, Company Country'), array('p', 'br')); ?>
            </p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 mb-5">
            <p>Email</p>
            <a href="mailto:<?php echo esc_attr(get_theme_mod('company_email', 'info@company.com')) . '" target="_blank'; ?>"><?php echo esc_html(get_theme_mod('company_email', 'info@company.com')); ?></a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 mb-5">
            <p>Phone</p>
            <a href="tel:<?php echo esc_attr(get_theme_mod('company_phone', '+234012345678')); ?>"><?php echo esc_html(get_theme_mod('company_phone', '+234012345678')); ?></a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 mb-5">
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
    </div>
    <div class="row m-0">
        <div class="col-12">
            <div class="d-flex justify-content-between thub-safi-footer-copyright">
                <div>
                    <span>
                        © <?php echo date('Y') . ' ' . get_bloginfo('name') ?>. All rights reserved.
                    </span>
                </div>
                <div>
                    <a href="#" class="thub-safi-footer-back-to-top">
                        <svg width="40" height="40" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M32 58.6668C46.7276 58.6668 58.6667 46.7278 58.6667 32.0002C58.6667 17.2726 46.7276 5.3335 32 5.3335C17.2724 5.3335 5.33337 17.2726 5.33337 32.0002C5.33337 46.7278 17.2724 58.6668 32 58.6668Z" fill="white" />
                            <path d="M41.4134 29.2533L33.4134 21.2533C32.64 20.48 31.36 20.48 30.5867 21.2533L22.5867 29.2533C21.8134 30.0267 21.8134 31.3067 22.5867 32.08C23.36 32.8533 24.64 32.8533 25.4134 32.08L30 27.4933V41.3333C30 42.4267 30.9067 43.3333 32 43.3333C33.0934 43.3333 34 42.4267 34 41.3333V27.4933L38.5867 32.08C38.9867 32.48 39.4934 32.6667 40 32.6667C40.5067 32.6667 41.0134 32.48 41.4134 32.08C42.1867 31.3067 42.1867 30.0267 41.4134 29.2533Z" fill="white" />
                        </svg>

                    </a>
                </div>
            </div>
        </div>
    </div>
</div>