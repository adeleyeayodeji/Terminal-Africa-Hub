<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="margin: 0px;padding: 0px;">
    <?php wp_body_open(); ?>
    <!-- terminal-africa-theme-bs -->
    <div class="terminal-africa-theme-bs">
        <!-- container-fluid -->
        <div class="container-fluid p-0 m-0">
            <?php
            //get theme settings header_type
            $header_type = get_theme_mod('header_type', '1');
            switch ($header_type) {
                case 'safi':
                    $path = 'templates/parts/safi/header';
                    $header_type = "";
                    break;
                case 'maputo':
                    $path = 'templates/parts/maputo/header';
                    $header_type = "";
                    break;
                default:
                    $path = 'templates/parts/header';
                    break;
            }
            /**
             * Select header type
             * @hooked header 1 - 2
             */
            get_template_part($path, $header_type);
            ?>