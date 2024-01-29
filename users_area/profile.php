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
    <title>Welcome <?php $_SESSION['username']?></title>
    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
    .card-img-top{
      width: 100%;
    height: 100px;
    object-fit: contain;
    }
    .profile{
      width: 90%;
      
      object-fit: contain;
      height: 50%0%;
    }
    .logo{
width: 7%;
height: 7%;
object-fit: contain;
}
    
    </style>
</head>
<body>
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <img src="../images/useras.webp" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My account</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php  cart_item() ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price:<?php total_cart_price() ?>/-</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li> -->
      </ul>
      <form class="d-flex" action="../search_product.php" method="get">
        <input class="form-control me-2" name="search_data" type="search" placeholder="Search" aria-label="Search">
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
        <input type="submit" name="search_data_product" id="" value="Search" class="btn btn-outline-success" >
      </form>
    </div>
  </div>
</nav>
<?php cart(); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
 <ul class="navbar-nav me-auto">
 <!-- <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
         -->

            <?php


if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href=''>Welcome Guest</a>
</li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link' href=''>Welcome ".$_SESSION['username']."</a>
</li>";
}
            if(!isset($_SESSION['username'])){
              echo "<li class='nav-item'>
              <a class='nav-link' href='./users_area/user_login.php'>Login</a>
            </li>";
            }else{
              echo "<li class='nav-item'>
              <a class='nav-link' href='./users_area/logout.php'></a>
            </li>";
            }
            
            
            ?>
       
 </ul>
</nav>
<!-- <div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
</div> -->

<div class="row">
  <div class="col-md-2 ">
    <ul class="navbar-nav bg-light text-center" style="height:100vh">
    <li class="nav-item bg-info">
          <a class="nav-link text-light" href="#"><h4>Profile</h4></a>
        </li>
        <?php
        $username=$_SESSION['username'];
        $user_image="Select * from `user_table` where username='$username'";
        $user_image=mysqli_query($con,$user_image);
        $row_image=mysqli_fetch_array($user_image);
        $user_image=$row_image['user_image'];
        echo "<li class='nav-item'>
        <img src='./user_images/ $user_image' alt='' class='profile'>
      </li>";
        ?>
        
        <li class="nav-item ">
          <a class="nav-link text-black" href="profile.php">Panding Order</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-black" href="profile.php?edit_account">Edit Account</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-black" href="profile.php?my_orders">My Orders</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-black" href="profile.php?delete_account">Delete Account</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-black" href="logout.php">Logout</a>
        </li>
    </ul>

  </div>
  <div class="col-md-10 mt-10 text-center">
  <?php 
    get_user_order_details(); 
    if(isset($_GET['edit_account'])){
      include('edit_account.php');
    }
    if(isset($_GET['my_orders'])){
      include('user_orders.php');
    }
    ?>
</div>


  </div>
<?php
//include('../includes/footer.php');
?>

    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>