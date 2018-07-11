<?php $locations = get_sub_field('locations'); ?>

<?php if($locations) : ?>
<section class="google_map">
	<div id="map">
		<?php foreach ($locations as $key => $location) : ?>
    	<div class="marker" data-lat="<?php echo $location['map']['lat']; ?>" data-lng="<?php echo $location['map']['lng']; ?>"></div>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>