<?php
session_start();
if(isset($_SESSION["user"])){
    header("Location:dashboard.php");
}
if(isset($_POST["submit"])){
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $con = mysqli_connect("localhost","root","","project");
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
   $res= mysqli_query($con, $sql);
    $rows =mysqli_num_rows($res);
    if($rows === 1) {
        $_SESSION["user"]= $user;
        header("Location:dashboard.php");
    }
    $error = true;
    mysqli_close($con);
 
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">

</head>

<body>

    <div class="d-flex align-items-center min-vh-100 ">
        <div class="container d-flex justify-content-center" >
            <form method="post" class="bg-light px-4 py-4 rounded-2 col-md-4" style="opacity:0.75;">
        <h1 class="text-center mb-4">Login</h1>
            <div calss = "mb-3">
                <label for="user" class="form-label"> username</label>
                <input type="email" id="user" name="user" class="form-control" required>
        </div>
            <div calss = "mb-3">
                <label for="pass" class="form-label"> password</label>
                <input type="password" id="pass" name="pass" class="form-control" required>
        </div>
        <div calss = "mb-3">
            <a href= "reg.php" style="font-size:15px; color:blue"class="text-decoration-none">do you have an account?</a>
        </div>
        <button type="submit" name="submit" class="btn btn-success w-75 d-block m-auto"> Login</button>
    </form>
        </div>

            <div class="modal" id="modal1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-danger bd-gradient">
                        <div class="modal-header">
                            <button class="btn btn-close" data-bs-dismiss="modal"></button>
                            <h5 class="position-absolute mx-5 mt-2 ">An error has occurred, please try again</h5>
                         </div>
                            <div class="modal-body ">
                            <h4 class="text-center p-3">The email or the password you’ve entered is incorrect please try again</h4>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-dark w-75 d-block m-auto"  data-bs-dismiss="modal">
                                    Close
                                </button>
                    </div>
                         
                    </div>
                </div>
            </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<?php

if(isset($error)){
    echo"
    <script>
    var x =document.getElementById('modal1');
    new bootstrap.Modal(x).show();
    </script>
    ";
}



?>
</body>
</html>