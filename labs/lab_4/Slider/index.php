<?php
    $randomBackground = "img/sea.jpg";                        //set default background
    if (isset($_GET['keyword']) ) {                            //if parameters is set
        include 'api/pixabayAPI.php';                           //include api
        $keyword = $_GET['keyword'];                         
        $layout = "horizontal";
        if (isset($_GET['layout'])) {
            $layout = $_GET['layout'];

        }

        if (!empty($_GET['category'])) {
            $keyword = $_GET['category'];

        }


        $imageURLs = getImageURLs($keyword, $layout);                     //imageUrls = api getimageurls of keyword
        $randomIndex = array_rand($imageURLs);
        $randomBackground = $imageURLs[$randomIndex];          //RandomBackround is imageUrls random index

       // echo "You searched: $keyword";

        shuffle($imageURLs);

    }
  ?>

<!DOCTYPE html>
<html>
<head>

    <title>Image Carousel</title>
                <link rel="stylesheet" href="css/styles.css" type="text/css" />

    <style>
       body {
            background-image: url('<?= $randomBackground ?>');
            background-size: cover;
            text-align: center;
            margin: 0 auto;
        }

        #carouselExampleIndicators {
            width: 500px;
            margin: 0 auto;
        }
        
       .layouts {
        width: 11em;
        height: auto;
        margin: 0 auto;
        text-align: center;

        }
        
        .forms {
            width: 31em;
            height: auto;
            background-color: white;
            margin: 0 auto;
            border-radius: 0.2em;
            margin-top: 2em;
            margin-bottom: 2em;
        }
        
    
        #btn {
            border: none;
            display: block;
            float: right;
            height: 5.4em;
            width:4em;
            margin-top: -5.4em;
            border-radius: 0em 0.2em 0.2em 0em;
            text-decoration: none;
            background-image: linear-gradient(to right, #ffffff, #bfcaa6);;
        }
        
        #search {
            text-align: center;
        }
        
        #cat {
            margin: 0 auto;
        }
        
        h2, p {
            text-align: center;
            color: white;
        }
    
    </style>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  type="text/css">
</head>
<body>

    <section class="forms">
        <form method="get" id="search">
            
       <input type="text" name="keyword" size="15" placeholder="keyword" value="<?=$_GET["keyword"]?>"/>
    
        <article class="layouts">
            <input type='radio' name="layout" value="horizontal" id="hlayout" class="lay"
        
            <?php
                if ($_GET['layout'] == "horizontal") {
                    echo " checked ";
                }
        
            ?>
        
            >
            
            <label for="hlayout"> Horizontal </label>
        
            <input type="radio" name="layout" value="vertical" id="vlayout" class="lay"
            <?=(($_GET['layout'] == "vertical")?"checked":"" )?> >
            
            <label for="vlayout"> Vertical </label>
        </article>
        
        
        <article id="cat">
            <select name="category">
                <option value="">Choose category</option>
                <option>Mountains</option>
                <option>Sea</option>
                <option>Sky</option>
                <option>Forest</option>
                <option value="snow"> Winter </option>
            </select>
        </article>
    
    
       <input type="submit" name="submitBtn" value="Go!" id="btn"/>
     </form>
 
 </section>





    <?php
        if( isset($keyword) && !empty($keyword))  {

        ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <?php

             for($i = 1; $i < 7; $i++) {
                echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
             }

        ?>

      </ol>
      <div class="carousel-inner">

          <?php
           for ($i = 0; $i < 6; $i++) {
                echo "<div class='carousel-item ";
                echo ($i == 0)?"active ":"";

                echo "'>";
                echo "<img class=\"d-block w-100\" src=\"".$imageURLs[$i]."\" alt=\"Second slide\">";
                echo "</div>";
            }
            
            ?>

        <!--  <img class="d-block w-100" src="img/sea.jpg" alt="First slide">-->



      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <?php
     } else {
         echo "<p>You must enter a keyword or choose a category</p>";
     }
    ?>


    <h2>Type a keyword or select catagory</h2>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


</body>
</html>
