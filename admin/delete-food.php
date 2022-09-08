<?php

  require_once('config.php');

  if(isset($_GET['id']) AND isset($_GET['image_name'])){
    
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if($image_name != ""){

      // $path = "../img/food/".$image_name;
      $rmv = unlink("../img/food/".$image_name);
      if($rmv == false){
        
        $_SESSION['remove'] = "Failed to remove Category";
        header('location:'.SITEURL."/admin/manage-food.php");
        die();
      }
    }

    $sql = mysqli_query($connection, "DELETE FROM tbl_food WHERE id = '$id' ");

      if($sql){
        $_SESSION['dlte_food'] = "Successfully Deleted Food";
        header('location:'.SITEURL."/admin/manage-food.php");
      }else{
        $_SESSION['dlte_food'] = "Failed to Delete Food";
        header('location:'.SITEURL."/admin/manage-food.php");
      }

  }else{
    
    $_SESSION['dlt_food'] = "Failed to Delete";
    header('location:'.SITEURL."/admin/manage-food.php");
  }






?>