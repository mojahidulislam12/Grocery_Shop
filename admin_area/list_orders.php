<h4 class="text-center text-black">All Orders</h4>
<table class="table table-bordered mt-3">
    <thead class="bg-secondary text-light text-center">
        <?php
         $get_orders="Select * from `users_orders`";
         $result=mysqli_query($con,$get_orders);
         $row_count=mysqli_num_rows($result);
        
 if($row_count==0){
    echo "<h3 class='bg-danger text-center  mt-5'>No Order Add</h3>";
 }else{
    echo "<tr>
    <th>S_N</th>
    <th>Due_Amount</th>
    <th>Invoice_Number</th>
    <th>Total_Products</th>
    <th>Order_Date</th>
    <th>Status</th>
    <th>Delete</th>
</tr>
</thead>
<tbody class='bg-light text-center'>";

    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
       
        $amount_due=$row_data['amount_due'];
        $user_id=$row_data['user_id'];
        $order_id=$row_data['order_id'];
        $invoice_number=$row_data['invoice_number'];
        $total_products=$row_data['total_products'];
        $order_date=$row_data['order_date'];
        $order_status=$row_data['order_status'];
        $number++;
        echo "<tr>
        <td><b>$number</b></td>
        <td><b>$amount_due</b></td>
        <td><b> $invoice_number</b></td>
        <td><b>$total_products</b></td>
        <td><b>$order_date</b></td>
        <td><b>$order_status</b></td>
        <b><td><a href='index.php?delete_order= $order_id ' ><i class='fa-solid fa-trash'></i></a></b></td>
</tr>";
    }
 }
        ?>
        
    </tbody>
</table>