<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

?>
<div class="notice notice-success">
    <p> Terminal Africa Hub requires WordPress Importer to be installed and activated.</p>
    <p>
        <?php
        //get available plugins
        $plugins = get_plugins();
        //check if plugin is installed and not activated
        if (isset($plugins['wordpress-importer/wordpress-importer.php']) && !is_plugin_active('wordpress-importer/wordpress-importer.php')) {
            //activate plugin
        ?>
            <a href="<?php echo esc_url(wp_nonce_url(self_admin_url('plugins.php?action=activate&plugin=wordpress-importer/wordpress-importer.php'), 'activate-plugin_wordpress-importer/wordpress-importer.php')); ?>" class="terminal-importer-activate"><?php _e('Activate WordPress Importer', TERMINAL_THEME_TEXT_DOMAIN); ?></a>
        <?php
        } else if (!isset($plugins['wordpress-importer/wordpress-importer.php'])) {
            //install plugin
        ?>
            <a href="<?php echo esc_url(wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=wordpress-importer'), 'install-plugin_wordpress-importer')); ?>" class="terminal-importer-install"><?php _e('Install WordPress Importer', TERMINAL_THEME_TEXT_DOMAIN); ?></a>
        <?php
        }
        ?>
    </p>
</div>