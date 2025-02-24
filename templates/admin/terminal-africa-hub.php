<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
?>
<style>
    .notice-success {
        display: none;
    }
</style>
<?php
//demo data list
$demo_data = [
    (object)[
        "name" => "Safi",
        "image" => TERMINAL_THEME_ASSETS_URI . 'img/themes/safi.png',
        "id" => "terminal-safi-demo",
        "preview_link" => "https://safi.terminal.africa/"
    ],
    (object)[
        "name" => "JOMO",
        "image" => TERMINAL_THEME_ASSETS_URI . 'img/demo-img-1.png',
        "id" => "terminal-jomo-demo",
        "preview_link" => "https://jomo.terminal.africa/"
    ],
    (object)[
        "name" => "Maputo",
        "image" => TERMINAL_THEME_ASSETS_URI . 'img/themes/maputo.png',
        "id" => "terminal-maputo-demo",
        "preview_link" => "https://maputo.terminal.africa/"
    ],
    (object)[
        "name" => "Ivato",
        "image" => TERMINAL_THEME_ASSETS_URI . 'img/themes/ivato.png',
        "id" => "terminal-ivato-demo",
        "preview_link" => "https://ivato.terminal.africa/"
    ],
];
?>
<div class="terminal-africa-hub-container">
    <div class="terminal-africa-hub-header">
        <h1>Terminal Africa Hub</h1>
        <p>
            Select an option from the list below to import demo content to your site.
        </p>
    </div>
    <div class="terminal-africa-hub-content">
        <?php
        foreach ($demo_data as $data) :
        ?>
            <div class="terminal-africa-hub-content-item">
                <h2>
                    <?php echo esc_html($data->name); ?>
                </h2>
                <img src="<?php echo esc_url($data->image); ?>" alt="<?php echo esc_attr($data->name); ?>">
                <div class="terminal-africa-hub-demo-cta">
                    <?php
                    //check if the demo content is already imported
                    if (get_option("terminal_hub_active_demo") == $data->id) :
                    ?>
                        <button class="button button-primary" disabled>Imported</button>
                    <?php else : ?>
                        <button class="button button-primary import-demo-content" data-title="<?php echo esc_attr($data->name); ?>" data-id="<?php echo esc_attr($data->id); ?>">Import</button>
                    <?php endif; ?>
                    <a href="<?php echo esc_url($data->preview_link); ?>" target="_blank" class="button">Preview</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>