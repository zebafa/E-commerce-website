<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $address = htmlspecialchars(trim($_POST['address']));
    $product = htmlspecialchars(trim($_POST['product']));
    $quantity = intval($_POST['quantity']);
    $payment = htmlspecialchars(trim($_POST['payment']));
    
    // Validate the data (basic validation)
    if (empty($name) || empty($email) || empty($address) || empty($product) || $quantity <= 0 || empty($payment)) {
        die("Please fill all fields correctly.");
    }

    // Create a simple order summary
    $orderSummary = "Name: $name\nEmail: $email\nAddress: $address\nProduct: $product\nQuantity: $quantity\nPayment Method: $payment\n\n";

    // Option 1: Save order to a file
    file_put_contents('orders.txt', $orderSummary, FILE_APPEND);

    // Option 2: Send an email (uncomment to use)
    /*
    $to = "your-email@example.com"; // Replace with your email
    $subject = "New Order from $name";
    $headers = "From: $email";
    mail($to, $subject, $orderSummary, $headers);
    */

    // Success message
    echo "Thank you for your order, $name! Your order has been received.";
} else {
    echo "Invalid request method.";
}
?>
