<?php
    session_start();
    include('../configDB.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
            crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        section .price{
            float: right;
           position: absolute;
           top: 33%;
           left: 70%;
        }
        section .products{
            margin-left: 200px;
        }
        .card img{
            width: 200px;
            height: 200px;
        }
        .card-content{
            margin-left: 100px;
            margin-top: 100px;
        }
        .card-content button{
            background-color: red;
            color: white;
            text-transform: uppercase;
            padding: 15px;
        }
        .price button{
            background-color: green;
            color: white;
            text-transform: uppercase;
            padding: 15px;
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
                    <li><a href="shop.php">Shop Now</a></li>
                    <li><a href="cart.php">Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                    <li><a href="../logout.php" id="login">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <h1 style="margin-left: 200px; margin-top:40px;">My Cart</h1>
    <hr style="margin-left: 200px;">
    <section>
    <article class="products">
        <br>
        <br><br>
        <?php
            $total = 0;
            if(isset($_SESSION['cart'])){
                $product_id = array_column($_SESSION['cart'],'product_id');
                $sql = "SELECT * FROM products";
                $result = mysqli_query($db,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    foreach($product_id as $id){
                        if($row['p_id']==$id){
                            echo '
                            <div class="card">
                                <table>
                                    <tr>
                                        <td>
                                        <img src=../'.$row['image'].' alt="Product">
                                        </td>
                                        <td>
                                            <div class="card-content">
                                                <form action="cart.php?action=remove&id="'.$row['p_id']. 'method="post">
                                                <h2>'.$row['name'].'</h2>
                                                <h3>Price: $'.$row['price'].'</h3>
                                                <button type="submit" name="remove">Remove</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </table>           
                            </div>
                            ';
                            $total = $total + (int)$row['price'];
                            echo "<br><br>";
                        }
                    }
                }       
            }else{
                echo "<h1>No Items Selected</h1>";
            }                
        ?>
    </article>
    <aside class="price">
        <h1>Price Details</h1> <hr>
        <?php
            if(isset($_SESSION['cart'])){
                $count = count($_SESSION['cart']);
            }
            else{
                $count = 0;
            }
        ?>
        <table>
            <tr>
                <td><h1>Price <?php echo $count; ?> items</h1></td>
                <td><h1>$ <?php echo $total; ?></h1></td>
            </tr>
            <tr>
                <td><h1>Delivery Charges</h1></td>
                <td><h1 style="color: green;">FREE</h1></td>
            </tr>
            <tr>
                <td><h1>Total</h1></td>
                <td><h1>$<?php echo $total; ?></h1></td>
            </tr>
        </table>
        <button>Check Out</button>
    </aside>
    </section>
    <footer>
        <p>Cric Cart, Copyright &copy; 2020</p>
    </footer>
</body>
</html>