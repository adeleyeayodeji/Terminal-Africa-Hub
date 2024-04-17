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
?>
	<div id='post-<?php echo the_ID(); ?>' <?php echo post_class(); ?>>
	<?php
	//title
	the_title('<h1 class="entry-title text-center my-5">', '</h1>');

	the_post_thumbnail();

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

	// Display the tags
	the_tags('<p>Tags: ', ', ', '</p>');

	echo '</div>'; // Closes the div with the post class
endwhile; // End of the loop.

get_footer();
