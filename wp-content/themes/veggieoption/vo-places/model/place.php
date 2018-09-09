<?php

class Place
{
	public $title;
	public $content;
	public $category;
	public $location;
	public $phone_number;
	public $mobile_number;
	public $email;
	public $rating;
	public $when_to_go;
    public $budget;
    public $which_mood;
    public $to_go_with;
    public $reservation;
    public $cuisine;
    public $meta_title;
	public $meta_description;
	public $date_created;
	public $entity_status;
	public $place_status;

    // method declaration
    public function displayTitle() {
        echo $this->title;
    }
}

?>