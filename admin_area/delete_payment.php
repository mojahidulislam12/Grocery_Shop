
<?php
if(isset($_GET['delete_payment'])){
    $delete_id=$_GET['delete_payment'];
    $delete_product="Delete from `user_payments` where payment_id=$delete_id";
    $result_product=mysqli_query($con,$delete_product);
    if($result_product){
        echo "<script>alert('Successful')</script>";
        echo "<script>window.open('./index.php','_self')</script>"; 
    }
}
?>