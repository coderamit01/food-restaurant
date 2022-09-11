<?php
  require_once('partials/header.php'); 

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = mysqli_query($connection, "SELECT * FROM tbl_order WHERE id = '$id'");
    $count = mysqli_num_rows($sql);
    if($count == 1){
      $rows = mysqli_fetch_assoc($sql);
      $food = $rows['food'];
      $price = $rows['price'];
      $qty = $rows['qty'];
      $status = $rows['status'];
      $customer_name = $rows['customer_name'];
      $customer_contact = $rows['customer_contact'];
      $customer_email = $rows['customer_email'];
      $customer_address = $rows['customer_address'];
       
    }else{
      header('location:'.SITEURL."/admin/manage-food.php");
    }
  }else{
    header('location:'.SITEURL."/admin/manage-food.php");
  }


?>

  <section class="main-content">
    <div class="container">
      <h2 class="text-center">Update Order</h2>
      <form class="tbl-info" action="" method="POST">
        <table>
          <tr>
            <td>Food Name</td>
            <td><?php echo $food; ?></td>
          </tr>
          <tr>
            <td>Price</td>
            <td><?php echo $price; ?></td>
          </tr>
          <tr>
            <td>Qty</td>
            <td><input type="number" name="qty" value="<?php echo $qty; ?>"></td>
          </tr>
          <tr>
            <td>Status</td>
            <td>
              <select class="slct-catgry" name="status" >
                <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                <option <?php if($status=="Canclled"){echo "selected";} ?> value="Canclled">Canclled</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Customer Name</td>
            <td><input type="text" name="customer_name" value="<?php echo $customer_name; ?>"></td>
          </tr>
          <tr>
            <td>Customer Contact</td>
            <td><input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>"></td>
          </tr>
          <tr>
            <td>Customer Email</td>
            <td><input type="email" name="customer_email" value="<?php echo $customer_email; ?>"></td>
          </tr>
          <tr>
            <td>Customer Address</td>
            <td><textarea class="text-area-brdr name="address" cols="23" rows="4" name=""><?php echo $customer_address; ?></textarea></td>
          </tr>
          <tr>
            <td>
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <input type="hidden" name="price" value="<?php echo $price; ?>">
            </td>
            <td><input class="btn-primary no-border" type="submit" name="update" value="Update"></td>
          </tr>
        </table>
      </form>
    </div>
  </section>
<?php 
  if(isset($_POST['update'])){
    $id = $_POST['id'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $price * $qty;
    $status = $_POST['status'];
    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];

    $sql_2 = mysqli_query($connection, "UPDATE tbl_order SET 
      qty = $qty,
      price = $price,
      total = '$total',
      status = '$status',
      customer_name = '$customer_name',
      customer_contact = '$customer_contact',
      customer_email = '$customer_email',
      customer_address = '$customer_address'
      WHERE id = '$id' ");

    if($sql_2 == true){
      $_SESSION['update'] = "Successfully Updated";
      header('location:'.SITEURL."/admin/manage-order.php");
    }else{
      $_SESSION['update'] = "Failed to Update";
      header('location:'.SITEURL."/admin/manage-order.php");
    }
  }
?>

<?php require_once('partials/footer.php'); ?>