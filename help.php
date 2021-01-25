<?php include('./Backend/server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyCart | Help</title>
        <link rel="stylesheet" type="text/css" href="./styles/navbar.css">
        <!-- <link rel="stylesheet" type="text/css" href="./styles/stylesfaq.css"> -->
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>

        <style type="text/css">

        @import url('https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2:wght@500&display=swap');

        body{

        	font-family: 'Baloo Bhaina 2', cursive;
          background-image: url('./images/a.png');
          height: 100%;
          background-position: center;
         background-repeat: no-repeat;
         background-size: cover;

        }



        .fluid-container{

        	width: 40%;
        	margin: 0 auto;
        	margin-top:10px;
        }

        .fluid-container h2{

        		color:#3a3b3c;
        		position: relative;
        		width: 	23rem;

        	}

         .fluid-container h2::after{
        	content:"";
        	position:absolute;
        	bottom:0;
        	right: 12px;
        	width:67px;
        	height: 2px;
        	background-color:#3a3b3c;

        }

        .accordian{
        	width: 	100%;
        	padding: 0 5px;
        	border:2px solid #333333		;
        	cursor: pointer;
        	border-radius: 	50px;
        	display:flex;
        	margin: 10px 0;
        	align-items: center;
        }

        .accordian .icon{
        	margin: 0 10px 0 0;
        	width:30px;
        	height:30px;
        	background: url(plus.png) no-repeat 8px 7px #CC9933;
        	border-radius: 	50%;
        	float: 	left;
        	transition: 	all .5s ease-in;
        }


        .accordian h5{
        	font-size: 	16px;
        	margin:0;
        	padding:3px 0 0 0 ;
        	font-weight:normal;
        	color: 	#ffffff;
        }


        .panel{
        	padding: 0 15px;
        	border-left: 1px solid	#6db5ff;
        	margin-left: 	25px;
        	font-size: 	14px;
        	text-align:justify;
        	overflow: hidden;
        	max-height: 0;
        	transition: all .5s ease-in	;
        }

.panel p {
  color:#000000;
}



        </style>

    </head>
    <body>
        <!-- Navbar -->

        <?php include('navbar.php'); ?>


        <div class="container">





          	<div class="fluid-container">
          		<h2> Frequently Asked Questions	</h2>
          	 <div class="accordian">
          	 	<div class="icon"></div>
          	 	<h5>How can I select the item category which <br> I need ?</h5>
          	 </div>



          	 	<div class="panel">

          		<p>The "Products" page has a filter option. Then select the desired category and click the "Filter" button. The system will then show you the items related to the category you want.</p>

          	</div>

          	 <div class="accordian">
          	 	<div class="icon"></div>
          	 	<h5>What is the payment method which  I can use for <br> buy items ?</h5>
          	 </div>



          	 	<div class="panel">

          		<p>You are allowed to pay by card payment or "cash on delivery".</p>

          	</div>

          		 <div class="accordian">
          	 	<div class="icon"></div>
          	 	<h5>Is it mandatory for the card to be in my name when <br> paying by using card payments method?</h5>
          	 </div>



          	 	<div class="panel">

          		<p>No.The card does not required to be in your name. You can make payments using someone else's card with the cardholder's permission. But you must be able to provide accurate information including the card number</p>



          	</div>


            <div class="accordian">
            <div class="icon"></div>
            <h5>Can I reject an item which I purchased ?
            <br><br></h5>
            </div>



            <div class="panel">

            <p>The only reason you are allowed to reject an item you have purchased is because the item is damaged.</p>

            </div>


            <div class="accordian">
            <div class="icon"></div>
            <h5>How private is my information, especially card details?
            <br><br></h5>
            </div>



            <div class="panel">

            <p>Your card details are safer online than in many other retail stores as long as the online store uses a secure server for your order. A secure server is a computer that protects your personal and other card information by using software. Secure sites use encryption technology that transfers information from your system to the merchants</p>

            </div>




            <div class="accordian">
            <div class="icon"></div>
            <h5>Does the delivery charge depend on the quantity of items purchased?
            <br><br></h5>
            </div>



            <div class="panel">

            <p>Delivery charges are depends on the distance traveled to deliver the items and the quantity of items does not consider.
</p>

            </div>





          <script >

          var acc = document.getElementsByClassName('accordian');
          var i;
          var len = acc.length;
          		for(i=0;i<len;i++){
          		acc[i].addEventListener('click',function( ){

          				this.classList.toggle('active');
          				var panel = this.nextElementSibling;
          				if(panel.style.maxHeight){
          						panel.style.maxHeight = null;

          				}
          				else{
          						panel.style.maxHeight = panel.scrollHeight+'px';
          				}
          		})

          		}



          </script>
          </div>

        </div>



          </body>
          </html>













        <!-- Body  -->













        <!-- Footer -->
        <?php include('footer.php'); ?>
    </body>
</html>
