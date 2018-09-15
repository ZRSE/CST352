<?php
  function getRandomColor() {
    
    echo "rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).")";

  }  
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        
        <style type="text/css">
            body {
                
                <?php
                //Random color variables
                $red = rand(0,255);
                $green = rand(0,255);
            
                //Background color with random colors
                echo "background-color: rgba($red,$green,".rand(0,255).",".(rand(0,10)/10).");";
                ?>
                
            }
            
            h1 {
                  <?php
                $red = rand(0,255);
                $green = rand(0,255);
            

                //H1 background-color
                echo "background-color: rgba($red,$green,".rand(0,255).",".(rand(0,10)/10).");";
                //H1 FONT COLOR
                echo "color: rgba($red,$green,".rand(0,255).",".(rand(0,10)/10).");";
                
                ?>
                
                text-align: center;
            }
            
            h2 {
                background-color: <?= getRandomColor() ?>;
                color:<?= getRandomColor()?>;
                
                text-align: center;
            }
        </style>
        
          <h1>Welcome!</h1>
          <h2>Random colors!!</h2>
    </body>
</html>