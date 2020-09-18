<?php
    include ("configDB.php");
    if(isset($_REQUEST['er'])){
        if($_REQUEST['er'] == 1){
            echo "Incorrect Details";
        }
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="_login.php" method="post">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required><br>
        <input type="submit" name="submit" value="Login">
    </form>
    <br>
    Don't Have an account 
    <a href="registration.php">Register</a><br>
    (Not for Suppliers)
</body>
</html>