<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>College Website</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #f0f0f0;
      padding: 20px;
      text-align: center;
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
    main {
      padding: 20px;
    }
    .video-container {
      position: relative;
      width: 1000px; 
      height: 600px; 
      align-items: center;
    }

    .video-container video {
      position: absolute;
      width: 900;

      top: 50%; /* Adjust the top position */
      left: 60%; /* Adjust the left position */
      transform: translate(-50%, -50%); /* Center the video */
    }
    a {
      color: blue;
      text-decoration: none;
    }

    /* Hover styles */
    a:hover {
      color: red;
      text-decoration: underline;
    }

    /* Visited link styles */
    a:visited {
      color: purple;
    }
    body{
    background: rgb(245,222,207);
    background: linear-gradient(90deg, rgba(245,222,207,1) 0%, rgba(255,243,243,1) 33%, rgba(0,212,255,1) 100%);
}
footer {
      background-color: #f0f0f0;
      padding: 20px;
      text-align: center;
    }
    .logo-container {
        text-align: center;
    }

    .logo-container img {
        max-width: 200px;
    }

  </style>
</head>
<body>

  <header style="background: rgb(245,222,207);
    background: linear-gradient(90deg, rgba(245,222,207,1) 0%, rgba(255,243,243,1) 33%, rgba(0,212,255,1) 100%);">
    <h1>GIDC Degree Engineering College       
</h1>
<div class="logo-container">
        <img src="gdec.png" alt="Logo">
    </div>
<a href="logout.php" >Logout</a>
    
    <nav>
      <ul>
        <li><a href="homepage.php">Home</a></li>
        <li><a href="notes.php">Notes</a></li>
        <li><a href="faculty.php">Faculty Details</a></li>
        <li><a href="facilities.php">Facilities</a></li>
        <li><a href="courses.php">Courses</a></li>
        <li><a href="display_students.php">Student Details</a></li>
      </ul>
        
    </nav>
  </header>
<div class="video-container">
  <video src="videoplayback.mp4" controls >
            Your browser does not support the video tag.
        </video>
</div>
  

<?php
session_start();
include('footer.php');
?>
  
</body>

</html>
