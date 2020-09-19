<?php
    session_start();
    include('../configDB.php');
    
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
    <div class="suppliers">
        <table>
            <thead>
                <th>Name</th>
                <th>Email</th>
            </thead>
            <?php
                $sql = "SELECT * FROM users WHERE role = supplier";
                $result = mysqli_query($db,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr> 
                    <td>".$row['name']."</td>".
                    "<td>".$row['email']."</td>
                    </tr>";
                }
            ?>
        </table>
    </div>
  </section>
  <footer>
        <p>Cric Cart, Copyright &copy; 2020</p>
    </footer>
</body>
</html>