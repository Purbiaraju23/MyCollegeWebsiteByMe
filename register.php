<?php
session_start();

// Step 2: Connect to the database
$servername = "localhost";
$username = "root";
$password = "raju978";
$dbname = "collegedb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 3: Process the form submission
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $semester = $_POST['sem'];
    $department = $_POST['department'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $contactNumber = $_POST['contact_number'];

    // Password validation
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
        $_SESSION['message'] = "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit.";
        header("Location: register.php");
        exit();
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Invalid email address.";
        header("Location: register.php");
        exit();
    }

    // Step 4: Insert the data into the database
    $sql = "INSERT INTO students (email, password, sem, department, city, address, contact_number)
            VALUES ('$email', '$password', '$semester', '$department', '$city', '$address', '$contactNumber')";

    if ($conn->query($sql) === true) {
        
        echo "<script>alert('Registration successful!');</script>";
        header("Location: register.php"); // Redirect to clear the form after successful registration
        exit();
    } else {
        $_SESSION['message'] = "Registration failed: " . $conn->error;
    }
}

$conn->close();
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
<div class="container">
        <div class="logo">
            <img src="gdec.png" alt="Logo">
        </div>
        <h2>Student Registration</h2>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<div>" . $_SESSION['message'] . "</div>";
            unset($_SESSION['message']);
        }
        ?>
        <form method="post" action="register.php">
            <label>Email:</label>
            <input type="text" name="email" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <label>Semester:</label>
            <select name="sem" required>
                <option value="">Select Semester</option>
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
                <option value="3">Semester 3</option>
                <option value="4">Semester 4</option>
                <option value="5">Semester 5</option>
                <option value="6">Semester 6</option>
                <option value="7">Semester 7</option>
                <option value="8">Semester 8</option>
            </select>

            <label>Department:</label>
            <select name="department" required>
                <option value="">Select Department</option>
                <option value="Computer">Computer</option>
                <option value="Mechanical">Mechanical</option>
                <option value="Electrical">Electrical</option>
                <option value="Civil">Civil</option>
                <option value="Automobile">Automobile</option>
            </select>

            <label>City:</label>
            <input type="text" name="city" required>

            <label>Address:</label>
            <input type="text" name="address" required>

            <label>Contact Number:</label>
            <input type="text" name="contact_number" required>

            <input type="submit" name="register" value="Register">
        </form>
        <a id="" class="btn btn-primary" href="login.php" role="button">Already Have an account</a>
    </div>
</body>
</html>
