<?php
if(isset($_GET['delete_category'])){
    $delete_id=$_GET['delete_category'];
    $delete_product1="Delete from `categories` where category_id=$delete_id";
    $result_product=mysqli_query($con,$delete_product1);
    if($result_product){
        echo "<script>alert('Successful')</script>";
        echo "<script>window.open('./index.php','_self')</script>"; 
    }
}
?>