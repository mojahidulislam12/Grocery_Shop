<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
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
        <h2 class="text-center"> User Login</h2>
        <div class="row d-flex align-item-center justify-content-center">
            <div class="col-lg-12 col-xl-6 mt-5">
                <form action="" method="post">
                    <div class="form-outline mb-2 w-50 m-auto">
                        <label for="user_username" class="form-label">Username:</label>
                        <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your name..." autocomplete="off" required="required">
                    </div>
                    <!-- <div class="form-outline mb-2">
                        <label for="user_email" class="form-label">Email:</label>
                        <input type="text" name="user_email" id="user_email" class="form-control" placeholder="Enter your email..." autocomplete="off" required="required">
                    </div> -->
                    <!-- <div class="form-outline mb-2">
                        <label for="user_image" class="form-label">Image::</label>
                        <input type="file" name="user_image" id="user_image" class="form-control" required="required">
                    </div> -->
                    <div class="form-outline mb-2 w-50 m-auto">
                        <label for="user_password" class="form-label">Password:</label>
                        <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password..." autocomplete="off" required="required">
                    <!-- </div>
                    <div class="form-outline mb-2">
                        <label for="conf_user_password" class="form-label">Confirm assword:</label>
                        <input type="password" name="conf_user_password" id="conf_user_password" class="form-control" placeholder="Enter your confirm password..." autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-2 w-100">
                        <label for="user_address" class="form-label">Address:</label>
                        <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter your address..." autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-2 w-100">
                        <label for="user_contact" class="form-label">Contact:</label>
                        <input type="text" name="user_contact" id="user_contact" class="form-control" placeholder="Enter your contact number..." autocomplete="off" required="required">
                    </div> -->
                    <div class="mt-4 pt-2 ">
                        <input type="submit" name="user_login" id="" value="Login" class="bg-success px-3 py-2 border-0">
                        <p class="small fw-bold mt-2 pt-2 mb-0">Don't have an account ? <a href="user_registration.php" class="text-danger" ><b>Register</b></a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $select_query="Select * from `user_table` where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();


    $select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $rows_count_cart=mysqli_num_rows($select_cart);





    if($rows_count>0){
       $_SESSION['username']=$user_username;
        if(password_verify($user_password,$row_data['user_password'])){
            //echo "<script>alert('Successfull')</script>";
            if($rows_count==1 and $rows_count_cart==0) {
                $_SESSION['username']=$user_username;
                echo "<script>alert('Successfull')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Successfull')</script>";
                echo "<script>window.open('payment.php','_self')</script>"; 
            }
        }else{
            echo "<script>alert('Invalied')</script>"; 
        }

    }else{
        echo "<script>alert('Invalied')</script>"; 
    }
}
?>