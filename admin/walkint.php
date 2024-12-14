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
                                <li><a href="../admin/upcoming.php">Upcoming Appointment</a></li>
                                <li><a href="ongoing.html">Ongoing Appointments</a></li>
                                <li><a href="../admin/walkint.php">Walk-in</a></li>
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
            <div class="intro" style="margin-left: 141px;">
                <h1>Walk-in</h1>
                <a href="../admin/add_walkin.php" class="btn btn-primary" role="button">Add New Walk-in</a>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Appointment Id.</th>
                            <th>Customer Name</th>
                            <th>Date/Time</th>
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

                        // Handle delete request
                        if (isset($_GET['delete_id'])){
                            $delete_id= $_GET['delete_id'];

                            //prepare delete statement
                            $delete_sql= "DELETE FROM walkin_list WHERE id = ?";
                            $stmt = $connection->prepare($delete_sql);

                            if ($stmt){
                                $stmt->bind_param("i", $delete_id);

                                //execute the prepared statement
                                if ($stmt->execute()){
                                    echo "<div class='alert alert-success'>Record Deleted Successfully.</div>";
                                }else{
                                    echo "<div class='alert alert-danger'>Error Deleting Record: ". $stmt->error . "  </div>";
                                }
                                $stmt->close();
                            }
                        }

                        //read all row from database table
                        $sql = "SELECT * FROM walkin_list";
                        $result = $connection->query($sql);

                        if (!$result){
                            die("Invalid Query: ". $connection->error);
                        }

                        //read data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "
                                <tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['Name']}</td>
                                    <td>{$row['Date_Time']}</td>
                                    <td>{$row['Quantity']}</td>
                                    <td>{$row['Description']}</td>
                                    <td>{$row['Amount']}</td>
                                    <td>{$row['Balance']}</td>
                                    <td>{$row['Status']}</td>
                                    <td>
                                        <a class='btn btn-primary btn-sm' href='../admin/view.php?id={$row['id']}'>View</a>
                                        <a class='btn btn-primary btn-sm' href='../admin/edit_walkin.php?id={$row['id']}'>Edit</a>
                                        <a class='btn btn-danger btn-sm' href='?delete_id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
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