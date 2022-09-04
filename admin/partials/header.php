<?php include_once('config.php'); 

  if(!isset($_SESSION['logout'])){
    header('location:'.SITEURL."/admin/logout.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/admin.css">
  <title>Admin Page</title>
</head>
<body>
  <!-- Header area Start here -->
  <header class="header-area">
    <div class="container">
    <!-- Menu area Start here -->
      <nav class="nav-menu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="manage-admin.php">admin</a></li>
          <li><a href="manage-category.php">category</a></li>
          <li><a href="manage-food.php">food</a></li>
          <li><a href="manage-order.php">order</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    <!-- Menu area End here -->
    </div>
  </header>
  <!-- Header area End here -->