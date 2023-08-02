<?php
include("../includes/connect.php");
include("../functions/common_functions.php");
@session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <!-- font awesome cdn -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">




</head>

<body>

    <div class="container-fluid m-3">
        <h2 class="text-center mb-5 mt-5">Admin Login</h2>
        <form action="" method="post" class="mt-5">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="admin_name" class="form-label">User Name</label>
                <input type="text" id="admin_name" name="admin_name" required="required" placeholder="Enter your username"
                    class="form-control">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" required="required" placeholder="Enter Password"
                    class="form-control">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" class="bg-info  py-2 px-3 border-0" name="admin_login" value="Login">
                <p class="small">Don't have a Account? <a href="admin_registration.php"
                        class="link-danger fw-bold mt-2 pt-1">Register</a></p>
            </div>
        </form>
    </div>
</body>

</html>



<?php
if (isset($_POST['admin_login'])) {
    $admin_name = $_POST['admin_name'];
    $password = $_POST['password'];

    $select_query = "select * from  admin_table where admin_name = '$admin_name'";
    $sql_execute = mysqli_query($con, $select_query);

    $row_count = mysqli_num_rows($sql_execute);
    $row_data = mysqli_fetch_assoc($sql_execute);

    if ($row_count > 0) {
        $_SESSION['admin_name'] = $admin_name;
        if (password_verify($password, $row_data['admin_password'])) {
            $_SESSION['admin_name'] = $admin_name;
            echo "<script>alert('Login Successful ')</script>";
            echo "<script>window.open('index.php' , '_self' )</script>";
        } else
            echo "<script>alert('Invalid Credentials ')</script>";

    } else {
        echo "<script>alert('Invalid Credentials ')</script>";

    }
}
