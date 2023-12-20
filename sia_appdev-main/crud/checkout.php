
<style>
   
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
<?php
session_start();

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Your existing PHP checkout code here

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sia1";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $total = 0; // Initialize total

    // Prepare and execute SQL to insert checkout items into a database table (Replace 'your_table_name' with your actual table name)
    foreach ($_SESSION['cart'] as $cartItem) {
        $productName = $cartItem['product_name'];
        $price = $cartItem['price'];
        $total += $price;

        $sql = "INSERT INTO checkout_products (product_name, price) VALUES ('$productName', '$price')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Save transaction details to the database
    $userEmail = $_SESSION['email_username']; // Assuming this holds the user's email
    $totalAmount = $total; // Assuming this holds the total amount

    $sql = "INSERT INTO transaction_history (user_email, total_amount) VALUES ('$userEmail', '$totalAmount')";

    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Display checkout summary
    echo '<h2>Checkout Summary</h2>';
    echo '<ul>';
    foreach ($_SESSION['cart'] as $cartItem) {
        echo '<li>' . $cartItem['product_name'] . ' - $' . $cartItem['price'] . '</li>';
    }
    echo '<li><strong>Total: $' . number_format($total, 2) . '</strong></li>';
    echo '</ul>';

    // Clear the cart after processing
    $_SESSION['cart'] = array();

    // Close the database connection
    $conn->close();

    echo '<p>Thank you for your order!</p>';
} else {
    echo '<p>Your cart is empty. Please add items before checking out.</p>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div id="checkout-summary"></div>

    <script>
        $(document).ready(function(){
            $.ajax({
                url: 'checkout.php',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if(response.error) {
                        $('#checkout-summary').html('<p>' + response.error + '</p>');
                    } else {
                        $('#checkout-summary').html(response.summary);
                        // Optionally display total separately
                        $('#checkout-summary').append('<p>Total: $' + response.total + '</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(status + ': ' + error);
                }
            });
        });
    </script>
        <button onclick="window.location.href='http://localhost/sia_appdev-main/crud/users_dashboard.php'">Back to Dashboard</button>

</body>
</html>
