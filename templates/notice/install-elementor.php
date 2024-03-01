<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
?>

<div class="notice notice-error">
    <p><?php _e('Terminal Africa Hub requires Elementor to be installed and activated.', 'terminal-africa-hub'); ?></p>
    <p>
        <a href="<?php echo esc_url(wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor')); ?>" class="terminal-elementor-install"><?php _e('Install Elementor', 'terminal-africa-hub'); ?></a>
    </p>
</div>