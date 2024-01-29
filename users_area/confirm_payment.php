<?php
include('../includes/connect.php');

session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    //echo $order_id;
    $select_data="Select * from `users_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}
if(isset($_POST['confirm_Payment']))
{
    $invoice_number=$_POST['invoice_number'];
    
    $amount_due=$_POST['amount'];
   
    $payment=$_POST['payment_mode'];
    $insert_query="insert into `user_payments` (order_id,invoice_number,amount,payment_mode) values ($order_id,$invoice_number,$amount_due,'$payment')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Successfull')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>"; 
    }
    $update_orders="update `users_orders` set order_status='Complete' where order_id=$order_id";
    $result_orders=mysqli_query($con,$update_orders);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-success">
    <h4 class="text-center text-light">Confirm Payment</h4>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-outlinemy text-center w-60 m-auto my-4">
                <input type="text" name="invoice_number" id="" class="form-control w-50 m-auto" value="<?php echo  $invoice_number ?>">
            </div>
            <div class="form-outlinemy text-center w-60 m-auto my-4">
                <label for="" class="text-light"><big><b>Amount</b></big></label>
                <input type="text" name="amount" id="" class="form-control w-50 m-auto" value="<?php echo $amount_due ?>" >
            </div>
            <div class="form-outlinemy text-center w-60 m-auto my-4">
                <select name="payment_mode" id="" class="form-select w-50 m-auto">
                    <option value="">Select Payment mode</option>
                    <option value="">bkash</option>
                    <option value="">Nagad</option>
                    <option value="">Paypal</option>
                    <option value="">UPI</option>
                    <option value="">Payoffline</option>
                </select>
            </div>
            <div class="form-outlinemy text-center w-60 m-auto my-4">
               <input type="submit" name="confirm_Payment" id="" class="bg-info py-2 px-3 border-0" value="Confirm_Payment">
</div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>