<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="../css/admin.css">
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
                        <a href="../admin/orders.php"><span>Orders</span></a>
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
        <div class="content">
            <div class="container-3">
                <h3><strong>Status</strong></h3>
            </div>
            <div class="main-box">
                <div class="box" id="box">
                    <div class="box-1">
                        <img class="img" src="../img/sewing-machine-icon.png" alt="">
                        <div class="inside">
                            <h4>1</h4>
                            <h3>Tailorers</h3>
                        </div>
                    </div>
                </div>
                <div class="box" id="box">
                    <div class="box-1">
                        <img class="img" src="../img/male-icon.png" alt="">
                        <div class="inside">
                            <h5>4</h5>
                            <h4>Customers</h4>
                        </div>
                    </div>
                </div>
                <div class="box" id="box">
                    <div class="box-1">
                        <img class="img" src="../img/timetable-icon.png" alt="">
                        <div class="inside">
                            <h5>4</h5>
                            <h4>Appointments</h4>
                        </div>
                    </div>
                </div>
                <div class="box" id="box">
                    <div class="box-1">
                        <img class="img" src="../img/sewing-machine-icon.png" alt="">
                        <div class="inside">
                            <h5>4</h5>
                            <h4>Ongoing</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="transact">
                <div class="table">
                    <div class="container-4">
                        <h3><strong>Upcoming Appointments</strong></h3>
                    </div>
                    <div class="box-4">
                        <table class="table">
                            <tr style="border-bottom: 2px solid black;">
                                <td>Appointment no.</td>
                                <td>Customer Name</td>
                                <td>Tailor</td>
                                <td>Session</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Mark Dela Cruz</td>
                                <td>Jose Chan</td>
                                <td>Session</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Edgar Dela Cerna</td>
                                <td>Tanya Madrigad</td>
                                <td>Session</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Jose Santa Cruz</td>
                                <td>Michael Cruz</td>
                                <td>Session</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Maria Dela Cruz</td>
                                <td>John Emperial</td>
                                <td>Session</td>
                            </tr>
                            
                        </table>
                        <button type="button" id="button">Show All</button>
                    </div>
                </div>
                <div class="table">
                    <div class="container-4">
                        <h3 style="margin-left: 42px;"><strong>Ongoing Appointments</strong></h3>
                    </div>
                    <div class="box-5">
                        <table class="table">
                            <tr style="border-bottom: 2px solid black;">
                                <td>Appointment no.</td>
                                <td>Customer Name</td>
                                <td>Tailor</td>
                                <td>Session</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Mark Dela Cruz</td>
                                <td>Jose Chan</td>
                                <td>Session</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Edgar Dela Cerna</td>
                                <td>Tanya Madrigad</td>
                                <td>Session</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Jose Santa Cruz</td>
                                <td>Michael Cruz</td>
                                <td>Session</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Maria Dela Cruz</td>
                                <td>John Emperial</td>
                                <td>Session</td>
                            </tr>
                        </table>
                        <button type="button" id="button">Show All</button>
                    </div>
                </div>
                
            </div>
            <div class="container-4">
                <h3><strong>Walk-in</strong></h3>
            </div>
            <div class="box-4">
                <table class="table">
                    <tr style="border-bottom: 2px solid black;">
                        <td>Appointment no.</td>
                        <td>Customer Name</td>
                        <td>Tailor</td>
                        <td>Session</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Mark Dela Cruz</td>
                        <td>Jose Chan</td>
                        <td>Session</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Edgar Dela Cerna</td>
                        <td>Tanya Madrigad</td>
                        <td>Session</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Jose Santa Cruz</td>
                        <td>Michael Cruz</td>
                        <td>Session</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Maria Dela Cruz</td>
                        <td>John Emperial</td>
                        <td>Session</td>
                    </tr>
                    
                </table>
                <button type="button" id="button">Show All</button>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>