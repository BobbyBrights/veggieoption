<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer" style="background:white;">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">
			<div class="col-md-4">
				<ul style="list-style:none; padding-left:0;">
					<li>Restaurants</li>
					<li>Chronicles</li>
					<li>Our Story</li>
					<li>Contact</li>
					<li>Instagram</li>
				</ul>
			</div>
			<div class="col-md-4">
				<p>Don't see your favourite restaurant? You can always pitch us a new place.</p>
				<p><a class="btn btn-primary">Pitch us a New Place</a></p>
			</div>
			<div class="col-md-4">
				<p>Sign up with our newsletter and make sure you get the latest updates on all reviews and chronicles.</p>
				<input type="email" placeholder="Email Address"><a class="btn btn-primary">Sign me up <i class="fa fa-arrow-right"></i></a>
			</div>
		</div>
		<div class="row">

			<div class="col-md-6">

Sitemap | Privacy Policy | Cookie Policy
			</div><!--col end -->
			<div class="col-md-6 text-right">
				All Contents © 2018 Veggie Option
			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>
<script>
      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
		// location types.
		if(document.getElementById('autocomplete')!=null)
		{
			autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});
		}

      }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRurc_swzLL610JZgYHE1gd6-Ar9iv3hA&libraries=places&callback=initAutocomplete" 
async defer></script>
</body>

</html>

