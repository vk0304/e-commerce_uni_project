<?php
include('../includes/connect.php');

if(isset($_POST['insert_brand'])){
  $brand_title = $_POST['brand_title'];

  // select data from database
  $select_query = "select * from brands where brand_title = '$brand_title'" ;
  $result_select  = mysqli_query($con , $select_query);
  $number = mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('This brand is already present in the databse')</script>";
  }
  elseif($brand_title != null){

  $insert_query = "insert into brands (brand_title) values ('$brand_title')";
  $result = mysqli_query($con , $insert_query);
  echo "<script>alert('brand has been added succesfully')</script>";

  }
}


?>



<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-reciept"></i></span>
  <input required type="text" class="form-control" name= "brand_title" placeholder="insert brands" aria-label="brands" aria-describedby="basic-addon1">
</div>

<div class="input-group w-20  mb-2">
<input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brand" Value="Insert Brand">
</div>

</form>