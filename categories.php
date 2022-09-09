<?php require_once('partials-front/header-menu.php'); ?>
     <!-- Category Area Start here-->
     <div class="category">
      <div class="container">
        <h2>Explore Foods</h2>
        <div class="box">
          <?php
            $sql = mysqli_query($connection,"SELECT * FROM tbl_category WHERE active ='Yes' ");
            $count = mysqli_num_rows($sql);
            if($count > 0){
              while($rows = mysqli_fetch_assoc($sql)) :
                $id = $rows['id'];
                $title = $rows['title'];
                $image_name = $rows['image_name']; ?>

                <div class="another-box">
                  <a href="<?php echo SITEURL; ?>/category-foods.php?category_id=<?php echo $id; ?>">
                    <div class="box-3">
                      <?php 
                        if($image_name != ""){
                          ?>
                          <img src="<?php echo SITEURL; ?>/img/category/<?php echo $image_name; ?>" alt="pizza">
                          <?php
                        }else{
                          echo "Image not Added";
                        }
                      ?>
                      <h3><?php echo $title; ?></h3>
                    </div>
                  </a>
                </div>
                <?php endwhile; ?>
                <?php
            }else{
              echo "No Categories Avilable";
            }
          ?>
        </div>
      </div>
    </div>
    <!-- Category Area End here-->  
    <?php require_once('partials-front/footer.php'); ?>