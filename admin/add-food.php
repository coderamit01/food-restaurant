<?php require_once('partials/header.php'); ?>

  <section class="main-area">
    <div class="container">
      <h2 class="text-center">Add Category</h2>
      <form class="tbl-info form-padding" action="" method="POST" enctype="multipart/form-data">
        <table>
          <tr>
            <td>Food Title: </td>
            <td><input type="text" name="title" placeholder="Food Title"></td>
          </tr>
          <tr>
            <td>Description: </td>
            <td><textarea class="text-area-brdr" name="description" cols="23" rows="3" placeholder="Type your description here!"></textarea></td>
          </tr>
          <tr>
            <td>Price: </td>
            <td><input type="number" name="price" ></td>
          </tr>
          <tr>
            <td>Select Image: </td>
            <td><input type="file" name="image"></td>
          </tr>
          <tr>
            <td>Category: </td>
            <td>
              <select class="slct-catgry" name="category">
              <?php
                $sql = mysqli_query($connection, "SELECT * FROM tbl_category WHERE active = 'Yes' ");
                $count = mysqli_num_rows($sql);
                if($count > 0){

                  while($rows = mysqli_fetch_assoc($sql)) : 
                    $id = $rows['id'];
                    $title = $rows['title'];
                  ?>
                  <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                  <?php endwhile; ?>
                  <?php
                }else{
                  ?>
                  <option value="0">Not Found</option>
                  <?php
                }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>Feature: </td>
            <td>
              <input type="radio" name="feature" value="Yes">Yes
              <input type="radio" name="feature" value="No">No
            </td>
          </tr>
          <tr>
            <td>Active: </td>
            <td>
              <input type="radio" name="active" value="Yes">Yes
              <input type="radio" name="active" value="No">No
            </td>
          </tr>
          <tr>
            <td><input class="btn-primary no-border" type="submit" name="submit" value="Add Food"></td>
          </tr>
        </table>
      </form>
    </div>
  </section>
      <?php
        if(isset($_SESSION['up_food'])){
          echo $_SESSION['up_food'];
          unset($_SESSION['up_food']);
        }
      ?>
<?php

  if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    
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
        $image_name = "food_image_".rand(000, 999).'.'.$ext;
  
        $source_fath = $_FILES['image']['tmp_name'];
  
        $destination_path = "../img/food/".$image_name;
  
        $upload = move_uploaded_file($source_fath, $destination_path);
        if($upload == false){
          $_SESSION['up_food'] = "Failled to Upload Food Image";
          header('location:'.SITEURL."/admin/add-food.php");
          die();
        }

      }
    }else{
      $image_name = "";
    }

    $info = "INSERT INTO tbl_food(title, description, price, image_name, category_id, featured, active) VALUES ('$title', '$description', '$price ', '$image_name', '$category', '$feature', '$active')";
    $sql2 = mysqli_query($connection, $info);

    if($sql2){
      $_SESSION['success_food'] = "Successful";
      header('location:'.SITEURL."/admin/manage-food.php");
    }else{
      $_SESSION['success_food'] = "Failed";
      header('location:'.SITEURL."/admin/add-food.php");
    }

  }

?>


<?php require_once('partials/footer.php'); ?>