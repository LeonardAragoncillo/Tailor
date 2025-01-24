<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/appointment1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Payment</title>
</head>

<body>
    <header>
        <div class="inside">
            <h2>MMRC Tailoring</h2>
            <ul class="menu">
                <li><a href="../user/homepage.php"><span>Home</span></a></li>
                <li><a href="../user/appointment.php"><span>Appointment</span></a></li>
                <li><a href="../user/myorders.php"><span>My Orders</span></a></li>
                <li><a href="#flowers"><span>Account</span></a></li>
                <li><a href="../user/login.php"><span>Logout</span></a></li>
            </ul>
        </div>
    </header>
    <div class="bgrectang" style="height: fit-content;">
        <div class="checkout-container">
            <div class="header">
                <h1>Payment</h1>
            </div>
            <div class="content">
                <div class="note">
                    <strong>Note:</strong> A 50% downpayment is strictly required to process your order.
                </div>
                <form method="GET" action="confirmation.php">
                    <!-- Pass the appointment ID -->
                    <input type="hidden" name="appointment_id" value="<?= htmlspecialchars($_GET['appointment_id'] ?? 0) ?>">

                    <div class="product">
                        <img src="../img/wmsu.png" alt="Product Image">
                        <div class="product-info">
                            <div class="product-title">Polo</div>
                            <div class="product-price">P25.00</div>
                        </div>
                    </div>

                    <div class="summary">
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>P500.00</span>
                        </div>
                        <div class="summary-row">
                            <span>Total</span>
                            <span>P500.00</span>
                        </div>
                    </div>

                    <div class="payment-methods">
                        <h3>Payment Methods</h3>
                        <div class="payment-option">
                            <input type="radio" id="gcash" name="payment" value="Gcash" required>
                            <label for="gcash">Gcash</label>
                        </div>
                        <div class="payment-option">
                            <input type="radio" id="paypal" name="payment" value="PayPal" required>
                            <label for="paypal">PayPal</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="background-color: #635d5d; margin-top: 20px;">Done</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
