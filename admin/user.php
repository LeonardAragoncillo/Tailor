<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
                        <a href="../admin/customer.php"><span>User</span></a>
                    </li>
                    <li>
                        <div class="drop">
                            <img src="../img/timetable-icon.png" alt="" class="icon">
                            <a href="javascript:void(0);" class="btn dropdown-toggle"><span>Appointment</span></a>
                            <ul class="dropdown">
                                <li><a href="../admin/upcoming.php">Upcoming Appointment</a></li>
                                <li><a href="../admin/ongoing.html">Ongoing Appointments</a></li>
                                <li><a href="../admin/walkint.php">walk-in</a></li>
                            </ul>
                        </div>

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
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const appointmentItem = document.querySelector('.menu li:nth-child(4)'); // Adjust index if needed
                        const dropdown = appointmentItem.querySelector('.dropdown');

                        appointmentItem.querySelector('a').addEventListener('click', function (event) {
                            event.stopPropagation(); // Prevent the click from bubbling up
                            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block'; // Toggle dropdown
                        });

                        // Close the dropdown if clicked outside
                        document.addEventListener('click', function () {
                            dropdown.style.display = 'none';
                        });
                    });
                </script>
            </div>
        </div>
        <div class="container-3">
        <div class="content-1">
            <h3><strong>User</strong></h3>
        </div>
        <div class="table-container table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Middlename</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Contact</th>
                        <th>Sign-up Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "upcoming_appointment";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $database);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Read all rows from database
                    $sql = "SELECT id, Name, Middle_Name, Last_Name, Email, Password, Contact, signup_date FROM customer";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid Query: " . $conn->error);
                    }
                    while ($row = $result->fetch_assoc()) {
                        $trimmed_password = substr($row['Password'], 0, 10) . '...';
                        echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['Name']}</td>
                            <td>{$row['Middle_Name']}</td>
                            <td>{$row['Last_Name']}</td>
                            <td>{$row['Email']}</td>
                            <td>{$trimmed_password}</td>
                            <td>{$row['Contact']}</td>
                            <td>{$row['signup_date']}</td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>