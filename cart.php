<?php
include("includes/connect.php");
include("functions/common_functions.php");
session_start();

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-shopping</title>

  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <!-- jquery cdn -->
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>

  <!-- font awesome cdn -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">



  <!-- css link -->
  <link rel="stylesheet" href="style.css">

  <style>
    .cart_img {
      width: 100px;
      height: 100px;
      object-fit: contain;
    }
  </style>

</head>

<body>
  <!-- navbar -->
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Gadda Electronics</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all_products.php">Products</a>
            </li>
            <?php
            if (isset($_SESSION['username'])) {
              echo "<li class='nav-item'>
              <a class='nav-link' href='./users_area/profile.php'>My Account</a>
            </li>";
            } else {
              echo "<li class='nav-item'>
              <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
            </li>";
            }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                  <?php echo cart_item_number(); ?>
                </sup></a>
            </li>


        </div>
      </div>
    </nav>

    <!-- second navbar -->

    <div class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
        <?php

        // welcome guest 
        if (!isset($_SESSION['username'])) {
          echo "<li class='nav-item'>
                  <a class='nav-link' c href='#'>Welcome Guest</a>
                </li>";
        } else {
          echo "<li class='nav-item'>
                  <a class='nav-link' Welcome Guest href='#'>Welcome ".$_SESSION['username']."</a>
                </li>";
        }

        // login/logout
        if (!isset($_SESSION['username'])) {
          echo "<li class='nav-item'>
                  <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                </li>";
        } else {
          echo "<li class='nav-item'>
                  <a class='nav-link' href='./users_area/user_logout.php'>Logout</a>
                </li>";
        }
        ?>
      </ul>
    </div>


    <!-- heading -->
    <div class="bg-light">
      <h3 class="text-center">Gadda Electronics</h3>
      <p class="text-center">Every thing you want , You will find here</p>
    </div>


    <!-- cart table -->
    <div class="container">
      <div class="row">
        <form action="" method="post">
          <table class='table table-bordered text-center'>


            <!-- pho code to display dynamic data -->

            <?php
            $get_ip_address = getIPAddress();
            $total_price = 0;
            $cart_query = "select * from cart_details where ip_address = '$get_ip_address'";
            $result_query = mysqli_query($con, $cart_query);
            $result_count = mysqli_num_rows($result_query);

            if ($result_count > 0) {
              echo "<thead>
                  <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                  </tr>
                </thead>
                <tbody>";


              while ($row = mysqli_fetch_array($result_query)) {
                $product_id = $row['product_id'];
                $select_products = "select * from products where product_id = '$product_id'";
                $result_products = mysqli_query($con, $select_products);
                while ($row_product_price = mysqli_fetch_array($result_products)) {
                  $product_price = array($row_product_price['product_price']);
                  $price_table = $row_product_price['product_price'];
                  $product_title = $row_product_price['product_title'];
                  $product_image1 = $row_product_price['product_image1'];
                  $product_values = array_sum($product_price);
                  $total_price += $product_values;






                  ?>

                  <tr>
                    <td>
                      <?php echo $product_title ?>
                    </td>
                    <td><img src='./admin/product_images/<?php echo $product_image1 ?>' alt='<?php echo $product_title ?>'
                        class='cart_img'></td>
                    <td><input type='text' name='qty' class='form-input w-50'></td>
                    <?php
                    $get_ip_address = getIPAddress();
                    if (isset($_POST['update_cart'])) {
                      $quantities = $_POST['qty'];


                      // Check if the connection was successful
                      if (!$con) {
                        die("Connection failed: " . mysqli_connect_error());
                      }

                      // Update the cart details
                      $update_cart = "UPDATE cart_details SET quantity = $quantities WHERE ip_address = '$get_ip_address'";
                      $result_update_query = mysqli_query($con, $update_cart);

                      // Check if the query was successful
                      if ($result_update_query) {
                        $total_price = $total_price * $quantities;
                        // Rest of your code...
                      } else {
                        echo "Error updating cart: " . mysqli_error($con);
                      }

                    }
                    ?>
                    <td>
                      <?php echo $price_table ?>
                    </td>
                    <td><input type='checkbox' name="removeitem[]" value="<?php echo $product_id ?>"></td>
                    <td>
                      <input type='submit' value='Update Cart' class='bg-info mx-3  px-3 py-2 border-0' name='update_cart'>

                      <input type='submit' value='Remove Cart' class='bg-info mx-3  px-3 py-2 border-0' name='remove_cart'>


                    </td>

                  </tr>

                  <?php
                }
              }
            } else {
              echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
            }

            ?>

            </tbody>
          </table>

          <!-- subtotal -->
          <div class="d-flex mb-5">
            <?php

            $get_ip_address = getIPAddress();
            $cart_query2 = "select * from cart_details where ip_address = '$get_ip_address'";
            $result_query2 = mysqli_query($con, $cart_query2);
            $result_count2 = mysqli_num_rows($result_query2);

            if ($result_count2 > 0) {
              echo "
                <h4 class='px-3'>Subtotal: <strong class='text-info'>
                $total_price/-
              </strong></h4>
              <input type='submit' value='Continue Shopping' class='bg-info mx-3  px-3 py-2 border-0' name='continue_shopping'>

            <button class='bg-secondary px-3 py-2 border-0 text-light'><a href='./users_area/checkout.php' class='text-decoration-none text-light'>Checkout</a></button>";
            } else {
              echo "<input type='submit' value='Continue Shopping' class='bg-info mx-3  px-3 py-2 border-0' name='continue_shopping'>
                ";
            }

            if (isset($_POST['continue_shopping'])) {
              echo "<script>window.open('index.php' , '_self')</script>";
            }
            ?>

          </div>

      </div>
    </div>
    </form>

    <!-- function to remove item -->
    <?php
    function remove_cart_item()
    {
      global $con;
      if (isset($_POST['remove_cart'])) {
        foreach ($_POST['removeitem'] as $remove_id) {
          echo $remove_id;
          $delete_query = "delete from cart_details where product_id = $remove_id";
          $run_delete = mysqli_query($con, $delete_query);
          if ($run_delete) {
            echo "<script>window.open('cart.php','_self')</script>";
          }
        }
      }
    }

    echo remove_cart_item();
    ?>
    <!-- footer -->

    <?php
    include("./includes/footer.php")
      ?>



  </div>






</body>

</html>