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
                <li><a href="../user/homepage.html"><span>Home</span></a></li>
                <li><a href="../user/appointment.html"><span>Appointment</span></a></li>
                <li><a href="../user/myorders.html"><span>My Orders</span></a></li>
                <li><a href="#flowers"><span>Account</span></a></li>
                <li><a href="../user/login.html"><span>Logout</span></a></li>
            </ul>
        </div>
    </header>

    <div class="bgrectang">
        <div class="rectang2">
            <div class="form">
                <form action="submit_customer_info.php" method="POST">
                    <h2 style="text-align: center;">Customer Information</h2>

                    <!-- Full Name -->
                    <label for="Name" style="padding-top: 18px;">Full Name:</label>
                    <input type="text" id="Name" name="customer_name" placeholder="First, Middle, Last" required>

                    <!-- Birthdate (Age) -->
                    <label for="Age">Age:</label>
                    <input type="number" id="Age" name="customer_age" placeholder="Enter your age" required>

                    <!-- Contact Number -->
                    <label for="Contact">Contact No:</label>
                    <input type="tel" id="Contact" name="customer_contact" placeholder="Enter your contact number" required>

                    <!-- Address -->
                    <label for="Address">Address:</label>
                    <textarea id="Address" name="customer_address" placeholder="Enter your address" required></textarea>

                    <!-- Gender Selection -->
                    <div class="btn-group" style="margin-left: 100px;">
                        <button id="button" type="button" class="btn btn-secondary dropdown-toggle"
                            data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" style="background-color: #635d5d;">
                            Select Gender
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><button class="dropdown-item" type="button" onclick="selectGender('Male')">Male</button></li>
                            <li><button class="dropdown-item" type="button" onclick="selectGender('Female')">Female</button></li>
                        </ul>
                    </div>

                    <script>
                        function selectGender(gender) {
                            // Update the button text with the selected gender
                            document.getElementById('button').textContent = gender;
                            // Optionally, store the gender in a hidden input field
                            document.getElementById('gender').value = gender;
                        }
                    </script>

                    <!-- Hidden input for gender -->
                    <input type="hidden" id="gender" name="customer_gender">

                    <!-- Submit Button -->
                    <div class="next">
                        <button class="btn-1" type="submit" id="next" style="margin-left: 50vh; margin-top: -100px; background-color: #635d5d;">NEXT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    
</body>
<?php
$servername = "localhost";
$username= "root";
$password= "";
$database= "upcoming_appointment";
// Connect to the database
$connection = new mysqli($servername, $username, $password, $database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize form data
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $customer_age = mysqli_real_escape_string($conn, $_POST['customer_age']);
    $customer_contact = mysqli_real_escape_string($conn, $_POST['customer_contact']);
    $customer_address = mysqli_real_escape_string($conn, $_POST['customer_address']);
    $customer_gender = mysqli_real_escape_string($conn, $_POST['customer_gender']);

    // Insert data into the database
    $sql = "INSERT INTO customers (name, age, contact, address, gender) 
            VALUES ('$customer_name', '$customer_age', '$customer_contact', '$customer_address', '$customer_gender')";

    if ($conn->query($sql) === TRUE) {
        echo "Customer information saved successfully!";
        // Redirect to the next page (for example: bookdateandtime.html)
        header("Location: ../user/bookdateandtime.html");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>


</html>
