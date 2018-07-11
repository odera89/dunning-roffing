<div id="post-<?php the_ID(); ?>" <?php post_class('blogpost-entry'); ?>>
	<?php if (has_post_thumbnail( $post->ID ) ): ?>
	  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-medium' ); ?>
	  <figure>
			<img src="<?php echo $image[0]; ?>" alt="featured_image">
	  </figure>
	<?php endif; ?>
	<div class="entry-content">
		<header>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php foundationpress_entry_meta(); ?>
		</header>
		<p><?php echo wp_trim_words( get_the_content(), $num_words = 55, $more = null ); ?></p>
		<a href="<?php the_permalink(); ?>" class="button primary with-arrow">MORE INFO <i></i></a>
	</div>
</div>
