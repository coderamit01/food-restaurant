<?php require_once('partials-front/header-menu.php'); ?>
      <!-- Menu Area End here-->
      <!-- Search Area Start here-->
      <div class="food-search">
        <div class="container">
          <form action="<?php echo SITEURL; ?>/foods-search.php" method="POST">
            <input type="search" name="search" placeholder="Search For Food...">
            <input class="btn-primary" type="submit" name="submit" value="Search">
          </form>
        </div>
      </div>
      <!-- Search Area End here-->
      <!-- Menu Area Start here-->
      <div class="menu-area">
        <div class="container">
          <h2>Food Menu</h2>
          <div class="food-menu">
            <?php 
              $sql_2 = mysqli_query($connection, "SELECT * FROM tbl_food WHERE active = 'Yes' AND featured = 'Yes' ");
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
                      <a class="btn-menu btn-primary" href="<?php echo SITEURL; ?>/order.php?food_id=<?php echo $id; ?>">Order Now</a>
                    </div>
                  </div>
                  <?php endwhile; ?>
                  <?php
                
              }else{
                echo "Nothing is Here!";
              }
            ?>
          </div>
      </div>
      <!-- Menu Area End here-->
      <?php require_once('partials-front/footer.php'); ?>