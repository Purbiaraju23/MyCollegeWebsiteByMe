<!DOCTYPE html>
<html>
<head>
    <title>Upload Notes</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background: rgb(245, 222, 207);
        background: linear-gradient(90deg, rgba(245, 222, 207, 1) 0%, rgba(255, 243, 243, 1) 33%, rgba(0, 212, 255, 1) 100%);
        color: #000000;
    }

    /* Center the form on the page */
    .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}


    form {
        background-color: #ffffff;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 20px;
        width: 400px;
    }

    /* Rest of the CSS styles */

    h2 {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        font-style: oblique;
    }

    header {
        background: rgb(245, 222, 207);
        background: linear-gradient(90deg, rgba(245, 222, 207, 1) 0%, rgba(255, 243, 243, 1) 33%, rgba(0, 212, 255, 1) 100%);
        padding: 20px;
        text-align: center;
    }

    .logo-container {
        text-align: center;
    }

    .logo-container img {
        max-width: 200px;
    }

    nav {
        background-color: yellowgreen;
        margin-top: 10px;
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    nav ul li {
        display: inline;
        margin-right: 10px;
        font-size: 25px;
    }
   

    form label {
        font-weight: bold;
        text-align: center; /* Add text-align center */
    }

    form input[type="text"],
    form input[type="file"],
    form select {
        margin: 5px 0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 20px;
        width: 300px;
        transition: border-color 0.3s;
    }

    form input[type="text"]:hover,
    form input[type="file"]:hover,
    form select:hover {
        border-color: aquamarine;
    }

    form input[type="submit"] {
        background-color: aquamarine;
        color: #000000;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    a {
        color: #000000;
        text-decoration: none;
        margin-top: 10px;
        display: inline-block;
    }

    a:hover {
        text-decoration: underline;
    }
</style>


</head>
<body>
    <header>
        <h1>GIDC Degree Engineering College</h1>
        <div class="logo-container">
            <img src="gdec.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="notes.php">Notes</a></li>
                <li><a href="faculty.php">Faculty Details</a></li>
                <li><a href="facilities.php">Facilities</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="achievements.php">Achievements</a></li>
            </ul>
        </nav>
    </header>
    
    <h2 style="font-size: 50px;">Upload Notes</h2>
    
    <?php
    // PHP code for handling form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "raju978";
        $dbname = "collegedb";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO note (username, page, notes) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $page, $notes);

        // Get the uploaded file details
        $notes = $_FILES["notes"]["name"];
        $notes_temp = $_FILES["notes"]["tmp_name"];

        // Get the form data
        $username = $_POST["username"];
        $page = $_POST["page"];

        // Move the uploaded file to a desired location
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($notes);
        move_uploaded_file($notes_temp, $target_file);

        // Execute the SQL statement
        $stmt->execute();

        // Close the prepared statement and database connection
        $stmt->close();
        $conn->close();

        echo "Notes uploaded successfully!";
    }
    ?>
    
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
        <label for="username">Name:</label>
        <input type="text" name="username" required><br><br>
        
        <label for="page">Format:</label>
    <select name="page" required>
        <option value="pdf">PDF</option>
        <option value="txt">Text</option>
        <option value="docx">DOCX</option>
        <option value="jpg">JPG/JPEG</option>
        <option value="png">PNG</option>
        <option value="gif">GIF</option>
    </select><br><br>
        
        <label for="notes">Notes:</label>
        <input type="file" name="notes" required><br><br>
        
        <input type="submit" value="Upload Notes">
    </form>
    
    <?php
    $displayUrl = "display.php";
    echo "<a href='$displayUrl'>Display Notes</a>";
    ?>
</body>
</html>
