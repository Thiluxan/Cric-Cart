<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier</title>
</head>
<body>
<form action="_register.php" method="POST" enctype="multipart/form-data">
        <?php 
            if(isset($_REQUEST['er'])){
                if($_REQUEST['er'] == 1){
                    echo "Some error with image you tried to upload<br>";
                }
                else if ($_REQUEST['er'] == 2){
                    echo "Already user exists with same email address<br>";
                }
            }
        ?>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"><br>
        <input type="hidden" name="role" value="supplier">
        <label for="profile">Profile Picture</label>
        <input type="file" name="fileToUpload" id="fileToUpload" required><br>
        <input type="submit" value="Register" name="submit">
    </form>
</body>
</html>