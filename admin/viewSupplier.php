<?php
    session_start();
    if($_SESSION['email'] == null){
        header("location:http://localhost/os/login.php");
    }
    include('../configDB.php');
    if(isset($_POST['remove'])){
        $supplier = $_POST['removeSupplier'];
        $sql = "DELETE FROM users WHERE email = '$supplier'";
        if(mysqli_query($db,$sql)){
            header("location:viewSupplier.php");
        }
        else{
            echo "<script>alert('An error occured while deleting')</script>";
            header("location:viewSupplier.php");
        }
    }
    
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
    <style>
        table{
            padding: 5px;
            width: 1100px;
            font-size: 22px;
            margin-left: 200px;
            text-align: center;
        }
        td{
            padding: 30px;
        }
        th, td{
            border: 2px solid black;
        }
        table img{
            width: 50px;
            height: 50px;
        }
        table button{
            background-color: red;
            color: white;
            padding: 10px;
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
            <th></th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </thead>
            <?php
                $sql = "SELECT * FROM users WHERE role = 'supplier'";
                $result = mysqli_query($db,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    $email = $row['email'];
                    $profileImage = "../".$row['profile'];
                    echo '<tr> ';?>
                    <?php
                        $profileImage = "../".$row['profile'];
                    ?>
                    <td><img src=<?php echo $profileImage; ?> alt="" width="200" height="200"></td>
                    <?php
                    echo '
                    <td>'.$row["name"].'</td>'.
                    '<td>'.$row["email"].'</td>
                    <td>
                    <form action="viewSupplier.php" method="POST">
                    <input type="hidden" value='.$email.' name="removeSupplier">
                    <button type="submit" name="remove" value="REMOVE">REMOVE</button>
                    </form>
                    </td>
                    </tr>';
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