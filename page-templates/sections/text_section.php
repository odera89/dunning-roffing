<?php $text_bg_image = get_sub_field('background_image') ? 'style="background-image: url('.get_sub_field('background_image').');"' : ''; ?>
<section class="text_section text-center<?php echo get_sub_field('background_image') ? ' with-bg' : ''; ?>" <?php echo $text_bg_image; ?>>
	<div class="row">
		<div class="medium-12 columns content">
			<?php the_sub_field('content'); ?>
		</div>
	</div>
</section>