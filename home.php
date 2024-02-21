<?php
get_header();
?>

<div class="container-fluid p-0 m-0">
    <div class="terminal-header">
        <div class="t-hub-logo">
            <img src="http://localhost:8888/wordpress/wp-content/plugins/terminal-africa/assets/img/logo-full.png" alt="">
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
        <div class="t-hub-dedicated">
            <div class="d-flex">
                <a href="#">Book Shipment</a>
                <a href="#">Track Shipment</a>
            </div>
        </div>
    </div>
    <div class="terminal-hero-section" style="background-image: url('<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/bg.jpeg') ?>');">
        <div class="hero-content">
            <h1>Hero section</h1>
            <p>Lorem ipsum dolor sit amet consectetur. Vestibulum elementum quis ornare turpis. <br />Ac adipiscing ac velit tristique turpis sodales sagittis.</p>
            <div class="d-flex">
                <a href="#">Book Shipment</a>
                <a href="#">Track Shipment</a>
            </div>
        </div>
    </div>
    <div class="terminal-partners">
        <div class="d-flex justify-content-between align-items-center">
            <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/dhl.svg') ?>" alt="DHL">
            <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/ups.svg') ?>" alt="UPS">
            <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/Fedex.svg') ?>" alt="Fedex">
            <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/Aramex.svg') ?>" alt="Aramex">
        </div>
    </div>
    <div class="terminal-service">
        <div class="row m-0 justify-content-center">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>
                    Check out our services
                </h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur. Ipsum pharetra sapien sagittis quisque.
                </p>
                <div>
                    <a href="#">View all services</a>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 text-center">
                <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/image-1.svg') ?>" alt="">
            </div>
        </div>
    </div>
    <div class="terminal-review">
        <h2>Customer Review</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Egestas consectetur ut pretium egestas aliquam libero, duis est sed. Velit varius sit a elit et quis lectus enim, justo
        </p>
        <p class="terminal-review-profile">
            Jane Foster
        </p>
        <div class="d-flex">
            <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/star-filled.svg') ?>" alt="">
            <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/star-filled.svg') ?>" alt="">
            <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/star-filled.svg') ?>" alt="">
            <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/star.svg') ?>" alt="">
            <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/star.svg') ?>" alt="">
        </div>
    </div>
    <div class="terminal-in-touch">
        <div class="row m-0 justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h2>
                    Get in touch
                </h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur. Ipsum pharetra sapien sagittis quisque.
                </p>
                <div>
                    <a href="#">Contact us</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>