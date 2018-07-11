<section class="text_image <?php echo get_sub_field('image_alignment'); ?>">
	<div class="row<?php echo get_sub_field('is_full') ? ' expanded' : ''; ?>">
		<div class="medium-6 columns<?php echo get_sub_field('image_alignment') == 'right' ? ' medium-push-6' : ''; ?>">
			<figure>
				<img src="<?php the_sub_field('image'); ?>" alt="img" />
			</figure>
		</div>
		<div class="medium-6 columns content<?php echo get_sub_field('image_alignment') == 'right' ? ' medium-pull-6' : ''; ?>">
			<?php the_sub_field('content'); ?>
		</div>
	</div>
</section>