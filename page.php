<?php
get_header();
/**
 * Display the home page content
 * 
 */
?>
<div class="terminal-thub-hero-2">
    <div class="terminal-thub-hero-2--content">
        <h1>
            Ship easily with SpeedGo
        </h1>
        <p>
            We know it's difficult for you to send items within the country and abroad but we fixed that. Sign up with us to start shipping easily and securely.
        </p>
        <div class="terminal-thub-hero-2--content--cta">
            <a href="#" class="terminal-thub-hero-2--content--cta--link-1">
                Book Shipment
            </a>
            <a href="#" class="terminal-thub-hero-2--content--cta--link-2">
                Get Quotes
            </a>
        </div>
    </div>
    <div class="terminal-thub-hero-2--image">
        <img src="<?php echo esc_url(TERMINAL_THEME_ASSETS_URI . 'img/shipment-hero-2.svg') ?>" alt="">
    </div>
</div>
<?php
get_footer();
exit;
/* Start the Loop */
while (have_posts()) :
    the_post();

    // Display the post content
    the_content();

    // If comments are open or there is at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) {
        comments_template();
    }
endwhile; // End of the loop.


get_footer();
