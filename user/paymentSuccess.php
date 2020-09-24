<?php
    session_start();
    if($_SESSION['email'] == null){
        header("location:http://localhost/os/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="../css/stylePayment.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
            crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
</head>
<body>
<header>
        <div class="container">
            <div id="branding">
                <h1>Cric Cart</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="../logout.php" id="login">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section>
        <div class="success">
            <h1>Your payment is successful and order is placed</h1>
            <a href="../logout.php" id="login">Logout</a>
        </div>
    </section>
    <footer>
        <p>Cric Cart, Copyright &copy; 2020</p>
    </footer>
</body>
</html>