<?php include('./Backend/server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyCart | Help</title>
        <link rel="stylesheet" type="text/css" href="./styles/navbar.css">
        <style type="text/css">
            body {
                font-family: 'Baloo Bhaina 2', cursive;
                background-image: url('./images/a.png');
                height: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
            .fluid-container {
                width: 80%;
        	    margin: 0 auto;
        	    margin-top: 10px;
            }
            .fluid-container h2 {
        		color: #3a3b3c;
        		position: relative;
        		width: 23rem;
        	}
            .fluid-container h2::after {
        	    content: "";
        	    position: absolute;
        	    bottom: 0;
        	    right: 12px;
        	    width: 67px;
        	    height: 2px;
        	    background-color: #3a3b3c;
            }
            .accordian {
        	    width: 100%;
        	    padding: 0 5px;
        	    border: 3px solid #333333		;
        	    cursor: pointer;
        	    border-radius: 50px;
        	    display: flex;
        	    margin: 10px 0;
        	    align-items: center;
            }
            .accordian .icon {
        	    margin: 0 10px 0 0;
        	    width: 30px;
        	    height: 30px;
        	    background: url(plus.png) no-repeat 8px 7px #CC9933;
        	    border-radius: 50%;
        	    float: left;
        	    transition: all .5s ease-in;
            }
            .accordian h5 {
        	    font-size: 16px;
        	    margin: 0;
        	    padding: 3px 0 0 0 ;
        	    font-weight: normal;
        	    color: black;
            }
            .panel {
        	    padding: 0 15px;
        	    border-left: 1px solid #6db5ff;
        	    margin-left: 25px;
        	    font-size: 14px;
        	    text-align: justify;
        	    overflow: hidden;
        	    max-height: 0;
        	    transition: all .5s ease-in;
            }
            .panel p {
                color: #000000;
            }
        </style>
    </head>
    <body style="background: url('./images/doodle2.jpg')">
        <!-- Navbar -->
        <?php include('navbar.php'); ?>

        <!-- FAQ -->
        <div class="container">
          	<div class="fluid-container">
          		<center>
                    <p style="margin: 1em; font-size: 3em"> 
                        <b><span style="color: #e0ac1c; font-size: 2em">F</span>requently <span style="color: #e0ac1c; font-size: 2em">A</span>sked <span style="color: #e0ac1c; font-size: 2em">Q</span>uestions</b>	
                    </p>
                </center>
          	    
                <table cellspacing="20">
                    <tr>
                        <!-- 1 -->
                        <th>
                            <center>
                                <div class="accordian">
                                    <div class="icon">
                                    </div>
                                    <center>
                                        <h4>How can I select the item category which <br>I need ?</h4>
                                    </center>
                                </div>
                                <div class="panel">
                                    <p>The "Products" page has a filter option. Then select the desired category and click the "Filter" button. The system will then show you the items related to the category you want.</p>
                                </div>
                            </center>
                        </th>
                        <!-- 2 -->
                        <th>
                            <center>
                                <div class="accordian">
                                    <div class="icon">
                                    </div>
                                    <h4>How can I select the item category which <br> I need ?</h4>
                                </div>
                                <div class="panel">
                                    <p>The "Products" page has a filter option. Then select the desired category and click the "Filter" button. The system will then show you the items related to the category you want.</p>
                                </div>
                            </center>
                        </th>
                    </tr>
                    <tr>
                        <!-- 1 -->
                        <th>
                            <center>
                                <div class="accordian">
                                    <div class="icon">
                                    </div>
                                    <center>
                                        <h4>How can I select the item category which <br>I need ?</h4>
                                    </center>
                                </div>
                                <div class="panel">
                                    <p>The "Products" page has a filter option. Then select the desired category and click the "Filter" button. The system will then show you the items related to the category you want.</p>
                                </div>
                            </center>
                        </th>
                        <!-- 2 -->
                        <th>
                            <center>
                                <div class="accordian">
                                    <div class="icon">
                                    </div>
                                    <h4>How can I select the item category which <br> I need ?</h4>
                                </div>
                                <div class="panel">
                                    <p>The "Products" page has a filter option. Then select the desired category and click the "Filter" button. The system will then show you the items related to the category you want.</p>
                                </div>
                            </center>
                        </th>
                    </tr>
                </table>

                <script >
                    var acc = document.getElementsByClassName('accordian');
                    var i;
                    var len = acc.length;
          		    for(i=0; i<len; i++) {
          		        acc[i].addEventListener('click', 
                            function() {
          				        this.classList.toggle('active');
          				        var panel = this.nextElementSibling;
          				        if(panel.style.maxHeight) {
          					        panel.style.maxHeight = null;
          				        } else{
          					        panel.style.maxHeight = panel.scrollHeight + 'px';
          				        }
          		            }
                        );
          		    }
                </script>
            </div>
        </div>

        <!-- Footer -->
        <?php include('footer.php'); ?>
    </body>
</html>

