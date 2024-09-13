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
<div class="terminal-hub-ivato-services-list">
    <div class="terminal-hub-ivato-services-list--items">
        <?php
        for ($i = 0; $i < 10; $i++) :
        ?>
            <div class="terminal-hub-ivato-services-list--items--item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/44f580b0f42bb6ce447cb6973453537f.png" alt="Ivato Services">
                <h3>Services</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </p>
            </div>
        <?php
        endfor;
        ?>
    </div>
</div>
<?php
get_footer();
