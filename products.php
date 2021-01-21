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
        <center>
            <table style='width: 90%; margin-top: 2em;'>
                <tr>
                    <th style='border: 0px solid black; width: 40%; vertical-align: top; border-radius: 10px;' rowspan='2'>
                        <?php
                            // Display errors related to adding a product
                            include('errors.php');

                            // Add product
                            if (isset($_SESSION['username']) && $_SESSION['username'] != 'ucsc') {
                                include('addproduct.php');
                            }
                        ?>
                    </th>
                    <th style='border: 0px solid black; width: 60%; vertical-align: top; height: 23%; border-radius: 10px; background: #f2f2f2'>
                        <?php
                            // Filter
                            echo "
                                <center>
                                    <form method='post' action='products.php' style='width: 50%;'>
                                        <label for='searchcategory'>Select a category:</label>
                                        <select name='searchcategory' id='searchcategory'>
                                            <option value='all'>All</option>
                                            <option value='category1'>Category1</option>
                                            <option value='category2'>Category2</option>
                                            <option value='category3'>Category3</option>
                                            <option value='category4'>Category4</option>
                                        </select>
                                        <center>
                                            <input type='submit' id='selectcategory' name='selectcategory' value='Filter' style='background: #e0ac1c' />
                                        </center>                                   
                                    </form>
                                </center>
                            ";
                        ?>
                    </th>
                </tr>
                <tr>
                    <th style='border: 0px solid black'>
                        <?php
                            echo "
                                <center>
                                    <hr style='height: 3px; margin-top: 2em; margin-bottom: 0.5em; border: 3px solid black; border-radius: 10px; width: 50%'/>
                                    <h1>Available Products</h1>
                                    <hr style='height: 3px; margin-top: 0.5em; margin-bottom: 2em; border: 3px solid #e0ac1c; border-radius: 10px; width: 50%'/>
                                </center>
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
                                            <center>
                                                <div style='border: 0px solid red; max-height: 75%; width: 700px; max-width: 700px;'> 
                                                    <form method='post' action='products.php'>
                                                        <input value=$id name='productid' id='productid' style='display: none'></input><br>
                                                        <table style='border: 2px solid black; width: 100%; border-radius: 10px; background: #f2f2f2;' cellspacing='10'>
                                                            <tr>
                                                                <td rowspan='4' style='border: 1px solid black; width: 30%'></td>
                                                                <td name='name'><h2>$name</h2></td>
                                                            </tr>
                                                            <tr>
                                                                <td name='description'>$description</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table>
                                                                        <tr>
                                                                            <td name='price'>Rs. $price</td>
                                                                            <td style='width: 50px'></td>
                                                                            <td name='seller'>$seller</td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type='submit' id='removeproduct' name='removeproduct' value='Remove' style='background: #e0ac1c' />
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </div>
                                            </center>
                                        ";
                                    } else {
                                        echo "
                                            <center>
                                                <div style='border: 0px solid red; max-height: 75%; width: 700px; max-width: 700px;'> 
                                                    <form method='post' action='products.php'>
                                                        <input value=$id name='productid' id='productid' style='display: none'></input><br>
                                                        <table style='border: 2px solid black; width: 100%; border-radius: 10px; background: #f2f2f2;' cellspacing='10'>
                                                            <tr>
                                                                <td rowspan='4' style='border: 1px solid black; width: 30%'></td>
                                                                <td name='name'><h2>$name</h2></td>
                                                            </tr>
                                                            <tr>
                                                                <td name='description'>$description</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table>
                                                                        <tr>
                                                                            <td name='price'>Rs. $price</td>
                                                                            <td style='width: 50px'></td>
                                                                            <td name='seller'>$seller</td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <lable for='qty'>Quantity :</lable>
                                                                    <input type='text' id='qty' name='qty' style='width: 50%' />
                                                                    <input type='submit' id='addtocart' name='addtocart' value='Add to Cart' style='background: #e0ac1c' />
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </div>
                                            </center>
                                        ";

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
                                    $id = NULL;
                                    $name = NULL;
                                    $description = NULL;
                                    $price = NULL;
                                    $seller = NULL;
                                    $category = NULL;
                                }
                            }
                        ?>
                    </th>
                </tr>
            </table>
        </center>
        <!-- Footer -->
        <?php include('footer.php'); ?>
    </body>
</html>