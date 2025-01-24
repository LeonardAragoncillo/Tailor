<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    // Capture form data
    $school = $_POST['school'] ?? '';
    $uniform_type = $_POST['uniform_type'] ?? '';
    $top = $_POST['top'] ?? '';
    $bottom = $_POST['bottom'] ?? '';
    $set_type = $_POST['set_type'] ?? '';
    $quantity = $_POST['quantity'] ?? 0;
    $size = $_POST['size'] ?? '';

    // Optional fields
    $threads = $_POST['threads'] ?? null;
    $zipper = $_POST['zipper'] ?? null;
    $buttons = $_POST['buttons'] ?? null;
    $tela = $_POST['tela'] ?? null;
    $school_seal = $_POST['school_seal'] ?? null;
    $hook_and_eye = $_POST['hook_and_eye'] ?? null;
    $measurementPicture = null;

    // Optional file upload
    if (!empty($_FILES['measurementPicture']['name'])) {
        $target_dir = "../uploads/";
        $measurementPicture = $target_dir . basename($_FILES["measurementPicture"]["name"]);
        move_uploaded_file($_FILES["measurementPicture"]["tmp_name"], $measurementPicture);
    }

    // Insert data into the database
    $stmt = $connection->prepare("
        INSERT INTO appointments (school, uniform_type, top, bottom, set_type, quantity, size, threads, zipper, buttons, tela, school_seal, hook_and_eye, measurement_picture) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param(
        "sssssisiiiiiis",
        $school,
        $uniform_type,
        $top,
        $bottom,
        $set_type,
        $quantity,
        $size,
        $threads,
        $zipper,
        $buttons,
        $tela,
        $school_seal,
        $hook_and_eye,
        $measurementPicture
    );

    if ($stmt->execute()) {
        $appointment_id = $stmt->insert_id; // Get the ID of the inserted row
        header("Location: customerinfo.php?appointment_id=" . $appointment_id); // Redirect with appointment ID
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $connection->close();
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/appointment.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>MMRC Tailoring</title>
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

        .container {
            max-width: 700px;
            max-height: 85vh;
            overflow-y: auto;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        #uploadForm .form-label {
            display: block;
            text-align: center;
            font-weight: bold;
            margin: 20px 0;
            font-size: 1.2em;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
        }

        .form-group {
            width: 48%;
        }

        .form-group-right {
            margin-left: 20px;
        }

        .form-group select,
        .form-group input {
            width: 100%;
        }

        .button {
            text-align: center;
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
                    <a href="../user/appointment.php"><span>Appointment</span></a>
                </li>
                <li>
                    <a href="../user/myorders.html"><span>My Orders</span></a>
                </li>
                <li>
                    <a href="#flowers"><span>Account</span></a>
                </li>
                <li>
                    <a href="../user/login.php"><span>Logout</span></a>
                </li>
            </ul>
        </div>
    </header>

    <div class="bgrectang">
        <div class="container">
            <h1>Schedule Your Appointment</h1>
            <form id="uploadForm" method="POST" action="readymade.php">
                <div class="form-container">
                    <div class="title" style="text-align: center; margin-bottom: 20px;">
                        <h2>Uniform Type</h2>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="school">Choose School:</label>
                            <select id="school" name="school" class="form-select" required>
                                <option value="">Select a school</option>
                                <option value="WMSU">WMSU</option>
                                <option value="ZPPSU">ZPPSU</option>
                                <option value="SOUTHERN">SOUTHERN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="uniformType">Choose Uniform Type:</label>
                            <select id="uniformType" name="uniformType" class="form-select" required>
                                <option value="">Select Option</option>
                                <option value="customized">Customized</option>
                                <option value="readyMade">Ready-made</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="top">Choose Top:</label>
                            <select id="top" name="top" class="form-select" required>
                                <option value="">Select an option</option>
                                <option value="polo">Polo</option>
                                <option value="blouse">Blouse</option>
                                <option value="vest">Vest</option>
                                <option value="blazer">Blazer</option>
                            </select>
                        </div>

                        <div class="form-group form-group-right">
                            <label for="bottom">Choose Bottom:</label>
                            <select id="bottom" name="bottom" class="form-select" required>
                                <option value="">Select an option</option>
                                <option value="short">Short</option>
                                <option value="pants">Pants</option>
                                <option value="skirt">Skirt</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="set">Choose Set:</label>
                            <select id="set" name="set_type" class="form-select" required>
                                <option value="">Select an option</option>
                                <option value="set-1">Set of Uniform</option>
                                <option value="set-2">Set of Uniform with Vest</option>
                                <option value="set-3">Set of Uniform with Blazer</option>
                            </select>
                        </div>
                        <div class="form-group form-group-right">
                            <label for="quantity">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Enter quantity" min="1" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="size">Choose Size:</label>
                            <select id="size" name="size" class="form-select" required>
                                <option value="">Select a size</option>
                                <option value="small">Small</option>
                                <option value="medium">Medium</option>
                                <option value="large">Large</option>
                                <option value="extra-large">Extra Large</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="measurementPicture" class="form-label">Upload Measurement Picture (Optional):</label>
                        <input type="file" id="measurementPicture" name="measurementPicture" accept="image/*" class="form-control">
                    </div>


                    <div id="myModal" class="modal">
                        <span class="close" onclick="closeModal()">&times;</span>
                        <img class="modal-content" id="modalImage">
                    </div>

                    <div class="form-row">
            <div class="form-group">
                <label for="threads">Threads (₱40 per piece):</label>
                <input type="number" id="threads" name="threads" class="form-control" placeholder="Enter quantity (optional)" min="0">
            </div>
            <div class="form-group form-group-right">
                <label for="zipper">Zipper (₱8 per piece):</label>
                <input type="number" id="zipper" name="zipper" class="form-control" placeholder="Enter quantity (optional)" min="0">
            </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="buttons">Buttons (₱8 per pack):</label>
                    <input type="number" id="buttons" name="buttons" class="form-control" placeholder="Enter quantity (optional)" min="0">
                </div>
                <div class="form-group form-group-right">
                    <label for="tela">Tela (₱79 per meter):</label>
                    <input type="number" id="tela" name="tela" class="form-control" placeholder="Enter quantity (optional)" min="0">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="schoolSeal">School Seal (₱50 per piece):</label>
                    <input type="number" id="schoolSeal" name="school_seal" class="form-control" placeholder="Enter quantity (optional)" min="0">
                </div>
                <div class="form-group form-group-right">
                    <label for="hookAndEye">Hook and Eye (₱25 per pack):</label>
                    <input type="number" id="hookAndEye" name="hook_and_eye" class="form-control" placeholder="Enter quantity (optional)" min="0">
                </div>
            </div>


                    <div class="button">

                        <button type="submit" onclick="window.location.href='../user/customerinfo.php'" style="color: white; background-color: black; margin-top: 8px;" class="btn btn-primary">Done</button>
               
                    </div>
                </div>
            </form>
        </div>

        <div class="uniform-prices" style="margin-top: 20px; padding: 20px; background-color: #f9f9f9; border-radius: 5px; margin-left: 20px;">
            <h3>Uniform Prices</h3>
            <h4>Female Uniform Prices</h4>
            <ul>
                <li>Blouse: ₱500</li>
                <li>Pants: ₱500</li>
                <li>Set (Pants and Blouse): ₱1,000</li>
                <li>Vest: ₱400</li>
                <li>Uniform Set with Vest: ₱1,400</li>
                <li>Coat/Blazer: ₱500 (standard, depends on the design)</li>
            </ul>
            <h4>Male Uniform Prices</h4>
            <ul>
                <li>Polo: ₱500</li>
                <li>Pants: ₱500</li>
                <li>Set (Pants and Polo): ₱1,000</li>
                <li>Vest: ₱400</li>
                <li>Uniform Set with Vest: ₱1,400</li>
            </ul>
            <h4>Additional Items Prices</h4>
            <ul>
                <li>Threads: ₱40 per piece</li>
                <li>Zipper: ₱8 per piece</li>
                <li>School Seal: ₱50 per piece</li>
                <li>Buttons: ₱8 per pack</li>
                <li>Hook and Eye: ₱25 per pack</li>
                <li>Tela: ₱79 per meter</li>
            </ul>
        </div>
    </div>

    <script>
        document.getElementById('uniformType').addEventListener('change', function () {
            const uniformType = this.value;
            // Redirect to the appropriate page based on uniform type selection
            if (uniformType === 'customized') {
                window.location.href = 'customize.php';
            }
        });
    </script>
</body>

</html>
