<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

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

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="dashboard.php" method="get">
    <button type="submit">Home</button>

        <table>
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Include the database connection file
                    include 'connection_db.php';

                    // Query to retrieve data from the database
                    $sql = "SELECT transaction_id, total_amount FROM transaction_history";

                    $result = $conn->query($sql);

                    // Initialize total sales amount
                    $totalSales = 0;

                    // Display data in the table
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['transaction_id']}</td>";
                        echo "<td>{$row['total_amount']}</td>";
                        echo "</tr>";

                        // Accumulate total sales amount
                        $totalSales += $row['total_amount'];
                    }

                    // Close the database connection
                    $conn->close();
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td style="text-align: right; font-weight: bold;" colspan="2">Total Sales: <?php echo $totalSales; ?></td>
                </tr>
            </tfoot>
        </table>
    </form>
</body>
</html>
