<?php 
 
include '../../sqlconnection.php';
$dbConn = getConnection("quotes");

function displayAuthorInfo() {
    
    global $dbConn;
    
    $authorId = $_GET['authorId'];
   // echo $GET_['authorId'];

    $sql = "SELECT * FROM q_author WHERE authorId = $authorId";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //print_r($record);
    echo "<section class='flex'>";
   
    echo "<article class='left'> <p><span id='strong'>Date of Birth:</span> " . $record['dob'] . "<br>";
    echo "<span id='strong'> Date of Death:</span> " . $record['dod'] . "<br>";
    echo "<span id='strong'>Bio:</span> " . $record['bio'] . "<br>";
    echo "<span id='strong'>Country of Origin:</span> " . $record['country'] . "</p> </article>";

    echo "<article class='right'>";
    echo "<img src='" .$record['picture']."'>";
    echo "</article>";
    echo "</section>";

 
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Author</title>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

    </head>
    <body>
        
        <h2>Author info</h2>
        <br>
        <?=displayAuthorInfo()?>
        
        
    </body>
</html>