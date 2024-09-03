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
<div class="terminal-hub-ivato-services">
    <div class="terminal-hub-ivato-services--header">
        <h2>
            Our Services
        </h2>
        <p>
            We don’t just deliver parcels, we deliver promises. From pick-up to destination, we’re the wheels that keep your business rolling.
        </p>
    </div>
    <div class="terminal-hub-ivato-services--body">
        <div class="terminal-hub-ivato-services--body--top">
            <img src="<?php echo TERMINAL_THEME_ASSETS_URI ?>/img/44f580b0f42bb6ce447cb6973453537f.png" alt="">
            <img src="<?php echo TERMINAL_THEME_ASSETS_URI ?>/img/44f580b0f42bb6ce447cb6973453537f.png" alt="">
            <img src="<?php echo TERMINAL_THEME_ASSETS_URI ?>/img/44f580b0f42bb6ce447cb6973453537f.png" alt="">
        </div>
        <div class="terminal-hub-ivato-services--body--bottom">
            <div class="terminal-hub-ivato-services--body--bottom--images">
                <img src="<?php echo TERMINAL_THEME_ASSETS_URI ?>/img/44f580b0f42bb6ce447cb6973453537f.png" alt="">
                <img src="<?php echo TERMINAL_THEME_ASSETS_URI ?>/img/44f580b0f42bb6ce447cb6973453537f.png" alt="">
                <img src="<?php echo TERMINAL_THEME_ASSETS_URI ?>/img/44f580b0f42bb6ce447cb6973453537f.png" alt="">
            </div>
            <div class="terminal-hub-ivato-services--body--bottom--cta">
                <a href="#">
                    <span>
                        Explore all services
                    </span>
                    <img src="<?php echo TERMINAL_THEME_ASSETS_URI ?>/img/chevron-right.svg" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
<?php

get_footer();
