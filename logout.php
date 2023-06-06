<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
  // Retrieve the user ID from the session
  $user_id = $_SESSION['user_id'];

  // Connect to the MySQL database
  $host = 'localhost';
  $username = 'raju';
  $password = 'raju978';
  $database = 'collegedb';

  $conn = mysqli_connect($host, $username, $password, $database);

  // Check if the connection was successful
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Delete the user session data from the database
  $sql = "DELETE FROM sessions WHERE user_id = '$user_id'";

  if (mysqli_query($conn, $sql)) {
    // Session data deleted successfully
    // Destroy the session
    session_destroy();
    header("Location: login.php"); // Redirect to the login page
    exit();
  } else {
    // Error deleting session data from the database
    echo "Error: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
} else {
  // User is not logged in
  header("Location: login.php"); // Redirect to the login page
  exit();
}
?>
