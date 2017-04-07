<?php
/**
 * Template Name: Contact Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package inspiralia
 */
get_header();
get_template_part('index','banner'); ?>

<main class="contact_content">
  <?php
  while ( have_posts() ) : the_post(); ?>
    <section class="description">
      <div class="content">
				<div class="row">
        	<?php the_content(); ?>
				</div>
      </div>
    </section>
  <?php
  endwhile; // End of the loop.
  ?>
</main>

<div id="map"></div>
<script>
    function initMap() {
        var madrid = { lat:40.4167754, lng:-3.7037902 };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: madrid
        });
        var marker = new google.maps.Marker({
            position: madrid,
            map: map
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-XiMalZlO4Pve6ch9wgxkHEx3o0nY8KI&callback=initMap"></script>
<?php
get_footer();
