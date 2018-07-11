<?php if(have_rows('service_list')) : ?>
<section class="services">
	<ul class="row expanded large-up-5 medium-up-3 no-bullet" data-equalizer data-equalize-on="medium">
		<?php while ( have_rows('service_list') ) : the_row(); ?>
		<li class="columns">
			<div class="item" data-equalizer-watch>
				<figure>
					<img src="<?php the_sub_field('icon'); ?>" class="svg" alt="icon" />
				</figure>
				<h3><?php the_sub_field('title'); ?></h3>
				<?php the_sub_field('content'); ?>
				<a href="<?php the_sub_field('link_to'); ?>">MORE INFO</a>
			</div>
		</li>
		<?php endwhile; ?>
	</ul>
	<?php if(is_front_page()) : ?>
	<hr class="large" />
	<?php endif; ?>
</section>
<?php endif; ?>