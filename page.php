<?php get_header(); ?>


<?php
  if( have_rows('sections') ) {
    while ( have_rows('sections') ) : the_row();
      include (TEMPLATEPATH . '/page-templates/sections/'.get_row_layout().'.php');
    endwhile;
  }
?>

<?php get_footer();