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
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
            </ul>
        </div>
    </header>

    <div class="bgrectang">
        <div class="container">
            <h1>Schedule Your Appointment</h1>
            <form id="uploadForm">
                <div class="form-container">
                    <div class="title" style="text-align: center; margin-bottom: 20px;">
                        <h2>Uniform Type</h2>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="school">Choose School:</label>
                            <select id="school" class="form-select">
                                <option value="">Select a school</option>
                                <option value="WMSU">WMSU</option>
                                <option value="ZPPSU">ZPPSU</option>
                                <option value="SOUTHERN">SOUTHERN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="uniformType">Choose Uniform Type:</label>
                            <select id="uniformType" class="form-select" onchange="redirectToPage()">
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
                        <h4>Polo</h4>
                            
                
                            <label for="chest">Chest:(inches)</label>
                            <input type="number" id="chest" >
                
                            <label for="polo-length">Polo's Length:(inches)</label>
                            <input type="number" id="polo-length">
                
                            <label for="hips">Hips:(inches)</label>
                            <input type="number" id="hips" >
                
                            <label for="shoulder-m">Shoulder M.:(inches)</label>
                            <input type="number" id="shoulder-m" >
                
                            <label for="sleeve-length">Sleeve Length:(inches)</label>
                            <input type="number" id="sleeve-length" >
                
                            <label for="armhole">Armhole:(inches)</label>
                            <input type="number" id="armhole" >
                
                            <label for="lower-arm-girth">Lower Arm Girth:(inches)</label>
                            <input type="number" id="lower-arm-girth" >
                       </div>
                       <div class="blouse-container" style="display: none;">
                        <h4>Blouse</h4>
                            
                
                            <label for="Bust">Bust:(inches)</label>
                            <input type="number" id="Bust" >
                
                            <label for="Blouse-length">Blouse Length:(inches)</label>
                            <input type="number" id="Blouse-length">
                
                            <label for="Waist">Waist:(inches)</label>
                            <input type="number" id="Waist" >
                
                            <label for="Figure">Figure:(inches)</label>
                            <input type="number" id="Figure" >
                
                            <label for="Hips">Hips:(inches)</label>
                            <input type="number" id="Hips" >
                
                            <label for="Shoulder">Shoulder Measurement:(inches)</label>
                            <input type="number" id="Shoulder" >
                
                            <label for="Sleeve-Length">Sleeve Length:(inches)</label>
                            <input type="number" id="Sleeve-Length" >
                
                            <label for="Arm-Hole">Arm Hole:(inches)</label>
                            <input type="number" id="Arm-Hole" >
                
                            <label for="Lower-Arm-Girth">Lower Arm Girth:(inches)</label>
                            <input type="number" id="Lower-Arm-Girth" >
                       </div>
                       <div class="vest-container" style="display: none;">
                        <h4>Vest</h4>
                            
                
                            <label for="arm-hole">Arm Hole:(inches)</label>
                            <input type="number" id="arm-hole" >
                
                            <label for="full-length">Full Length:(inches)</label>
                            <input type="number" id="full-length">
                
                            <label for="shoulder-width">Shoulder Width:(inches)</label>
                            <input type="number" id="shoulder-width" >
                
                            <label for="neck-circumference">Neck Circumference:(inches)</label>
                            <input type="number" id="neck-circumference" >
                
                       </div>
                       <div class="blazer-container" style="display: none;">
                        <h4>Blazer</h4>
                            
                
                            <label for="chest">Chest:(inches)</label>
                            <input type="number" id="chest" >
                
                            <label for="shoulder-width">Shoulder width:(inches)</label>
                            <input type="number" id="shoulder-width" >
                
                            <label for="blazer-lenght">Blazer Length:(inches)</label>
                            <input type="number" id="blazer-lenght">
                
                            <label for="sleeve-length">Sleeve length:(inches)</label>
                            <input type="number" id="sleeve-length" >
                
                            <label for="Waist">Waist:(inches)</label>
                            <input type="number" id="Waist" >
                
                            <label for="Hips">Hips:(inches)</label>
                            <input type="number" id="Hips" >
                
                            <label for="Armhole">Armhole:(inches)</label>
                            <input type="number" id="Armhole" >
                            
                            <label for="Wrist">Wrist:(inches)</label>
                            <input type="number" id="Wrist" >
                
                            <label for="back-width">Back Width:(inches)</label>
                            <input type="number" id="back-width" >
                
                            <label for="lower-arm-girth">Lower Arm Girth:(inches)</label>
                            <input type="number" id="lower-arm-girth" >
                
                       </div>
                
                       <!-- Bottom -->
                       <div class="short-container" style="display: none;">
                        <h4>Short</h4>
                            
                
                            <label for="waist">Waist:(inches)</label>
                            <input type="number" id="waist" >
                
                            <label for="hip">Hip:(inches)</label>
                            <input type="number" id="hip" >
                
                            <label for="short-lenght">Short Length:(inches)</label>
                            <input type="number" id="short-lenght">
                
                            <label for="thigh-circumference">Thigh Circumference:(inches)</label>
                            <input type="number" id="thigh-circumference" >
                
                            <label for="inseam-length">Inseam Length:(inches)</label>
                            <input type="number" id="inseam-length" >
                
                            <label for="leg-opening">Leg Opening:(inches)</label>
                            <input type="number" id="leg-opening" >
                
                            <label for="rise">Rise:(inches)</label>
                            <input type="number" id="rise" >
                            
                       </div>
                
                       <div class="pants-container" style="display: none;">
                        <h4>Pants</h4>
                            
                            <label for="pants-lenght">Pants Length:(inches)</label>
                            <input type="number" id="pants-lenght">
                
                            <label for="waist">Waist:(inches)</label>
                            <input type="number" id="waist" >
                
                            <label for="hip">Hip:(inches)</label>
                            <input type="number" id="hip" >
                
                            <label for="crotch">Crotch:(inches)</label>
                            <input type="number" id="crotch">
                
                            <label for="knee-height">Knee Height:(inches)</label>
                            <input type="number" id="knee-height" >
                
                            <label for="knee-circumference">Knee Circumference:(inches)</label>
                            <input type="number" id="knee-circumference" >
                
                            <label for="bottom-circumference">Bottom Circumference:(inches)</label>
                            <input type="number" id="bottom-circumference" >
                  
                       </div>
                
                       <div class="skirt-container" style="display: none;">
                        <h4>Skirt</h4>
                            
                            <label for="skirt-lenght">Skirt Length:(inches)</label>
                            <input type="number" id="skirt-lenght">
                
                            <label for="waist">Waist:(inches)</label>
                            <input type="number" id="waist" >
                
                            <label for="hip">Hips:(inches)</label>
                            <input type="number" id="hip" >
                
                            <label for="hip-depth">Hip Depth:(inches)</label>
                            <input type="number" id="hip-depth">
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
            if (uniformType === 'customized') {
                window.location.href = '../user/appointment.php'; // Change URL as needed
            } else if (uniformType === 'readyMade') {
                window.location.href = '../user/appointment1.php'; // Change URL as needed
            }
        }
    </script>
</body>

</html>
