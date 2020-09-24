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
    <link rel="stylesheet" href="../css/styleAdmin.css">
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
  <section>
    <?php
        include("../configDB.php");
        $photo = $_SESSION['profile'];
        $supplier = $_SESSION['email'];
        $query = "SELECT COUNT(*) FROM products WHERE supplier_email = '$supplier'";     
        $rs_result = mysqli_query($db, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];    
      ?>
      <div class="icon">
        <img src= <?php echo "../".$photo; ?> alt="Login icon">
      </div>
      <div class="navigator">
        <div class="info">
            <p style="color: green; font-size:30px; font-weight:bold; margin-top:-25px;">Name: <?php echo $_SESSION['name']; ?><br><br>
            Email: <?php echo $_SESSION['email']; ?><br><br>
            Total No.of Products: <?php echo $total_records; ?></p>
        </div>
      </div>
  </section>
    <footer>
        <p>Cric Cart, Copyright &copy; 2020</p>
    </footer>
</body>
</html>