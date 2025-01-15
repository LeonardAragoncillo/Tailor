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
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check if email and password fields are not empty
    if (!empty($email) && !empty($password)) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT id, Name, Password FROM customer WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $row['Password'])) { // Verify hashed password
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['Name'];

                // Redirect to homepage
                header("Location: ../user/homepage.php");
                exit();
            } else {
                // Password mismatch
                echo "<script>alert('Invalid password! Please try again.'); window.history.back();</script>";
            }
        } else {
            // No account found with the provided email
            echo "<script>alert('No account found with this email!'); window.history.back();</script>";
        }
        $stmt->close();
    } else {
        // Empty email or password
        echo "<script>alert('Please enter both email and password!'); window.history.back();</script>";
    }
}
$conn->close();
?>




<!DOCTYPE html>
<html>

    <head>
        <title>Login Form</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/login.css" media="all" />

        <style>
        .password-wrapper {
            position: relative;
            width: 100%;
        }

        .password-wrapper input {
            width: 87%;
            padding-right: 52px;
            margin-left: 30px; /* Space for the icon */
        }

        .toggle-password {
            position: absolute;
            right: 40px; /* Position the icon inside the input field */
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            color: #6c757d;
        }

        .toggle-password:focus {
            outline: none;
        }

        .toggle-password:hover {
            color: #495057; /* Darken icon on hover */
        }
    </style>
    </head>

    <body>
        <div>
            <p class="brand">MMRC Tailoring</p>
        </div>
        <div class="login-container">
            <div class="form">
                <h1 style="text-align: center; padding-bottom: 10px;">Login</h1>
                <form action="login.php" method="POST">
                    <input type="email" id="email" name="email" placeholder="Email" required />

                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" required />
                        <button type="button" id="togglePassword" class="toggle-password" aria-label="Toggle password visibility">
                            🙈 <!-- Default closed eyes icon -->
                        </button>
                    </div>


                    <button type="submit" class="btn login-btn">Login</button>

                    <p>Don't have an account?
                        <a class="text-decoration-none" style="font-weight: bold; padding-left: 3px;"
                            href="../user/signup.php">Sign Up</a>
                    </p>
                </form>
            </div>
        </div>
        <script>
        // JavaScript to toggle password visibility
        const passwordInput = document.getElementById('password');
        const togglePasswordButton = document.getElementById('togglePassword');

        togglePasswordButton.addEventListener('click', () => {
            const isPasswordHidden = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPasswordHidden ? 'text' : 'password');

            // Update icon based on state
            togglePasswordButton.innerHTML = isPasswordHidden ? '👁️' : '🙈';
        });
    </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>