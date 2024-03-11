<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

?>
<div class="notice notice-success">
    <p> Would you like to import the demo content for <strong>Terminal Africa Hub</strong>?</p>
    <p>
        <a href="javascript:;" class="terminal-import-demo"><?php _e('Import Demo', 'terminal-africa-hub'); ?></a>
    </p>
    <p class="description"><?php _e('Note: This will import the demo content and replace your current content. Please ensure you have a backup of your current content before proceeding.', 'terminal-africa-hub'); ?></p>
</div>