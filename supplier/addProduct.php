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
    <title>Supplier</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
            crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        form{
            margin-top: -65px;
        }
        footer{
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>Cric Cart</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="supplier.php">Dashboard</a></li>
                    <li><a href="myProduct.php">My Products</a></li>
                    <li><a href="addProduct.php">Add Products</a></li>
                    <li><a href="../logout.php" id="login">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="form_wrapper">
            <div id="form_left">
                <img src="../images/cricaccessory.jpg" alt="Login icon">
            </div>
            <div id="form_right">
                <h1>Add Product</h1><br>
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
                <form action="../_addProduct.php" method="POST" enctype="multipart/form-data">
                    <div class="input_container">
                        <input placeholder="Name" type="text" name="name" id="field_name" class='input_field'>
                    </div><br>
                    <div class="input_container">
                        <input placeholder="Type" type="text" name="type"  class='input_field'>
                    </div><br>
                    <div class="input_container">
                        <input  placeholder="Key Word" type="text" name="keyword" class='input_field'>
                    </div><br>
                    <div class="input_container">
                        <input  placeholder="Price ($)" type="text" name="price" class='input_field'>
                    </div><br>
                    <div class="input_container">
                        <input  placeholder="Quantity" type="text" name="quantity" class='input_field'>
                    </div><br>
                    <div class="input_container">
                        <label for="profile"> Picture    </label>
                        <input type="file" name="fileToUpload" id="fileToUpload" required>
                    </div><br>
                    <input type="submit" value="Add Product" id='input_submit' class='input_field'>
                </form>
            </div>
    </div>
    <footer>
        <p>Cric Cart, Copyright &copy; 2020</p>
    </footer>
</body>
</html>