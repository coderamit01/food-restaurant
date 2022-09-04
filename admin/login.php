<?php
  require_once('config.php');

  if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = mysqli_query($connection, "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password' ");
    $count =  mysqli_num_rows($sql);
    if($count == 1){
      $_SESSION['login'] = "Successfully Log In";
      $_SESSION['logout'] = $username;
      header('location:'.SITEURL."/admin");
    }else{
      $_SESSION['login'] = "Failed to Log In";
      header('location:'.SITEURL."/admin");
    }
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/admin.css">
  <title>Log In</title>
</head>
<body>
  <header class="main-content">
    <div class="container">
      <div class="log-info">
        <h2 class="text-center">Log In</h2>
        <form class="form-center" action="" method="POST">
          <label for="u">Username</label><br>
          <input type="text" name="username" id="u"><br>
          <label for="p">Password</label><br>
          <input type="password" name="password" id="p"><br>
          <div class="input-center"><input class="btn-danger" type="submit" name="login" value="Log In"></div>
        </form>
      </div>
    </div>
  </header>
</body>
</html>