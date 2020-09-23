<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["p_id"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      } 
}
}
 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['p_id'] === $_POST["p_id"]){
        $value['quantity'] = $_POST["quantity"];
        break; 
    }
}
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
            crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <link rel="stylesheet" href="../css/styleCart.css">
    <style>
      footer{
        margin-top: 200px;
      }
      section{
        margin-top: 100px;
        margin-left: 350px;
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
                    <li><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                    <li><a href="../logout.php" id="login">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section>
  <div class="cart">
    <?php
      if(isset($_SESSION["shopping_cart"])){
          $total_price = 0;
      ?> 
    <table class="table" style="width: 1200px; margin-left:-150px;">
      <tbody>
      <tr style="text-align: left;">
      <td></td>
      <th>ITEM NAME</th>
      <th>QUANTITY</th>
      <th>UNIT PRICE</th>
      <th>ITEMS TOTAL</th>
      </tr> 
      <?php 
        foreach ($_SESSION["shopping_cart"] as $product){
      ?>
    <tr>
    <td>
        <?php $imageView = "../".$product['image'];?>
        <img src=<?php echo $imageView; ?> alt="" width="100" height="100">
    </td>
    <td><?php echo $product["name"]; ?><br />
      <form method='post' action=''>
        <input type='hidden' name='p_id' value="<?php echo $product["p_id"]; ?>" />
        <input type='hidden' name='action' value="remove" /><br>
        <button type='submit' class='remove' style="background-color: red; color:white; padding:10px;">Remove Item</button>
      </form>
    </td>
    <td>
      <form method='post' action=''>
        <input type='hidden' name='p_id' value="<?php echo $product["p_id"]; ?>" />
        <input type='hidden' name='action' value="change" />
        <select name='quantity' class='quantity' onChange="this.form.submit()">
          <option <?php if($product["quantity"]==1) echo "selected";?>
          value="1">1</option>
          <option <?php if($product["quantity"]==2) echo "selected";?>
          value="2">2</option>
          <option <?php if($product["quantity"]==3) echo "selected";?>
          value="3">3</option>
          <option <?php if($product["quantity"]==4) echo "selected";?>
          value="4">4</option>
          <option <?php if($product["quantity"]==5) echo "selected";?>
          value="5">5</option>
        </select>
      </form>
    </td>
    <td><?php echo "$".$product["price"]; ?></td>
    <td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
    </tr>
      <?php
        $total_price += ($product["price"]*$product["quantity"]);
      }
      ?>
    <tr>
    <td colspan="5">
      <strong>TOTAL: <?php echo "$".$total_price; ?></strong>
    </td>
    </tr>
    </tbody>
    </table> 
    <?php
      }
      else{
      echo "<h3>Your cart is empty!</h3>";
      }
    ?>
  </div>
  
  <div style="clear:both;"></div>
  
  <div class="message_box" style="margin:10px 0px;">
  <?php echo $status; ?>
  </div>
    </section>
  <footer>
        <p>Cric Cart, Copyright &copy; 2020</p>
    </footer>
  </body>
</html>