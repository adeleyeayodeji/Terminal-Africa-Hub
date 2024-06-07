<?php

/**
 * Check for security
 * 
 */
if (!defined('ABSPATH')) {
    exit("You are not allowed to access this file");
}

/**
 * TerminalHubFormatFAQ
 * @param string $content
 * 
 * @return string
 */
if (!function_exists('terminal_hub_format_html')) {
    function terminal_hub_format_faq($content)
    {
        return TerminalTheme::format_faq_html($content);
    }
}
