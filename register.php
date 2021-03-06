<?php include('./Backend/server.php'); ?>
<!DOCTYPE HTML>  
<html>
    <head>
        <title>EasyCart | Registration</title>
        
    </head>
    <style>
            * {                
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }

            .errors {
                color: red;
                font-weight: 400;
                text-align: center;
                margin: 2vw;
            }

            html, body {
                display: grid;
                height: 100%;
                width: 100%;
                place-items: center;
                background: white;
            }

            .wrapper {
                float: left;
                position: sticky;
                margin-right: 10vw;
                width: 380px;
                background: #e0ac1c;
                border-left: 3px solid black;
                border-right: 3px solid black;
                border-top: 3px solid black;
                border-bottom: 3px solid black;
                border-radius: 15px;
            }

            .wrapper .title {
                font-size: 35px;
                font-weight: 600;
                text-align: center;
                line-height: 100px;
                color: black;
                user-select: none;
                border-radius: 15px 15px 0 0;
            }

            .wrapper form {
                padding: 10px 30px 50px 30px;
            }

            .wrapper form .field {
                height: 50px;
                width: 100%;
                margin-top: 20px;
                position: relative;
            }

            .wrapper form .field input {
                height: 100%;
                width: 100%;
                outline: none;
                font-size: 17px;
                padding-left: 20px;
                border: 1px solid lightgrey;
                border-radius: 25px;
                transition: all 0.3s ease;
            }

            .wrapper form .field input:focus,
            form .field input:valid {
                border-color: black;
            }

            .wrapper form .field label {
                position: absolute;
                top: 50%;
                left: 20px;
                color: black;
                font-weight: 400;
                font-size: 17px;
                pointer-events: none;
                transform: translateY(-50%);
                transition: all 0.3s ease;
            }

            form .field input:focus ~ label,
            form .field input:valid ~ label {
                top: 0%;
                font-size: 16px;
                color: #4158d0;
                background: #fff;
                transform: translateY(-50%);
            }

            form .content {
                display: flex;
                width: 100%;
                height: 50px;
                font-size: 16px;
                align-items: center;
                justify-content: space-around;
            }

            form .content input {
                width: 15px;
                height: 15px;
                background: red;
            }

            form .content label {
                color: #e0ac1c;
                user-select: none;
                padding-left: 5px;
            }

            form .content .pass-link {
                color: #e0ac1c;
            }

            form .field input[type="submit"] {
                color: #fff;
                border: none;
                padding-left: 0;
                margin-top: -10px;
                font-size: 20px;
                font-weight: 500;
                cursor: pointer;
                background: black;
                transition: all 0.3s ease;
            }

            form .field input[type="submit"]:active {
                transform: scale(0.95);
            }

            form .signup-link {
                color: #262626;
                margin-top: 20px;
                text-align: center;
            }

            form .signup-link a {
                color: #4158d0;
                text-decoration: none;
            }

            form .signup-link a:hover {
                text-decoration: underline;
            }
    </style>
    <body style="background: url('./images/doodle2')">
        <table>
            <tr>
                <td>
                    <table style="border: 0px solid black; padding-right: '2em'">
                        <tr>
                            <td>
                                <center>
                                    <img src="./images/doodle3.jpg" width="80%">
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <div class="wrapper" style="margin-left: 5em; width: 30vw">
                        <div class="title">
                            Register <span style="color: black">Form</span>
                        </div>
                        <form method="post" action="register.php">
                            <!-- Display validation errors --> 
                            <div class="errors">
                                <?php include('errors.php'); ?>
                            </div>
                            <div class="field">
                                <input type="text" id="fullname" name="fullname" style="border: 3px solid black"/>
                                <label style="color: black"><b><span style="border: 3px solid black; padding: 2px; background: white">Full name</span></b></label>
                            </div>
                            <div class="field">
                                <input type="email" id="email" name="email" style="border: 3px solid black"/>
                                <label style="color: black"><b><span style="border: 3px solid black; padding: 2px; background: white">Email</span></b></label>
                            </div>
                            <div class="field">
                                <input type="text" id="username" name="username" style="border: 3px solid black"/>
                                <label style="color: black"><b><span style="border: 3px solid black; padding: 2px; background: white">Username</span></b></label>
                            </div>
                            <div class="field">
                                <input type="password" id="password" name="password" style="border: 3px solid black"/>
                                <label style="color: black"><b><span style="border: 3px solid black; padding: 2px; background: white">Password</span></b></label>
                            </div>
                            <div class="field">
                                <input type="password" id="repassword" name="repassword" style="border: 3px solid black"/>
                                <label style="color: black"><b><span style="border: 3px solid black; padding: 2px; background: white">Re-enter password</span></b></label>
                            </div>
                            <div class="field">
                                <input type='submit' id='register' name='register' value='Register' />
                            </div>
                            <div class="signup-link">
                                <b>Already have an account? <a href="login.php" style="color: black"><u>Login here</u></a></b>
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>