<?php
//Connect to database
$host = "localhost";   //this is cloud 9
$dbname = "quotes";
$username = "root";
$password = "";

$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

 $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
 
function displayAllQuotes() {
    global $dbConn;
    $rand = rand(0,27);
    
    $sql = "SELECT * FROM q_quotes ORDER BY LENGTH(quote) LIMIT " . $rand .",1";
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    //$records = $statement->fetch(); //Only one record
    $records = $statement->fetchAll(PDO::FETCH_ASSOC); //All records
    //print_r($records);
    
    foreach($records as $record) {
    echo $record['quote'] . "<br>";
    }
}




?>


<!DOCTYPE html>
<html>
    <head>
        <title>LAB 5: Random Famous Quote</title>
    </head>
    <body>
        <h1>Random Famous Quote</h1>
        
        
        <?= displayAllQuotes() ?>
        
        <!--
        Find out how many records there are in the quotes table
        -->
        
    </body>
</html>