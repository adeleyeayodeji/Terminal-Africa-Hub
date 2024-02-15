<?php
get_header();
?>

<div class="container-fluid">
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
</div>

<?php
get_footer();
?>