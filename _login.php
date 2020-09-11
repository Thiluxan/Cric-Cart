<?php
    include('configDB.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = :un AND password = :pw";
    
    $stmt = $conn->prepare($sql);


    $stmt->bindParam(':un',$email);
    $stmt->bindParam(':pw',$password);

    $stmt->execute();

    if($stmt->rowCount() == 1){
        echo "user found";

    }
    else{
        header("location:login.php?er=1");
    }

?>