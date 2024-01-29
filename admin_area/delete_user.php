<?php
if(isset($_GET['delete_user'])){
    $user_id =$_GET['delete_user'];
    $delete_user="Delete from `user_table` where user_id=$user_id";
    $result_product=mysqli_query($con,$delete_user);
    if($result_product){
        echo "<script>alert('Successful')</script>";
        echo "<script>window.open('./index.php','_self')</script>"; 
    }
}
?>