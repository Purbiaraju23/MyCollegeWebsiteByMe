<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>College Website</title>
  <style>
    h1{
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      font-style: oblique;
    }
    /* CSS styles for the layout */
    header {
      background-color: yellowgreen;
    }
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #f0f0f0;
      padding: 20px;
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
      font-size: 25px; /* Increase the font size */
    }
    main {
      padding: 25px;
    }
    .faculty-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  margin: 20px;
  background-color: purple;
}

.faculty-card {
  width: 300px; /* Adjust the width of each faculty card */
  background-color: #f2f2f2;
  border-radius: 5px;
  padding: 20px;
  margin-bottom: 20px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.faculty-image {
  width: 100%; /* Adjust the width of the faculty image */
  height: auto;
  margin-bottom: 20px;
}

h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

p {
  font-size: 16px;
  margin-bottom: 5px;
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
  </style>
</head>
<body>
  <header style="background: rgb(245,222,207);
    background: linear-gradient(90deg, rgba(245,222,207,1) 0%, rgba(255,243,243,1) 33%, rgba(0,212,255,1) 100%);">
    <h1>GIDC Degree Engineering College</h1>
    <div class="logo">
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
    <br>
    
  </header>
  <div class="faculty-container">
    <div class="faculty-card">
      <img src="archanmam.jpg" alt="Faculty 1" class="faculty-image">
      <div class="faculty-details">
        
        <p>Department: Computer</p>
        <p>Qualification: Ph. D. (Pursuing),ME, BE Computer Engineering</p>
        <p>Email: phod_computer@gdec.in</p>
        <p>Phone: 123-456-7890</p>
        <p>Experience:	11 years</p>
        
      </div>
    </div>
    <div class="faculty-card">
      <img src="ksp.jpg" alt="Faculty 2" class="faculty-image">
      <div class="faculty-details">
        
        <p>Department: Computer</p>
        <p>Qualification: ME</p>
        <p>Email: ksp.coed@gdec.in</p>
        <p>Phone: 123-456-7890</p>
        <p>Experience:	Industry - 3 year<br>
          Academic Field - 10 years</p>
      </div>
    </div>
    
  </div>





























<?php
session_start();
include('footer.php');
?>
  
</body>

</html>
