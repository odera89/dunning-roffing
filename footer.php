<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
	<?php $logos = get_field('footer_logos', 'option'); ?>
	<?php if($logos) : ?>
	<div class="logos">
		<div class="row">
			<div class="medium-12 columns text-center">
				<div class="logos-list">
					<?php foreach ($logos as $key => $logo) {
						echo '<a href="'.$logo['logo_link'].'" target="_blank"><img src="'.$logo['logo_image'].'" alt="logo" /></a>';
					} ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<div class="footer-container" data-sticky-footer>
		<div class="before-footer text-center">
			<div class="row">
				<?php dynamic_sidebar( 'before-footer-widgets' ); ?>
			</div>
		</div>
		<footer class="footer">
			<?php do_action( 'foundationpress_before_footer' ); ?>
			<?php dynamic_sidebar( 'footer-widgets' ); ?>
			<?php do_action( 'foundationpress_after_footer' ); ?>
		</footer>
	</div>

	<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		</div><!-- Close off-canvas content -->
	</div><!-- Close off-canvas wrapper -->
<?php endif; ?>

<div class="reveal" id="getAnEstimate" data-animation-in="slide-in-right" data-animation-out="slide-out-right" data-reveal>
	<button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="content">
		<?php the_field('get_free_estimate_modal_content', 'option'); ?>
	</div>
</div>

<script>
var templateDir = "<?php echo get_template_directory_uri(); ?>";
</script>

<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>

<?php the_field('footer_scripts', 'option'); ?>

<script type="text/javascript">
	WebFontConfig = {
	  google: { families: [ 'Rubik:300,400,500,700', 'Lato:300,400,700,900', 'Oswald:400,500,600,700' ] }
	};
	(function() {
	  var wf = document.createElement('script');
	  wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
	    '://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
	  wf.type = 'text/javascript';
	  wf.async = 'true';
	  var s = document.getElementsByTagName('script')[0];
	  s.parentNode.insertBefore(wf, s);
	})();
</script>

</body>
</html>
