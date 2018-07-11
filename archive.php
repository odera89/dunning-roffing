<?php get_header(); ?>

<?php
	$page_for_posts = get_option( 'page_for_posts' );
	$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_for_posts ), 'full' );
?>
<section class="hero" style="background-image: url(<?php echo $featured_image[0]; ?>)">
	<div class="row">
		<div class="medium-12 columns content text-center">
				<h2><b><?php echo get_the_title($page_for_posts); ?></b></h2>
				<?php foundationpress_breadcrumb(); ?>
		</div>
	</div>
</section>

<div class="main-wrap" role="main">
	<article class="main-content">
		<div class="row">
			<div class="medium-12 columns">
				<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				<?php endwhile; ?>

				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; // End have_posts() check. ?>

				<?php /* Display navigation to next/previous pages when applicable */ ?>
				<?php
				if ( function_exists( 'foundationpress_pagination' ) ) :
					foundationpress_pagination();
				elseif ( is_paged() ) :
				?>
					<nav id="post-nav">
						<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
						<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
					</nav>
				<?php endif; ?>
			</div>
		</div>
	</article>

</div>

<?php get_footer();
