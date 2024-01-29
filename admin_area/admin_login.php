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
    <div class="container-fluid m-3">
        <h3 class="text-center mb-5">Admin Login</h3>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-4">
           <img src="../images/3-Login-Page-Screen.jpg" alt=""class="img-fluid align-middle">
            </div>
            <div class="col-lg-5 col-xl-4">
                <?php 
                $con = mysqli_connect('localhost','root','','mystore');
                if(isset($_POST['admin_login'])){
                    $email=$_POST['email'];
                    $hash_password=$_POST['password'];
                    $result="Select  * from `admin` where email='$email' and password='$hash_password'";
                    $sql=mysqli_query($con,$result);
                    
                    if($sql){
                        echo "<script>alert(' Successfully')</script>";
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                    
                    
                }

                ?>
              <form action=" " method="post">
                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter your email..." required="required" class="form-control">
                </div>
                
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password..." required="required" class="form-control">
                </div>
                <div>
                    <input type="submit" name="admin_login" value="Login" id="" class="bg-info py-2 px-3">
                    <p class="big fw-bold mt-2 pt-1"><b>Don't have an account ?</b><a href="admin_registration.php" class="text-danger"><b> Registration</b></a></p>
                </div>

                
              </form>
            </div>

        </div>
    </div>
</body>
</html>