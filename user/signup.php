<?php
// Database connection
$servername= "localhost";
$dbname = "upcoming_appointment";
$user = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Secure password
    $first_name = $_POST['firstname'];
    $middle_name = $_POST['middlename'];
    $last_name = $_POST['lastname'];
    $contact_number = $_POST['contactnumber'];

    // Insert data into the database
    $sql = "INSERT INTO customer (Email, Password, Name, Middle_Name, Last_Name, Contact) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssss", $email, $password, $first_name, $middle_name, $last_name, $contact_number);

        if ($stmt->execute()) {
            echo "<script>alert('Registration Successful!'); window.location.href = '../user/homepage.html';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/signup.css" media="all" />
        <title>Registration From</title>
    </head>

    <body>
        <div class="sign-up-container">
            <div>
                <p class="brand">MMRC Tailoring</p>
            </div>
            <div class="form">
                <form method="POST" action="">
                    <h2 style="text-align: center; margin: 0%;">Sign Up</h2>


                    <div class="d-flex flex-row">
                        <div>
                            <!-- <label for="firstname">First Name:</label> -->
                            <input type="text" id="firstname" placeholder="First Name" name="firstname" />
                        </div>
                        <div class=" ms-2 me-2">
                            <!-- <label for="Middlename">Middle Name:</label> -->
                            <input type="text" id="Middlename" placeholder="Middle Name" name="middlename" />
                        </div>
                        <div>
                            <!-- <label for="Lastname">Last Name:</label> -->
                            <input type="text" id="Lastname" placeholder="Last Name" name="lastname" />
                        </div>
                    </div>

                    <div class="d-flex flex-row">
                        <div class="me-1 w-50">
                            <!-- <label for="Contactnumber">Contact Number:</label> -->
                            <input type="tel" id="Contactnumber" placeholder="Contact Number" name="contactnumber" />
                        </div>

                        <div class="ms-1 w-50">
                            <!-- <label style="padding-top: 25px;" for="email">Email:</label> -->
                            <input type="email" id="email" placeholder="Email Address" name="email" />
                        </div>
                    </div>

                    <!-- <label for="password">Password:</label> -->
                    <input type="password" id="password" placeholder=" Password" name="password" />

                    <!-- <label for="ConfirmPassword">Confirm Password:</label> -->
                    <input type="password" id="ConfirmPassword" placeholder="Confirm Password" name="confirmPassword" />

                    <button type="submit" id="submit" class="btn sign-up-btn">Sign Up</button>

                    <p>Already have an account? <a style="font-weight: bold; padding: 0px 5px; "
                            class="text-decoration-none" href="login.php"> Login</a> Here.</p>
                </form>
            </div>
        </div>
        <script>
        //simple client side-side password validation
        document.querySelector("form").onsubmit = function() {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirmPassword").value;
            if (password != confirmPassword) {
                alert("Password do not match!");
                return false; //prevent submission
            }
        };
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>