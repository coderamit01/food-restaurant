<?php require_once('partials/header.php'); ?>

  <!-- Main Content area start here -->
  <section class="main-content">
    <div class="container">
      <h1 class="text-center">Manage Admin</h1>
      <!-- Add Admin button -->
      <a class="btn-primary" href="add-admin.php">Add Admin</a>
      <table class="tbl">
        <tr>
          <th>S.N</th>
          <th>Full Name</th>
          <th>Username</th>
          <th>Actions</th>
        </tr>
        <?php 
          $sql = mysqli_query($connection, "SELECT * FROM tbl_admin");
          ;
          $sn = 1;//serial number
          while($rows = mysqli_fetch_assoc($sql)) : 
          $id = $rows['id'];
          $fname = $rows['full_name'];
          $username = $rows['username'];
          ?>
          <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $fname; ?></td>
            <td><?php echo $username; ?></td>
            <td>
              <a class="btn-primary" href="<?php echo SITEURL; ?>/admin/update-password.php?id=<?php echo $id; ?>">Change Password</a>
              <a class="btn-success" href="<?php echo SITEURL; ?>/admin/update-admin.php?id=<?php echo $id; ?>">Update Admin</a>
              <a class="btn-danger" href="<?php echo SITEURL; ?>/admin/delete-admin.php?id=<?php echo $id; ?>">Delete</a>
            </td>
          </tr>
          <?php endwhile; ?>
      </table>
      <p class="success"><?php 
        if(isset($_SESSION['add'])){
          echo $_SESSION['add'];
          unset($_SESSION['add']);
          
        }
        if(isset($_SESSION['delete'])){
          echo $_SESSION['delete'];
          unset($_SESSION['delete']);
        }
        
        if(isset($_SESSION['update'])){
          echo $_SESSION['update'];
          unset($_SESSION['update']);
        }
        
        if(isset($_SESSION['pwd_not_mt'])){
          echo $_SESSION['pwd_not_mt'];
          unset($_SESSION['pwd_not_mt']);
        }
        
        if(isset($_SESSION['change_pass'])){
          echo $_SESSION['change_pass'];
          unset($_SESSION['change_pass']);
        }
      ?></p>
    </div>
  </section>
  <!-- Main Content area End here -->

  <?php include_once('partials/footer.php'); ?>