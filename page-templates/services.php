<?php
/*
Template Name: Services
*/
get_header(); ?>

<div class="main-wrap row" role="main">
<div class="medium-12 columns">
	<div class="box">
		<div class="row expanded">
			<?php get_template_part( 'template-parts/featured-image' ); ?>

			<?php do_action( 'foundationpress_before_content' ); ?>
		 	<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class('main-content medium-12 columns') ?> id="post-<?php the_ID(); ?>">
				<header>
					<h2 class="entry-title"><?php the_title(); ?></h2>
				</header>
				<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
				<div class="entry-content">
					<?php the_content(); ?>
					<?php edit_post_link( __( 'Edit', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
				</div>
			</article>
			<?php endwhile;?>
			<?php do_action( 'foundationpress_after_content' ); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer();
