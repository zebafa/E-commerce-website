<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderID = htmlspecialchars(trim($_POST['order_id']));
    $filename = 'orders.txt';

    if (file_exists($filename)) {
        // Read the contents of the file
        $orders = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $found = false;

        // Search for the order ID in the orders
        foreach ($orders as $order) {
            if (strpos($order, "Order ID: $orderID") !== false) {
                echo "<pre>$order</pre><hr>";
                $found = true;
                break;
            }
        }

        if (!$found) {
            echo "No order found with that Order ID.";
        }
    } else {
        echo "Orders file not found.";
    }
} else {
    echo "Invalid request method.";
}
?>
