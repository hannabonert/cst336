<?php
   function displayCardImages($card)
   {
       
           $cardImage = translateNumToCard($card);
           
           echo "<img src = 'img/$cardImage.jpg' alt = '$cardImage' 
           title = '$cardImage'>";
   }
   
   function evaluateCards($cards)
   {
       $equalCards = true;
       sort($cards); //will end sooner if not all values are equal
       $arrLength = count($cards);
              
       for($i = 0; $i < $arrLength - 1; $i++)
       {
           if($cards[$i] != $cards[$i + 1])
           {
              $equalCards = false;
              break;
           }
       }
       
       return $equalCards;
   }
   
   function  translateNumToCard($card)
   {
       switch ($card)
       {
               case 0: $cardImage = "castle";
                       break;
               case 1: $cardImage = "penguins";
                       break;
               case 2: $cardImage = "tree";
                       break;
               case 3: $cardImage = "everest";
                       break;
               case 4: $cardImage = "elephants";
                       break;
               case 5: $cardImage = "copenhagen";
                       break;
       }
       
       return $cardImage;
   }
   
   function play()
   {
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
   }
?>