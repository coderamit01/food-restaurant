<?php 
  require_once('partials/header.php'); 
  // get all data from form
  if(isset($_POST['submit'])){
    $title = $_POST['title'];
    if(isset($_POST['feature'])){
      $feature = $_POST['feature'];
    }else{
      $feature = "No";
    }
    if(isset($_POST['active'])){
      $active = $_POST['active'];
    }else{
      $active = "No";
    }
    if(isset($_FILES['image']['name'])){

      $image_name = $_FILES['image']['name'];
      if($image_name != ""){
        $ext = end(explode('.', $image_name));
        $image_name = "food_category_".rand(000, 999).'.'.$ext;
  
        $source_fath = $_FILES['image']['tmp_name'];
  
        $destination_path = "../img/category/".$image_name;
  
        $upload = move_uploaded_file($source_fath, $destination_path);
        if($upload == false){
          $_SESSION['upload'] = "Failled to Upload";
          header('location:'.SITEURL."/admin/add-category.php");
          die();
        }

      }

    }else{
      $image_name = "";
    }
    //Insert the data into database
    $sql = mysqli_query($connection, "INSERT INTO tbl_category (title, image_name, featured, active) VALUE ('$title', '$image_name' ,'$feature', '$active')");
    if($sql){
      $_SESSION['add_title'] = "Successfully Added";
      header('location:'.SITEURL."/admin/manage-category.php");
    }else{
      $_SESSION['add_title'] = "Failed to Added";
      header('location:'.SITEURL."/admin/add-category.php");
    }
  }

?>
  <header class="main-content">
    <div class="container">
      <h1 class="text-center">Add Category</h1>
      <form class="category-form tbl-info" action="" method="POST" enctype="multipart/form-data">
        <table>
          <tr>
            <td><label for="t">Title: </label></td>
            <td><input type="text" name="title" id="t" placeholder="Category Title"></td>
          </tr>
          <tr>
            <td>Select Image:</td>
            <td><input type="file" name="image" ></td>
          </tr>
          <tr>
            <td><label for="f">Featured:</label></td>
            <td>
              <input type="radio" name="feature" value="Yes">Yes
              <input type="radio" name="feature" value="No">No
            </td>
          </tr>
          <tr>
          <td><label for="a">Active:</label></td>
            <td>
              <input type="radio" name="active" value="Yes">Yes
              <input type="radio" name="active" value="No">No
            </td>
          </tr>
          <tr>
            <td></td>
            <td><input class="btn-primary no-border" type="submit" name="submit" value="Add Category"></td>
          </tr>
        </table>
      </form>
      <p class="success"><?php
        if(isset($_SESSION['add_title'])){
          echo $_SESSION['add_title'];
          unset($_SESSION['add_title']);
        }
        if(isset($_SESSION['upload'])){
          echo $_SESSION['upload'];
          unset($_SESSION['upload']);
        }
      ?></p>
    </div>
  </header>



<?php require_once('partials/footer.php'); ?>