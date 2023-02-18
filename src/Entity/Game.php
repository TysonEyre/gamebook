<?php
class Game {
   protected $title;
   protected $imagePath;
   // Array
   protected $ratings;
   protected $id;
   protected $genreCode;

   // Set id
   public function __construct($id = null)  {
       $this->id = $id;
   }
   // Get id
   public function getId() {
       return $this->id;
   }
   public function getGenreCode() {
       return $this->genreCode;
   }
   public function setGenreCode($value) {
       $this->genreCode = $value;
   }
   // Given a game, get the average of all of it's ratings
   public function getAverageScore() {
       $ratings = $this->getRatings();
       $numRatings = count($ratings);
        // If there are no ratings, return null
       if ($numRatings == 0) {
           return null;
       }

       $total = 0;
       foreach ($ratings as $rating) {
           $score = $rating->getScore();
           if ($score === null) {
               $numRatings--;
               continue;
           }
           $total += $score;
       }
       return $total / $numRatings;
   }
   public function toArray() {
       $array = [
           'title' => $this->getTitle(),
           'imagePath' => $this->getImagePath(),
           'ratings' => [],
       ];
       foreach ($this->getRatings() as $rating) {
           $array['ratings'][] = $rating->toArray();
       }
       return $array;
   }
   // If a user tends to score games within a specific genre it gets an average of those scores and if it's above 3, they are compatible with this genre
   public function isRecommended($user) {
       $compatibility = $user->getGenreCompatibility($this->getGenreCode());
       return $this->getAverageScore() / 10 * $compatibility >= 3;
   }
   public function getTitle() {
       return $this->title;
   }
   public function setTitle($value) {
       $this->title = $value;
   }
   public function getImagePath() {
       if ($this->imagePath == null) {
           return 'images/placeholder.png';
       }
       return $this->imagePath;
   }
   public function setImagePath($value) {
       $this->imagePath = $value;
   }
   public function getRatings() {
       return $this->ratings;
   }
   public function setRatings($value) {
       $this->ratings = $value;
   }
}
