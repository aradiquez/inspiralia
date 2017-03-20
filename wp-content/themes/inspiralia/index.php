<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package inspiralia
 */

get_header();
get_template_part('index','banner');
 ?>
<main id="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
      			<?php
        			if( have_posts() ) :
        			while( have_posts() ): the_post();
        			 get_template_part('content','');
        			endwhile; endif;

              get_template_part('content','');
      			?>
          <div class="col-lg-12 col-sm-12 col-md-12 text-center">
      			<?php
        			//Previous / next page navigation
        			the_posts_pagination( array(
        			'prev_text'          => __( '<i class="fa fa-long-arrow-left"></i>', 'inspiralia' ),
        			'next_text'          => __( '<i class="fa fa-long-arrow-right"></i>', 'inspiralia' ),
        			));
      			?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php
get_footer();
?>
