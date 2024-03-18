<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
?>

<div class="notice notice-error">
    <p style="font-weight: bold;"><?php _e('Terminal Africa Hub requires Elementor to be installed and activated.', 'terminal-africa-hub'); ?></p>
    <p>
        WordPress Network Admin is required to install Elementor on a multisite network. Please contact your network administrator to install Elementor.
    </p>
</div>