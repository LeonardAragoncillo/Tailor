<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minimalist Dashboard</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>
<body>
    <style>
        /* General Styles */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
    height: 100vh;
    color: #333;
    background-color: #F8F9FA;
}

/* Sidebar */
.sidebar {
    width: 220px;
    background-color: #2C2F33;
    color: #FFFFFF;
    padding: 20px;
    height: 100vh;
}

.sidebar h2 {
    margin: 0;
    font-size: 1.4rem;
    border-bottom: 1px solid #555;
    padding-bottom: 10px;
}

.sidebar .email {
    font-size: 0.9rem;
    margin-bottom: 20px;
    color: #CCCCCC;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    margin: 15px 0;
}

.sidebar ul li a {
    color: #FFFFFF;
    text-decoration: none;
    transition: color 0.3s;
}

.sidebar ul li a:hover {
    color: #3B82F6;
}

/* Content */
.content {
    flex-grow: 1;
    padding: 20px;
    background-color: #FFFFFF;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #E5E7EB;
    padding-bottom: 10px;
}

header h1 {
    margin: 0;
    font-size: 1.8rem;
}

.btn-primary {
    background-color: #3B82F6;
    color: #FFFFFF;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 5px;
}

.btn-primary:hover {
    background-color: #2563EB;
}

/* Table */
table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 10px;
    border: 1px solid #E5E7EB;
    text-align: center;
}

th {
    background-color: #F3F4F6;
    color: #333;
}

td {
    background-color: #FFFFFF;
}

/* Buttons */
.btn-view {
    background-color: #3B82F6;
    color: #FFFFFF;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-edit {
    background-color: #10B981;
    color: #FFFFFF;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-delete {
    background-color: #EF4444;
    color: #FFFFFF;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-view:hover {
    background-color: #2563EB;
}

.btn-edit:hover {
    background-color: #059669;
}

.btn-delete:hover {
    background-color: #DC2626;
}

    </style>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Administrator</h2>
        <p class="email">admin@gmail.com</p>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Tailor</a></li>
            <li><a href="#">Customer</a></li>
            <li><a href="#">Appointment</a></li>
            <li><a href="#">Calendar</a></li>
            <li><a href="#">Uniform Progress</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content">
        <header>
            <h1>Upcoming Appointments</h1>
            <button class="btn-primary">Add New Appointment</button>
        </header>

        <!-- Table -->
        <table>
            <thead>
                <tr>
                    <th>Appointment ID</th>
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
                <tr>
                    <td>1</td>
                    <td>Test Name</td>
                    <td>2024-12-14 12:00:00</td>
                    <td>5</td>
                    <td>Sample Description</td>
                    <td>500</td>
                    <td>200</td>
                    <td>Pending</td>
                    <td>
                        <button class="btn-view">View</button>
                        <button class="btn-edit">Edit</button>
                        <button class="btn-delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Miguel Enriquez</td>
                    <td>2024-12-17 03:24:39</td>
                    <td>1</td>
                    <td>Polo</td>
                    <td>500</td>
                    <td>250</td>
                    <td>Approved</td>
                    <td>
                        <button class="btn-view">View</button>
                        <button class="btn-edit">Edit</button>
                        <button class="btn-delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>glenn</td>
                    <td>2024-12-24 02:13:00</td>
                    <td>2</td>
                    <td>Set of Uniform</td>
                    <td>2000</td>
                    <td>1000</td>
                    <td>Approved</td>
                    <td>
                        <button class="btn-view">View</button>
                        <button class="btn-edit">Edit</button>
                        <button class="btn-delete">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
