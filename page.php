<?php
get_header();
/**
 * Display the home page content
 * 
 */

?>

<div class="terminal-faqs">
    <div class="terminal-faq-item">
        <div class="terminal-faq-header">
            <h3>
                Question 1
            </h3>
            <img src="<?php echo TERMINAL_THEME_ASSETS_URI . '/img/accordion-open.svg' ?>" alt="">
        </div>
        <div class="terminal-faq-body">
            <p>
                Lorem ipsum dolor sit amet consectetur. Eu pulvinar laoreet aliquet maecenas nulla orci eu amet non. Quis malesuada amet nec non sed diam auctor. Massa in suspendisse malesuada faucibus proin sit ultricies. Velit sit diam quis rhoncus risus congue.
            </p>
        </div>
    </div>
    <div class="terminal-faq-item">
        <div class="terminal-faq-header">
            <h3>
                Question 2
            </h3>
            <img src="<?php echo TERMINAL_THEME_ASSETS_URI . '/img/accordion-open.svg' ?>" alt="">
        </div>
        <div class="terminal-faq-body">
            <p>
                Lorem ipsum dolor sit amet consectetur. Eu pulvinar laoreet aliquet maecenas nulla orci eu amet non. Quis malesuada amet nec non sed diam auctor. Massa in suspendisse malesuada faucibus proin sit ultricies. Velit sit diam quis rhoncus risus congue.
            </p>
        </div>
    </div>

    <div class="terminal-faq-footer-note">
        <a href="#">
            Can't find the answer you're looking for? Please chat to our friendly team.
        </a>
    </div>
</div>

<?php
get_footer();
die;
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
