<?php include('./Backend/server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyCart | My Account - <?php echo $_SESSION['username'] ?></title>
        <link rel="stylesheet" href="./styles/table.css">
        <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
        <style>
            body {
                background: white;
            }
        </style>
    </head>
    <body style="background: url('./images/doodle2')">
        <!-- Navbar -->
        <?php include('navbar.php'); ?>

        <!-- Cart -->
        <center>
            <b><p style="font-size: 40px; margin-top: 1em">My Cart</p></b>
            <b><p style="font-size: 20px; color: black"><i>Buy? Or not?</i></p></b>
        </center>
        <div class="table-wrapper">
            <table style="border-spacing: 25px" class="fl-table">
                <thead>
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
                </thead>
                <tbody>
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
                                $buyer = $_SESSION['username'];
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
                                                <input type='text' id='address' name='address' />
                                                <button type='submit' name='buy' id='buy'>Buy</button>
                                            </form>
                                        </td>
                                    </tr>
                                ";

                                // Buy a product
                                if (isset($_POST['buy'])) {
                                    $address = $_POST['address'];

                                    if (empty($address)) {
                                        array_push($errors, "Enter the address where the item to be delivered");
                                    }

                                    if (count($errors) == 0) {
                                        // Sending tax to admin
                                        $tax = 0.15 * (double)$total;
                                        $sql = "INSERT INTO transactions (pid, buyer, seller, amount, taxrate, tax) 
                                                VALUES ('$pid', '$buyer', '$seller', '$total', '0.15', '$tax')";
                                        $result = mysqli_query($db, $sql);

                                        // Substracting tax from the total
                                        $total = $total - 0.15 * $total;

                                        // Send money to the owner account
                                        $sql = "INSERT INTO " . $seller . "acc" . " (buyer, productId, itemname, category, quantity, rate, total)
                                                VALUES ('$name', '$pid', '$itemname', '$category', '$qty', '$rate', '$total')";
                                        mysqli_query($db, $sql);

                                        // Order sent to EasyCart admin
                                        $sql = "INSERT INTO orders (productId, rate, quantity, total, seller, buyer, address)
                                                VALUES ('$pid', '$rate', '$qty', '$total', '$seller', '$buyer', '$address')";
                                        mysqli_query($db, $sql);

                                        // That particular product won't exist in the cart anymore
                                        $sql = "DELETE FROM " . $_SESSION['username'] . " WHERE id = " . $_POST['id'];
                                        mysqli_query($db, $sql);
                                    }
                                }
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Transactions -->
        <center>
            <b><p style="font-size: 40px; margin-top: 1em">Transactions</p></b>
            <b><p style="font-size: 20px; color: black"><i>Customer payment details</i></p></b>
        </center>
        <div class="table-wrapper">
            <table style="border-spacing: 25px" class="fl-table">
                <thead>
                    <tr>
                        <th>Buyer</th>
                        <th>Product Id</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Rendering items bought by customers 
                        $sql = "SELECT * FROM " . $_SESSION['username'] . "acc";
                        $result = mysqli_query($db, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $pid = $row['productId'];
                                $itemname = $row['itemname'];
                                $buyer = $row['buyer'];
                                $category = $row['category'];
                                $qty = $row['quantity'];
                                $rate = $row['rate'];
                                $total = $row['total'];
                                $date = $row['date'];

                                // Send the transaction details to admin
                                // $seller = $_SESSION['username'];
                                // $tax = 0.15 * (double)$total;
                                // $sql2 = "INSERT INTO transactions (pid, buyer, seller, amount, taxrate, tax) 
                                //         VALUES ('$pid', '$buyer', '$seller', '$total', '0.15', '$tax')";
                                // $result2 = mysqli_query($db, $sql2);
                                echo "
                                    <tr>
                                        <td>$buyer</td>
                                        <td>$pid</td>
                                        <td>$itemname</td>
                                        <td>$category</td>
                                        <td>$qty</td>
                                        <td>$rate</td>
                                        <td>$total</td>
                                        <td>$date</td>
                                    </tr>
                                ";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <?php include('footer.php'); ?>
    </body>
</html>