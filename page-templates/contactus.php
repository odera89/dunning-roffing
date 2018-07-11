<?php
/*
Template Name: Contact Us
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
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="medium-6 columns form">
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
		<?php endwhile;?>
		<div class="medium-6 columns">
			<div class="info">
				<?php the_field('contact_info'); ?>
			</div>
		</div>
	</div>
</div>

<?php $contact_map = get_field('google_map'); ?>
<?php if($contact_map) : ?>
<div id="map">
	<div class="marker" data-lat="<?php echo $contact_map['lat']; ?>" data-lng="<?php echo $contact_map['lng']; ?>"></div>
</div>
<?php endif; ?>
<?php get_footer();
