<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
    <?php
        
        $coordinates = "59.9139,10.7522";
        $url="https://api.darksky.net/forecast/49faa828bfe8e9110c3d3440f5296498/".$coordinates."?units=si";
        
        $weather = json_decode(file_get_contents($url));
       /* echo "<pre>";
        print_r($weather);
        echo "</pre>";*/
        
        $temp_RightNow = $weather->currently->temperature;
        $sum = $weather->currently->summary;
        $wind_rightNow = $weather->currently->windSpeed;


        echo "<p>The temperature in Oslo right now: <strong>" . $temp_RightNow . " celsius</strong>. " .$sum . ". Windspeed: " .$wind_rightNow. " m/s.</p>";
        
        //initiates a curl
       /* $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_exec ($curl);
        //curl_close ($curl);
        
        
        $result = curl_exec ($curl);
        curl_close ($curl);
        print $result;
        */
        
        /*
        $result = file_get_contents($url);
        var_dump(json_decode($result, true));
        */
   
    ?>
    
    </body>
</html>