<?php

include_once("model/place.php");

function debugToConsole($msg) { 
    echo "<script>console.log(".json_encode($msg).")</script>";
}

function the_slug_exists($post_name) {
	global $wpdb;
	if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
		return true;
	} else {
		return false;
	}
}


function vo_places_create() {

    $place = new Place();

    if (isset($_POST['title'])) 
    { 
        $place->title = $_POST["title"];
        $place->content = $_POST["content"];
        $place->category = $_POST["category"];
        $place->location = $_POST["location"];
        $place->phone_number = $_POST["phone_number"];
        $place->mobile_number = $_POST["mobile_number"];
        $place->email = $_POST["email"];
        $place->rating = $_POST["rating"];
        $place->when_to_go = $_POST["when_to_go"];
        $place->budget = $_POST["budget"];
        $place->which_mood = $_POST["which_mood"];
        $place->to_go_with = $_POST["to_go_with"];
        $place->reservation = $_POST["reservation"];
        $place->cuisine = $_POST["cuisine"];
        $place->meta_title = $_POST["meta_title"];
        $place->cuisine = $_POST["cuisine"];
        $place->meta_description = $_POST["meta_description"];
        $place->date_created = date("Y-m-d H:i:s");
        $place->entity_status = 'Active';
        $place->place_status = 'Active';

        global $wpdb;
        $table_name = "vo_place";

        $results = $wpdb->insert(
                $table_name, //table
                array(
                    'title' => $place->title, 
                    'content' => $place->content,
                    'category' => $place->category,
                    'location' => $place->location,
                    'phone_number' => $place->phone_number,
                    'mobile_number' => $place->mobile_number,
                    'email' => $place->email,
                    'rating' => $place->rating,
                    'when_to_go' => $place->when_to_go,
                    'budget' => $place->budget,
                    'which_mood' => $place->which_mood,
                    'to_go_with' => $place->to_go_with,
                    'reservation' => $place->reservation,
                    'cuisine' => $place->cuisine,
                    'meta_title' => $place->meta_title,
                    'meta_description' => $place->meta_description,
                    'date_created' => $place->date_created,
                    'entity_status' => $place->entity_status,
                    'place_status' => $place->place_status
                ), //data
                array(
                    '%s','%s','%s','%s','%s','%s','%f','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s'
                ) //data format			
        );

        // create the restaurant page
        if (is_admin()){

            $parent_page = get_page_by_title( 'Restaurants' );


            $restaurant_page_title = $place->title;
            $restaurant_page_slug =  preg_replace('/\s+/', '_', $restaurant_page_title);
            $restaurant_page_content = '[vc_row][vc_column][vo_restaurant][/vc_column][/vc_row]';
            $restaurant_page_check = get_page_by_title($restaurant_page_title);
            $restaurant_page = array(
	            'post_type' => 'page',
	            'post_title' => $restaurant_page_title,
	            'post_content' => $restaurant_page_content,
	            'post_status' => 'publish',
                'post_author' => 1,
                'post_parent' => $parent_page->ID,
	            'post_slug' => $restaurant_page_slug
            );
            if(!isset($restaurant_page_check->ID) && !the_slug_exists($restaurant_page_slug)){
                $restaurant_page_id = wp_insert_post($restaurant_page);
            }
        }

        $message = "place inserted";
        $message.= "<a>Go back</a>";

    }
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/vo-places/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Add New place
        <?php 
               
        
        if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>

        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" >
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" value="<?php echo $place->title; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                 <input type="text" id="category" name="category" value="<?php echo $place->category; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <?php 
                    wp_editor($place->content,'content',array(
                        'media_buttons' => true,
                        'textarea_rows' => 8,
                        'tabindex' => 2,
                        'tinymce' => array(
                        'theme_advanced_buttons1' => 'bold, italic, ul, pH, temp',
                    ))); 
                ?>            
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                 <input type="text" id="location" name="location" value="<?php echo $place->location; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                 <input type="text" id="phone_number" name="phone_number" value="<?php echo $place->phone_number; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="mobile_number">Mobile Number:</label>
                 <input type="text" id="mobile_number" name="mobile_number" value="<?php echo $place->mobile_number; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                 <input type="email" id="email" name="email" value="<?php echo $place->email; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="rating">Rating:</label>
                 <input type="text" id="rating" name="rating" value="<?php echo $place->rating; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="when_to_go">When To Go:</label>
                 <input type="text" id="when_to_go" name="when_to_go" value="<?php echo $place->when_to_go; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="budget">Budget:</label>
                 <input type="text" id="budget" name="budget" value="<?php echo $place->budget; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="which_mood">Which Mood:</label>
                 <input type="text" id="which_mood" name="which_mood" value="<?php echo $place->which_mood; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="to_go_with">To Go With:</label>
                 <input type="text" id="to_go_with" name="to_go_with" value="<?php echo $place->to_go_with; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="reservation">Reservation:</label>
                 <input type="text" id="reservation" name="reservation" value="<?php echo $place->title; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="cuisine">Cuisine:</label>
                 <input type="text" id="title" name="cuisine" value="<?php echo $place->cuisine; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="meta_title">Meta Title:</label>
                 <input type="text" id="meta_title" name="meta_title" value="<?php echo $place->meta_title; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="meta_description">Meta Description:</label>
                 <input type="text" id="meta_description" name="meta_description" value="<?php echo $place->meta_description; ?>" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php
}