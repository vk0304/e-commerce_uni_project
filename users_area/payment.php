<?php
include("../includes/connect.php");
include("../functions/common_functions.php");

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <style>
        .no-underline {
            text-decoration: none;
        }
    </style>

</head>

<body>

<!-- php code to get user_id -->

<?php 

$user_ip = getIPAddress();
$get_user = "select * from uuser_table where user_ip = '$user_ip' ";
$sql_execute = mysqli_query($con ,$get_user);
$row_data = mysqli_fetch_array($sql_execute);
$user_id = $row_data['user_id'];




?>


    <div class="container">
        <h2 class="text-center text-info p-5 mt-5 mb-5">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6 text-center p-5 mt-5 mb-5">
                <a href="order_online.php?user_id=<?php echo $user_id ?>" class="no-underline">
                    <h2> Pay Online </h2>
                </a>
            </div>
            <div class="col-md-6 text-center p-5 mt-5 mb-5">
                <a href="order.php?user_id=<?php echo $user_id ?>" class="no-underline">
                    <h2> Pay by COD </h2>
                </a>
            </div>
        </div>
    </div>
</body>

</html>