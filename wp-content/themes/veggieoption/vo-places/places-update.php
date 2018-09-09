<?php

include_once("model/place.php");

function vo_places_update() {

    global $wpdb;
    $place = new Place();
    $table_name =  "vo_place";
    $id = $_GET["id"];

    $row = $wpdb->get_results("SELECT id,title,content from $table_name where id = $id");

//update
    if (isset($_POST['title'])) {

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

        $wpdb->update(
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
                    'date_updated' => $place->place_status,
                    'entity_status' => $place->entity_status,
                    'place_status' => $place->place_status
                ), //data
                array('id' => $id) //where
        );
    }
    else {//selecting value to update	
        $places = $wpdb->get_results($wpdb->prepare("SELECT id,title,content from $table_name where id=%s", $id));
    
        foreach ($places as $s) {
            $place->title = $s->title;
            $place->content = $s->content;
        }
        
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/vo-places/style-admin.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <div class="wrap">
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <label for="title">Title:</label>
                <input type="text" name="title" value="<?php echo $place->title; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                 <input type="text" name="category" value="<?php echo $place->category; ?>" class="form-control">
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