<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
                    <li><a href="admin.php">Dashboard</a></li>
                    <li><a href="manageSupplier.php">Manage Suppliers</a></li>
                    <li><a href="manageProduct.php">Manage Products</a></li>
                    <li><a href="../logout.php" id="login">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
  <section>
      <?php
        $photo = $_SESSION['profile'];
      ?>
      <div class="icon">
        <img src= <?php echo "../".$photo; ?> alt="Login icon">
      </div>
      <div class="navigator">
        <a href="#">View Products</a><br><br><br><br><br><br>
        <a href="#">Delete Products</a>
      </div>
  </section>
  <footer>
        <p>Cric Cart, Copyright &copy; 2020</p>
    </footer>
</body>
</html>