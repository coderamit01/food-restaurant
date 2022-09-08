<?php include_once('partials/header.php'); ?>

  <!-- Main Content area start here -->
  <section class="main-content">
    <div class="container">
      <h1 class="text-center">Manage Food</h1>
      <!-- Add Food button -->
      <a class="btn-primary" href="<?php echo SITEURL; ?>/admin/add-food.php">Add Food</a>
      <table class="tbl">
        <tr>
          <th>S.N</th>
          <th>Title</th>
          <th>Price</th>
          <th>Image</th>
          <th>Featured</th>
          <th>Active</th>
          <th>Action's Food</th>
        </tr>
        <?php
          $sql = mysqli_query($connection, "SELECT * FROM tbl_food");
          $sn = 1;
          while($rows = mysqli_fetch_assoc($sql)) :
            $id = $rows['id']; 
            $title = $rows['title'];
            $price = $rows['price'];
            $image_name = $rows['image_name'];
            $featured = $rows['featured'];
            $active = $rows['active'];
          ?>
          <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $title; ?></td>
            <td><?php echo '$'.$price; ?></td>
            <td class="img-fit"><?php
              if($image_name != ""){
                ?>
                <img src="<?php echo SITEURL ?>/img/food/<?php echo $image_name; ?>" alt="">
                <?php
              }else{
                echo "Image Not Added Yet";
              }
            ?></td>
            <td><?php echo $featured ?></td>
            <td><?php echo $active; ?></td>
            <td>
              <a class="btn-success" href="<?php echo SITEURL; ?>/admin/update-food.php?id=<?php echo $id; ?>">Update</a>
              <a class="btn-danger" href="<?php echo SITEURL; ?>/admin/delete-food.php?id=<?php echo $id; ?> & image_name=<?php echo $image_name; ?>">Delete</a>
            </td>
          </tr>
          <?php endwhile; ?>
      </table>
      <p class="success"><?php
        if(isset($_SESSION['up_food'])){
          echo $_SESSION['up_food'];
          unset($_SESSION['up_food']);
        }
        if(isset($_SESSION['success_food'])){
          echo $_SESSION['success_food'];
          unset($_SESSION['success_food']);
        }
        if(isset($_SESSION['dlte_food'])){
          echo $_SESSION['dlte_food'];
          unset ($_SESSION['dlte_food']);
        }
        if(isset($_SESSION['fail_remv'])){
          echo $_SESSION['fail_remv'];
          unset ($_SESSION['fail_remv']);
        }
        if(isset($_SESSION['dlt_food'])){
          echo $_SESSION['dlt_food'];
          unset ($_SESSION['dlt_food']);
        }
      ?></p>
    </div>
  </section>
  <!-- Main Content area End here -->

  <?php include_once('partials/footer.php'); ?>