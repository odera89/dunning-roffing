<?php $services = get_sub_field('service_list'); ?>
<?php if($services) : ?>
<section class="services-detailed">
	<div class="row expanded">
		<?php if($services) : ?>
			<div class="service-list">
			<?php foreach ($services as $key => $post) : ?>
			<?php setup_postdata($post); ?>
			<div class="service" data-equalizer data-equalize-on="medium">
				<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
					<div class="row">
						<figure style="background-image: url(<?php echo $image[0]; ?>);" data-equalizer-watch>
							<div class="table" data-equalizer-watch>
								<div class="cell">
									<?php the_field('list_text'); ?>
								</div>
							</div>
						</figure>
					</div>
				<?php endif; ?>
				<div class="info row">
					<div class="large-3 columns">
						<h3><?php the_title(); ?></h3>
					</div>
					<div class="large-9 columns">
						<?php the_field('content_text'); ?>
						<a href="<?php the_permalink(); ?>" class="button primary with-arrow">MORE INFO <i></i></a>
					</div>
				</div>
			</div>
			<div class="row expanded " data-equalizer data-equalize-on="medium">
				<div class="medium-6 columns content<?php echo $key % 2 ? ' medium-push-6' : ''; ?>" data-equalizer-watch>
					
					
					
				</div>
				<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
				<div class="medium-6 image columns<?php echo $key % 2 ? ' medium-pull-6' : ''; ?>" style="background-image: url(<?php echo $image[0]; ?>);" data-equalizer-watch></div>
				<?php endif; ?>
			</div>

			<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; wp_reset_query(); ?>