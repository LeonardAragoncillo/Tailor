<?php
// Database connection settings
$host = 'localhost';
$username = 'root'; // Replace with your DB username
$password = ''; // Replace with your DB password
$database = 'tailor_management'; // Replace with your DB name

// Establish database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Helper function to handle JSON responses
function sendResponse($status, $message, $data = null) {
    header('Content-Type: application/json');
    echo json_encode(['status' => $status, 'message' => $message, 'data' => $data]);
    exit;
}

// Determine the request type
$action = isset($_POST['action']) ? $_POST['action'] : '';

switch ($action) {
    case 'addAppointment':
        // Add a new appointment
        $customerName = $_POST['customerName'];
        $appointmentDate = $_POST['appointmentDate'];
        $description = $_POST['description'];

        $sql = "INSERT INTO appointments (customer_name, appointment_date, description, status) VALUES (?, ?, ?, 'Pending')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $customerName, $appointmentDate, $description);

        if ($stmt->execute()) {
            sendResponse('success', 'Appointment added successfully');
        } else {
            sendResponse('error', 'Failed to add appointment');
        }

        $stmt->close();
        break;

    case 'getAppointments':
        // Fetch all appointments
        $sql = "SELECT * FROM appointments ORDER BY appointment_date ASC";
        $result = $conn->query($sql);

        $appointments = [];
        while ($row = $result->fetch_assoc()) {
            $appointments[] = $row;
        }

        sendResponse('success', 'Appointments retrieved successfully', $appointments);
        break;

    case 'updateAppointment':
        // Update appointment status
        $appointmentId = $_POST['appointmentId'];
        $status = $_POST['status'];

        $sql = "UPDATE appointments SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $status, $appointmentId);

        if ($stmt->execute()) {
            sendResponse('success', 'Appointment updated successfully');
        } else {
            sendResponse('error', 'Failed to update appointment');
        }

        $stmt->close();
        break;

    default:
        sendResponse('error', 'Invalid action');
}

// Close the database connection
$conn->close();
?>
