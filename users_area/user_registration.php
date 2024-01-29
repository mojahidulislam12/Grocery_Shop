<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center">Registration Now</h2>
        <div class="row d-flex align-item-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-2 w-50 m-auto">
                        <label for="user_username" class="form-label">Username:</label>
                        <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your name..." autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-2 w-50 m-auto">
                        <label for="user_email" class="form-label">Email:</label>
                        <input type="text" name="user_email" id="user_email" class="form-control" placeholder="Enter your email..." autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-2 w-50 m-auto">
                        <label for="user_image" class="form-label">Image::</label>
                        <input type="file" name="user_image" id="user_image" class="form-control" required="required">
                    </div>
                    <div class="form-outline mb-2 w-50 m-auto">
                        <label for="user_password" class="form-label">Password:</label>
                        <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password..." autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-2 w-50 m-auto">
                        <label for="conf_user_password" class="form-label">Confirm assword:</label>
                        <input type="password" name="conf_user_password" id="conf_user_password" class="form-control" placeholder="Enter your confirm password..." autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-2 w-50 m-auto">
                        <label for="user_address" class="form-label">Address:</label>
                        <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter your address..." autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-2 w-50 m-auto">
                        <label for="user_contact" class="form-label">Contact:</label>
                        <input type="text" name="user_contact" id="user_contact" class="form-control" placeholder="Enter your contact number..." autocomplete="off" required="required">
                    </div>
                    <div class="mt-2 pt-2 w-50 m-auto">
                        <input type="submit" name="user_register" id="" value="Register" class="bg-success px-3 py-2 border-0">
                        <p class="small fw-bold mt-2 pt-2 mb-0">Already have an account ? <a href="user_login.php" class="text-danger" ><b>Login</b></a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();


    $select_query="Select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con, $select_query);
    $rows_count=mysqli_num_rows($result);
     if($rows_count>0){
        echo "<script>alert('Already exit')</script>"; 
     }elseif($user_password!=$conf_user_password){
        echo "<script>alert('Don't match')</script>"; 
     }
     
     else{
        move_uploaded_file($user_image_tmp,"./user_images/ $user_image");
    $insert_query="insert into `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($con,$insert_query);
     }

   
     $slect_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
     $result_cart=mysqli_query($con, $slect_cart_items);
     $rows_count=mysqli_num_rows( $result_cart);
     if( $rows_count>0){
         $_SESSION['username']=$user_username;
         echo "<script>alert('You have items in your cart')</script>"; 
         echo "<script>window.open('checkout.php','_self')</script>";
     }else{
         echo "<script>window.open('../index.php','_self')</script>";
     }
 
 }

?>