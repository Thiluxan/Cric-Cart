<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="_register.php" method="POST" enctype="multipart/form-data">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"><br>
        <label for="role">Role</label>
        <input type="radio" name="role" value="user">User 
        <input type="radio" name="role" value="supplier">Supplier
        <br>
        <label for="profile">Profile Picture</label>
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <?php 
            if(isset($_REQUEST['er'])){
                if($_REQUEST['er'] == 1){
                    echo "Some error with image you tried to upload";
                }
            }
        ?>
        <input type="submit" value="Register" name="submit">
    </form>
</body>
</html>