<?php

 
include '../../sqlconnection.php';
$dbConn = getConnection("quotes");
 
function displayAllQuotes() {
    global $dbConn;
    $rand = rand(0,26);
    
    $sql = "SELECT * FROM q_quotes NATURAL JOIN q_author LIMIT " . $rand .",1";
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    //$records = $statement->fetch(); //Only one record
    $records = $statement->fetchAll(PDO::FETCH_ASSOC); //All records
    //print_r($records);
    
    foreach($records as $record) {
    echo "\"".$record['quote']."\"" . "<br>";
    echo "<a target='authorInfo' href='authorInfo.php?authorId=".$record['authorId']."'>";
    echo $record['firstName'] ." ". $record['lastName'];
    echo "</a>";
    }
}




?>


<!DOCTYPE html>
<html>
    <head>
        <title>LAB 5: Random Famous Quote</title>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    </head>
    <body>
        <section class="contentContainer">

        <h1>Random Famous Quote</h1>
        
            <?= displayAllQuotes() ?>
       
        
        <iframe id="authorInfo" name="authorInfo" frameborder="0"></iframe>
     </section>
    </body>
</html>