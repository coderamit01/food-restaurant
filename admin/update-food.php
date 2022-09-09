<?php 
  require_once('partials/header.php'); 
  if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = mysqli_query($connection, "SELECT * FROM tbl_food WHERE id = '$id'");

    if($rows = mysqli_fetch_assoc($sql)){
      $id = $rows['id'];
      $title = $rows['title'];
      $current_image = $rows['image_name'];
      $description = $rows['description'];
      $price = $rows['price'];
      $current_category = $rows['category_id'];
      $featured = $rows['featured'];
      $active = $rows['active'];

    }
  }
?>

<section class="main-content">
  <div class="container">
    <h2 class="text-center">Update Food</h2>
    <form class="tbl-info form-padding" action="" method="POST" enctype="multipart/form-data">
        <table>
          <tr>
            <td>Food Title: </td>
            <td><input type="text" name="title" value="<?php echo $title; ?>"></td>
          </tr>
          <tr>
            <td>Description: </td>
            <td><textarea class="text-area-brdr" name="description" cols="23" rows="3" ><?php echo $description; ?></textarea></td>
          </tr>
          <tr>
            <td>Price: </td>
            <td><input type="number" name="price" value="<?php echo $price; ?>"></td>
          </tr>
          <tr>
            <td>Current Image: </td>
            <td class="img-fit">
              <?php
              if($current_image != ""){
              ?>
               <img src="<?php echo SITEURL; ?>/img/food/<?php echo $current_image; ?>" height="auto" width="80px">
              <?php 
              }else{
                echo "Image Not Added Yet";
              }

              ?>
            </td>
          </tr>
          <tr>
            <td>Select Image: </td>
            <td><input type="file" name="image"></td>
          </tr>
          <tr>
            <td>Category: </td>
            <td>
              <select class="slct-catgry" name="category" >
                <?php 
                  $info = mysqli_query($connection, "SELECT * FROM tbl_category WHERE active = 'Yes'");
                  $count = mysqli_num_rows($info);
                  if($count > 0){
                    
                    while($rows_1 = mysqli_fetch_assoc($info)){
                      $category_title = $rows_1['title'];
                      $id_2 = $rows_1['id']; ?>
                     <option <?php if($current_category == $id_2){echo "selected";} ?> value="<?php echo $id_2; ?>"><?php echo $category_title; ?></option>
                      <?php
                    }
                  }else{
                    echo "<option value='0'>Not Found</option>";
                  }
                 ?>
                 <!-- <option value="0">Not Found</option> -->
              </select>
            </td>
          </tr>
          <tr>
            <td>Feature: </td>
            <td>
              <input <?php if($featured == "Yes"){echo "checked"; } ?> type="radio" name="feature" value="Yes">Yes
              <input <?php if($featured == "No"){echo "checked"; } ?> type="radio" name="feature" value="No">No
            </td>
          </tr>
          <tr>
            <td>Active: </td>
            <td>
              <input <?php if($active == "Yes"){echo "checked"; } ?> type="radio" name="active" value="Yes">Yes
              <input <?php if($active == "No"){echo "checked"; } ?> type="radio" name="active" value="No">No
            </td>
          </tr>
          <tr>
            <td>
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
            </td>
            <td><input class="btn-primary no-border" type="submit" name="update" value="Update Food"></td>
          </tr>
        </table>
      </form>
  </div>
</section>
<?php 
  if(isset($_POST['update'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['feature'];
    $category = $_POST['category'];
    $active = $_POST['active'];
    if(isset($_FILES['image']['name'])){

      $image_name = $_FILES['image']['name'];
      if($image_name != ""){
        $ext = end(explode('.', $image_name));
          $image_name = "food_category_".rand(000, 999).'.'.$ext;
    
          $source_fath = $_FILES['image']['tmp_name'];
    
          $destination_path = "../img/food/".$image_name;
    
          $upload = move_uploaded_file($source_fath, $destination_path);
          if($upload == false){
            $_SESSION['upload'] = "Failled to Upload";
            header('location:'.SITEURL."/admin/manage-food.php");
            die();
          }
          if($current_image != ""){
            $remove_path = "../img/food/".$current_image;
            $remove = unlink($remove_path);

            if($remove == false){
              $_SESSION['rmv_img'] = "Failed to Remove Image";
              header('location:'.SITEURL."/admin/manage-food.php");
              die();
            }
          }
      }else{
        $image_name = $current_image;
      }
    }else{
      $image_name = $current_image;
    }

    $sql_3 = mysqli_query($connection, "UPDATE tbl_food SET
      title = '$title',
      description = '$description',
      price = $price,
      image_name = '$image_name',
      category_id = '$category',
      featured = '$featured',
      active = '$active' WHERE id = '$id'
    ");
    if($sql_3){
      $_SESSION['scs_update'] = "Successfuly Updated";
      header('location:'.SITEURL."/admin/manage-food.php");
    }else{
      $_SESSION['scs_update'] = "Failed to Update";
      header('location:'.SITEURL."/admin/update-food.php");
    }
  }


?>

<?php require_once('partials/footer.php'); ?>