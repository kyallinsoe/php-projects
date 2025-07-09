<?php
$login = 0;
$invalid = 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "Select * from `registration` where username='$username' and password='$password' ";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);

        if ($num > 0) {
            $login = 1;
            session_start();
            $_SESSION['username'] = $username;
            header('location:home.php');
        } else {
            $invalid = 1;
        }

    }
}

?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lgin form</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>

<body>
    <?php
    if ($login) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success</strong> login successfully
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    ?>

    <h1 class="text-center rainbow">Login Page</h1>
    <div class="container-fluid mt-5">
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail">Name</label>
                <input type="username" class="form-control" placeholder="Enter your username" name="username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password">
            </div>

            <button type="submit" class="btn btn-primary w-100"> LOGIN NOW</button>
        </form>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>