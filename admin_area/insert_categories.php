<?php
include('../includes/connect.php');

if(isset($_POST['insert_cat'])){
  $cetagory_title=$_POST['cat_title'];
  $select_query="Select * from `categories` where category_title='$cetagory_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('Already added')</script>";
  }else{
    $insert_query="insert into `categories` (category_title) values('$cetagory_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
      echo "<script>alert('Add Successfully')</script>";
    }
  }
  
}
?>
<h3 class="text-center">Insert Categories</h3>
<form action="" method="post" class="mb-2">
<div class="input-group mb-3 w-90">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text"  name="cat_title" class="form-control" placeholder="Insert Category" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3 w-10 m-auto">
  
  <input type="submit"  name="insert_cat" class="bg-info border-0 p-2 px-4" value="Insert" >
  
</div>
</form>