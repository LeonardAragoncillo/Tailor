<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointment_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create appointments table if not exists
$sql = "CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    slots_booked INT DEFAULT 0,
    max_slots INT DEFAULT 5
)";

if ($conn->query($sql) === FALSE) {
    die("Error creating table: " . $conn->error);
}

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'getAppointments') {
        $date = $_POST['date'];

        $stmt = $conn->prepare("SELECT slots_booked, max_slots FROM appointments WHERE date = ?");
        $stmt->bind_param("s", $date);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(["slots_booked" => 0, "max_slots" => 5]);
        }

        $stmt->close();

    } elseif ($action === 'bookAppointment') {
        $date = $_POST['date'];

        // Check if the date exists
        $stmt = $conn->prepare("SELECT slots_booked, max_slots FROM appointments WHERE date = ?");
        $stmt->bind_param("s", $date);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        if ($data) {
            if ($data['slots_booked'] < $data['max_slots']) {
                $stmt = $conn->prepare("UPDATE appointments SET slots_booked = slots_booked + 1 WHERE date = ?");
                $stmt->bind_param("s", $date);
                $stmt->execute();
                echo json_encode(["status" => "success", "message" => "Appointment booked successfully."]);
            } else {
                echo json_encode(["status" => "error", "message" => "No available slots for this date."]);
            }
        } else {
            $stmt = $conn->prepare("INSERT INTO appointments (date, slots_booked, max_slots) VALUES (?, 1, 5)");
            $stmt->bind_param("s", $date);
            $stmt->execute();
            echo json_encode(["status" => "success", "message" => "Appointment booked successfully."]);
        }

        $stmt->close();
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/appointment.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .bgrectang {
            height: 100vh;
            width: 100%;
            background-image: url(../img/homepage\ bg.png);
            background-size: cover;
            background-position: center;
            display: flex;
            align-content: center;
            align-items: center;
            flex-wrap: wrap;
            justify-content: center;
            flex-direction: column;
            overflow: hidden;
        }

        .calendar {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
            background-color: #f0f0f5;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 75%;
            max-width: 735px;
        }

        .calendar-header {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            margin-bottom: 15px;
        }

        .calendar-header button {
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            background-color: #000000;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin: 0 90px;
        }

        .calendar-header button:hover {
            background-color: #bc2d2d;
        }

        .calendar-header h2 {
            margin: 0 15px;
            font-size: 20px;
            color: #333;
            text-align: center;
        }

        .calendar-table {
            border-collapse: collapse;
            width: 150%;
            max-width: 700px;
            margin-top: 15px;
            margin-left: -10px;
            background-color: #cecece;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
        }

        .calendar-table th,
        .calendar-table td {
            border: 1px solid #ccc;
            text-align: center;
            padding: 18px;
            font-size: 14px;
            cursor: pointer;
        }

        .calendar-table th {
            background-color: #868282;
            font-weight: bold;
        }

        .calendar-table td {
            background-color: #cecece;
            color: rgb(0, 0, 0);
        }

        .calendar-table td:hover {
            background-color: #e0f7fa;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .top-notification {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 10px;
            text-align: center;
            background-color: #f0f0f5;
            color: #333;
            font-size: 16px;
            z-index: 1000;
            display: none;
            transition: all 0.3s ease-in-out;
        }

        .top-notification.success {
            display: block;
            background-color: #d4edda;
            color: #155724;
        }

        .top-notification.error {
            display: block;
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
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

    <!-- Floating Notification -->
    <div id="top-notification" class="top-notification"></div>

    <div class="bgrectang">
        <div class="calendar">
            <h1 style="margin-bottom: 15px; font-size: 24px; color: #333;">Booking an Appointment</h1>
            <div class="calendar-header">
                <button id="prev-month">&#8592; Previous</button>
                <h2 id="current-month"></h2>
                <button id="next-month">Next &#8594;</button>
            </div>
            <div id="calendar-container"></div>
        </div>

        <button id="confirm-appointment" style="margin-top: 20px; padding: 10px 20px; background-color: #000000; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;"
            onclick="redirectToConfirmation()">Confirm Appointment</button>

        <div id="message" class="message"></div>

        <script>
            const appointments = {};
            const MAX_APPOINTMENTS_PER_DAY = 5;
            const calendarContainer = document.getElementById('calendar-container');
            const messageDiv = document.getElementById('message');
            const notificationDiv = document.getElementById('top-notification');
            const currentMonthLabel = document.getElementById('current-month');
            const prevMonthButton = document.getElementById('prev-month');
            const nextMonthButton = document.getElementById('next-month');
            let selectedDate = null;

            function generateCalendar(year, month) {
                const firstDay = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();

                const monthNames = [
                    'January', 'February', 'March', 'April', 'May', 'June',
                    'July', 'August', 'September', 'October', 'November', 'December'
                ];

                currentMonthLabel.textContent = `${monthNames[month]} ${year}`;

                let calendarHTML = '<table class="calendar-table">';
                calendarHTML += '<thead><tr>';
                const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                days.forEach(day => {
                    calendarHTML += `<th>${day}</th>`;
                });
                calendarHTML += '</tr></thead><tbody><tr>';

                for (let i = 0; i < firstDay; i++) {
                    calendarHTML += '<td></td>';
                }

                for (let day = 1; day <= daysInMonth; day++) {
                    const dateKey = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                    const currentAppointments = appointments[dateKey] || 0;
                    const isFull = currentAppointments >= MAX_APPOINTMENTS_PER_DAY;

                    calendarHTML += `<td data-date="${dateKey}" class="${isFull ? 'full' : ''}">
                        ${day} <br>
                        <small>${currentAppointments}/${MAX_APPOINTMENTS_PER_DAY}</small>
                    </td>`;

                    if ((firstDay + day) % 7 === 0) {
                        calendarHTML += '</tr><tr>';
                    }
                }

                calendarHTML += '</tr></tbody></table>';
                calendarContainer.innerHTML = calendarHTML;

                document.querySelectorAll('.calendar-table td[data-date]').forEach(cell => {
                    cell.addEventListener('click', handleDateClick);
                });
            }

            function handleDateClick(event) {
                selectedDate = event.target.getAttribute('data-date');
                if (!selectedDate) return;

                const currentAppointments = appointments[selectedDate] || 0;

                if (currentAppointments < MAX_APPOINTMENTS_PER_DAY) {
                    appointments[selectedDate] = currentAppointments + 1;
                    showNotification(`Appointment temporarily selected for ${selectedDate}. (${appointments[selectedDate]} of ${MAX_APPOINTMENTS_PER_DAY} slots booked)`, 'success');
                } else {
                    showNotification(`No appointments available for ${selectedDate}.`, 'error');
                }

                generateCalendar(new Date().getFullYear(), new Date().getMonth());
            }

            function redirectToConfirmation() {
                if (!selectedDate) {
                    showNotification('Please select a date before confirming.', 'error');
                    return;
                }
                window.location.href = `confirmappointment.php?date=${encodeURIComponent(selectedDate)}`;
            }

            function showNotification(message, type) {
                notificationDiv.textContent = message;
                notificationDiv.className = `top-notification ${type}`;
                setTimeout(() => {
                    notificationDiv.className = 'top-notification';
                }, 5000);
            }

            prevMonthButton.addEventListener('click', () => {
                generateCalendar(new Date().getFullYear(), new Date().getMonth() - 1);
            });

            nextMonthButton.addEventListener('click', () => {
                generateCalendar(new Date().getFullYear(), new Date().getMonth() + 1);
            });

            generateCalendar(new Date().getFullYear(), new Date().getMonth());
        </script>
    </div>
</body>

</html>
