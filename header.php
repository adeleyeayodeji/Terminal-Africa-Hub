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
            /**
             * Select header type
             * @hooked header 1 - 2
             */
            get_template_part('templates/parts/header', '2');
            ?>