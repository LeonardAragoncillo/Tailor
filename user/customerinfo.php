<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "upcoming_appointment";
    $connection = new mysqli($servername, $username, $password, $database);

    // Check for successful connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Retrieve appointment ID from query parameter
    $appointment_id = $_GET['appointment_id'] ?? 0;

    // Validate appointment ID
    if ($appointment_id <= 0) {
        echo "<script>alert('Invalid appointment ID.'); window.history.back();</script>";
        exit();
    }

    // Capture form data
    $customer_name = $_POST['customer_name'] ?? '';
    $customer_age = $_POST['customer_age'] ?? 0;
    $customer_contact = $_POST['customer_contact'] ?? '';
    $customer_address = $_POST['customer_address'] ?? '';
    $customer_gender = $_POST['customer_gender'] ?? '';

    // Validate required fields
    if (empty($customer_name) || $customer_age <= 0 || empty($customer_contact) || empty($customer_address) || empty($customer_gender)) {
        echo "<script>alert('Please fill out all required fields.'); window.history.back();</script>";
        exit();
    }

    // Update the existing row in the database
    $stmt = $connection->prepare("
        UPDATE appointments 
        SET customer_name = ?, customer_age = ?, customer_contact = ?, customer_address = ?, customer_gender = ? 
        WHERE id = ?
    ");
    $stmt->bind_param(
        "sisssi",
        $customer_name,
        $customer_age,
        $customer_contact,
        $customer_address,
        $customer_gender,
        $appointment_id
    );

    if ($stmt->execute()) {
        header("Location: payment.php"); // Redirect to payment page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $connection->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/appointment1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Customer Information</title>
</head>

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
    <div class="form">
        <form action="" method="POST">
            <label for="Name">Full Name:</label>
            <input type="text" id="Name" name="customer_name" placeholder="First, Middle, Last" required>

            <label for="Age">Age:</label>
            <input type="number" id="Age" name="customer_age" placeholder="Enter your age" required>

            <label for="Contact">Contact No:</label>
            <input type="tel" id="Contact" name="customer_contact" placeholder="Enter your contact number" required>

            <label for="Address">Address:</label>
            <textarea id="Address" name="customer_address" placeholder="Enter your address" required></textarea>

            <label for="Gender">Gender:</label>
            <div class="btn-group">
                <button id="gender-button" type="button" class="btn btn-secondary dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Select Gender
                </button>
                <ul class="dropdown-menu" id="gender-dropdown">
                    <li><button class="dropdown-item" type="button" onclick="selectGender('Male')">Male</button></li>
                    <li><button class="dropdown-item" type="button" onclick="selectGender('Female')">Female</button></li>
                </ul>
            </div>
            <input type="hidden" id="gender" name="customer_gender">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
    <script>
        function selectGender(gender) {
            document.getElementById('gender-button').textContent = gender;
            document.getElementById('gender').value = gender;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
