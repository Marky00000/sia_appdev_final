<?php
session_start();

if (isset($_POST['index']) && isset($_SESSION['cart'])) {
    $index = $_POST['index'];
    
    // Check if the quantity is greater than 1, then decrease it
    if ($_SESSION['cart'][$index]['quantity'] > 1) {
        $_SESSION['cart'][$index]['quantity'] -= 1;
    } else {
        // If quantity is 1 or less, remove the item from the cart
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reorganize array keys
    }
}

header("Location: users_dashboard.php"); // Redirect back to the dashboard
exit;
?>
