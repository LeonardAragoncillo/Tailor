<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/appointment1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Payment</title>
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <header>
        <div class="inside">
            <h2>MMRC Tailoring</h2>
            <ul class="menu">
                <li>
                    <a href="../user/homepage.php"><span>Home</span></a>
                </li>
                <li>
                    <a href="../user/appointment.php"><span>Appointment</span></a>
                </li>
                <li>
                    <a href="../user/myorders.php"><span>My Orders</span></a>
                </li>
                <li>
                    <a href="#flowers"><span>Account</span></a>
                </li>
                <li>
                    <a href="../user/login.php"><span>Logout</span></a>
                </li>
            </ul>
        </div>
    </header>
    <div class="bgrectang">
        <div class="checkout-container">
            <div class="header">
                <h1>Payment</h1>
            </div>
            <div class="content">
                <div class="note">
                    <strong>Note:</strong> A 50% downpayment is strictly required to process your order.
                </div>
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
                        <input type="radio" id="gcash" name="payment" value="Gcash">
                        <label for="gcash">Gcash</label>
                    </div>
                    <div class="payment-option">
                        <input type="radio" id="paypal" name="payment" value="Paypal">
                        <label for="paypal">PayPal</label>
                    </div>
                </div>

                <button class="btn" id="checkout-btn" style="background-color: #635d5d;">Done</button>
            </div>
        </div>

        <script>
            // Retrieve date and time from query parameters
            const urlParams = new URLSearchParams(window.location.search);
            const appointmentDate = urlParams.get('date');
            const appointmentTime = urlParams.get('time');

            // Redirect to confirmation page on clicking Done
            document.getElementById('checkout-btn').addEventListener('click', () => {
                const selectedPayment = document.querySelector('input[name="payment"]:checked');
                if (!selectedPayment) {
                    alert('Please select a payment method.');
                } else {
                    const paymentMethod = selectedPayment.value;

                    // Redirect to confirmation.html with query parameters
                    window.location.href = `confirmation.html?date=${encodeURIComponent(appointmentDate)}&time=${encodeURIComponent(appointmentTime)}&payment=${encodeURIComponent(paymentMethod)}`;
                }
            });
        </script>
    </div>
</body>

</html>
