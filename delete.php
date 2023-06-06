<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the file parameter is set
    if (isset($_POST['file'])) {
        // Get the file path from the POST data
        $file = $_POST['file'];

        // Delete the file from the server
        if (file_exists($file)) {
            unlink($file);
            echo "File deleted successfully.";
        } else {
            echo "File not found.";
        }
    } else {
        echo "Invalid request.";
    }
}

// Redirect back to the display.php page
header("Location: display.php");
exit();
?>
