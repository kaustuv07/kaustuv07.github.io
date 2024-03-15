<?php include("partials/menu.php"); ?>

<h1 style="margin-left: 1%;">Completed Orders History</h1>

<table class="table table-success table-striped"style="margin: 1%;width: 98%;" id ="table">
<a href="pending-order.php" target="_self"style="text-decoration: none; color: inherit;">
<button type="button" class="btn btn-danger" style="margin-left:1%;background-color:orange;border-color:orange;">Pending Orders</button></a>
<a href="order.php" target="_self"style="text-decoration: none; color: inherit;">
<button type="button" class="btn btn-success" style="margin-left:1%;">All Orders</button></a>
<thead >
    <tr>
      <th scope="col">Order Date</th>
      <th scope="col">Food Item</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <th scope="col">Username</th>
      <th scope="col">Phone No.</th>
      <th scope="col">Address</th>
      <th scope="col">Status</th>
      <th scope="col">Custom Status</th>
      <th scope="col">Payment Method</th>
    </tr>
  </thead>
  <tbody>
  <?php
            $sql = "SELECT * FROM ordertable 
            INNER JOIN food ON
            food.food_id = ordertable.food_id
            INNER JOIN customerdetails ON
            customerdetails.cus_id = ordertable.cus_id
            WHERE orderstatus = 'Delivered'
            ORDER BY date DESC;
            ";
            $res = mysqli_query($conn,$sql);

            if($res==TRUE)
            {
              $count = mysqli_num_rows($res);
              if($count> 0)
              {
                while($row = mysqli_fetch_array($res))
                {
                  $order_id =$row["order_id"];
                  $orderstatus =$row["orderstatus"];
                  $amount = $row["amount"];
                  $date = $row["date"];
                  $quantity = $row["quantity"];
                  $foodname = $row["foodname"];
                  $username = $row["username"];
                  $cus_address = $row["cus_address"];
                  $cus_mobile = $row["cus_mobile"];
                  $cost = $row["cost"];
                  $custom_status = $row["custom_status"];
                  $payment_method = $row["payment_method"];
                  ?>
                <tr> 
                  <td><?php echo $date;?></td>
                  <td><?php echo $foodname;?></td>
                  <td>Rs. <?php echo $cost;?></td>
                  <td><?php echo $quantity;?></td>
                  <td>Rs. <?php echo $amount;?></td>
                  <td><?php echo $username;?></td>
                  <td><?php echo $cus_mobile;?></td>
                  <td><?php echo $cus_address;?></td>
                  <td><?php echo $orderstatus;?></td>
                  <td><?php echo $custom_status;?></td>
                  <td><?php echo $payment_method;?></td>
                </tr>
                <?php
            }
          }else{

          }
          }
        ?>
  </tbody>
</table>



<?php include("partials/footer.php"); ?>