<?php
  include_once('partials/header.php');

  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }


?>
<section class="main-content">
  <div class="container">
    <h1 class="text-center">Update Password</h1>
    <form class="tbl-info" action="" method="POST">
      <table>
        <tr>
          <td>Current Password:</td>
          <td><input type="password" name="current_password" placeholder="Current Password"></td>
        </tr>
        <tr>
          <td>New Password:</td>
          <td><input type="password" name="new_password" placeholder="New Password"></td>
        </tr>
        </tr>
        <tr>
          <td>Confirm Password:</td>
          <td><input type="password" name="confirm_password" placeholder="Confirm Password"></td>
        </tr>
        <tr>
          <td><input hidden type="text" name="id" value="<?php echo $id; ?>"></td>
          <td><input class="btn-primary" type="Submit" name="change" value="Change Password"></td>
        </tr>
      </table>
      <p class="success"><?php 
        if(isset($_SESSION['pwd_not_mt'])){
          echo $_SESSION['pwd_not_mt'];
          unset($_SESSION['pwd_not_mt']);
        }
      ?></p>
    </form>
  </div>
</section>
<?php
  if(isset($_POST['change'])){

      $id = $_POST['id'];
      $current_pass = md5($_POST['current_password']);
      $new_pass = md5($_POST['new_password']);
      $confirm_pass = md5($_POST['confirm_password']);
    
      $sql = mysqli_query($connection, "SELECT * FROM tbl_admin WHERE id= '$id' AND password= '$current_pass' ");

      if($new_pass == $confirm_pass){
        $sql2 = mysqli_query($connection, "UPDATE tbl_admin SET password = '$new_pass' WHERE id = '$id'");
        if($sql2){
          $_SESSION['change_pass'] = "Password Changes Successful";
          header('location:'.SITEURL."/admin/manage-admin.php");
        }else{
          $_SESSION['change_pass'] = "Fail to Change Password";
          header('location:'.SITEURL."/admin/update-password.php");
        }
      }else{
        $_SESSION['pwd_not_mt'] = "Password did not Matched";
        header('location:'.SITEURL."/admin/update-password.php");
      }
  }
?>
<?php include_once('partials/footer.php'); ?>