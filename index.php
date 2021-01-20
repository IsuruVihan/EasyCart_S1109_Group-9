<?php include('./Backend/server.php'); ?>
<!DOCTYPE HTML>  
<html>
    <head>
        <title>EasyCart | Home</title>
        <link rel="stylesheet" href="navbar.css">
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
    
        <!-- Footer -->
        <?php include('footer.php'); ?>
    </body>
</html>
