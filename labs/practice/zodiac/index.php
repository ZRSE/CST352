<?php
    
    $startYear = 0;
     
     $startYears = $_GET['startYear'];
    $startYears = $_GET['endYear'];

    
    function years($startYear, $endYear){
        $sum = 0;
        $arrayIndex = 0;
        $array = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");

        for ($i = $startYear; $i <= $endYear; $i+=4) {
            
               if ($i == 1776) {
                 echo "<li>Year' $i  '<strong>INDEPENDENCE</strong>'</li>";
             } else if (( $i % 100) == 0) {
                echo "<li>Year $i  '<strong>Happy New Century</strong>'</li>";
                } 
                else {
                    echo "<li>";
                    echo "Year " . $i;
                    echo "</li>";
                }
                $sum += $i;
                
                
            
            echo "<img src='"  . $array[$arrayIndex] .  ".png'>";
            $arrayIndex++;
            if ($arrayIndex == 12) {
             $arrayIndex = 0;
            }  
               
         }
          return $sum;
                      //echo "SUM: " . $sum;

         
         
         
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <style>

            html {
             text-align: center;
            }
        </style>
        <h1>Chinese Zodiac List</h1>
        <form method="GET">
                        <input type="text" name="startYear" size="15" placeholder="startYear" value="<?=$_GET["startYear"]?>"/>
                         <input type="text" name="endYear" size="15" placeholder="endYear" value="<?=$_GET["endYear"]?>"/>
                          <input type="text" name="startYear" size="15" placeholder="startYear" value="<?=$_GET["startYear"]?>"/>
                           <input type="text" name="startYear" size="15" placeholder="startYear" value="<?=$_GET["startYear"]?>"/>
                        <input type="submit" name="submitBtn" value="Go!"/>
                    </form>
        
            <ul>
        <?php
            $sums =  years($startYears, 2000);
            echo "$sums";
           
            
        ?>
            </ul>
            
            
            
            
        

    </body>
</html>