<?php include('./Backend/server.php'); ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>EasyCart | Home</title>
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="./styles/stylesforindex.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    	<link rel="preconnect" href="https://fonts.gstatic.com" />
  		<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@300;500;700&display=swap" rel="stylesheet" />
    </head>
    <body>
        <!-- Navbar -->
        <?php include('navbar.php'); ?>

        <?php if(isset($_SESSION['success'])): ?>
            <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            ?>
        <?php endif ?>

        <?php if (isset($_SESSION['username'])): ?>
            <p>Welcome <?php echo $_SESSION['username']; ?></p>
            <p><a href="index.php?logout='1'" name="logout">Logout</a></p>
        <?php endif ?>


        </div>
        <!--------featured categories-------->

        <div class="categories">
          <div class="small-container">
              <h2 class="title">Popular Products</h2>
          <div class="row">
              <div class="col-3">
                <img src="./images/popular/i12.png" alt="" >
              <p style="text-align:center;">i phone 12</p>
              </div>
              <div class="col-3">
              <img src="./images/popular/3.png" alt="" >
              <p style="text-align:center;">i Watch series 6</p>
              </div>
              <div class="col-3">
              <img src="./images/popular/dell.png" alt="" >
              <p style="text-align:center;">Dell inspiron 5593</p>
              </div>

          </div>

          </div>


        </div>

        <!--------featured products-------->

        <div class="small-container">
          <h2 class="title">Featured Products</h2>
          <div class="row ">

              <div class="col-4">
                <img src="./images/featured/1.png" alt="" >
                <p style="text-align:center; color:red;">Special Offer 15% on <br> Sampath Cards</p>
                <p style="text-align:center;"> Rs.3500/=</p>


              </div>
              <div class="col-4">
                <img src="./images/featured/2.png" alt="" >
                <p style="text-align:center; color:red;">Special Offer 15% on <br> Sampath Cards</p>
                <p style="text-align:center;">Rs.1500/=.</p>


              </div>
              <div class="col-4">
                <img src="./images/featured/3.png" alt="" >
                <p style="text-align:center; color:red;">Special Offer 15% on <br> Sampath Cards</p>
                <p style="text-align:center;">Rs.13500/=</p>


              </div>
              <div class="col-4">
                <img src="./images/featured/4.png" alt="" >
                <p style="text-align:center; color:red;">Special Offer 15% on <br> Sampath Cards</p>
                <p style="text-align:center;">Rs.5500/=</p>


              </div>

          </div>
        </div>

        <!--------Latest products-------->

        <div class="small-container">
          <h2 class="title">Latest Products</h2>
          <div class="row ">

              <div class="col-4">
                  <img src="./images/lastest/1.png" alt="" >
                  <p style="text-align:center;">Amazon Echo</p>


              </div>
              <div class="col-4">
                <img src="./images/lastest/2.png" alt="" >
                <p style="text-align:center;">Go Pro Camera</p>


              </div>
              <div class="col-4">
                <img src="./images/lastest/3.png" alt="" >
                <p style="text-align:center;">Polo Ralph Lauren T shirts</p>


              </div>
              <div class="col-4">
                <img src="./images/lastest/4.png" alt="" >
                <p style="text-align:center;"> UnderArmour Shoes</p>


              </div>

          </div>
        </div>

        <!--------Offers-------->

        <div class="offer">

          <div class="small-container">
            <div class="row">

                <div class="col-2">
                  <img id="offer" src="./images/beats.png" >
                </div>
                <div class="col-2">
                  <p>Exclusively Available on Easy Cart.(Stocks are limited)</p>
                  <h1>Beats Headset By Dr.Dre</h1>
                  <small>
                    <ul><li>Up to 15 hours of listening time</li>
<li>Sweat & water resistant</li>
<li>Adjustable, secure-fit earhooks</li>
<li>Streamlined, round cable</li></ul></small>
                  <a href="" class="btn">Buy Now &#8594;</a>
                </div>
            </div>
          </div>



        </div>




        <!-- Footer -->
        <?php include('footer.php'); ?>
    </body>
</html>
