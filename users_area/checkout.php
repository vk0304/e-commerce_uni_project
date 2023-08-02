<?php
include("../includes/connect.php");
session_start();

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



  <!-- css link -->
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <!-- navbar -->
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">E-shopping</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../display_all_products.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./user_registration.php">Register</a>
            </li>


          </ul>
          <form class="d-flex" action="../search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
          </form>


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
                  <a class='nav-link' href='user_login.php'>Login</a>
                </li>";
        } else {
          echo "<li class='nav-item'>
                  <a class='nav-link' href='user_logout.php'>Logout</a>
                </li>";
        }

        ?>

      </ul>
    </div>



    <!-- heading -->
    <div class="bg-light">
      <h3 class="text-center">E-Shopping</h3>
      <p class="text-center">Every thing you want , You will find here</p>
    </div>

    <!-- main section -->


    <div class="row px-1">
      <div class="col-md-12">
        <div class="row">
          <?php
          if (!isset($_SESSION['username'])) {
            include('./user_login.php');
          } else {
            include('payment.php');
          }
          ?>
        </div>
      </div>
    </div>

    <!-- footer -->

    <?php
    include("../includes/footer.php")
      ?>



  </div>


</body>

</html>