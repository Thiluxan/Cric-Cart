<?php
    session_start();
    if(isset($_POST['remove'])){
        $product = $_POST['product_id'];
        $sql = "DELETE FROM products WHERE p_id = '$product'";
        if(mysqli_query($db,$sql)){
            header("location:manageProduct.php");
        }
        else{
            echo "<script>alert('An error occured while deleting')</script>";
            header("location:manageProduct.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
            crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/stylePagination.css">
    <style>
         form{
            display: flex;
            flex-wrap: wrap;
            margin-top: 50px;
            margin-left: 70px;            
        }
        form .item{
            background-color:thistle;
            margin-left: 120px;
            margin-bottom: 20px;
            align-items: center;
            text-align: center;
            box-shadow: beige;
            border-radius: 5px;
            margin-top: 40px;
        }
        .item button{
            background-color: red;
            color: white;
            padding: 14px;
            margin-bottom: 20px;
        }
        .item img{
            width: 300px;
            height: 300px;
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
    <div class="cart">
        <?php
            include('../configDB.php');
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
                $pid = $row['p_id'];
                echo '                
                <form action="manageProduct.php" method="POST">
                <div class="item">
                <img src=../'.$row['image'].' alt = "Product">
                <h2>'.$row['name'].'</h2>
                <h3>Price: $'.$row['price'].'</h3>
                <input type="hidden" name="product_id" value='.$pid.'>
                <button type="submit" name="remove">REMOVE
                </button>
                </div>
                </form>
                ';
            }
        ?>
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
            echo "<a href='manageProduct.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='manageProduct.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='manageProduct.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='manageProduct.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
      </div>  
    </div>   
  </div>  
    </section>
    <footer>
        <p>Cric Cart, Copyright &copy; 2020</p>
    </footer>
</body>
</html>