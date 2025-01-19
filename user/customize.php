<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "upcoming_appointment"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Basic form details
    $school = $_POST['school'] ?? '';
    $uniformType = $_POST['uniformType'] ?? '';
    $top = $_POST['top'] ?? '';
    $bottom = $_POST['bottom'] ?? '';
    $set_type = $_POST['set_type'] ?? '';
    $quantity = is_numeric($_POST['quantity'] ?? 0) ? $_POST['quantity'] : 0;
    $size = $_POST['size'] ?? '';
    $threads = is_numeric($_POST['threads'] ?? 0) ? $_POST['threads'] : 0;
    $zipper = is_numeric($_POST['zipper'] ?? 0) ? $_POST['zipper'] : 0;
    $buttons = is_numeric($_POST['buttons'] ?? 0) ? $_POST['buttons'] : 0;
    $tela = is_numeric($_POST['tela'] ?? 0) ? $_POST['tela'] : 0;
    $school_seal = is_numeric($_POST['school_seal'] ?? 0) ? $_POST['school_seal'] : 0;
    $hook_and_eye = is_numeric($_POST['hook_and_eye'] ?? 0) ? $_POST['hook_and_eye'] : 0;

    // Dynamic inputs for measurements based on selected options
    // Polo Measurements
    $chest = $_POST['chest'] ?? 0;
    $polo_length = $_POST['polo_length'] ?? 0;
    $hips = $_POST['hips'] ?? 0;
    $shoulder_m = $_POST['shoulder_m'] ?? 0;
    $sleeve_length = $_POST['sleeve_length'] ?? 0;
    $armhole = $_POST['armhole'] ?? 0;
    $lower_arm_girth = $_POST['lower_arm_girth'] ?? 0;

    // Blouse Measurements
    $bust = $_POST['bust'] ?? 0;
    $blouse_length = $_POST['blouse_length'] ?? 0;
    $waist = $_POST['waist'] ?? 0;
    $figure = $_POST['figure'] ?? 0;
    $shoulder = $_POST['shoulder'] ?? 0;
    $sleeve_length_blouse = $_POST['sleeve_length_blouse'] ?? 0;

    // Vest Measurements
    $armhole_vest = $_POST['armhole_vest'] ?? 0;
    $full_length = $_POST['full_length'] ?? 0;
    $shoulder_width = $_POST['shoulder_width'] ?? 0;
    $neck_circumference = $_POST['neck_circumference'] ?? 0;

    // Blazer Measurements
    $chest_blazer = $_POST['chest_blazer'] ?? 0;
    $shoulder_width_blazer = $_POST['shoulder_width_blazer'] ?? 0;
    $blazer_length = $_POST['blazer_length'] ?? 0;
    $sleeve_length_blazer = $_POST['sleeve_length_blazer'] ?? 0;
    $waist_blazer = $_POST['waist_blazer'] ?? 0;
    $hips_blazer = $_POST['hips_blazer'] ?? 0;
    $armhole_blazer = $_POST['armhole_blazer'] ?? 0;
    $wrist = $_POST['wrist'] ?? 0;
    $back_width = $_POST['back_width'] ?? 0;
    $lower_arm_girth_blazer = $_POST['lower_arm_girth_blazer'] ?? 0;

    // Short Measurements
    $waist_short = $_POST['waist_short'] ?? 0;
    $hip_short = $_POST['hip_short'] ?? 0;
    $short_length = $_POST['short_length'] ?? 0;
    $thigh_circumference = $_POST['thigh_circumference'] ?? 0;
    $inseam_length = $_POST['inseam_length'] ?? 0;
    $leg_opening = $_POST['leg_opening'] ?? 0;
    $rise = $_POST['rise'] ?? 0;

    // Pants Measurements
    $pants_length = $_POST['pants_length'] ?? 0;
    $waist_pants = $_POST['waist_pants'] ?? 0;
    $hip_pants = $_POST['hip_pants'] ?? 0;
    $crotch = $_POST['crotch'] ?? 0;
    $knee_height = $_POST['knee_height'] ?? 0;
    $knee_circumference = $_POST['knee_circumference'] ?? 0;
    $bottom_circumference = $_POST['bottom_circumference'] ?? 0;

    // Skirt Measurements
    $skirt_length = $_POST['skirt_length'] ?? 0;
    $waist_skirt = $_POST['waist_skirt'] ?? 0;
    $hips_skirt = $_POST['hips_skirt'] ?? 0;
    $hip_depth = $_POST['hip_depth'] ?? 0;

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO appointments (school, uniform_type, top, bottom, set_type, quantity, size, threads, zipper, buttons, tela, school_seal, hook_and_eye, 
                            chest, polo_length, hips, shoulder_m, sleeve_length, armhole, lower_arm_girth, bust, blouse_length, waist, figure, shoulder, sleeve_length_blouse, 
                            armhole_vest, full_length, shoulder_width, neck_circumference, chest_blazer, shoulder_width_blazer, blazer_length, sleeve_length_blazer, waist_blazer, 
                            hips_blazer, armhole_blazer, wrist, back_width, lower_arm_girth_blazer, waist_short, hip_short, short_length, thigh_circumference, inseam_length, 
                            leg_opening, rise, pants_length, waist_pants, hip_pants, crotch, knee_height, knee_circumference, bottom_circumference, skirt_length, waist_skirt, 
                            hips_skirt, hip_depth) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssisiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii", $school, $uniformType, $top, $bottom, $set_type, $quantity, $size, $threads, 
                      $zipper, $buttons, $tela, $school_seal, $hook_and_eye, $chest, $polo_length, $hips, $shoulder_m, $sleeve_length, $armhole, $lower_arm_girth, 
                      $bust, $blouse_length, $waist, $figure, $shoulder, $sleeve_length_blouse, $armhole_vest, $full_length, $shoulder_width, $neck_circumference, 
                      $chest_blazer, $shoulder_width_blazer, $blazer_length, $sleeve_length_blazer, $waist_blazer, $hips_blazer, $armhole_blazer, $wrist, $back_width, 
                      $lower_arm_girth_blazer, $waist_short, $hip_short, $short_length, $thigh_circumference, $inseam_length, $leg_opening, $rise, $pants_length, 
                      $waist_pants, $hip_pants, $crotch, $knee_height, $knee_circumference, $bottom_circumference, $skirt_length, $waist_skirt, $hips_skirt, $hip_depth);

                      if ($stmt->execute()) {
                        echo "<script>alert('Appointment submitted successfully!'); window.location.href = '../user/customerinfo.php';</script>";
                    } else {
                        // Output detailed error message
                        echo "<script>alert('Error: " . $stmt->error . "');</script>";
                        // Alternatively, use PHP's error_log() for better debugging
                        error_log("SQL Error: " . $stmt->error);
                    }

    $stmt->close();
    $conn->close();
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
            margin-left: 20px; /* Space between the two inputs */
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
                    <a href="../user/login.php"><span>Log out</span></a>
                </li>
            </ul>
        </div>
    </header>

    <div class="bgrectang">
        <div class="container">
            <h1>Schedule Your Appointment</h1>
            <form id="uploadForm" method="POST" action="customize.php">
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
                        <select id="uniformType" name="uniformType" class="form-select" onchange="redirectToPage()" required>
                            <option value="">Select Option</option>
                            <option value="customized">Customized</option>
                            <option value="readyMade">Ready-made</option>
                        </select>
                    </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="top">Choose Top:</label>
                            <select id="top" class="form-select">
                                <option value="">Select an option</option>
                                <option value="polo">Polo</option>
                                <option value="blouse">Blouse</option>
                                <option value="vest">Vest</option>
                                <option value="blazer">Blazer</option>
                            </select>
                        </div>
                    
                        <div class="form-group form-group-right">
                            <label for="bottom">Choose Bottom:</label>
                            <select id="bottom" class="form-select">
                                <option value="">Select an option</option>
                                <option value="short">Short</option>
                                <option value="pants">Pants</option>
                                <option value="skirt">Skirt</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Choose Set with Full Width -->
                    <div class="form-group full-width">
                        <label for="set">Choose Set:</label>
                        <select id="set" class="form-select">
                            <option value="">Select an option</option>
                            <option value="set-1">Set of Uniform</option>
                            <option value="set-2">Set of Uniform with Vest</option>
                            <option value="set-3">Set of Uniform with Blazer</option>
                        </select>
                    </div>
                    <script>
                        document.getElementById('top').addEventListener('change', function () {
                            const top = this.value;
                            const measurementContainer = document.querySelector('.measurement-container');
                            const blouseContainer = document.querySelector ('.blouse-container');
                            const vestContainer = document.querySelector ('.vest-container');
                            const blazerContainer = document.querySelector ('.blazer-container');
            
                            measurementContainer.style.display= 'none';
                            blouseContainer.style.display= 'none';
                            vestContainer.style.display= 'none';
                            blazerContainer.style.display= 'none';
            
                            if (top=== 'polo'){
                                measurementContainer.style.display= 'block';//show container
                                measurementContainer.style.marginTop= '60px'; 
                                measurementContainer.style.borderTop= '2px solid black';
                            }
                            else if (top === 'blouse'){
                                blouseContainer.style.display= 'block';
                                blouseContainer.style.marginTop= '60px';
                                blouseContainer.style.borderTop= '2px solid black';
                            }
                            else if (top === 'vest'){
                                vestContainer.style.display = 'block';
                                vestContainer.style.marginTop= '60px';
                                vestContainer.style.borderTop= '2px solid black';
                            }
                            else if (top === 'blazer'){
                                blazerContainer.style.display = 'block';
                                blazerContainer.style.marginTop= '60px';
                                blazerContainer.style.borderTop= '2px solid black';
                            }
                            else{
                                measurementContainer.style.display= 'none'; //hide container
                                blouseContainer.style.display= 'none';
                                vestContainer.style.display= 'none';
                                blazerContainer.style.display= 'none';
                            }
                        });
                        document.getElementById('bottom').addEventListener('change', function () {
                            const bottom = this.value;
                            const shortContainer = document.querySelector('.short-container');
                            const pantsContainer= document.querySelector('.pants-container');
                            const skirtContainer= document.querySelector('.skirt-container');
            
                            shortContainer.style.display= 'none';
                            pantsContainer.style.display= 'none';
                            skirtContainer.style.display= 'none';
            
                            if (bottom === 'short'){
                                shortContainer.style.display = 'block';
                                shortContainer.style.marginTop = '60px';
                                shortContainer.style.borderTop = '2px solid black';
                            }
                            else if (bottom === 'pants'){
                                pantsContainer.style.display = 'block';
                                pantsContainer.style.marginTop = '60px';
                                pantsContainer.style.borderTop = '2px solid black';
                            }
                            else if(bottom === 'skirt'){
                                skirtContainer.style.display = 'block';
                                skirtContainer.style.marginTop = '60px';
                                skirtContainer.style.borderTop = '2px solid black';
                            }
                            else{
                                shortContainer.style.display='none';
                            }
                            
                        })
                        document.getElementById('set').addEventListener('change', function() {
                    // Reset the 'top' and 'bottom' dropdowns
                    document.getElementById('top').selectedIndex = 0; // Reset to "Select an option"
                    document.getElementById('bottom').selectedIndex = 0; // Reset to "Select an option"
            
                    // Logic to prioritize or handle the selected 'set' can be added here
                    const selectedSet = this.value;
                    if (selectedSet === 'set-1') {
                        // Example: Automatically select a top and bottom based on the set
                        document.getElementById('top').value = 'polo'; // Example selection
                        document.getElementById('bottom').value = 'pants'; // Example selection
                    } else if (selectedSet === 'set-2') {
                        document.getElementById('top').value = 'vest'; // Example selection
                        document.getElementById('bottom').value = 'short'; // Example selection
                    } else if (selectedSet === 'set-3') {
                        document.getElementById('top').value = 'blazer'; // Example selection
                        document.getElementById('bottom').value = 'skirt'; // Example selection
                    }
                        });
                   
                
                        // document.getElementById('gender').addEventListener('change', function () {
                        //     const gender = this.value;
                            
                        // });
                    </script>
                    <div class="measurement-container" style="display: none;">
                    <h4>Polo Measurements</h4>
                    <label for="chest">Chest (inches):</label>
                    <input type="number" id="chest" name="chest">

                    <label for="polo-length">Polo's Length (inches):</label>
                    <input type="number" id="polo-length" name="polo_length">

                    <label for="hips">Hips (inches):</label>
                    <input type="number" id="hips" name="hips">

                    <label for="shoulder-m">Shoulder Measurement (inches):</label>
                    <input type="number" id="shoulder-m" name="shoulder_m">

                    <label for="sleeve-length">Sleeve Length (inches):</label>
                    <input type="number" id="sleeve-length" name="sleeve_length">

                    <label for="armhole">Armhole (inches):</label>
                    <input type="number" id="armhole" name="armhole">

                    <label for="lower-arm-girth">Lower Arm Girth (inches):</label>
                    <input type="number" id="lower-arm-girth" name="lower_arm_girth">
                </div>

                <!-- Measurements for Blouse -->
                <div class="blouse-container" style="display: none;">
                    <h4>Blouse Measurements</h4>
                    <label for="bust">Bust (inches):</label>
                    <input type="number" id="bust" name="bust">

                    <label for="blouse-length">Blouse Length (inches):</label>
                    <input type="number" id="blouse-length" name="blouse_length">

                    <label for="waist">Waist (inches):</label>
                    <input type="number" id="waist" name="waist">

                    <label for="figure">Figure (inches):</label>
                    <input type="number" id="figure" name="figure">

                    <label for="hips">Hips (inches):</label>
                    <input type="number" id="hips" name="hips">

                    <label for="shoulder">Shoulder Measurement (inches):</label>
                    <input type="number" id="shoulder" name="shoulder">

                    <label for="sleeve-length-blouse">Sleeve Length (inches):</label>
                    <input type="number" id="sleeve-length-blouse" name="sleeve_length_blouse">

                    <label for="armhole-blouse">Arm Hole (inches):</label>
                    <input type="number" id="armhole-blouse" name="armhole_blouse">

                    <label for="lower-arm-girth-blouse">Lower Arm Girth (inches):</label>
                    <input type="number" id="lower-arm-girth-blouse" name="lower_arm_girth_blouse">
                </div>

                <!-- Measurements for Vest -->
                <div class="vest-container" style="display: none;">
                    <h4>Vest Measurements</h4>
                    <label for="armhole-vest">Arm Hole (inches):</label>
                    <input type="number" id="armhole-vest" name="armhole_vest">

                    <label for="full-length">Full Length (inches):</label>
                    <input type="number" id="full-length" name="full_length">

                    <label for="shoulder-width">Shoulder Width (inches):</label>
                    <input type="number" id="shoulder-width" name="shoulder_width">

                    <label for="neck-circumference">Neck Circumference (inches):</label>
                    <input type="number" id="neck-circumference" name="neck_circumference">
                </div>

                <!-- Measurements for Blazer -->
                <div class="blazer-container" style="display: none;">
                    <h4>Blazer Measurements</h4>
                    <label for="chest-blazer">Chest (inches):</label>
                    <input type="number" id="chest-blazer" name="chest_blazer">

                    <label for="shoulder-width-blazer">Shoulder Width (inches):</label>
                    <input type="number" id="shoulder-width-blazer" name="shoulder_width_blazer">

                    <label for="blazer-length">Blazer Length (inches):</label>
                    <input type="number" id="blazer-length" name="blazer_length">

                    <label for="sleeve-length-blazer">Sleeve Length (inches):</label>
                    <input type="number" id="sleeve-length-blazer" name="sleeve_length_blazer">

                    <label for="waist-blazer">Waist (inches):</label>
                    <input type="number" id="waist-blazer" name="waist_blazer">

                    <label for="hips-blazer">Hips (inches):</label>
                    <input type="number" id="hips-blazer" name="hips_blazer">

                    <label for="armhole-blazer">Armhole (inches):</label>
                    <input type="number" id="armhole-blazer" name="armhole_blazer">

                    <label for="wrist">Wrist (inches):</label>
                    <input type="number" id="wrist" name="wrist">

                    <label for="back-width">Back Width (inches):</label>
                    <input type="number" id="back-width" name="back_width">

                    <label for="lower-arm-girth-blazer">Lower Arm Girth (inches):</label>
                    <input type="number" id="lower-arm-girth-blazer" name="lower_arm_girth_blazer">
                </div>

                <!-- Measurements for Shorts -->
                <div class="short-container" style="display: none;">
                    <h4>Short Measurements</h4>
                    <label for="waist-short">Waist (inches):</label>
                    <input type="number" id="waist-short" name="waist_short">

                    <label for="hip-short">Hip (inches):</label>
                    <input type="number" id="hip-short" name="hip_short">

                    <label for="short-length">Short Length (inches):</label>
                    <input type="number" id="short-length" name="short_length">

                    <label for="thigh-circumference">Thigh Circumference (inches):</label>
                    <input type="number" id="thigh-circumference" name="thigh_circumference">

                    <label for="inseam-length">Inseam Length (inches):</label>
                    <input type="number" id="inseam-length" name="inseam_length">

                    <label for="leg-opening">Leg Opening (inches):</label>
                    <input type="number" id="leg-opening" name="leg_opening">

                    <label for="rise">Rise (inches):</label>
                    <input type="number" id="rise" name="rise">
                </div>

                <!-- Measurements for Pants -->
                <div class="pants-container" style="display: none;">
                    <h4>Pants Measurements</h4>
                    <label for="pants-length">Pants Length (inches):</label>
                    <input type="number" id="pants-length" name="pants_length">

                    <label for="waist-pants">Waist (inches):</label>
                    <input type="number" id="waist-pants" name="waist_pants">

                    <label for="hip-pants">Hip (inches):</label>
                    <input type="number" id="hip-pants" name="hip_pants">

                    <label for="crotch">Crotch (inches):</label>
                    <input type="number" id="crotch" name="crotch">

                    <label for="knee-height">Knee Height (inches):</label>
                    <input type="number" id="knee-height" name="knee_height">

                    <label for="knee-circumference">Knee Circumference (inches):</label>
                    <input type="number" id="knee-circumference" name="knee_circumference">

                    <label for="bottom-circumference">Bottom Circumference (inches):</label>
                    <input type="number" id="bottom-circumference" name="bottom_circumference">
                </div>

                <!-- Measurements for Skirt -->
                <div class="skirt-container" style="display: none;">
                    <h4>Skirt Measurements</h4>
                    <label for="skirt-length">Skirt Length (inches):</label>
                    <input type="number" id="skirt-length" name="skirt_length">

                    <label for="waist-skirt">Waist (inches):</label>
                    <input type="number" id="waist-skirt" name="waist_skirt">

                    <label for="hips-skirt">Hips (inches):</label>
                    <input type="number" id="hips-skirt" name="hips_skirt">

                    <label for="hip-depth">Hip Depth (inches):</label>
                    <input type="number" id="hip-depth" name="hip_depth">
                </div>
                    <div class="mb-4">
                        <label for="measurementPicture" class="form-label">or</label>
                        <input type="file" id="measurementPicture" name="measurementPicture" accept="image/*" class="form-control">
                    </div>
                    
                    <h6 class="mb-3">Guide on how to measure yourself:</h6>
                    <div class="image-container">
                        <img src="../img/Polo-Shirt-Measurement-Guide-with-Size-Chart-1.webp" alt="Polo Shirt Measurement Guide"
                            onclick="openModal(this.src)">
                        <img src="../img/pants.png" alt="Pants Measurement Guide" onclick="openModal(this.src)">
                    </div>
                    <div id="myModal" class="modal">
                        <span class="close" onclick="closeModal()">&times;</span>
                        <img class="modal-content" id="modalImage">
                    </div>
                    <script>
                        function openModal(src) {
                         document.getElementById("modalImage").src = src;
                         document.getElementById("myModal").style.display = "block";
                        }

                        function closeModal() {
                        document.getElementById("myModal").style.display = "none";
                        }

                        window.onclick = function (event) {
                        const modal = document.getElementById("myModal");
                        if (event.target == modal) {
                        closeModal();
                        }
                    }
                    </script>
                    <!-- Threads and Zipper Row -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="threads">Threads (₱40 per piece):</label>
                            <input type="number" id="threads" name="threads" class="form-control" placeholder="Enter quantity" min="0">
                        </div>
                        <div class="form-group form-group-right">
                            <label for="zipper">Zipper (₱8 per piece):</label>
                            <input type="number" id="zipper" name="zipper" class="form-control" placeholder="Enter quantity" min="0">
                        </div>
                    </div>

                    <!-- Buttons and Tela Row -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="buttons">Buttons (₱8 per pack):</label>
                            <input type="number" id="buttons" name="buttons" class="form-control" placeholder="Enter quantity" min="0">
                        </div>
                        <div class="form-group form-group-right">
                            <label for="tela">Tela (₱79 per meter):</label>
                            <input type="number" id="tela" name="tela" class="form-control" placeholder="Enter quantity" min="0">
                        </div>
                    </div>

                    <!-- School Seal and Hook and Eye Row -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="schoolSeal">School Seal (₱50 per piece):</label>
                            <input type="number" id="schoolSeal" name="schoolSeal" class="form-control" placeholder="Enter quantity" min="0">
                        </div>
                        <div class="form-group form-group-right">
                            <label for="hookAndEye">Hook and Eye (₱25 per pack):</label>
                            <input type="number" id="hookAndEye" name="hookAndEye" class="form-control" placeholder="Enter quantity" min="0">
                        </div>
                    </div>

                    <div class="button">
                        <button type="submit" onclick="window.location.href='../user/customerinfo.php'" style="color: white; background-color: black; margin-top: 8px;" class="btn btn-primary">Done</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Uniform Prices Section (Moved Outside the Form) -->
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
    function redirectToPage() {
        const uniformType = document.getElementById('uniformType').value;
        if (uniformType === 'readyMade') {
            window.location.href = '../user/readymade.php'; // Redirect to the ready-made page
        }
    }
</script>
</body>

</html>
