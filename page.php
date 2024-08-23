<?php
get_header();
/**
 * Display the home page content
 * 
 */

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

?>

<div class="terminal-hub-ivato-home-hero">
    <div class="terminal-hub-ivato-home-hero--header">
        <div class="terminal-hub-ivato-home-hero--header--left">
            <h1>
                Fast and Reliable Shipping with SpeedGo Logistics
            </h1>
        </div>
        <div class="terminal-hub-ivato-home-hero--header--right">
            <p>
                We don't just deliver parcels, we deliver promises. From pick-up to destination, we're the wheels that keep your business rolling.
            </p>
            <a href="#">Book Shipment</a>
        </div>
    </div>
    <div class="terminal-hub-ivato-home-hero--body">
        <img src="<?php echo TERMINAL_THEME_ASSETS_URI ?>/img/service-2-img.png" alt="Image">
    </div>
</div>

<?php

get_footer();
