<?php 
	$testimonials = get_sub_field('testimonial_list');
	$testimonial_bg_image = get_sub_field('background_image') ? 'style="background-image: url('.get_sub_field('background_image').');"' : '';
?>
<section class="testimonials" <?php echo $testimonial_bg_image ;?>>
	<?php if($testimonials) : ?>
	<div class="row no-bullet testimonial-list" data-equalizer data-equalize-on="medium">
		<?php foreach( $testimonials as $post): ?>
			<?php setup_postdata($post); ?>
		<div class="testimonial medium-12 columns" data-equalizer-watch>
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
			<blockquote>
				<p><em><?php echo wp_trim_words(get_the_content(), $num_words = 30, $more = null); ?></em></p>
				<cite><?php the_title(); ?></cite>
			</blockquote>
		</div>
		<?php endforeach; wp_reset_postdata(); ?>
	</div>
	<?php endif; ?>
</section>
