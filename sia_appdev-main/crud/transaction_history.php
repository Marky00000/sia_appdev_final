<?php
// Start session and include database connection
session_start();
include('connection_db.php');

// Check if the admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit;
}

// Fetch transaction history from the database
$sql = "SELECT * FROM transaction_history";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <style>
        /* Your CSS styles for table formatting */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Transaction History</h1>

    <table>
        <tr>
            <th>transaction_id</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        <?php
        // Display transaction history in a table format
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<td>" . $row['transaction_id'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['total_amount'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No transaction history found</td></tr>";
        }
        ?>
    </table>
    <p><a href="dashboard.php">Back to Dashboard</a></p>

</body>

</html>
