        <?php
            $backgroundImage = "img/sea.jpg";
            
                        if (!isset($_GET['keyword']) ) {
                           $keyword = $_GET['keyword'];
                           echo "You searched for " . $keyword;
                            } else {
                                 include 'api/pixabayAPI.php';
                                 $imageURLs = getImageURLs($_GET['keyword']);
                                 $backgroundImage = $imageURLs[array_rand($imageURLs)]; 
                                    
                                 for ($i = 0; $i < 5; $i++) {
                                                                        //echo "<img src='" . $imageURLs[rand(0, count($imageURLs))] . "' width='100' >"
                                   do {
                                       $randomIndex = rand(0,count($imageURLs));
                                   } 
                                   while (!isset($imageURLs[$randomIndex]));
                                 
                                   echo "<img src'" . $imageURLs[$randomIndex] . "' width='200' >";
                                   unset($imageURLs[$randomIndex]);
                                     }
                                   
                           
                        
        ?>
        
        <?php
             }
        ?>

<!DOCTYPE html>
<html>
    <head>
        
        <title> </title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <style>
            @import url("css/style.css");
            
            body {
                background-image: url('<?= $backgroundImage ?>');
                background-repeat: no-repeat;
                
                
            }
            
            html {
                height: 100%;
                width: 100%;
            }
        </style>
    </head>
    <body>
        
        <form method="GET">
            <input type="text" name="keyword" size="15" placeholder="keyword"/>
            <input type="submit" name="submitBtn" value="Go!"/>
        </form>
        
       
        
        

        <h2>You must type a keyword or choose a category.</h2>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </body>
</html>