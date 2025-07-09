<?php
$success = 0;
$user = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "Select * from `registration` where username='$username'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);

        if ($num > 0) {
            $user = 1;
        } 
    
        else {
            $sql = "insert into `registration` (username,password) values('$username','$password')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $success = 1;
                header('location:login.php');
            } else {
                die(mysqli_error($con));
            }
        }
    }
    
}
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <h1 class="text-center mb-4">Sign up Page</h1>
    <div class="container" style="max-width: 400px;">
        <form action="signup.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Name</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username"
                    required autofocus />
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter your password" required />
            </div>

            <button type="submit" class="btn btn-primary w-100">Sign up now</button>
        </form>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>