<?php
// Step 2: Connect to the database
$servername = "localhost";
$username = "root";
$password = "raju978";
$dbname = "collegedb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 6: Fetch and display student details in a table
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Registration</title>
    <link rel="stylesheet" href="style.css">
    
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #9c27b0, #ffffff);
            animation: gradientAnimation 5s ease infinite;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .container {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background: #ffffff;
            margin: auto; 
            margin-top: auto; 
            margin-bottom: auto; 
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 100px;
            height: 100px;
            border-radius: 50%; 
        }

      
        .container form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        
        .container form label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .container form input[type="text"],
        .container form input[type="password"],
        .container form select {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 20px; 
            font-size: 14px;
            outline: none;
        }

        .container form input[type="text"]:focus,
        .container form input[type="password"]:focus,
        .container form select:focus {
            border-color: #4CAF50; 
        }

        .container form input[type="submit"] {
            width: auto;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .container form a {
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <table border="3px">
        <tr>
            <th>Email</th>
            <th>Semester</th>
            <th>Department</th>
            <th>City</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['sem'] . "</td>";
                echo "<td>" . $row['department'] . "</td>";
                echo "<td>" . $row['city'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['contact_number'] . "</td>";
                echo "<td>
                        <a href='update_student.php?id=" . $row['id'] . "'>Update</a>
                        <a href='delete_student.php?id=" . $row['id'] . "'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No student records found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
