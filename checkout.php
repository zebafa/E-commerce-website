<?php
session_start(); // Start a session to store cart data
// This is where you'd typically pull cart data from session or database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $address = htmlspecialchars(trim($_POST['address']));
    $product = htmlspecialchars(trim($_POST['product']));
    $quantity = intval($_POST['quantity']);
    $payment = htmlspecialchars(trim($_POST['payment']));
    $orderID = uniqid(); // Generate a unique order ID

    // Create order summary
    $orderSummary = "Order ID: $orderID\nName: $name\nEmail: $email\nAddress: $address\nProduct: $product\nQuantity: $quantity\nPayment Method: $payment\n\n";

    // Save order to a file
    file_put_contents('orders.txt', $orderSummary, FILE_APPEND);

    // Redirect to order confirmation page
    header("Location: order.html?order_id=$orderID");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        textarea {
            resize: vertical;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Checkout</h1>
        <form action="checkout.php" method="POST">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="address">Shipping Address</label>
                <textarea id="address" name="address" required></textarea>
            </div>
            <div class="form-group">
                <label for="product">Select Product</label>
                <input type="text" id="product" name="product" value="Product 1" readonly>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1" required>
            </div>
            <div class="form-group">
                <label for="payment">Payment Method</label>
                <select id="payment" name="payment" required>
                    <option value="">--Select Payment Method--</option>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>
            <button type="submit">Place Order</button>
        </form>
    </div>
</body>
</html>
