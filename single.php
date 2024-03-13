<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Terminal Africa Hub
 * @since 1.0.0
 * @version 1.0.0
 * 
 * 
 */

get_header();

/* Start the Loop */
while (have_posts()) :
	the_post();
	echo "<div id='post-" . the_ID() . "' " . post_class() . ">";

	the_content();

	wp_link_pages(
		array(
			'before'      => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'terminal-africa-hub') . '">',
			'after'       => '</nav>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		)
	);

	// If comments are open or there is at least one comment, load up the comment template.
	if (comments_open() || get_comments_number()) {
		comments_template();
	}

	echo '</div>'; // Closes the div with the post class
endwhile; // End of the loop.

get_footer();
