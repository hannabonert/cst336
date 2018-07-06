<?php
   session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Your Personality Revealed</title>
        <link href = "css/styles.css" rel = "stylesheet" type = "text/css" />
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
        <style>
            #results {
                color: <?php echo $_GET['color']; ?>;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Your Personality Revealed</h1>
        </header>
        <main>
            <h3>Answer these few simple questions to learn more about yourself!</h3>
            <form>
                First Name:
                <br>
                <input type="text" name="firstName" value = "<?=$_GET['firstName']?>"/>
                <br><br>
                
                What color would you like to paint your bedroom?
                <br>
                <input type="color" name = "color" value = "<?=$_GET['color']?>">
                <br><br>
                
                How fast do you like to drive your car?
                <br>
                <select name="speed">
                    <option value="daring" <?php if($_GET['speed'] == "daring"){echo "selected";} ?> >Speedy</option>
                    <option value="safely adventurous" <?php if($_GET['speed'] == "safely adventurous"){echo "selected";} ?>>At the speed limit</option>
                    <option value="cautious" <?php if($_GET['speed'] == "cautious"){echo "selected";} ?>>10 miles below speed the limit</option>
                </select>
                <br><br>
                
                <fieldset>
                    <legend>What would you choose from this menu?:</legend>
                    <input id="tea" type="radio" name="food" value = "tea" <?php if($_GET['food'] == "tea"){echo "checked";} ?>>
                    <label for="tea">Tea and Biscuits</label><br>
                    <input id="steak" type="radio" name="food" value="steak" <?php if($_GET['food'] == "steak"){echo "checked";} ?>>
                    <label for="steak">Steak</label><br>
                    <input id="sushi" type="radio" name="food" value="sushi" <?php if($_GET['food'] == "sushi"){echo "checked";} ?>>
                    <label for="sushi">Sushi</label><br>
                    <input id="jalapenos" type="radio" name="food" value="jalapenos" <?php if($_GET['food'] == "jalapenos"){echo "checked";} ?>>
                    <label for="steak">Jalapenos and Jelly</label><br>
                 </fieldset>
                 <br><br>
                 
                 What is your favorite number?
                 <br>
                 <input type="number" name="number" value="<?=$_GET['number']?>">
                 <br><br><br>
                 
                <input id = submitButton type="submit" value="Submit">
            </form>
            <div id = results>
                <?php
                    //calculate ambition
                    if($_GET['number'] > 100)
                    {
                        $ambition = "extremely high";
                    }
                    else if($_GET['number'] > 50)
                    {
                        $ambition = "high";
                    }
                    else if($_GET['number'] > 0)
                    {
                        $ambition = "average";
                    }
                    else 
                    {
                        $ambition = "low";
                    }
                    
                    //calculate user taste
                    if($_GET['food'] == "tea")
                    {
                        $taste = "conservative";
                    }
                    else if($_GET['food'] == "steak")
                    {
                        $taste = "classy";
                    }
                    else if($_GET['food'] == "sushi")
                    {
                        $taste = "contemporary";
                    }
                    else 
                    {
                        $taste = "creative";
                    }
                    
                    //validate that user filled in all variables
                    if(empty($_GET['firstName']))
                    {
                        echo "Please enter your first name. <br>";
                    }
                    
                    if(empty($_GET['color']) or !isset($_GET['color']))
                    {
                        echo "Please select your favorite bedroom color.<br>";
                    }
                    
                    if(empty($_GET['speed']) or !isset($_GET['color']))
                    {
                        echo "Please enter your driving speed.<br>";
                    }
                    
                    if(empty($_GET['food']))
                    {
                        echo "Please enter your menu choice.<br>";
                    }
                    
                    if(empty($_GET['number']))
                    {
                        echo "Please enter your favorite number.<br>";
                    }
                    
                    if(!empty($_GET['firstName'])) 
                    {
                    echo "Hello " . ucfirst($_GET['firstName']) . ", thanks for taking 
                    our quiz. <br> Based on your driving speed preference, you are " .
                    $_GET['speed'] . ". Your favorite number indicates 
                    that you have " . $ambition . " ambition. Your taste is " .
                    $taste . " , as per your food choice.";
                        
                    }
                ?>
                
            </div>
        </main>
    </body>
</html>