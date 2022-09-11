
<?php include_once('partials/header.php'); ?>
  <!-- Main Content area start here -->
  <section class="main-content">
    <div class="container">
      <h1 class="text-center">Dashboard</h1>
      <P class="success"><?php
        if(isset($_SESSION['login'])){
          echo $_SESSION['login'];
          unset ($_SESSION['login']);
        }
      ?></P>
      <div class="box">
        <div class="box-4">
          <?php
          $sql = mysqli_query($connection, "SELECT * FROM tbl_category");
          $count = mysqli_num_rows($sql);
          ?>
          <h2><?php echo $count; ?></h2>
          <h4>Categories</h4>
        </div>
        <div class="box-4">
          <?php
          $sql2 = mysqli_query($connection, "SELECT * FROM tbl_food");
          $count2 = mysqli_num_rows($sql2);
          ?>
          <h2><?php echo $count2; ?></h2>
          <h4>Food</h4>
        </div>
        <div class="box-4">
          <?php
          $sql3 = mysqli_query($connection, "SELECT * FROM tbl_order");
          $count3 = mysqli_num_rows($sql3);
          ?>
          <h2><?php echo $count3; ?></h2>
          <h4>Orders</h4>
        </div>
        <div class="box-4">
          <?php 
            $sql4 = mysqli_query($connection, "SELECT sum(total) AS Total FROM tbl_order WHERE status= 'Delivered' ");
            $rows = mysqli_fetch_assoc($sql4);
            $total_revenue = $rows['Total'];
          ?>
          <h2>$<?php echo $total_revenue; ?></h2>
          <h4>Revenue Generated</h4>
        </div>
      </div>
    </div>
  </section>
  <!-- Main Content area End here -->

<?php include_once('partials/footer.php'); ?>