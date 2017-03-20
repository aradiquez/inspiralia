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
    <div class="row">
      <section class="description">
        <div class="content">
          <?php the_content(); ?>
        </div>
        <aside class="col-lg-2 col-md-2 col-sm-12">
          <a href="<?php echo get_permalink(get_ID_by_page_name('Careers')); ?>">
            <h3>Want to join our team?</h3>
            <img src="<?php echo get_template_directory_uri(); ?>/images/inspiralia_contact_icon.png" alt="inspiralia" />
          </a>
        </aside>
      </section>
    </div>
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
