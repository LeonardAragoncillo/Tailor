<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/appointment1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <header>
        <div class="inside">
            <h2>MMRC Tailoring</h2>
            <ul class="menu">
                <li>
                    <a href="../user/homepage.html"><span>Home</span></a>
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
    <div class="bgrectang">
        <div class="container-3">
            <div class="box">
                <div class="form-container">
                    <div class="title" style="text-align: center; margin-bottom: 20px;">
                        <h2>Uniform Type</h2>
                    </div>
                    <label for="school">Choose School:</label>
                    <select id="school">
                        <option value="">Select a school</option>
                        <option value="WMSU">WMSU</option>
                        <option value="ZPPSU">ZPPSU</option>
                        <option value="SOUTHERN">SOUTHERN</option>
                    </select>
                    <div id="school-image" style="display: none; text-align: center; margin-top: 20px;">
                        <img id="school-img" src="" alt="School Uniform" style="max-width: 100%; height: auto;">
                    </div>
                    <label for="top">Choose Top:</label>
                    <select id="top">
                        <option value="">Select an option</option>
                        <option value="polo">Polo</option>
                        <option value="blouse">Blouse</option>
                        <option value="vest">Vest</option>
                        <option value="blazer">Blazer</option>
                    </select>

                    <label for="bottom">Choose Bottom:</label>
                    <select id="bottom">
                        <option value="">Select an option</option>
                        <option value="short">Short</option>
                        <option value="pants">Pants</option>
                        <option value="skirt">Skirt</option>
                    </select>

                    <label for="set">Choose Set:</label>
                    <select id="set">
                        <option value="">Select an option</option>
                        <option value="set-1">Set of Uniform</option>
                        <option value="set-2">Set of Uniform with Vest</option>
                        <option value="set-3">Set of Uniform with Blazer</option>
                    </select>
                    <label for="size">Choose Size:</label>
                    <select id="size">
                        <option value="">Select a size</option>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                        <option value="extra-large">Extra Large</option>
                    </select>

                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" min="1" value="1" style="width: 100px;">

                    <div class="button">
                        <button type="submit" onclick="window.location.href='../user/bookdateandtime.html'"
                            style="color: white; background-color: black; margin-top: 8px;"
                            class="btn btn-primary ">Done</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="uniform-prices" style="margin-top: 20px; padding: 20px; background-color: #f9f9f9; border-radius: 5px;">
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
    </div>

    <script>
        document.getElementById('school').addEventListener('change', function () {
            const school = this.value;
            const schoolImage = document.getElementById('school-image');
            const schoolImg = document.getElementById('school-img');

            if (school === 'WMSU') {
                schoolImg.src = '../img/WMSU.png'; // Replace with actual image path
                schoolImage.style.display = 'block'; // Show the image
            } else if (school === 'ZPPSU') {
                schoolImg.src = '../img/ZPPSU.png'; // Replace with actual image path
                schoolImage.style.display = 'block'; // Show the image
            } else if (school === 'SOUTHERN') {
                schoolImg.src = '../img/SOUTHERN.png'; // Replace with actual image path
                schoolImage.style.display = 'block'; // Show the image
            } else {
                schoolImage.style.display = 'none'; // Hide the image if no school is selected
            }
        });
    </script>
    
</body>

</html>