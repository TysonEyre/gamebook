<?php
require __DIR__ . "/../src/Repository/GameRepository.php";

$repo = new GameRepository();
// Get all games that a user has rated
$games = $repo->findByUserId(1);

?>
<html>
<body>
<h1>Gamebook Ratings</h1>
<ul>
<!-- Iterate through our array of games -->
<?php foreach ($games as $game): ?>
   <li>
        <!-- Get title of game -->
       <span class="title"><?php echo $game->getTitle() ?></span><br>
        <!-- Allow rating of game -->
       <a href="add-rating.php?game=<?php echo $game->getId() ?>">Rate</a>
        <!-- Get rating of game -->
       <?php echo $game->getAverageScore() ?><br>
        <!-- Get image of game -->
       <img src="<?php echo $game->getImagePath() ?>">
   </li>
<?php endforeach ?>
</ul>
</body>
</html>
