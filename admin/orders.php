<?php
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

// Fetch data from the appointments table
$sql = "SELECT id, customer_name AS name, school, quantity, size, payment_method, status FROM appointments";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Orders</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .main-container {
            display: flex;
        }

        .side-bar {
            width: 20%;
            min-height: 100vh;
            background-color: #343a40;
            color: #fff;
            padding: 20px;
        }

        .side-bar a {
            color: #fff;
            text-decoration: none;
        }

        .side-bar .menu li {
            margin-bottom: 15px;
        }

        .main-content {
            width: 80%;
            margin-left: auto;
            padding: 20px;
        }

        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .table {
            width: 90%; /* Occupy most of the white space */
            margin: 0 auto; /* Center the table */
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <header>
        <div class="calendar">
            <div class="container">
                <div>
                    <img src="../img/calendar-icon.png" alt="" class="calendar-icon">
                </div>
                <div class="Todays-date">
                    <p class="date-label">Today's Date</p>
                    <div id="current-date" class="date-display"></div>
                </div>
            </div>
        </div>
    </header>

    <script>
        // to display today's date
        const dateElement = document.getElementById('current-date');
        const today = new Date();
        const options = { year: 'numeric', month: 'numeric', day: 'numeric' };
        const currentDate = today.toLocaleDateString('en-US', options);
        dateElement.innerHTML = currentDate;
    </script>

    <div class="main-container">
        <!-- Sidebar -->
        <div class="side-bar">
            <div class="container-1">
                <div class="profile">
                    <img src="../img/profile.png" alt="" class="profile-icon">
                    <div class="profile-label">
                        <h5>Administrator</h5>
                        <p>admin@gmail.com</p>
                    </div>
                </div>
            </div>

            <div class="container-2">
                <ul class="menu">
                    <li>
                        <img src="../img/speedometer-icon.png" alt="" class="icon">
                        <a href="admin.html"><span>Dashboard</span></a>
                    </li>
                    <li>
                        <img src="../img/sewing-machine-icon.png" alt="" class="icon">
                        <a href="tailor.html"><span>Tailor</span></a>
                    </li>
                    <li>
                        <img src="../img/male-icon.png" alt="" class="icon">
                        <a href="../admin/customer.php"><span>Customer</span></a>
                    </li>
                    <li>
                        <div class="drop">
                            <img src="../img/timetable-icon.png" alt="" class="icon">
                            <a href="javascript:void(0);" class="btn dropdown-toggle"><span>Appointment</span></a>
                            <ul class="dropdown">
                                <li><a href="upcoming.html">Upcoming Appointment</a></li>
                                <li><a href="ongoing.html">Ongoing Appointments</a></li>
                                <li><a href="walkint.php">Walk-in</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <img src="../img/male-icon.png" alt="" class="icon">
                        <a href="../admin/customer.php"><span>Orders</span></a>
                    </li>
                    <li>
                        <img src="../img/sand-clock-half-icon.png" alt="" class="icon">
                        <a href=""><span>Calendar</span></a>
                    </li>
                    <li>
                        <img src="../img/project-icon.png" alt="" class="icon">
                        <a href=""><span>History</span></a>
                    </li>
                    <li>
                        <img src="../img/door-check-out-icon.png" alt="" class="icon">
                        <a href=""><span>Log out</span></a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="table-container">
                <h1 class="mb-4 text-center">Appointments Data</h1>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>School</th>
                            <th>Quantity</th>
                            <th>Size</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['school']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['size']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['payment_method']) . "</td>";
                                echo "<td>
                                        <a href='view.php?id=" . $row['id'] . "' class='btn btn-info btn-sm'>View</a>
                                        <a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                        <a href='approve.php?id=" . $row['id'] . "' class='btn btn-success btn-sm'>Approve</a>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>No data available</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$connection->close();
?>
