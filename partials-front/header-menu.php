<?php require_once('config/config.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>Food Restaurant</title>
</head>
<body>
  <header class="header-area">
    <div class="container">
      <!-- Menu Area Start here-->
      <div class="navbar">
        <div class="logo">
          <a href="index.html"><img src="img/logo.png" alt="logo"></a>
        </div>
        <nav class="menu">
          <ul>
            <li><a href="<?php echo SITEURL; ?>/index.php">home</a></li>
            <li><a href="categories.php">categories</a></li>
            <li><a href="foods.php">food</a></li>
            <li><a href="#">contact</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <!-- Header area end here -->