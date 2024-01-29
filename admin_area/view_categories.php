<h1 class="text-center text-dark">All Categories</h1>
<table class="table table-bordered mt3">
    <thead class="bg-secondary text-center text-light">
        <tr>
            <th>S_N</th>
            <th>Category_Title</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-light text-center">
        <?php
        $select_cat="Select * from `categories`";
        $result=mysqli_query($con,$select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc( $result)){
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];
            $number++;
       
        ?>
        <tr>
            <td><?php echo  $number; ?></td>
            <td><?php echo  $category_title; ?></td>
            <td><a href='index.php?delete_category=<?php echo $category_id?>' class='text-black text-center'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
 }
        ?>
    </tbody>
</table>