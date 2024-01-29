<h4 class="text-center text-black">All Payment</h4>
<table class="table table-bordered mt-3">
    <thead class="bg-secondary text-light text-center">
        <?php
         $get_payment="Select * from `user_payments`";
         $result=mysqli_query($con,$get_payment);
         $row_count=mysqli_num_rows($result);
        
 if($row_count==0){
    echo "<h3 class='bg-danger text-center  mt-5'>No Payment</h3>";
 }else{
    echo "<tr>
    <th>S_N</th>
    <th>Invoice_Number</th>
    <th>Amount</th>
    <th>payment_mode</th>
    <th>Order_date</th>
    <th>Delete</th>
</tr>
</thead>
<tbody class='bg-light text-center'>";

    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
       
        $amount=$row_data['amount'];
        $payment_id =$row_data['payment_id'];
        $order_id=$row_data['order_id'];
        $invoice_number=$row_data['invoice_number'];
        $payment_mode=$row_data['payment_mode'];
        $date=$row_data['date'];
        
        $number++;
        echo "<tr>
        <td><b>$number</b></td>
        
        <td><b> $invoice_number</b></td>
        <td><b>$amount</b></td>
        <td><b>$payment_mode</b></td>
        <td><b>$date</b></td>
        <b><td><a href='index.php?delete_payment= $order_id ' ><i class='fa-solid fa-trash'></i></a></b></td>
</tr>";
    }
 }
        ?>
        
    </tbody>
</table>