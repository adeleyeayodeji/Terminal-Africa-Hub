<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

?>
<div class="notice notice-error">
    <p style="font-weight: bold;"><?php _e('Terminal Africa Hub requires WordPress Importer to be installed and activated.'); ?></p>
    <p>
        WordPress Network Admin is required to install WordPress Importer on a multisite network. Please contact your network administrator to install WordPress Importer.
    </p>
</div>