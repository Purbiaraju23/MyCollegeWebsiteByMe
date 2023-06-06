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
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Step 4: Delete the student record from the database
    $sql = "DELETE FROM students WHERE id = $id";

    if ($conn->query($sql) === true) {
        $_SESSION['message'] = "Student record deleted successfully!";
        header("Location: display_students.php"); // Redirect to the page displaying all students
        exit();
    } else {
        $_SESSION['message'] = "Failed to delete student record: " . $conn->error;
    }
}

// Step 5: Retrieve the student record to be deleted
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the student record based on the ID
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Retrieve the student information for display
        $email = $row['email'];
        $semester = $row['sem'];
        $department = $row['department'];
        $city = $row['city'];
        $address = $row['address'];
        $contactNumber = $row['contact_number'];
    } else {
        $_SESSION['message'] = "Student record not found.";
        header("Location: display_students.php"); // Redirect to the page displaying all students
        exit();
    }
} else {
    $_SESSION['message'] = "Invalid request.";
    header("Location: display_students.php"); // Redirect to the page displaying all students
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Head content goes here -->
</head>
<body>
    <h2>Delete Student Record</h2>
    <?php
    if (isset($_SESSION['message'])) {
        echo "<div>" . $_SESSION['message'] . "</div>";
        unset($_SESSION['message']);
    }
    ?>
    <form method="post" action="delete_student.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="delete" value="Delete">
    </form>
</body>
</html>
