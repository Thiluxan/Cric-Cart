<?php
    include('configDB.php');

    $name = trim($_REQUEST['name']);
    $email = trim($_REQUEST['email']);
    $password = md5($_REQUEST['password']);
    $role = $_REQUEST['role'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    
    if($count != 0){
        header('location:admin/addSupplier.php?er=1');
    }

    $target_dir = 'uploads/';
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
        header('location:admin/addSupplier.php?er=1');
    } 
    else {
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
            $imageDir = 'uploads/'. $_FILES['fileToUpload']['name'];

            $sql1 = "INSERT INTO users(email,password,name,role,profile) VALUES ('$email','$password','$name','$role','$imageDir')";
            mysqli_query($db,$sql1);

            header('location:admin/admin.php');
        } 
        else {
            header('location:admin/addSupplier.php?er=1');
        }
    }

?>