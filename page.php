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
<div class="thub-maputo-ceo">
    <div class="thub-maputo-ceo--items">
        <?php
        for ($i = 0; $i < 3; $i++) {
        ?>
            <div class="thub-maputo-ceo--item">
                <div class="thub-maputo-ceo--item--header">
                    <div class="thub-maputo-ceo--item--header--image">
                        <img src="http://tplug.terminal.africa/wp-content/uploads/2024/05/photo-1522529599102-193c0d76b5b6.avif" alt="Maputo CEO">
                    </div>
                    <div class="thub-maputo-ceo--item--header--content">
                        <h3>
                            Blessing
                        </h3>
                        <p>
                            CEO Shippo
                        </p>
                    </div>
                </div>
                <div class="thub-maputo-ceo--item--content">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php

get_footer();
