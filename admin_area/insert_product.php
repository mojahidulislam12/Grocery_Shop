 <?php 
 include('../includes/connect.php');
 if(isset($_POST['insert_product'])){
    $product_titie=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_categories=$_POST['product_categories'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];


   if($product_titie=='' or $description=='' or $product_keywords=='' or $product_categories=='' or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
    echo "<script>alert('Please fill all value')</script>";
    exit();
   }else{
    move_uploaded_file($temp_image1,"./product_images1/$product_image1");
    move_uploaded_file($temp_image2,"./product_images1/$product_image2");
    move_uploaded_file($temp_image3,"./product_images1/$product_image3");

    $insert_products="insert into `products` (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_titie','$description',' $product_keywords','$product_categories','$product_brands','$product_image1','$product_image2','$product_image3',' $product_price',NOW(),'$product_status')";

    $result_query=mysqli_query($con,$insert_products);
    if( $result_query){
        echo "<script>alert('Successfull')</script>";
    }
   }
 }
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
</head>
<body class="bg-light">
    <div class="container mt-1">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline  mb-2 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title.." required="required">
            </div>
            <div class="form-outline mb-2  w-50 m-auto">
                <label for="description" class="form-label">Product description </label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description.." required="required">
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords.." required="required">
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
               <select name="product_categories" id="" class="form-select">
               <option value="">Select Category</option>
               <?php
              $select_query="Select * from `categories` ";
              $result_query=mysqli_query($con,$select_query);
              while($row=mysqli_fetch_assoc($result_query)){
                $category_title=$row['category_title'];
                $category_id=$row['category_id'];
                echo "<option value='$category_id'>$category_title</option>";
              }
               ?>
               </select>
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
               <select name="product_brands" id="" class="form-select">
               <option value="">Select Brands</option>
               <?php
              $select_query="Select * from `brands` ";
              $result_query=mysqli_query($con,$select_query);
              while($row=mysqli_fetch_assoc($result_query)){
                $brand_title=$row['brand_title'];
                $brand_id=$row['brand_id'];
                echo "<option value='$brand_id'>$brand_title</option>";
              }
               ?>
               </select>
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" >
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" >
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image3</label>
                <input type="file" name="product_image3" id="product_image1" class="form-control" >
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price.." required="required">
            </div>
            <div class="form-outline mb-2 w-50 m-auto">
                <input type="submit" name="insert_product" id="" class="btn btn-info px-4">
            </div>
            
            
            
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>