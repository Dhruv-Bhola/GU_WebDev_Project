<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'te');
if ($conn->connect_error) {
    die("Connection Failed : " . $conn->connect_error);
}

// Query to select all data from the registration table
$sql = "SELECT firstName, lastName, gender, email, password, number FROM registration";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Registration Data</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <style>
        body {
            background: url('https://images.theconversation.com/files/165805/original/image-20170419-6349-dvyy26.jpg?ixlib=rb-4.1.0&rect=0%2C269%2C1024%2C496&q=45&auto=format&w=1356&h=668&fit=crop') no-repeat center center;
            background-size: cover;
            height: 100vh;
            /* background-color: #f8f9fa; */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }

        h2 {
            color: #343a40;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #007bff;
            color: #fff;
            text-align: left;
            padding: 10px;
        }

        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center mt-3">Registered Users</h2>
    <a href="session.html" >BACK</a>
    <br>
    <br>
    <?php
    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Number</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["firstName"]) . "</td>
                    <td>" . htmlspecialchars($row["lastName"]) . "</td>
                    <td>" . htmlspecialchars($row["gender"]) . "</td>
                    <td>" . htmlspecialchars($row["email"]) . "</td>
                    <td>" . htmlspecialchars($row["password"]) . "</td>
                    <td>" . htmlspecialchars($row["number"]) . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='text-center'>No records found.</p>";
    }
    $conn->close();
    ?>
</div>
</body>
</html>
