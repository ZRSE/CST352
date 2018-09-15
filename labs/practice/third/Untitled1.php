    <?php 
    function getLuckyNumber(){ 
        $lucky = rand(1,10);
            if ($lucky == 4) {
                $lucky = 11;
              } 
            return $lucky;
            
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
    
    <?php 
    $luckyNum = getLuckyNumber();
    
    echo $luckyNum *  2;
    
    ?> 
    
    <h1>My lucky number is </h1>

    </body>
</html>