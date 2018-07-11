<?php
/**
 * Entry meta information for posts
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_entry_meta' ) ) :
	function foundationpress_entry_meta() {
		/* translators: %1$s: current date, %2$s: current time */
		echo '<time class="updated" datetime="' . get_the_time( 'c' ) . '">' . sprintf( __( '<b>%1$s</b>', 'foundationpress' ), get_the_date(), get_the_time() ) . '</time>';
		// echo '<span class="byline author">' . __( '<b>by</b>', 'foundationpress' ) . ' <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" rel="author" class="fn">' . get_the_author() . '</a></span>';
		echo '<span class="byline author">' . __( '<b>by</b>', 'foundationpress' ) . ' '.get_the_author();
	}
endif;
