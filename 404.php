<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Terminal Africa Hub
 */

get_header();
?>

<div class="container py-5">
    <div class="row justify-content-center py-5">
        <div class="col-md-12 text-center py-5">
            <span class="display-1 d-block">404</span>
            <div class="mb-4 lead">The page you are looking for was not found.</div>
            <a href="<?php echo esc_url(home_url()); ?>" class="btn btn-link">Back to Home</a>
        </div>
    </div>
</div>

<?php
get_footer();
