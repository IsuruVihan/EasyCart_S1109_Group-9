<?php include('./Backend/server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyCart | My Account - <?php echo $_SESSION['username'] ?></title>
        <link rel="stylesheet" href="navbar.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>
    <body>
        <!-- Navbar -->
        <?php include('navbar.php'); ?>

        <!-- Table -->
        <table style="border-spacing: 25px">
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
                        $seller = $_SESSION['username'];
                        $tax = 0.15 * (double)$total;
                        $sql2 = "INSERT INTO transactions (pid, buyer, seller, amount, taxrate, tax) 
                                VALUES ('$pid', '$buyer', '$seller', '$total', '0.15', '$tax')";
                        $result2 = mysqli_query($db, $sql2);
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
        </table>

        <!-- Footer -->
        <?php include('footer.php'); ?>
    </body>
</html>