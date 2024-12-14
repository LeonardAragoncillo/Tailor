<?php

$servername="localhost";
$username="root";
$password="";
$database="upcoming_appointment";

//create connection
$conn= new mysqli($servername, $username, $password, $database);

$id = "";
$Name = "";
$Date_Time = "";
$Quantity = "";
$Description = "";
$Amount = "";
$Balance = "";
$Status = "";

$errorMessage= "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Get method: Show data of the client

    if (!isset($_GET['id'])) {
        header("location: /admin/upcoming.php");
        exit;
    }
    $id = $_GET['id'];

    //read the row of the selected clint from the database
    $sql = "SELECT * FROM upcoming_list WHERE id = '$id'";
    $result= $conn->query($sql);
    $row= $result->fetch_assoc();

    if (!$row){
        header("location: ../admin/upcoming.php");
        exit;
    }
    $Name =$row ["Name"];
    $Date_Time =$row ["Date_Time"];
    $Quantity =$row ["Quantity"];
    $Description =$row ["Description"];
    $Amount = $row["Amount"];
    $Balance = $row["Balance"];
    $Status = $row["Status"];
}
else{
    //POST method: Update data of the client
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST["id"];
        $Name = $conn->real_escape_string($_POST["Name"]);
        $Date_Time = $conn->real_escape_string($_POST["Date_Time"]);
        $Quantity = $conn->real_escape_string($_POST["Quantity"]);
        $Description = $conn->real_escape_string($_POST["Description"]);
        $Amount = $conn->real_escape_string($_POST["Amount"]);
        $Balance = $conn->real_escape_string($_POST["Balance"]);
        $Status = $conn->real_escape_string($_POST["Status"]);
    
        do {
            if (empty($id) || empty($Name) || empty($Date_Time) || empty($Quantity) || empty($Description) || empty($Amount) || empty($Balance) || empty($Status)) {
                $errorMessage = "All fields are required.";
                break;
            }
    
            // Debugging: Print the values before query execution
            echo "ID: $id<br>";
            echo "Name: $Name<br>";
            echo "Date_Time: $Date_Time<br>";
            echo "Quantity: $Quantity<br>";
            echo "Description: $Description<br>";
            echo "Amount: $Amount<br>";
            echo "Balance: $Balance<br>";
            echo "Status: $Status<br>";
    
            
            // Create the SQL query
            $sql = "UPDATE upcoming_list SET 
                    Name = '$Name', 
                    Date_Time = '$Date_Time', 
                    Quantity = '$Quantity', 
                    Description = '$Description', 
                    Amount = '$Amount', 
                    Balance = '$Balance', 
                    Status = '$Status' 
                    WHERE id = '$id'";
    
            // Debugging: Output the query
            echo "Generated Query: " . $sql . "<br>";
    
            // Execute the query
            $result = $conn->query($sql);
    
            if (!$result) {
                die("SQL Error: " . $conn->error);
            }
    
            $successMessage = "Updated Successfully";
            header("location: ../admin/upcoming.php");
            exit;
    
        } while (true);
    }
    
    
}
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="../css/Walkin.css">
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
                                <li><a href="upcoming.php">Upcoming Appointment</a></li>
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
                <h1>Add New Appointment</h1>
            </div>

            <?php
            if (!empty($errorMessage)) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
            ?>
            <div class="container-4">

                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    
                </form>
                <form method="post">
                    <input type="hidden" value="<?php echo $id?>">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="Name" value="<?php echo $Name;  ?>">
                    </div>
                    <div class="form-group">
                        <label for="Date_Time">Date/Time:</label>
                        <input type="datetime-local" id="Date_Time" name="Date_Time" value="<?php echo $Date_Time;  ?>">
                    </div>
                    <div class="form-group">
                        <label for="Quantity">Quantity:</label>
                        <input type="number" id="Quantity" name="Quantity" value="<?php echo $Quantity;  ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" id="description" name="Description" value="<?php echo $Description;  ?>">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="number" id="amount" name="Amount" value="<?php echo $Amount;  ?>">
                    </div>
                    <div class="form-group">
                        <label for="balance">Balance:</label>
                        <input type="number" id="balance" name="Balance" value="<?php echo $Balance;  ?>">
                    </div>
                    <div class="form-group">
                    <label for="status">Status:</label>
                        <select id="status" name="Status">
                            <option value="Pending" <?php echo ($Status == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                            <option value="Approved" <?php echo ($Status == 'Approved') ? 'selected' : ''; ?>>Approved</option>
                        </select>
                    </div>


                    <?php
                    if ( !empty($successMessage)){
                        echo"
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-sucess alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label></button>
                            </div>
                        </div>
                        ";
                    }
                    ?>
                    
                    <div class="button-container">
                            <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                    <div class="button-container">
                            <a class="btn btn-outline-primary" href="../admin/upcoming.php">cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>