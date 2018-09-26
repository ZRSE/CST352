<!DOCTYPE html>
<html>
    <head>
        <title>Rock/Paper/Scissor</title>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    </head>
    <body>
        
        
        
       
        
        <?php
          
    
                $tie = 0;   //COUNTER FOR TIE
                $pla1 = 0;  //COUNTER FOR PLAYER 1 WINS
                $pla2 = 0;  //COUNTER FOR PLAYER 2 WINS
            
                function playRPS() {
                $playerArr1 = array();  //CREATE A NEW ARRAY FOR PLAYER 1
                $playerArr2 = array();  //CREATE A NEW ARRAY FOR PLAYER 2

                
                for ($i = 0; $i < 3; $i++) {   //FOR 3 ITERATIONS..
                    $random1 = rand(1,3);      //CREATE RANDOM 1, 2 OR 3
                    $random2 = rand(1,3);

                    array_push($playerArr1, $random1);  //PUSH FOR EACH ITERATION THE RANDOMVALUE INTO THE ARRAY
                    array_push($playerArr2, $random2);  // -.-
                    
                    shuffle($playerArr2);   //Even more random :D
                    shuffle($playerArr1);   // -.-
                }
                    echo "<section class='rpsPictures'>";
                    echo "<article class='playerOne'>";
                for ($i = 0; $i < 3; $i++) {         //FOR 3 ITERATIONS
                     
                       
                         switch ($playerArr1[$i]) {      //THE INDEX X OF PLAYER 1 ARRAY IS 1, 2 OR 3 
                            case 1: $symbol = "rock";
                                break;
                            case 2: $symbol = "scissor";
                                break;
                            case 3: $symbol = "paper";
                                break;    
                            } echo "<img src='img/$symbol.png' alt='$symbol' title='".ucfirst($symbol)."' >";  // ECHO THE IMAGE
                       
                }
                    echo "</article>";
                       //  
                          // ECHO THE IMAGE
                      //  echo "</article>";
                      //
                     echo "<article class='playerTwo'>"; 
                for ($i = 0; $i < 3; $i++) {         //FOR 3 ITERATIONS
                        switch ($playerArr2[$i]) {
                            case 1: $symbol = "rock";
                                break;
                            case 2: $symbol = "scissor";
                                break;
                            case 3: $symbol = "paper";
                                break;    
                            } echo "<img src='img/$symbol.png' alt='$symbol' title='".ucfirst($symbol)."' >";
                           
                         } 
                       echo "</article>";
                echo "</section>";
                 
                 
                for ($i = 0; $i < 3; $i++) {
                     if ($playerArr1[$i] == $playerArr2[$i]) { 
                        $tie++;
                        if ($tie >= 2) {
                            echo "<h2 class='winLoose'>THIS IS A TIE!</h2>";
                            break;
                        }
                    } 
                    else if ($playerArr1[$i] == 1 && $playerArr2[$i] == 2 ) {    
                        $pla1++;
                        if ($pla1 >= 2) {
                            echo "<h2 class='winLoose'>PLAYER ONE WINS!</h2>";
                             break;
                        }
                    } 
                    else if ($playerArr1[$i] == 2 && $playerArr2[$i] == 3 ) {   
                          $pla1++;
                        if ($pla1 >= 2) {
                         echo "<h2 class='winLoose'>PLAYER ONE WINS!</h2>";
                         break;
                        }
                    } 
                    else if ($playerArr1[$i] == 3 && $playerArr2[$i] == 1 ) { 
                          $pla1++;
                        if ($pla1 >= 2) {
                          echo "<h2 class='winLoose'>PLAYER ONE WINS!</h2>";
                          break;
                        }
                    }   
                    else if ($playerArr2[$i] == 1 && $playerArr1[$i] == 2 ) {  
                         $pla2++;
                        if ($pla2 >=2) {
                          echo "<h2 class='winLoose'>PLAYER TWO WINS!</h2>";
                          break; 
                        }
                    } 
                    else if ($playerArr2[$i] == 2 && $playerArr1[$i] == 3 ) {   
                         $pla2++;
                        if ($pla2 >=2) {
                          echo "<h2 class='winLoose'>PLAYER TWO WINS!</h2>";
                          break;
                        }
                    } 
                    else if ($playerArr2[$i] == 3 && $playerArr1[$i] == 1 ) { 
                        $pla2++;
                        if ($pla2 >=2) {
                         echo "<h2 class='winLoose'>PLAYER TWO WINS!</h2>";
                         break;
                        }
                    } 
                }
                  if ($pla1 == 1 && $pla2 == 1 && $tie == 1) {
                          echo "<h2 class='winLoose'>THIS IS A TIE!</h2>";
                     } 
                     
                }
                
                
                playRPS();
        ?>
        
        
         <article class="button">
            <button id="playButton" onClick='play()' type="button">Play!</button>
        </article>
        
        <script type="text/javascript">
            
           function play(){
                window.location.reload();
            }

        </script>
        
        

    </body>
</html>