<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "upcoming_appointment";

// Connect to the database
$connection = new mysqli($servername, $username, $password, $database);

// Check for successful connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $customer_name = $_POST['customer_name'];
    $customer_age = $_POST['customer_age'];
    $customer_contact = $_POST['customer_contact'];
    $customer_address = $_POST['customer_address'];
    $customer_gender = $_POST['customer_gender'];
    $appointment_date = date('Y-m-d H:i:s');

    // Use prepared statements
    $stmt = $connection->prepare("INSERT INTO upcoming_list (Name, Age, Contact, Address, Description, Date_Time, Status) 
                                  VALUES (?, ?, ?, ?, 'N/A', ?, 'Pending')");
    $stmt->bind_param("sisss", $customer_name, $customer_age, $customer_contact, $customer_address, $appointment_date);

    if ($stmt->execute()) {
        header("Location: ../user/bookdateandtime.php"); // Update this path based on actual location
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
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
    <title>Customer Information</title>
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
                <ul class="dropdown-menu">
                    <li><button class="dropdown-item" type="button" onclick="selectGender('Male')">Male</button></li>
                    <li><button class="dropdown-item" type="button" onclick="selectGender('Female')">Female</button></li>
                </ul>
            </div>
            <input type="hidden" id="gender" name="customer_gender">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        function selectGender(gender) {
            document.getElementById('gender-button').textContent = gender;
            document.getElementById('gender').value = gender;
        }
    </script>
</body>
</html>
