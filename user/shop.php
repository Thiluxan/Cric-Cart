<?php
    session_start();
    if($_SESSION['email'] == null){
        header("location:http://localhost/os/login.php");
    }
    include('../configDB.php');
    $status="";
    if (isset($_POST['p_id']) && $_POST['p_id']!=""){
        $p_id = $_POST['p_id'];
        $sql = "SELECT * FROM products WHERE p_id = '$p_id'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_assoc($result);
        $p_id = $row['p_id'];
        $name = $row['name'];
        $price = $row['price'];
        $image = $row['image'];
        $cartArray = array(
        $p_id=>array(
        'p_id'=>$p_id,
        'name'=>$name,
        'price'=>$price,
        'quantity'=>1,
        'image'=>$image)
        );
        
        if(empty($_SESSION["shopping_cart"])) {
            $_SESSION["shopping_cart"] = $cartArray;
            $status = "<div class='box'>Product is added to your cart!</div>";
        }else{
            $array_keys = array_keys($_SESSION["shopping_cart"]);
            if(in_array($p_id,$array_keys)) {
                $status = "<div class='box' style='color:red;'>
                Product is already added to your cart!</div>"; 
            } 
            else {
                $_SESSION["shopping_cart"] = array_merge(
                $_SESSION["shopping_cart"],
                $cartArray
                );
                $status = "<div class='box'>Product is added to your cart!</div>";
            }
        
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
            crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <link rel="stylesheet" href="../css/styleCart.css">
    <link rel="stylesheet" href="../css/stylePagination.css">
</head>
<body>
<?php
    if(!empty($_SESSION["shopping_cart"])) {
    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
    }
    else{
        $cart_count = 0;
    }
?>
<header>
        <div class="container">
            <div id="branding">
                <h1>Cric Cart</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="shop.php">Shop Now</a></li>
                    <li><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <?php echo $cart_count; ?></a></li>
                    <li><a href="../logout.php" id="login">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
<?php
    $per_page_record = 6;         
    if (isset($_GET["page"])) {    
        $page  = $_GET["page"];    
    }    
    else {    
    $page=1;    
    }    

    $start_from = ($page-1) * $per_page_record;    
    $sql = "SELECT * FROM products LIMIT $start_from, $per_page_record";
        $result = mysqli_query($db,$sql);
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='product_wrapper'>
            <form method='post' action=''>
            <input type='hidden' name='p_id' value=".$row['p_id']." />
            <div class='image'><img src='../".$row['image']."' /></div>
            <div class='name'>".$row['name']."</div>
            <div class='price'>$".$row['price']."</div>
            <button type='submit' class='buy'>Add to Cart<i class='fa fa-shopping-cart' aria-hidden='true'></i> </button>
            </form>
            </div>";
        }
?>
 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
<div class="pagination">    
      <?php  
        $query = "SELECT COUNT(*) FROM products";     
        $rs_result = mysqli_query($db, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='shop.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='shop.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='shop.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='shop.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
</div>  
    <footer>
        <p>Cric Cart, Copyright &copy; 2020</p>
    </footer>
</body>
</html>