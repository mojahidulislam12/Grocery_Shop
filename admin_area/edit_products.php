<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="Select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_titie=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
    
    $select_category="Select * from `categories` where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];


    

$select_brand="Select * from `brands` where brand_id=$brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];

}

?>

<div class="container mt-5">
    <h3 class="text-center">Edit Products</h3>
    
        <form action="" method="get" enctype="multipart/form-data">
        <div class="form-outline w-100 mb-1 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" value="<?php echo $category_title ?>" class="form-control"  required="required">
            </div>
            <div class="form-outline mb-1 w-50 m-auto">
                <label for="description" class="form-label">Product description </label>
                <input type="text" name="description" id="description"value="<?php echo $description ?>"class="form-control"  required="required">
            </div>
            <div class="form-outline mb-1 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" value="<?php echo $category_title ?>"class="form-control" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-2">
            <label for="product_caregory" class="form-label">Product Category</label>
                <select name="product_caregory" class="form-select">
                <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
                <?php
                 $select_category_all="Select * from `categories`";
                 $result_category_all=mysqli_query($con,$select_category_all);
                 while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                    $category_title=$row_category_all['category_title'];
                    $category_id=$row_category_all['category_id'];
                    echo "<option value=' $category_id'>$category_title</option>";
                 }
                 
             
                ?>
                
                </select>
                
            </div>
            <div class="form-outline w-50 m-auto mb-2">
            <label for="product_brands" class="form-label">Product Brand</label>
                <select name="product_brands" class="form-select">
                <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
                <?php
                 $select_brand_all="Select * from `brands`";
                 $result_brand_all=mysqli_query($con,$select_brand_all);
                 while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                    $brand_title=$row_brand_all['brand_title'];
                    $brand_id=$row_brand_all['brand_id'];
                    echo "<option value=' $brand_id'>$brand_title</option>";
                 }
                 
             
                ?>
                </select>
                
            </div>
            <div class="form-outline w-50 m-auto mb-2">
               <label for="product_image1" class="form-label">Product Image1</label>
               <div class="d-flex">
                <input type="file" name="product_image1" id="product_image1" value=""class="form-control w-90 m-auto" required="required">
                <img src="./product_images1/<?php echo $product_image1 ?>" alt="" class="product_image">
               </div>
            </div>
            <div class="form-outline w-50 m-auto mb-2">
               <label for="product_image2" class="form-label">Product Image2</label>
               <div class="d-flex">
                <input type="file" name="product_image2" id="product_image2"value="" class="form-control w-90 m-auto" required="required">
                <img src="./product_images1/<?php echo $product_image2 ?>" alt="" class="product_image">
               </div>
            </div>
            <div class="form-outline w-50 m-auto mb-2">
               <label for="product_image3" class="form-label">Product Image3</label>
               <div class="d-flex">
                <input type="file" name="product_image3" id="product_image3"value="<?php echo $product_image3 ?>" class="form-control w-90 m-auto" required="required">
                <img src="./product_images1/<?php echo $product_image3 ?>" alt="" class="product_image">
               </div>
            </div>
            <div class="form-outline w-50 m-auto mb-2">
                <label for="product_price" class="form-label">Product Price</label>
                 <input type="text" name="product_price" id="product_price"value="<?php echo $product_price ?>" class="form-control" required="required">
            </div>
            <div class="w-50 m-auto">
                
                 <input type="submit" name="edit_product" value="Update" class="btn btn-info px-3 mb-2">
            </div>
            
        </form>
  
</div>
<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_caregory=$_POST['product_caregory'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_caregory=='' or $product_brands=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('Error')</script>";
    }else{
        move_uploaded_file($temp_image1,"./product_images1/$product_image1");
        move_uploaded_file($temp_image2,"./product_images1/$product_image2");
        move_uploaded_file($temp_image3,"./product_images1/$product_image3");

        $update_product="update `products` set product_title='$product_title',product_description='$product_description',product_keywords='$product_keywords',category_id='$product_caregory',brand_id=' $product_brands',product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',product_price='$product_price',date=NOW() where product_id=$edit_id";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo "<script>alert('Successful')</script>";
        }

    }
}
?>