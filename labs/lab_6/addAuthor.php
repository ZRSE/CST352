<?php
    if (isset($_GET['addAuthorForm'])) {
        
        include '../../sqlconnection.php';
        $dbConn = getConnection("quotes");
        
        $firstName = $_GET['firstName'];
        $lastName = $_GET['lastName'];
        $gender = $_GET['gender'];
        $dob = $_GET['dob'];
        $dod = $_GET['dod'];
        $country = $_GET['country'];
        $profession = $_GET['profession'];
        $imageUrl = $_GET['imageUrl'];
        $bio = $_GET['bio'];
        
        $sql = "INSERT INTO q_author (firstName, lastName, gender, dob, dod, country, profession, picture, bio)
                VALUES ( :fn, :lastName, :gender, :dob, :dod, :country, :profession, :picture, :bio);";
        
        $namedParams = array();
        $namedParams[':fn'] = $firstName;
        $namedParams[':lastName'] = $lastName;
        $namedParams[':gender'] = $gender;
        $namedParams[':dob'] = $dob;
        $namedParams[':dod'] = $dod;
        $namedParams[':country'] = $country;
        $namedParams[':profession'] = $profession;
        $namedParams[':picture'] = $imageUrl;
        $namedParams[':bio'] = $bio;

        $statement = $dbConn->prepare($sql);
        $statement->execute($namedParams);    //inserts record
        
        echo "Author added";
        
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>ADMIN: new author</title>
    </head>
    <body>
        <h1>Adding author</h1>
        
        <form>
            First name:<input type="text" name="firstName"/><br/>
            Last name:<input type="text" name="lastName"/><br/>
            Gender:
            <input type="radio" name="gender" value="M" id="genderMale"/>
                <label for="genderMale">Male</label>
            <input type="radio" name="gender" value="F" id="genderFemale"/>
                <label for="genderFemale">Female</label><br>
                
            Day of birth: <input type="text" name="dob"/> <br/>
            Day of death: <input type="text" name="dod"/> <br/>
            Country: <input type="text" name="country"/> <br/>
            Profession: <input type="text" name="profession"/>
            
            Image url: <input type="text" name="imageUrl"/> <br />
            Bio: <input type="textarea" name="bio" cols="50" row="5"/> <br/>
            
            <input type="submit" name="addAuthorForm" value="Add Author"/>
            
        </form>
    </body>
</html>