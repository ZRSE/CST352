<!DOCTYPE html>
<html>
    <head>
        <title>Homework</title>
          <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    </head>
        
       
    <body>
        
        <section class="container">
        
        <h1 id="header">Weather app for homework 3</h1>
               <form method="get">
                    
                    <select name="city" id="citySelect">
                        <option value="">Choose..</option>
                        <option value="Marina" <?php echo (isset($_GET['city']) && $_GET['city'] == 'Marina') ? 'selected="selected"' : '' ?>>Marina</option>
                        <option value="Oslo" <?php echo (isset($_GET['city']) && $_GET['city'] == 'Oslo') ? 'selected="selected"' : '' ?>>Oslo</option>
                        <option value="Tokyo" <?php echo (isset($_GET['city']) && $_GET['city'] == 'Tokyo') ? 'selected="selected"' : '' ?>>Tokyo</option>
                    </select>
                    
                    <input type="radio" name="forRadio" value="weekly" id="weekly" <?php echo (isset($_GET['forRadio']) && $_GET['forRadio'] == 'weekly') ? 'checked="checked"' : '' ?>>
                    <label for="weekly">Weekly</label>
                   
                    <input type="radio" name="forRadio" value="hourly" id="hourly" <?php echo (isset($_GET['forRadio']) && $_GET['forRadio'] == 'hourly') ? 'checked="checked"' : '' ?>>
                    <label for="hourly">Hourly</label>
                    
                    <input type="checkbox"  class="checkBox" name="farenheit" value="farenheit" <?php echo (isset($_GET['farenheit']) && $_GET['farenheit'] == 'farenheit') ? 'checked="checked"' : '' ?>>
                    <label for="farenheit">Check for farenheit</label>
                    <input type="checkbox" class="checkBox" name="summary" value="dailySummary" <?php echo (isset($_GET['summary']) && $_GET['summary'] == 'dailySummary') ? 'checked="checked"' : '' ?>>
                    <label for="summary">Include daily summary</label>
                    
                    <input type="submit" id="btn" name="submitButton" value="Search" id="btn"/>

                </form>
                 

                
                
    <?php
            
           $coordinates="59.9139,10.7522";
            
            if (isset($_GET['submitButton']) ) { 
                
                $select = $_GET['city'];
                
                if(empty($_GET['city'])) {
                    echo "YOU MUST CHOOSE LOCATION!";
                } else {
        
                    switch ($select) {
                        case Oslo: $coordinates = "59.9139,10.7522";
                            break;
                        case Marina: $coordinates = "36.687560,-121.791370";
                            break;
                        case Tokyo: $coordinates = "35.689487,139.691711";
                            break;
                    }
                }
                 $unit="si";
            if ($_GET['farenheit'] == "farenheit") {
                $unit = "us";
                $far = "f";
                
                $url="https://api.darksky.net/forecast/49faa828bfe8e9110c3d3440f5296498/".$coordinates."?units=".$unit;
                
             } 
             
            $url="https://api.darksky.net/forecast/49faa828bfe8e9110c3d3440f5296498/".$coordinates."?units=".$unit;
            
            $weather = json_decode(file_get_contents($url));
           
            /*  //print out API
            echo "<pre>";
            print_r($weather);
            echo "</pre>";
            */
            }
            
            
            $temp_RightNow = $weather->currently->temperature;
            $sum = $weather->currently->summary;
            $sum2 = $weather->daily->summary;
            $wind_rightNow = $weather->currently->windSpeed;

    
            
      
        echo "<article class='phpContent'>";
            
        if ($_GET['forRadio'] == "weekly") {
            if(empty($_GET['forRadio'])) {
            echo "Pick either daily or weekly forecast!";
         } else {
            foreach($weather->daily->data as $dailyData):
                echo "On <span id='spanTxt'>".date("l, ", $dailyData->time) ."</span> you wil get a high of <span id='spanTxt'>".round($dailyData->temperatureMax)
                ."&deg;".$far."</span> and a low of <span id='spanTxt'>".round($dailyData->temperatureMin)."&deg;".$far."</span>,
                average temperature: ".round(($dailyData->temperatureMin+$dailyData->temperatureMax)/2)."&deg;".$far." <br>";
             endforeach;
             
                if ($_GET['summary'] == "dailySummary") {
                 echo "<span id='spanSum'>Summary for the week:</span> ".$sum2;
                 }
             }
             
             }
                        
        if ($_GET['forRadio'] == "hourly") {
             if(empty($_GET['forRadio'])) {
            echo "Pick either daily or weekly forecast!";
            } else {
            $count = 0;
            
            echo "Hourly weather for today: <br>";
            
            foreach($weather->hourly->data as $hourly):
                $count++;
                
                echo "<br>" . gmdate("g A:  ",$hourly->time) ." ". round($hourly->temperature) ."&#8451 <span><br>";
                
                
                if ($count == 6) break;
                    endforeach;
                    
                    if ($_GET['summary'] == "dailySummary") {
                        echo "<span id='spanSum'>Summary for the day:</span> " . $sum;
                     }
                  }
                    }
            echo "</article>";

            
          
        echo "</section>"
            ?>
            
            
                <footer>
                   <p>powered by <a href="https://darksky.net/dev">DarkSky API</a></p>
                </footer>
    </body>
</html>