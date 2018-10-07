        
        
      <?php
        $randomBackground = "img/sea.jpg";                        //set default background
        if (isset($_GET['keyword']) ) {                            //if parameters is set 
            include 'api/pixabayAPI.php';                           //include api
            $keyword = $_GET['keyword'];                            //keyword = get keyword
            $imageURLs = getImageURLs($keyword);                     //imageUrls = api getimageurls of keyword
            $randomBackground = $imageURLs[$randomIndex];          //RandomBackround is imageUrls random index
        }   
      ?>

<!DOCTYPE html>
<html>
    <head>
        
        <title>Image 1Carousel</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <style>
            @import url("css/style.css");
            
            body {
                background-image: url('<?= $randomBackground ?>');
                background-repeat: no-repeat;
                background-size: 100% ;
                text-align: center;
            }
            
            html {
                height: 100%;
                width: 100%;
            }
            
            h2 {
                text-align: center;
            }
            
            form {
                display: inline-block;
            }
            
            
          
            
         
            
           
        </style>
    </head>
    <body>
        <br /><br />
         <form method="GET">
           <input type="text" name="keyword" size="15" placeholder="keyword" value="<?=$_GET["keyword"]?>"/>
           <input type="submit" name="submitBtn" value="Go!"/>
         </form>
       
         <br /><br />
        
                 
                    
        <?php 
            if(!isset($imageURLs)) {
                echo "<h2>Type a keyword to display slideshow</h2>";
            } else {
            
            ?>

             
                      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
           <ol class="carousel-indicators">
             <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <?php
                 for($i = 0; $i < 7; $i++) {
                    echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                 }
                ?>

               <!-- Wrapper for slides -->
               <div class="carousel-inner" role="listbox">
                  <?php
                   for($i = 0; $i < 7; $i++) {
                       do {
                           $randomIndex = rand(0,count($imageURLs));
                       } while (!isset($imageURLs[$randomIndex]));

                       echo "<div class='item ";
                       echo ($i == 0)?" active":"";
                       echo "'>";
                       echo "<img src='" . $imageURLs[$randomIndex] . "'>";
                       echo "</div>";
                       unset($imageURLs[$randomIndex]);

                   }

                   ?>
               </div>


              <!-- Controls -->
               <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                 <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                 <span class="sr-only">Previous</span>
               </a>
               <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                 <span class="sr-only">Next</span>
               </a>
              </div>

               
                </ol>

                  <?php
                    }
                  ?>
            <br>
            
            
        
                 
        <h2>Type a keyword or select catagory</h2>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        
    </body>
</html>


