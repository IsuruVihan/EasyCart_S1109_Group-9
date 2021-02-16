<?php include('./Backend/server.php'); ?>
<!DOCTYPE HTML>  
<html>
    <head>
        <title>EasyCart | Home</title>
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="./styles/stylesforindex.css">
    </head>
    <body style="background: url('./images/doodle2')">
        <!-- Navbar -->
        <?php include('navbar.php'); ?>
    
        <?php if (isset($_SESSION['username'])): ?>
            <center>
                <div style="border: 3px solid black; margin: 2em; width: 20%; border-radius: 20px">
                    <center>
                        <h2 style="padding: 0.5em">Welcome <span style="color: #e0ac1c"><?php echo $_SESSION['username']; ?></span></h2>
                    </center>
                </div>
            </center>
        <?php endif ?>
    
        <!--------featured categories-------->

        <div class="categories">
            <div class="small-container">
                <h2 class="title">Popular Products</h2>
                <div class="row">
                    <div class="col-3">
                        <img src="./images/popular/i12.png" alt="" >
                        <p style="text-align:center;"><b>i phone 12</b></p>
                    </div>
                    <div class="col-3">
                        <img src="./images/popular/3.png" alt="" >
                        <p style="text-align:center;"><b>i Watch series 6</b></p>
                    </div>
                    <div class="col-3">
                        <img src="./images/popular/dell.png" alt="" >
                        <p style="text-align:center;"><b>Dell inspiron 5593</b></p>
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
                    <p style="text-align:center; color:red;"><b>Special Offer 15% on <br> Sampath Cards</b></p>
                    <p style="text-align:center;"><b> Rs.3500/=</b></p>
                </div>
                <div class="col-4">
                    <img src="./images/featured/2.png" alt="" >
                    <p style="text-align:center; color:red;"><b>Special Offer 15% on <br> Sampath Cards</b></p>
                    <p style="text-align:center;"><b>Rs.1500/=.</b></p>
                </div>
                <div class="col-4">
                    <img src="./images/featured/3.png" alt="" >
                    <p style="text-align:center; color:red;"><b>Special Offer 15% on <br> Sampath Cards</b></p>
                    <p style="text-align:center;"><b>Rs.13500/=</b></p>
                </div>
                <div class="col-4">
                    <img src="./images/featured/4.png" alt="" >
                    <p style="text-align:center; color:red;"><b>Special Offer 15% on <br> Sampath Cards</b></p>
                    <p style="text-align:center;"><b>Rs.5500/=</b></p>
                </div>
            </div>
        </div>

        <!--------Latest products-------->

        <div class="small-container">
            <h2 class="title">Latest Products</h2>
            <div class="row ">
                <div class="col-4">
                    <img src="./images/lastest/1.png" alt="" >
                    <p style="text-align:center;"><b>Amazon Echo</b></p>
                </div>
                <div class="col-4">
                    <img src="./images/lastest/2.png" alt="" >
                    <p style="text-align:center;"><b>Go Pro Camera</b></p>
                </div>
                <div class="col-4">
                    <img src="./images/lastest/3.png" alt="" >
                    <p style="text-align:center;"><b>Polo Ralph Lauren T shirts</b></p>
                </div>
                <div class="col-4">
                    <img src="./images/lastest/4.png" alt="" >
                    <p style="text-align:center;"> <b>UnderArmour Shoes</b></p>
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
                        <p><b>Exclusively Available on Easy Cart.(Stocks are limited)</b></p>
                        <h1><b>Beats Headset By Dr.Dre</b></h1>
                        <small>
                            <ul>
                                <li><b>Up to 15 hours of listening time</b></li>
                                <li><b>Sweat & water resistant</b></li>
                                <li><b>Adjustable, secure-fit earhooks</b></li>
                                <li><b>Streamlined, round cable</b></li>
                            </ul>
                        </small>
                        <a href="./products.php" class="btn"><b>Buy Now &#8594;</b></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include('footer.php'); ?>
    </body>
</html>
