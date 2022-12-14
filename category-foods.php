<?php
  require_once('partials-front/header-menu.php'); 

  if(isset($_GET['category_id'])){
    $category_id = $_GET['category_id'];
    $sql = mysqli_query($connection, "SELECT title FROM tbl_category WHERE id = '$category_id'");
    $rows = mysqli_fetch_assoc($sql);
    $category_title = $rows['title'];
  }


?>
      <!-- Menu Area End here-->
      <!-- Search Area Start here-->
      <div class="food-search">
        <div class="container">
         <h2>Foods On <span>"<?php echo $category_title; ?>"</span></h2>
        </div>
      </div>
      <!-- Search Area End here-->
      <!-- Menu Area Start here-->
      <div class="menu-area">
        <div class="container">
          <h2>Food Menu</h2>
          <div class="food-menu">
            <?php 
              $sql_2 = mysqli_query($connection, "SELECT * FROM tbl_food WHERE category_id = $category_id ");
              $count2 = mysqli_num_rows($sql_2);
              if($count2 > 0){
                while($rows2 = mysqli_fetch_assoc($sql_2)) :
                  $id = $rows2['id'];
                  $title = $rows2['title'];
                  $price = $rows2['price'];
                  $description = $rows2['description'];
                  $image_name = $rows2['image_name'];  ?>

                  <div class="col-6">
                    <div class="food-img">
                      <?php 
                        if($image_name != ""){
                          ?>
                          <img src="<?php echo SITEURL; ?>/img/food/<?php echo $image_name; ?>" alt="burger">
                          <?php
                        }else{
                          echo "Image not Found";
                        }
                      ?>
                    </div>
                    <div class="food-des">
                      <h3><?php echo $title; ?></h3>
                      <h4><?php echo '$'.$price; ?></h4>
                      <p><?php echo $description; ?></p>
                      <a class="btn-menu btn-primary" href="order.php">Order Now</a>
                    </div>
                  </div>
                  <?php endwhile; ?>
                  <?php
                
              }else{
                echo "Food Not Avilable!";
              }
            ?>
          </div>
         <p class="text-center" ><a href="">See All Food</a></p>
        </div>
      </div>
      <!-- Menu Area End here-->
      <!-- Footer Area Start here-->
      <footer class="footer-area">
        <div class="container">
          <div class="social-icon">
            <a href=""><i class="fa-brands fa-facebook-f"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
          </div>
          <p>All rights reserved. Designed By <span>Amit</span></p>
        </div>
      </footer>
      <!-- Footer Area End here-->
</body>
</html>