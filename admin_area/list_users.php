<h4 class="text-center text-black">All Users</h4>
<table class="table table-bordered mt-3">
    <thead class="bg-secondary text-light text-center">
        <?php
        $con = mysqli_connect('localhost','root','','mystore');
         $get_payment="Select * from `user_table`";
         $result=mysqli_query($con,$get_payment);
         $row_count=mysqli_num_rows($result);
        
 if($row_count==0){
    echo "<h3 class='bg-danger text-center  mt-5'>No Users</h3>";
 }else{
    echo "<tr>
    <th>S_N</th>
    <th>User_Name</th>
    <th>User_email</th>
    
    <th>User_Address</th>
    <th>User_Mobile</th>
    <th>Delete</th>
</tr>
</thead>
<tbody class='bg-light text-center'>";

    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
       
        $user_id=$row_data['user_id'];
        $username =$row_data['username'];
        $user_email=$row_data['user_email'];
        $user_image=$row_data['user_image'];
        $user_address=$row_data['user_address'];
        $user_mobile=$row_data['user_mobile'];
        
        $number++;
        echo "<tr>
        <td><b>$user_id</b></td>
        
        <td><b> $username</b></td>
        <td><b>$user_email</b></td>
        
        <td><b>$user_address</b></td>
        <td><b>$user_mobile</b></td>
        <b><td><a href='index.php?delete_user= $user_id' ><i class='fa-solid fa-trash'></i></a></b></td>
</tr>";
    }
 }
        ?>
        
    </tbody>
</table>
