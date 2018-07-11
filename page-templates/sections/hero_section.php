<?php $is_testimonial = get_sub_field('is_testimonials'); ?>
<section class="hero<?php echo $is_testimonial ? ' is_testimonial' : ''; ?>" style="background-image: url(<?php the_sub_field('background_image'); ?>">
	<div class="row">
		<div class="columns content<?php echo $is_testimonial ? ' medium-6 medium-text-left text-center' : ' medium-12 text-center'; ?>">
			<?php if(is_singular('service')) : ?>
				<h2><b><?php the_title(); ?></b></h2>
				<?php if(get_sub_field('is_breadcrumb'))  { foundationpress_breadcrumb(); } ?>
				<?php the_sub_field('content'); ?>
			<?php else : ?>
				<?php the_sub_field('content'); ?>
				<?php if(get_sub_field('is_breadcrumb'))  { foundationpress_breadcrumb(); } ?>
			<?php endif; ?>
		</div>
		<?php if($is_testimonial) : ?>
			<?php
				$testimonial_args = array(
					'post_type' => 'testimonial',
					'post_per_page' => -1,
					'post_status' =>'publish'
				);

				$testimonials_query = new WP_Query($testimonial_args);				
			?>
			<?php if($testimonials_query->have_posts()) : ?>
			<div class="columns medium-6 hero-testimonials medium-text-right">
				<div class="box">
					<h4><span>CLIENT</span> TESTIMONIALS</h4>
					<hr />
					<div class="arrows"></div>
					<div class="hero-testimonials-slider">
						<?php while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post(); ?>
						<div class="testimonial">
							<blockquote>
								<?php $rating = get_field('rating'); ?>
								<fieldset class="rating">
									<?php for($i=10; $i >= 1; $i--) {
										$result = $i / 2;
										$rating_result = $rating == $result ? 'checked' : '';
										if($i % 2 == 1) {
											echo '<input type="radio" id="hero-star_'.get_the_ID().'_'.$result.'" name="hero-rating_'.get_the_ID().'" value="'.$result.'" disabled '.$rating_result.' /><label class="half" for="hero-star_'.get_the_ID().'_'.$result.'"></label>';
										} else {
											echo '<input type="radio" id="hero-star_'.get_the_ID().'_'.$result.'" name="hero-rating_'.get_the_ID().'" value="'.$result.'" disabled '.$rating_result.' /><label class="full" for="hero-star_'.get_the_ID().'_'.$result.'"></label>';
										}
									}; ?>
								</fieldset>
								<div class="clearfix"></div>
								<em><?php echo wp_trim_words( get_the_content(), $num_words = 35, $more = '...' ); ?></em>
								<cite><?php the_title(); ?></cite>		
							</blockquote>
						</div>
					<?php endwhile; ?>
					</div>

					<a href="/testimonials" class="button hollow white">VIEW ALL TESTIMONIALS</a>
				</div>
			</div>
			<?php endif; ?>
		<?php endif; wp_reset_query(); 	?>
	</div>
</section>

