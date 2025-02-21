<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
?>
<div class="thub-maputo-footer">
    <div class="thub-maputo-footer--header">
        <div class="thub-maputo-footer--header--content">
            <h2>
                Sign up today
            </h2>
        </div>
        <div class="thub-maputo-footer--header--cta">
            <a href="#">
                Book Shipment
            </a>
            <a href="#">
                Create an account
            </a>
        </div>
    </div>
    <div class="thub-maputo-footer--footer">
        <?php
        //get maputo footer menu
        wp_nav_menu(array(
            'theme_location' => 'footer',
            'container' => '',
            'menu_class' => 'thub-maputo-footer--footer--menu',
            'menu' => 'maputo-footer'
        ));
        ?>
    </div>
</div>