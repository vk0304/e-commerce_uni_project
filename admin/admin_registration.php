<?php
include("../includes/connect.php");
include("../functions/common_functions.php");

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
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>

  <!-- font awesome cdn -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">




</head>

<body>

<div class="container-fluid m-3">
    <h2 class="text-center mb-5 mt-5">Admin Registration</h2>
    <form action="" method="post" class="mt-5" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="username" class="form-label">User Name</label>
            <input type="text" id="username" name="username" required="required" placeholder="Enter your username" class="form-control">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="user_email" class="form-label">User Email</label>
            <input type="email" id="user_email" name="user_email" required="required" placeholder="Enter your Email" class="form-control">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" required="required" placeholder="Enter Password" class="form-control">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required="required" placeholder="Confirm Password" class="form-control">
        </div>
        <!-- admin image field -->
        <div class="form-outline mb-4 w-50 m-auto">
                    <label for="user_image" class="form-label">User Image</label>
                    <input type="file" name="user_image" id="user_image" class="form-control"
                         >
                </div>
        <div class="form-outline mb-4 w-50 m-auto" >
            <input type="submit" class="bg-info  py-2 px-3 border-0" name="admin_registration" value="Register">
            <p class="small">Have a Account? <a href="admin_login.php" class="link-danger fw-bold mt-2 pt-1">Login</a></p>
        </div>
    </form>
</div>
</body>
</html>




<!-- php code -->

<?php 

if(isset($_POST['admin_registration'])){
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $hash_password = password_hash($password ,PASSWORD_DEFAULT);

    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];



    // select query for checking using present or not

    $select_query = "select * from admin_table  where admin_name = '$username' or admin_email = '$user_email' ";
    $sql_execute1 = mysqli_query($con ,$select_query);
    $rows_count = mysqli_num_rows($sql_execute1);
    if($rows_count > 0 ){
        echo "<script>alert('User name or Email already exist ')</script>";
    }
    else if($password != $confirm_password){
        echo "<script>alert('Passwords do not match')</script>";
    }
    else{
        move_uploaded_file($user_image_temp , "./admin_images/$user_image");

        $insert_query = "insert into admin_table (admin_name , admin_email , admin_password , admin_image) values ('$username' , '$user_email' , '$hash_password' , '$user_image' )";
    
        $sql_execute = mysqli_query($con ,$insert_query );
    
        if($sql_execute){
            echo "<script>alert('Admin registered successfully')</script>";
            echo "<script>window.open('admin_login.php' , '_self' )</script>";

        }
        else{
            die(mysqli_error($con));
        }
    }


}

?>