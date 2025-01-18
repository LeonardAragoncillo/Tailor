<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/appointment1.css">
    <title>Appointment Confirmation</title>
    <style>
        div.container {
            height: 18%;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .container {
            max-width: 600px;
            min-height: 60vh;
            /* Dynamically adjust height */
            background: #ffffff;
            border-radius: 10px;
            padding: 40px;
            /* Increased padding for spacing */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Center content vertically */
            align-items: center;
            /* Center content horizontally */
            text-align: center;
        }

        .container h1 {
            font-size: 36px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .container p {
            font-size: 18px;
            color: #555;
            margin: 10px 0;
        }

        .btn-primary {
            margin-top: 20px;
            background-color: #007bff;
            border-color: #007bff;
            font-size: 18px;
            font-weight: bold;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>

<body>
    <header>
        <div class="inside">
            <h2>MMRC Tailoring</h2>
            <ul class="menu">
                <li>
                    <a href="../user/homepage.html"><span>Home</span></a>
                </li>
                <li>
                    <a href="../user/appointment.html"><span>Appointment</span></a>
                </li>
                <li>
                    <a href="../user/myorders.html"><span>My Orders</span></a>
                </li>
                <li>
                    <a href="#flowers"><span>Account</span></a>
                </li>
                <li>
                    <a href="../user/login.html"><span>Logout</span></a>
                </li>
            </ul>
        </div>
    </header>
    <div class="bgrectang">
        <div class="container">
            <h1 class="mb-3">Appointment Pending</h1>
            <p>Your appointment has been successfully booked. It is now waiting for confirmation.</p>
            <p><strong>Date:</strong> <span id="confirmed-date">Loading...</span></p>
            <p><strong>Time:</strong> <span id="confirmed-time">Loading...</span></p>
            <p><strong>Payment Method:</strong> <span id="payment-method">Loading...</span></p>
            <p id="payment-details" style="display: none;">Thank you for choosing <span id="payment-type"></span>.</p>
            <a href="../user/homepage.php" class="btn">Go Back to Home</a>
        </div>
    
        <script>
            // Retrieve query parameters from the URL
            const urlParams = new URLSearchParams(window.location.search);
            const appointmentDate = urlParams.get('date');
            const appointmentTime = urlParams.get('time');
            const paymentMethod = urlParams.get('payment');
    
            // Populate the fields with the query parameter values
            document.getElementById('confirmed-date').textContent = appointmentDate || 'N/A';
            document.getElementById('confirmed-time').textContent = appointmentTime || 'N/A';
            document.getElementById('payment-method').textContent = paymentMethod || 'N/A';
    
            // Display additional payment details based on the payment method
            if (paymentMethod) {
                const paymentDetails = document.getElementById('payment-details');
                const paymentType = document.getElementById('payment-type');
                paymentType.textContent = paymentMethod;
                paymentDetails.style.display = 'block';
            }
        </script>
    </div>
</body>

</html>