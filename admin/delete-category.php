<?php
  require_once('config.php');
  

  if(isset($_GET['id']) AND isset($_GET['image_name'])){

    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if($image_name != ""){

      $path = "../img/category/".$image_name;
      $remove = unlink($path);
      if($remove == false){
        
        $_SESSION['remove'] = "Failed to remove Category";
        header('location:'.SITEURL."/admin/manage-category.php");
        die();
      }
    }
    $sql = mysqli_query($connection, "DELETE FROM tbl_category WHERE id = '$id'");
    if($sql){
      $_SESSION['delete_category'] = "Successfully Deleted";
      header('location:'.SITEURL."/admin/manage-category.php");
    }else{
      $_SESSION['delete_category'] = "Failed to Delete";
      header('location:'.SITEURL."/admin/manage-category.php");
    }

  }else{
    header('location:'.SITEURL."/admin/manage-category.php");
  }

?>