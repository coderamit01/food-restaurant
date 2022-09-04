<?php
  include_once('partials/header.php');

  if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $username = $_POST['usrname'];
    $pass = md5($_POST['password']);

    $sql = mysqli_query($connection, "INSERT INTO tbl_admin (full_name, username, password) VALUES ('$fname', '$username', '$pass')");
    if($sql){
      //add session for show the message
      $_SESSION['add'] = "Admin Added Successfully";
      // $message = 'Admi added successfully';
      //Redirect page
      header('location:'.SITEURL."/admin/manage-admin.php");
    }else{
      //add session for show the message
      $_SESSION['add'] = "Failed to Add Admin";
      //Redirect page
      // $message = 'Admi added Failed';
      header('location:'.SITEURL."/admin/add-admin.php");
    }
  }
?>
<section class="main-content">
  <div class="container">
    <h1 class="text-center">Add Admin</h1>
    <form class="tbl-info" action="" method="POST">
      <table>
        <tr>
          <td>Full Name:</td>
          <td><input type="text" name="fname" placeholder="Your Name" required></td>
        </tr>
        <tr>
          <td>Username:</td>
          <td><input type="text" name="usrname" placeholder="example@gmail.com" required></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input type="password" name="password" required></td>
        </tr>
        </tr>
        <tr>
          <td class="collapse-2"></td>
          <td><input class="btn-primary" type="Submit" name="submit" value="Add Admin"></td>
        </tr>
      </table>
    </form>
    <p class="success"><?php 
        if(isset($_SESSION['add'])){
          echo $_SESSION['add'];
          unset($_SESSION['add']);
        }
        if(isset($_SESSION['delete'])){
          echo $_SESSION['delete'];
          unset($_SESSION['delete']);
        }
      ?></p>
  </div>
</section>
<?php include_once('partials/footer.php'); ?>