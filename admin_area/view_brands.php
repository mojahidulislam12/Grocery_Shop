<h1 class="text-center text-dark">All Brands</h1>
<table class="table table-bordered mt3">
    <thead class="bg-secondary text-center text-light">
        <tr>
            <th>S_N</th>
            <th>Brand_Title</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-light text-center">
        <?php
        $select_cat="Select * from `brands`";
        $result=mysqli_query($con,$select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc( $result)){
            $brand_id=$row['brand_id'];
            $brand_title=$row['brand_title'];
            $number++;
       
        ?>
        <tr>
            <td><?php echo  $number; ?></td>
            <td><?php echo  $brand_title; ?></td>
            <td><a href='index.php?delete_brand=<?php echo $brand_id ?>' ><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
 }
        ?>
    </tbody>
