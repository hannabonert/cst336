<?php
   include 'inc/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title> It's a Match! </title>
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <header>
            <h1> It's a Match! </h1>
        </header>
        <div id = "main">
            
           <?php
              $cards = array();
              
              for($i = 1; $i < 3; $i++)
              {
                  ${"card" . $i} = rand(0, 5);
                  displayCardImages(${"card" . $i});
                  $cards[] = ${"card" . $i};
              }
              
              echo "<br />";
              $message = evaluateCards($cards) ? "You won- It's a Match!" : "You lost!- Your cards don't match.";
              
              
              echo "$message";
              
           ?>
        
           <form>
               <input type="submit" value = "Click for another pair of cards!"/>
           </form>
           
        </div>
    </body>
</html>