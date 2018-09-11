<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
    </head>
    <body>
        <?php
        
        function displayStuff($random_value) {
        
      //  $random_value = rand(0,3);
      
        if ($random_value == 0) {
             $symbol = "grapes";
        } else if ($random_value == 1 ) {
             $symbol = "cherry";
        } else if ($random_value == 2) {
             $symbol = "seven";
        } else if ($random_value == 3) {
             $symbol = "orange";
        };
        
         echo "<img src='img/$symbol.png' alt='$symbol' title='$symbol'>";
        
        }
        
        $random_value2 = rand(0,3);
            displayStuff($random_value2);
        $random_value3 = rand(0,3);
            displayStuff($random_value3);
        $random_value4 = rand(0,3);
            displayStuff($random_value4);

        


         echo "$random_value2" . " ";
         echo "$random_value3" . " ";
         echo "$random_value4" . " ";
         
         if ($random_value2 == $random_value3 AND $random_value3 == $random_value4 ) {
             echo "tre like";
         };

        ?>
    </body>
</html>