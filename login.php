<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
            crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>Cric Cart</h1>
            </div>
            <nav>
                <ul>
                    <li class="current"><a href="index.php">Home</a></li>
                    <li><a href="explore.php">Explore</a></li>
                    <li><a href="login.php" id="login">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="form_wrapper">
            <div id="form_left">
                <img src="images/login.png" alt="Login icon">
            </div>
            <div id="form_right">
                <h1>Member Login</h1>
                <?php
                    include ("configDB.php");
                    if(isset($_REQUEST['er'])){
                        if($_REQUEST['er'] == 1){
                            echo '<span id="error" style="color:red;">Incorrect Details</span>';
                        }
                    }
                ?>
                <form action="_login.php" method="post">
                    <div class="input_container">
                        <i class="fas fa-envelope"></i>
                        <input placeholder="Email" type="email" name="email" id="field_email" class='input_field'>
                    </div><br>
                    <div class="input_container">
                        <i class="fas fa-lock"></i>
                        <input  placeholder="Password" type="password" name="password" id="field_password" class='input_field'>
                    </div><br>
                    <input type="submit" value="Login" id='input_submit' class='input_field'>
                </form>
                <span id='create_account'>
                    <a href="registration.php">Create your account ➡ </a>
                </span>
            </div>
    </div>
    <footer>
        <p>Cric Cart, Copyright &copy; 2020</p>
    </footer>
</body>
</html>