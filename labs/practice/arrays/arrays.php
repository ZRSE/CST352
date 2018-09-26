<?php

    $symbols = array("orange", "seven"); // Creates a new array
    
    //echo $symbols[1];                  //Prints index one of array
    
    array_push($symbols, "lemon");       //Adds lemon to the array
    
    $symbols[] = "grapes";               //Adds grapes to the array
    
    //$symbols[0] = "index0";            //Replaces index zero
    
    unset($symbols[2]);                  //Removes index two
    
    $symbols = array_values($symbols);   //Resets the index numbers
    
    sort($symbols);                      //Sorts the array in natural order
    
   
    display_random_element($symbols);
    
       function display_random_element($symbols) {

            $randomNum = rand(0, count($symbols)-1);
            
           // echo $randomNum . " - " . $symbols[$randomNum] . "<br>";
            echo "<img src='/CST352/labs/lab_2/777/img/" . $symbols[$randomNum] . ".png' width='100'>";

        };
    
    
    display_array($symbols);
    
    
    function display_array($symbols) {

        echo "<h2>Here is the content of the array: </h2></br>";
        
            for($i = 0; $i < count($symbols); $i++) {
             // echo $i . " - " . $symbols[$i] . "<br>"; 
              echo "<img src='/CST352/labs/lab_2/777/img/" . $symbols[$i] . ".png' width='100'>";
            }
            
    };

?>


<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    
    <body>
        
    </body>
</html>