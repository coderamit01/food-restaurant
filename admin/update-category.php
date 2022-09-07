<?php
  require_once('partials/header.php'); 

  if(isset($_GET['id'])){

    $id = $_GET['id'];
    $sql = mysqli_query($connection, "SELECT * FROM tbl_category WHERE id = '$id'");
    if($rows = mysqli_fetch_assoc($sql)){
      $title = $rows['title'];
      $current_image = $rows['image_name'];
      $featured = $rows['featured'];
      $active = $rows['active'];
    }

  }
?>
  <section class="main-content">
    <div class="container">
      <h1 class="text-center">Update Category</h1>
      <form class="category-form" action="" method="POST" enctype="multipart/form-data">
      <table>
          <tr>
            <td><label for="t">Title: </label></td>
            <td><input type="text" name="title" id="t" value="<?php echo $title; ?>"></td>
          </tr>
          <tr>
            <td>Current Image :</td>
            <td class="img-fit">
              <?php
                if($current_image != ""){
                ?>
                <img src="<?php echo SITEURL; ?>/img/category/<?php echo $current_image; ?>" height="auto" width="80px" >
                <?php
                }else{
                  // $_SESSION['image_error'] = "Image not seleted";
                  echo "Image not Selected";
                }
                ?>
            </td>
          </tr>
          <tr>
            <td>New Image:</td>
            <td><input type="file" name="image" value="" ></td>
          </tr>
          <tr>
            <td><label for="f">Featured:</label></td>
            <td>
              <input <?php if($featured == "Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes" value="Yes">Yes

              <input <?php if($featured == "No"){echo "checked";} ?> type="radio" name="featured" value="No" value="No">No
            </td>
          </tr>
          <tr>
          <td><label for="a">Active:</label></td>
            <td>
              <input <?php if($active == "Yes"){echo "checked";} ?> type="radio" name="active" value="Yes" value="Yes">Yes

              <input <?php if($active == "No"){echo "checked";} ?> type="radio" name="active" value="No" value="No">No
            </td>
          </tr>
          <tr>
            <td>
              <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
            </td>
            <td><input class="btn-primary no-border" type="submit" name="update" value="Update Category"></td>
          </tr>
        </table>
      </form>
    </div>
  </section>

<?php
  if(isset($_POST['update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
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
            header('location:'.SITEURL."/admin/manage-category.php");
            die();
          }
          if($image_name != ""){
            $remove_path = "../img/category/".$current_image;
            $remove = unlink($remove_path);

            if($remove == false){
              $_SESSION['rmv_img'] = "Failed to Remove Image";
              header('location:'.SITEURL."/admin/manage-category.php");
              die();
            }
          }
      }else{
        $image_name = $current_image;
      }
    }else{
      $image_name = $current_image;
    }


    $sql2 = mysqli_query($connection, "UPDATE tbl_category SET title = '$title', image_name = '$image_name', featured = '$featured', active = '$active' WHERE id = '$id' ");
    if($sql2){
      $_SESSION['updt_category'] = "Successfully Updated";
      header('location:'.SITEURL."/admin/manage-category.php");
    }else{
      $_SESSION['updt_category'] = "Failed to Update";
      header('location:'.SITEURL."/admin/update-category.php");
    }
  }

?>


<?php require_once('partials/footer.php'); ?>