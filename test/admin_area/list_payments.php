<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php
        $get_payments = "Select * from `user_payments`";
        $result = mysqli_query($conn, $get_payments);
        $row_count = mysqli_num_rows($result);
        
if($row_count==0){

            echo "<h2 class='text-danger text-center mt-5'>No orders yet</h2>";

}else{
    echo "<tr>
        <th>S/N</th>
        <th>Invoice number</th>
        <th>Amount</th>
        <th>Payment mode</th>
        
        <th>Payment date</th>
        
        <th>Delete</th>
    </tr>
</thead>
<tbody class='bg-secondary text-light'>";
            $number = 0;
            while($row_data=mysqli_fetch_assoc($result)){
                $order_id = $row_data['order_id'];
                $payment_id = $row_data['user_id'];
                $amount = $row_data['amount'];
                $invoice_number = $row_data['invoice_number'];
                
                $payment_date = $row_data['date'];
                $payment_mode = $row_data['payment-mode'];
                $number++;
                echo "<tr>
                <td>$number</td>
                
                <td>$invoice_number</td>
                <td>$amount</td>
                <td>$payment_mode</td>
                <td>$payment_date</td>
                <td><a href='index.php?delete_payment=<?php echo $payment_id; ?>' type='button' class='text-light' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>
            </tr>";
            }
}
        ?>
        
        
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><a href="./index.php?list_payments" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-danger"><a href="index.php?delete_payment=<?php echo $payment_id; ?>">Yes</a></button>
      </div>
    </div>
  </div>
</div>