<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="../css/upcoming.css">
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
                        <a href="customer.html"><span>Customer</span></a>
                    </li>
                    <li>
                        <div class="drop">
                            <img src="../img/timetable-icon.png" alt="" class="icon">
                            <a href="javascript:void(0);" class="btn dropdown-toggle"><span>Appointment</span></a>
                            <ul class="dropdown">
                                <li><a href="upcoming.html">Upcoming Appointment</a></li>
                                <li><a href="ongoing.html">Ongoing Appointments</a></li>
                                <li><a href="Walkin.html">Walk-in</a></li>
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
            <div class="intro">
                <h1>Upcoming Appointments</h1>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Appointment Id.</th>
                            <th>Customer Name</th>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Balance</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $servername = "localhost";
                        $username= "root";
                        $password= "";
                        $database= "upcoming_appointment";

                        //create connection
                        $connection = new mysqli($servername, $username, $password, $database);
                         
                        //check connection
                        if ($connection->connect_error){
                            die("Connection failed: " . $connection-> connect_error);
                        }

                        //read all row from database table
                        $sql = "SELECT * FROM upcoming_list";
                        $result = $connection->query($sql);

                        if (!$result){
                            die("Invalid Query: ". $connection->error);
                        }

                        //read data of each row
                        while($row = $result->fetch_assoc()){
                            echo "
                             <tr>
                            <td>$row[id]</td>
                            <td>$row[Name]</td>
                            <td>$row[Quantity]</td>
                            <td>$row[Description]</td>
                            <td>$row[Amount]</td>
                            <td>$row[Balance]</td>
                            <td>Pending</td>
                            <td>
                                <button class='btn btn-primary btn-sm' href='/admin/edit.php?id=$row[id]'>Edit</button>
                                <button class='btn btn-primary btn-sm' href='/admin/done.php?id=$row[id]'>Done</button>
                                <button class='btn btn-primary btn-sm'href='/admin/cancel.php?id=$row[id]'>Cancel</button>
                            </td>
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