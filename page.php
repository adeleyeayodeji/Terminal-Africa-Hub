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
<div class="terminal-hub-ivato-offer">
    <div class="terminal-hub-ivato-offer--header">
        <h2>
            We offer <span>cargo services</span>
        </h2>
        <p>
            We deliver tailored solutions designed to meet the specific needs of each of our customers. Regardless of your cargo type, or final destination, we offer versatile solutions that cover air, land, and sea.
        </p>
        <a href="#">
            <span>
                Book Cargo Shipment
            </span>
        </a>
    </div>
    <div class="terminal-hub-ivato-offer--body">
        <div class="terminal-hub-ivato-offer--body--left">
            <ol>
                <li>
                    <span>
                        1
                    </span>
                    <span>
                        Choose pickup hub/airport
                    </span>
                </li>
                <li>
                    <span>
                        2
                    </span>
                    <span>
                        Choose destination airport
                    </span>
                </li>
                <li>
                    <span>
                        3
                    </span>
                    <span>
                        Add your parcel items
                    </span>
                </li>
                <li>
                    <span>
                        4
                    </span>
                    <span>
                        We send you an invoice
                    </span>
                </li>
            </ol>
        </div>
        <div class="terminal-hub-ivato-offer--body--right">
            <img src="<?php echo TERMINAL_THEME_ASSETS_URI . '/img/44f580b0f42bb6ce447cb6973453537f.png'; ?>" alt="Terminal Africa Hub">
        </div>
    </div>
</div>
<?php

get_footer();
