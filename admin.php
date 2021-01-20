<?php include('./Backend/server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyCart | Admin</title>
        <link rel="stylesheet" href="navbar.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>
    <body>
        <!-- Navbar -->
        <?php include('navbar.php'); ?>

        <!-- Table -->
        <table style="border-spacing: 25px">
            <tr>
                <th>Id</th>
                <th>Product Id</th>
                <th>Buyer</th>
                <th>Seller</th>
                <th>Amount</th>
                <th>Tax Rate</th>
                <th>Tax</th>
                <th>Transaction Date</th>
            </tr>
            <?php
                // Rendering transaction details
                $sql = "SELECT * FROM transactions";
                $result = mysqli_query($db, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $pid = $row['pid'];
                        $buyer = $row['buyer'];
                        $seller = $row['seller'];
                        $amount = $row['amount'];
                        $taxrate = $row['taxrate'];
                        $tax = $row['tax'];
                        $date = $row['date'];

                        echo "
                            <tr>
                                <td>$id</td>
                                <td>$pid</td>
                                <td>$buyer</td>
                                <td>$seller</td>
                                <td>$amount</td>
                                <td>$taxrate</td>
                                <td>$tax</td>
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