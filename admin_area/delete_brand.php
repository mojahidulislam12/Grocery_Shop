<?php
if(isset($_GET['delete_brand'])){
    $delete_id=$_GET['delete_brand'];
    $delete_product1="Delete from `brands` where brand_id=$delete_id";
    $result_product=mysqli_query($con,$delete_product1);
    if($result_product){
        echo "<script>alert('Successful')</script>";
        echo "<script>window.open('./index.php','_self')</script>"; 
    }
}
?>