<?php $galleries = get_sub_field('images'); ?>
<?php if($galleries) : ?>
<section class="gallery">
	<ul class="row expanded large-up-4 medium-up-2 no-bullet">
		<?php foreach ($galleries as $key => $gallery) : ?>
			<li class="columns">
				<figure style="background-image: url(<?php echo $gallery['url']; ?>);"></figure>
			</li>
		<?php endforeach; ?>
	</ul>
</section>
<?php endif; ?>