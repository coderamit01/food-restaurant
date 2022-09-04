
<?php include_once('partials/header.php'); ?>
  <!-- Main Content area start here -->
  <section class="main-content">
    <div class="container">
      <h1 class="text-center">Dashboard</h1>
      <P class="success"><?php
        if(isset($_SESSION['login'])){
          echo $_SESSION['login'];
          unset ($_SESSION['login']);
        }
      ?></P>
      <div class="box">
        <div class="box-4">
          <h2>5</h2>
          <h4>Category</h4>
        </div>
        <div class="box-4">
          <h2>5</h2>
          <h4>Category</h4>
        </div>
        <div class="box-4">
          <h2>5</h2>
          <h4>Category</h4>
        </div>
        <div class="box-4">
          <h2>5</h2>
          <h4>Category</h4>
        </div>
      </div>
    </div>
  </section>
  <!-- Main Content area End here -->

<?php include_once('partials/footer.php'); ?>