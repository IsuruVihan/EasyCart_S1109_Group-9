<?php include('./Backend/server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyCart | Login</title>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
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
                /* background: #ffffff; */
                /* background: linear-gradient(-135deg, #c850c0, #4158d0); */
            }

            ::selection {
                background: #4158d0;
                color: #fff;
            }

            .wrapper {
                float: left;
                position: sticky;
                margin-right: 10vw;
                width: 380px;
                background: #fff;
                border-radius: 15px;
                box-shadow: 0px 40px 40px rgba(0,0,0,0.1);
            }

            .wrapper .title {
                font-size: 35px;
                font-weight: 600;
                text-align: center;
                line-height: 100px;
                color: #fff;
                user-select: none;
                border-radius: 15px 15px 0 0;
                background: #0b1750;
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
                border-color: #4158d0;
            }

            .wrapper form .field label {
                position: absolute;
                top: 50%;
                left: 20px;
                color: #999999;
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

            form .content .checkbox {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            form .content input {
                width: 15px;
                height: 15px;
                background: red;
            }

            form .content label {
                color: #262626;
                user-select: none;
                padding-left: 5px;
            }

            form .content .pass-link {
                color: "";
            }

            form .field input[type="submit"] {
                color: #fff;
                border: none;
                padding-left: 0;
                margin-top: -10px;
                font-size: 20px;
                font-weight: 500;
                cursor: pointer;
                background: #0b1750;
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

            form .pass-link a,
            form .signup-link a {
                color: #4158d0;
                text-decoration: none;
            }

            form .pass-link a:hover,
            form .signup-link a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body style="background-image: url('./images/loginbackground.jpg')">
        <table>
            <tr>
                <td>
                    <img style="width: 40%; margin-left: 18vw;" src="./images/logo.png" />
                </td>
                <td>
                    <div class="wrapper">
                        <div class="title">
                            Login Form
                        </div>
                        <form method="post" action="login.php">
                            <!-- Display validation errors --> 
                            <div class="errors">
                                <?php include('errors.php'); ?>
                            </div>
                            <div class="field">
                                <input type="text" id="username" name="username"/>
                                <label>Username</label>
                            </div>
                            <div class="field">
                                <input type="password" id="password" name="password"/>
                                <label>Password</label>
                            </div>
                            <div class="field">
                                <input type='submit' id='loginbtn' name='login' value='Login' />
                            </div>
                            <div class="signup-link">
                                Not a member? <a href="register.php">Register now</a>
                            </div>
                            <div class="signup-link">
                                <a href="home.php">Surf without login</a>
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>