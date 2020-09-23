<?php
    session_start();
    include("../configDB.php");
    if(isset($_POST['p_id']) && $_POST['p_id']!=""){
        $p_id = $_POST['p_id'];
        $sql = "DELETE FROM products WHERE p_id = '$p_id'";
        mysqli_query($db,$sql);
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
    <link rel="stylesheet" href="../css/styleCart.css">
    <link rel="stylesheet" href="../css/stylePagination.css">
    <style>
        .product_wrapper .buy{
            background-color: red;
            color: white;
            padding: 8px 40px;
            margin-top: 10px;
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
                     <button type='submit' class='buy'>Remove </button>
                     </form>
                     </div>";
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