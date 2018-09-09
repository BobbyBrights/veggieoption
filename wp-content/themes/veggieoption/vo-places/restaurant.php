<?php

include_once("model/place.php");


function vo_restaurant_wrapper()
{
	global $wpdb;
	$table_name =  "vo_place";
	
	$place = $wpdb->get_row("SELECT * from $table_name where id = 2");

	return '
	

	<div class="retaurant-page">

	<div class="row">
		<div class="col-lg-5">
			<img src="http://veggieoption:8890/wp-content/uploads/2018/09/static-image.png">
		</div>
		<div class="col-lg-7">
			<div class="owl-carousel owl-theme">
				<div class="item"> <img src="http://veggieoption:8890/wp-content/uploads/2018/09/carousel-image.png"></div>
				<div class="item"> <img src="http://veggieoption:8890/wp-content/uploads/2018/09/carousel-image.png"></div>
			</div>

		</div>
	</div>
	<div class="row">
		<div class="col-lg-8">
			<h1>'.$place->title.'</h1>
			<div class="row">
				<div class="col-lg-12">
					rating | price | open hours | reservation (required)
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<p>
						A buzzy Peruvian food and drinks joint, capturing the good time spirit of Soho and Shoreditch. It’s a
						favourite of many critics but,
						to be honest, not the finest cooking in London. The portion sizes, not the dishes, leave you wanting more.
						That aside, we heartily approve of the many veggie, vegan and gluten free options, clearly mentioned on
						the
						menu.
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<h4>Cuisine</h4>
					<p>Peruvian</p>
				</div>
				<div class="col-lg-6">
					<h4>When to go</h4>
					<p>Lunch, Dinner</p>
				</div>
				<div class="col-lg-6">
					<h4>Go with</h4>
					<p>Family, Friends, Big Group, Kids</p>
				</div>
				<div class="col-lg-6">
					<h4>When you are in the mood for</h4>
					<p>Casual, Celebration</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<h4>To go or Not to go</h4>
					<p>
						Best for a fun dinner and Pisco Sour (contains egg white) before a fun night out. It won’t break the bank,
						although a little overpriced for what you get. Best to book given the locations. Enjoyable and
						inoffensive, but for a better experience go to sister restaurant Andina.
					</p>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="vo-restaurant-sidebar">


				<h6>ADDRESS</h6>
				<p>17 Frith St, Soho, London W1D 4RG, UK</p>

				<h6>TODAY (OPEN)</h6>
				<p>11:30 am - 3:00 pm</p>

				<h6>Call</h6>
				<p>+44 020 7292 2040</p>

				<h6>VIEW MENU</h6>

			</div>
			<div class="vo-restaurant-direction">
				<p>Get Me There with Citymapper</p>
			</div>
			<div class="vo-restaurant-direction">
				<p>Show Directions with Google Maps</p>
			</div>
		</div>
	</div>

</div><!-- .entry-content -->
	';
}
add_shortcode('vo_restaurant', 'vo_restaurant_wrapper');

?>