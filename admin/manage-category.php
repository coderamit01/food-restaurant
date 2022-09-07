<?php include_once('partials/header.php'); ?>

  <!-- Main Content area start here -->
  <section class="main-content">
    <div class="container">
      <h1 class="text-center">Manage Category</h1>
      <!-- Add Category button -->
      <a class="btn-primary" href="<?php echo SITEURL; ?>/admin/add-category.php">Add Category</a>
      <table class="tbl">
        <tr>
          <th>S.N</th>
          <th>Title</th>
          <th>Image</th>
          <th>Featured</th>
          <th>Active</th>
          <th>Category's Action</th>
        </tr>
        <?php
          $sql = mysqli_query($connection, "SELECT * FROM tbl_category");
          $sn = 1;
         
          while($rows = mysqli_fetch_assoc($sql)) : 
            $id = $rows['id'];
            $title = $rows['title'];
            $image_name = $rows['image_name'];
            $featured = $rows['featured'];
            $active = $rows['active'];
          
          ?>
          <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $title; ?></td>
            <td class="img-fit">
              <?php
                if($image_name != ""){
              ?>
              <img src="<?php echo SITEURL; ?>/img/category/<?php echo $image_name; ?>" >
              <?php
                }else{
                  echo "Image not Add";
                }
              ?>
            </td>
            <td><?php echo $featured; ?></td>
            <td><?php echo $active; ?></td>
            <td>
              <a class="btn-success" href="<?php echo SITEURL; ?>/admin/update-category.php?id=<?php echo $id; ?>">Update</a>
              <a class="btn-danger" href="<?php echo SITEURL; ?>/admin/delete-category.php?id=<?php echo $id; ?>& image_name=<?php echo $image_name; ?>">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
      <p class="success"><?php
        if(isset($_SESSION['add_title'])){
          echo $_SESSION['add_title'];
          unset($_SESSION['add_title']);
        }
        if(isset($_SESSION['delete_category'])){
          echo $_SESSION['delete_category'];
          unset($_SESSION['delete_category']);
        }
        if(isset($_SESSION['remove'])){
          echo $_SESSION['remove'];
          unset($_SESSION['remove']);
        }
        if(isset($_SESSION['updt_category'])){
          echo $_SESSION['updt_category'];
          unset($_SESSION['updt_category']);
        }
        if(isset($_SESSION['rmv_img'])){
          echo $_SESSION['rmv_img'];
          unset($_SESSION['rmv_img']);
        }
      ?></p>
    </div>
  </section>
  <!-- Main Content area End here -->

  <?php include_once('partials/footer.php'); ?>