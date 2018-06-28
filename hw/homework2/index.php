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
              play();
           ?>
           
           <form>
               <input type="submit" value = "Click for another pair of cards!"/>
           </form>
           
           
           <p>All images are from <a href = "http://www.alovelyworld.com" >http://www.alovelyworld.com</a></p>
        </div>
    </body>
</html>