<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "upcoming_appointment";

// Database connection
$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form input
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $status = "Pending";

    // Combine date and time into a single datetime value
    $datetime = $appointment_date . " " . $appointment_time;
    $formatted_datetime = date('Y-m-d H:i:s', strtotime($datetime));
    echo "Formatted DateTime: " . $formatted_datetime;
    try {
        // Check for duplicate entries using SELECT 1
        $checkStmt = $connection->prepare("SELECT 1 FROM upcoming_list WHERE Date_Time = ?");
        $checkStmt->bind_param("s", $formatted_datetime);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            // Duplicate found
            echo "<script>alert('This appointment time is already booked. Please choose another time.');</script>";
        } else {
            // Insert the new appointment
            $insertStmt = $connection->prepare("INSERT INTO upcoming_list (Date_Time, Status) VALUES (?, ?)");
            $insertStmt->bind_param("ss", $formatted_datetime, $status);

            if ($insertStmt->execute()) {
                // Redirect to prevent form resubmission
                header("Location: ../user/payment.php");
                exit();
            } else {
                throw new Exception("Failed to insert appointment: " . $insertStmt->error);
            }
        }

        $checkStmt->close();
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}

$connection->close();
?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/appointment1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
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
                    <a href="../user/myorders.html"><span>My Orders</span></a>
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
        <div class="appointment-wrapper">
            <div class="appointment-header">
                <h1>Book an Appointment</h1>
            </div>
            <form action="" method="POST">
                <div class="appointment-form-group">
                    <label for="appointment-date">Select Date:</label>
                    <input type="date" id="appointment-date" name="appointment_date" class="form-control" required>
                </div>
                <div class="appointment-form-group">
                    <label for="appointment-time">Select Time:</label>
                    <input type="time" id="appointment-time" name="appointment_time" class="form-control" required>
                </div>
                <button type="submit" class="btn" style="background-color: #635d5d;">Book Appointment</button>
            </form>
        </div>

        
    </div>
    <script>
    document.querySelector('form').addEventListener('submit', function (event) {
    const submitButton = this.querySelector('button[type="submit"]');

    // Disable the submit button to prevent multiple submissions
    if (submitButton.disabled) {
        event.preventDefault(); // Prevent additional form submission
        return false;
    }

    submitButton.disabled = true; // Disable the button after the first click
});


    </script>

    <style>
                .appointment-wrapper {
            margin: 20px auto;
            max-width: 600px;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .appointment-header h1 {
            font-size: 48px;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .appointment-content {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .appointment-form-group label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .appointment-summary {
            margin-top: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .appointment-summary-row {
            display: flex;
            justify-content: space-between;
        }

        .btn {
            margin-top: 20px;
            color: white;
            width: 100%;
        }
    </style>
</body>

</html>
