<?php

function getConnection($dbname) {
    
    global $dbConn;
    //Connect to database
    $host = "localhost";   //this is cloud 9
   // $dbname = "quotes";
    $username = "root";
    $password = "";
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
     $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
     return $dbConn;
}
p?>