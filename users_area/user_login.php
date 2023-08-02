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

    <style>
        body{
            overflow-x:hidden ;
        }
    </style>

</head>

<body>
    <div class="container-fluid my-3"></div>
    <h2 class="text-center">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center mt-5 mb-4">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- user name field -->
                <div class="form-outline mb-4">
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" name="user_username" id="user_username" class="form-control"
                        placeholder="Enter your username" required="required" autocomplete="off">
                </div>

       
                <!-- user Password field -->
                <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" name="user_password" id="user_password" class="form-control"
                        placeholder="Enter your password" required autocomplete="off">
                </div>

       
                <div class="mt-4 pt-2">
                    <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ? <a href="user_registration.php" class="text-danger"> Regisster</a></p>
                </div>

                

            </form>
        </div>
    </div>
</body>

</html>


<?php
if(isset($_POST['user_login'])){
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    $user_ip = getIPAddress();

    $select_query = "select * from uuser_table where username = '$user_username'";
    $sql_execute = mysqli_query($con ,$select_query);

    $row_count = mysqli_num_rows($sql_execute);
    $row_data = mysqli_fetch_assoc($sql_execute);




    // cart item


    $select_query_cart = "select * from cart_details where ip_address = '$user_ip'";
    $sql_execute_cart = mysqli_query($con ,$select_query_cart);
    $row_count_cart = mysqli_num_rows($sql_execute_cart);

    if($row_count >0){
        $_SESSION['username'] = $user_username;
        if(password_verify($user_password , $row_data['user_password'])){
            if($row_count == 1 and $row_count_cart == 0){
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Successful ')</script>";
                echo "<script>window.open('profile.php' , '_self' )</script>";
            }else{
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Successful ')</script>";
                echo "<script>window.open('payment.php' , '_self' )</script>";
            }

        }else
        echo "<script>alert('Invalid Credentials ')</script>";

    }
    else{
        echo "<script>alert('Invalid Credentials ')</script>";

    }
}


?>