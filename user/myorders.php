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
                    <a href="../user/homepage.php"><span>Home</span></a>
                </li>
                <li>
                    <a href="../user/appointment.php"><span>Appointment</span></a>
                </li>
                <li>
                    <a href="../user/myorders.php"><span>My Orders</span></a>
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
    <div class="labb">
        <div class="lobb">
            <h2 class="section-title">Orders</h2>
            <ul>
                <li>
                    <a href="#" onclick="filterOrders('all')">All</a>
                </li>
                <li>
                    <a href="#" onclick="filterOrders('unpaid')">Partial</a>
                </li>
                <li>
                    <a href="#" onclick="filterOrders('fullypaid')">Fully Paid</a>
                </li>
            </ul>
            
            <div id="order-list">
                <!-- First Item -->
                <div class="order-item unpaid">
                    <img src="../img/uniform.png" alt="Polo" class="uniform-image">
                    <div class="order-details">
                        <p class="uniform-type">Type: Polo</p>
                        <p class="price">Price: P500.00</p>
                        <p class="order-date">Order Date: 2023-10-01</p>
                        <p class="completion-date">Completion Date: 2023-10-15</p>
                    </div>
                </div>
        
                <!-- Second Item -->
                <div class="order-item fullypaid">
                    <img src="../img/uniform2.png" alt="Blouse" class="uniform-image">
                    <div class="order-details">
                        <p class="uniform-type">Type: Blouse</p>
                        <p class="price">Price: P500.00</p>
                        <p class="order-date">Order Date: 2023-10-02</p>
                        <p class="completion-date">Completion Date: 2023-10-16</p>
                    </div>
                </div>
        
                <!-- Third Item -->
                <div class="order-item fullypaid">
                    <img src="../img/uniform3.png" alt="Vest" class="uniform-image">
                    <div class="order-details">
                        <p class="uniform-type">Type: Vest</p>
                        <p class="price">Price: P400.00</p>
                        <p class="order-date">Order Date: 2023-10-03</p>
                        <p class="completion-date">Completion Date: 2023-10-17</p>
                    </div>
                </div>
        
                <!-- Fourth Item -->
                <div class="order-item unpaid">
                    <img src="../img/uniform4.png" alt="Pants" class="uniform-image">
                    <div class="order-details">
                        <p class="uniform-type">Type: Pants</p>
                        <p class="price">Price: P500.00</p>
                        <p class="order-date">Order Date: 2023-10-04</p>
                        <p class="completion-date">Completion Date: 2023-10-18</p>
                    </div>
                </div>
        </div>
    </div>
<script src="../js/myorders.js"></script>
</body>

</html>