<?php require_once('partials-front/header-menu.php'); ?>
      <!-- Menu Area End here-->
      <!-- Search Area Start here-->
      <div class="take-order">
        <div class="container">
         <h2>Fill this form to confirm your order.</h2>
         <form class="m-width" action="" method="POST">
          <fieldset>
            <legend>Selected Food</legend>
            <div class="order">
              <div class="order-img">
                <img src="img/pizza.jpg" alt="Pizza">
              </div>
              <div class="order-des">
                <h3>Pizza</h3>
                <h4>$2.6</h4>
                <p>Quantity</p>
                <input type="number" name="inpt-number" value="1" required>
              </div>
            </div>
          </fieldset>
          <fieldset>
            <legend>Delivery Details</legend>
            <label for="f">Full Name</label><br>
            <input type="text" name="fname" id="f" placeholder="Full Name"><br>
            <label for="n">Phone Number</label><br>
            <input type="text" name="nmbr" id="n" placeholder="Your Number"><br>
            <label for="e">Email</label><br>
            <input type="email" name="email" id="e" placeholder="example@gmail.com"><br>
            <label for="a">Address</label><br>
            <textarea name="text_area" id="a" cols="30" rows="5" placeholder="Here your Address!"></textarea><br>
            <input class="sub-btn" type="submit" name="submit" value="submit">
          </fieldset>
         </form>
        </div>
      </div>
      <!-- Search Area End here-->
<?php require_once('partials-front/footer.php'); ?>