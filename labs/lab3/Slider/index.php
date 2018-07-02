<?php
   $backgroundImage = "img/sea.jpg";
   
   if(isset($_GET['keyword']))
   {
       include 'api/pixabayAPI.php';
       
       $keyword = $_GET['keyword'];
       
       if(!empty($_GET['category'])) { //User selected a category
           
           $keyword = $_GET['category'];
       }
       
       $imageURLs = getImageURLs($keyword, $_GET['layout']);
       $backgroundImage = $imageURLs[array_rand($imageURLs)];
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <meta charset="utf-8">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel = "stylesheet">
        <style>
            @import url("css/styles.css");
            body {
                background-image:url('<?=$backgroundImage ?>');
                background-size: 100% 100%;
                background-attachment: fixed;
            }
        </style>
    </head>
    <body>
        <br/><br />
        <?php
           if(!isset($imageURLs))
           {
               echo "<h2>Type a keyword to display a slideshow <br /> with random images from Pixabay.com </h2>";
           }
           else
           {
               if(empty($_GET['keyword']) && (empty($_GET['category'])))
               {
                  echo "<h2>Please type a keyword or display a category </h2>";
               }
               else
               {
               //Display Carousel Here
        ?>
        <div id="carousel-example-generic" class = "carousel slide" data-ride="carousel">
            <!-- Indicators Here -->
            <ol class="carousel-indicators">
                <?php
                for($i = 0; $i < 7; $i++)
                {
                    echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                    echo ($i == 0) ? " class= 'active'": "";
                    echo "></li>";
                }
                ?>
            </ol>
            <!-- Wrapper for images -->
             <div class = "carousel-inner" role = "listbox">
             <?php
               for($i = 0; $i < 7; $i++)
               {
                   do
                   {
                       $randomIndex = rand(0, count($imageURLs));
                   }
                   while(!isset($imageURLs[$randomIndex]));
                   
                   echo '<div class = "carousel-item ';
                   echo ($i == 0)? "active": "";
                   echo '">';
                   echo "<img src = '" . $imageURLs[$randomIndex] . "'  >";
                   echo '</div>';
                   unset($imageURLs[$randomIndex]);
               }
        ?>
        </div>
        <!-- Controls Here --> 
        <a class ="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class = "carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class ="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
            <span class = "carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        <?php
           }
           } //end of else statement
        ?>
        <form>
            <input type="text" name="keyword" placeholder="Keyword" value = "<?=$_GET['keyword']?>"/>
            <label for="horizontal">Horizontal</label>
            <input type="radio" name="layout" id="horizontal" value="horizontal">
            <label for="vertical">Vertical</label>
            <input type="radio" name="layout" id="vertical" value = "vertical">
            <select name="category">
               <option value = "">Select One</option>
               <option value="ocean">Ocean</option>
               <option value="desert">Desert</option>
               <option value="flower">Flower</option>
               <option value="cake">Cake</option>
               <option value="tree">Tree</option>
            </select>

            <input type="submit" value="Search" />
        </form>
        <br/><br />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    </body>
</html>