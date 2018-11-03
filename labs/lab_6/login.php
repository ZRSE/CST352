<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h1>Admin Login</h1>
        
        <form action="loginProcess.php" method="post">
            
            Username: <input type="text" name="username"/>
            Password: <input type="password" name="password"/><br>
            
            <input type="submit" value="Login!">
            
            
        </form>
        
        <?php
        if(isset($_SESSION['errorMessage'])) {
                echo $_SESSION['errorMessage'];
                unset($_SESSION['errorMessage']);
            }
        

        ?>
    </body>
</html>