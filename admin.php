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

        <!-- Users Table -->
        <center>
            <b><p style="font-size: 40px; margin-top: 1em">Users & Riders</p></b>
            <b><p style="font-size: 20px; color: black"><i>All the details about Users & Riders...</i></p></b>
        </center>
        <div class="table-wrapper">
            <table style="border-spacing: 25px" class="fl-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Registered Date</th>
                        <th>Privilage Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Rendering transaction details
                        $sql = "SELECT * FROM users";
                        $result = mysqli_query($db, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $fname = $row['fullname'];
                                $email = $row['email'];
                                $username = $row['username'];
                                $password = $row['password'];
                                $regdate = $row['reg_date'];
                                $privilage = $row['admin'];

                                if((int)$privilage==1) {
                                    echo "
                                        <tr>
                                            <td>$id</td>
                                            <td>$fname</td>
                                            <td>$email</td>
                                            <td>$username</td>
                                            <td>$password</td>
                                            <td>$regdate</td>
                                            <td>$privilage</td>
                                            <td></td>
                                        </tr>
                                    ";
                                } else {
                                    echo "
                                        <tr>
                                            <td>$id</td>
                                            <td>$fname</td>
                                            <td>$email</td>
                                            <td>$username</td>
                                            <td>$password</td>
                                            <td>$regdate</td>
                                            <td>$privilage</td>
                                            <td>
                                                <form method='post' action='./admin.php'>
                                                    <input type='text' id='priv' name='priv' value='$privilage' style='display: none'>
                                                    <input type='text' id='usrnm' name='usrnm' value='$username' style='display: none'>
                                                    <input type='text' id='uid' name='uid' value='$id' style='display: none'>
                                                    <button type='submit' id='del' name='del'>Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                    ";
                                }
                            }
                        }

                        // Revome a User/Rider
                        if (isset($_POST['del'])) {
                            $id = $_POST['uid'];
                            $uname = $_POST['usrnm'];
                            $privilage = (int)$_POST['priv'];
                            $sql = "DELETE FROM users WHERE id='$id'";
                            mysqli_query($db, $sql);
                            if($privilage==2) {
                                $sql = "DROP TABLE $uname" . "bank";
                            } else {
                                $sql = "DROP TABLE $uname";
                            }
                            mysqli_query($db, $sql);
                            if($privilage==2) {
                                $sql = "DROP TABLE $uname" . "tasks";
                            } else {
                                $sql = "DROP TABLE $uname" . "acc";
                            }
                            mysqli_query($db, $sql);
                        }
                    ?>
                </tbody>
            </table>
        </div>
        
        <!-- Users/Riders Registration -->
        <center>
            <b><p style="font-size: 40px; margin-top: 1em">Register Users | Riders</p></b>
            <b><p style="font-size: 20px; color: black"><i>Create a new seller, buyer or rider...</i></p></b>
        </center>
        <center>
            <table>
                <tr>
                    <th>
                        <div style="margin: 2em">
                            <?php
                                include('addrider.php');
                            ?>
                        </div>
                    </th>
                    <th>
                        <div style="margin: 4em">
                            <?php
                                include('adduser.php');
                            ?>
                        </div>
                    </th>
                </tr>
            </table>
        </center>

        <!-- Footer -->
        <?php include('footer.php'); ?>
    </body>
</html>