<?php
    include('configDB.php');
    session_start();

    $name = trim($_REQUEST['name']);
    $type = trim($_REQUEST['type']);
    $keyword = trim($_REQUEST['keyword']);
    $price = $_REQUEST['price'];
    $quantity = $_REQUEST['quantity'];
    $supplier = $_SESSION['email'];

    $target_dir = 'products/';
    $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }
  
  // Check file size
    if ($_FILES['fileToUpload']['size'] > 500000) {
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        header('location:supplier/addProduct.php?er=1');
    } 
    else {
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
            $imageDir = 'products/'. $_FILES['fileToUpload']['name'];

            $sql1 = "INSERT INTO products(name,type,keyword,price,quantity,supplier_email,image) VALUES ('$name','$type','$keyword','$price','$quantity','$supplier','$imageDir')";
            mysqli_query($db,$sql1);

            header('location:supplier/myProduct.php');
        } 
        else {
            header('location:supplier/addProduct.php?er=1');
        }
    }

?>