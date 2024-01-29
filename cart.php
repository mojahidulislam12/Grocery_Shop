<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
    .card-img-top{
      width: 100%;
    height: 200px;
    object-fit: contain;
    }
    .cart-image{
      width: 50px;
      height: 50px;
      object-fit: contain;
    }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <img src="images/useras.webp" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <?php
        if(isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/profile.php'>My Account</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
        </li>";
        }
        ?>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php  cart_item() ?></sup></a>
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
      
    </div>
  </div>
</nav>
<?php cart(); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
 <ul class="navbar-nav me-auto">
 
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
              <a class='nav-link' href='./users_area/logout.php'>Logout</a>
            </li>";
            }
              
            
            ?>
 </ul>
</nav>
<div class="bg-light">
  <h3 class="text-center">Hidden Store</h3>
</div>

<div class="container">
  <div class="row">
    <form action="" method="post">
    <table class="table table-bordered text-center">
      
      <tbody>
         <?php
          global $con;
          $get_ip_address = getIPAddress(); 
          $total_price=0;
          $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
          $result=mysqli_query($con,$cart_query);
          $result_count=mysqli_num_rows($result);
          if($result_count>0){
            echo " <thead>
            <tr>
              <th>Product title</th>
              <th>Product Image</th>
              <th>Quantity</th>
              <th>Total Price</th>
              <th>Remove</th>
              <th colspan='2'>Operations</th>
            </tr>
          </thead>";
          while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $slect_products="Select * from `products` where product_id= '$product_id'";
            $resul_products=mysqli_query($con,$slect_products);
            while($row_product_price=mysqli_fetch_array($resul_products)){
              $product_price=array($row_product_price['product_price']);
              $price_table=$row_product_price['product_price'];
              $product_title=$row_product_price['product_title'];
              $product_image1=$row_product_price['product_image1'];
              $product_values=array_sum($product_price);
              $total_price+=$product_values;
           
        ?>
       
          </tbody>
        <tr>
          <td><?php echo $product_title ?></td>
          <td><img src="./admin_area/product_images1/<?php echo $product_image1 ?>" alt="" class="cart-image"></td>
          <td><input type="text" name="qty" id="" class="form-input w-50 "></td>
          <?php 
                    $get_ip_address = getIPAddress(); 
                    if(isset($_POST['update_cart'])){
                      $quantities=$_POST['qty'];
                      $update_cart="update `cart_details` set quantity = $quantities where ip_address='$get_ip_address'";
                      $products_quantity=mysqli_query($con,$update_cart);
                      $total_price=$total_price*$quantities;
                    }
                    ?>
          <td><?php echo $price_table ?>/-</td>
          <td><input type="checkbox" name="removeitem[]" value="<?php echo  $product_id; ?>"></td>
          <td>
            
          <input class="bg-info border-0 px-3 py-2 mx-3" type="submit" name="update_cart" value="Update cart" id="">
            <!-- <button class="bg-danger border-0 p-3 py-2 text-light">Remove</button> -->
            <input class="bg-danger border-0 px-3 py-2 mx-3" type="submit" name="remove_cart" value="Remove" id="">
          </td>
        </tr>

        <?php  }} }
        else{
          echo "<h2>Cart is empty</h2>";
        }
      
    
        
          
        ?>   
           
      
      
    </table>
    <div class="d-flex">
      <?php
      global $con;
      $get_ip_address = getIPAddress(); 
      
      $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
      $result=mysqli_query($con,$cart_query);
      $result_count=mysqli_num_rows($result);
      if($result_count>0){
        echo "<h4 class='px-3'>Subtotal: <strong>$total_price/-</strong></h4>
        <input class='bg-success border-0 px-3 py-2 mx-3' type='submit' name='continue_shopping' value='Continue shopping' id=''>
        <button class='bg-danger border-0 p-3 py-2 text-light'><a class='text-light text-decoration-none' href='./users_area/checkout.php'>Checkout</a></button>";
      }else{
        echo "<input class='bg-success border-0 px-3 py-2 mx-3' type='submit' name='continue_shopping' value='Continue shopping' id=''>";
      }
        if(isset($_POST['continue_shopping'])){
          echo "<script>window.open('index.php','_self')</script>";
        }
      ?>
      
    </div>
  </div>
</div>
</form>

<?php
function remove_cart(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo  $remove_id;
      $delet_query="Delete  from `cart_details` where product_id= $remove_id";
      $run_delete=mysqli_query($con, $delet_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
  }
}
}

echo $remove_item=remove_cart();

?>





    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>