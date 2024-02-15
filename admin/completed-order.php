<?php include("partials/menu.php"); ?>

<h1 style="margin-left: 1%;">Completed Orders History</h1>

<table class="table table-success table-striped"style="margin: 1%;width: 98%;" id ="table">
<a href="pending-order.php" target="_self"style="text-decoration: none; color: inherit;">
<button type="button" class="btn btn-danger" style="margin-left:1%;background-color:orange;border-color:orange;">Pending Orders</button></a>
<a href="order.php" target="_self"style="text-decoration: none; color: inherit;">
<button type="button" class="btn btn-success" style="margin-left:1%;">All Orders</button></a>
<thead >
    <tr>
      <th scope="col"onclick="sortTable(1)">Order Date</th>
      <th scope="col"onclick="sortTable(2)">Food Item</th>
      <th scope="col"onclick="sortTable(3)">Price</th>
      <th scope="col"onclick="sortTable(4)">Quantity</th>
      <th scope="col"onclick="sortTable(5)">Total</th>
      <th scope="col"onclick="sortTable(6)">Username</th>
      <th scope="col"onclick="sortTable(7)">Phone No.</th>
      <th scope="col"onclick="sortTable(8)">Address</th>
      <th scope="col"onclick="sortTable(9)">Status</th>
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