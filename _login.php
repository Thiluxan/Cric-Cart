<?php
    session_start();
    include('configDB.php');

    $email = mysqli_real_escape_string($db,$_POST['email']);
    $password = mysqli_real_escape_string($db,md5($_POST['password']));

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    $role = $row['role'];

    if($count == 1){
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['role'] = $role;
        $_SESSION['profile'] = $row['profile'];
        $_SESSION['name'] = $row['name'];
        if(strcmp($role,'user') == 0){
            $link = "location:http://localhost/onlineshop/user/shop.php";
            header($link);
        }
        else if(strcmp($role,'admin') == 0){
            $link = "location:http://localhost/onlineshop/admin/admin.php";
            header($link);
        }
        else if(strcmp($role,'supplier') == 0){
            $link = "location:http://localhost/onlineshop/supplier/supplier.php";
            header($link);
        }
        
    }
    else{
        header("location:login.php?er=1");
    }

?>