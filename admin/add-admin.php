<?php
  include_once('partials/header.php'); 

  if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $username = $_POST['usrname'];
    $pass = md5($_POST['password']);

    $sql = mysqli_query($connection, "INSERT INTO tbl_admin (full_name, username, password) VALUES ('$fname', '$username', '$pass')");

  }
?>
<section class="main-content">
  <div class="container">
    <h1 class="text-center">Add Admin</h1>
    <form class="tbl-info" action="" method="POST">
      <table>
        <tr>
          <td>Full Name:</td>
          <td><input type="text" name="fname" placeholder="Your Name"></td>
        </tr>
        <tr>
          <td>Username:</td>
          <td><input type="text" name="usrname" placeholder="example@gmail.com"></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input type="password" name="password"></td>
        </tr>
        </tr>
        <tr>
          <td class="collapse-2"></td>
          <td><input class="btn-primary" type="Submit" name="submit" value="Add Admin"></td>
        </tr>
      </table>
    </form>
  </div>
</section>
<?php include_once('partials/footer.php'); ?>