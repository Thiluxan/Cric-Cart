<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CricCart</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stylePagination.css">
    <style>
        .cart{
            display: flex;
            flex-wrap: wrap;
            margin-top: 50px;
            margin-left: 70px;
        }
        .item{
            background-color:thistle;
            margin-left: 120px;
            margin-bottom: 20px;
            align-items: center;
            text-align: center;
            box-shadow: beige;
            border-radius: 5px;
        }
        .item button{
            background-color: green;
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
                    <li class="current"><a href="index.php">Home</a></li>
                    <li><a href="explore.php">Explore</a></li>
                    <li><a href="login.php" id="login">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section>
    <div class="cart">
        <?php
            include('configDB.php');
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
                echo '<div class="item">
                <img src='.$row['image'].' alt = "Product">
                <h2>'.$row['name'].'</h2>
                <h3>$'.$row['price'].'</h3></div>';
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
            echo "<a href='explore.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='explore.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='explore.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='explore.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
      </div>  
  
  
      <div class="inline">   
      <input id="page" type="number" min="1" max="<?php echo $total_pages?>"   
      placeholder="<?php echo $page."/".$total_pages; ?>" required>   
      <button onClick="go2Page();">Go</button>   
     </div>    
    </div>   
  </div>  
  <script>   
    function go2Page()   
    {   
        var page = document.getElementById("page").value;   
        page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
        window.location.href = 'explore.php?page='+page;   
    }   
  </script>  
    </section>
    <footer>
        <p>Cric Cart, Copyright &copy; 2020</p>
    </footer>
</body>
</html>