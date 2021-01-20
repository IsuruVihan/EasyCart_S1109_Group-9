<?php include('./Backend/server.php'); ?>
<!DOCTYPE HTML>  
<html>
    <head>
        <title>EasyCart | Registration</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" />
        <link rel="stylesheet" href="register.css" />
    </head>
    <body>
        <div class="main-block">
            <div class="left-part">
                <h1><b>Register to our web site</b></h1>
                <img src="logo.jpg" width=50% />
                <br /><br />
                <p><i><b>Welcome to EasyCart.It's great to have you.</b></i></p>
            </div>
            <form action="register.php" method="post">
                <!-- Display validation errors --> 
                <?php include('errors.php'); ?>
                <div class="title">
                    <i class="fas fa-pencil-alt"></i> 
                    <h2>Register here</h2>
                </div>
                <div class="info">
                    <input 
                        class="fname" 
                        type="text" 
                        name="fullname" 
                        placeholder="Full name"
                    />
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="Email"
                    />
                    <input 
                        type="text" 
                        name="username" 
                        placeholder="Username"
                    />
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Password"
                    />
                    <input 
                        type="password" 
                        name="repassword" 
                        placeholder="Re-enter password"
                    />
                </div>
                <button type="submit" name="register">Register</button>
                <br /><br />
                <p><b>Already have an account ?</b></p><br>
                <a href="login.php" style="color: white">Login Here</a>
            </form>
        </div>
    </body>
</html>