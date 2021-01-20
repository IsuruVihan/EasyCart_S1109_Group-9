<?php include('./Backend/server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyCart | Cart - <?php echo $_SESSION['username']?></title>
        <link rel="stylesheet" href="navbar.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>
    <body>
        <!-- Navbar -->
        <?php include('navbar.php'); ?> 

        <!-- Table -->
        <table style="border-spacing: 25px">
            <tr>
                <th>Product Id</th>
                <th>Item Name</th>
                <th>Seller</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Total</th>
                <th>Actions</th>
                <th>Date</th>
            </tr>
            <?php
                // Rendering items exist in the cart 
                $sql = "SELECT * FROM " . $_SESSION['username'];
                $result = mysqli_query($db, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = $_SESSION['username'];
                        $id = $row['id'];
                        $pid = $row['productId'];
                        $itemname = $row['itemname'];
                        $seller = $row['seller'];
                        $category = $row['category'];
                        $qty = $row['quantity'];
                        $rate = $row['rate'];
                        $total = $row['total'];
                        $date = $row['date'];

                        echo "
                            <tr>
                                <td>$pid</td>
                                <td>$itemname</td>
                                <td>$seller</td>
                                <td>$category</td>
                                <td>$qty</td>
                                <td>$rate</td>
                                <td>$total</td>
                                <td>$date</td>
                                <td>
                                    <form method='post' action='cart.php'>
                                        <input type='text' name='id' id='id' value='$id' style='display: none' />
                                        <input type='submit' name='delete' id='delete' value='Remove' />
                                    </form>
                                    <form method='post' action='cart.php'>
                                        <input type='text' name='id' id='id' value='$id' style='display: none' />
                                        <input type='submit' name='buy' id='buy' value='Buy' />
                                    </form>
                                </td>
                            </tr>
                        ";

                        // Buy a product
                        if (isset($_POST['buy'])) {
                            // Send money to the owner account
                            // $total = (double)$qty * (double)$rate;
                            $sql = "INSERT INTO " . $seller . "acc" . " (buyer, productId, itemname, category, quantity, rate, total)
                                    VALUES ('$name', '$pid', '$itemname', '$category', '$qty', '$rate', '$total')";
                            mysqli_query($db, $sql);

                            // That particular product won't exist in the cart anymore
                            $sql = "DELETE FROM " . $_SESSION['username'] . " WHERE id = " . $_POST['id'];
                            mysqli_query($db, $sql);
                            header("Refresh:0");
                        }
                    }
                }
            ?>
        </table>

        <!-- Footer -->
        <?php include('footer.php'); ?>
    </body>
</html>