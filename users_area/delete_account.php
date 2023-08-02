<h3 class="text-danger mb-4">Delete Account</h3>
<form action="" method="post" class="mt-5">
    <div class="form-outline">
        <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account">
    </div>
</form>

<?php 

$username = $_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query = "delete from uuser_table where username = '$username'";
    $sql_execute = mysqli_query($con ,$delete_query);
    if($sql_execute){
        session_destroy();
        echo "<script>alert('Account Deleted Successfully')</script>";
        echo "<script>window.open('../index.php' , '_self' )</script>";

    }
}

?>