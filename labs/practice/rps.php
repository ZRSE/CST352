<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <h1>Rock, Paper, Scissors</h1>
        <?php
        
            function show(){
            
           
            
            

         // if ($random == $random) {
              //  echo "tie game";
            
            }
            
             $random = rand(1,3);
            $symbol = "";

                if($random == 1) {
                    $symbol = "rock";

                    
                } else if ($random == 2) {
                    $symbol = "scissors";
                    

                } else if ($random == 3) {
                    $symbol = "paper";

                }
                
                echo "<img src='./img/rps/$symbol.png'>";
                
                                echo $random;
             
            
            
             $random1 = rand(1,3);
            $symbol1 = "";

                if($random1 == 1) {
                    $symbol1 = "rock";

                    
                } else if ($random1 == 2) {
                    $symbol1 = "scissors";
                    

                } else if ($random1 == 3) {
                    $symbol1 = "paper";

                }
                
                echo "<img src='./img/rps/$symbol1.png'>";
                
                                echo $random1;
                                
                                
                if ($random1 == $random) {
                    echo "tie game";
                }
             
            
            
            
            
           
            
                           
            
            show();
            show();
            

  

        ?>

    </body>
</html>