<?php
  require_once('partials-front/header-menu.php'); 

  if(isset($_GET['food_id'])){
    $food_id = $_GET['food_id'];
    $sql = mysqli_query($connection, "SELECT * FROM tbl_food WHERE id = '$food_id'");
    $rows = mysqli_fetch_assoc($sql);
    $title = $rows['title'];
    $price = $rows['price'];
    $image_name = $rows['image_name'];
  }else{
    echo "Not Avilable";
  }


?>
      <!-- Menu Area End here-->
      <!-- Search Area Start here-->
      <div class="take-order">
        <div class="container">
          <h2>Fill this form to confirm your order.</h2>
          <form class="m-width" action="" method="POST">
            <fieldset>
              <legend>Selected Food</legend>
              <div class="order">
                <div class="order-img">
                  <?php 
                    if($image_name != ""){
                      ?>
                      <img src="<?php echo SITEURL; ?>/img/food/<?php echo $image_name; ?>" alt="Pizza">
                      <?php
                    }else{
                      echo "Image not added";
                    }
                  ?>
                </div>
                <div class="order-des">
                  <h3><?php echo $title; ?></h3>
                  <input type="hidden" name="food" value="<?php echo $title; ?>">
                  <h4 class="price-clr"><?php echo '$'.$price; ?></h4>
                  <input type="hidden" name="price" value="<?php echo $price; ?>">
                  <p>Quantity</p>
                  <input type="number" name="qty" value="1" required>
                </div>
              </div>
            </fieldset>
            <fieldset>
              <legend>Delivery Details</legend>
              <label for="f">Full Name</label><br>
              <input type="text" name="customer_name" id="f" placeholder="Full Name"><br>
              <label for="n">Phone Number</label><br>
              <input type="text" name="customer_contact" id="n" placeholder="Your Number"><br>
              <label for="e">Email</label><br>
              <input type="email" name="customer_email" id="e" placeholder="example@gmail.com"><br>
              <label for="a">Address</label><br>
              <textarea name="customer_address" id="a" cols="30" rows="5" placeholder="Here your Address!"></textarea><br>
              <input class="sub-btn" type="submit" name="submit" value="Submit">
            </fieldset>
          </form>
        </div>
      </div>
      <!-- Search Area End here-->
<?php 
  if(isset($_POST['submit'])){
    $food = $_POST['food'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $price * $qty;
    $date = date("Y-m-d");
    $status = "Ordered";
    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];

    $sql_2 = mysqli_query($connection, "INSERT INTO tbl_order(food, price, qty, total, order_date, status, customer_name, customer_contact, customer_email, customer_address) VALUES ('$food', $price, $qty, $total, '$date', '$status', '$customer_name', '$customer_contact', '$customer_email', '$customer_address')");

    if($sql_2 == true){
      $_SESSION['insert_food'] = "Order Successful";
      header('location:'.SITEURL);
    }else{
      $_SESSION['insert_food'] = "Failed to Ordered";
      header('location:'.SITEURL);
    }

  }

?>
<?php require_once('partials-front/footer.php'); ?>