<?php include('./Backend/server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyCart | About</title>
        <link rel='stylesheet' type='text/css' href='./styles/aboutusstyles.css'>
        <style type="text/css">



        *{

          margin:0;
          padding:0;
          box-sizing: border-box;
        }


        .row{
          display: flex;
          align-items: center;
          flex-wrap:wrap;
          justify-content: space-around;

        }


        .small-container{

          max-width: 1080px;
          margin:auto;
          padding-left: 25px;
          padding-right: 25px;


        }

        .col-4{
          flex-basis: 25%;
          padding: 10px;
          min-width: 200px;
          margin-bottom: 50px;
        }

        .col-4 img{

        width: 100%;

        }

        .title{
          text-align: center;
          margin: 0 auto 80px;
          position: relative;
          line-height: 60px;
          color: #555;
        }

        .title::after{
          content:'';
          background:#ff523b;
          width: 80px;
          height: 5px;
          border-radius: 5px;
          position: absolute;
          bottom: 0;
          left: 50%;
          transform: translateX(-50%);
        }


        h4{

          color: #555;
          font-weight: normal;

        }

        .col-4 p{
            font-size: 14px;

           }

        .offer{
          background: radial-gradient(#fff,#ffd6d6);
          margin-top: 80px;

          padding:30px 0;

        }




        </style>

    </head>
    <body>

        <!-- Navbar -->
        <?php include('navbar.php'); ?>


        <h1 style="color:#D4AF37; font-size:4em; text-align:center;"> Who are we ?</h1>

        <p style="text-align:center;" > We are a set of university Students <br> <i>who are enthusiastic in implementing</i> <br><span style="color:#D4AF37;"><b>innovative web-based projects</b></span> <br>that will ease your lifestyle.</p>
          <br><br><br>
          <h1 style="text-align:center; color:#b2beb5; "><u> Meet our Developers</u> </h1>


<!-- Meet our developers section -->

          <div class="small-container">

            <div class="row ">

                <div class="col-4">
                  <img src="./images/developers/isuru.png" alt="" >

                  <p style="text-align:center;"><b>Isuru Vihan</b></p>



                </div>
                <div class="col-4">
                  <img src="./images/developers/avishka.png" alt="" >

                  <p style="text-align:center;"><b>Avishka</b></p>


                </div>
                <div class="col-4">
                  <img src="./images/developers/tolusha.png" alt="" >

                  <p style="text-align:center;"><b>Tolusha </b></p>


                </div>
                <div class="col-4">
                  <img src="./images/developers/piruna.png" alt="" >

                  <p style="text-align:center;"><b>Piruna </b></p>





                </div>

            </div>
          </div>



      <!--Contact us -->
      <span style="font-size:70px; padding:0; border:0;"><b><u style="color:#D4AF37;">What</u></b> </span><p style="font-size:40px; position:relative; left:70px;"> Drives us?</p>
          <p style="position:relative; left:70px;" > In a world where everything is digitalized, we seek for paths to develop <span> Web platforms </span> <br>
            That introduce easier ways to carry out your day to day activities.</p>

<br><br>

<p style="font-size:40px;  text-align:center;">We are on a <span style="color:#D4AF37;"> Mission </span>....... </p>
<p style="text-align:justify;text-align:center;">In An era where every second dramatic changes take place in many different aspects, <br>we consider it as a duty to
  keep you updated with the latest technologies. <br>It's the guiding principle behind our work, and reinforces our belief that the
  best technology <br> makes you smarter,puts you in control, and gives you access to the information you need.<br>That's why we are dedicated to
  developing easy to use technology that protects, <br> empowers, and has a meaningful impact on people, families and their
  communities. </p>

  <p style="font-size:40px;">Like to <span style="color:#D4AF37;"> Join Us? </span>....... </p>
  <p style="position:relative; left:30px;">Mobile:+94 072345323</p>
  <p style="position:relative; left:30px;">email @ easycartig@yahoo.com</p>

        <!-- Footer -->




        <?php include('footer.php'); ?>
    </body>
</html>
