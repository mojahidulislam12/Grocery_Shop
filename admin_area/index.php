<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Font  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin-image{
    width: 100px;
    object-fit: contain;
}
.product_image{
    width: 100px;
    object-fit: contain;
}

    </style>
    
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <img src="../images/How-deos-your-grocery-cart-look-like-pic.webp" alt="" class="logo">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-iten">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <div class="">
            <h3 class="text-center p-2">Manage Detalies</h3>
        </div>
        <div class="row">
            <div class="col-md-12 bg-light p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href=""><img src="../images/images123.png" alt="" class="admin-image"></a>
                    <p class="text-center text-black">Admin</p>
                </div>
                <div class="button text-center">
                   <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                   <button class="my-3"><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                   <button class="my-3"><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categores</a></button>
                   <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categores</a></button>
                   <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brand</a></button>
                   <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                   <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Order</a></button>
                   <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payment</a></button>
                   <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1"> List users</a></button>
                   <button><a href="admin_login.php" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <?php
             if(isset($_GET['insert_category'])){
                include('insert_categories.php');
             }
             if(isset($_GET['insert_brand'])){
                include('insert_brands.php');
             }
             if(isset($_GET['view_products'])){
                include('view_products.php');
             }
             if(isset($_GET['edit_products'])){
                include('edit_products.php');
             }
             if(isset($_GET['delete_product'])){
                include('delete_product.php');
             }
             if(isset($_GET['view_categories'])){
                include('view_categories.php');
             }
             if(isset($_GET['view_brands'])){
                include('view_brands.php');
             }
             if(isset($_GET['delete_category'])){
                include('delete_category.php');
             }
             if(isset($_GET['delete_brand'])){
                include('delete_brand.php');

             }if(isset($_GET['list_orders'])){
                include('list_orders.php');
             }

             if(isset($_GET['list_payments'])){
                include('list_payments.php');
             }

             if(isset($_GET['list_users'])){
                include('list_users.php');
             }
             if(isset($_GET['delete_user'])){
                include('delete_user.php');
             }
             if(isset($_GET['delete_payment'])){
                include('delete_payment.php');
             }
             if(isset($_GET['delete_order'])){
                include('delete_order.php');
             }
            
            ?>
        </div>
        <?php
//include('../includes/footer.php');
?>

    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
