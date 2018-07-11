<?php
/*
Template Name: Testimonials
*/
get_header(); ?>

<?php $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
<section class="hero" style="background-image: url(<?php echo $featured_image[0]; ?>)">
	<div class="row">
		<div class="medium-12 columns content text-center">
				<h2><b><?php the_title(); ?></b></h2>
				<?php foundationpress_breadcrumb(); ?>
		</div>
	</div>
</section>

<div class="main-wrap" role="main">
	<div class="row">
		<div class="medium-12 columns">

				<?php do_action( 'foundationpress_before_content' ); ?>
			 	<?php while ( have_posts() ) : the_post(); ?>
					
					
						<?php the_content(); ?>
						<?php
						$testimonials_args = array(
							'post_type'              => array( 'testimonial' ),
							'post_status'            => array( 'publish' ),
							'order'                  => 'ASC',
							'orderby'                => 'menu_order',
						);

						// The Query
						$testimonials_query = new WP_Query( $testimonials_args );
						if($testimonials_query->have_posts()) :
						?>
						<ul class="testimonials-list no-bullet row medium-up-2" data-equalizer data-equalize-on="medium">
						<?php while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post(); ?>
							<li class="column">
								<div class="box" data-equalizer-watch>
									<?php $rating = get_field('rating'); ?>
									<fieldset class="rating">
										<?php for($i=10; $i >= 1; $i--) {
											$result = $i / 2;
											$rating_result = $rating == $result ? 'checked' : '';
											if($i % 2 == 1) {
												echo '<input type="radio" id="star_'.get_the_ID().'_'.$result.'" name="rating_'.get_the_ID().'" value="'.$result.'" disabled '.$rating_result.' /><label class="half" for="star_'.get_the_ID().'_'.$result.'"></label>';
											} else {
												echo '<input type="radio" id="star_'.get_the_ID().'_'.$result.'" name="rating_'.get_the_ID().'" value="'.$result.'" disabled '.$rating_result.' /><label class="full" for="star_'.get_the_ID().'_'.$result.'"></label>';
											}
										}; ?>
									</fieldset>
									<p><?php echo $trimmed = wp_trim_words( get_the_content(), $num_words = 55, $more = '[...]' ); ?></p>
									<span><?php the_title(); ?></span>
								</div>
							</li>
						<?php endwhile; ?>
						</ul>
						<?php endif; wp_reset_postdata(); ?>
				<?php endwhile;?>
		</div>
	</div>
</div>



<?php /*

<div class="main-wrap full-width" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<footer>
			<?php
				wp_link_pages(
					array(
						'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
						'after'  => '</p></nav>',
					)
				);
			?>
			<p><?php the_tags(); ?></p>
		</footer>
		<?php do_action( 'foundationpress_page_before_comments' ); ?>
		<?php comments_template(); ?>
		<?php do_action( 'foundationpress_page_after_comments' ); ?>
	</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>
*/ ?>

<?php get_footer();
