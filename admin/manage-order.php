<?php
  include_once('partials/header.php'); ?>

  <!-- Main Content area start here -->
  <section class="main-content">
    <div class="container">
      <h1 class="text-center">Manage Order</h1>
      <div style="overflow-x: auto;">
        <table class="tbl">
          <tr>
            <th>S.N</th>
            <th>Food</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Order-Date</th>
            <th>Status</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
          <?php 
          $sn = 1;
            $sql = mysqli_query($connection, "SELECT * FROM tbl_order ORDER BY id DESC");
              while($rows = mysqli_fetch_assoc($sql)) :
                $id = $rows['id'];
                $food = $rows['food'];
                $price = $rows['price'];
                $qty = $rows['qty'];
                $total = $rows['total'];
                $order_date = $rows['order_date'];
                $status = $rows['status'];
                $customer_name = $rows['customer_name'];
                $customer_contact = $rows['customer_contact'];
                $customer_email = $rows['customer_email'];
                $customer_address = $rows['customer_address']; ?>
                
                <tr>
                  <td><?php echo $sn++; ?></td>
                  <td><?php echo $food; ?></td>
                  <td><?php echo $price; ?></td>
                  <td><?php echo $qty; ?></td>
                  <td><?php echo $total; ?></td>
                  <td><?php echo $order_date; ?></td>
                  <td>
                    <?php 
                      if($status == "Ordered"){
                        echo "<span style='color: #2980b9;'>$status</span>";
                      }
                      elseif($status == "On Delivery"){
                        echo "<span style='color: #e67e22;'>$status</span>";
                      }
                      elseif($status == "Delivered"){
                        echo "<span style='color: #27ae60;'>$status</span>";
                      }
                      elseif($status == "Canclled"){
                        echo "<span style='color: #e74c3c;'>$status</span>";
                      }
                     ?>
                  </td>
                  <td><?php echo $customer_name; ?></td>
                  <td><?php echo $customer_contact; ?></td>
                  <td><?php echo $customer_email; ?></td>
                  <td><?php echo $customer_address; ?></td>
                  <td>
                    <a class="btn-success" href="<?php echo SITEURL; ?>/admin/update-order.php?id=<?php echo $id; ?>">Update</a>
                  </td>
                </tr>
              <?php endwhile; ?>
        </table>
      </div>
    </div>
  </section>
  <!-- Main Content area End here -->

  <?php include_once('partials/footer.php'); ?>