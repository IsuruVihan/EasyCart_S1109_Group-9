<?php

session_start();

$fullname = "";
$email = "";
$username = "";
$password_1 = "";
$password_2 = "";
$errors = array();

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'easycartdb', '3306');

// If the 'Register' button is clicked
if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $email =$_POST['email'];
    $username = $_POST['username'];
    $password_1 = $_POST['password'];
    $password_2 = $_POST['repassword'];

    // Ensure that form fields are filled properly
    if (empty($fullname)) {
        array_push($errors, "Name is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }

    // Checking whether the passwords are matching
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // If there are no errors, save user to database
    if (count($errors) == 0) {
        // Encrypt password before storing in database (security purposes)
        $password = md5($password_1);
        $sql = "INSERT INTO users (fullname, email, username, password)
                VALUES ('$fullname', '$email', '$username', '$password')";
        mysqli_query($db, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        // Create a cart
        $sql = "CREATE TABLE $username (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            seller VARCHAR(100) NOT NULL,
            productId INT(10) NOT NULL,
            itemname VARCHAR(100) NOT NULL,
            category VARCHAR(20) NOT NULL,
            quantity INT(20) NOT NULL,
            rate DECIMAL(50,2) NOT NULL,
            total DECIMAL(50,2) NOT NULL,
            date timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        mysqli_query($db, $sql);

        // Create an account
        $sql = "CREATE TABLE " . $username . "acc" . " (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            buyer VARCHAR(100) NOT NULL,
            productId INT(10) NOT NULL,
            itemname VARCHAR(100) NOT NULL,
            category VARCHAR(20) NOT NULL,
            quantity INT(20) NOT NULL,
            rate DECIMAL(50,2) NOT NULL,
            total DECIMAL(50,2) NOT NULL,
            date timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        mysqli_query($db, $sql);
        
        // Redirecting to the home page
        header('location: index.php');
    }
}

// Register a rider
if (isset($_POST['registerrider'])) {
    $name = $_POST['name'];
    $email =$_POST['email'];
    $username = $_POST['username'];
    $password_1 = $_POST['password'];
    $password_2 = $_POST['repassword'];

    // Checking whether the passwords are matching
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // If there are no errors, save user to database
    if (count($errors) == 0) {
        // Encrypt password before storing in database (security purposes)
        $password = md5($password_1);
        $sql = "INSERT INTO users (fullname, email, username, password, admin)
                VALUES ('$name', '$email', '$username', '$password', '2')";
        mysqli_query($db, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        // Create 'tasks' table
        $sql = "CREATE TABLE " . $username . "tasks" . " (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            orderId INT(10) NOT NULL,
            productId INT(10) NOT NULL,
            seller VARCHAR(100) NOT NULL,
            buyer VARCHAR(100) NOT NULL,
            total DECIMAL(50,2) NOT NULL,
            address VARCHAR(200) NOT NULL,
            date timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        mysqli_query($db, $sql);

        // Create 'bank' table
        $sql = "CREATE TABLE " . $username . "bank" . " (
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            taskId INT(10) NOT NULL,
            total DECIMAL(50,2) NOT NULL,
            date timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        mysqli_query($db, $sql);
    }
}

// Log user in from login page
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ensure that form fields are filled properly
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        // Encrypt password before comparing with the database results
        $password = md5($password);
        $query = "SELECT id FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1) {
            // Log user in
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            // Admin
            if ($username == 'ucsc') {
                $_SESSION['admin'] = TRUE;
            } else { // Rider
                $number = 2;
                $sql = "SELECT id FROM users WHERE username='$username' AND password='$password' AND admin='$number'";
                $result = mysqli_query($db, $sql);
                if (mysqli_num_rows($result) == 1) {
                    $_SESSION['rider'] = TRUE;
                }
                header('location: tasks.php');
            }

            // Redirect to home page
            if ($username == 'ucsc' || !(isset($_SESSION['rider']))) {
                header('location: index.php');
            }
        } else {
            array_push($errors, "Wrong Username or Password");
        }
    }
}

// Add product
if (isset($_POST['submitproduct'])) {
    $username = $_SESSION['username'];
    $productname = $_POST['productname'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['productcategory'];
    // Ensure that form fields are filled properly
    if (empty($productname)) {
        array_push($errors, "Product name is required");
    }
    if (empty($description)) {
        array_push($errors, "Product description is required");
    }
    if (empty($price)) {
        array_push($errors, "Product price is required");
    }
    if (empty($category)) {
        array_push($errors, "Product category is required");
    }
    // If there are no errors, save the product to database
    if (count($errors) == 0) {
        $sql = "INSERT INTO products (name, description, price, seller, category)
                VALUES ('$productname', '$description', '$price', '$username', '$category')";
        mysqli_query($db, $sql);
    }
}

// Remove product
if (isset($_POST['removeproduct'])) {
    $product = $_POST['productid'];
    $sql = "DELETE FROM products WHERE id = '$product'";
    mysqli_query($db, $sql);
}

// Delete a product from the cart
if (isset($_POST['delete'])) {
    $sql = "DELETE FROM " . $_SESSION['username'] . " WHERE id = " . $_POST['id'];
    mysqli_query($db, $sql);
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    if (isset($_SESSION['admin'])) {
        unset($_SESSION['admin']);    
    }
    unset($_SESSION['username']);
    header('location: login.php');
}

?>