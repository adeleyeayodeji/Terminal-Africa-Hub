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
</div>

<?php
get_footer();
?>