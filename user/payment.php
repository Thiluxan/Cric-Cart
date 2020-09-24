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
                    <li><a href="shop.php">Shop Now</a></li>
                    <li><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                    <li><a href="../logout.php" id="login">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section>
    <form method="post" action="https://sandbox.payhere.lk/pay/checkout">
        <div class="payment">   
        <input type="hidden" name="merchant_id" value="">   
        <input type="hidden" name="return_url" value="paymentSuccess.php">
        <input type="hidden" name="cancel_url" value="http://localhost/os/user/shop.php">
        <input type="hidden" name="notify_url" value="notify.php">  
        <br><br><h1>Purchase Details</h1>
        <input type="hidden" name="order_id" value="Item12345">
        <input type="hidden" name="items" value="CricCart Shopping"><br>
        Currency: <br>
        <input type="text" name="currency" value="USD"><br>
        Total Price: <br>
        <input type="text" name="amount" value="<?php echo $_SESSION['total']; ?>"> 
        </div>
        <div class="customer">
        <h1>Customer Details</h1>
        First Name: <br>
        <input type="text" name="first_name" required><br>
        Last Name: <br>
        <input type="text" name="last_name" required><br>
        Email: <br>
        <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>"><br>
        Phone Number: <br>
        <input type="text" name="phone" required><br>
        Address <br>
        <input type="text" name="address" required><br>
        City<br>
        <input type="text" name="city" required>
        <input type="hidden" name="country" value="Sri Lanka"><br><br> 
        </div>
        <input type="submit" value="Buy Now">   
    </form> 
    </section>
    <footer>
        <p>Cric Cart, Copyright &copy; 2020</p>
    </footer>
</body>
</html>