<?php
    include('configDB.php');

    $name = trim($_REQUEST['name']);
    $email = trim($_REQUEST['email']);
    $password = md5($_REQUEST['password']);
    $role = $_REQUEST['role'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }
  
  // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        header("location:registration.php?er=1");
    } 
    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO users(email,password,name,role,profile) VALUES (:v1,:v2,:v3,:v4,:v5)";

            $imageDir = "uploads/". $_FILES["fileToUpload"]["name"];

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':v1',$email);
            $stmt->bindParam(':v2',$password);
            $stmt->bindParam(':v3',$name);
            $stmt->bindParam(':v4',$role);
            $stmt->bindParam(':v5',$imageDir);

            $stmt->execute();
        } 
        else {
            header("location:registration.php?er=1");
        }
    }

?>