<?php
  include_once('partials/header.php');

  $id = $_GET['id'];
  $sql = mysqli_query($connection, "SELECT * FROM tbl_admin WHERE id = '$id' ");
  
  if($rows = mysqli_fetch_assoc($sql)){
    $fname = $rows['full_name'];
    $username = $rows['username'];
  }else{

  }


?>
<section class="main-content">
  <div class="container">
    <h1 class="text-center">Update Admin</h1>
    <form class="tbl-info" action="" method="POST">
      <table>
        <tr>
          <td>Full Name:</td>
          <td><input type="text" name="fname" value="<?php echo $fname; ?>"></td>
        </tr>
        <tr>
          <td>Username:</td>
          <td><input type="text" name="usrname" value="<?php echo $username; ?>"></td>
        </tr>
        <tr>
          <td><input hidden type="text" name="id" value="<?php echo $id; ?>"></td>
          <td><input class="btn-primary" type="Submit" name="update" value="Update Admin"></td>
        </tr>
      </table>
    </form>
  </div>
</section>
<?php
  if(isset($_POST['update'])){
      $id = $_POST['id'];
      $fname = $_POST['fname'];
      $username = $_POST['usrname'];

      $info = mysqli_query($connection, "UPDATE tbl_admin SET full_name='$fname', username= '$username' WHERE id= '$id' ");

    if($info){
      $_SESSION['update'] = "Updated Successfully";
      header('location:'.SITEURL."/admin/manage-admin.php");
    }else{
      $_SESSION['update'] = "Failled to Update";
      header('location:'.SITEURL."/admin/update-admin.php");
    }
  
  }
?>
<?php include_once('partials/footer.php'); ?>