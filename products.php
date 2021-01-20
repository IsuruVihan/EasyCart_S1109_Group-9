<?php include('./Backend/server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyCart | Products</title>
        <link rel="stylesheet" href="navbar.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    	<link rel="preconnect" href="https://fonts.gstatic.com" />
  		<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@300;500;700&display=swap" rel="stylesheet" />
    </head>
    <body>
        <!-- Navbar -->
        <?php include('navbar.php'); ?>
        <?php
            // Display errors related to adding a product
            include('errors.php');

            // Add product
            if (isset($_SESSION['username']) && $_SESSION['username'] != 'ucsc') {
                echo "
                    <form method='post' action='products.php'>
                        <!-- Display validation errors --> 
                        <?php include('errors.php'); ?>
                        <div>
                            <label for='productname'>Product name: </label>
                            <input type='text' id='productname' name='productname'/>
                        </div>
                        <div>
                            <label for='description'>Description: </label>
                            <textarea type='text' id='description' name='description'></textarea>
                        </div>
                        <div>
                            <label for='price'>Price: (Rs.)</label>
                            <input type='text' id='price' name='price' />
                        </div>
                        <div>
                            <label for='productcategory'>Choose a category:</label>
                            <select name='productcategory' id='productcategory'>
                                <option value='Category1'>Category1</option>
                                <option value='Category2'>Category2</option>
                                <option value='Category3'>Category3</option>
                                <option value='Category4'>Category4</option>
                            </select>
                        </div>
                        <!--<input type='file' id='image' name='image' />-->
                        <input type='submit' id='submitproduct' name='submitproduct' value='Publish Product' />
                    </form>   
                ";
            }

            // Filter
            echo "
                <form method='post' action='products.php'>
                    <label for='searchcategory'>Select a category:</label>
                    <select name='searchcategory' id='searchcategory'>
                        <option value='all'>All</option>
                        <option value='category1'>Category1</option>
                        <option value='category2'>Category2</option>
                        <option value='category3'>Category3</option>
                        <option value='category4'>Category4</option>
                    </select>
                    <input type='submit' id='selectcategory' name='selectcategory' value='Filter' />
                </form>
            ";

            // Display products available to sell
            $sql = "SELECT * FROM products";
            // Including filter facilities
            if (isset($_POST['selectcategory']) && ($_POST['searchcategory'] != 'all')) {
                $selected = $_POST['searchcategory'];
                $sql = "SELECT * FROM products WHERE category = '$selected'";
            }
            $result = mysqli_query($db, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $seller = $row['seller'];
                    $category = $row['category'];
                    if ($row['seller'] == $_SESSION['username'] || $_SESSION['username'] == 'ucsc') {
                        echo "
                            <form method='post' action='products.php'>
                                <input value=$id name='productid' id='productid' style='display: none'></input><br>
                                <p>Name: $name</p><br> 
                                <p>Description: $description</p><br> 
                                <p>Price: $price</p><br>
                                <p>Seller: $seller</p><br>
                                <p>Category: $category</p><br>
                                <input type='submit' id='removeproduct' name='removeproduct' value='Remove' />
                            </form>
                        " . "<br><br><br>";
                    } else {
                        echo "
                            <form method='post' action='products.php'>
                                <input value=$id name='productid' id='productid' style='display: none'></input><br>
                                <p name='name'>Name: $name</p><br> 
                                <p name='description'>Description: $description</p><br> 
                                <p name='price'>Price: $price</p><br>
                                <p name='seller'>Seller: $seller</p><br>
                                <p name='category'>Category: $category</p><br>
                                <lable for='qty'>Quantity :</lable>
                                <input type='text' id='qty' name='qty' />
                                <input type='submit' id='addtocart' name='addtocart' value='Add to Cart' />
                            </form>
                        " . "<br><br><br>";
                        // Add a product to cart
                        if (isset($_POST['addtocart'])) {
                            $productId = $id;
                            $itemname = $name;
                            $quantity = $_POST['qty'];
                            $total = (double)$price * (int)$quantity;
                            // $category
                            // $price
                            $sql = "INSERT INTO " . $_SESSION['username'] . " (productId, seller, itemname, category, quantity, rate, total)
                                    VALUES ('$productId', '$seller', '$itemname', '$category', '$quantity', '$price', '$total')";
                            mysqli_query($db, $sql);
                        }
                    }
                }
            }
        ?>

        <!-- Footer -->
        <?php include('footer.php'); ?>
    </body>
</html>