<?php 
  require_once('config.php');
  $id = $_GET['id'];
  $sql = mysqli_query($connection, "DELETE FROM tbl_admin WHERE id = '$id' ");
  
  if($sql){
    $_SESSION['delete'] = "Successfully Deleted";
    header('location:'.SITEURL."/admin/manage-admin.php");
  }else{
    $_SESSION['delete'] = "Failed to Deleted";
    header('location:'.SITEURL."/admin/manage-admin.php");
  }


?>
