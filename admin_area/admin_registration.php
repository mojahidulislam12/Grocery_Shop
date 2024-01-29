<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container-fluid">
        <h2 class="text-center">Admin Registration</h2>
        <div class="row d-flex align-item-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <?php
                $con = mysqli_connect('localhost','root','','mystore');
                if(isset($_POST['submit'])){
                    $full_name	= $_POST['fullname'];
                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    $conf_password=$_POST['conf_password'];
                    $password_hash=password_hash($password,PASSWORD_DEFAULT);
                    $errors=array();
                    if(empty($full_name) or empty($email) or empty($password) or empty($conf_password)){
                        array_push($errors,"All field are required");
                    }
                    if(!filter_var( $email,FILTER_VALIDATE_EMAIL)){
                        array_push( $errors,"Email is not valid");
                    }
                    if(strlen($password)<8){
                        array_push($errors,"Password must be 8 charecter");
                    }
                    if($password!==$conf_password){
                        array_push( $errors,"Password does not match");
                    }
            
                    if(count($errors)>0){
                        foreach($errors as $error){
                            echo "<script>alert('Invalid')</script>";
                        }

                    }else{
                      $insert="insert into `admin` (full_name,email,password) values ('$full_name','$email','$password_hash')";
                      $result=mysqli_query($con,$insert);
                    }
                    if($result){
                        echo "<script>alert('Add Successfully')</script>";
                        echo "<script>window.open('admin_login.php','_self')</script>";
                      }

                }

                ?>

                <form action="" method="post">
                    <div class="form-outline mb-2 w-50 m-auto">
                        <label for="fullname" class="form-label">Name:</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter your name..." autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-2 w-50 m-auto">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email..." autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-2 w-50 m-auto">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password..." autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-2 w-50 m-auto">
                        <label for="conf_password" class="form-label">Confirm Password:</label>
                        <input type="password" name="conf_password" id="conf_password" class="form-control" placeholder="Enter your confirm password..." autocomplete="off" required="required">
                    </div>
                    <div class="mt-4 pt-2 w-50 m-auto">
                        <input type="submit" name="submit" id="" value="Register" class=" btn btn-info px-3 py-2 border-0">
                        <p class="small fw-bold mt-2 pt-2 mb-0">Already have an account ? <a href="admin_login.php" class="text-danger" ><b>Login</b></a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>