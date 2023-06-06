<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "raju978";
$dbname = "collegedb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $semester = $_POST['sem'];
    $department = $_POST['department'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $contactNumber = $_POST['contactNumber'];

    $sql = "UPDATE students
            SET email = '$email', sem = '$semester', department = '$department',
                city = '$city', address = '$address', contact_number = '$contactNumber'
            WHERE id = $id";

    if ($conn->query($sql) === true) {
        $_SESSION['message'] = "Student record updated successfully!";
        echo "<script>alert('Student record updated successfully!');</script>";
        header("Location: display_students.php"); 
        exit();
    } else {
        $_SESSION['message'] = "Failed to update student record: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        $email = $row['email'];
        $semester = $row['sem'];
        $department = $row['department'];
        $city = $row['city'];
        $address = $row['address'];
        $contactNumber = $row['contact_number'];
    } 
    else {
        $_SESSION['message'] = "Student record not found.";
        header("Location: display_students.php"); 
        exit();
    }
} else {
    $_SESSION['message'] = "Invalid request.";
    header("Location: display_students.php"); 
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
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
    <h2>Update Student Record</h2>
    <?php
    if (isset($_SESSION['message'])) {
        echo "<div>" . $_SESSION['message'] . "</div>";
        unset($_SESSION['message']);
    }
    ?>
    <form method="post" action="update_student.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label>Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>" required>

        <label>Semester:</label>
        <select name="sem" required>
            <option value="">Select Semester</option>
            <option value="1" <?php if ($semester == 1) echo 'selected'; ?>>Semester 1</option>
            <option value="2" <?php if ($semester == 2) echo 'selected'; ?>>Semester 2</option>
            <option value="3" <?php if ($semester == 3) echo 'selected'; ?>>Semester 3</option>
            <option value="4" <?php if ($semester == 4) echo 'selected'; ?>>Semester 4</option>
            <option value="5" <?php if ($semester == 5) echo 'selected'; ?>>Semester 5</option>
            <option value="6" <?php if ($semester == 6) echo 'selected'; ?>>Semester 6</option>
            <option value="7" <?php if ($semester == 7) echo 'selected'; ?>>Semester 7</option>
            <option value="8" <?php if ($semester == 8) echo 'selected'; ?>>Semester 8</option>
        </select>

        <label>Department:</label>
        <select name="department" required>
            <option value="">Select Department</option>
            <option value="Computer" <?php if ($department == 'Computer') echo 'selected'; ?>>Computer</option>
            <option value="Mechanical" <?php if ($department == 'Mechanical') echo 'selected'; ?>>Mechanical</option>
            <option value="Electrical" <?php if ($department == 'Electrical') echo 'selected'; ?>>Electrical</option>
            <option value="Civil" <?php if ($department == 'Civil') echo 'selected'; ?>>Civil</option>
            <option value="Automobile" <?php if ($department == 'Automobile') echo 'selected'; ?>>Automobile</option>
        </select>

        <label>City:</label>
        <input type="text" name="city" value="<?php echo $city; ?>" required>

        <label>Address:</label>
        <input type="text" name="address" value="<?php echo $address; ?>" required>

        <label>Contact Number:</label>
        <input type="text" name="contactNumber" value="<?php echo $contactNumber; ?>" required>

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
