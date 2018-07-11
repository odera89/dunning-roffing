<?php get_header(); ?>

<?php
	$page_for_posts = get_option( 'page_for_posts' );
	$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_for_posts ), 'full' );
?>
<section class="hero" style="background-image: url(<?php echo $featured_image[0]; ?>)">
	<div class="row">
		<div class="medium-12 columns content text-center">
				<h2><b><?php echo get_the_title($page_for_posts); ?></b></h2>
				<?php foundationpress_breadcrumb(); ?>
		</div>
	</div>
</section>

<div class="main-wrap" role="main">
	<div class="row">
		<div class="medium-12 columns">
			<?php do_action( 'foundationpress_before_content' ); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
					<header>
						<h3 class="entry-title"><?php the_title(); ?></h3>
						<?php foundationpress_entry_meta(); ?>
					</header>
					<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php edit_post_link( __( 'Edit', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
					</div>
					<?php do_action( 'foundationpress_post_before_comments' ); ?>
					<?php comments_template(); ?>
					<?php do_action( 'foundationpress_post_after_comments' ); ?>
			</article>
		</div>
	</div>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php //get_sidebar(); ?>
</div>
<?php get_footer();
