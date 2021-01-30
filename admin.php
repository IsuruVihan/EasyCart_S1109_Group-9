<?php include('./Backend/server.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>EasyCart | Admin</title>
        <link rel="stylesheet" href="./styles/table.css">
        <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    </head>
    <body style="background: url('./images/doodle2')">
        <!-- Navbar -->
        <?php include('navbar.php'); ?>

        <!-- Transactions Table -->
        <center>
            <b><p style="font-size: 40px; margin-top: 1em">Transactions</p></b>
            <b><p style="font-size: 20px; color: black"><i>Customer payment details</i></p></b>
        </center>
        <div class="table-wrapper">
            <table style="border-spacing: 25px" class="fl-table">
                <thead>
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
                </thead>
                <tbody>
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
                </tbody>
            </table>
        </div>

        <!-- Orders Table -->
        <center>
            <b><p style="font-size: 40px; margin-top: 1em">Delivery Statuses</p></b>
            <b><p style="font-size: 20px; color: black"><i>Assign riders... Delivery...</i></p></b>
        </center>
        <div class="table-wrapper">
            <table style="border-spacing: 25px" class="fl-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product Id</th>
                        <th>Rate</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Seller</th>
                        <th>Buyer</th>
                        <th>Date</th>
                        <th>Address</th>
                        <th>Actions</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Rendering order details
                        $sql = "SELECT * FROM orders";
                        $result = mysqli_query($db, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $productId = $row['productId'];
                                $rate = $row['rate'];
                                $quantity = $row['quantity'];
                                $total = $row['total'];
                                $seller = $row['seller'];
                                $buyer = $row['buyer'];
                                $address = $row['address'];
                                $date = $row['date'];
                                $status = $row['status'];

                                echo "
                                    <tr>
                                        <td>$id</td>
                                        <td>$productId</td>
                                        <td>$rate</td>
                                        <td>$quantity</td>
                                        <td>$total</td>
                                        <td>$seller</td>
                                        <td>$buyer</td>
                                        <td>$address</td>
                                        <td>$date</td>
                                        <td>
                                            <form method='post' action='admin.php'>
                                                <select name='rider' id='rider'>
                                ";
                                                // Riders
                                                $sql2 = "SELECT * FROM users WHERE admin = '2'";
                                                $result2 = mysqli_query($db, $sql2);
                                                if (mysqli_num_rows($result2) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result2)) {
                                                        $riderId = $row['id'];                                                     
                                                        $riderUsername = $row['username'];
                                                        echo"
                                                            <option value='$riderUsername'>$riderUsername</option>
                                                        ";
                                                    }
                                                }
                                echo "                             
                                                </select>
                                                <input type='submit' name='selectrider' id='selectrider' value='Assign Rider' />
                                            </form>
                                        </td>
                                        <td>$status</td>
                                    </tr>
                                ";
                            }
                        }
                        
                        // Assign a rider for a task
                        if (isset($_POST['selectrider'])) {
                            $rider = $_POST['rider'];

                            // Ensure that form fields are filled properly
                            if (empty($rider)) {
                                array_push($errors, "You should select a rider first");
                            }

                            if (count($errors) == 0) {
                                // Task sent to the relevant rider
                                $sql = "INSERT INTO " . $rider . "tasks" . " (orderId, productId, seller, buyer, total, address)
                                        VALUES ('$id', '$productId', '$seller', '$buyer', '$total', '$address')";
                                $result = mysqli_query($db, $sql);

                                // Relevant order doesn't exist anymore when a rider is assigned for that 
                                // $sql = "DELETE FROM orders WHERE id='$id'";
                                // $result = mysqli_query($db, $sql);
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