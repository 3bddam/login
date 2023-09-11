<?php
session_start();
if(!isset($_SESSION["user"])){
    header("Location:index.php");
}
if(isset($_GET["logout"])) {
    session_destroy();
    header("Location:index.php");
}

$user= $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Page</title>
</head>
<body>
    <h1>Welcome <?php echo $user?></h1>
    <a href="?logout">LogOut</a>
</body>
</html>