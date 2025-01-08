

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/appointment.css">
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

        <script src="../js/appoint.js"></script>
    </header>
    <div class="bgrectang">
        <div class="container" style="max-width: 700px;">
            <h1>Schedule Your Appointment</h1>
            <form id="uploadForm">
                <div class="mb-4">
                    <label for="measurementPicture" class="form-label">Do you have a picture of your measurements?</label>
                    <input type="file" id="measurementPicture" name="measurementPicture" accept="image/*" class="form-control">
                </div>
    
                <h6 class="mb-3">Guide on how to measure yourself:</h6>
                <div class="image-container">
                    <img src="../img/Polo-Shirt-Measurement-Guide-with-Size-Chart-1.webp" alt="Polo Shirt Measurement Guide" onclick="openModal(this.src)">
                    <img src="../img/pants.png" alt="Pants Measurement Guide" onclick="openModal(this.src)">
                </div>
    
                <a href="../user/customerinfo.php" class="styled-button">Upload Picture</a>
                <a href="../user/appointment1.html" class="styled-button">I Don't Have a Picture</a>
                <a href="../user/appointment2.html" class="styled-button">Ready Made</a>
            </form>
    
            <!-- Modal -->
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
        </div>
    </div>
    </div>
    <script src="../js/appointment.js"></script>
</body>

</html>