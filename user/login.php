<?php
session_start(); // Start a session for storing user info

$servername = 'localhost'; // Database host
$user = 'root'; // Database user
$pass = ''; // Database password
$dbname = 'upcoming_appointment'; // Your database name

// Create connection
$conn = new mysqli($servername, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, Name, Password FROM customer WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['Password'])) { // Use password_verify for hashed passwords
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['Name'];

            // Redirect to landing page
            header("Location: ../user/homepage.php");
            exit();
        } else {
            echo "<script>alert('Invalid password!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('No account found with this email!'); window.history.back();</script>";
    }
    $stmt->close();
}
$conn->close();
?>



<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css" media="all" />
</head>

<body>
    <div>
        <p class="brand">MMRC Tailoring</p>
    </div>
    <div class="form">
        <form action="../user/login.php" method="POST">
            <h2 style="text-align: center; padding-bottom: 30px;">Welcome Back!</h2>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" required />

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" required />

            <button type="submit" class="btn btn-primary">Login</button>

            <p>Don't have an account? 
                <a style="font-weight: bold; padding-left: 3px;" href="../user/signup.php">Sign Up</a>
            </p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
