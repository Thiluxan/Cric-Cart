<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                <h1>Member Registration</h1><br>
                <?php 
                    if(isset($_REQUEST['er'])){
                        if($_REQUEST['er'] == 1){
                            echo '<span id="error">Some error with image you tried to upload</span><br>';
                        }
                        else if ($_REQUEST['er'] == 2){
                            echo '<span id="error">Already user exists with same email address</span><br';
                        }
                    }
                ?>
                <form action="_register.php" method="POST" enctype="multipart/form-data">
                    <div class="input_container">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input placeholder="Name" type="text" name="name" id="field_name" class='input_field'>
                    </div><br>
                    <div class="input_container">
                        <i class="fas fa-envelope"></i>
                        <input placeholder="Email" type="email" name="email" id="field_email" class='input_field'>
                    </div><br>
                    <div class="input_container">
                        <i class="fas fa-lock"></i>
                        <input  placeholder="Password" type="password" name="password" id="field_password" class='input_field'>
                    </div><br>
                    <div class="input_container">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <label for="role">Role  </label>
                        <input type="radio" name="role" value="user" required>User 
                        <input type="radio" name="role" value="admin" required>Admin
                    </div><br>
                    <div class="input_container">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <label for="profile">Profile Picture    </label>
                        <input type="file" name="fileToUpload" id="fileToUpload" required>
                    </div><br>
                    <input type="submit" value="Register" id='input_submit' class='input_field'>
                </form>
            </div>
    </div>
    <footer>
        <p>Cric Cart, Copyright &copy; 2020</p>
    </footer>
</body>
</html>